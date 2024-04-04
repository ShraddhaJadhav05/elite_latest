<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\bank_product;
use App\Models\bank;
use Illuminate\Support\Facades\Auth;
use App\Models\Branch;

use App\Models\User;


class bank_productController extends Controller
{
 

    public function all_banks_products(Request $request){
        $profileid = Auth::user()->id;
        $adminData = User::find($profileid);
        $data['pageTitle']='banks';
        $searchQuery = $request->input('search');
        $bank_product = bank_product::when($searchQuery, function ($query) use ($searchQuery) {
        $query->where('name', 'like', '%' . $searchQuery . '%')
              ->orWhere('plan', 'like', '%' . $searchQuery . '%')
              ->orWhere('interest_rate', 'like', '%' . $searchQuery . '%')
              ->orWhere('available_date', 'like', '%' . $searchQuery . '%');
        })->with('bank', 'branch')->paginate(10);


        return view('banks_and_products.bank_product.all_bank_product', compact('bank_product','data','adminData'));
    }

    public function show_banks_products(){
        $profileid = Auth::user()->id;
        $adminData = User::find($profileid);
        $data['pageTitle']='banks';
        $bank=bank::all();
        $branch=Branch::all();
        return view('banks_and_products.bank_product.add_bank_product', compact('branch','bank','data','adminData'));
    }

    public function add_banks_products(Request $request){
        $request->validate([
            'name' => 'required',
            // 'bank_id'=>'required',
            // 'branch_id'=>'required',
            // 'plan'=>'required',
           
        ]);
        $bank_product = bank_product::create($request->all());
        
        return redirect()->route('all.banks.products')->withSuccess("Data Inserted Successfully");
    }

    public function view_bank_product($id){
        $profileid = Auth::user()->id;
        $adminData = User::find($profileid);
        $data['pageTitle']='banks';
        $bank_product=bank_product::find($id);
        $bank=bank::all();
        $branch=Branch::all();
        if(is_null($bank_product)){
            return response()->json(['message'=> 'not found'],404);
        }
        // return response()->json($lead::find($id),200);
        return view('banks_and_products.bank_product.view_bank_products', ['bank_product' => $bank_product,'bank'=>$bank,'data' => $data,'adminData' => $adminData,'branch'=>$branch]);
    }

    public function edit_bank_products($id){
        $profileid = Auth::user()->id;
        $adminData = User::find($profileid);
        $data['pageTitle']='banks';
        $bank_product=bank_product::find($id);
        $bank=bank::all();

        $branch=Branch::all();
        if(is_null($bank_product)){
            return response()->json(['message'=> 'not found'],404);
        }
        // return response()->json($lead::find($id),200);
        return view('banks_and_products.bank_product.edit_bank_product', ['bank_product' => $bank_product,'bank'=>$bank,'data' => $data,'adminData' => $adminData,'branch'=>$branch]);
    }

    public function update_bank_products(Request $request,$id){
        $bank_product=bank_product::find($id);
        if(is_null($bank_product)){
            return response()->json(['message'=> 'not found'],404);
        }
        $bank_product->update($request->all());
        // return response($lead,200);
        return redirect()->route('all.banks.products')->withSuccess("Data Updated Successfully");
    }

    public function delete_bank_products(Request $request,$id){

      
        $bank_product=bank_product::find($id);
        if(is_null($bank_product)){
            return response()->json(['message'=> 'not found'],404);
        }

        $bank_product->delete();
        // return response()->json(null,204);
        return redirect()->route('all.banks.products')->withSuccess("Data Deleted Successfully");
    }
}
