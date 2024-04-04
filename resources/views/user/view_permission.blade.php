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
         <form id="updatePermissionForm" >
         @csrf
               <div class="form-group col-md-6">
                  <label for="pname">Permission Name:</label>
         
                  <p class="form-control-static" id="name" name="name">{{$permission->name}}</p>
               </div>
               
               <div class="form-group col-md-6">
                  <label for="group_name">Group Name:</label>
              
                    <p class="form-control-static" id="group_name" name="group_name">{{$permission->group_name}}</p>
           
               </div>
               <button type="button" class="btn btn-primary" onclick="history.back()">Go Back</button>

            <a  class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit" href="{{ route('edit.permission',$permission->id) }}">Edit Permission</a>


         </form>
      </div>
   </div>
</div>
</div>
</div>

<script>
    function goBack() {
       // Go back one page in the browser's history
       window.history.go(-1);
    }
 </script>
@endsection


