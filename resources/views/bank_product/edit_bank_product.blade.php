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
         <form id="updateLeadForm" method="POST" action="{{ route('update.bank.products', ['id' => $bank_product->id]) }}">
         @csrf
         @method('PUT')
            <div class="row">
               <div class="form-group col-md-6">
                  <label for="name">Full Name:</label>
                  <input type="text" class="form-control" id="name" placeholder="Full Name" name="name" value="{{$bank_product->name}}" autocomplete="off">
               </div>
               <!-- <div class="form-group col-md-6">
                  <label for="name">Bank Name:</label>
                 
               </div> -->
               <div class="form-group col-md-6">
                  <label for="Plan">Plan:</label>
                  <input type="text" class="form-control" id="Plan" placeholder="Logo" name="plan" value="{{$bank_product->plan}}" autocomplete="off"><br>
                    
               </div>
               <div class="form-group col-md-6">
                  <label for="Interest_Rate">Interest Rate:</label>
                  <input type="text" class="form-control" id="Interest_Rate" placeholder="Interest_Rate" name="interest_rate" value="{{$bank_product->interest_rate}}" autocomplete="off">
                    
               </div>
               <div class="form-group col-md-6">
                  <label for="Available_Date">Available Date:</label>
                  <input type="text" class="form-control" id="Available_Date" placeholder="Available_Date" name="available_date" value="{{$bank_product->available_date}}" autocomplete="off"><br>
                    
               </div>
               
               
            </div>
            
            <button type="submit"  class="btn btn-primary">Update</button>
         </form>
         
      </div>
   </div>
</div>
</div>
</div>


@endsection

