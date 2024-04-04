<?php

namespace App\Http\Controllers\Mortgage\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Models\ClientEducationalResources;

class PrivacyController extends Controller
{
    public function clientPrivacyAndSecurity(Request $request)
    {
        log::info('Client Privacy & Security');
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
            
            return view('mortgage/client/privacy/privacy_and_security',['get_article_data' => $get_article_data]);
        }
        return redirect()->route('clientLogin');
    }
}
