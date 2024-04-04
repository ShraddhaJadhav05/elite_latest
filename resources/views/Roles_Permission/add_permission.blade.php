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
         <form id="addPermissionForm" method="POST" action="{{ route('add.permissions') }}">
         @csrf

            
               <div class="form-group col-md-6">
                  <label for="pname">Permission Name:</label>
                  <input type="text" class="form-control" id="pname" placeholder="Permission Name" name="name" autocomplete="off">
               </div>
               
               <div class="form-group col-md-6">
                  <label for="group_name">Group Name:</label>
                  <select class="form-control" name="group_name">
                     <option value="">Please select one…</option>
                     <option value="leads">Leads</option>
                  </select>
               </div>
            
            <button type="submit"  class="btn btn-primary">Add New Permission</button>
         </form>
      </div>
   </div>
</div>
</div>
</div>


@endsection

