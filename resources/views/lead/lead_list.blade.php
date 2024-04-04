@extends('admin.admin_dashboard')

@section('admin')

      <div class="container-fluid">
         <div class="row">
            <div class="col-sm-12">
                  <div class="iq-card">
                     <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                           <h4 class="card-title">Leads</h4>
                        </div>
                     </div>
                     <div class="iq-card-body">
                        <div class="table-responsive">
                           <div class="row justify-content-between">
                              <div class="col-sm-12 col-md-2">
                                 <div id="user_list_datatable_info" class="dataTables_filter">
                                    {{-- <form id="searchForm" action="{{ route('all.leads') }}" method="GET">
                                        <div class="form-group mb-0">
                                            <input type="search" class="form-control" name="search" value="{{ request('search') }}" placeholder="Search" aria-controls="user-list-table" id="searchInput">
                                        </div>
                                    </form> --}}
                                 </div>
                              </div>
                              <div class="col-sm-12 col-md-6">
                                 <div class="user-list-files d-flex float-right">
                                    <a class="btn btn-primary" href="{{route('show.leads')}}">
                                       Add New Lead
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
                                    <!-- <th>Last Name</th> -->
                                    <th>Email ID</th>
                                    <th>Lead Type</th>
                                    <!-- <th>Birth Date</th> -->
                                    <!-- <th>Gender	</th> -->
                                    <th>Loan Amount</th>
                                    <th>Monthly Salary Drawn</th>
<th>Assigned Staff</th>
                                    <th>Action</th>
                                    <th>Category</th>
                                 </tr>
                             </thead>
                             <?php $i=1; ?>
                             <tbody>
                             @foreach($lead as $leads)
                                 <tr>
                                   
                                    <td>{{$i++}}</td>
                                    <td>{{$leads->first_name}}</td>
                                    <!-- <td>{{$leads->last_name}}</td> -->
                                    <td>{{$leads->phone_number}}</td>
                                    <td>{{$leads->email}}</td>
                                    <td>{{$leads->lead_type}}</td>
                                    <!-- <td>{{$leads->birth_date}}</td> -->
                                    <!-- <td>{{$leads->gender}}</td> -->
                                    <td>{{$leads->loan_amount_offered}}</td>
                                    <td>{{$leads->annual_gross_income}}</td>
                                    <td>{{$leads->staff->first_name ?? ''}}</td>
                                    <td>
                                       <div class="flex align-items-center list-user-action">
                                          <a class="iq-bg-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="view" href="{{route('view.leads',$leads->id)}}"><i class="ri-eye-line"></i></a>
                                          <a class="iq-bg-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit" href="{{route('edit.leads',$leads->id)}}"><i class="ri-pencil-line"></i></a>
                                          <a class="iq-bg-primary delete-btn" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete" href="{{route('delete.leads',$leads->id)}}"><i class="ri-delete-bin-line"></i></a>
                                          <a class="iq-bg-primary" data-toggle="tooltip" id="assignleadbtn" data-placement="top" data-lead-id="{{$leads->id}}" title="" data-original-title="Assign" href="#"><i class="ri-group-fill"></i></a>
                                       </div>
                                    </td>
                                    <!-- <td>
                                         <div class="col-sm-12 col-md-6">
                                            <div class="user-list-files d-flex float-right">
                                                <a class="btn btn-primary make-client-button" data-lead-id="{{ $leads->id }}" style="margin-right: -43px;width: 114px; @if($leads->category_flag === 1) background-color: green; color: white; @endif" href="#">
                                                    Make Client
                                                </a>
                                                
                                            </div>
                                        </div>
                                    </td> -->

                                    <td>
                                        <div class="col-sm-12 col-md-6" style="@if($leads->staff_id === null) display: none; @endif" >
                                            <div class="user-list-files d-flex float-right">
                                                <!-- Original button to make client -->
                                                <a class="btn btn-primary make-client-button" data-email="{{ $leads->lead->email }}" data-first-name="{{ $leads->lead->first_name }}" data-lead-id="{{ $leads->id }}" style="margin-right: -43px;width: 114px;  @if($leads->category_flag === 1) display: none; @endif" href="#">
                                                    Make Client
                                                </a>

                                                <!-- New button for clients -->
                                                <a class="btn btn-primary client-button" data-lead-id="{{ $leads->id }}" style="margin-right: -43px;width: 114px; @if($leads->category_flag !== 1) display: none; @endif background-color: green; color: white;" href="#" disabled>
                                                    Client
                                                </a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach

                             </tbody>
                             
                           </table>
                           
                        </div>
                        
                        <!-- Modal -->
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

                                    <form method="POST" action="{{ route('assign.staff') }}">
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

                                        <!-- <div class="form-group col-md-6">
                                            <label for="lead_type">Priority</label>
                                            <div>
                                            <input type="checkbox" id="application_priority" name="application_priority" value="High Priority">
                                            <label for="high_priority">High Priority</label>
                                            </div>
                                        </div> -->
                                        <input type="hidden" name="lead_id" id="leadId">
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

                                {{ $lead->appends(['search' => request('search')])->links() }}
                                </div>
                            </div>
                        </div>

                         
                           
                     </div>
                  </div>
            </div>
         </div>
      </div>
      

<script>
    document.addEventListener('DOMContentLoaded', function() {
    // Get all elements with the class "assignLeadBtn"
    var assignLeadBtns = document.querySelectorAll('#assignleadbtn');

    // Add click event listener to each "Assign" button
    assignLeadBtns.forEach(function(btn) {
        btn.addEventListener('click', function(event) {
            event.preventDefault(); // Prevent the default link behavior

            // Get the lead ID associated with the clicked button
            var leadId = btn.getAttribute('data-lead-id');

            // Set the lead ID in the modal input field
            document.getElementById('leadId').value = leadId;

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
                alert('Staff assigned successfully.');
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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- <script>
    $(document).ready(function(){
        // Function to update switch label based on state
        function updateSwitchLabel(isChecked, $label) {
            if (isChecked) {
                $label.addClass('qualified').removeClass('disqualified').text('Qualified');
            } else {
                $label.addClass('disqualified').removeClass('qualified').text('Disqualified');
            }
        }

        // Initial loading of switch labels
        $('.switch-toggle').each(function() {
            var isChecked = $(this).prop('checked');
            var $label = $(this).siblings('label');
            updateSwitchLabel(isChecked, $label);
        });

        // Event handler for switch toggle
        $('.switch-toggle').on('click', function(){
            var isChecked = $(this).prop('checked');
            var $label = $(this).siblings('label');
            var leadId = $(this).data('lead-id');

            // Update label text
            updateSwitchLabel(isChecked, $label);

            // Send AJAX request to update category_flag
            $.ajax({
                url: '{{ route("update.category.flag") }}',
                type: 'POST',
                data: {
                    lead_id: leadId,
                    category_flag: isChecked ? 1 : 0,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    console.log('Category flag updated successfully');
                },
                error: function(xhr, status, error) {
                    console.error('Error updating category flag:', error);
                }
            });
        });
    });
</script> -->

<style>

    .qualified {
        color: green;
    }

    .disqualified {
        color: red;
    }

</style>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<!-- <script>
    document.querySelectorAll('.make-client-button').forEach(button => {
        button.addEventListener('click', function(event) {
            event.preventDefault(); // Prevent default link behavior
            
            // Show confirmation popup
            if (confirm('Are you sure you want to make this user a client?')) {
                var leadId = this.getAttribute('data-lead-id');

                // Send an AJAX request to get the current category flag value
                fetch("{{ route('admin.get.category.flag') }}", {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        lead_id: leadId
                    })
                })
                .then(response => response.json())
                .then(data => {
                    // Toggle the category flag value
                    var categoryFlag = data.category_flag === 1 ? 0 : 1;

                    // Send another AJAX request to update the category flag
                    fetch("{{ route('admin.update.category.flag') }}", {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify({
                            lead_id: leadId,
                            category_flag: categoryFlag
                        })
                    })
                    .then(response => response.json())
                    .then(data => {
                        // Handle success response if needed
                        console.log(data);

                        // Update button color based on the category flag
                        if (categoryFlag === 1) {
                            button.style.backgroundColor = 'green';
                            button.style.color = 'white';
                            button.disabled = true;

                            // Call the assign_lead_to_client route
                            fetch("{{ route('assign.lead.client') }}", {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                },
                                body: JSON.stringify({
                                    lead_id: leadId
                                })
                            })
                            .then(response => response.json())
                            .then(data => {
                                // Handle success response if needed
                                console.log(data);
                            })
                            .catch(error => {
                                // Handle error if needed
                                console.error('Error:', error);
                            });

                            // Show success message
                            Swal.fire({
                                icon: 'success',
                                title: 'Client Added Successfully!',
                                showConfirmButton: false,
                                timer: 1500
                            });
                        } else {
                            // Reset button color to default
                            button.style.backgroundColor = '';
                            button.style.color = '';

                            // Call the delete_lead_from_client route
                            fetch("{{ route('delete.lead.from.client') }}", {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                },
                                body: JSON.stringify({
                                    lead_id: leadId
                                })
                            })
                            .then(response => response.json())
                            .then(data => {
                                // Handle success response if needed
                                console.log(data);
                            })
                            .catch(error => {
                                // Handle error if needed
                                console.error('Error:', error);
                            });

                            // Show success message
                            Swal.fire({
                                icon: 'success',
                                title: 'Client Deleted Successfully!',
                                showConfirmButton: false,
                                timer: 1500
                            });
                        }
                    })
                    .catch(error => {
                        // Handle error if needed
                        console.error('Error:', error);
                    });
                })
                .catch(error => {
                    // Handle error if needed
                    console.error('Error:', error);
                });
            }
        });
    });
</script> -->

<script>
    document.querySelectorAll('.make-client-button').forEach(button => {
        button.addEventListener('click', function(event) {
            event.preventDefault(); // Prevent default link behavior

            // Show confirmation popup
            if (confirm('Are you sure you want to make this user a client?')) {
                var leadId = this.getAttribute('data-lead-id');

                // Send an AJAX request to get the current category flag value
                fetch("{{ route('admin.get.category.flag') }}", {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        lead_id: leadId
                    })
                })
                .then(response => response.json())
                .then(data => {
                    // Toggle the category flag value
                    var categoryFlag = data.category_flag === 1 ? 0 : 1;

                    // Send another AJAX request to update the category flag
                    fetch("{{ route('admin.update.category.flag') }}", {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify({
                            lead_id: leadId,
                            category_flag: categoryFlag
                        })
                    })
                    .then(response => response.json())
                    .then(data => {
                        // Handle success response if needed
                        console.log(data);

                        // Hide "Make Client" button
                        button.style.display = 'none';

                        // Show "Client" button
                        var clientButton = document.querySelector('.client-button[data-lead-id="' + leadId + '"]');
                        clientButton.style.display = 'block';

                        // Update "Client" button color and text based on the category flag
                        if (categoryFlag === 1) {
                            clientButton.style.backgroundColor = 'green';
                            clientButton.style.color = 'white';
                            clientButton.disabled = true;

                            // Call the assign_lead_to_client route
                            fetch("{{ route('assign.lead.client') }}", {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                },
                                body: JSON.stringify({
                                    lead_id: leadId
                                })
                            })
                            .then(response => response.json())
                            .then(data => {
                                // Handle success response if needed
                                console.log(data);
                            })
                            .catch(error => {
                                // Handle error if needed
                                console.error('Error:', error);
                            });

                            // Show success message
                            Swal.fire({
                                icon: 'success',
                                title: 'Client Added Successfully!',
                                showConfirmButton: false,
                                timer: 1500
                            });
                        } else {
                            // Reset "Client" button color and text to default
                            clientButton.style.backgroundColor = '';
                            clientButton.style.color = '';
                            clientButton.disabled = false;

                            // Call the delete_lead_from_client route
                            fetch("{{ route('delete.lead.from.client') }}", {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                },
                                body: JSON.stringify({
                                    lead_id: leadId
                                })
                            })
                            .then(response => response.json())
                            .then(data => {
                                // Handle success response if needed
                                console.log(data);
                            })
                            .catch(error => {
                                // Handle error if needed
                                console.error('Error:', error);
                            });

                            // Show success message
                            Swal.fire({
                                icon: 'success',
                                title: 'Client Deleted Successfully!',
                                showConfirmButton: false,
                                timer: 1500
                            });
                        }
                    })
                    .catch(error => {
                        // Handle error if needed
                        console.error('Error:', error);
                    });
                })
                .catch(error => {
                    // Handle error if needed
                    console.error('Error:', error);
                });
            }
        });
    });
</script>


<script>
    $(document).ready(function(){
        $('.make-client-button').click(function(event){
            event.preventDefault();
            var leadEmail = $(this).data('email');
            var firstName = $(this).data('first-name');

            // console.log(leadEmail);
            $.ajax({
                url:"{{route('leads.credentials')}}",
                type:"POST",
                data:{
                    _token: '{{ csrf_token() }}',
                    email: leadEmail,
                    first_name: firstName
                    
                },
                success: function(response){
                    // console.log("response");
                },
                error: function(xhr,status,error){
                    console.log(xhr.responseText);
                }
            });
        });
    });
</script>

<script>
    // Add a click event listener to the delete button
    document.querySelectorAll('.delete-btn').forEach(button => {
        button.addEventListener('click', function(event) {
            // Prevent the default action of following the link immediately
            event.preventDefault();

            // Show a confirmation box
            if (confirm('Are you sure you want to delete?')) {
                // If the user confirms, follow the link
                window.location.href = button.getAttribute('href');
            }
        });
    });
</script>

<script>
   document.getElementById('searchInput').addEventListener('input', function () {
      document.getElementById('searchForm').submit();
   });
</script>
@endsection
