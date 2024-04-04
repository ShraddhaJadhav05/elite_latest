<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use App\Models\staff;
use App\Models\client;
use Illuminate\Support\Facades\Mail;

class Staffcustomer_ClientController extends Controller
{

   
    public function new_loan_applicationsss(Request $request){
        $profileid = Auth::user()->id;
        $adminData = User::with('staff')
        ->where('id',$profileid)
        ->first();
        $data['pageTitle']='staff_customer_lead';
        $searchQuery = $request->input('search');
        $clients = client::where('staff_id',$adminData->staff->id ?? '')
        ->when($searchQuery, function ($query) use ($searchQuery) {
            $query->where('first_name', 'like', '%' . $searchQuery . '%')
                  ->orWhere('phone_number', 'like', '%' . $searchQuery . '%')
                  ->orWhere('email', 'like', '%' . $searchQuery . '%');
        })->paginate(10);
        $staff=staff::all();

        return view('staff_portal_file.staff_customer_clients.all_client_staff', compact('clients','data','adminData','staff'));

    }


    public function new_show_clients(){
        $profileid = Auth::user()->id;
        $adminData = User::find($profileid);
        $data['pageTitle']='staff_customer_lead';
        return view('staff_portal_file.staff_customer_clients.add_clients_staff',compact('data','adminData'));
    }


    public function new_add_clients(Request $request){

        $request->merge(['residence_country' => 'United Arab Emirates']);

        $randomPassword=Str::random(8);
        $hashRandomPassword=Hash::make($randomPassword);
        // $encryptedPassword = Crypt::encrypt($randomPassword);
        // $decryptedPassword = Crypt::decrypt($encryptedPassword);

        $mergeclientData=array_merge($request->all(),['password'=>$hashRandomPassword]);

        $clients = client::create($mergeclientData);
        

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
    
        return redirect()->route('loan.clients')->withSuccess("Data Inserted Successfully");
    }


    
    public function new_view_clients($id){
        $profileid = Auth::user()->id;
        $adminData = User::find($profileid);

        $data['pageTitle']='staff_customer_lead';
        $clients=client::find($id);
        if(is_null($clients)){
            return response()->json(['message'=> 'not found'],404);
        }
        // return response()->json($lead::find($id),200);
        return view('staff_portal_file.staff_customer_clients.all_client_view', ['clients' => $clients,'data' => $data,'adminData' => $adminData]);
    }
    

    public function new_edit_clients($id){
        $profileid = Auth::user()->id;
        $adminData = User::find($profileid);
        $data['pageTitle']='staff_customer_lead';
        $clients=client::find($id);
        if(is_null($clients)){
            return response()->json(['message'=> 'not found'],404);
        }
        // return response()->json($lead::find($id),200);
        return view('staff_portal_file.staff_customer_clients.all_client_edit', ['clients' => $clients,'data' => $data,'adminData' => $adminData]);
    }

    public function new_update_clients(Request $request,$id){
        $clients=client::find($id);
        if(is_null($clients)){
            return response()->json(['message'=> 'not found'],404);
        }
        $clients->update($request->all());
        // return response($lead,200);
        return redirect()->route('loan.clients')->withSuccess("Data Updated Successfully");
    }



    public function delete_clients(Request $request,$id){
        $clients=client::find($id);
        if(is_null($clients)){
            return response()->json(['message'=> 'not found'],404);
        }
        
        $clients->delete();
        // return response()->json(null,204);
        return redirect()->route('loan.clients')->withSuccess("Data Deleted Successfully");
    }

}
