<?php

namespace App\Http\Controllers\Mortgage\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class MortgageController extends Controller
{
    public function clientMortgageCalculatorStep1(Request $request)
    {
        log::info('Client Mortgage Calculator step 1');
        log::info($request);

        header("cache-Control: no-store, no-cache, must-revalidate");
        header("cache-Control: post-check=0, pre-check=0", false);
        header("Pragma: no-cache");

        if(session()->has('client_id'))
        {
            if ($request->isMethod('post')) {
                
                $client_id              = session()->get('client_id');

                $property_price         = $request->property_price;
                $down_payment           = $request->down_payment;
                $down_perc              = $request->down_perc;
                $years                  = $request->years;
                $interest_rate          = $request->interest_rate;
                $monthly_pay            = $request->monthly_pay;
                $total_pay              = $request->total_pay;
                $land_dept_fee          = $request->land_dept_fee;
                $trustee_fee            = $request->trustee_fee;
                $mortgage_reg_fee       = $request->mortgage_reg_fee;
                $bank_processing_fee    = $request->bank_processing_fee;
                $valuation_fee          = $request->valuation_fee;

                $request->session()->put('property_price', $property_price);
                $request->session()->put('down_payment', $down_payment);
                $request->session()->put('down_perc', $down_perc);
                $request->session()->put('years', $years);
                $request->session()->put('interest_rate', $interest_rate);
                $request->session()->put('monthly_pay', $monthly_pay);
                $request->session()->put('total_pay', $total_pay);
                $request->session()->put('land_dept_fee', $land_dept_fee);
                $request->session()->put('trustee_fee', $trustee_fee);
                $request->session()->put('mortgage_reg_fee', $mortgage_reg_fee);
                $request->session()->put('bank_processing_fee', $bank_processing_fee);
                $request->session()->put('valuation_fee', $valuation_fee);
                session()->save();

                return redirect()->route('mortgage.step2');
            }
            
            return view('mortgage/client/mortgage/mortgage_calculator_step1');
        }
        return redirect()->route('clientLogin');
    }


    public function clientMortgageCalculatorStep2(Request $request)
    {
        log::info('Client Mortgage Calculator step 2');
        log::info($request);

        header("cache-Control: no-store, no-cache, must-revalidate");
        header("cache-Control: post-check=0, pre-check=0", false);
        header("Pragma: no-cache");

        if(session()->has('client_id'))
        {   
            return view('mortgage/client/mortgage/mortgage_calculator_step2');
        }
        return redirect()->route('clientLogin');
    }


    public function clientMortgageCalculatorStep3(Request $request)
    {
        log::info('Client Mortgage Calculator Step3');
        log::info($request);

        if(session()->has('client_id'))
        { 
            if($request->isMethod('post')) 
            {
                $client_id  = session()->get('client_id');
                
                $property_price         = $request->property_price;
                $down_payment           = $request->down_payment;
                $down_perc              = $request->down_perc;
                $years                  = $request->years;
                $total_pay              = $request->total_pay;

                $interest_rate_three    = $request->interest_rate;
                $monthly_pay_three      = $request->monthly_pay; ## 3 years fixed
                $interest_rate_five     = $request->interest_rate_five;
                $monthly_pay_five       = $request->monthly_pay_five;## 5 years fixed
                $variable_rate          = $request->variable_rate;
                $monthly_variable_rate  = $request->monthly_pay_variable_rate; ## variable rate
                
                $land_dept_fee          = $request->land_dept_fee;
                $trustee_fee            = $request->trustee_fee;
                $mortgage_reg_fee       = $request->mortgage_reg_fee;
                $bank_processing_fee    = $request->bank_processing_fee;
                $valuation_fee          = $request->valuation_fee;
                $interest_rate          = session()->get('interest_rate');

                $request->session()->put('property_price', $property_price);
                $request->session()->put('down_payment', $down_payment);
                $request->session()->put('down_perc', $down_perc);
                $request->session()->put('years', $years);
                $request->session()->put('total_pay', $total_pay);

                $request->session()->put('interest_rate_three', $interest_rate_three);
                $request->session()->put('monthly_pay_three', $monthly_pay_three);
                $request->session()->put('interest_rate_five', $interest_rate_five);
                $request->session()->put('monthly_pay_five', $monthly_pay_five);
                $request->session()->put('variable_rate', $variable_rate);
                $request->session()->put('monthly_variable_rate', $monthly_variable_rate);

                $request->session()->put('land_dept_fee', $land_dept_fee);
                $request->session()->put('trustee_fee', $trustee_fee);
                $request->session()->put('mortgage_reg_fee', $mortgage_reg_fee);
                $request->session()->put('bank_processing_fee', $bank_processing_fee);
                $request->session()->put('valuation_fee', $valuation_fee);
                session()->save();

                $applicant_name = DB::table('clients')->where('id','=',$client_id)->value('first_name');

                // $update_data    = DB::table('clients')
                //                     ->where('id','=',$client_id)
                //                     ->update([
                //                         'property_price'=> $property_price,
                //                         'down_payment'  => $down_payment,
                //                         'years'         => $years,
                //                         'interest_rate' => $interest_rate,
                //                         'updated_at'    => now()
                //                     ]);

                // Generate the application number
                $latestApplication          = DB::table('mortgage_applications')->latest()->first();
                if ($latestApplication) {
                    $lastApplicationNumber  = $latestApplication->application_number;
                    // Extract the numeric part from the application number
                    $lastNumber             = (int)substr($lastApplicationNumber, 2);
                    $newNumber              = $lastNumber + 1;
                    $newApplicationNumber   = 'MG' . str_pad($newNumber, 4, '0', STR_PAD_LEFT); // Pad with zeros if necessary
                } else {
                    $newApplicationNumber   = 'MG1001'; // If no previous application exists, start from MG1001
                }


                $insert_id      = DB::table('mortgage_applications')
                                    ->InsertGetId([
                                        'client_id'             => $client_id,
                                        'applicant_name'        => $applicant_name,
                                        'property_price'        => $property_price,
                                        'down_payment'          => $down_payment,
                                        'years'                 => $years,
                                        'interest_rate'         => $interest_rate,
                                        'application_number'    => $newApplicationNumber,
                                        'created_at'            => now(),
                                        'updated_at'            => now()
                                    ]);
            
                
                Session::flash('success', "Success");
                return redirect()->route('mortgage.step1');
            }
            else
            {
                $property_price         = session()->get('property_price');
                $down_payment           = session()->get('down_payment');
                $down_perc              = session()->get('down_perc');
                $years                  = session()->get('years');
                $interest_rate          = session()->get('interest_rate');
                $monthly_pay            = session()->get('monthly_pay');
                $total_pay              = session()->get('total_pay');
                $land_dept_fee          = session()->get('land_dept_fee');
                $trustee_fee            = session()->get('trustee_fee');
                $mortgage_reg_fee       = session()->get('mortgage_reg_fee');
                $bank_processing_fee    = session()->get('bank_processing_fee');
                $valuation_fee          = session()->get('valuation_fee');

                $response               =   [
                                                'property_price'        => $property_price,
                                                'down_payment'          => $down_payment,
                                                'down_perc'             => $down_perc,
                                                'years'                 => $years,
                                                'interest_rate'         => $interest_rate,
                                                'monthly_pay'           => $monthly_pay,
                                                'total_pay'             => $total_pay,
                                                'land_dept_fee'         => $land_dept_fee,
                                                'trustee_fee'           => $trustee_fee,
                                                'mortgage_reg_fee'      => $mortgage_reg_fee,
                                                'bank_processing_fee'   => $bank_processing_fee,
                                                'valuation_fee'         => $valuation_fee
                                            ];

                return view('mortgage/client/mortgage/mortgage_calculator_step3',['response'  => $response]);
            }
        }
        return redirect()->route('clientLogin');
    }
}
