<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\User;
use App\Models\staff;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class StaffProfileController  extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        $data['pageTitle']='dashboard';


        $profileid = Auth::user()->id;
        $staffData = User::find($profileid);
     
        return view('staff.editprofile',compact('staffData','data'));
        
        // return view('profile.edit', [
        //     'user' => $request->user(),
        // ]);
    }

    public function show_reset_password(){
        $data['pageTitle']='dashboard';


        $profileid = Auth::user()->id;
        $staffData = User::find($profileid);

        return view('staff.reset-password',compact('staffData','data'));
    }

    public function update_password(Request $request){
        $validator = Validator::make($request->all(), [
            'password' => 'required',
            'new_password' => 'required|min:6|confirmed',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $user = Auth::user();

        // Verify the current password
        if (!Hash::check($request->password, $user->password)) {
            return back()->withErrors(['password' => 'The current password is incorrect.'])->withInput();
        }

        // Update the user's password
        $user->password = Hash::make($request->new_password);
        $user->save();

        Auth::logout();
        return redirect()->route('ec-staff')->with('success', 'Password updated successfully.');

}

    public function update(Request $request,$id)
    {
        $data['pageTitle']='dashboard';
        $request->merge(['country' => 'United Arab Emirates']);
        $staffData=User::find($id);

        $staffs=Staff::where('user_id',$id);

      

        if(is_null($staffData)){
            return response()->json(['message'=>'not found'],404);
        }

        $imageName = null;
        $oldImagePath = $staffData->logo; // Assume $bank->logo holds the current image name

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
    
     
        $staffData->update($userData);

        $staffData->update($userData);
        if(!empty($staffs)){
            $staff_userdata = [
                'first_name' => $staffData->fname,
                'last_name' => $staffData->lname,
                'city' => $staffData->city,
                'gender' => $staffData->gender, 
                'birth_date' => $staffData->dob,
                'country' => $staffData->country,
                'address_line1' => $staffData->address,
            ];
            $staffs->update($staff_userdata);
        }
        
        return view('staff.editprofile',compact('staffData','data'))->withSuccess('Data Updated Successfully');

    }

    /**
     * Delete the user's account.
     */
    // public function destroy(Request $request): RedirectResponse
    // {
    //     $request->validateWithBag('userDeletion', [
    //         'password' => ['required', 'current_password'],
    //     ]);

    //     $user = $request->user();

    //     Auth::logout();

    //     $user->delete();

    //     $request->session()->invalidate();
    //     $request->session()->regenerateToken();

    //     return Redirect::to('/');
    // }


}
