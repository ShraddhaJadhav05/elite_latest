<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\lead_staff;
use App\Models\Lead;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class Staffcustomer_leadsController extends Controller
{
    public function new_loan_applications(Request $request){
        $data['pageTitle']='staff_customer_lead';
        $profileid = Auth::user()->id;
        $adminData = User::find($profileid);
    
        $userEmail = Auth::user()->email;
    
        // Get the search query from the request
        $searchQuery = $request->input('search');
    
        $staff_leads = lead_staff::with(['lead', 'staff'])
                    ->whereHas('staff', function($query) use ($userEmail) {
                        $query->whereHas('user', function($userQuery) use ($userEmail) {
                            $userQuery->where('email', $userEmail);
                        });
                    })
                    ->when($searchQuery, function ($query) use ($searchQuery) {
                        // Apply search conditions
                        $query->whereHas('lead', function ($leadQuery) use ($searchQuery) {
                            $leadQuery->where('first_name', 'like', '%' . $searchQuery . '%')
                                    ->orWhere('phone_number', 'like', '%' . $searchQuery . '%')
                                    ->orWhere('application_status', 'like', '%' . $searchQuery . '%')
                                    ->orWhere('application_priority', 'like', '%' . $searchQuery . '%');
                        });
                    })
                    ->paginate(10); // Or whichever number of items per page you prefer

        return view('staff_portal_file.staff_custom_leads.new_applications', compact('staff_leads', 'adminData', 'data'));

    }
    
    public function in_progress_applications(Request $request){
        $data['pageTitle'] = 'staff_customer_lead';
        $profileid = Auth::user()->id;
        $adminData = User::find($profileid);
    
        $userEmail = Auth::user()->email;
    
        $searchQuery = $request->input('search'); // Assuming $searchQuery is obtained from the request
    
        $inprogressapplications = lead_staff::with(['lead', 'staff'])
            ->whereHas('staff', function($query) use ($userEmail) {
                $query->whereHas('user', function($userQuery) use ($userEmail) {
                    $userQuery->where('email', $userEmail);
                });
            })
            ->whereHas('lead', function ($leadQuery) {
                $leadQuery->where('application_status', 'In Progress');
            })
            ->when($searchQuery, function ($query) use ($searchQuery) {
                // Apply search conditions
                $query->whereHas('lead', function ($leadQuery) use ($searchQuery) {
                    $leadQuery->where('first_name', 'like', '%' . $searchQuery . '%')
                        ->orWhere('phone_number', 'like', '%' . $searchQuery . '%')
                        ->orWhere('application_status', 'like', '%' . $searchQuery . '%')
                        ->orWhere('application_priority', 'like', '%' . $searchQuery . '%');
                });
            })
            ->paginate(10); 
    
        return view('staff_portal_file.staff_custom_leads.in_progress_applications', compact('inprogressapplications', 'adminData', 'data'));
    }

    public function approved_applications(Request $request){
        $data['pageTitle'] = 'staff_customer_lead';
        $profileid = Auth::user()->id;
        $adminData = User::find($profileid);
    
        $userEmail = Auth::user()->email;
    
        $searchQuery = $request->input('search'); // Assuming $searchQuery is obtained from the request
    
        $approvedapplication = lead_staff::with(['lead', 'staff'])
            ->whereHas('staff', function($query) use ($userEmail) {
                $query->whereHas('user', function($userQuery) use ($userEmail) {
                    $userQuery->where('email', $userEmail);
                });
            })
            ->whereHas('lead', function ($leadQuery) {
                $leadQuery->where('application_status', 'Completed');
            })
            ->when($searchQuery, function ($query) use ($searchQuery) {
                // Apply search conditions
                $query->whereHas('lead', function ($leadQuery) use ($searchQuery) {
                    $leadQuery->where('first_name', 'like', '%' . $searchQuery . '%')
                        ->orWhere('phone_number', 'like', '%' . $searchQuery . '%')
                        ->orWhere('application_status', 'like', '%' . $searchQuery . '%')
                        ->orWhere('application_priority', 'like', '%' . $searchQuery . '%');
                });
            })
            ->paginate(10); 
    
        return view('staff_portal_file.staff_custom_leads.approved_applications', compact('approvedapplication', 'adminData', 'data'));
    }
    

    public function show_new_loan_application(){
        $data['pageTitle']='staff_customer_lead';
        $profileid = Auth::user()->id;
        $adminData = User::find($profileid);

        return view('staff_portal_file.staff_custom_leads.add_new_application',compact('adminData','data'));
    }

    public function show_loan_application_second(){
        $data['pageTitle']='staff_customer_lead';
        $profileid = Auth::user()->id;
        $adminData = User::find($profileid);

        return view('staff_portal_file.staff_custom_leads.add_new_co_application',compact('adminData','data'));
    }

    public function view_loan_application($id){
        $profileid = Auth::user()->id;
        $adminData = User::find($profileid);

        $data['pageTitle']='leads';
        $lead=Lead::find($id);
        if(is_null($lead)){
            return response()->json(['message'=> 'not found'],404);
        }
        // return response()->json($lead::find($id),200);
        return view('staff_portal_file.staff_custom_leads.view_new_application', ['lead' => $lead,'data' => $data,'adminData' => $adminData]);
    }

    public function edit_loan_new_applicattion($id){
        $profileid = Auth::user()->id;
        $adminData = User::find($profileid);

        $data['pageTitle']='leads';
        $lead=Lead::find($id);
        if(is_null($lead)){
            return response()->json(['message'=> 'not found'],404);
        }
        // return response()->json($lead::find($id),200);
        return view('staff_portal_file.staff_custom_leads.edit_new_application', ['lead' => $lead,'data' => $data,'adminData' => $adminData]);
    }

    public function add_new_loan_application(Request $request){
        $request->merge(['lead_type' => 'Primary']);
        
        $request->merge(['residence_country' => 'United Arab Emirates']);

        $staff_leads=Lead::create($request->all());

         // Check if continue button was clicked
         if ($request->has('continueBtn')) {
            // Redirect to a different route if continue button was clicked
            return redirect()->route('show.loan.application.second');
        } else {
            // Redirect to the same route if continue button was not clicked
            return redirect()->route('new.loan.applications')->withSuccess("Data Inserted Successfully");
        }

    }

    public function add_new_co_loan_application(Request $request){

        $data['pageTitle']='leads';
        if (!$request->has('lead_type')) {
            $request->merge(['lead_type' => 'Primary']);
        }
        $request->merge(['residence_country' => 'United Arab Emirates']);

        $lead = Lead::create($request->all());

        
        return redirect()->route('new.loan.applications')->withSuccess("Data Inserted Successfully");

    }

    public function update_loan_application(Request $request,$id){
        $data['pageTitle']='leads';
        $lead=Lead::find($id);
        if(is_null($lead)){
            return response()->json(['message'=> 'not found'],404);
        }
        $lead->update($request->all());
        // return response($lead,200);
        return redirect()->route('new.loan.applications',compact('data'))->withSuccess("Data Updated Successfully");
    }



    public function delete_lead_applicationt(Request $request, $id){
        $data['pageTitle']='leads';
        $lead=Lead::find($id);
        if(is_null($lead)){
            return response()->json(['message'=> 'not found'],404);
        }

        // Delete related lead staff records
        $lead->leadStaff()->delete();
        
        $lead->delete();
        // return response()->json(null,204);
        return redirect()->route('new.loan.applications',compact('data'))->withSuccess("Data Deleted Successfully");

    }
}
