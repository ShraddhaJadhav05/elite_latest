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
         <form id="updatePermissionForm" method="POST" action="{{ route('update.roles', ['id' => $role->id]) }}">
         @csrf
         @method('PUT')
            
               <div class="form-group col-md-6">
                  <label for="pname">Role Name:</label>
                  <input type="text" class="form-control" id="pname" placeholder="Role Name" name="name" value="{{$role->name}}" autocomplete="off">
               </div>
               
            
            <button type="submit"  class="btn btn-primary">Update</button>
         </form>
      </div>
   </div>
</div>
</div>
</div>


@endsection

