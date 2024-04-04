@extends('admin.admin_dashboard')

@section('admin')
<div class="col-lg-12">
<div class="iq-card">
   <div class="iq-card-header d-flex justify-content-between">
      <div class="iq-header-title">
         <!-- <h4 class="card-title">Mortgage Process</h4> -->
      </div>
   </div>
   <div class="iq-card-body">
      <div class="new-user-info">
         <form>
         @csrf
            <div class="row">
               <div class="form-group col-md-6">
                  <label for="name">Product Name:</label>
                  <p class="form-control-static" id="name">{{$bank_product->name }}</p>
               </div>

           
               <div class="form-group col-md-6">
                  <label for="name">Bank Name</label>
                  <p class="form-control-static" id="bname">
                     {{$bank_product->bank->name}}
                  </p>
               </div>


               <div class="form-group col-md-6">
                  <label for="branchname">Branch Name</label>
                  <select class="form-control" name="branch_id" style="display: none;"> <!-- Hide the select element -->
                      <option value="" selected> Please select one…</option>
                      @foreach($branch as $value)
                          <option value="{{$value->id}}"{{ $value->id == $bank_product->branch_id ? 'selected' : '' }}>{{$value->branch_name}}</option>
                      @endforeach
                  </select>
                  <p id="selectedBranchName">{{ $branch->firstWhere('id', $bank_product->branch_id)->branch_name ?? 'N/A' }}</p>
              </div>

         

               
               <div class="form-group col-md-6">
                  <label for="Plan">Product Plan:</label>
                  <p class="form-control-static" id="Plan">{{$bank_product->plan}}</p>
               </div>
               <div class="form-group col-md-6">
                  <label for="Interest_Rate">Interest Rate:</label>
                  <p class="form-control-static" id="Interest_Rate">{{$bank_product->interest_rate}}</p>
               </div>
               <div class="form-group col-md-6">
                  <label for="Interest_Rate">Monthly Installment:</label>
                  <p class="form-control-static" id="monthly_installment">{{$bank_product->monthly_installment}}</p>
               </div>

               <div class="form-group col-md-6">
                  <label for="available_date">Processing Fee:</label>
        
                     <p class="form-control-static" id="Available_Date">{{$bank_product->processing_fee}}</p>
               </div>


               <div class="form-group col-md-6">
                  <label for="available_date">Tenure:</label>
                  <p class="form-control-static" id="Available_Date">{{$bank_product->tenure}}</p>
                  
               </div>
               <div class="form-group col-md-6">
                  <label for="Available_Date">Available Date:</label>
                  <p class="form-control-static" id="Available_Date">{{$bank_product->available_date}}</p>
               </div>
               
               
            </div>
            
            <button type="button" class="btn btn-primary" onclick="return goBack()">Go Back</button>
            <a class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit" href="{{route('edit.bank.products',$bank_product->id)}}">Edit Bank Product</a>         
         </form>
         
      </div>
   </div>
</div>
</div>
</div>


@endsection
<script>
   function goBack() {
       // Go back one page in the browser's history
       window.history.go(-1);
   }
</script>
