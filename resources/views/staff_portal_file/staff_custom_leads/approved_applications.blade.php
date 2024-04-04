@extends('staff.staff_dashboard')

@section('staff')

      <div class="container-fluid">
         <div class="row">
            <div class="col-sm-12">
                  <div class="iq-card">
                     <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                           <h4 class="card-title">Approved Leads</h4>
                        </div>
                     </div>
                     <div class="iq-card-body">
                        <div class="table-responsive">
                           <div class="row justify-content-between">
                           <div class="col-sm-12 col-md-2">
                                 <div id="user_list_datatable_info" class="dataTables_filter">
                                    <form id="searchForm" action="{{ route('approved.applications') }}" method="GET">
                                        <div class="form-group mb-0">
                                            <input type="search" class="form-control" name="search" value="{{ request('search') }}" placeholder="Search" aria-controls="user-list-table" id="searchInput">
                                        </div>
                                    </form>
                                 </div>
                              </div>
                              <!-- <div class="col-sm-12 col-md-6">
                                 <div class="user-list-files d-flex float-right">
                                    <a class="btn btn-primary" href="{{route('show.new.loan.application')}}">
                                       Add New Application
                                     </a>
                                   </div>
                              </div> -->
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
                                    <th>Application Priority</th>
                                    <th>Application Status</th>
                                    
                                </tr>
                            </thead>
                            <?php $i=1; ?>
                            <tbody>
                            @foreach($approvedapplication as $approvedapplications)
                                <tr>
                                <td>{{$i++}}</td>
                                <td>{{$approvedapplications->lead->first_name}}</td>
                                <td>{{$approvedapplications->lead->phone_number}}</td>
                                <td>{{$approvedapplications->lead->email}}</td>
                                <td>{{$approvedapplications->lead->lead_type}}</td>
                                <td>{{$approvedapplications->lead->loan_amount_offered}}</td>
                                <td>{{$approvedapplications->lead->annual_gross_income}}</td>
                                <td>
                                    <span class="badge dark-icon-light iq-bg-danger">{{$approvedapplications->application_priority}}</span>
                                </td>
                                <td>
                                    @if($approvedapplications->lead->application_status == 'Completed')
                                            <span class="badge dark-icon-light iq-bg-success">{{$approvedapplications->lead->application_status}}</span>
                                        @elseif($approvedapplications->lead->application_status == 'In Progress')
                                            <span class="badge dark-icon-light iq-bg-primary">{{$approvedapplications->lead->application_status}}</span>
                                        @else($approvedapplications->lead->application_status == 'Pending')
                                            <span class="badge dark-icon-light iq-bg-danger">{{$approvedapplications->lead->application_status}}</span>
                                    @endif
                                </td>
                              

                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                           
                        </div>

                        <div class="row justify-content-between mt-3">
                            <div id="user-list-page-info" class="col-md-12" >
                                <div style="float:right;">

                                {{ $approvedapplication->appends(['search' => request('search')])->links() }}
                                </div>
                            </div>
                        </div>
                     </div>
                  </div>
            </div>
         </div>
      </div>
      



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


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
   document.getElementById('searchInput').addEventListener('input', function () {
      document.getElementById('searchForm').submit();
   });
</script>

@endsection
