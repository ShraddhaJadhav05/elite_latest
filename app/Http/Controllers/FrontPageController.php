<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Models\SupportivePartner;
use App\Models\Mission;
use App\Models\Vision;
use App\Models\Features;

class FrontPageController extends Controller
{
    public function frontPageBlocks(Request $request)
    {
        log::info('list front page blocks');
        log::info($request);

        return view('frontpage/blocks');
    }

    public function viewSupportivePartner(Request $request)
    {
        log::info('View SupportivePartner');
        log::info($request);

        $get_data   = SupportivePartner::first();

        return view('frontpage/view_supportive_partner',['get_data'    => $get_data]);
    }

    public function updateSupportivePartner(Request $request)
    {
        log::info('Update Supportive Partner');
        log::info($request);

        if ($request->isMethod('post')) {
            $id                 = request('id');
            $title              = request('title');
            $sub_title          = request('sub_title');
            $description        = request('description');
            $image_file         = request('image_file');
            
            
            $update             = DB::table('supportive_partners')
                                    ->updateOrInsert(
                                        [
                                            'id'            => $id
                                        ],
                                        [
                                            'title'         => $title,
                                            'sub_title'     => $sub_title,
                                            'description'   => $description,
                                            'updated_at'    => now()
                                        ]
                                    );

            if($image_file)
            {
                if(!$id)
                {
                    $get_id = DB::table('supportive_partners')->latest()->first();
                    $id     = $get_id->id;
                }

                $image      = DB::table('supportive_partners')->where('id','=',$id) ->value('image');

                if($image != NULL)
                {
                    //remove from image uploads
                    unlink("image_uploads/".$image);
                }

                $destinationPath    = 'image_uploads';
                $filename           = $image_file->getClientOriginalName();
                $savedFileName      = strval($id)."_".date('Ymdhis')."_".$filename;
                $path               = $image_file->move($destinationPath, $savedFileName);
                
                $update_image       =  DB::table('supportive_partners')
                                        ->where('id', $id)
                                        ->update([
                                            'image'         => $savedFileName,
                                            'updated_at'    => now()
                                        ]);
            }
            

            Session::flash('success', "Successfully Updated");
            return back();
        }

        $get_data   = SupportivePartner::first();
        return view('frontpage/update_supportive_partner',['get_data'   => $get_data]);
    }


    public function viewMission(Request $request)
    {
        log::info('View Mission');
        log::info($request);

        $get_data   = Mission::first();

        return view('frontpage/view_mission',['get_data'    => $get_data]);
    }

    public function updateMission(Request $request)
    {
        log::info('Update Mission');
        log::info($request);

        if ($request->isMethod('post')) {
            $id                 = request('id');
            $title              = request('title');
            $description        = request('description');
            $feature1           = request('feature1');
            $feature2           = request('feature2');
            $feature3           = request('feature3');
            
            
            $update             = DB::table('missions')
                                    ->updateOrInsert(
                                        [
                                            'id'            => $id
                                        ],
                                        [
                                            'title'         => $title,
                                            'description'   => $description,
                                            'feature1'      => $feature1,
                                            'feature2'      => $feature2,
                                            'feature3'      => $feature3,
                                            'updated_at'    => now()
                                        ]
                                    );

            Session::flash('success', "Successfully Updated");
            return back();
        }

        $get_data   = Mission::first();
        return view('frontpage/update_mission',['get_data'   => $get_data]);
    }

    public function viewVision(Request $request)
    {
        log::info('View Vision');
        log::info($request);

        $get_data   = Vision::first();

        return view('frontpage/view_vision',['get_data'    => $get_data]);
    }

    public function updateVision(Request $request)
    {
        log::info('Update Vision');
        log::info($request);

        if ($request->isMethod('post')) {
            $id                 = request('id');
            $title              = request('title');
            $description        = request('description');
            $feature1           = request('feature1');
            $feature2           = request('feature2');
            $feature3           = request('feature3');
            
            
            $update             = DB::table('visions')
                                    ->updateOrInsert(
                                        [
                                            'id'            => $id
                                        ],
                                        [
                                            'title'         => $title,
                                            'description'   => $description,
                                            'feature1'      => $feature1,
                                            'feature2'      => $feature2,
                                            'feature3'      => $feature3,
                                            'updated_at'    => now()
                                        ]
                                    );

            Session::flash('success', "Successfully Updated");
            return back();
        }

        $get_data   = Vision::first();
        return view('frontpage/update_vision',['get_data'   => $get_data]);
    }

    public function listFeatures(Request $request)
    {
        log::info('List All Features');
        log::info($request);

        $get_data   = Features::all();

        return view('frontpage/list_features',['get_data'    => $get_data]);
    }

    public function addFeatures(Request $request)
    {
        log::info('add Features');
        log::info($request);

        if ($request->isMethod('post')) {
            $title              = request('title');
            $description        = request('description');
            $image_file         = request('image_file');
            
            
            $insert_id          = DB::table('features')
                                    ->InsertGetId([
                                        'title'             => $title,
                                        'description'       => $description,
                                        'created_at'        => now(),
                                        'updated_at'        => now()
                                    ]
                                );

            if($image_file)
            {
                $image      = DB::table('features')->where('id','=',$insert_id) ->value('image');

                if($image != NULL)
                {
                    //remove from image uploads
                    unlink("image_uploads/".$image);
                }

                $destinationPath    = 'image_uploads';
                $filename           = $image_file->getClientOriginalName();
                $savedFileName      = strval($insert_id)."_".date('Ymdhis')."_".$filename;
                $path               = $image_file->move($destinationPath, $savedFileName);
                
                $update_image       =  DB::table('features')
                                        ->where('id', $insert_id)
                                        ->update([
                                            'image'         => $savedFileName,
                                            'updated_at'    => now()
                                        ]);
            }
            

            Session::flash('success', "Successfully Updated");
            return redirect()->route('features.list');
        }
        return view('frontpage/add_features');
    }

    public function viewFeature(Request $request)
    {
        log::info('View Feature');
        log::info($request);

        $id         =   request('id');

        $get_data   =   DB::table('features')->where('id','=',$id)->first();

        return view('frontpage/view_features',['get_data'   => $get_data]);
    }


    public function updateFeature(Request $request)
    {
        log::info('update Feature');
        log::info($request);

        if ($request->isMethod('post')) {
            $id                 = request('id');
            $title              = request('title');
            $description        = request('description');
            $image_file         = request('image_file');

            $update_blog        =  DB::table('features')
                                        ->where('id', $id)
                                        ->update([ 
                                            'title'             => $title,
                                            'description'       => $description,
                                            'updated_at'        =>  now(),
                                        ]);

            if($image_file)
            {
                $image      = DB::table('features')->where('id','=',$insert_id) ->value('image');

                if($image != NULL)
                {
                    //remove from image uploads
                    unlink("image_uploads/".$image);
                }

                $destinationPath    = 'image_uploads';
                $filename           = $image_file->getClientOriginalName();
                $savedFileName      = strval($id)."_".date('Ymdhis')."_".$filename;
                $path               = $image_file->move($destinationPath, $savedFileName);
                
                $update_image       =  DB::table('features')
                                        ->where('id', $id)
                                        ->update([
                                            'image'         => $savedFileName,
                                            'updated_at'    => now()
                                        ]);
            }
            

            Session::flash('success', "Successfully Updated");
            return redirect()->route('features.list');
        }

        $id                 =   request('id');

        $get_blog_data      =   DB::table('features')->where('id','=',$id)->first();

        return view('frontpage/update_features',['get_data'   => $get_blog_data]);
    }

    public function deleteFeature(Request $request)
    {
        log::info('delete Feature');
        log::info($request);
     
        header("cache-Control: no-store, no-cache, must-revalidate");
        header("cache-Control: post-check=0, pre-check=0", false);
        header("Pragma: no-cache");
        
        if ($request->isMethod('post')) {

            $id         =   request('id');
            
            $image      = DB::table('features')->where('id','=',$id) ->value('image');

            if($image != NULL)
            {
                //remove from image uploads
                unlink("image_uploads/".$image);
            }

            $delete_data=   DB::table('features')->where('id','=',$id)->delete();

            return redirect()->route('features.list')->withSuccess("Successfully Deleted");

        }
        return redirect()->route('features.list');
    }
}
