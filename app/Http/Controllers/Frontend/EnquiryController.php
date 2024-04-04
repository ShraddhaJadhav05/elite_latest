<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class EnquiryController extends Controller
{
    public function userEnquiry(Request $request)
    {
        log::info('User Enquiry');
        log::info($request);

        if ($request->isMethod('post')) {
            $name       = $request->name;
            $email      = $request->email;
            $phone      = $request->phone;
            $subject    = $request->subject;
            $message    = $request->message;
            $looking_for= $request->looking_for;

            $insert_id  = DB::table('enquiries')
                            ->InsertGetId([
                                'name'          => $name,
                                'email'         => $email,
                                'phone'         => $phone,
                                'subject'       => $subject,
                                'message'       => $message,
                                'looking_for'   => $looking_for,
                                'created_at'    => now(),
                                'updated_at'    => now()
                            ]
                        );
            
            Session::flash('success', "You successfully submit your request");
            return back();
        }
    }
}
