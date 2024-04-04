<?php

namespace App\Http\Controllers\Mortgage\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;
use App\Mail\client\OtpVerification;
use Illuminate\Support\Facades\Hash;
use App\Models\ContactUs;
use App\Models\client;

class ClientController extends Controller
{
    public function clientSignup(Request $request)
    {
        log::info('Client Signup');
        log::info($request);

        header("cache-Control: no-store, no-cache, must-revalidate");
        header("cache-Control: post-check=0, pre-check=0", false);
        header("Pragma: no-cache");

        if ($request->isMethod('post')) {

            $name       = $request->name;
            $email      = $request->email;
            $password   = $request->password;
            $terms      = $request->terms;

            $client_data= client::where('email','=',$email)->get();

            if($client_data->isNotEmpty())
            {
                Session::flash('error', "A user with this email already exists");
                return back();
            }

            $request->session()->put('name', $name);
            $request->session()->put('email', $email);
            $request->session()->put('password', $password);
            $request->session()->put('terms', $terms);

            $this->generateOtpSendMail($email);

            return redirect()->route('optVerification');
        }

        return view('mortgage/client/signup');
    }

    public function optVerification(Request $request)
    {
        log::info('Client otp Verification');
        log::info($request);

        header("cache-Control: no-store, no-cache, must-revalidate");
        header("cache-Control: post-check=0, pre-check=0", false);
        header("Pragma: no-cache");

        if ($request->isMethod('post')) {

            $otp            = request('otp');

            $recevie_otp    = session()->get('otp');

            if($otp == $recevie_otp)
            {
                $name       = session()->get('name');
                $email      = session()->get('email');
                $password   = session()->get('password');
                $terms      = session()->get('terms');

                $insert_id  = DB::table('clients')
                                ->InsertGetId([
                                    'first_name'    => $name,
                                    'email'         => $email,
                                    'password'      => Hash::make($password),
                                    'created_at'    => now(),
                                    'updated_at'    => now()
                                ]);

                session()->flush();
                $request->session()->put('client_id', $insert_id);

                return redirect()->route('clientDashboard');
            }
            else
            {
                Session::flash('error', "Invalid OTP");
                return back();
            }
        }

        $email  = session()->get('email');

        if(!$email)
        {
            return redirect()->route('clientSignup');
        }

        $masked_email   = $this->maskedEmail($email);


        return view('mortgage/client/otp_verification',['masked_email'  => $masked_email]);
    }

    public function generateOtpSendMail($email)
    {
        $otp    = rand(0, 999999); // Generate OTP

        // Ensure OTP has six digits
        $otp    = str_pad($otp, 6, '0', STR_PAD_LEFT);

        Log::info($otp); // Log the OTP

        // Store OTP in session
        session()->put('otp', $otp);
        session()->save();

        // Fetch contact details
        $contactData    = ContactUs::first();
        $contactEmail   = $contactData->email;
        $contactPhone   = $contactData->phone;

        // Send OTP verification email
        Mail::to($email)->send(new OtpVerification($otp, $email, $contactEmail, $contactPhone));
    }


    public function maskedEmail($email)
    {
        $atIndex            = strpos($email, '@');

        if ($atIndex !== false) {
            $username       = substr($email, 0, $atIndex);
            $numStars       = min(6, strlen($username)); // Ensure maximum of 6 asterisks
            // Mask the username with asterisks
            $maskedUsername = str_repeat('*', $numStars);

            
            $maskedEmail    = $maskedUsername . substr($email, $atIndex);

            return $maskedEmail; // Output: ******@example.com
        } 
    }


    public function clientLogin(Request $request)
    {
        log::info('Client Login');
        log::info($request);

        header("cache-Control: no-store, no-cache, must-revalidate");
        header("cache-Control: post-check=0, pre-check=0", false);
        header("Pragma: no-cache");

        if ($request->isMethod('post')) {
            $email          = request('email');
            $password       = request('password');

            $client_data    = DB::table('clients')
                                    ->where('email','=',$email)
                                    ->select('id','password')
                                    ->get();

            if($client_data->isEmpty())
            {
                Session::flash('error', "Wrong Email or Password");
                return back();
            }
            if(!Hash::check($password, $client_data[0]->password))
            { 
                Session::flash('error', "Wrong Email or Password");//can't login
                return back();   
            }

            //store admin id in session
            $request->session()->put('client_id', $client_data[0]->id);
            session()->save();

            return redirect()->route('clientDashboard');
        }
        return view('mortgage/client/signin');
    }
    

    public function clientLogout(Request $request)
    {
        log::info('client logout');
        log::info($request);

        header("cache-Control: no-store, no-cache, must-revalidate");
        header("cache-Control: post-check=0, pre-check=0", false);
        header("Pragma: no-cache");
   
        //delete data from session
        if(session()->has('client_id'))
        {
            session()->pull('client_id');
            session()->flush();
        }
        return redirect()->route('clientLogin');
    }


    public function clientDashboard(Request $request)
    {
        log::info('Client Dashboard');
        log::info($request);

        header("cache-Control: no-store, no-cache, must-revalidate");
        header("cache-Control: post-check=0, pre-check=0", false);
        header("Pragma: no-cache");

        if(session()->has('client_id'))
        {
            return view('mortgage/client/dashboard');
        }
        return redirect()->route('clientLogin');
    }


    public function clientViewProfile(Request $request)
    {
        log::info('Client View Profile');
        log::info($request);

        header("cache-Control: no-store, no-cache, must-revalidate");
        header("cache-Control: post-check=0, pre-check=0", false);
        header("Pragma: no-cache");

        if(session()->has('client_id'))
        {
            $client_id  = session()->get('client_id');
            $user_data  = client::where('id','=',$client_id)->first();

            return view('mortgage/client/view_profile',
                    [
                        'user_data' => $user_data
                    ]);
        }
        return redirect()->route('clientLogin');
    }


    public function clientEditProfile(Request $request)
    {
        log::info('Client Edit Profile');
        log::info($request);

        header("cache-Control: no-store, no-cache, must-revalidate");
        header("cache-Control: post-check=0, pre-check=0", false);
        header("Pragma: no-cache");

        if(session()->has('client_id'))
        {
            if ($request->isMethod('post')) {
                $client_id      = session()->get('client_id');
                $first_name     = request('first_name');
                $last_name      = request('last_name');
                $user_name      = request('user_name');
                $city           = request('city');
                $gender         = request('gender');
                $birth_date     = request('birth_date');
                $marital_status = request('marital_status');
                $age            = request('age');
                $country        = request('country');
                $emirates       = request('emirates');
                $address_line1  = request('address_line1');
                $address_line2  = request('address_line2');
                $image_file     = request('image_file');

                $update_data    =  DB::table('clients')
                                        ->where('id', $client_id)
                                        ->update([
                                            'first_name'    => $first_name,
                                            'last_name'     => $last_name,
                                            'user_name'     => $user_name,
                                            'city'          => $city,
                                            'gender'        => $gender,
                                            'birth_date'    => $birth_date,
                                            'marital_status'=> $marital_status,
                                            'age'           => $age,
                                            'country'       => $country,
                                            'emirates'      => $emirates,
                                            'address_line1' => $address_line1,
                                            'address_line2' => $address_line2,
                                            'updated_at'    => now()
                                    ]);

                if($image_file)
                {
                    $image      = DB::table('clients')->where('id','=',$client_id) ->value('profile_image');

                    if($image != NULL && file_exists(public_path('mortgage/client/image_uploads/'.$image)))
                    {
                        //remove from image uploads
                        unlink("mortgage/client/image_uploads/".$image);
                    }

                    $destinationPath    = 'mortgage/client/image_uploads';
                    $filename           = $image_file->getClientOriginalName();
                    $savedFileName      = strval($client_id)."_".date('Ymdhis')."_".$filename;
                    $path               = $image_file->move($destinationPath, $savedFileName);
                    
                    $update_image       =  DB::table('clients')
                                            ->where('id', $client_id)
                                            ->update([
                                                'profile_image' => $savedFileName,
                                                'updated_at'    => now()
                                            ]);
                }

                Session::flash('success', "Your profile successfully updated");
                return back();
            }

            $client_id  = session()->get('client_id');
            $user_data  = client::where('id','=',$client_id)->first();

            return view('mortgage/client/edit_profile',
                    [
                        'user_data' => $user_data
                    ]);
        }
        return redirect()->route('clientLogin');
    }


    public function clientChangePassword(Request $request)
    {
        log::info('Client change password');
        log::info($request);

        header("cache-Control: no-store, no-cache, must-revalidate");
        header("cache-Control: post-check=0, pre-check=0", false);
        header("Pragma: no-cache");

        if(session()->has('client_id'))
        {
            if ($request->isMethod('post')) {
                $client_id          = session()->get('client_id');
                $current_password   = request('current_password');
                $new_password       = request('new_password');
                $verify_password    = request('verify_password');

                $client_data        = DB::table('clients')
                                        ->where('id','=',$client_id)
                                        ->first();

                if(!Hash::check($current_password, $client_data->password))
                { 
                    Session::flash('password_error', "Your current password is incorrect");
                    return redirect()->back()->withInput()->with('tab', 'chang-pwd');
                }
                else if($new_password != $verify_password)
                {
                    Session::flash('password_error', "Password not matching");
                    return redirect()->back()->withInput()->with('tab', 'chang-pwd');
                }
                

                $update_data    =  DB::table('clients')
                                        ->where('id', $client_id)
                                        ->update([
                                            'password'      => Hash::make($verify_password),
                                            'updated_at'    => now()
                                    ]);

                Session::flash('password_success', "Your password changes successfully");
                return redirect()->back()->withInput()->with('tab', 'chang-pwd');
            }
            return redirect()->back();
        }
        return redirect()->route('clientLogin');
    }


    public function clientNotificationPermission(Request $request)
    {
        log::info('Client change password');
        log::info($request);

        header("cache-Control: no-store, no-cache, must-revalidate");
        header("cache-Control: post-check=0, pre-check=0", false);
        header("Pragma: no-cache");

        if(session()->has('client_id'))
        {
            if ($request->isMethod('post')) {
                $client_id                              = session()->get('client_id');
                $enable_email_notification              = request('enable_email_notification') == 'true' ? true : false;
                $enable_sms_notification                = request('enable_sms_notification') == 'true' ? true : false;
                $when_to_mail_notification              = request('when_to_mail_notification') == 'true'  ? true : false;
                $when_to_mail_direct_message            = request('when_to_mail_direct_message') == 'true'  ? true : false;
                $when_to_mail_connection                = request('when_to_mail_connection') == 'true'  ? true : false;
                $when_to_escalate_order                 = request('when_to_escalate_order') == 'true' ? true : false;
                $when_to_escalate_membership_approval   = request('when_to_escalate_membership_approval') == 'true' ? true : false;
                $when_to_escalate_member_registration   = request('when_to_escalate_member_registration') == 'true' ? true : false;
                

                $update_client_data                     =  DB::table('clients')
                                                                ->where('id', $client_id)
                                                                ->update([
                                                                    'enable_email_notification'             => $enable_email_notification,
                                                                    'enable_sms_notification'               => $enable_sms_notification,
                                                                    'when_to_mail_notification'             => $when_to_mail_notification,
                                                                    'when_to_mail_direct_message'           => $when_to_mail_direct_message,
                                                                    'when_to_mail_connection'               => $when_to_mail_connection,
                                                                    'when_to_escalate_order'                => $when_to_escalate_order,
                                                                    'when_to_escalate_membership_approval'  => $when_to_escalate_membership_approval,
                                                                    'when_to_escalate_member_registration'  => $when_to_escalate_member_registration,
                                                                    'updated_at'                            => now()
                                                            ]);

                Session::flash('email_success', "Your password changes successfully");
                return redirect()->back()->withInput()->with('tab', 'emailandsms');
            }
            return redirect()->back();
        }
        return redirect()->route('clientLogin');
    }


    public function clientManageContacts(Request $request)
    {
        log::info('Client manage contacts');
        log::info($request);

        header("cache-Control: no-store, no-cache, must-revalidate");
        header("cache-Control: post-check=0, pre-check=0", false);
        header("Pragma: no-cache");

        if(session()->has('client_id'))
        {
            if ($request->isMethod('post')) {
                $client_id      = session()->get('client_id');
                $phone_number   = request('phone_number');
                $email          = request('email');
                $url            = request('url');
                

                $update_data    =  DB::table('clients')
                                        ->where('id', $client_id)
                                        ->update([
                                            'phone_number'  => $phone_number,
                                            'email'         => $email,
                                            'url'           => $url,
                                            'updated_at'    => now()
                                    ]);

                Session::flash('contact_success', "Your password changes successfully");
                return redirect()->back()->withInput()->with('tab', 'manage-contact');
            }
            return redirect()->back();
        }
        return redirect()->route('clientLogin');
    }


    public function clientForgotPasswordSendEmail(Request $request)
    {
        log::info('Client Forgot Password - Send Email otp');
        log::info($request);

        header("cache-Control: no-store, no-cache, must-revalidate");
        header("cache-Control: post-check=0, pre-check=0", false);
        header("Pragma: no-cache");

        if ($request->isMethod('post')) {

            $email  = $request->email;
            $request->session()->put('email', $email);

            $this->generateOtpSendMail($email);

            return redirect()->route('optVerificationForgotPassword');
        }

        return view('mortgage/client/email_forgot_password');
    }

    public function optVerificationForgotPassword(Request $request)
    {
        log::info('Client otp Verification - Forgot Password');
        log::info($request);

        header("cache-Control: no-store, no-cache, must-revalidate");
        header("cache-Control: post-check=0, pre-check=0", false);
        header("Pragma: no-cache");

        if ($request->isMethod('post')) {

            $otp            = request('otp');

            $recevie_otp    = session()->get('otp');

            if($otp == $recevie_otp)
            {
                return redirect()->route('setForgotPassword');
            }
            else
            {
                Session::flash('error', "Invalid OTP");
                return back();
            }
        }

        $email  = session()->get('email');

        if(!$email)
        {
            return redirect()->route('clientSignup');
        }

        $masked_email   = $this->maskedEmail($email);

        return view('mortgage/client/otp_verification_forgot_password',['masked_email'  => $masked_email]);
    }


    public function setForgotPassword(Request $request)
    {
        log::info('Client set Forgot Password');
        log::info($request);

        header("cache-Control: no-store, no-cache, must-revalidate");
        header("cache-Control: post-check=0, pre-check=0", false);
        header("Pragma: no-cache");

        if ($request->isMethod('post')) {

            $email              = session()->get('email');
            $new_password       = request('new_password');
            $confirm_password   = request('confirm_password');

            if($new_password != $confirm_password)
            {
                Session::flash('error', "Pasword not matching");
                return back();
            }

            $client_data= client::where('email','=',$email)->first();
            $client_id  = $client_data->id;

            $update_data=  DB::table('clients')
                            ->where('id', $client_id)
                            ->update([
                                'password'      => Hash::make($confirm_password),
                                'updated_at'    => now()
                            ]);

            return redirect()->route('resetPasswordSuccess');
        }
        if(session()->has('email'))
        {
            return view('mortgage/client/set_forgot_password');
        }
        return redirect()->route('clientDashboard');
    }

    public function resetPasswordSuccess(Request $request) ###-- forgotpassword success
    {
        log::info('success screen - forgotpassword');
        log::info($request);

        header("cache-Control: no-store, no-cache, must-revalidate");
        header("cache-Control: post-check=0, pre-check=0", false);
        header("Pragma: no-cache");
        
        if(session()->has('email'))
        {
            session()->flush();
            return view('mortgage/client/forgot_password_success');
        }
        return redirect()->route('clientDashboard');
    }


    public function clientResetPassword(Request $request)
    {
        log::info('Client reset password');
        log::info($request);

        header("cache-Control: no-store, no-cache, must-revalidate");
        header("cache-Control: post-check=0, pre-check=0", false);
        header("Pragma: no-cache");

        if(session()->has('client_id'))
        {
            if ($request->isMethod('post')) {
                $client_id          = session()->get('client_id');
                $current_password   = request('current_password');
                $new_password       = request('new_password');
                $verify_password    = request('verify_password');

                $client_data        = DB::table('clients')
                                        ->where('id','=',$client_id)
                                        ->first();

                if(!Hash::check($current_password, $client_data->password))
                { 
                    Session::flash('password_error', "Your current password is incorrect");
                    return redirect()->back()->withInput()->with('tab', 'chang-pwd');
                }
                else if($new_password != $verify_password)
                {
                    Session::flash('password_error', "Password not matching");
                    return redirect()->back()->withInput()->with('tab', 'chang-pwd');
                }
                

                $update_data    =  DB::table('clients')
                                        ->where('id', $client_id)
                                        ->update([
                                            'password'      => Hash::make($verify_password),
                                            'updated_at'    => now()
                                    ]);

                Session::flash('password_success', "Your password changes successfully");
                return redirect()->back();
            }
            return view('mortgage/client/reset_password');
        }
        return redirect()->route('clientLogin');
    }
}
