<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Models\CategoryType;
use App\Models\Category;

class CategoryController extends Controller
{
    public function listCategoryType(Request $request)
    {
        log::info('List Category Type');
        log::info($request);

        $get_category_type  = CategoryType::all();

        return view('category/list_category_type',['get_data'   => $get_category_type]);
    }


    public function addCategoryType(Request $request)
    {
        log::info('add category type');
        log::info($request);

        if ($request->isMethod('post')) {
            $type           = request('type');
            $description    = request('description');
            
            
            $insert_id      = DB::table('category_types')
                                ->InsertGetId([
                                    'type'              => $type,
                                    'description'       => $description,
                                    'created_at'        => now(),
                                    'updated_at'        => now()
                                ]
                            );

            Session::flash('success', "Successfully Updated");
            return redirect()->route('category_type.list');
        }
        return view('category/add_category_type');
    }

    public function viewCategoryType(Request $request)
    {
        log::info('View Category Type');
        log::info($request);

        $id                 =   request('id');

        $get_category_data  =   DB::table('category_types')->where('id','=',$id)->first();

        return view('category/view_category_type',['get_data'   => $get_category_data]);
    }

    public function updateCategoryType(Request $request)
    {
        log::info('update category type');
        log::info($request);

        if ($request->isMethod('post')) {
            $id             = request('id');
            $type           = request('type');
            $description    = request('description');

            $update         =  DB::table('category_types')
                                ->where('id', $id)
                                ->update([ 
                                    'type'          => $type,
                                    'description'   => $description,
                                    'updated_at'    =>  now(),
                                ]);
            

            Session::flash('success', "Successfully Updated");
            return redirect()->route('category_type.list');
        }

        $id                 =   request('id');

        $get_category_data  =   DB::table('category_types')->where('id','=',$id)->first();

        return view('category/update_category_type',['get_data'   => $get_category_data]);
    }

    public function deleteCategoryType(Request $request)
    {
        log::info('delete category type');
        log::info($request);
     
        header("cache-Control: no-store, no-cache, must-revalidate");
        header("cache-Control: post-check=0, pre-check=0", false);
        header("Pragma: no-cache");
        
        if ($request->isMethod('post')) {

            $id         =   request('id');
            
            $delete_data=   DB::table('category_types')->where('id','=',$id)->delete();

            return redirect()->route('category_type.list')->withSuccess("Successfully Deleted");

        }
        return redirect()->route('category_type.list');
    }


    public function listCategory(Request $request)
    {
        log::info('List Category');
        log::info($request);

        $get_category   = Category::all();

        $categories     = [];

        foreach($get_category as $category)
        {
            // $category_type  = DB::table('category_types')->where('id','=',$category->category_type_id)->first();

            $categories[]   = array(
                                    'id'            => $category->id,
                                    'name'          => $category->name,
                                    'description'   => $category->description,
                                    // 'category_type' => $category_type->type,
                                    'image'         => $category->image
                                );
        }

        return view('category/list_category',['get_data'    => $categories]);
    }

    public function addCategory(Request $request)
    {
        log::info('add category');
        log::info($request);

        if ($request->isMethod('post')) {
            $name               = request('name');
            $description        = request('description');
            // $category_type_id   = request('category_type_id');
            $image_file         = request('image_file');
            
            
            $insert_id          = DB::table('categories')
                                    ->InsertGetId([
                                        'name'              => $name,
                                        'description'       => $description,
                                        // 'category_type_id'  => $category_type_id,
                                        'created_at'        => now(),
                                        'updated_at'        => now()
                                    ]
                                );

            if($image_file)
            {
                $image      = DB::table('categories')->where('id','=',$insert_id) ->value('image');

                if($image != NULL)
                {
                    //remove from image uploads
                    unlink("image_uploads/".$image);
                }

                $destinationPath    = 'image_uploads';
                $filename           = $image_file->getClientOriginalName();
                $savedFileName      = strval($insert_id)."_".date('Ymdhis')."_".$filename;
                $path               = $image_file->move($destinationPath, $savedFileName);
                
                $update_image       =  DB::table('categories')
                                        ->where('id', $insert_id)
                                        ->update([
                                            'image'         => $savedFileName,
                                            'updated_at'    => now()
                                        ]);
            }
            

            Session::flash('success', "Successfully Updated");
            return redirect()->route('category.list');
        }
        // $all_category_type  =   DB::table('category_types')->get();
        return view('category/add_category');
    }

    public function viewCategory(Request $request)
    {
        log::info('View Category');
        log::info($request);

        $id                 =   request('id');

        // $all_category_type  =   DB::table('category_types')->get();


        $get_category_data  =   DB::table('categories')->where('id','=',$id)->first();
        // $category_type      =   DB::table('category_types')->where('id','=',$get_category_data->category_type_id)->first();

        $get_category       =   array(
                                    'id'                => $get_category_data->id,
                                    'name'              => $get_category_data->name,
                                    // 'category_type_id'  => $get_category_data->category_type_id,    
                                    'description'       => $get_category_data->description,
                                    // 'category_type'     => $category_type->type,
                                    'image'             => $get_category_data->image
                                );

        return view('category/view_category',
                        [
                            'get_data'          => $get_category
                        ]);
    }

    public function updateCategory(Request $request)
    {
        log::info('update category');
        log::info($request);

        if ($request->isMethod('post')) {
            $id                 = request('id');
            $name               = request('name');
            $description        = request('description');
            // $category_type_id   = request('category_type_id');
            $image_file         = request('image_file');

            $update_blog        =  DB::table('categories')
                                        ->where('id', $id)
                                        ->update([ 
                                            'name'              => $name,
                                            'description'       => $description,
                                            // 'category_type_id'  => $category_type_id,
                                            'updated_at'        =>  now(),
                                        ]);

            if($image_file)
            {
                $image      = DB::table('categories')->where('id','=',$insert_id) ->value('image');

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
            return redirect()->route('category.list');
        }

        $id                 =   request('id');

        $get_category_data  =   DB::table('categories')->where('id','=',$id)->first();

        // $all_category_type  =   DB::table('category_types')->get();

        return view('category/update_category',
                        [
                            'get_data'          => $get_category_data,
                            // 'all_category_type' => $all_category_type
                        ]);
    }

    public function deleteCategory(Request $request)
    {
        log::info('delete category');
        log::info($request);
     
        header("cache-Control: no-store, no-cache, must-revalidate");
        header("cache-Control: post-check=0, pre-check=0", false);
        header("Pragma: no-cache");
        
        if ($request->isMethod('post')) {

            $id         =   request('id');
            
            $image      = DB::table('categories')->where('id','=',$id) ->value('image');

            if($image != NULL)
            {
                //remove from image uploads
                unlink("image_uploads/".$image);
            }

            $delete_data=   DB::table('categories')->where('id','=',$id)->delete();

            return redirect()->route('category.list')->withSuccess("Successfully Deleted");

        }
        return redirect()->route('category.list');
    }
}
