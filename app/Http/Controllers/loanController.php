<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


class loanController extends Controller
{
    public function all_loans(){
        $profileid = Auth::user()->id;
        $adminData = User::find($profileid);
        $data['pageTitle']='loans';
        return view('loans.all_loans',compact('data','adminData'));
    }
}
