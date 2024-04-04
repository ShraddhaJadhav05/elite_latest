@extends('admin.admin_dashboard')

@section('admin')

      <div class="container-fluid">
         <div class="row">
            <div class="col-sm-12">
                  <div class="iq-card">
                     <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                           <h4 class="card-title">Brokers</h4>
                        </div>
                     </div>
                     <div class="iq-card-body">
                        <div class="table-responsive">
                           <div class="row justify-content-between">
                              <div class="col-sm-12 col-md-2">
                                 <div id="user_list_datatable_info" class="dataTables_filter">
                                    {{-- <form id="searchForm" action="{{ route('all.broker') }}" method="GET">
                                        <div class="form-group mb-0">
                                            <input type="search" class="form-control" name="search" value="{{ request('search') }}" placeholder="Search" aria-controls="user-list-table" id="searchInput">
                                        </div>
                                    </form> --}}
                                 </div>
                              </div>
                              <div class="col-sm-12 col-md-6">
                                 <div class="user-list-files d-flex float-right">
                                    <a class="btn btn-primary" href="{{route('show.show_broker')}}">
                                       Add New Broker
                                     </a>
                                   </div>
                              </div>
                           </div>
                           <table id="user-list-table" class="table table-striped table-borderless mt-4" role="grid" aria-describedby="user-list-page-info">
                             <thead>
                                 <tr>
                                    <th>Sr No.</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Email ID</th>
                                    <th>Contact Number</th>
                                    <th>Company</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                 </tr>
                             </thead>
                             <?php $i=1; ?>
                             <tbody>
                             @foreach($broker as $brokers)
                                 <tr>
                                    <td>{{$i++}}</td>
                                    <td>{{$brokers->first_name}}</td>
                                    <td>{{$brokers->last_name}}</td>
                                    <td>{{$brokers->email}}</td>
                                    <td>{{$brokers->phone}}</td>
                                    <td>{{$brokers->company}}</td>
                                    <td><span class="badge dark-icon-light iq-bg-primary">Active</span></td>
                                    <td>
                                       <div class="flex align-items-center list-user-action">
                                            <a class="iq-bg-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="view" href="{{route('view.broker',$brokers->id)}}"><i class="ri-eye-line"></i></a>
                                            <a class="iq-bg-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit" href="{{route('edit.broker',$brokers->id)}}"><i class="ri-pencil-line"></i></a>
                                            <a class="iq-bg-primary delete-btn" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete" href="{{route('delete.broker',$brokers->id)}}"><i class="ri-delete-bin-line"></i></a>

                                            <!-- <a class="iq-bg-primary notification-icon" data-toggle="tooltip" data-placement="top" title="" data-id="{{ $brokers->id }}" data-original-title="Notification" href=""><i class="ri-notification-line"></i></a> -->
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
                                    <form action="{{ route('add.broker.notification')}}" method="POST"> <!-- Adjust route accordingly -->
                                       @csrf
                                       <div class="modal-body">
                                       
                                          <input type="hidden" id="brokerIdInput" name="broker_id">
                                    
                                          <div class="form-group">
                                                <label for="notificationInput">Notification Message:</label>
                                                <input type="text" class="form-control" id="notificationInput" name="broker_notification" autocomplete="off">
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


                        <div class="row justify-content-between mt-3">
                            <div id="user-list-page-info" class="col-md-12" >
                                <div style="float:right;">

                                {{ $broker->appends(['search' => request('search')])->links() }}
                                </div>
                            </div>
                        </div>
                     </div>
                  </div>
            </div>
         </div>
      </div>

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
                const brokerId = this.getAttribute('data-id');
                console.log(brokerId);

                // Set the value of the hidden input field to the broker ID
                document.getElementById('brokerIdInput').value = brokerId;

                // Trigger the modal opening
                $('#notificationModal').modal('show');
            });
        });
    });
</script>
@endsection