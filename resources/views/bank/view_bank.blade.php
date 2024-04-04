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
                  <p class="form-control-static" id="name">{{ $bank->name }}</p>
               </div>
               <div class="form-group col-md-6">
                  <label for="logo">Logo:</label>
                  <p class="form-control-static" id="logo">{{$bank->logo}}</p>
               </div>
               <div class="form-group col-md-6">
                  <label for="description">Description:</label>
                  <p class="form-control-static" id="description">{{$bank->description}}</p>
               </div>
               
               
            </div>
            
            <a class="iq-bg-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit" href="{{route('edit.bank',$bank->id)}}">Edit</a>         
         </form>
         
      </div>
   </div>
</div>
</div>
</div>


@endsection

