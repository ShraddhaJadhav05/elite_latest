<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lead;
use App\Models\staff;
use App\Models\User;
use App\Models\lead_staff;
use App\Models\client;
use App\Models\notification_message;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;


class LeadController extends Controller
{
    public function show_leads(){
       
        $data['pageTitle']='leads';
        $profileid = Auth::user()->id;
        $adminData = User::find($profileid);
        return view('lead.lead_add',compact('data','adminData'));
    }

    public function show_leads_second_form(){
        $profileid = Auth::user()->id;
        $adminData = User::find($profileid);
        $data['pageTitle']='leads';
        return view('lead.lead_add_coapplicant',compact('data','adminData'));
    }
    

    public function view_leads($id){
        $profileid = Auth::user()->id;
        $adminData = User::find($profileid);

        $data['pageTitle']='leads';
        $lead=Lead::find($id);
        if(is_null($lead)){
            return response()->json(['message'=> 'not found'],404);
        }
        // return response()->json($lead::find($id),200);
        return view('lead.lead_view', ['lead' => $lead,'data' => $data,'adminData' => $adminData]);
    }

    public function all_leads(Request $request){
        $profileid = Auth::user()->id;
        $adminData = User::find($profileid);
        $data['pageTitle']='leads';
        $searchQuery = $request->input('search');
        $lead = Lead::with('staff')
        
        ->when($searchQuery, function ($query) use ($searchQuery) {
            $query->where('first_name', 'like', '%' . $searchQuery . '%')
                  ->orWhere('phone_number', 'like', '%' . $searchQuery . '%')
                  ->orWhere('email', 'like', '%' . $searchQuery . '%');
        })->paginate(10);

        // $lead=Lead::paginate(10);
        $staff=staff::all();
        return view('lead.lead_list', compact('lead','staff','data','adminData'));
    }

    public function add_leads(Request $request){
        
        $request->validate([
            'first_name' => 'required',
            'phone_number'=>'required',
            'email'=>'required',
            'nationality'=>'required',
            'address_line1'=>'required',
            'emirates'=>'required',
            'company'=>'required',
            'employment'=>'required',
            'reason_for_loan'=>'required',
            'office_address'=>'required',
            'office_phone_number'=>'required',
        ]);
        
        $request->merge(['lead_type' => 'Primary']);
        
        $request->merge(['residence_country' => 'United Arab Emirates']);

        $lead = Lead::create($request->all());

        // Check if continue button was clicked
        if ($request->has('continueBtn')) {
            // Redirect to a different route if continue button was clicked
            return redirect()->route('show.second-form');
        } else {
            // Redirect to the same route if continue button was not clicked
            return redirect()->route('all.leads')->withSuccess("Data Inserted Successfully");
        }
        // return redirect()->route('all.leads')->withSuccess("Data Inserted Successfully");

    }

   

    public function add_coapplicant_form(Request $request){
        $data['pageTitle']='leads';
        if (!$request->has('lead_type')) {
            $request->merge(['lead_type' => 'Primary']);
        }
        $request->merge(['residence_country' => 'United Arab Emirates']);

        $lead = Lead::create($request->all());

        return redirect()->route('all.leads',compact('data'))->withSuccess("Data Inserted Successfully");
    }

    public function edit_leads($id){
        $profileid = Auth::user()->id;
        $adminData = User::find($profileid);
        
        $data['pageTitle']='leads';
        $lead=Lead::find($id);
        if(is_null($lead)){
            return response()->json(['message'=> 'not found'],404);
        }
        // return response()->json($lead::find($id),200);
        return view('lead.lead_edit', ['lead' => $lead,'data' => $data,'adminData' => $adminData]);
    }

    public function update_leads(Request $request, $id){
        $data['pageTitle']='leads';
        $lead=Lead::find($id);
        if(is_null($lead)){
            return response()->json(['message'=> 'not found'],404);
        }
        $lead->update($request->all());
        // return response($lead,200);
        return redirect()->route('all.leads',compact('data'))->withSuccess("Data Updated Successfully");
    }

    public function delete_leads(Request $request, $id){
        $data['pageTitle']='leads';
        $lead=Lead::find($id);
        if(is_null($lead)){
            return response()->json(['message'=> 'not found'],404);
        }

        // Delete related lead staff records
        $lead->leadStaff()->delete();
        
        $lead->delete();
        // return response()->json(null,204);
        return redirect()->route('all.leads',compact('data'))->withSuccess("Data Deleted Successfully");

    }

    // assign lead to staff

    // public function assignStaff(Request $request){
    //     $data['pageTitle']='leads';
    //     $lead_staff = lead_staff::create($request->all());
    //     return redirect()->back()->with('success', 'Staff assigned successfully.',compact('data'));
    // }

    public function assignStaff(Request $request)
{
    $data['pageTitle']='leads';
    $leadId = $request->lead_id;
    $staffId = $request->staff_id;

 lead::where('id', $leadId)->update(['staff_id' => $staffId]);
 // send notification to staff and client
       
   //Log::info($existingAssignment);

  
    // if ($existingAssignment) {
    //     return response()->json(['error' => 'Lead is already assigned to this staff.'], 400);
    // }

    // // If not already assigned, proceed with assignment
    // lead_staff::create($request->all());

    // return redirect()->back()->with('success', 'Staff assigned successfully.',compact('data'));
    return response()->json(['success' => 'Staff assigned successfully.'], 200);

}



    public function assign_lead_to_client(Request $request){
        $data['pageTitle']='leads';
        // Validate the request if necessary
        $request->validate([
            'lead_id' => 'required|exists:leads,id', // Validate that the lead_id exists in the leads table
        ]);
    
        // Fetch the lead based on the provided lead_id
        $lead = Lead::find($request->input('lead_id'));
  
        // Create a new client record and populate it with lead data
        $client = new Client();
       
        // Assign other lead data to client fields
        $client->first_name = $lead->first_name;
        $client->email = $lead->email;
        $client->birth_date = $lead->birth_date;
        $client->gender = $lead->gender;
        $client->phone_number = $lead->phone_number;
        $client->address_line1 = $lead->address_line1;
        $client->address_line2 = $lead->address_line2;
        $client->city = $lead->city;
        $client->region = $lead->region;
        $client->zip_code = $lead->zip_code;
        $client->country = $lead->country;
        $client->reference_id = $lead->reference_id;
        $client->security_number = $lead->security_number;
        $client->employment = $lead->employment;
        $client->loan_amount_offered = $lead->loan_amount_offered;
        $client->annual_gross_income = $lead->annual_gross_income;
        $client->reason_for_loan = $lead->reason_for_loan;
        $client->rent_homeowner = $lead->rent_homeowner;
        $client->nationality = $lead->nationality;
        $client->residence_country = $lead->residence_country;
        $client->company = $lead->company;
        $client->monthly_salary = $lead->monthly_salary;
        $client->office_address = $lead->office_address;
        $client->office_phone_number = $lead->office_phone_number;
        $client->loan_looking_for = $lead->loan_looking_for;
        $client->loan_amount_required = $lead->loan_amount_required;
        $client->property_price = $lead->property_price;
        $client->down_payment = $lead->down_payment;
        $client->years = $lead->years;
        $client->interest_rate = $lead->interest_rate;
        $client->emirates = $lead->emirates;
        $client->lead_type = $lead->lead_type;
        $client->staff_id = $lead->staff_id;
        $user = $lead->user;
        $client->user_id = $user->id;
        // Save the client record
        $client->save();
        // Create a new notification message
        $message = new notification_message();
        $message->from = Auth::user()->role;
        $message->staff_id = $client->staff_id;
        $message->message = "One lead has been pre-qualified and become a client with you";
        $message->save();

        // create a notification message for client
        $message2 = new notification_message();
        $message2->from = Auth::user()->role;
        $staff = staff::where('id', $client->staff_id)->first();
        $message2->message =  "Congratulations, you have be come a client at Elite and".$staff->first_name ."is your account manager";
        $message2->save();
        $message2->clients()->sync([$client->id], 'notification_message_clients');
 
        $lead->delete();
        return response()->json(['success' => true,'data' => $data]);

    }


    public function delete_leads_client(Request $request)
    {
        $data['pageTitle']='leads';
        // Validate the request if necessary
        $request->validate([
            'lead_id' => 'required|exists:clients,lead_id', // Validate that the lead_id exists in the clients table
        ]);

        // Find the client record based on the lead_id
        $client = Client::where('lead_id', $request->input('lead_id'))->first();

        if ($client) {
            // If the client record exists, delete it
            $client->delete();
            return response()->json(['success' => true, 'message' => 'Lead deleted from client successfully',compact('data')]);
        } else {
            // If the client record doesn't exist, return an error message
            return response()->json(['success' => false, 'message' => 'Lead not found in client records','data'], 404);
        }
    }

    public function admin_update_category_flag(Request $request){
        $data['pageTitle']='leads';

        
        $leadId = $request->input('lead_id');
        $categoryFlag = $request->input('category_flag');

        // Find the lead
        $lead = Lead::findOrFail($leadId);

        // Update the category_flag
        $lead->category_flag = $categoryFlag;
        $lead->save();

        return response()->json(['success' => true,'data' => $data]);
    }

    public function admin_get_category_flag(Request $request){
        $data['pageTitle']='leads';

        $leadId = $request->input('lead_id');
    
        // Find the lead
        $lead = Lead::findOrFail($leadId);
    
        // Get the current category_flag value
        $categoryFlag = $lead->category_flag;
    
        return response()->json(['category_flag' => $categoryFlag,'data' => $data]);
    }
    

    public function check_user_email(Request $request){
        $data['pageTitle']='leads';

        $emails= $request->input('email');
        $exists= User::where('email',$emails)->exists();
        return response()->json(['exists' => $exists,'data' => $data]);
    }

  
public function leads_credentials(Request $request){
    
        $randomPassword = Str::random(8); 
    
        $lead = Lead::where('email', $request->email)->first();
        
        if ($lead) {
            $hashedPassword = Hash::make($randomPassword);
    
            $lead->password = $hashedPassword;
            $lead->save();
    
            $user = $lead->user;
            if ($user) {
                $user->password = $hashedPassword; // Assign the same hashed password
                $user->save();
            }
        } else {
            return response()->json(['error' => 'Lead not found'], 404);
        }
        // Define email content
        $emailContent = "Hello " . $request->first_name	 . ",\n\n";
        $emailContent .= "Welcome to Elite Capital Mortgage! Your account has been created successfully.\n";
        $emailContent .= "Your Username is: " . $request->email . "\n";
        $emailContent .= "Your password is: " . $randomPassword . "\n";
        
        $emailContent .= "You can login at: " . route('login') . "\n\n";
        $emailContent .= "Thank you.";


        // Send email to user
        Mail::raw($emailContent, function ($message) use ($request) {
            $message->to($request->email)->subject('Welcome to Elite Capital Mortgage');
            $message->from('makedreams.shraddha@gmail.com', 'Elite Capital Mortgage');
        });
}
  

}
