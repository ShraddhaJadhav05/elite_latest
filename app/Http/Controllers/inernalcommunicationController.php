<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\client;
use App\Models\outbox_message;
use App\Models\outbox_message_cliens;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendEmail;


class inernalcommunicationController extends Controller
{
    // public function show_outbox(){
    //     $data['pageTitle']='internal_communication';
    //     $profileid = Auth::user()->id;
    //     $adminData = User::find($profileid);

    //     $loggedInUserEmail = Auth::user()->email;

    //     $sentMessages = outbox_message::where('staff_id', Auth::id())->orderBy('created_at', 'desc')->get();
    //     return view('staff_portal_file.internal_communication.outbox',compact('data','adminData','sentMessages','loggedInUserEmail'));
    // }

    public function show_outbox(Request $request){
        $data['pageTitle'] = 'internal_communication';
        $profileid = Auth::user()->id;
        $adminData = User::find($profileid);
        $loggedInUserEmail = Auth::user()->email;
    
        $searchQuery = $request->input('search');
    
        $sentMessages = outbox_message::where('staff_id', Auth::id())
                        ->when($searchQuery, function ($query) use ($searchQuery) {
                            $query->where('subject', 'like', '%' . $searchQuery . '%')
                                  ->orWhere('message', 'like', '%' . $searchQuery . '%')
                                  // Join with outbox_message_clients table
                                  ->orWhereHas('clients', function ($subQuery) use ($searchQuery) {
                                      $subQuery->where('first_name', 'like', '%' . $searchQuery . '%');
                                  });
                        })
                        ->where('reply_flag', 0)
                        ->orderBy('created_at', 'desc')
                        ->get();
    
        return view('staff_portal_file.internal_communication.outbox', compact('data', 'adminData', 'sentMessages', 'loggedInUserEmail'));
    }
    
    
    

    public function show_new_message(){
        $data['pageTitle']='internal_communication';
        $profileid = Auth::user()->id;
        $adminData = User::find($profileid);

        $clients = client::all();
        return view('staff_portal_file.internal_communication.new_message',compact('data','adminData','clients'));
    }

    // public function show_inbox(){
    //     $data['pageTitle']='internal_communication';
    //     $profileid = Auth::user()->id;
    //     $adminData = User::find($profileid);
    //     $loggedInUserEmail = Auth::user()->email;

    //     $staffId = Auth::id(); // Get the ID of the logged-in staff member
    //     $inboxMessages = outbox_message::where('staff_id', $staffId)
    //                 ->whereHas('clients', function ($query) {
    //                     $query->where('client_id', '!=', null); // Filter messages sent by clients
    //                 })
    //                 ->where('reply_flag', 1) // Filter messages where reply_flag is 0
    //                 ->orderBy('created_at', 'desc')
    //                 ->get();
    //     // dd($inboxMessages);
    //     return view('staff_portal_file.internal_communication.inbox',compact('data','adminData','inboxMessages','loggedInUserEmail'));
    // }

    public function show_inbox(Request $request){
        $data['pageTitle'] = 'internal_communication';
        $profileid = Auth::user()->id;
        $adminData = User::find($profileid);
        $loggedInUserEmail = Auth::user()->email;
    
        $searchQuery = $request->input('search');
    
        $staffId = Auth::id(); 
        $inboxMessages = outbox_message::where('staff_id', $staffId)
                        ->whereHas('clients', function ($query) {
                            $query->where('client_id', '!=', null);
                        })
                        ->where('reply_flag', 1); 
    
        if ($searchQuery) {
            $inboxMessages->where(function ($query) use ($searchQuery) {
                $query->where('subject', 'like', '%' . $searchQuery . '%')
                      ->orWhere('message', 'like', '%' . $searchQuery . '%')
                      ->orWhereHas('clients', function ($subQuery) use ($searchQuery) {
                          $subQuery->where('first_name', 'like', '%' . $searchQuery . '%');
                      });
            });
        }
    
        $inboxMessages = $inboxMessages->orderBy('created_at', 'desc')->get();
    
        return view('staff_portal_file.internal_communication.inbox',compact('data','adminData','inboxMessages','loggedInUserEmail'));
    }
    

    public function send_message(Request $request){
        $sentMessages = outbox_message::where('staff_id', Auth::id())->orderBy('created_at', 'desc')->get();

        $imageName = null;
        $clients = client::all();

        // Validate the incoming request
        $request->validate([
            'client_id' => 'required|array',
            'client_id.*' => 'exists:clients,id',
            'subject' => 'required',
            'message' => 'required',
            'attached_file' => 'nullable|file|max:2048',
        ]);

         // Check if file is attached
        if ($request->hasFile("attached_file")) {
            $file = $request->file("attached_file");
            $imageName = time() . '_' . $file->getClientOriginalName(); // Generate unique file name
            $file->move(public_path("attached_files/"), $imageName);
        }

        $staff_id = Auth::id();

        // Create a new outbox message
        $message = new outbox_message();
        $message->staff_id = $staff_id;
        $message->subject = $request->input('subject');
        $message->message = $request->input('message');
        $message->attached_file = $imageName;

        $message->save();

        $message->clients()->sync($request->input('client_id'));

        // Fetch selected clients
        $selectedClients = client::whereIn('id', $request->input('client_id'))->get();

        $loggedinuser = Auth::user();
        
        // Define email content
        // $emailContent = $request->message . "\n\n";
        
        // $emailContent .= "Thank you.";

        // Send email to each selected client
        // foreach ($selectedClients as $client) {
        //     Mail::raw($emailContent, function ($message) use ($client, $loggedinuser, $request, $imageName) {
                
        //         $message->to($client->email)->subject($request->subject);
                
        //         $message->from($loggedinuser->email, $loggedinuser->fname);
        //         if ($imageName) {
        //             $message->attach(public_path("attached_files/" . $imageName));
        //         }
        //     });
        // }

        // return view('staff_portal_file.internal_communication.outbox',compact('clients','sentMessages'));
        return redirect()->route('show.outbox')->withSuccess("Data Inserted Successfully");

    }

    public function delete_outbox_message(Request $request,$id){
        $outboxMessage = outbox_message::find($id);
    
        if(!$outboxMessage) {
            // Handle the case where the outbox message does not exist
            return redirect()->back()->with('error', 'Outbox message not found.');
        }
        
        $outboxMessage->clients()->detach();

        // Delete the outbox message
        $outboxMessage->delete();
        return redirect()->route('show.outbox')->withSuccess("Data Deleted Successfully");
    }

    public function deleteAll(){
        outbox_message_cliens::query()->delete();
        outbox_message::query()->delete();

        return redirect()->route('show.outbox')->withSuccess("All Outbox Messages Deleted Successfully");
    }

    public function delete_inbox_message(Request $request,$id){
        $outboxMessage = outbox_message::find($id);
    
        if(!$outboxMessage) {
            // Handle the case where the outbox message does not exist
            return redirect()->back()->with('error', 'Outbox message not found.');
        }
        
        $outboxMessage->clients()->detach();

        // Delete the outbox message
        $outboxMessage->delete();
        return redirect()->route('show.inbox')->withSuccess("Data Deleted Successfully");
    }

    public function deleteAllinbox(){
        outbox_message_cliens::query()->delete();
        outbox_message::query()->delete();

        return redirect()->route('show.inbox')->withSuccess("All Outbox Messages Deleted Successfully");
    }

    public function replyToMessage(Request $request, $message_id) {
        $originalMessage = outbox_message::find($message_id);
        
        $replyMessage = $request->input('replyMessage');
        // Assuming you have a relationship set up between messages for replies
        $reply = new outbox_message();
        $reply->staff_id = Auth::id();
        $reply->subject = $originalMessage->subject;
        $reply->message = $replyMessage;
        $reply->save();
    
        $reply->clients()->sync($originalMessage->clients->pluck('id'));

        return redirect()->route('show.inbox')->withSuccess("Data Inserted Successfully");
    }

    public function archive_messages(){
        $data['pageTitle']='internal_communication';
        $profileid = Auth::user()->id;
        $adminData = User::find($profileid);

        return view('staff_portal_file.internal_communication.archive_message',compact('data','adminData'));
    }

    public function starred_messages(){
        $data['pageTitle']='internal_communication';
        $profileid = Auth::user()->id;
        $adminData = User::find($profileid);

        return view('staff_portal_file.internal_communication.starred_message',compact('data','adminData'));
    }
    
    
    
}
