<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ClientDocument;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\client;
use App\Models\staff;
use App\Models\Mortgageplan;
use App\Models\bank_product;
use App\Models\bank_applications;
use App\Models\Client_proposal_plan;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Str;
use Carbon\Carbon;
use DB;

class ProposalController extends Controller
{
     public function all_client_proposal(Request $request){

        $profileid = Auth::user()->id;
        $adminData = User::with('staff')
                    ->where('id',$profileid)
                    ->first();
                  //  dd($adminData);
        $data['pageTitle'] = 'mortgages';
        $searchQuery = $request->input('search');
        $clients = Client::where('staff_id', $adminData->staff->id ?? '');

        $clients->when($searchQuery, function ($query) use ($searchQuery) {
            $query->where('first_name', 'like', '%' . $searchQuery . '%');
        });
        
        $clients = $clients->get();
        
        //     ->when($clientId, function ($query) use ($clientId) {
        //         $query->where('client_id', $clientId);
        //     })
        //     ->when($email, function ($query) use ($email) {
        //         // Assuming ClientDocument has a relationship with Client model
        //         $query->whereHas('client', function ($query) use ($email) {
        //             $query->where('email', $email);
        //         });
        //     })
        //     ->select('client_id', DB::raw('MAX(id) as id'))
        //     ->groupBy('client_id')
        //     ->paginate(10);
        // $client = client::all();
        // return view('staff_portal_file.client_documents.all_documents', compact('client_document','data','adminData','client'));
         return view('staff_portal_file.proposal.all_proposal', compact('clients','data'));
    }

    public function create_proposal(Request $request, $client_id){
        $profileid = Auth::user()->id;
        $mortgageplans = Mortgageplan::all();
        $proposals = Client_proposal_plan::where('client_id', $client_id)->get();
        // $adminData = User::find($profileid);
        // $data['pageTitle'] = 'documents';
        // $searchQuery = $request->input('search');
        // $clientId = $request->input('client_id');
        // $email = $request->input('email');
    
        // $client_document = ClientDocument::when($searchQuery, function ($query) use ($searchQuery) {
        //     $query->where('document_name', 'like', '%' . $searchQuery . '%');
        // })
        //     ->when($clientId, function ($query) use ($clientId) {
        //         $query->where('client_id', $clientId);
        //     })
        //     ->when($email, function ($query) use ($email) {
        //         // Assuming ClientDocument has a relationship with Client model
        //         $query->whereHas('client', function ($query) use ($email) {
        //             $query->where('email', $email);
        //         });
        //     })
        //     ->select('client_id', DB::raw('MAX(id) as id'))
        //     ->groupBy('client_id')
        //     ->paginate(10);
        // $client = client::all();
        // return view('staff_portal_file.client_documents.all_documents', compact('client_document','data','adminData','client'));
         return view('staff_portal_file.proposal.create_proposal',compact('mortgageplans','client_id','proposals'));
    }
    public function view_proposal(Request $request, $client_id){
        $mortgage = Client_proposal_plan::with(['mortgageplan.bank', 'branch', 'product'])->where('client_id', $client_id)->get();
                    // ->where('client_id', $client_id)
                    // ->first();

                    // dd($mortgage);
        return view('staff_portal_file.proposal.view_proposal',compact('mortgage'));

    }
    public function get_mortgage(Request $request){
        $id = $request->input('id');
        $mortgage = Mortgageplan::with('bank', 'branch', 'product')
                    ->where('id', $id)
                    ->first();
        if(is_null($mortgage)){
            return response()->json(['message'=> 'not found'],404);
        }else{
            return response()->json($mortgage);
        }
    }

    public function add_proposal(Request $request, $client_id){
    $no_of_plans=0;
     $existingCount = 0;
     $planIds = $request->input('plan_ids');

   // Create a new Proposal instance for each plan ID
   foreach ($planIds as $planId) {
    if (!is_null($planId)) {
        $existingProposal = Client_proposal_plan::where('client_id', $client_id)
       ->where('plan_id', $planId)
       ->first();
       if(!$existingProposal) {
        $clientProposalPlan = new Client_proposal_plan();
        $clientProposalPlan->plan_id = $planId;
        $clientProposalPlan->client_id = $client_id;
        $clientProposalPlan->save();
       }
       else {
        // Increment the count of existing proposals
        $existingCount++;
         }
         $no_of_plans++;
    }
   }
    if($existingCount==0){
        return response()->json(['success' => 'Data inserted successfully'], 200);
    }else if($no_of_plans==$existingCount)
    {
        return response()->json(['error' =>'This proposals already assigned'], 422);
    }else{
        return response()->json(['success' =>$existingCount.' Proposals already assigned'], 200);
        
    }
   
    }
    
     public function all_intrested_clients_proposal(Request $request, $client_id){
        $profileid = Auth::user()->id;
        $proposal = Client_proposal_plan::with(['mortgageplan','bank', 'branch', 'product'])->where('client_id', $client_id)->where('client_interest',1)->first();

        return view('staff_portal_file.proposal.view_client_proposal',compact('proposal'));
    }

    public function create_application(Request $request, $id){

        $profileid = Auth::user()->id;

        $adminData = User::with('staff')
        ->where('id',$profileid)
        ->first();

        $proposal = Client_proposal_plan::with(['mortgageplan','bank', 'branch', 'product'])->where('id', $id)->where('status','deactive')->first();
        //dd($proposal);
        $currentDate = Carbon::now()->toDateString();
        if($proposal){
            $proposal_data = [
                'application_date'=>$currentDate,
                'client_id'=>$proposal->client_id,
                'client_proposal_plan_id'=>$id,
                'bank_id'=>$proposal->mortgageplan->bank->id,
                'staff_id'=>$adminData->staff->id ?? '' ,
            ];
    // dd($proposal_data);
            $create_application = bank_applications::create($proposal_data);
            $latestId = $create_application->id;

            // Generate the formatted ID with prefix "EL" and 5 digits
            $formattedId = 'EL' . str_pad($latestId, 5, '0', STR_PAD_LEFT);
        
            // Update the application_number of the latest inserted record
            $create_application->update(['application_number' => $formattedId]);
            if($create_application){
                $update = Client_proposal_plan::where('id', $id)->update(['status' => 'active']);
                
            }
        }
       
        return redirect()->route('all.loan_applications', ['status' => 'pending']);


    }
}
