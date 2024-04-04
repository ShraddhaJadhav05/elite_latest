<?php

namespace App\Http\Controllers\Mortgage\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Models\ClientEducationalResources;

class EducationalResourcesController extends Controller
{
    public function clientEducationalResources(Request $request)
    {
        log::info('Client Educational Resources');
        log::info($request);

        header("cache-Control: no-store, no-cache, must-revalidate");
        header("cache-Control: post-check=0, pre-check=0", false);
        header("Pragma: no-cache");

        if(session()->has('client_id'))
        {
            $client_id          = session()->get('client_id');

            $get_article_data   = ClientEducationalResources::where('resource_type', 'Article')
                                    ->latest()
                                    ->get();
            $get_video_data     = ClientEducationalResources::where('resource_type', 'Video')
                                    ->latest()
                                    ->get();
            
            return view('mortgage/client/educationalresources/educationalresources',['get_article_data' => $get_article_data ,'get_video_data' => $get_video_data]);
        }
        return redirect()->route('clientLogin');
    }

    public function clientViewArticle(Request $request)
    {
        log::info('Client View Article');
        log::info($request);

        header("cache-Control: no-store, no-cache, must-revalidate");
        header("cache-Control: post-check=0, pre-check=0", false);
        header("Pragma: no-cache");

        if(session()->has('client_id'))
        {
            $client_id          = session()->get('client_id');
            $article_id         = $request->id;

            $get_article_data   = ClientEducationalResources::where('id', $article_id)->first();
            
            
            return view('mortgage/client/educationalresources/article_view',['get_article_data' => $get_article_data]);
        }
        return redirect()->route('clientLogin');
    }
}
