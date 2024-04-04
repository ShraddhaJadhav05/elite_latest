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
         <form id="updatePermissionForm" method="POST" action="{{ route('update.permission', ['id' => $permission->id]) }}">
         @csrf
         @method('PUT')
            
               <div class="form-group col-md-6">
                  <label for="pname">Permission Name:</label>
                  <input type="text" class="form-control" id="pname" placeholder="Permission Name" name="name" value="{{$permission->name}}" autocomplete="off">
               </div>
               
               <div class="form-group col-md-6">
                  <label for="group_name">Group Name:</label>
                  <select class="form-control" name="group_name">
                     <option value="" {{ $permission->group_name == '' ? 'selected' : '' }}>Please select one…</option>
                   
                     <option value="admin" {{ $permission->group_name == 'admin' ? 'selected' : '' }}>Admin</option>
                     <option value="loans" {{ $permission->group_name == 'loans' ? 'selected' : '' }}>Loans</option>
                     <option value="leads" {{ $permission->group_name == 'leads' ? 'selected' : '' }}>Leads</option>
                     <option value="client" {{ $permission->group_name == 'client' ? 'selected' : '' }}>Client</option>
                     <option value="brokers" {{ $permission->group_name == 'brokers' ? 'selected' : '' }}>Brokers</option>
                     <option value="banks"  {{ $permission->group_name == 'banks' ? 'selected' : '' }}>Banks</option>
                     <option value="staffusers"{{ $permission->group_name == 'staffusers' ? 'selected' : '' }}>Staff Users</option>
                     <option value="appointments" {{ $permission->group_name == 'appointments' ? 'selected' : '' }}>Appointments</option>
                     <option value="notifications" {{ $permission->group_name == 'notifications' ? 'selected' : '' }}>Notifications</option>
                     <option value="enquires" {{ $permission->group_name == 'enquires' ? 'selected' : '' }}>Enquires</option>
                     <option value="CMS" {{ $permission->group_name == 'CMS' ? 'selected' : '' }}>CMS</option>
                     <option value="services" {{ $permission->group_name == 'services' ? 'selected' : '' }}>Services</option>
                     <option value="fAQs" {{ $permission->group_name == 'fAQs' ? 'selected' : '' }}>FAQs</option>
                     <option value="enquires" {{ $permission->group_name == 'enquires' ? 'selected' : '' }}>Enquires</option>

                  </select>
               </div>
               <button type="button" class="btn btn-primary" onclick="history.back()">Go Back</button>
            <button type="submit"  class="btn btn-primary">Update Permission</button>
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
                window.location.href = '{{ route("all.permissions") }}';
            })
            .catch(function(error) {
                // Handle errors here
                console.error(error);
            });
    });
</script>

@endsection


