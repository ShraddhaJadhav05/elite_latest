<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\lead_staff;
use App\Models\bank_applications;
use App\Models\User;
use App\Models\Client_proposal_plan;
use App\Models\Mortgageplan;
use App\Models\bank;
use App\Models\bank_product;
use App\Models\client;
use App\Models\staff;
use App\Models\ClientDocument;

use Illuminate\Support\Facades\Auth;


class loan_applicationsController extends Controller
{


    public function all_loan_applications(Request $request, $status) {

        $profileid = Auth::user()->id;
        $adminData = User::with('staff')
        ->where('id',$profileid)
        ->first();
        $data['pageTitle']='loan_applications';
        // $searchQuery = $request->input('search');
        // $bank_product = bank_product::when($searchQuery, function ($query) use ($searchQuery) {
        // $query->where('name', 'like', '%' . $searchQuery . '%')
        //       ->orWhere('plan', 'like', '%' . $searchQuery . '%')
        //       ->orWhere('interest_rate', 'like', '%' . $searchQuery . '%')
        //       ->orWhere('available_date', 'like', '%' . $searchQuery . '%');
        // })->paginate(10);
    
        $loans = bank_applications::with(['client','client_proposal','bank','product','branch','staff'])
        ->where('application_status', $status)
        ->where('staff_id', $adminData->staff->id ?? '')
        ->get();
        if($status=='in_progress'){
            $status = 'in progress';
        }elseif($status=='on_hold'){
            $status = 'on hold';
        }
        return view('staff_portal_file.loan_applications.new_applications', compact('status','loans','data','adminData'));
    }


    public function show_loan_applications(){
        $profileid = Auth::user()->id;
        $adminData = User::find($profileid);
        $data['pageTitle']='loan_applications';
        $bank=bank::all();
        $client=client::all();
        $staff=staff::all();
        $bank_product=bank_product::all();
        $loans=bank_applications::all();
        return view('staff_portal_file.loan_applications.add_new_application', compact('staff','loans','client','bank','data','adminData','bank_product'));
    }

    public function view_loan_applications($id){
        $profileid = Auth::user()->id;
        $adminData = User::find($profileid);
        $data['pageTitle']='loan_applications';
        $loan = bank_applications::with(['client','client_proposal','bank','product','branch','staff'])
        ->where('id', $id)
        ->first();
        //dd($loan);
        $document = array();
      
        // $bank=bank::all();
        if(is_null($loan)){
            return response()->json(['message'=> 'not found'],404);
        }else{
            $document=ClientDocument::where('client_id',$loan->client_id)
            ->where('document_status','varified')->get();
        }
        // return response()->json($lead::find($id),200);
        return view('staff_portal_file.loan_applications.view_new_application', ['loan' => $loan,'data' => $data,'adminData' => $adminData,'document' =>$document ]  );
      }


    
    public function add_loan_applications(Request $request){


         

        $loans = bank_applications::create($request->all());

        $latestId = $loans->id;

    // Generate the formatted ID with prefix "EL" and 5 digits
    $formattedId = 'EL' . str_pad($latestId, 5, '0', STR_PAD_LEFT);

    // Update the application_number of the latest inserted record
    $loans->update(['application_number' => $formattedId]);


        return redirect()->route('all.loan_applications')->withSuccess("Data Inserted Successfully");
    }



    public function edit_loan_applications(Request $request,$id){
        //dd($request->all());
        $loans=bank_applications::find($id);
            if(is_null($loans)){
                return response()->json(['message'=> 'not found'],404);
            }
            $loans->update($request->all());
        
            // return response($lead,200);
            return redirect()->route('view.loan.applications', ['id' => $id])->withSuccess("Data Updated Successfully");
      }


        public function update_loan_applications(Request $request,$id){

           
            $loans=bank_applications::find($id);
            if(is_null($loans)){
                return response()->json(['message'=> 'not found'],404);
            }
            $loans->update($request->all());
        
            // return response($lead,200);
            return redirect()->route('all.loan_applications')->withSuccess("Data Updated Successfully");
        }
        


    public function delete_loan_applications(Request $request,$id){
        $loans=bank_applications::find($id);
        if(is_null($loans)){
            return response()->json(['message'=> 'not found'],404);
        }

        $loans->delete();
        // return response()->json(null,204);
        return redirect()->route('all.loan_applications')->withSuccess("Data Deleted Successfully");
    }


    public function getData_loan_applications(Request $request,$id){
        $adminData=array();
     
        $client=client::all();
     
       $verifiedDocuments = ClientDocument::where('document_status', 'varified')
                                   ->where('client_id', $id)
                                   ->get();
        //dd($verifiedDocuments);

        $adminData['client'] = client::find($id);
        $adminData['document'] = $verifiedDocuments;

        if(is_null($adminData)){
            return response()->json(['message'=> 'not found'],404);
        }else{
            return response()->json($adminData);
        }

        

       
     
   
    }

}
