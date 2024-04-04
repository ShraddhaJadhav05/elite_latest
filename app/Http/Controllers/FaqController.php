<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Models\FAQ;

class FaqController extends Controller
{
    public function listFAQs(Request $request)
    {
        log::info('List FAQs');
        log::info($request);

        $get_faq    = FAQ::orderBy('created_at', 'desc')->get();

        $faqs       = [];

        foreach($get_faq as $faq)
        {
            $category   = DB::table('categories')->where('id','=',$faq->category_id)->first();

            $faqs[]     = array(
                            'id'            => $faq->id,
                            'question'      => $faq->question,
                            'answer'        => $faq->answer,
                            'category'      => $category->name
                        );
        }

        return view('faq/list_faq',['get_data'   => $faqs]);
    }

    public function addFAQ(Request $request)
    {
        log::info('add faq');
        log::info($request);

        if ($request->isMethod('post')) {
            $question           = request('question');
            $answer             = request('answer');
            $category_id        = request('category_id');
            
            $insert_id          = DB::table('f_a_q_s')
                                    ->InsertGetId([
                                        'question'          => $question,
                                        'answer'            => $answer,
                                        'category_id'       => $category_id,
                                        'created_at'        => now(),
                                        'updated_at'        => now()
                                    ]
                                );
            

            Session::flash('success', "Successfully Updated");
            return redirect()->route('faq.list');
        }
        $all_categories =   DB::table('categories')->get();

        return view('faq/add_faq',['all_categories' => $all_categories]);
    }

    public function viewFAQ(Request $request)
    {
        log::info('View FAQ');
        log::info($request);

        $id             =   request('id');

        $all_categories =   DB::table('categories')->get();

        $get_faq_data   =   DB::table('f_a_q_s')->where('id','=',$id)->first();

        return view('faq/view_faq',
                        [
                            'get_data'          => $get_faq_data,
                            'all_categories'    => $all_categories
                        ]);
    }

    public function updateFAQ(Request $request)
    {
        log::info('update faq');
        log::info($request);

        if ($request->isMethod('post')) {
            $id                 = request('id');
            $question           = request('question');
            $answer             = request('answer');
            $category_id        = request('category_id');

            $update         =  DB::table('f_a_q_s')
                                ->where('id', $id)
                                ->update([ 
                                    'question'          => $question,
                                    'answer'            => $answer,
                                    'category_id'       => $category_id,
                                    'updated_at'        =>  now(),
                                ]);
            
            Session::flash('success', "Successfully Updated");
            return redirect()->route('faq.list');
        }

        $id             =   request('id');

        $all_categories =   DB::table('categories')->get();

        $get_faq_data   =   DB::table('f_a_q_s')->where('id','=',$id)->first();

        return view('faq/update_faq',
                        [
                            'get_data'          => $get_faq_data,
                            'all_categories'    => $all_categories
                        ]);
    }

    public function deleteFAQ(Request $request)
    {
        log::info('delete faq');
        log::info($request);
     
        header("cache-Control: no-store, no-cache, must-revalidate");
        header("cache-Control: post-check=0, pre-check=0", false);
        header("Pragma: no-cache");
        
        if ($request->isMethod('post')) {

            $id         =   request('id');

            $delete_data=   DB::table('f_a_q_s')->where('id','=',$id)->delete();

            return redirect()->route('faq.list')->withSuccess("Successfully Deleted");

        }
        return redirect()->route('faq.list');
    }
}
