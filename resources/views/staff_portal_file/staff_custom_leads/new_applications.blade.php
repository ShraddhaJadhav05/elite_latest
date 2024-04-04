@extends('staff.staff_dashboard')

@section('staff')

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
                                    <form id="searchForm" action="{{ route('new.loan.applications') }}" method="GET">
                                        <div class="form-group mb-0">
                                            <input type="search" class="form-control" name="search" value="{{ request('search') }}" placeholder="Search" aria-controls="user-list-table" id="searchInput">
                                        </div>
                                    </form>
                                 </div>
                              </div>
                              <div class="col-sm-12 col-md-6">
                                 <div class="user-list-files d-flex float-right">
                                    <a class="btn btn-primary" href="{{route('show.new.loan.application')}}">
                                       Add New Leads
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
                                    <th>Lead Type</th>
                                    <th>Loan Amount</th>
                                    <th>Monthly Salary Drawn</th>
                                    {{--   <th>Application Priority</th>
                                  <th>Application Status</th> --}}
                                    <th>Action</th>
                                    <!-- <th>Category</th> -->
                                </tr>
                            </thead>
                            <?php $i=1; ?>
                            <tbody>
                            @foreach($staff_leads as $staff_lead)
                                <tr>
                                <td>{{$i++}}</td>
                                <td>{{$staff_lead->lead->first_name}}</td>
                                <td>{{$staff_lead->lead->phone_number}}</td>
                                <td>{{$staff_lead->lead->email}}</td>
                                <td>{{$staff_lead->lead->lead_type}}</td>
                                <td>{{$staff_lead->lead->loan_amount_offered}}</td>
                                <td>{{$staff_lead->lead->annual_gross_income}}</td>
                                {{-- <td>
                                    <span class="badge dark-icon-light iq-bg-danger">{{$staff_lead->application_priority}}</span>
                                </td>
                                <td>
                                    @if($staff_lead->lead->application_status == 'Completed')
                                            <span class="badge dark-icon-light iq-bg-success">{{$staff_lead->lead->application_status}}</span>
                                        @elseif($staff_lead->lead->application_status == 'In Progress')
                                            <span class="badge dark-icon-light iq-bg-primary">{{$staff_lead->lead->application_status}}</span>
                                        @else($staff_lead->lead->application_status == 'Pending')
                                            <span class="badge dark-icon-light iq-bg-danger">{{$staff_lead->lead->application_status}}</span>
                                    @endif
                                </td> --}}
                                <td>
                                    <div class="flex align-items-center list-user-action">
                                        <a class="iq-bg-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="view" href="{{route('view.loan.application',$staff_lead->lead->id)}}"><i class="ri-eye-line"></i></a>
                                        <!-- <a class="iq-bg-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Add" href="{{route('show.staff.leads')}}"><i class="ri-user-add-line"></i></a> -->
                                        <a class="iq-bg-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit" href="{{route('edit.loan.application',$staff_lead->lead->id)}}"><i class="ri-pencil-line"></i></a>
                                        

                                        <a class="iq-bg-primary delete-btn" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete" href="{{route('delete.lead.applicationt',$staff_lead->lead->id)}}"><i class="ri-delete-bin-line"></i></a>


                                        <!-- <a class="iq-bg-primary usercredentials" data-toggle="tooltip" data-placement="top" title="" data-email="{{ $staff_lead->lead->email }}"  data-first-name="{{ $staff_lead->lead->first_name }}" data-original-title="Mail" href="#"><i class="ri-key-line"></i></a> -->
                                    </div>
                                </td>

                                <!-- <td>
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input switch-toggle" id="switch{{$loop->iteration}}" data-lead-id="{{$staff_lead->lead->id}}" {{$staff_lead->lead->category_flag ? 'checked' : ''}}>

                                        <label class="custom-control-label" for="switch{{$loop->iteration}}"></label>
                                    </div>
                                </td> -->

                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                           
                        </div>

                        <div class="row justify-content-between mt-3">
                            <div id="user-list-page-info" class="col-md-12" >
                                <div style="float:right;">

                                {{ $staff_leads->appends(['search' => request('search')])->links() }}
                                </div>
                            </div>
                        </div>
                     </div>
                  </div>
            </div>
         </div>
      </div>
      



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>



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
