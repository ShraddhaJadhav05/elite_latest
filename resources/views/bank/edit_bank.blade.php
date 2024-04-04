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
         <form id="updateLeadForm" method="POST" action="{{ route('update.bank', ['id' => $bank->id]) }}">
         @csrf
         @method('PUT')
            <div class="row">
               <div class="form-group col-md-6">
                  <label for="name">Full Name:</label>
                  <input type="text" class="form-control" id="name" placeholder="Full Name" name="name" value="{{$bank->name}}" autocomplete="off">
               </div>
               <div class="form-group col-md-6">
                  <label for="logo">Logo:</label>
                  <input type="file" class="form-control" id="logo" placeholder="Logo" name="logo" value="{{$bank->logo}}" autocomplete="off"><br>
                  <p class="form-control-static" id="logo">{{$bank->logo}}</p>
                    
               </div>
               <div class="form-group col-md-6">
                  <label for="description">Description:</label>
                  <input type="text" class="form-control" id="description" placeholder="Description" name="description" value="{{$bank->description}}" autocomplete="off">
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

