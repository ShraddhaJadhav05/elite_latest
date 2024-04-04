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
         <form id="addPermissionForm" method="POST" action="{{ route('update.roles.permissions',$role->id) }}">

         @csrf

            
               <div class="form-group col-md-6">
                  <label for="pname">Roles Name : {{ $role->name }}</label>
             
              
               </div>

               

               @foreach($permission_groups as $group)
               <div class="row"><!--  // Start row  -->
                   <div class="col-3">
   
                       @php
   $permissions = App\Models\User::getpermissionByGroupName($group->group_name);
   @endphp
   {{-- @dd($permissions); --}}
   {{-- @dd(App\Models\User::roleHasPermissions($role,$permissions)); --}}
   <div class="form-check">
                   <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" {{ App\Models\User::roleHasPermissions($role,$permissions) ? 'checked' : '' }}  disabled >
    <label class="form-check-label" for="flexCheckDefault">{{ $group->group_name }}</label>
               </div>
                   </div>

                    <div class="col-9">
 

                        @foreach($permissions as $permission)
                        <div class="form-check">
                      <input class="form-check-input" name="permission[]" {{ $role->hasPermissionTo($permission->name) ? 'checked' : '' }}  type="checkbox" value="{{$permission->id}}" id="flexCheckDefault{{$permission->id}}" disabled>
                                     <label class="form-check-label" for="flexCheckDefault{{$permission->id}}">{{ $permission->name }}</label>
                                 </div>
                             @endforeach	
    <br>
</div>
               </div>
               @endforeach
               <button type="button" class="btn btn-primary" onclick="history.back()">Go Back</button>
               <a class=" btn btn-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit" href="{{ route('edit.roles.permissions',$role->id) }}">Edit Permission</a>
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

{{-- <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

<script>
    document.getElementById('addPermissionForm').addEventListener('submit', function(event) {
        event.preventDefault(); // Prevent the form from submitting normally
        
        // Get the form action URL which includes the lead id
        var formAction = this.getAttribute('action');
        
        // Submit the form via AJAX
        axios.post(formAction, new FormData(this))
            .then(function(response) {
                // If successful, show a pop-up message
                alert('Data Updated Successfully');
                // Optionally, you can redirect the user to another page after successful submission
                window.location.href = '{{ route("all_roles_in_permission") }}';
            })
            .catch(function(error) {
                // Handle errors here
                console.error(error);
            });
    });
</script> --}}
@endsection

