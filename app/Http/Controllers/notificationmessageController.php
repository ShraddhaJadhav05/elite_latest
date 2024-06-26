<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\client;
use App\Models\notification_message;
use App\Models\notification_message_client;


class notificationmessageController extends Controller
{
    public function show_outbox_notification(Request $request){
        $user_role = Auth::user()->role;
        $data['pageTitle']='notification';
        $userId = Auth::user()->id;
        $adminData = Auth::user();
        if($user_role == 'staff'){
            $staff = auth()->user()->staff;
            $sentMessages = notification_message::where("from", "staff")->where("staff_id", $staff?->id)->orderBy('created_at', 'desc')->get();
        }elseif($user_role == "user"){
            // i don't know thw client portal and funtionality so haven't did it '
            // $client = auth()->user()->client;
            // if ($client) {
            //     // Access the notification messages of the client
            //     $sentMessages = $client->notification_messages->orderBy('created_at', 'desc')->get();
            // }
        }
    
        // $searchQuery = $request->input('search');
    
        // $sentMessages = notification_message::where('staff_id', Auth::id())
        //                 ->when($searchQuery, function ($query) use ($searchQuery) {
        //                     $query->Where('message', 'like', '%' . $searchQuery . '%')
        //                           ->orWhereHas('clients', function ($subQuery) use ($searchQuery) {
        //                               $subQuery->where('first_name', 'like', '%' . $searchQuery . '%');
        //                           });
        //                 })
        //                 ->orderBy('created_at', 'desc')
        //                 ->get();


        return view('staff_portal_file.notification_messages.outbox',compact('data','adminData','sentMessages'));
    }

    public function show_inbox_notification(Request $request){
        $user_role = Auth::user()->role;
        $data['pageTitle']='notification';
        $userId = Auth::user()->id;
        $adminData = Auth::user();
        $loggedInUserEmail = Auth::user()->email;

            
        $searchQuery = $request->input('search');
    
        // $inboxMessages = notification_message::where('staff_id', $staffId)
        //                 ->whereHas('clients', function ($query) {
        //                     $query->where('client_id', '!=', null);
        //                 });
                        // ->where('reply_flag', 1); 
        // if ($searchQuery) {
        //     $inboxMessages->where(function ($query) use ($searchQuery) {
        //         $query->Where('message', 'like', '%' . $searchQuery . '%')
        //               ->orWhereHas('clients', function ($subQuery) use ($searchQuery) {
        //                   $subQuery->where('first_name', 'like', '%' . $searchQuery . '%');
        //               });
        //     });
        // }
        if($user_role == 'staff'){
            $staff = auth()->user()->staff;
            $inboxMessages = notification_message::where("from", "admin")->where("staff_id", $staff?->id)->orderBy('created_at', 'desc')->get();
        }elseif($user_role == "user"){
            $client = auth()->user()->client;
            if ($client) {
                // Access the notification messages of the client
                $inboxMessages = $client->notification_messages->orderBy('created_at', 'desc')->get();
            }
        }
        return view('staff_portal_file.notification_messages.inbox',compact('data','adminData','inboxMessages'));
    }

    public function new_notiication_message(){
        $data['pageTitle']='notification';
        $profileid = Auth::user()->id;
        $adminData = User::find($profileid);
        $clients = client::all();

        return view('staff_portal_file.notification_messages.new_message',compact('data','adminData','clients'));
    }

    public function send_notification(Request $request){

        $imageName = null;

        // Validate the incoming request
        $request->validate([
            'client_id' => 'required|array',
            'client_id.*' => 'exists:clients,id',
            'message' => 'required',
            'attached_file' => 'nullable|file|max:2048',
        ]);

         // Check if file is attached
        if ($request->hasFile("attached_file")) {
            $file = $request->file("attached_file");
            $imageName = time() . '_' . $file->getClientOriginalName(); // Generate unique file name
            $file->move(public_path("attached_files_notification/"), $imageName);
        }

        $staff_id = Auth::id();
        // Create a new outbox message
        $message = new notification_message();
        $message->staff_id = $staff_id;

        $message->message = $request->input('message');

        $message->attached_file = $imageName;
        $message->from = 'staff';
        $message->save();

        $message->clients()->sync($request->input('client_id',true, 'notification_message_clients'));

        return redirect()->route('show.outbox.notification')->withSuccess("Data Inserted Successfully");
    }

    public function deleteAllinboxnotification(){
        notification_message_client::query()->delete();
        notification_message::query()->delete();

        return redirect()->route('show.outbox.notification')->withSuccess("All Outbox Messages Deleted Successfully");
    }

    public function show_communication(){
        $data['pageTitle']='staff_customer_lead';
        $profileid = Auth::user()->id;
        $adminData = User::find($profileid);

        return view('staff_portal_file.communication',compact('data','adminData'));
    }

    public function performance_reports(){
        $data['pageTitle']='reports';
        $profileid = Auth::user()->id;
        $adminData = User::find($profileid);

        return view('staff_portal_file.reports_analytics.perormance',compact('data','adminData'));
    }

    public function application_reports(){
        $data['pageTitle']='reports';
        $profileid = Auth::user()->id;
        $adminData = User::find($profileid);

        return view('staff_portal_file.reports_analytics.application',compact('data','adminData'));
    }

    public function traing_material(){
        $data['pageTitle']='training';
        $profileid = Auth::user()->id;
        $adminData = User::find($profileid);

        return view('staff_portal_file.traing_resource.training_material',compact('data','adminData'));
    }

    public function ploicy_doc(){
        $data['pageTitle']='training';
        $profileid = Auth::user()->id;
        $adminData = User::find($profileid);

        return view('staff_portal_file.traing_resource.policy_document',compact('data','adminData'));
    }
}
