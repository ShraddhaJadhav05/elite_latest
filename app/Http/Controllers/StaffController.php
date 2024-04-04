<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


class StaffController extends Controller
{
    public function StaffDashboard(){
        $data['pageTitle']='dashboard';
        $profileid = Auth::user()->id;
        $adminData = User::find($profileid);

        return view("staff.index",compact('adminData','data'));    
    }
}
