<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use App\Models\SEOAndSMO;


class SEOSMOSettingsController extends Controller
{
    public function viewSEOAndSMO(Request $request)
    {
        log::info('View SEO & SMO');
        log::info($request);

        $get_data   = SEOAndSMO::first();

        return view('settings/seo_smo/view',['get_data'  => $get_data]);
    }

    public function updateSEOAndSMO(Request $request)
    {
        log::info('Update SEOAndSMO');
        log::info($request);

        if ($request->isMethod('post')) {
            $id                 = request('id');
            $meta_title         = request('meta_title');
            $meta_tag           = request('meta_tag');
            $meta_description   = request('meta_description');
            $title              = request('meta_title');
            $google_analytics   = request('google_analytics');
            $facebook_link      = request('facebook_link');
            $instagram_link     = request('instagram_link');
            $linkedin_link      = request('linkedin_link');
            $tiktok_link        = request('tiktok_link');

            $update             = DB::table('s_e_o_and_s_m_o_s')
                                    ->updateOrInsert(
                                        [
                                            'id'                => $id
                                        ],
                                        [
                                            'meta_title'        => $meta_title,
                                            'meta_tag'          => $meta_tag,
                                            'meta_description'  => $meta_description,
                                            'google_analytics'  => $google_analytics,
                                            'facebook_link'     => $facebook_link,
                                            'instagram_link'    => $instagram_link,
                                            'linkedin_link'     => $linkedin_link,
                                            'tiktok_link'       => $tiktok_link,     
                                            'updated_at'        => now()
                                        ]
                                    );

            Session::flash('success', "Successfully Updated");
            return back();
        }
        $get_data   = SEOAndSMO::first();
        return view('settings/seo_smo/update',['get_data'    => $get_data]);
    }
}
