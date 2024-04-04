<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\bank;
use App\Models\Branch;
use App\Models\User;
use App\Models\bank_product;
use App\Models\Mortgageplan;
use App\Models\Bankbranch;

class MortgageplanController extends Controller
{
    
    public function all_mortgageplans(Request $request)
    {
        $profileid = Auth::user()->id;
        $adminData = User::find($profileid);
        $data['pageTitle']='Mortgageloans';
        $searchQuery = $request->input('search');
        $mortgagePlan = Mortgageplan::with('bank', 'branch', 'product')
    ->when($searchQuery, function ($query) use ($searchQuery) {
        $query->where('name', 'like', '%' . $searchQuery . '%');
    })
    ->paginate(50);
        return view('mortgageplans.list_mortgageplans', compact('data','adminData','mortgagePlan'));
    }

    public function show_mortgageplans(){
        $profileid = Auth::user()->id;
        $adminData = User::find($profileid);
        $data['pageTitle']='Mortgageloans';

        $bank = Bank::all();
        $branch=Branch::all();

        $bankProduct=bank_product::all();


        return view('mortgageplans.add_mortgageplans',compact('data','adminData','bank','branch','bankProduct'));
    }


    public function add_mortgageplans(Request $request){


        $Mortgageplan = Mortgageplan::create($request->all());

        $latestId = $Mortgageplan->id;

    $formattedId = 'EL' . str_pad($latestId, 5, '0', STR_PAD_LEFT);

  
    $Mortgageplan->update(['mortgage_plan_id' => $formattedId]);



        return redirect()->route('all.mortgageplans')->withSuccess("Data Inserted Successfully");
    }


    public function edit_mortgageplans($id){
        $profileid = Auth::user()->id;
        $adminData = User::find($profileid);
        $data['pageTitle']='Mortgageloans';
         $mortgagePlan = Mortgageplan::with('bank', 'branch', 'product')->where('id', $id)->first();
        if(is_null($mortgagePlan)){
            return response()->json(['message'=> 'not found'],404);
        }

        $bank = Bank::all();

        $branch = Bankbranch::with('bank', 'branch')->where('bank_id', $mortgagePlan->bank_id)->get(); 
        //dd($branch);
        
        
        //$bankProduct=bank_product::all();
        $bankProduct = bank_product::where('branch_id', $mortgagePlan->branch_id)->get();


        return view('mortgageplans.edit_mortgageplans', compact('data','mortgagePlan','bank','branch','bankProduct'));
    }

    public function update_mortgageplans(Request $request){
        
        $id = $request->input('mortgageplan_id');
        
        $Mortgageplan = Mortgageplan::find($id);

        if(is_null($Mortgageplan)){
            return response()->json(['message' => 'Bank not found'], 404);
        }
        //$Mortgageplan = $request->all();

        // Update the bank record
        $Mortgageplan->update($request->all());

        return redirect()->route('all.mortgageplans')->withSuccess("Data Updated Successfully");
    }

    public function getBranchwiseProduct($branch_id){
        $branchProducts = bank_product::where('branch_id', $branch_id)->get();
            if(is_null($branchProducts)){
            return response()->json(['message'=> 'not found'],404);
            }else{
                return response()->json($branchProducts);
            }
        
        }

    public function view_mortgageplans($id){
        
        $mortgagePlan = Mortgageplan::with('bank', 'branch', 'product')->where('id', $id)->first(); 

        return view('mortgageplans.view_mortgageplans',compact('mortgagePlan'));

    }

    public function getProductDetails($product_id){
        $product_details = bank_product::where('id', $product_id)->get();
       // dd($product_details);

            if(is_null($product_details)){
            return response()->json(['message'=> 'not found'],404);
            }else{
                return response()->json($product_details);
            }
        
        }
    public function delete_mortgageplans(Request $request,$id){
        //dd($id);
        $plan_id=Mortgageplan::find($id);
        if(is_null($plan_id)){
            return response()->json(['message'=> 'not found'],404);
        }

        $plan_id->delete();
        // return response()->json(null,204);
        return redirect()->route('all.mortgageplans')->withSuccess("Data Deleted Successfully");
    }
        

}
