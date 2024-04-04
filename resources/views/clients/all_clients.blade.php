@extends('admin.admin_dashboard')

@section('admin')

      <div class="container-fluid">
         <div class="row">
            <div class="col-sm-12">
                  <div class="iq-card">
                     <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                           <h4 class="card-title">Clients</h4>
                        </div>
                     </div>
                     <div class="iq-card-body">
                        <div class="table-responsive">
                           <div class="row justify-content-between">
                              <div class="col-sm-12 col-md-2">
                                 <div id="user_list_datatable_info" class="dataTables_filter">
                                    {{-- <form id="searchForm" action="{{ route('all.clients') }}" method="GET">
                                        <div class="form-group mb-0">
                                            <input type="search" class="form-control" name="search" value="{{ request('search') }}" placeholder="Search" aria-controls="user-list-table" id="searchInput">
                                        </div>
                                    </form> --}}
                                 </div>
                              </div>
                              <div class="col-sm-12 col-md-6">
                                 <div class="user-list-files d-flex float-right">
                                    <a class="btn btn-primary" href="{{route('show.show_client')}}">
                                       Add New Client
                                     </a>
                                   </div>
                              </div>
                           </div>
                           <table id="user-list-table" class="table table-striped table-borderless mt-4" role="grid" aria-describedby="user-list-page-info">
                             <thead>
                                 <tr>
                                    <th>Sr No.</th>
                                    <th>Full Name</th>
                                    <th>Contact Number</th>
                                    <th>Email ID</th>
                                    <th>Loan Amount</th>
                                    <th>Monthly Salary Drawn</th>
                                    <th>Assigned Staff</th>
                                    <th>Action</th>
                                 </tr>
                             </thead>
                             <?php $i=1; ?>
                             <tbody>
                                
                             @foreach($clients as $client)
                                 <tr>
                                    <td>{{$i++}}</td>
                                    <td>{{$client->first_name}}</td>
                                    <td>{{$client->phone_number}}</td>
                                    <td>{{$client->email}}</td>
                                    <td>{{$client->loan_amount_offered}}</td>
                                    <td>{{$client->annual_gross_income}}</td>
                                    <td>{{$client->staff->first_name ?? ''}}</td>  
                                    <td>
                                       <div class="flex align-items-center list-user-action">
                                          <a class="iq-bg-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="view" href="{{route('view.client',$client->id)}}"><i class="ri-eye-line"></i></a>
                                          <a class="iq-bg-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit" href="{{route('edit.client',$client->id)}}"><i class="ri-pencil-line"></i></a>
                                          <a class="iq-bg-primary delete-btn" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete" href="{{route('delete.client',$client->id)}}"><i class="ri-delete-bin-line"></i></a>
                                          <a class="iq-bg-primary" data-toggle="tooltip" id="assignleadbtn" data-placement="top" data-lead-id="{{$client->id}}" title="" data-original-title="Assign" href="#"><i class="ri-group-fill"></i></a>

                                          <!-- <a class="iq-bg-primary notification-icon" data-toggle="tooltip" data-placement="top" title="" data-id="{{ $client->id }}" data-original-title="Notification" href=""><i class="ri-notification-line"></i></a> -->
                                       </div>
                                    </td>
                                 </tr>
                                @endforeach
                             </tbody>
                           </table>
                        </div>

                        <!-- Modal -->
                        <div class="modal fade" id="notificationModal" tabindex="-1" aria-labelledby="notificationModalLabel" aria-hidden="true">
                           <div class="modal-dialog">
                              <div class="modal-content">
                                    <div class="modal-header">
                                       <h5 class="modal-title" id="notificationModalLabel">Notification</h5>
                                       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                       </button>
                                    </div>
                                    <form action="{{ route('add.client.notification')}}" method="POST"> <!-- Adjust route accordingly -->
                                       @csrf
                                       <div class="modal-body">
                                       
                                          <input type="hidden" id="clientIdInput" name="client_id">
                                    
                                          <div class="form-group">
                                                <label for="notificationInput">Notification Message:</label>
                                                <input type="text" class="form-control" id="notificationInput" name="client_notification" autocomplete="off">
                                          </div>
                                       </div>
                                       <div class="modal-footer">
                                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                          <button type="submit" class="btn btn-primary">Save</button>
                                       </div>
                                    </form>
                              </div>
                           </div>
                        </div>

                        <div class="modal fade" id="assignLeadModal" tabindex="-1" role="dialog" aria-labelledby="assignLeadModalLabel" aria-hidden="true">
                           <div class="modal-dialog" role="document">
                               <div class="modal-content">
                               <div class="modal-header">
                                   <h5 class="modal-title" id="assignLeadModalLabel">Confirmation</h5>
                                   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                   <span aria-hidden="true">&times;</span>
                                   </button>
                               </div>
                               <div class="modal-body">

                                   <form method="POST" action="{{ route('assignClient.staff') }}">
                                   @csrf
                                       <div class="form-group">
                                           <label for="staff_id">Staff Name:</label>
                                           <select class="form-control" name="staff_id" required>
                                               <option selected disabled>Please select one…</option>
                                               @foreach($staff as $staffs)
                                               <option value="{{ $staffs->id }}">{{ $staffs->first_name }} {{ $staffs->last_name }}</option>
                                               @endforeach
                                           </select>
                                       </div>

                                       <input type="hidden" name="client_id" id="clientId">
                                       <button type="submit" class="btn btn-primary">Assign</button>
                                   </form>

                               </div>
                               <div class="modal-footer">
                                   <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                               </div>
                               </div>
                           </div>
                       </div>
                       
                        <div class="row justify-content-between mt-3">
                            <div id="user-list-page-info" class="col-md-12" >
                                <div style="float:right;">

                                </div>
                            </div>
                        </div>
                     </div>
                  </div>
            </div>
         </div>
      </div>



<script>
   document.getElementById('searchInput').addEventListener('input', function () {
      document.getElementById('searchForm').submit();
   });
</script>

<script>
    // Wait for the document to be fully loaded
    document.addEventListener("DOMContentLoaded", function() {
        // Get all notification icons
        const notificationIcons = document.querySelectorAll('.notification-icon');

        // Add click event listener to each notification icon
        notificationIcons.forEach(function(notificationIcon) {
            notificationIcon.addEventListener('click', function(event) {
                // Prevent default link behavior
                event.preventDefault();

                // Get the broker ID from the data-id attribute
                const clientId = this.getAttribute('data-id');
                console.log(clientId);

                // Set the value of the hidden input field to the broker ID
                document.getElementById('clientIdInput').value = clientId;

                // Trigger the modal opening
                $('#notificationModal').modal('show');
            });
        });
    });
</script>
<script>
   document.addEventListener('DOMContentLoaded', function() {
   // Get all elements with the class "assignLeadBtn"
   var assignLeadBtns = document.querySelectorAll('#assignleadbtn');

   // Add click event listener to each "Assign" button
   assignLeadBtns.forEach(function(btn) {
       btn.addEventListener('click', function(event) {
           event.preventDefault(); // Prevent the default link behavior

           // Get the lead ID associated with the clicked button
           var clientId = btn.getAttribute('data-lead-id');

           // Set the lead ID in the modal input field
           document.getElementById('clientId').value = clientId;

           // Show the modal
           $('#assignLeadModal').modal('show');
       });
   });

   document.querySelector('#assignLeadModal .modal-header .close').addEventListener('click', function() {
       $('#assignLeadModal').modal('hide'); // Close the modal
   });

   document.querySelector('#assignLeadModal .modal-footer .btn-secondary').addEventListener('click', function() {
       $('#assignLeadModal').modal('hide'); // Close the modal
   });

   // Handle form submission
   document.querySelector('#assignLeadModal form').addEventListener('submit', function(event) {
       event.preventDefault(); // Prevent the default form submission

       // Submit the form via AJAX
       var formData = new FormData(this);

       fetch(this.action, {
           method: 'POST',
           body: formData
       })
       .then(response => {
           if (response.ok) {
               // If successful, close the modal and show success message
               $('#assignLeadModal').modal('hide');
               alert('Client assigned successfully.');
               window.location.href = '{{ route("all.clients") }}'
           } else {
               // If there's an error, handle it
               response.json().then(data => {
                   alert(data.error); // Show error message
               });
           }
       })
           .catch(error => {
           console.error('Error:', error);
       });
   });
});

</script>
@endsection
