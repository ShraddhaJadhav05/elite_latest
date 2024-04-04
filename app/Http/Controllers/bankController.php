<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\bank;
use App\Models\Branch;
use Illuminate\Support\Facades\Auth;

use App\Models\User;


class bankController extends Controller
{

    
    public function all_banks(Request $request)
    {
        $profileid = Auth::user()->id;
        $adminData = User::find($profileid);
        $data['pageTitle']='banks';
        $searchQuery = $request->input('search');
        $banks = Bank::when($searchQuery, function ($query) use ($searchQuery) {
            $query->where('name', 'like', '%' . $searchQuery . '%');
        })->paginate(10);
    
        return view('banks_and_products.bank.all_bank', compact('banks','data','adminData'));
    }
        
    public function show_banks(){
        $profileid = Auth::user()->id;
        $adminData = User::find($profileid);
        $data['pageTitle']='banks';
        return view('banks_and_products.bank.add_bank',compact('data','adminData'));
    }



    public function add_banks(Request $request){
        $request->merge(['country' => 'United Arab Emirates']);

        $imageName = null; // Initialize imageName variable

        if($request->hasFile("logo")) {
            $file = $request->file("logo");
            $imageName = time() . '_' . $file->getClientOriginalName(); // Generate unique file name
            $file->move(public_path("bank_logo/"), $imageName);
        }

        // Ensure $imageName is included in the data being saved to the database
        $bankData = $request->all();
        $bankData['logo'] = $imageName; // Assuming 'logo' is the column name for the image in the database

        $bank = Bank::create($bankData);

        return redirect()->route('all.banks')->withSuccess("Data Inserted Successfully");
    }

    public function view_bank($id){
        $profileid = Auth::user()->id;
        $adminData = User::find($profileid);
        $data['pageTitle']='banks';
        $bank=bank::find($id);
        if(is_null($bank)){
            return response()->json(['message'=> 'not found'],404);
        }
        // return response()->json($lead::find($id),200);
        return view('banks_and_products.bank.view_bank', ['bank' => $bank,'data' => $data,'adminData' => $adminData]);
    }

    public function edit_bank($id){
        $profileid = Auth::user()->id;
        $adminData = User::find($profileid);
        $data['pageTitle']='banks';
        $bank=bank::find($id);
        if(is_null($bank)){
            return response()->json(['message'=> 'not found'],404);
        }
        // return response()->json($lead::find($id),200);
        return view('banks_and_products.bank.edit_bank', ['bank' => $bank,'data' => $data,'adminData' => $adminData]);
    }

    // public function update_bank(Request $request,$id){
    //     $bank=bank::find($id);
    //     if(is_null($bank)){
    //         return response()->json(['message'=> 'not found'],404);
    //     }
    //     $bank->update($request->all());
        
    //     return redirect()->route('all.banks')->withSuccess("Data Updated Successfully");
    // }

    public function update_bank(Request $request, $id){
        $bank = Bank::find($id);

        if(is_null($bank)){
            return response()->json(['message' => 'Bank not found'], 404);
        }
        $imageName = null;
        $oldImagePath = $bank->logo; // Assume $bank->logo holds the current image name

        if($request->hasFile("logo")) {
            // Delete the old image if it exists
            if (!is_null($oldImagePath)) {
                $oldImagePath = public_path("bank_logo/") . $oldImagePath;
                if (file_exists($oldImagePath)) {
                    @unlink($oldImagePath);
                }
            }

            // Upload and save the new image
            $file = $request->file("logo");
            $imageName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path("bank_logo/"), $imageName);
        }

        // Prepare data for updating (excluding the file from the request)
        $bankData = $request->except(['logo']);
        if($imageName !=null){
            $bankData['logo'] = $imageName; // Update the image name in the array
        }

        // Update the bank record
        $bank->update($bankData);

        return redirect()->route('all.banks')->withSuccess("Data Updated Successfully");
    }

    public function delete_bank(Request $request,$id){
        $bank=bank::find($id);
        if(is_null($bank)){
            return response()->json(['message'=> 'not found'],404);
        }

        $bank->delete();
        // return response()->json(null,204);
        return redirect()->route('all.banks')->withSuccess("Data Deleted Successfully");
    }


    public function all_branch(Request $request)
    {
        $profileid = Auth::user()->id;
        $adminData = User::find($profileid);
        $data['pageTitle']='banks';
        $searchQuery = $request->input('search');
        $branch = Branch::when($searchQuery, function ($query) use ($searchQuery) {
            $query->where('branch_name', 'like', '%' . $searchQuery . '%');
        })->paginate(10);
    
        return view('banks_and_products.branch.all_branch', compact('branch','data','adminData'));
    }
        
    public function show_branch(){
        $profileid = Auth::user()->id;
        $adminData = User::find($profileid);
        $data['pageTitle']='banks';
        return view('banks_and_products.branch.add_branch',compact('data','adminData'));
    }

    public function add_branch(Request $request){
        
        $branchData = $request->all();
        $branch = Branch::create($branchData);

        return redirect()->route('all.branch')->withSuccess("Data Inserted Successfully");
    }

    public function view_branch($id){
        $profileid = Auth::user()->id;
        $adminData = User::find($profileid);
        $data['pageTitle']='banks';
        $branch=Branch::find($id);
        if(is_null($branch)){
            return response()->json(['message'=> 'not found'],404);
        }
        // return response()->json($lead::find($id),200);
        return view('banks_and_products.branch.view_branch', ['branch' => $branch,'data' => $data,'adminData' => $adminData]);
    }

    public function edit_branch($id){
        $profileid = Auth::user()->id;
        $adminData = User::find($profileid);
        $data['pageTitle']='banks';
        $branch=Branch::find($id);
        if(is_null($branch)){
            return response()->json(['message'=> 'not found'],404);
        }
        // return response()->json($lead::find($id),200);
        return view('banks_and_products.branch.edit_branch', ['branch' => $branch,'data' => $data,'adminData' => $adminData]);
    }

    // public function update_bank(Request $request,$id){
    //     $bank=bank::find($id);
    //     if(is_null($bank)){
    //         return response()->json(['message'=> 'not found'],404);
    //     }
    //     $bank->update($request->all());
        
    //     return redirect()->route('all.banks')->withSuccess("Data Updated Successfully");
    // }

    public function update_branch(Request $request, $id){
        $branch = Branch::find($id);

        if(is_null($branch)){
            return response()->json(['message' => 'Branch not found'], 404);
        }
        $branch->branch_name = $request->input('branch_name');
        $branch->save();
       
        return redirect()->route('all.banks')->withSuccess("Data Updated Successfully");
    }

    public function delete_branch(Request $request,$id){
        $branch=Branch::find($id);
        if(is_null($branch)){
            return response()->json(['message'=> 'not found'],404);
        }

        $branch->delete();
        // return response()->json(null,204);
        return redirect()->route('all.branch')->withSuccess("Data Deleted Successfully");
    }
}
