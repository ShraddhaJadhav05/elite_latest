<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Home;
use App\Models\Blog;
use Carbon\Carbon;
use Illuminate\Support\Str;

class HomepageController extends Controller
{
    public function homePage(Request $request)
    {
        log::info('Home page');
        log::info($request);

        $get_home_data  = Home::first();


        $get_all_blogs  = Blog::latest()->take(4)->get();
        $blogs          = [];

        foreach($get_all_blogs as $blog)
        {
            $format_date        = Carbon::parse($blog->date)->format('M d, Y');
            $slug_title         = Str::slug($blog->title);
            $short_description  = Str::limit(strip_tags($blog->description), 150);

            $blogs[]    = array(
                            'id'                => $blog->id,
                            'title'             => $blog->title,
                            'description'       => $blog->description,
                            'short_description' => $short_description,
                            'meta_title'        => $blog->meta_title,
                            'meta_tag'          => $blog->meta_tag,
                            'meta_description'  => $blog->meta_description,
                            'image'             => $blog->image,
                            'image_text'        => $blog->image_text,
                            'date'              => $format_date,
                            'slug_title'        => $slug_title,	
                        );
        }

        return view('frontend/templates/home',
                    [
                        'get_data'      => $get_home_data,
                        'blogs'         => $blogs
                    ]);
    }
}
