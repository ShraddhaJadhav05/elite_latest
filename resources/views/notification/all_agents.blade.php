@extends('admin.admin_dashboard')

@section('admin')
      <div class="container-fluid">
         <div class="row">
            <div class="col-sm-12">
                  <div class="iq-card">
                     <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                           <h4 class="card-title">Agents</h4>
                        </div>
                     </div>
                     <div class="iq-card-body">
                        <div class="table-responsive">
                           <div class="row justify-content-between">
                           <div class="col-sm-12 col-md-2">
                                 <div id="user_list_datatable_info" class="dataTables_filter">
                                    {{-- <form id="searchForm" action="{{ route('all.notification.agents') }}" method="GET">
                                        <div class="form-group mb-0">
                                            <input type="search" class="form-control" name="search" value="{{ request('search') }}" placeholder="Search" aria-controls="user-list-table" id="searchInput">
                                        </div>
                                    </form> --}}
                                 </div>
                              </div>

                              
                              <!-- Modal -->
                              <div class="modal fade" id="notificationModal" tabindex="-1" aria-labelledby="notificationModalLabel" aria-hidden="true">
                                 <div class="modal-dialog">
                                    <div class="modal-content">
                                          <div class="modal-header">
                                             <h5 class="modal-title" id="notificationModalLabel">Send Notification</h5>
                                             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                             <span aria-hidden="true">&times;</span>
                                             </button>
                                          </div>
                                          <div class="modal-body">
                                             <form id="notificationForm">
                                                <div class="mb-3">
                                                      <label for="notification_text" class="form-label">Notification Text</label>
                                                      <textarea class="form-control" id="notification_text" name="broker_notification" required></textarea>
                                                </div>
                                                
                                                <button type="submit" class="btn btn-primary">Send</button>
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                             </form>
                                          </div>
                                    </div>
                                 </div>
                              </div>


                              <div class="col-sm-12 col-md-6">
                                 <div class="user-list-files d-flex float-right">
                                    <a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#notificationModal" href="#">
                                          Send Notification
                                    </a>
                                 </div>
                              </div>
                           </div>
                           <table id="user-list-table" class="table table-striped table-borderless mt-4" role="grid" aria-describedby="user-list-page-info">
                             <thead>
                                 <tr>
                                    <th>Sr No.</th>
                                    <th>Notification</th>
                                    <th>Sent Date</th>
                                    <th>Sent Time</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                 </tr>
                             </thead>
                             <?php $i=1; ?>
                             <tbody>
                             
                             @foreach($broker_notification->unique('broker_notification') as $broker_notifications)
                                 <tr>
                                   
                                    <td>{{$i++}}</td>
                                    <td>{{ Str::limit($broker_notifications->broker_notification, 50) }}</td>
                                    <td>{{ \Carbon\Carbon::parse($broker_notifications->created_at)->format('Y-m-d') }}</td>
                                    
                                    <td>{{ \Carbon\Carbon::parse($broker_notifications->created_at)->setTimezone('Asia/Dubai')->format('H:i:s') }}</td>

                                    <td>{{ \Carbon\Carbon::parse($broker_notifications->created_at)->diffForHumans() }}</td>
                                    <td>
                                       <div class="flex align-items-center list-user-action">
                                          <a class="iq-bg-primary notification-icon" data-toggle="tooltip" data-placement="top" data-id="{{ $broker_notifications->id }}" title="" data-original-title="view" href=""><i class="ri-eye-line"></i></a>
                                          <!-- <a class="iq-bg-primary notification-iconn" data-toggle="tooltip" data-placement="top" data-id="{{ $broker_notifications->id }}" title="" data-original-title="Edit" href="#"><i class="ri-pencil-line"></i></a>
                                          <a class="iq-bg-primary delete-btn" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete" href="{{route('delete.notification',$broker_notifications->id)}}"><i class="ri-delete-bin-line"></i></a> -->
                                       </div>
                                    </td>
                                 </tr>
                                 
                     <!-- Modal -->
                     <div class="modal fade" id="notificationeditModal" tabindex="-1" aria-labelledby="notificationsModalLabel" aria-hidden="true">
                           <div class="modal-dialog">
                              <div class="modal-content">
                                    <div class="modal-header">
                                       <h5 class="modal-title" id="notificationsModalLabel">Notification</h5>
                                       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                       </button>
                                    </div>
                                 
                                    <form action="{{ route('update.broker.notification', ['id' => $broker_notifications->id]) }}" method="post">

                                       @csrf
                                       <div class="modal-body">
                                       
                                       
                                          <div class="form-group">
                                                <label for="notificationeditInput">Notification Message:</label>
                                                <input type="text" class="form-control-static" id="notificationeditInput" name="broker_notification" autocomplete="off">


                                                <!-- <input type="text" class="form-control-static" id="notificationeditInput" name="broker_notification" autocomplete="off"> -->
                                               
                                          </div>
                                       </div>
                                       <div class="modal-footer">
                                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                          <button type="submit" class="btn btn-primary">Update</button>
                                       </div>
                                    </form>
                                 
                              </div>
                           </div>
                        </div>

                        @endforeach
                               
                     </tbody>
                  </table>
                           
                        </div>

                         <!-- Modal -->
                         <div class="modal fade" id="notificationbrokerModal" tabindex="-1" aria-labelledby="notificationModalLabel" aria-hidden="true">
                           <div class="modal-dialog">
                              <div class="modal-content">
                                    <div class="modal-header">
                                       <h5 class="modal-title" id="notificationModalLabel">Notification</h5>
                                       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                       </button>
                                    </div>
                                    <form>
                                       @csrf
                                       <div class="modal-body">
                                       
                                          <input type="hidden" id="brokerIdInput" name="broker_id">
                                    
                                          <div class="form-group">
                                                <label for="notificationInput">Notification Message:</label>
                                                <!-- <input type="text" class="form-control-static" id="notificationInput" name="broker_notification" autocomplete="off"> -->
                                                <p class="form-control-static" id="notificationInput"></p>
                                          </div>
                                       </div>
                                       <div class="modal-footer">
                                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                          <!-- <button type="submit" class="btn btn-primary">Update</button> -->
                                       </div>
                                    </form>
                              </div>
                           </div>
                        </div>
                        <div class="row justify-content-between mt-3">
                            <div id="user-list-page-info" class="col-md-12" >
                                <div style="float:right;">

                                {{ $broker_notification->appends(['search' => request('search')])->links() }}
                                </div>
                            </div>
                        </div>
                     </div>
                  </div>
            </div>
         </div>
      </div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>

<script>
    // No need to include jQuery if not used elsewhere
    document.addEventListener('DOMContentLoaded', function () {
        const notificationForm = document.getElementById('notificationForm');

        notificationForm.addEventListener('submit', function (e) {
            e.preventDefault();
            const formData = new FormData(this);

            fetch('{{ route("send.all.broker.notification") }}', {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert('Notification sent successfully.');
                    window.location.href = '{{ route("all.notification.agents") }}';
                    // Use Bootstrap modal methods to hide modal
                    const modal = new bootstrap.Modal(document.getElementById('notificationModal'));
                    modal.hide();
                } else {
                    alert('Failed to send notification.');
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
        });
    });
</script>

<script>
   document.addEventListener("DOMContentLoaded", function() {
    const notificationIcons = document.querySelectorAll('.notification-icon');
    const modalNotificationInput = document.getElementById('notificationInput');

    notificationIcons.forEach(function(notificationIcon) {
        notificationIcon.addEventListener('click', function(event) {
            event.preventDefault();
            const brokerId = this.getAttribute('data-id');
            console.log(brokerId);

            // AJAX request to fetch the broker notification message
            fetch(`../admin/view_broker_notification/${brokerId}`)
                .then(response => response.json())
                .then(data => {
                    if(data.success) {
                        // Update modal input field with notification message
                        // Change the value of modalNotificationInput to innerHTML
                        modalNotificationInput.innerHTML = data.broker_notification.broker_notification;

                        // Trigger the modal opening
                        $('#notificationbrokerModal').modal('show');
                    } else {
                        console.error('Failed to fetch notification message');
                    }
                })
                .catch(error => console.error('Error fetching notification:', error));
        });
    });
});
</script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const notificationIcons = document.querySelectorAll('.notification-iconn');
        const modalNotificationInput = document.getElementById('notificationeditInput');
        
        notificationIcons.forEach(function(notificationIcon) {
            notificationIcon.addEventListener('click', function(event) {
                event.preventDefault();
                const brokerId = this.getAttribute('data-id');
                console.log(brokerId);

                // AJAX request to fetch the broker notification message
                fetch(`/admin/view_broker_notification/${brokerId}`)
                    .then(response => response.json())
                    .then(data => {
                        if(data.success) {
                            // Update modal input field with notification message
                            modalNotificationInput.value = data.broker_notification.broker_notification;

                            // Trigger the modal opening
                            $('#notificationeditModal').modal('show');
                        } else {
                            console.error('Failed to fetch notification message');
                        }
                    })
                    .catch(error => console.error('Error fetching notification:', error));
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