
@extends('admin.admin_dashboard')

@section('admin')

      <div class="container-fluid">
         <div class="row">
            <div class="col-sm-12">
                  <div class="iq-card">
                     <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                           <h4 class="card-title">Apponitments</h4>
                        </div>
                     </div>
                     <div class="iq-card-body">
                        <div class="table-responsive">
                           <div class="row justify-content-between">
                              <div class="col-sm-12 col-md-2">
                                 <div id="user_list_datatable_info" class="dataTables_filter">
                                    {{-- <form id="searchForm" action="{{ route('all.appoinments') }}" method="GET">
                                        <div class="form-group mb-0">
                                            <input type="search" class="form-control" name="search" value="{{ request('search') }}" placeholder="Search" aria-controls="user-list-table" id="searchInput">
                                        </div>
                                    </form> --}}
                                 </div>
                              </div>
                              <div class="col-sm-12 col-md-6">
                                 <div class="user-list-files d-flex float-right">
                                    <a class="btn btn-primary" href="{{route('show.show_appoinment')}}" >
                                       Create New Appointment
                                     </a>
                                   </div>
                              </div>
                           </div>
                           <table id="user-list-table" class="table table-striped table-borderless mt-4" role="grid" aria-describedby="user-list-page-info">
                             <thead>
                                 <tr>
                                    <th>Sr No.</th>
                                    <th>Name</th>
                                    <th>Email ID</th>
                                    <th>Contact Number</th>
                                    <th>Date</th>
                                    <th>Time Slots</th>
                                    <th>Slots Status</th>
                                    <th>Status</th>
                                    <th>Company</th>
                                    <!-- <th>Message</th> -->
                                    <th>Action</th>
                                 </tr>
                             </thead>
                             <?php $i=1; ?>
                             <tbody>
                             
                             @foreach($appointments as $appointment)
                                 <tr>
                                    <td>{{$i++}}</td>
                                    <td>{{$appointment->name}}</td>
                                    <td>{{$appointment->email}}</td>
                                    <td>{{$appointment->phone}}</td>
                                    <td>{{$appointment->date}}</td>
                                    <td>{{$appointment->time_slot}}</td>
                                    <td>
                                       @if($appointment->status == 1)
                                       
                                          <span class="badge dark-icon-light iq-bg-primary">Approved</span>
                                       @elseif($appointment->status == 0)
                                          <span class="badge dark-icon-light iq-bg-danger">Rejected</span>
                                       @endif
                                       
                                    </td>
                                    <td><span class="badge dark-icon-light iq-bg-primary">Active</span></td>
                                    <td>{{$appointment->company}}</td>
                                    <!-- <td>{{$appointment->message}}</td> -->
                                    <td>
                                       <div class="flex align-items-center list-user-action">
                                          <a class="iq-bg-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="View" href="{{route('view.appoinment',$appointment->id)}}"><i class="ri-eye-line"></i></a>

                                          <a class="iq-bg-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit" href="{{route('edit.appoinment',$appointment->id)}}"><i class="ri-pencil-line"></i></a>

                                          <a class="iq-bg-primary delete-btn" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete" href="{{route('delete.appoinment',$appointment->id)}}"><i class="ri-delete-bin-line"></i></a>
                                       </div>
                                    </td>
                                 </tr>
                              @endforeach

                             </tbody>
                           </table>
                        </div>

                        <div class="row justify-content-between mt-3">
                            <div id="user-list-page-info" class="col-md-12" >
                                <div style="float:right;">

                                {{ $appointments->appends(['search' => request('search')])->links() }}
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
@endsection
