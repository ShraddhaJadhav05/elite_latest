<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use App\Models\PartnersPage; 
use App\Models\AgentPage;

class PartnersController extends Controller
{
    public function partners(Request $request)
    {
        log::info('Partners');
        log::info($request);

        $get_data   = PartnersPage::first();

        return view('frontend/templates/partners',['get_data' => $get_data]);
    }

    public function partnerRegistration(Request $request)
    {
        log::info('Partners Registration');
        log::info($request);

        if ($request->isMethod('post')) {
            $first_name         = $request->first_name;
            $last_name          = $request->last_name;
            $email              = $request->email;
            $phone              = $request->phone;
            $password           = $request->password;
            $confirm_password   = $request->confirm_password;

            if($password != $confirm_password)
            {
                Session::flash('error', "Passwords do not match");
                return back();
            }

            $insert_id  = DB::table('partners')
                            ->InsertGetId([
                                'first_name'    => $first_name,
                                'last_name'     => $last_name,
                                'email'         => $email,
                                'phone'         => $phone,
                                'password'      => Hash::make($password),
                                'created_at'    => now(),
                                'updated_at'    => now()
                            ]
                        );
            
            Session::flash('success', "You successfully registered");
            return back();
        }

        return view('frontend/templates/partner_registration');
    }

    public function agent(Request $request)
    {
        log::info('agent');
        log::info($request);

        $get_data   = PartnersPage::first();

        return view('frontend/templates/agent',['get_data' => $get_data]);
    }
}
