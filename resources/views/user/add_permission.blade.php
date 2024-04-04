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
                     <option value="leads">Loans</option>
                     <option value="leads">Leads</option>
                     <option value="leads">Client</option>
                     <option value="leads">Brokers</option>
                     <option value="leads">Banks</option>
                     <option value="leads">Staff Users</option>
                     <option value="leads">Appointments</option>
                     <option value="leads">Notifications</option>
                     <option value="leads">Enquires</option>
                     <option value="leads">CMS</option>
                     <option value="leads">Services</option>
                     <option value="leads">FAQs</option>
                     <option value="leads">Enquires</option>
                     <option value="leads">Admin</option>
                  </select>
               </div>
               <button type="button" class="btn btn-primary" onclick="history.back()">Go Back</button>
            <button type="submit"  class="btn btn-primary">Add New Permission</button>
         </form>
      </div>
   </div>
</div>
</div>
</div>
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
                window.location.href = '{{ route("all.permissions") }}';
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


