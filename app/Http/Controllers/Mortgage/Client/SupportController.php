<?php

namespace App\Http\Controllers\Mortgage\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Models\ClientSupportTicket;
use App\Models\ContactUs; 
class SupportController extends Controller
{
    public function clientListSupportTickets(Request $request)
    {
        log::info('Client List Support Questions');
        log::info($request);

        header("cache-Control: no-store, no-cache, must-revalidate");
        header("cache-Control: post-check=0, pre-check=0", false);
        header("Pragma: no-cache");

        if(session()->has('client_id'))
        {
            $client_id      = session()->get('client_id');

            $support_tikets = ClientSupportTicket::where('client_id', $client_id)
                                ->latest()
                                ->take(3)
                                ->get();

            $contact_data   = ContactUs::first();
            
            return view('mortgage/client/support/list_support_questions',['support_tikets' => $support_tikets,'contact_data' => $contact_data]);
        }
        return redirect()->route('clientLogin');
    }

    public function clientViewAllSupportTickets(Request $request)
    {
        log::info('Client View All Support Questions');
        log::info($request);

        header("cache-Control: no-store, no-cache, must-revalidate");
        header("cache-Control: post-check=0, pre-check=0", false);
        header("Pragma: no-cache");

        if(session()->has('client_id'))
        {
            $client_id      = session()->get('client_id');

            $support_tikets = ClientSupportTicket::where('client_id', $client_id)
                                ->latest()
                                ->get();
            
            return view('mortgage/client/support/view_all_support_questions',['support_tikets' => $support_tikets]);
        }
        return redirect()->route('clientLogin');
    }


    public function clientAddSupportTickets(Request $request)
    {
        log::info('Client Add Support Questions');
        log::info($request);

        header("cache-Control: no-store, no-cache, must-revalidate");
        header("cache-Control: post-check=0, pre-check=0", false);
        header("Pragma: no-cache");

        if(session()->has('client_id'))
        {
            if ($request->isMethod('post')) {
                
                $client_id  = session()->get('client_id');

                $support_for= $request->support_for;
                $subject    = $request->subject;
                $content    = $request->content;

                $support                = new ClientSupportTicket();
                $support->client_id     = $client_id;
                $support->support_for   = $support_for;
                $support->subject       = $subject;
                $support->content       = $content;
                $support->created_at    = now();
                $support->updated_at    = now();
                $support->save();
                
                Session::flash('success', "Your ticket added successfully");
                return redirect()->route('help.support.view_all_support_tickets');
            }
            
            return view('mortgage/client/support/add_support_questions');
        }
        return redirect()->route('clientLogin');
    }


    public function clientViewSupportTikets(Request $request)
    {
        log::info('Client View Support Questions');
        log::info($request);

        header("cache-Control: no-store, no-cache, must-revalidate");
        header("cache-Control: post-check=0, pre-check=0", false);
        header("Pragma: no-cache");

        if(session()->has('client_id'))
        {
            $id         = $request->id;
            $get_data   = ClientSupportTicket::where('id', $id)->first();

            return view('mortgage/client/support/view_support_questions',['get_data' => $get_data]);
        }
        return redirect()->route('clientLogin');
    }

    public function searchSupportTicket(Request $request)
    {
        log::info('search support ticket');
        log::info($request);

        if(session()->has('client_id'))
        {
            $client_id      = session()->get('client_id');
            $search         = $request->input('search');

            $support_tickets = ClientSupportTicket::where('client_id', $client_id)
                                ->where('subject', 'like', '%' . $search . '%')
                                ->latest()
                                ->get();

            return response()->json($support_tickets);
        }
        return redirect()->route('clientLogin');
    }

    public function searchSupportTicketGetLatestThree(Request $request)
    {
        log::info('search support ticket');
        log::info($request);

        if(session()->has('client_id'))
        {
            $client_id      = session()->get('client_id');

            $support_tickets= ClientSupportTicket::where('client_id', $client_id)
                                ->latest()
                                ->take(3)
                                ->get();

            return response()->json($support_tickets);
        }
        return redirect()->route('clientLogin');
    }

    public function searchSupportTicketGetAll(Request $request)
    {
        log::info('search support ticket');
        log::info($request);

        if(session()->has('client_id'))
        {
            $client_id      = session()->get('client_id');

            $support_tickets= ClientSupportTicket::where('client_id', $client_id)
                                ->latest()
                                ->get();

            return response()->json($support_tickets);
        }
        return redirect()->route('clientLogin');
    }
}
