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
         <form id="addPermissionForm" method="POST" action="{{ route('role.permission.store') }}">
         @csrf

            
               <div class="form-group col-md-6">
                  <label for="pname">Roles Name:</label>
                  <select class="form-control" name="role_id">
                     <option selected=""> Please select one…</option>
                     @foreach($roles as $role)
                     <option value="{{$role->id}}">{{$role->name}}</option>
                     @endforeach

                  </select>
               </div>


               <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="" id="flexCheckDefaultAll">
                  <label class="form-check-label" for="flexCheckDefaultAll">Permission All</label>
              </div>
          

               <hr>
               

               @foreach($permission_groups as $group)
               <div class="row">
                    <div class="col-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">{{$group->group_name}}</label>
                        </div>

                    </div>    

                    <div class="col-9">
    @php
    $permissions = App\Models\User::getpermissionByGroupName($group->group_name);
    @endphp

    @foreach($permissions as $permission)
    <div class="form-check">
        <input class="form-check-input" name="permission[]" type="checkbox" value="{{$permission->id}}" id="flexCheckDefault{{$permission->id}}">
        <label class="form-check-label" for="flexCheckDefault{{$permission->id}}">{{ $permission->name }}</label>
    </div>
    @endforeach
    <br>
</div>
               </div>
               @endforeach
            <button type="button" class="btn btn-primary" onclick="history.back()">Go Back</button>
            <button type="submit"  class="btn btn-primary">Add Permissions</button>
         </form>
      </div>
   </div>
</div>
</div>
</div>



<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#flexCheckDefaultAll').click(function() {
            if ($(this).is(':checked')) {
                $('input[type="checkbox"]').prop('checked', true);
            } else {
                $('input[type="checkbox"]').prop('checked', false);
            }
        });
    });
</script>

<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

<script>
    document.getElementById('addPermissionForm').addEventListener('submit', function(event) {
        event.preventDefault(); // Prevent the form from submitting normally
        
        // Get the form action URL which includes the lead id
        var formAction = this.getAttribute('action');
        
        // Submit the form via AJAX
        axios.post(formAction, new FormData(this))
            .then(function(response) {
                // If successful, show a pop-up message
                alert('Data Added Successfully');
                // Optionally, you can redirect the user to another page after successful submission
                window.location.href = '{{ route("all.roles.permissions") }}';
            })
            .catch(function(error) {
                // Handle errors here
                console.error(error);
            });
    });
</script>

<script>
    function goBack() {
       // Go back one page in the browser's history
       window.history.go(-1);
    }
 </script>
@endsection

