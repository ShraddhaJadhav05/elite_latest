<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use App\Models\ServiceCategory;
use App\Models\Service;

class ServicesController extends Controller
{
    public function listServiceCategory(Request $request)
    {
        log::info('List Service Category');
        log::info($request);

        $get_category   = ServiceCategory::all();

        $categories     = [];

        foreach($get_category as $category)
        {
            $categories[]   = array(
                                    'id'            => $category->id,
                                    'name'          => $category->name,
                                    'description'   => $category->description,
                                    'image'         => $category->image
                                );
        }

        return view('services/list_category',['get_data'    => $categories]);
    }

    public function addServiceCategory(Request $request)
    {
        log::info('add Service category');
        log::info($request);

        if ($request->isMethod('post')) {
            $name               = request('name');
            $description        = request('description');
            $image_file         = request('image_file');
            
            
            $insert_id          = DB::table('service_categories')
                                    ->InsertGetId([
                                        'name'              => $name,
                                        'description'       => $description,
                                        'created_at'        => now(),
                                        'updated_at'        => now()
                                    ]
                                );

            if($image_file)
            {
                $image      = DB::table('service_categories')->where('id','=',$insert_id) ->value('image');

                if($image != NULL)
                {
                    //remove from image uploads
                    unlink("image_uploads/".$image);
                }

                $destinationPath    = 'image_uploads';
                $filename           = $image_file->getClientOriginalName();
                $savedFileName      = strval($insert_id)."_".date('Ymdhis')."_".$filename;
                $path               = $image_file->move($destinationPath, $savedFileName);
                
                $update_image       =  DB::table('service_categories')
                                        ->where('id', $insert_id)
                                        ->update([
                                            'image'         => $savedFileName,
                                            'updated_at'    => now()
                                        ]);
            }
            

            Session::flash('success', "Successfully Updated");
            return redirect()->route('service.listCategory');
        }
        
        return view('services/add_category');
    }

    public function viewServiceCategory(Request $request)
    {
        log::info('View Service Category');
        log::info($request);

        $id                 =   request('id');

        $get_category_data  =   DB::table('service_categories')->where('id','=',$id)->first();

        $get_category       =   array(
                                    'id'                => $get_category_data->id,
                                    'name'              => $get_category_data->name,   
                                    'description'       => $get_category_data->description,
                                    'image'             => $get_category_data->image
                                );

        return view('services/view_category',
                        [
                            'get_data'          => $get_category
                        ]);
    }

    public function updateSeriveCategory(Request $request)
    {
        log::info('update Service category');
        log::info($request);

        if ($request->isMethod('post')) {
            $id                 = request('id');
            $name               = request('name');
            $description        = request('description');
            $image_file         = request('image_file');

            $update_blog        =  DB::table('service_categories')
                                        ->where('id', $id)
                                        ->update([ 
                                            'name'              => $name,
                                            'description'       => $description,
                                            'updated_at'        =>  now(),
                                        ]);

            if($image_file)
            {
                $image      = DB::table('service_categories')->where('id','=',$insert_id) ->value('image');

                if($image != NULL)
                {
                    //remove from image uploads
                    unlink("image_uploads/".$image);
                }

                $destinationPath    = 'image_uploads';
                $filename           = $image_file->getClientOriginalName();
                $savedFileName      = strval($id)."_".date('Ymdhis')."_".$filename;
                $path               = $image_file->move($destinationPath, $savedFileName);
                
                $update_image       =  DB::table('categories')
                                        ->where('id', $id)
                                        ->update([
                                            'image'        => $savedFileName,
                                            'updated_at'    => now()
                                        ]);
            }
            

            Session::flash('success', "Successfully Updated");
            return redirect()->route('service.listCategory');
        }

        $id                 =   request('id');

        $get_category_data  =   DB::table('service_categories')->where('id','=',$id)->first();

        return view('services/update_category',
                        [
                            'get_data'          => $get_category_data
                        ]);
    }

    public function deleteServiceCategory(Request $request)
    {
        log::info('delete Service category');
        log::info($request);
     
        header("cache-Control: no-store, no-cache, must-revalidate");
        header("cache-Control: post-check=0, pre-check=0", false);
        header("Pragma: no-cache");
        
        if ($request->isMethod('post')) {

            $id         = request('id');
            
            $image      = DB::table('service_categories')->where('id','=',$id) ->value('image');

            if($image != NULL && file_exists(public_path('image_uploads/'.$image)))
            {
                //remove from image uploads
                unlink("image_uploads/".$image);
            }

            $delete_data    = DB::table('service_categories')->where('id','=',$id)->delete();

            return redirect()->route('service.listCategory')->withSuccess("Successfully Deleted");

        }
        return redirect()->route('service.listCategory');
    }


    public function listServices(Request $request)
    {
        log::info('List Services');
        log::info($request);

        $get_data   = Service::all();

        return view('services/list_services',['get_data'   => $get_data]);
    }

    public function addService(Request $request)
    {
        log::info('add service');
        log::info($request);

        if ($request->isMethod('post')) {
            $title              = request('title');
            $description        = request('description');
            $url_key            = request('url_key');
            $meta_title         = request('meta_title');
            $meta_tag           = request('meta_tag');
            $meta_description   = request('meta_description');
            
            $insert_id          = DB::table('services')
                                    ->InsertGetId([
                                        'title'             => $title,
                                        'description'       => $description,
                                        'url_key'           => $url_key,
                                        'meta_title'        => $meta_title,
                                        'meta_tag'          => $meta_tag,
                                        'meta_description'  => $meta_description,
                                        'created_at'        => now(),
                                        'updated_at'        => now()
                                    ]
                                );
            

            Session::flash('success', "Successfully Updated");
            return redirect()->route('service.listServices');
        }

        return view('services/add_services');
    }

    public function viewService(Request $request)
    {
        log::info('View services');
        log::info($request);

        $id             =   request('id');

        $get_data       =   DB::table('services')->where('id','=',$id)->first();

        return view('services/view_service',
                        [
                            'get_data'  => $get_data
                        ]);
    }

    public function updateService(Request $request)
    {
        log::info('update service');
        log::info($request);

        if ($request->isMethod('post')) {
            $id                 = request('id');
            $title              = request('title');
            $description        = request('description');
            $url_key            = request('url_key');
            $meta_title         = request('meta_title');
            $meta_tag           = request('meta_tag');
            $meta_description   = request('meta_description');

            $update         =  DB::table('services')
                                ->where('id', $id)
                                ->update([ 
                                    'title'             => $title,
                                    'description'       => $description,
                                    'url_key'           => $url_key,
                                    'meta_title'        => $meta_title,
                                    'meta_tag'          => $meta_tag,
                                    'meta_description'  => $meta_description,
                                    'updated_at'        =>  now(),
                                ]);
            
            Session::flash('success', "Successfully Updated");
            return redirect()->route('service.listServices');
        }

        $id         =   request('id');

        $get_data   =   DB::table('services')->where('id','=',$id)->first();

        return view('services/update_service',
                        [
                            'get_data'  => $get_data,
                        ]);
    }

    public function deleteServices(Request $request)
    {
        log::info('delete services');
        log::info($request);
     
        header("cache-Control: no-store, no-cache, must-revalidate");
        header("cache-Control: post-check=0, pre-check=0", false);
        header("Pragma: no-cache");
        
        if ($request->isMethod('post')) {

            $id         =   request('id');

            $delete_data=   DB::table('services')->where('id','=',$id)->delete();

            return redirect()->route('service.listServices')->withSuccess("Successfully Deleted");

        }
        return redirect()->route('service.listServices');
    }
}
