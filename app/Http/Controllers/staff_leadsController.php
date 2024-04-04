<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\lead_staff;
use App\Models\Lead;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;


class staff_leadsController extends Controller
{
    
    
    public function all_staff_leads(){
        $profileid = Auth::user()->id;
        $adminData = User::with('staff')
        ->where('id',$profileid)
        ->first();
        $data['pageTitle'] = 'staff_customer_lead';
        $userEmail = Auth::user()->email;
        $staff_leads = Lead::where('staff_id',$adminData->staff->id ?? '')
        ->get();

        return view('staff_leads.staff_lead_list', compact('staff_leads','data'));
    }

    public function show_staff_leads(){
        return view('staff_leads.staff_lead_add');
    }

    public function add_staff_leads(Request $request){
        // $randomPassword=Str::random(8);

        // $hashRandomPassword=Hash::make($randomPassword);

        // $mergeUserData=array_merge($request->all(),['password'=>$hashRandomPassword]);

        $staff_leads=Lead::create($request->all());


        return redirect()->route('show.staff.leads')->withSuccess("Data Inserted Successfully");
    }

    public function edit_staff_leads($id){
        $staff_leads=Lead::find($id);
        if(is_null($staff_leads)){
            return response()->json(['message'=> 'not found'],404);
        }

        return view('staff_leads.staff_lead_edit', ['staff_leads' => $staff_leads]);

    }

    public function update_staff_leads(Request $request,$id){
        $staff_leads=Lead::find($id);
        if(is_null($staff_leads)){
            return response()->json(['message'=> 'not found'],404);
        }

        $staff_leads->update($request->all());

        return redirect()->route('all.staff_leads')->withSuccess("Data Updated Successfully");

    }

    public function update_category_flag(Request $request)
    {
        $leadId = $request->input('lead_id');
        $categoryFlag = $request->input('category_flag');

        // Find the lead
        $lead = Lead::findOrFail($leadId);

        // Update the category_flag
        $lead->category_flag = $categoryFlag;
        $lead->save();

        return response()->json(['success' => true]);
    }

    public function check_email_staff_leads(Request $request){
        $emails= $request->input('email');
        $exists= User::where('email',$emails)->exists();
        return response()->json(['exists' => $exists]);
    }

    public function user_credentials(Request $request){
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
