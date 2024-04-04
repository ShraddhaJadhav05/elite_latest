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
                  <label for="name">Full Name:</label>
                  <p class="form-control-static" id="name">{{$bank_product->name }}</p>
               </div>

               <div class="form-group col-md-6">
                  <label for="name">Bank Name:</label>
                  <p class="form-control-static" id="bname">
                     @foreach($bank as $banks)
                        {{$banks->name }}
                     @endforeach
                  </p>
               </div>
               
               <div class="form-group col-md-6">
                  <label for="Plan">Plan:</label>
                  <p class="form-control-static" id="Plan">{{$bank_product->plan}}</p>
               </div>
               <div class="form-group col-md-6">
                  <label for="Interest_Rate">Interest Rate:</label>
                  <p class="form-control-static" id="Interest_Rate">{{$bank_product->interest_rate}}</p>
               </div>
               <div class="form-group col-md-6">
                  <label for="Available_Date">Available Date:</label>
                  <p class="form-control-static" id="Available_Date">{{$bank_product->available_date}}</p>
               </div>
               
               
            </div>
            
            <a class="iq-bg-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit" href="{{route('edit.bank.products',$bank_product->id)}}">Edit</a>         
         </form>
         
      </div>
   </div>
</div>
</div>
</div>


@endsection

