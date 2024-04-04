@extends('admin.admin_dashboard')

@section('admin')
<div class="col-lg-12">
<div class="iq-card">
   <div class="iq-card-header d-flex justify-content-between">
      <div class="iq-header-title">
         <h4 class="card-title">Bank Product Form</h4>
      </div>
   </div>
   <div class="iq-card-body">
      <div class="new-user-info">
         <form id="addbankproductForm" method="POST" action="{{ route('add.banks.products') }}">
         @csrf

            <div class="row">
               <div class="form-group col-md-6">
                  <label for="name">Full Name:</label>
                  <input type="text" class="form-control" id="name" placeholder="Full Name" name="name" autocomplete="off">
               </div>
               

               <div class="form-group col-md-6">
                  <label for="bankname">Bank Name:</label>
                  <select class="form-control" name="bank_id">
                     <option selected=""> Please select one…</option>
                     @foreach($bank as $banks)
                     <option value="{{$banks->id}}">{{$banks->name}}</option>
                     @endforeach

                  </select>
               </div>
               <div class="form-group col-md-6">
                  <label for="plan">Plan:</label>
                  <input type="text" class="form-control" id="plan" placeholder="plan" name="plan" autocomplete="off">

               </div>
               <div class="form-group col-md-6">
                  <label for="interest_rate">Interest Rate:</label>
                  <input type="text" class="form-control" id="interest_rate" placeholder="Interest Rate" name="interest_rate" autocomplete="off">

               </div>

               <div class="form-group col-md-6">
                  <label for="available_date">Available Date:</label>
                  <input type="date" class="form-control" id="available_date" placeholder="Available Date" name="available_date" autocomplete="off">

               </div>
               
               
            </div>

            <button type="submit"  class="btn btn-primary">Add New Product</button>
         </form>
      </div>
   </div>
</div>
</div>
</div>


@endsection

