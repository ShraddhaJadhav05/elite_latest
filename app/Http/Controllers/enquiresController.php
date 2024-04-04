<?php

namespace App\Http\Controllers;
use App\Models\Enquiry;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class enquiresController extends Controller
{
    public function all_enquires(Request $request){
        $data['pageTitle']='enquiry';
        $profileid = Auth::user()->id;
        $adminData = User::find($profileid);
        
        $searchQuery = $request->input('search');
        $enquiry = Enquiry::when($searchQuery, function ($query) use ($searchQuery) {
            $query->where('name', 'like', '%' . $searchQuery . '%')
                  ->orWhere('phone', 'like', '%' . $searchQuery . '%')
                  ->orWhere('email', 'like', '%' . $searchQuery . '%');
        })->paginate(10);

        // $enquiry=Enquiry::all();
        
        return view('Enquiry.all_enquiry', compact('enquiry','adminData','data'));
    }

    public function view_enquiry($id){
        $data['pageTitle']='enquiry';
        $profileid = Auth::user()->id;
        $adminData = User::find($profileid);
        $enquiry=Enquiry::find($id);
        if(is_null($enquiry)){
            return response()->json(['message'=> 'not found'],404);
        }

        // return response()->json($lead::find($id),200);
        return view('Enquiry.view_enquiry', ['enquiry' => $enquiry,'adminData' => $adminData,'data' => $data]);
    }
}
