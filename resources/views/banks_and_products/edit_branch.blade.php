@extends('admin.admin_dashboard')

@section('admin')
<div class="container-fluid">
         <div class="row">
            <div class="col-lg-2">

            </div>
            <div class="col-lg-8">
                  <div class="iq-card">
                     <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                           <h4 class="card-title">Update Branch</h4>
                        </div>
                     </div>
                     <div class="iq-card-body">
                        <div class="new-user-info">
                           <form id="updatebranchForm" method="POST" action="{{ route('update.branch', ['id' => $branch->id]) }} "enctype="multipart/form-data">
                           @csrf
                           @method('PUT')
                              <div class="row">
                                 <div class="form-group col-md-6">
                                    <label for="name">Branch Name</label>
                                    <input type="text" class="form-control" id="branch_name" placeholder="Branch Name" name="branch_name" value="{{$branch->branch_name}}" autocomplete="off">
                                 </div>
                                 


                              </div>
                              <button class="btn btn-primary" onclick="return goBack()">Go Back</button>
                              <button type="submit" class="btn btn-primary">Update Branch</button>
                           </form>
                        </div>
                     </div>
                  </div>
            </div>
            <div class="col-lg-2">

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
    document.getElementById('updatebranchForm').addEventListener('submit', function(event) {
        event.preventDefault(); // Prevent the form from submitting normally
        
        // Get the form action URL which includes the lead id
        var formAction = this.getAttribute('action');
        
        // Submit the form via AJAX
        axios.post(formAction, new FormData(this))
            .then(function(response) {
                // If successful, show a pop-up message
                alert('Data Updated Successfully');
                // Optionally, you can redirect the user to another page after successful submission
                window.location.href = '{{ route("all.branch") }}';
            })
            .catch(function(error) {
                // Handle errors here
                console.error(error);
            });
    });
</script>

@endsection

