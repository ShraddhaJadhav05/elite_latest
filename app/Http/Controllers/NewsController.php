<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Models\Blog;

class NewsController extends Controller
{
    public function listBlogs(Request $request)
    {
        log::info('List All Blogs');
        log::info($request);

        $get_blog_data  = Blog::all();

        return view('blog/list_blogs',['get_data'    => $get_blog_data]);
    }

    public function addBlog(Request $request)
    {
        log::info('add Blog');
        log::info($request);

        if ($request->isMethod('post')) {
            $title              = request('title');
            $description        = request('description');
            $image_text         = request('image_text');
            $date               = request('date');
            $meta_title         = request('meta_title');
            $meta_tag           = request('meta_tag');
            $meta_description   = request('meta_description');
            $image_file         = request('image_file');
            
            
            $insert_id          = DB::table('blogs')
                                    ->InsertGetId([
                                        'title'             => $title,
                                        'description'       => $description,
                                        'image_text'        => $image_text,
                                        'date'              => $date,
                                        'meta_title'        => $meta_title,
                                        'meta_tag'          => $meta_tag,
                                        'meta_description'  => $meta_description,
                                        'created_at'        => now(),
                                        'updated_at'        => now()
                                    ]
                                );

            if($image_file)
            {
                $image      = DB::table('blogs')->where('id','=',$insert_id) ->value('image');

                if($image != NULL)
                {
                    //remove from image uploads
                    unlink("image_uploads/".$image);
                }

                $destinationPath    = 'image_uploads';
                $filename           = $image_file->getClientOriginalName();
                $savedFileName      = strval($insert_id)."_".date('Ymdhis')."_".$filename;
                $path               = $image_file->move($destinationPath, $savedFileName);
                
                $update_image       =  DB::table('blogs')
                                        ->where('id', $insert_id)
                                        ->update([
                                            'image'         => $savedFileName,
                                            'updated_at'    => now()
                                        ]);
            }
            

            Session::flash('success', "Successfully Updated");
            return redirect()->route('blogs.list');
        }
        return view('blog/add_blog');
    }

    public function viewBlog(Request $request)
    {
        log::info('View Blog');
        log::info($request);

        $id                 =   request('id');

        $get_blog_data      =   DB::table('blogs')->where('id','=',$id)->first();

        return view('blog/view_blog',['get_data'   => $get_blog_data]);
    }

    public function updateBlog(Request $request)
    {
        log::info('update Blog');
        log::info($request);

        if ($request->isMethod('post')) {
            $id                 = request('id');
            $title              = request('title');
            $description        = request('description');
            $image_text         = request('image_text');
            $date               = request('date');
            $meta_title         = request('meta_title');
            $meta_tag           = request('meta_tag');
            $meta_description   = request('meta_description');
            $image_file         = request('image_file');

            $update_blog        =  DB::table('blogs')
                                        ->where('id', $id)
                                        ->update([ 
                                            'title'             => $title,
                                            'description'       => $description,
                                            'image_text'        => $image_text,
                                            'date'              => $date,
                                            'meta_title'        => $meta_title,
                                            'meta_tag'          => $meta_tag,
                                            'meta_description'  => $meta_description,
                                            'updated_at'        =>  now(),
                                        ]);

            if($image_file)
            {
                $image      = DB::table('blogs')->where('id','=',$insert_id) ->value('image');

                if($image != NULL)
                {
                    //remove from image uploads
                    unlink("image_uploads/".$image);
                }

                $destinationPath    = 'image_uploads';
                $filename           = $image_file->getClientOriginalName();
                $savedFileName      = strval($id)."_".date('Ymdhis')."_".$filename;
                $path               = $image_file->move($destinationPath, $savedFileName);
                
                $update_image       =  DB::table('blogs')
                                        ->where('id', $id)
                                        ->update([
                                            'image'         => $savedFileName,
                                            'updated_at'    => now()
                                        ]);
            }
            

            Session::flash('success', "Successfully Updated");
            return redirect()->route('blogs.list');
        }

        $id                 =   request('id');

        $get_blog_data      =   DB::table('blogs')->where('id','=',$id)->first();

        return view('blog/update_blog',['get_data'   => $get_blog_data]);
    }

    public function deleteBlog(Request $request)
    {
        log::info('delete Blog');
        log::info($request);
     
        header("cache-Control: no-store, no-cache, must-revalidate");
        header("cache-Control: post-check=0, pre-check=0", false);
        header("Pragma: no-cache");
        
        if ($request->isMethod('post')) {

            $id         =   request('id');
            
            $image      = DB::table('blogs')->where('id','=',$id) ->value('image');

            if($image != NULL)
            {
                //remove from image uploads
                unlink("image_uploads/".$image);
            }

            $delete_data=   DB::table('blogs')->where('id','=',$id)->delete();

            return redirect()->route('blogs.list')->withSuccess("Successfully Deleted");

        }
        return redirect()->route('blogs.list');
    }
}
