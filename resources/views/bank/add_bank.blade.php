@extends('admin.admin_dashboard')

@section('admin')
<div class="col-lg-12">
<div class="iq-card">
   <div class="iq-card-header d-flex justify-content-between">
      <div class="iq-header-title">
         <h4 class="card-title">Bank Form</h4>
      </div>
   </div>
   <div class="iq-card-body">
      <div class="new-user-info">
         <form id="addbankForm" method="POST" action="{{ route('add.banks') }}">
         @csrf

            <div class="row">
               <div class="form-group col-md-6">
                  <label for="name">Full Name:</label>
                  <input type="text" class="form-control" id="name" placeholder="Full Name" name="name" autocomplete="off">
               </div>
               <div class="form-group col-md-6">
                  <label for="logo">Logo:</label>
                  <input type="file" class="form-control" id="logo" placeholder="logo" name="logo" autocomplete="off">

               </div>
               <div class="form-group col-md-6">
                  <label for="desc">Description:</label>
                  <!-- <input type="text" class="form-control" id="desc" placeholder="Description" name="description" autocomplete="off"> -->
                  <textarea class="form-control" id="desc" name="description" rows="4" cols="50"></textarea>
               </div>
               
               
            </div>

            <button type="submit"  class="btn btn-primary">Add New Bank</button>
         </form>
      </div>
   </div>
</div>
</div>
</div>


@endsection

