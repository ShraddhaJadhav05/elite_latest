<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Models\Header;
use App\Models\Footer;

class GeneralSettingsController extends Controller
{
    public function generalSettings(Request $request)
    {
        log::info('list general settings data');
        log::info($request);

        return view('settings/general/page');
    }

    public function viewHeader(Request $request)
    {
        log::info('View Header');
        log::info($request);

        $get_header_data    = Header::first();

        return view('settings/general/view_header',['get_data'   => $get_header_data]);
    }

    public function updateHeader(Request $request)
    {
        log::info('Update Header Data');
        log::info($request);

        if ($request->isMethod('post')) {
            $id                 = request('id');
            $image_file         = request('image_file');
            
            
            $update             = DB::table('headers')
                                    ->updateOrInsert(
                                        [
                                            'id'            => $id
                                        ],
                                        [
                                            'updated_at'    => now()
                                        ]
                                    );

            if($image_file)
            {
                if(!$id)
                {
                    $get_id = DB::table('headers')->latest()->first();
                    $id     = $get_id->id;
                }

                $image      = DB::table('headers')->where('id','=',$id) ->value('logo');

                if($image != NULL)
                {
                    //remove from image uploads
                    unlink("image_uploads/".$image);
                }

                $destinationPath    = 'image_uploads';
                $filename           = $image_file->getClientOriginalName();
                $savedFileName      = strval($id)."_".date('Ymdhis')."_".$filename;
                $path               = $image_file->move($destinationPath, $savedFileName);
                
                $update_image       =  DB::table('headers')
                                        ->where('id', $id)
                                        ->update([
                                            'logo'          => $savedFileName,
                                            'updated_at'    => now()
                                        ]);
            }
            

            Session::flash('success', "Successfully Updated");
            return back();
        }

        $get_header_data    = Header::first();
        return view('settings/general/update_header',['get_data'   => $get_header_data]);
    }

    public function viewFooter(Request $request)
    {
        log::info('View Footer');
        log::info($request);

        $get_data   = Footer::first();

        return view('settings/general/view_footer',['get_data'   => $get_data]);
    }

    public function updateFooter(Request $request)
    {
        log::info('Update Footer Data');
        log::info($request);

        if ($request->isMethod('post')) {
            $id             = request('id');
            $content        = request('content');
            $image_file     = request('image_file');
            
            
            $update         = DB::table('footers')
                                ->updateOrInsert(
                                    [
                                        'id'            => $id
                                    ],
                                    [
                                        'description'   => $content,
                                        'updated_at'    => now()
                                    ]
                                );

            if($image_file)
            {
                if(!$id)
                {
                    $get_id = DB::table('footers')->latest()->first();
                    $id     = $get_id->id;
                }

                $image      = DB::table('footers')->where('id','=',$id) ->value('logo');

                if($image != NULL)
                {
                    //remove from image uploads
                    unlink("image_uploads/".$image);
                }

                $destinationPath    = 'image_uploads';
                $filename           = $image_file->getClientOriginalName();
                $savedFileName      = strval($id)."_".date('Ymdhis')."_".$filename;
                $path               = $image_file->move($destinationPath, $savedFileName);
                
                $update_image       =  DB::table('footers')
                                        ->where('id', $id)
                                        ->update([
                                            'logo'          => $savedFileName,
                                            'updated_at'    => now()
                                        ]);
            }
            

            Session::flash('success', "Successfully Updated");
            return back();
        }

        $get_data   = footer::first();
        return view('settings/general/update_footer',['get_data'   => $get_data]);
    }
}
