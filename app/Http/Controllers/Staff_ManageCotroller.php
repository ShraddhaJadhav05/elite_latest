<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\staff;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
// use App\Mail\StaffCredentials;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;


class Staff_ManageCotroller extends Controller
{
    public function all_staff(Request $request){
        $profileid = Auth::user()->id;
        $adminData = User::find($profileid);

        $data['pageTitle']='staff';
        $searchQuery = $request->input('search');
        $staff = staff::when($searchQuery, function ($query) use ($searchQuery) {
            $query->where('first_name', 'like', '%' . $searchQuery . '%')
                  ->orWhere('phone_number', 'like', '%' . $searchQuery . '%')
                  ->orWhere('email', 'like', '%' . $searchQuery . '%');
        })->paginate(10);

        $sales_role= Role::where('role_type', 'sales')->get();

        // $staff=staff::paginate(10);
        return view('staff.staffManage.all_staff',compact('staff','sales_role','data','adminData'));
    }

    public function show_staff(){
        $profileid = Auth::user()->id;
        $adminData = User::find($profileid);
        $data['pageTitle']='staff';

         $sales_role= Role::where('role_type', 'sales')->get();
        return view('staff.staffManage.add_staff',compact('sales_role','data','adminData'));
    }

    public function add_staff(Request $request){

        //dd($request);
        $request->validate([
            'first_name' => 'required',
        ]);

        // $request->merge(['country' => 'United Arab Emirates']);
        $randomPassword=Str::random(8);
        $hashRandomPassword=Hash::make($randomPassword);
        // $encryptedPassword = Crypt::encrypt($randomPassword);
        // $decryptedPassword = Crypt::decrypt($encryptedPassword);

        $mergeStaffData=array_merge($request->all(),['password'=>$hashRandomPassword]);
        

        $staff=staff:: create($mergeStaffData);
        $lateststaffId = $staff->id;

        $user = User::create([
            'fname' => $staff->first_name,
            'lname' => $staff->last_name,
            'email' => $staff->email,
            'password' => $staff->password, 
            'role' => 'staff',
        ]);
        if ($user) {
        Staff::where('id', $lateststaffId)->update(['user_id' => $user->id]);
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
    
        return redirect()->route('all.staff')->withSuccess('Data Iserted Successfully');
    }

    public function view_staff($id){
        $profileid = Auth::user()->id;
        $adminData = User::find($profileid);
        $data['pageTitle']='staff';

        $staff= staff::find($id);
        if(is_null($staff)){
            return response()->json(['message'=> 'not found'],404);
        }
        $sales_role= Role::where('role_type', 'sales')->get();
        return view('staff.staffManage.view_staff',compact('staff','sales_role','data','adminData'));
    }

    public function edit_staff($id){
        $profileid = Auth::user()->id;
        $adminData = User::find($profileid);
        $data['pageTitle']='staff';

        $staff= staff::find($id);
        $sales_role= Role::where('role_type', 'sales')->get();
        if(is_null($staff)){
            return response()->json(['message'=> 'not found'],404);
        }
        return view('staff.staffManage.edit_staff',compact('staff','sales_role','data','adminData'));
    }

    public function update_staff(Request $request,$id){

        $request->validate([
            'name' => 'required',
        ]);


        $staff=staff::find($id);
        if(is_null($staff)){
            return response()->json(['message'=>'not found'],404);
        }
        $staff->update($request->all());
        return redirect()->route('all.staff')->withSuccess('Data Updated Successfully');

    }

    public function delete_staff(Request $request,$id){
        $staff=staff::find($id);
        if(is_null($staff)){
            return response()->json(['message'=>'not found'],404);
        }
        $staff->delete();
        return redirect()->route('all.staff')->withSuccess('Data Deleted Successfully');
    }

    public function check_email(Request $request){
        $data['pageTitle']='staff';

        $emails= $request->input('email');
        $exists= User::where('email',$emails)->exists();
        return response()->json(['exists' => $exists,'data' => $data]);
    }

    public function all_roles(){
        $profileid = Auth::user()->id;
        $adminData = User::find($profileid);
        $data['pageTitle']='staff';

         $sales_role= Role::where('role_type', 'sales')->get();
         //dd($sales_role);
        return view('staff.staffManage.roles',compact('sales_role','data','adminData'));
    }

    public function get_sales_roles(){
        $profileid = Auth::user()->id;
        $adminData = User::find($profileid);
        $data['pageTitle']='staff';

         $sles_roles= Role::where('role_type', 'sales')->get();
         //dd($sles_roles);
        return view('staff.staffManage.add_staff','data','adminData');
    }
}
