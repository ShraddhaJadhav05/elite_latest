@extends('staff.staff_dashboard')

@section('staff')

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between">
                    <div class="iq-header-title">
                        <h4 class="card-title">Approved Applications</h4>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div class="user-list-files d-flex float-right">
                            <a class="btn btn-primary" href="{{ route('show.loan.applications') }}">
                                Add New Application
                            </a>
                        </div>
                    </div>
                </div>
                <div class="iq-card-body">
                    <div class="table-responsive">
                        <table id="user-list-table" class="table table-striped table-borderless mt-4" role="grid" aria-describedby="user-list-page-info">
                            <thead>
                                <tr>


                                    <th>SR No</th>
                                    <th>Application Number</th>    
                                    <th>Proposal ID</th>
                                    <th>Applicant's Name</th>
                                    <th> Applicant's Mobile</th>
                                    <th>Bank Applied to</th>
                                    <th> Bank Product</th>
                                    <th> Monthly Instalment</th> 
                                    <th>  Application Date</th> 
                                    <th> Processed By</th> 
                                    <td>Actions</td>


                             
                                </tr>
                            </thead>
                            <?php $i=1; ?>
                            <tbody>
                                @foreach($loans as $loan)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>{{$loan->application_number}}</td>
                                    <td>{{ $loan->loan_number }}</td>
            
                                 
                                    <td>
                                        @foreach($client as $clients)
                                            @if($clients->id == $loan->applicant_name)
                                                {{$clients->first_name}}
                                            @endif
                                        @endforeach
                                    </td>
                                    

                                    <td>{{ $loan->applicant_mobile }}</td>
                                        <td>
                                        @foreach($bank as $banks)
                                         @if($banks->id == $loan->bank_branch)
                                            {{$banks->name}}
                                        @endif
                                        
                                       
                                        @endforeach
                                        </td>
                                        
                                        
                                        <td>
                                            @foreach($bank_product as $banks)
                                             @if($banks->id == $loan->bank_product)
                                            {{$banks->name}}
                                        @endif
                                        
                                      
                                        @endforeach
                                    </td>
                            
                                    <td>{{ $loan->monthly_instalment }}</td>
                                    <td>{{ $loan->application_date }}</td>

                            

                                         
                                   <td>
                                    @foreach($staff as $staffs)
                                        @if($staffs->id == $loan->staff_name)
                                            {{$staffs->first_name}}
                                        @endif
                                    @endforeach
                                </td>


                                
                                    <!-- Add more cells here for additional fields -->
                                    {{-- {{ route('delete.loan.products',$loan->id) }} --}}
                                    <td>
                                        <div class="flex align-items-center list-loan-action">
                                            <a class="iq-bg-primary" data-toggle="tooltip" data-placement="top" title="View" href="{{ route('view.loan.applications',$loan->id) }}"><i class="ri-eye-line"></i></a>
                                            <a class="iq-bg-primary" data-toggle="tooltip" data-placement="top" title="Edit" href="{{ route('edit.loan.applications',$loan->id) }}"><i class="ri-pencil-line"></i></a>
                                            <a class="iq-bg-primary delete-btn" data-toggle="tooltip" data-placement="top" title="Delete" href="{{ route('delete.loan.applications',$loan->id) }}"><i class="ri-delete-bin-line"></i></a>
                                        </div>
                                    </td>

                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
      



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>


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
