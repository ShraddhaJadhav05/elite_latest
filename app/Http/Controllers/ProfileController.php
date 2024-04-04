<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;


class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        $data['pageTitle']='dashboard';


        $profileid = Auth::user()->id;
        $adminData = User::find($profileid);
     
        return view('admin.editprofile',compact('adminData','data'));
        
        // return view('profile.edit', [
        //     'user' => $request->user(),
        // ]);
    }

    public function show_reset_password(){
        $data['pageTitle']='dashboard';


        $profileid = Auth::user()->id;
        $adminData = User::find($profileid);

        return view('admin.reset-password',compact('adminData','data'));
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
        return redirect()->route('ec-admin')->with('success', 'Password updated successfully.');

}

    public function update(Request $request,$id)
    {
        $data['pageTitle']='dashboard';
        $request->merge(['country' => 'United Arab Emirates']);
        $adminData=User::find($id);
        if(is_null($adminData)){
            return response()->json(['message'=>'not found'],404);
        }

        $imageName = null;
        $oldImagePath = $adminData->logo; // Assume $bank->logo holds the current image name

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
    
     
        $adminData->update($userData);
        return view('admin.editprofile',compact('adminData','data'))->withSuccess('Data Updated Successfully');

    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }


}
