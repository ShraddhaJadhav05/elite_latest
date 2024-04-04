<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Models\AboutUs;
use App\Models\PrivacyPolicy; 
use App\Models\TermsAndConditions;
use App\Models\HomeFinancing;
use App\Models\ContactUs;
use App\Models\WhyUs;
use App\Models\Home;
use App\Models\FAQPageData; 
use App\Models\CallBack; 
use App\Models\BlogPage; 
use App\Models\PartnersPage; 
use App\Models\AgentPage;

class CMSController extends Controller
{
    public function cmsPages(Request $request)
    {
        log::info('list cms pages');
        log::info($request);

        return view('cms/pages');
    }

    public function viewAboutus(Request $request)
    {
        log::info('View Aboutus');
        log::info($request);

        $get_aboutus_data   = AboutUs::first();

        return view('cms/view_aboutus',['aboutus_data'    => $get_aboutus_data]);
    }

    public function updateAboutus(Request $request)
    {
        log::info('Update Aboutus');
        log::info($request);

        if ($request->isMethod('post')) {
            $id                 = request('id');
            $title              = request('title');
            $description        = request('description');
            $url_key            = request('url_key');
            $meta_title         = request('meta_title');
            $meta_tag           = request('meta_tag');
            $meta_description   = request('meta_description');

            $update             = DB::table('about_us')
                                    ->updateOrInsert(
                                        [
                                            'id'                => $id
                                        ],
                                        [
                                            'title'             => $title,
                                            'description'       => $description,
                                            'url_key'           => $url_key,
                                            'meta_title'        => $meta_title,
                                            'meta_tag'          => $meta_tag,
                                            'meta_description'  => $meta_description,
                                            'updated_at'        => now()
                                        ]
                                    );

            Session::flash('success', "Successfully Updated");
            return back();
        }
        $get_aboutus_data   = AboutUs::first();
        return view('cms/update_aboutus',['aboutus_data'    => $get_aboutus_data]);
    }


    public function viewPrivacyPolicy(Request $request)
    {
        log::info('View Privacy Policy');
        log::info($request);

        $get_privacy_data   = PrivacyPolicy::first();

        return view('cms/view_privacy_policy',['get_data'    => $get_privacy_data]);
    }

    public function updatePrivacyPolicy(Request $request)
    {
        log::info('Update Privacy Policy');
        log::info($request);

        if ($request->isMethod('post')) {
            $id                 = request('id');
            $url_key            = request('url_key');
            $meta_title         = request('meta_title');
            $meta_tag           = request('meta_tag');
            $meta_description   = request('meta_description');

            $update             = DB::table('privacy_policies')
                                    ->updateOrInsert(
                                        [
                                            'id'                => $id
                                        ],
                                        [
                                            'url_key'           => $url_key,
                                            'meta_title'        => $meta_title,
                                            'meta_tag'          => $meta_tag,
                                            'meta_description'  => $meta_description,
                                            'updated_at'        => now()
                                        ]
                                    );

            Session::flash('success', "Successfully Updated");
            return back();
        }
        $get_privacy_data   = PrivacyPolicy::first();
        return view('cms/update_privacy_policy',['get_data'    => $get_privacy_data]);
    }

    public function viewTerms(Request $request)
    {
        log::info('View Terms & Conditions');
        log::info($request);

        $get_terms_data = TermsAndConditions::first();

        return view('cms/view_terms',['get_data'   => $get_terms_data]);
    }

    public function updateTerms(Request $request)
    {
        log::info('Update Terms & Conditions');
        log::info($request);

        if ($request->isMethod('post')) {
            $id                 = request('id');
            $url_key            = request('url_key');
            $meta_title         = request('meta_title');
            $meta_tag           = request('meta_tag');
            $meta_description   = request('meta_description');

            $update             = DB::table('terms_and_conditions')
                                    ->updateOrInsert(
                                        [
                                            'id'                => $id
                                        ],
                                        [
                                            'url_key'           => $url_key,
                                            'meta_title'        => $meta_title,
                                            'meta_tag'          => $meta_tag,
                                            'meta_description'  => $meta_description,
                                            'updated_at'        => now()
                                        ]
                                    );

            Session::flash('success', "Successfully Updated");
            return back();
        }
        $get_terms_data = TermsAndConditions::first();
        return view('cms/update_terms',['get_data'    => $get_terms_data]);
    }


    public function viewHomeFinancing(Request $request)
    {
        log::info('View Home Financing');
        log::info($request);

        $get_home_financing_data    = HomeFinancing::first();

        return view('cms/view_home_financing',['get_data'   => $get_home_financing_data]);
    }

    public function updateHomeFinancing(Request $request)
    {
        log::info('Update Home Financing');
        log::info($request);

        if ($request->isMethod('post')) {
            $id                 = request('id');
            $url_key            = request('url_key');
            $meta_title         = request('meta_title');
            $meta_tag           = request('meta_tag');
            $meta_description   = request('meta_description');

            $update             = DB::table('home_financings')
                                    ->updateOrInsert(
                                        [
                                            'id'                => $id
                                        ],
                                        [
                                            'url_key'           => $url_key,
                                            'meta_title'        => $meta_title,
                                            'meta_tag'          => $meta_tag,
                                            'meta_description'  => $meta_description,
                                            'updated_at'        => now()
                                        ]
                                    );

            Session::flash('success', "Successfully Updated");
            return back();
        }
        $get_home_financing_data    = HomeFinancing::first();
        return view('cms/update_home_financing',['get_data'    => $get_home_financing_data]);
    }

    public function viewContactUs(Request $request)
    {
        log::info('View Contact Us');
        log::info($request);

        $get_contact_us_data    = ContactUs::first();

        return view('cms/view_contact_us',['get_data'   => $get_contact_us_data]);
    }

    public function updateContactUs(Request $request)
    {
        log::info('Update Contact Us');
        log::info($request);

        if ($request->isMethod('post')) {
            $id                 = request('id');
            $opening_time       = request('opening_time');
            $opening_days       = request('opening_days');
            $address            = request('address');
            $phone              = request('phone');
            $email              = request('email');
            $whatsapp           = request('whatsapp');
            $url_key            = request('url_key');
            $location           = request('location');
            $meta_title         = request('meta_title');
            $meta_tag           = request('meta_tag');
            $meta_description   = request('meta_description');

            $update             = DB::table('contact_us')
                                    ->updateOrInsert(
                                        [
                                            'id'                => $id
                                        ],
                                        [
                                            'opening_time'      => $opening_time,
                                            'opening_days'      => $opening_days,
                                            'address'           => $address,
                                            'phone'             => $phone,
                                            'email'             => $email,
                                            'whatsapp'          => $whatsapp,
                                            'url_key'           => $url_key,
                                            'location'          => $location,
                                            'meta_title'        => $meta_title,
                                            'meta_tag'          => $meta_tag,
                                            'meta_description'  => $meta_description,
                                            'updated_at'        => now()
                                        ]
                                    );

            Session::flash('success', "Successfully Updated");
            return back();
        }
        $get_contact_us_data    = ContactUs::first();
        return view('cms/update_contact_us',['get_data'    => $get_contact_us_data]);
    }

    public function viewWhyUs(Request $request)
    {
        log::info('View Why Us');
        log::info($request);

        $get_why_us_data    = WhyUs::first();

        return view('cms/view_why_us',['get_data'   => $get_why_us_data]);
    }

    public function updateWhyUs(Request $request)
    {
        log::info('Update Why Us');
        log::info($request);

        if ($request->isMethod('post')) {
            $id                 = request('id');
            $url_key            = request('url_key');
            $meta_title         = request('meta_title');
            $meta_tag           = request('meta_tag');
            $meta_description   = request('meta_description');

            $update             = DB::table('why_us')
                                    ->updateOrInsert(
                                        [
                                            'id'                => $id
                                        ],
                                        [
                                            'url_key'           => $url_key,
                                            'meta_title'        => $meta_title,
                                            'meta_tag'          => $meta_tag,
                                            'meta_description'  => $meta_description,
                                            'updated_at'        => now()
                                        ]
                                    );

            Session::flash('success', "Successfully Updated");
            return back();
        }
        $get_why_us_data    = WhyUs::first();
        return view('cms/update_why_us',['get_data'    => $get_why_us_data]);
    }

    public function viewHome(Request $request)
    {
        log::info('View Home');
        log::info($request);

        $get_home_data  = Home::first();

        return view('cms/view_home',['get_data'   => $get_home_data]);
    }

    public function updateHome(Request $request)
    {
        log::info('Update Home Data');
        log::info($request);

        if ($request->isMethod('post')) {
            $id                 = request('id');
            $meta_title         = request('meta_title');
            $meta_tag           = request('meta_tag');
            $meta_description   = request('meta_description');
            $image_file         = request('image_file');
            
            
            $update             = DB::table('homes')
                                    ->updateOrInsert(
                                        [
                                            'id'                => $id
                                        ],
                                        [
                                            'meta_title'        => $meta_title,
                                            'meta_tag'          => $meta_tag,
                                            'meta_description'  => $meta_description,
                                            'updated_at'        => now()
                                        ]
                                    );

            if($image_file)
            {
                if(!$id)
                {
                    $get_id = DB::table('homes')->latest()->first();
                    $id     = $get_id->id;
                }

                $image      = DB::table('homes')->where('id','=',$id) ->value('banner');

                if($image != NULL)
                {
                    //remove from image uploads
                    unlink("image_uploads/".$image);
                }

                $destinationPath    = 'image_uploads';
                $filename           = $image_file->getClientOriginalName();
                $savedFileName      = strval($id)."_".date('Ymdhis')."_".$filename;
                $path               = $image_file->move($destinationPath, $savedFileName);
                
                $update_image       =  DB::table('homes')
                                        ->where('id', $id)
                                        ->update([
                                            'banner'        => $savedFileName,
                                            'updated_at'    => now()
                                        ]);
            }
            

            Session::flash('success', "Successfully Updated");
            return back();
        }

        $get_home_data  = Home::first();
        return view('cms/update_home',['get_data'   => $get_home_data]);
    }


    public function viewFAQPageData(Request $request)
    {
        log::info('View FAQPageData');
        log::info($request);

        $get_faq_data   = FAQPageData::first();

        return view('cms/view_faq_page',['faq_data'    => $get_faq_data]);
    }

    public function updateFaqFAQPageData(Request $request)
    {
        log::info('Update FAQPageData');
        log::info($request);

        if ($request->isMethod('post')) {
            $id                 = request('id');
            $title              = request('title');
            $description        = request('description');
            $url_key            = request('url_key');
            $meta_title         = request('meta_title');
            $meta_tag           = request('meta_tag');
            $meta_description   = request('meta_description');

            $update             = DB::table('f_a_q_page_data')
                                    ->updateOrInsert(
                                        [
                                            'id'                => $id
                                        ],
                                        [
                                            'title'             => $title,
                                            'description'       => $description,
                                            'url_key'           => $url_key,
                                            'meta_title'        => $meta_title,
                                            'meta_tag'          => $meta_tag,
                                            'meta_description'  => $meta_description,
                                            'updated_at'        => now()
                                        ]
                                    );

            Session::flash('success', "Successfully Updated");
            return back();
        }
        $get_faq_data   = FAQPageData::first();
        return view('cms/update_faq_page',['faq_data'    => $get_faq_data]);
    }


    public function viewCallBackData(Request $request)
    {
        log::info('View Call Back Data');
        log::info($request);

        $get_data   = CallBack::first();

        return view('cms/view_call_back',['get_data'    => $get_data]);
    }

    public function updateCallBackData(Request $request)
    {
        log::info('Update Call Back Data');
        log::info($request);

        if ($request->isMethod('post')) {
            $id                 = request('id');
            $url_key            = request('url_key');
            $meta_title         = request('meta_title');
            $meta_tag           = request('meta_tag');
            $meta_description   = request('meta_description');

            $update             = DB::table('call_backs')
                                    ->updateOrInsert(
                                        [
                                            'id'                => $id
                                        ],
                                        [
                                            'url_key'           => $url_key,
                                            'meta_title'        => $meta_title,
                                            'meta_tag'          => $meta_tag,
                                            'meta_description'  => $meta_description,
                                            'updated_at'        => now()
                                        ]
                                    );

            Session::flash('success', "Successfully Updated");
            return back();
        }
        $get_data   = CallBack::first();
        return view('cms/update_call_back',['get_data'  => $get_data]);
    }

    public function viewBlogPageData(Request $request)
    {
        log::info('View Blog Page Data');
        log::info($request);

        $get_data   = BlogPage::first();

        return view('cms/view_blog_page',['get_data'    => $get_data]);
    }

    public function updateBlogPageData(Request $request)
    {
        log::info('Update Blog Page Data');
        log::info($request);

        if ($request->isMethod('post')) {
            $id                 = request('id');
            $url_key            = request('url_key');
            $meta_title         = request('meta_title');
            $meta_tag           = request('meta_tag');
            $meta_description   = request('meta_description');

            $update             = DB::table('blog_pages')
                                    ->updateOrInsert(
                                        [
                                            'id'                => $id
                                        ],
                                        [
                                            'url_key'           => $url_key,
                                            'meta_title'        => $meta_title,
                                            'meta_tag'          => $meta_tag,
                                            'meta_description'  => $meta_description,
                                            'updated_at'        => now()
                                        ]
                                    );

            Session::flash('success', "Successfully Updated");
            return back();
        }
        $get_data   = BlogPage::first();
        return view('cms/update_blog_page',['get_data'  => $get_data]);
    }

    public function viewPartnersPageData(Request $request)
    {
        log::info('View Partners Page Data');
        log::info($request);

        $get_data   = PartnersPage::first();

        return view('cms/view_partners_page',['get_data'    => $get_data]);
    }

    public function updatePartnersPageData(Request $request)
    {
        log::info('Update Partners Page Data');
        log::info($request);

        if ($request->isMethod('post')) {
            $id                 = request('id');
            $url_key            = request('url_key');
            $meta_title         = request('meta_title');
            $meta_tag           = request('meta_tag');
            $meta_description   = request('meta_description');

            $update             = DB::table('partners_pages')
                                    ->updateOrInsert(
                                        [
                                            'id'                => $id
                                        ],
                                        [
                                            'url_key'           => $url_key,
                                            'meta_title'        => $meta_title,
                                            'meta_tag'          => $meta_tag,
                                            'meta_description'  => $meta_description,
                                            'updated_at'        => now()
                                        ]
                                    );

            Session::flash('success', "Successfully Updated");
            return back();
        }
        $get_data   = PartnersPage::first();
        return view('cms/update_partners_page',['get_data'  => $get_data]);
    }


    public function viewAgentPageData(Request $request)
    {
        log::info('View Agent Page Data');
        log::info($request);

        $get_data   = AgentPage::first();

        return view('cms/view_agent_page',['get_data'    => $get_data]);
    }

    public function updateAgentPageData(Request $request)
    {
        log::info('Update Agent Page Data');
        log::info($request);

        if ($request->isMethod('post')) {
            $id                 = request('id');
            $url_key            = request('url_key');
            $meta_title         = request('meta_title');
            $meta_tag           = request('meta_tag');
            $meta_description   = request('meta_description');

            $update             = DB::table('agent_pages')
                                    ->updateOrInsert(
                                        [
                                            'id'                => $id
                                        ],
                                        [
                                            'url_key'           => $url_key,
                                            'meta_title'        => $meta_title,
                                            'meta_tag'          => $meta_tag,
                                            'meta_description'  => $meta_description,
                                            'updated_at'        => now()
                                        ]
                                    );

            Session::flash('success', "Successfully Updated");
            return back();
        }
        $get_data   = AgentPage::first();
        return view('cms/update_agent_page',['get_data'  => $get_data]);
    }
}
