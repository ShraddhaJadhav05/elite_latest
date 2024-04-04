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
               
               <button type="button" class="btn btn-primary" onclick="history.back()">Go Back</button>
            <button type="submit"  class="btn btn-primary">Update Role</button>
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

<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

<script>
    document.getElementById('updatePermissionForm').addEventListener('submit', function(event) {
        event.preventDefault(); // Prevent the form from submitting normally
        
        // Get the form action URL which includes the lead id
        var formAction = this.getAttribute('action');
        
        // Submit the form via AJAX
        axios.post(formAction, new FormData(this))
            .then(function(response) {
                // If successful, show a pop-up message
                alert('Data Updated Successfully');
                // Optionally, you can redirect the user to another page after successful submission
                window.location.href = '{{ route("roles.all") }}';
            })
            .catch(function(error) {
                // Handle errors here
                console.error(error);
            });
    });
</script>
@endsection

