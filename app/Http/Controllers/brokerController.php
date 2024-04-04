<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\broker;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;



class brokerController extends Controller
{
    public function all_broker(){
        $broker=broker::paginate(10);
       
        return view('broker.all_broker', compact('broker'));
    }

    public function view_broker($id){
        
        $broker=broker::find($id);
        if(is_null($broker)){
            return response()->json(['message'=> 'not found'],404);
        }
        // return response()->json($lead::find($id),200);
        return view('broker.view_broker', ['broker' => $broker]);
    }

    public function show_broker(){
        
        return view('broker.add_broker');
    }

    // public function add_broker(Request $request){
    //     $data = $request->all();
    
    //     // Hash the password
    //     $data['password'] = Hash::make($data['password']);

    //     $broker = broker::create($data);

    //     $password = $broker->password;

    //     // Define email content
    //     $emailContent = "Hello " . $request->first_name . ",\n\n";
    //     $emailContent .= "Welcome to Elite Capital Mortgage! Your account has been created successfully.\n";
    //     $emailContent .= "Your Username is: " . $request->email . "\n";
    //     $emailContent .= "Your password is: " . $password . "\n";
    //     $emailContent .= "You can login at: " . route('login') . "\n\n";
    //     $emailContent .= "Thank you.";

    //     // Send email to user
    //     Mail::raw($emailContent, function ($message) use ($request) {
    //         $message->to($request->email)->subject('Welcome to Elite Capital Mortgage');
    //         $message->from('makedreams.shraddha@gmail.com', 'Elite Capital Mortgage');
    //     });


    //     return redirect()->route('all.broker')->withSuccess("Data Inserted Successfully");

    // }

    public function add_broker(Request $request){
        $data = $request->all();
    
        // Get the password before hashing
        $password = $data['password'];
    
        // Hash the password
        $data['password'] = Hash::make($data['password']);
    
        $broker = broker::create($data);
    
        // Define email content
        $emailContent = "Hello " . $request->first_name . ",\n\n";
        $emailContent .= "Welcome to Elite Capital Mortgage! Your account has been created successfully.\n";
        $emailContent .= "Your Username is: " . $request->email . "\n";
        $emailContent .= "Your password is: " . $password . "\n";
        $emailContent .= "You can login at: " . route('login') . "\n\n";
        $emailContent .= "Thank you.";
    
        // Send email to user
        Mail::raw($emailContent, function ($message) use ($request) {
            $message->to($request->email)->subject('Welcome to Elite Capital Mortgage');
            $message->from('makedreams.shraddha@gmail.com', 'Elite Capital Mortgage');
        });
    
        return redirect()->route('all.broker')->withSuccess("Data Inserted Successfully");
    }

    public function edit_broker($id){
        $broker=broker::find($id);
        if(is_null($broker)){
            return response()->json(['message'=> 'not found'],404);
        }
        // return response()->json($broker::find($id),200);
        return view('broker.edit_broker', ['broker' => $broker]);
    }

    public function update_broker(Request $request, $id){
        $broker=broker::find($id);
        if(is_null($broker)){
            return response()->json(['message'=> 'not found'],404);
        }
        $broker->update($request->all());
        // return response($lead,200);
        return redirect()->route('all.broker')->withSuccess("Data Updated Successfully");
    }

    public function delete_broker(Request $request, $id){
        $broker=broker::find($id);
        if(is_null($broker)){
            return response()->json(['message'=> 'not found'],404);
        }

        
        $broker->delete();
        // return response()->json(null,204);
        return redirect()->route('all.broker')->withSuccess("Data Deleted Successfully");

    }
}
