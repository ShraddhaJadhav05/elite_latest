<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Models\User;


class AdminController extends Controller
{
    public function AdminDashboard(){
        $profileid = Auth::user()->id;
        $adminData = User::find($profileid);

        $data['pageTitle']='dashboard';

        return view("admin.index",compact('data','adminData'));
    }

    public function AdminDestroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('ec-admin');
    }


    public function AdminDestroystaff(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('ec-staff');
    }



    public function login(){
        return view('auth.login');
    }

    public function staff_login(){
        return view('auth.staff_login');
    }
}
