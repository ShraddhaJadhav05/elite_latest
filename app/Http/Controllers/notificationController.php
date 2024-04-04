<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\broker_notification;
use App\Models\client_notification;
use App\Models\broker;
use App\Models\client;
use Illuminate\Support\Facades\Auth;

use App\Models\User;


class notificationController extends Controller
{
    public function notification_agents(Request $request){
        $profileid = Auth::user()->id;
        $adminData = User::find($profileid);
        $data['pageTitle']='notification';

        $searchQuery = $request->input('search');
        $broker_notification = broker_notification::when($searchQuery, function ($query) use ($searchQuery) {
            $query->where('broker_notification', 'like', '%' . $searchQuery . '%');
        })->paginate(10);

        // $broker_notification= broker_notification:: all();
        // dd($broker_notification);
        $broker = broker::all();
        return view('notification.all_agents',compact('broker_notification','broker','data','adminData'));
    }

    public function notification_borrowers(Request $request){
        $profileid = Auth::user()->id;
        $adminData = User::find($profileid);
        $data['pageTitle']='notification';

        $searchQuery = $request->input('search');
        $client_notification = client_notification::when($searchQuery, function ($query) use ($searchQuery) {
            $query->where('client_notification', 'like', '%' . $searchQuery . '%');
        })->paginate(10);

        // $client_notification = client_notification::all();
        $client=client::all();
        return view('notification.all_borrowers',compact('client_notification','client','data','adminData'));
    }

    public function notification_types(){
        $data['pageTitle']='notification';

        $id = Auth::user()->id;
        $adminData = User::find($id);
        return view('notification.all_types',compact('id','adminData','data'));
    }

    public function add_broker_notification(Request $request){
        $broker_notification = broker_notification::create($request->all());
        
        return redirect()->route('all.notification.agents')->withSuccess("Data Inserted Successfully");
    }

    public function send_all_broker_notification(Request $request){
        $request->validate([
            'broker_notification' => 'required|string',
        ]);

        $broker = broker::all();

        foreach ($broker as $brokers) {
            broker_notification::create([
                'broker_id' => $brokers->id,
                'broker_notification' => $request->input('broker_notification'),
            ]);
        }

        return response()->json(['success' => true]);

    }

    public function send_all_client_notification(Request $request){
        
        $request->validate([
            'client_notification' => 'required|string',
        ]);
        
        $client = client::all();
        
        foreach ($client as $clients) {
            client_notification::create([
                'client_id' => $clients->id,
                'client_notification' => $request->input('client_notification'),
            ]);
        }

        return response()->json(['success' => true]);
    }
    
    public function view_broker_notification($id) {
        $profileid = Auth::user()->id;
        $adminData = User::find($profileid);
        $data['pageTitle']='notification';

        $broker_notification = broker_notification::find($id);
        if (is_null($broker_notification)) {
            return response()->json(['message' => 'not found'], 404);
        }
        
        return response()->json(['success' => true, 'broker_notification' => $broker_notification,'data' => $data,'adminData' => $adminData], 200);    
    }

    public function update_broker_notification(Request $request, $id){
       
        $broker_notification = broker_notification::find($id);
        if(is_null($broker_notification)){
            return response()->json(['message'=> 'not found'],404);
        }
        $broker_notification->update($request->all());
        // return response($lead,200);
        // Check if the request is AJAX
        if ($request->ajax()) {
            return response()->json(['success' => true, 'broker_notification' => $broker_notification], 200);
        } else {
            return redirect()->route('all.notification.agents'); 
        }    
    }

    public function delete_notification(Request $request, $id){
        $broker_notification=broker_notification::find($id);
        if(is_null($broker_notification)){
            return response()->json(['message'=> 'not found'],404);
        }
        
        $broker_notification->delete();
        // return response()->json(null,204);
        return redirect()->route('all.notification.agents')->withSuccess("Data Deleted Successfully");
    }

    public function add_client_notification(Request $request){
        $client_notification = client_notification::create($request->all());
        
        return redirect()->route('all.notification.borrowers')->withSuccess("Data Inserted Successfully");
    }

  

    public function view_client_notification($id){
        $profileid = Auth::user()->id;
        $adminData = User::find($profileid);
        $data['pageTitle']='notification';

        $client_notification = client_notification::find($id);
        if (is_null($client_notification)) {
            return response()->json(['message' => 'not found'], 404);
        }
        
        return response()->json(['success' => true, 'client_notification' => $client_notification,'data' => $data,'adminData' => $adminData], 200); 
    }

    public function update_client_notification(Request $request, $id){
        $client_notification = client_notification::find($id);
        if(is_null($client_notification)){
            return response()->json(['message'=> 'not found'],404);
        }
        $client_notification->update($request->all());
        // return response($lead,200);
        // Check if the request is AJAX
        if ($request->ajax()) {
            return response()->json(['success' => true, 'client_notification' => $client_notification], 200);
        } else {
            return redirect()->route('all.notification.borrowers'); 
        }   
    }

    public function delete_client_notification(Request $request,$id){
        $client_notification=client_notification::find($id);
        if(is_null($client_notification)){
            return response()->json(['message'=> 'not found'],404);
        }
        
        $client_notification->delete();
        // return response()->json(null,204);
        return redirect()->route('all.notification.borrowers')->withSuccess("Data Deleted Successfully");
    }
    
}
