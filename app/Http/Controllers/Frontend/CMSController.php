<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Models\AboutUs;
use App\Models\PrivacyPolicy; 
use App\Models\TermsAndConditions;
use App\Models\HomeFinancing;
use App\Models\ContactUs;
use App\Models\WhyUs;
use App\Models\FAQPageData; 
use App\Models\CallBack;
use App\Models\FAQ;


class CMSController extends Controller
{
    public function aboutUsScreen(Request $request)
    {
        log::info('About us page');
        log::info($request);

        $get_data   = AboutUs::first();

        return view('frontend/templates/aboutus',['get_data' => $get_data]);
    }

    public function homeFinancingScreen(Request $request)
    {
        log::info('Home financing page');
        log::info($request);

        $get_data   = HomeFinancing::first();

        return view('frontend/templates/homefinancing',['get_data' => $get_data]);
    }

    public function contactUsScreen(Request $request)
    {
        log::info('Contact us page');
        log::info($request);

        $get_data   = ContactUs::first();

        return view('frontend/templates/contactus',['get_data' => $get_data]);
    }

    public function whyUsScreen(Request $request)
    {
        log::info('Why us page');
        log::info($request);

        $get_data   = WhyUs::first();

        return view('frontend/templates/whyus',['get_data' => $get_data]);
    }

    public function callBackData(Request $request)
    {
        log::info('Callbasck Data');
        log::info($request);

        $get_data   = CallBack::first();

        return view('frontend/templates/callback',['get_data' => $get_data]);
    }

    public function faqData(Request $request)
    {
        log::info('FAQ Data');
        log::info($request);

        $get_data       = FAQPageData::first();

        $categories     = DB::table('categories')->orderBy('id')->get();

        $all_faqs       = [];

        foreach ($categories as $category) {
            $faqs       = DB::table('f_a_q_s')
                            ->where('category_id', $category->id)
                            ->orderBy('question')
                            ->get();

            foreach ($faqs as $faq) {

                $all_faqs[$category->name][]    =   [
                                                        'id'            => $faq->id,
                                                        'question'      => $faq->question,
                                                        'answer'        => $faq->answer,
                                                        'category'      => $category->name,
                                                    ];
            }
        }
        log::info($all_faqs);
        return view('frontend/templates/faq',
                        [
                            'get_data'    => $get_data, 
                            'all_faqs'    => $all_faqs
                        ]);
    }

    public function termsAndConditionsData(Request $request)
    {
        log::info('Terms And Conditions Data');
        log::info($request);

        $get_data   = PrivacyPolicy::first();

        return view('frontend/templates/terms',['get_data' => $get_data]);
    }

    public function privacyPolicyData(Request $request)
    {
        log::info('Privacy Policy Data');
        log::info($request);

        $get_data   = TermsAndConditions::first();

        return view('frontend/templates/policy',['get_data' => $get_data]);
    }
}
