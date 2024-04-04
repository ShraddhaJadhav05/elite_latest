<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use DB;
use Illuminate\Support\Facades\Auth;


class RolesController extends Controller
{

    // permissions functions

    public function all_permissions(Request $request){
        $data['pageTitle']='admin';
        $profileid = Auth::user()->id;
        $adminData = User::find($profileid);

        $searchQuery = $request->input('search');
        $permission = Permission::when($searchQuery, function ($query) use ($searchQuery) {
            $query->where('name', 'like', '%' . $searchQuery . '%');
                  
        })->paginate(10);

        // $permission= Permission::all();
        return view('user.all_permission', compact('permission','data','adminData'));
    }

    public function show_permission(){
        $data['pageTitle']='admin';
        $profileid = Auth::user()->id;
        $adminData = User::find($profileid);
        return view('user.add_permission',compact('data','adminData'));
    }

    public function add_permissions(Request $request){
        
        $permission = Permission::create($request->all());

        $notification = array(
            'message' => 'Permission Added Successfully',
            'alert-type' => 'success',
        );
        return redirect()->route('all.permissions')->withSuccess($notification);

    }

    public function edit_permission($id){
        $data['pageTitle']='admin';
        $profileid = Auth::user()->id;
        $adminData = User::find($profileid);
        $permission=Permission::find($id);
        if(is_null($permission)){
            return response()->json(['message'=> 'not found'],404);
        }
        // return response()->json($lead::find($id),200);
        return view('user.edit_permission', ['permission' => $permission,'data' => $data,'adminData' => $adminData]);
    }

    public function update_permission(Request $request, $id){
        $permission=Permission::find($id);
        if(is_null($permission)){
            return response()->json(['message'=> 'not found'],404);
        }
        $permission->update($request->all());
        // return response($lead,200);
        return redirect()->route('all.permissions')->withSuccess("Data Updated Successfully");
    }

    public function delete_permission(Request $request, $id){
        $permission=Permission::find($id);
        if(is_null($permission)){
            return response()->json(['message'=> 'not found'],404);
        }
        $permission->delete();
        // return response()->json(null,204);
        return redirect()->route('all.permissions')->withSuccess("Data Deleted Successfully");

    }


    
    public function view_permission($id){
        $data['pageTitle']='admin';
        $profileid = Auth::user()->id;
        $adminData = User::find($profileid);
        $permission= Permission::find($id);
        if(is_null($permission)){
            return response()->json(['message'=> 'not found'],404);
        }
        return view('user.view_permission',compact('permission','data','adminData'));
    }



    // Roles Functions

    public function roles_all(Request $request){

        $data['pageTitle']='admin';
        $profileid = Auth::user()->id;
        $adminData = User::find($profileid);
     
        $searchQuery = $request->input('search');
        $roles = Role::when($searchQuery, function ($query) use ($searchQuery) {
            $query->where('name', 'like', '%' . $searchQuery . '%');
                  
        })->paginate(10);

        // $roles= Role::all();
        return view('user.all_roles', compact('roles','data','adminData'));
    }


    public function show_roles(){
        $data['pageTitle']='admin';
        $profileid = Auth::user()->id;
        $adminData = User::find($profileid);
        return view('user.add_roles',compact('data','adminData'));
    }

    public function add_roles(Request $request){
        $role = Role::create($request->all());

        $notification = array(
            'message' => 'Role Added Successfully',
            'alert-type' => 'success',
        );
        return redirect()->route('roles.all')->withSuccess($notification);
    }

    public function edit_roles($id){
        $data['pageTitle']='admin';
        $profileid = Auth::user()->id;
        $adminData = User::find($profileid);
        $role=Role::find($id);
        if(is_null($role)){
            return response()->json(['message'=> 'not found'],404);
        }
        // return response()->json($lead::find($id),200);
        return view('user.edit_roles', ['role' => $role,'data' => $data,'adminData' => $adminData]);
    }

    public function update_roles(Request $request, $id){
        $role=Role::find($id);
        if(is_null($role)){
            return response()->json(['message'=> 'not found'],404);
        }
        $role->update($request->all());
        // return response($lead,200);
        return redirect()->route('roles.all')->withSuccess("Data Updated Successfully");
    }

    public function delete_roles(Request $request, $id){
        $role=Role::find($id);
        if(is_null($role)){
            return response()->json(['message'=> 'not found'],404);
        }
        $role->delete();
        // return response()->json(null,204);
        return redirect()->route('roles.all')->withSuccess("Data Deleted Successfully");

        
    }

   
    public function view_roles($id){
        $data['pageTitle']='admin';
        $profileid = Auth::user()->id;
        $adminData = User::find($profileid);
        $roles= Role::find($id);
        if(is_null($roles)){
            return response()->json(['message'=> 'not found'],404);
        }
        return view('user.view_roles',compact('roles','data','adminData'));
    }



    //user tbl

    public function all_user(Request $request){
        $data['pageTitle']='admin';
        $profileid = Auth::user()->id;
        $adminData = User::find($profileid);

        $searchQuery = $request->input('search');
        $users = user::when($searchQuery, function ($query) use ($searchQuery) {
            $query->where('fname', 'like', '%' . $searchQuery . '%');
                  
        })->paginate(10);

        // $users= user::all();
     
        return view('user.all_user', compact('users','data','adminData'));
    }

    public function show_user(){
        $data['pageTitle']='admin';
        $profileid = Auth::user()->id;
        $adminData = User::find($profileid);
        return view('user.add_user',compact('data','adminData'));
    }



    public function add_user(Request $request){

        $request->merge(['country' => 'United Arab Emirates']);


        
        $randomPassword=Str::random(8);
        $hashRandomPassword=Hash::make($randomPassword);



        $imageName = null; // Initialize imageName variable

        if($request->hasFile("logo")) {
            $file = $request->file("logo");
            $imageName = time() . '_' . $file->getClientOriginalName(); // Generate unique file name
            $file->move(public_path("user_profile/"), $imageName);
        }

        $mergeStaffData=array_merge($request->all(),['password'=>$hashRandomPassword]);

           // Ensure $imageName is included in the data being saved to the database
           $bankData = $mergeStaffData;
           $mergeStaffData['logo'] = $imageName; // Assuming 'logo' is the column name for the image in the database

        $users=user::create($mergeStaffData);
 
            // Define email content
            $emailContent = "Hello " . $request->fname	 . ",\n\n";
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

        $notification = array(
            'message' => 'Role Added Successfully',
            'alert-type' => 'success',
        );
        return redirect()->route('data.userData')->withSuccess($notification);
    }



    
    public function edit_user($id){
        $data['pageTitle']='admin';
        $profileid = Auth::user()->id;
        $adminData = User::find($profileid);
        $users=user::find($id);
        if(is_null($users)){
            return response()->json(['message'=> 'not found'],404);
        }
        // return response()->json($lead::find($id),200);
        return view('user.edit_user', ['users' => $users,'data' => $data,'adminData' => $adminData]);
    }



    public function update_user(Request $request, $id){

        $users=user::find($id);

        if(is_null($users)){
            return response()->json(['message'=> 'not found'],404);
        }

        $imageName = null;
        $oldImagePath = $users->logo; // Assume $bank->logo holds the current image name

        if($request->hasFile("logo")) {
            // Delete the old image if it exists
            if (!is_null($oldImagePath)) {
                $oldImagePath = public_path("user_profile/") . $oldImagePath;
                if (file_exists($oldImagePath)) {
                    @unlink($oldImagePath);
                }
            }

            // Upload and save the new image
            $file = $request->file("logo");
            $imageName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path("user_profile/"), $imageName);
        }

        // Prepare data for updating (excluding the file from the request)
        $userData = $request->except(['logo']);
        if($imageName !=null){
            $userData['logo'] = $imageName; // Update the image name in the array
        }

  
        // Update the bank record
        $users->update($userData);
        // return response($lead,200);
        return redirect()->route('data.userData')->withSuccess("Data Updated Successfully");
    }



    public function delete_user(Request $request, $id){
        $users=user::find($id);
        if(is_null($users)){
            return response()->json(['message'=> 'not found'],404);
        }
        $users->delete();
        // return response()->json(null,204);
        return redirect()->route('data.userData')->withSuccess("Data Deleted Successfully");
    }


    public function view_user($id){
        $data['pageTitle']='admin';
        $profileid = Auth::user()->id;
        $adminData = User::find($profileid);
        $users= user::find($id);
        if(is_null($users)){
            return response()->json(['message'=> 'not found'],404);
        }
        return view('user.view_user',compact('users','data','adminData'));
    }


// role in permission 

    public function show_roles_in_permission(){
        $data['pageTitle']='admin';
        $profileid = Auth::user()->id;
        $adminData = User::find($profileid);
        $roles= Role::all();
        $permission= Permission::all();
        $permission_groups= User::getPermissionGroups();
        return view('user.add_roles_in_permission',compact('roles','permission','permission_groups','data','adminData'));
    }


    public function add_roles_in_permission(Request $request){

        $data = array();
        $permissions = $request->permission;
    
        foreach($permissions as $item){
            $data['role_id'] = $request->role_id;
    
            // Check if $item is an array, and if so, convert it to a string
            if (is_array($item)) {
                $item = implode(',', $item);
            }
    
            $data['permission_id'] = $item;
    
            // Add a dd statement or log here for debugging
            // or log the data using \Log::info($data)
    
            DB::table('role_has_permissions')->insert($data);
        }
    
        return redirect()->route('all.roles.permissions'); 
    }


 

    public function all_roles_in_permission(Request $request){

        $data['pageTitle']='admin';
        $profileid = Auth::user()->id;
        $adminData = User::find($profileid);

        $searchQuery = $request->input('search');
        $roles = Role::when($searchQuery, function ($query) use ($searchQuery) {
            $query->where('fname', 'like', '%' . $searchQuery . '%');
                  
        })->paginate(10);

        // $roles= Role::all();
        return view('user.all_roles_permissions', compact('roles','data','adminData'));
    }

    
    public function edit_roles_in_permission($id){
        $data['pageTitle']='admin';
        $profileid = Auth::user()->id;
        $adminData = User::find($profileid);

        $role = Role::find($id);
        $permissions = Permission::all();
       
        $permission_groups = User::getpermissionGroups();
     
        return view('user.edit_roles_in_permission',compact('role','permissions','permission_groups','data','adminData'));
    }
    

    public function update_roles_in_permission(Request $request, $id)
    {
        $data['pageTitle'] = 'admin';
        $profileid = Auth::user()->id;
        $adminData = User::find($profileid);
    
        $role = Role::findOrFail($id);
        $permissionIds = $request->permission;
    
        // Convert permission IDs to names
        $permissions = Permission::whereIn('id', $permissionIds)->pluck('name')->toArray();
    
        if (!empty($permissions)) {
            $role->syncPermissions($permissions);
        }
    
        return redirect()->route('all.roles.permissions', compact('role', 'data', 'adminData'));
    }

    


    public function view_roles_in_permission(Request $request,$id){
        $data['pageTitle']='admin';
        $profileid = Auth::user()->id;
        $adminData = User::find($profileid);

        $role = Role::find($id);
        $permissions = Permission::all();
       
        $permission_groups = User::getpermissionGroups();
     
        return view('user.view_roles_in_permission',compact('role','permissions','permission_groups','data','adminData'));
    }



    
    public function delete_roles_in_permission($id)
    {
        $role = Role::findOrFail($id);
    
        if (!is_null($role)) {
            $role->delete(); // Use the delete method on the $role object
        }
    
        return redirect()->back();
    }

    
}
