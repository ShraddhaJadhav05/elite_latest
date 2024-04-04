<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class MortgageController extends Controller
{
    public function mortgageCalculator(Request $request)
    {
        log::info('Mortgage Calculator');
        log::info($request);

        return view('frontend/templates/mortgage_calculator');
    }

    public function mortgageCalculatorStep1(Request $request)
    {
        log::info('Mortgage Calculator Step1');
        log::info($request);

        if($request->isMethod('post')) 
        {
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

            return redirect()->route('mortgageCalculatorStep2');
        }
        return view('frontend/templates/mortgage_calculator_step1');
    }

    public function mortgageCalculatorStep2(Request $request)
    {
        log::info('Mortgage Calculator Step2');
        log::info($request);

        return view('frontend/templates/mortgage_calculator_step2');
    }

    public function mortgageCalculatorStep3(Request $request)
    {
        log::info('Mortgage Calculator Step3');
        log::info($request);

        if($request->isMethod('post')) 
        {
            $button = $request->button;

            if($button == 'submit')
            {
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
           
            }
            return redirect()->route('mortgageCalculatorStep4');
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

            return view('frontend/templates/mortgage_calculator_step3',['response'  => $response]);
        }
    }

    public function mortgageCalculatorStep4(Request $request)
    {
        log::info('Mortgage Calculator Step4');
        log::info($request);

        if ($request->isMethod('post')) {
            $first_name             = $request->first_name;
            $last_name              = $request->last_name;
            $email                  = $request->email;
            $phone_number           = $request->phone_number;

            $property_price         = session()->get('property_price');
            $down_payment           = session()->get('down_payment');
            $down_percentage        = session()->get('down_perc');
            $years                  = session()->get('years');
            $interest_rate          = session()->get('interest_rate');

            $insert_id              = DB::table('leads')
                                        ->InsertGetId([
                                            'first_name'    => $first_name,
                                            'last_name'     => $last_name,
                                            'phone_number'  => $phone_number,
                                            'email'         => $email,
                                            'property_price'=> $property_price,
                                            'down_payment'  => $down_payment,
                                            'years'         => $years,
                                            'interest_rate' => $interest_rate,
                                            'created_at'    => now(),
                                            'updated_at'    => now()
                                        ]);
            
            Session::flash('success', "Success");
            return redirect()->route('mortgageCalculator');
        }

        return view('frontend/templates/mortgage_calculator_step4');
    }

    public function mortgageProcess(Request $request)
    {
        log::info('Mortgage Process');
        log::info($request);

        if ($request->isMethod('post')) {
            $name                   = $request->name;
            $phone_number           = $request->phone_number;
            $email                  = $request->email;
            $address                = $request->address;
            $nationality            = $request->nationality;
            $residence_status       = $request->residence_status;

            session()->flush();

            $request->session()->put('name', $name);
            $request->session()->put('phone_number', $phone_number);
            $request->session()->put('email', $email);
            $request->session()->put('address', $address);
            $request->session()->put('nationality', $nationality);
            $request->session()->put('residence_status', $residence_status);

            return redirect()->route('mortgageProcessStep2');
        }

        return view('frontend/templates/mortgage_process');
    }

    public function mortgageProcessStep2(Request $request)
    {
        log::info('Mortgage Process Step2');
        log::info($request);

        if ($request->isMethod('post')) {
            $profession             = $request->profession == 'option1' ? 'Salaried' : 'Self-Employed';
            $company                = $request->company ? $request->company : $request->salaried_company;
            $designation            = $request->designation;
            $salary                 = $request->salary;
            $service_legth          = $request->service_legth;
            $previous_company_name  = $request->previous_company_name;
            $line_of_business       = $request->line_of_business;
            $length_of_business     = $request->length_of_business;
            $ownership              = $request->ownership;
            $net_profit             = $request->net_profit;
            
            $request->session()->put('profession', $profession);
            $request->session()->put('company', $company);
            $request->session()->put('designation', $designation);
            $request->session()->put('salary', $salary);
            $request->session()->put('service_legth', $service_legth);
            $request->session()->put('previous_company_name', $previous_company_name);
            $request->session()->put('line_of_business', $line_of_business);
            $request->session()->put('length_of_business', $length_of_business);
            $request->session()->put('ownership', $ownership);
            $request->session()->put('net_profit', $net_profit);
            
            return redirect()->route('mortgageProcessStep3');
        }

        return view('frontend/templates/mortgage_process_step2');
    }


    public function mortgageProcessStep3(Request $request)
    {
        log::info('Mortgage Process Step3');
        log::info($request);

        if ($request->isMethod('post')) {
           
            $property_finalised     = $request->property_finalised == 'option1' ? True : False;
            $project_name           = $request->project_name;
            $expected_handover_date = $request->expected_handover_date;
            $emirates               = $request->emirates;
            $property_price         = $request->property_price;
            $down_payment           = $request->down_payment;


            $name                   = session()->get('name');
            $phone_number           = session()->get('phone_number');
            $email                  = session()->get('email');
            $address                = session()->get('address');
            $nationality            = session()->get('nationality');
            $residence_status       = session()->get('residence_status');
            $profession             = session()->get('profession');
            $company                = session()->get('company');
            $designation            = session()->get('designation');
            $salary                 = session()->get('salary');
            $service_legth          = session()->get('service_legth');
            $previous_company_name  = session()->get('previous_company_name');
            $line_of_business       = session()->get('line_of_business');
            $length_of_business     = session()->get('length_of_business');
            $ownership              = session()->get('ownership');
            $net_profit             = session()->get('net_profit');

            $insert_id              = DB::table('leads')
                                        ->InsertGetId([
                                            'first_name'            => $name,
                                            'phone_number'          => $phone_number,
                                            'email'                 => $email,
                                            'address_line1'         => $address,
                                            'nationality'           => $nationality,
                                            'company'               => $company,
                                            'city'                  => $emirates,
                                            'employment'            => $designation,
                                            'monthly_salary'        => $salary,
                                            'property_price'        => $property_price,
                                            'down_payment'          => $down_payment,
                                            'profession'            => $profession,
                                            'residence_status'      => $residence_status,
                                            'property_finalised'    => $property_finalised,
                                            'project_name'          => $project_name,
                                            'expected_handover_date'=> $expected_handover_date,
                                            'service_legth'         => $service_legth,
                                            'previous_company_name' => $previous_company_name,
                                            'line_of_business'      => $line_of_business,
                                            'length_of_business'    => $length_of_business,
                                            'ownership'             => $ownership,
                                            'net_profit'            => $net_profit,
                                            'created_at'            => now(),
                                            'updated_at'            => now()
                                        ]
                                    );
            
            Session::flash('success', "Success");
            return redirect()->route('mortgageProcess');
        }

        return view('frontend/templates/mortgage_process_step3');
    }
    

    public function residentMortgage(Request $request)
    {
        log::info('Resident Mortgages');
        log::info($request);

        $get_data       = DB::table('services')
                            ->where('url_key','=','resident-mortgages')
                            ->first();

        return view('frontend/templates/resident_mortgages',['get_data' => $get_data]);
    }

    public function nonResidentMortgage(Request $request)
    {
        log::info('Non Resident Mortgages');
        log::info($request);

        $get_data       = DB::table('services')
                            ->where('url_key','=','non-resident-mortgages')
                            ->first();

        return view('frontend/templates/non_resident_mortgages',['get_data' => $get_data]);
    }

    public function equityReleases(Request $request)
    {
        log::info('Equity Releases / Buyouts');
        log::info($request);

        $get_data       = DB::table('services')
                            ->where('url_key','=','equity-releases')
                            ->first();

        return view('frontend/templates/equity_releases',['get_data' => $get_data]);
    }

    public function commercialFinance(Request $request)
    {
        log::info('Commercial Finance');
        log::info($request);

        $get_data       = DB::table('services')
                            ->where('url_key','=','commercial-finance')
                            ->first();

        return view('frontend/templates/commercial_finance',['get_data' => $get_data]);
    }

    public function servicesPages(Request $request)
    {
        log::info('Mortgage Services');
        log::info($request);

        $url_key    = $request->url_key;

        if($url_key == 'resident-mortgages')
        {
            return redirect()->route('residentMortgage');
        }
        elseif($url_key == 'non-resident-mortgages')
        {
            return redirect()->route('nonResidentMortgage');
        }
        elseif($url_key == 'equity-releases')
        {
            return redirect()->route('equityReleases');
        }
        elseif($url_key == 'commercial-finance')
        {
            return redirect()->route('commercialFinance');
        }
    }
}
