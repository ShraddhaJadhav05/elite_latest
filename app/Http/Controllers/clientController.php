<?php

namespace App\Http\Controllers;
use App\Models\Lead;
use App\Models\staff;
use App\Models\client;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Auth;
use App\Models\client_staff;
use App\Models\User;
use App\Models\ClientDocument;


use Illuminate\Http\Request;

class clientController extends Controller
{


    public function all_clients(Request $request){
        $profileid = Auth::user()->id;
        $adminData = User::find($profileid);

        $data['pageTitle']='clients';
        $searchQuery = $request->input('search');
        $clients = client::with('staff')
        ->when($searchQuery, function ($query) use ($searchQuery) {
            $query->where('first_name', 'like', '%' . $searchQuery . '%')
                  ->orWhere('phone_number', 'like', '%' . $searchQuery . '%')
                  ->orWhere('email', 'like', '%' . $searchQuery . '%');
        })->paginate(10);

        // $clients=client::paginate(10);
        $staff=staff::all();
        return view('clients.all_clients', compact('clients','data','adminData','staff'));
    }

    public function view_client($id){
        $profileid = Auth::user()->id;
        $adminData = User::find($profileid);

        $data['pageTitle']='clients';
        $client=client::find($id);
        if(is_null($client)){
            return response()->json(['message'=> 'not found'],404);
        }
        // return response()->json($lead::find($id),200);
        return view('clients.client_view', ['client' => $client,'data' => $data,'adminData' => $adminData]);
    }

    public function show_client(){
        $profileid = Auth::user()->id;
        $adminData = User::find($profileid);
        $data['pageTitle']='clients';
        $staff=staff::all();
        return view('clients.add_clients',compact('data','adminData','staff'));
    }

    public function add_client(Request $request){

        $request->merge(['residence_country' => 'United Arab Emirates']);

        $randomPassword=Str::random(8);
        $hashRandomPassword=Hash::make($randomPassword);
        // $encryptedPassword = Crypt::encrypt($randomPassword);
        // $decryptedPassword = Crypt::decrypt($encryptedPassword);

        $mergeclientData=array_merge($request->all(),['password'=>$hashRandomPassword]);

        $client = client::create($mergeclientData);
        $latestclientId = $client->id;

        $user = User::create([
            'fname' => $client->first_name,
            'lname' => $client->last_name,
            'email' => $client->email,
            'password' => $client->password, 
            'role' => 'client',
        ]);
        if ($user) {
        Client::where('id', $latestclientId)->update(['user_id' => $user->id]);
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
    
        return redirect()->route('all.clients')->withSuccess("Data Inserted Successfully");
    }

    public function edit_client($id){
        $profileid = Auth::user()->id;
        $adminData = User::find($profileid);
        $data['pageTitle']='clients';
        $client=client::find($id);
        if(is_null($client)){
            return response()->json(['message'=> 'not found'],404);
        }
         $staff=staff::all();
        // return response()->json($lead::find($id),200);
        return view('clients.client_edit', ['client' => $client,'data' => $data,'adminData' => $adminData,'staff'=>$staff]);
    }

    public function update_client(Request $request,$id){
        $client=client::find($id);
        if(is_null($client)){
            return response()->json(['message'=> 'not found'],404);
        }
        $client->update($request->all());
        // return response($lead,200);
        return redirect()->route('all.clients')->withSuccess("Data Updated Successfully");
    }

    public function delete_client(Request $request,$id){
        $client=client::find($id);
        if(is_null($client)){
            return response()->json(['message'=> 'not found'],404);
        }
        
        $client->delete();
        // return response()->json(null,204);
        return redirect()->route('all.clients')->withSuccess("Data Deleted Successfully");
    }

    public function assignStaff(Request $request)
    {
    
        $data['pageTitle']='clients';
        $ClientId = $request->client_id;
        $staffId = $request->staff_id;
        $client_doc = ClientDocument::where('client_id', $ClientId)->update(['staff_id' => $staffId]);
        $existingAssignment = client::where('id', $ClientId)->update(['staff_id' => $staffId]);
    
        // Check if the lead is already assigned to the selected staff
        // $existingAssignment = client_staff::where('client_id', $ClientId)
        //                                 ->where('staff_id', $staffId)
        //                                 ->exists();
        // if ($existingAssignment) {
        //     return response()->json(['error' => 'Client is already assigned to this staff.'], 400);
        // }
     
        // If not already assigned, proceed with assignment
        //client_staff::create($request->all());
    
        // return redirect()->back()->with('success', 'Staff assigned successfully.',compact('data'));
        return response()->json(['success' => 'Staff assigned successfully.'], 200);
    
    }
}
