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
         <form id="addPermissionForm" method="POST" action="{{ route('add.roles') }}">
         @csrf

            
               <div class="form-group col-md-6">
                  <label for="pname">Role Name:</label>
                  <input type="text" class="form-control" id="pname" placeholder="Role Name" name="name" autocomplete="off">
               </div>
               
               <button type="button" class="btn btn-primary" onclick="history.back()">Go Back</button>
            <button type="submit"  class="btn btn-primary">Add New Role</button>
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