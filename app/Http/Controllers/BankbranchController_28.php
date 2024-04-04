<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\bank;
use App\Models\Branch;
use App\Models\Bankbranch;
use Illuminate\Support\Facades\Auth;

use App\Models\User;


class BankbranchController extends Controller
{
    // public function all_banks(){
    //     $bank=bank::paginate(10);

    //     return view('banks_and_products.bank.all_bank', compact('bank'));
    // }
    
    public function all_bank_branch(Request $request)
    {
        $profileid = Auth::user()->id;
        $adminData = User::find($profileid);
        $data['pageTitle']='banksbranch';
        $searchQuery = $request->input('search');
        $bankBranches = Bankbranch::with(['bank', 'branch'])
    ->when($searchQuery, function ($query) use ($searchQuery) {
        $query->whereHas('bank', function ($subQuery) use ($searchQuery) {
            $subQuery->where('name', 'like', '%' . $searchQuery . '%');
        })
        ->orWhereHas('branch', function ($subQuery) use ($searchQuery) {
            $subQuery->where('branch_name', 'like', '%' . $searchQuery . '%');
        })
        ->orWhere('contact', 'like', '%' . $searchQuery . '%');
    })
    ->paginate(10);
        return view('banks_and_products.bank_branch.all_bank', compact('bankBranches','data','adminData'));
    }
        
    public function show_banks_branch(){
        $profileid = Auth::user()->id;
        $adminData = User::find($profileid);
        $data['pageTitle']='banksbranch';
        $bank = Bank::all();
        $branch=Branch::all();
        // dump($bank);
        return view('banks_and_products.bank_branch.add_bank',compact('bank','data','adminData','branch'));
    }

    // public function add_banks(Request $request){
    //     $request->merge(['country' => 'United Arab Emirates']);

          
    //       if($request->hasFile('logo')) {
    //         $file = $request->file('logo');
    //         $fileName = time().'_'.$file->getClientOriginalName();
    //         $filePath = $file->storeAs('public/assets/images/bank_logo', $fileName);
        
           
    //         $request->merge(['logo' => $filePath]);
            
    //     }

    //     $bank = bank::create($request->all());
        
    //     return redirect()->route('all.banks')->withSuccess("Data Inserted Successfully");
    // }

    public function add_banks_branch(Request $request){
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

        $bank = Bankbranch::create($bankData);

        return redirect()->route('all.banks_branch')->withSuccess("Data Inserted Successfully");
    }

    public function view_banks_branch ($id){
        $profileid = Auth::user()->id;
        $adminData = User::find($profileid);
        $data['pageTitle']='banksbranch';
        // $bank=Bankbranch::find($id);
        $bank = Bankbranch::leftJoin('banks as b', 'bankbranches.bank_id', '=', 'b.id')
         ->leftJoin('branches as br', 'bankbranches.branch_id', '=', 'br.id')
        ->select('bankbranches.*','b.name', 'br.branch_name')
        ->where('bankbranches.id', $id)
        ->first();
        // dd($bank);
        if(is_null($bank)){
            return response()->json(['message'=> 'not found'],404);
        }
        // return response()->json($lead::find($id),200);
        return view('banks_and_products.bank_branch.view_bank', ['bank' => $bank,'data' => $data,'adminData' => $adminData]);
    }

    public function edit_banks_branch ($id){
        $profileid = Auth::user()->id;
        $adminData = User::find($profileid);
        $data['pageTitle']='banksbranch';
        $bank=bank::all();
        $branch=Branch::all();
        $bankBranches=BankBranch::find($id);
        if(is_null($bankBranches)){
            return response()->json(['message'=> 'not found'],404);
        }
        // return response()->json($lead::find($id),200);
        return view('banks_and_products.bank_branch.edit_bank', ['bankBranches' => $bankBranches,'data' => $data,'adminData' => $adminData,'bank' => $bank,'branch' => $branch,]);
    }

    // public function update_bank(Request $request,$id){
    //     $bank=bank::find($id);
    //     if(is_null($bank)){
    //         return response()->json(['message'=> 'not found'],404);
    //     }
    //     $bank->update($request->all());
        
    //     return redirect()->route('all.banks')->withSuccess("Data Updated Successfully");
    // }

    public function update_banks_branch(Request $request, $id){
        $bank = Bankbranch::find($id);

        if(is_null($bank)){
            return response()->json(['message' => 'Bank not found'], 404);
        }
        $bankData = $request->all();

        // Update the bank record
        $bank->update($bankData);

        return redirect()->route('all.banks_branch')->withSuccess("Data Updated Successfully");
    }

    public function delete_banks_branch(Request $request,$id){
        $bank=Bankbranch::find($id);
        if(is_null($bank)){
            return response()->json(['message'=> 'not found'],404);
        }

        $bank->delete();
        // return response()->json(null,204);
        return redirect()->route('all.banks_branch')->withSuccess("Data Deleted Successfully");
    }


    public function all_branch(Request $request)
    {
        $profileid = Auth::user()->id;
        $adminData = User::find($profileid);
        $data['pageTitle']='branch';
        $searchQuery = $request->input('search');
        $branch = Branch::when($searchQuery, function ($query) use ($searchQuery) {
            $query->where('branch_name', 'like', '%' . $searchQuery . '%');
        })->paginate(10);
    
        return view('banks_and_products.branch.all_branch', compact('branch','data','adminData'));
    }
        
    public function show_branch(){
        $profileid = Auth::user()->id;
        $adminData = User::find($profileid);
        $data['pageTitle']='branch';
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
        $data['pageTitle']='branch';
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
