@extends('staff.staff_dashboard')

@section('staff')


    <div class="container-fluid">
        <div class="row">
        <div class="col-sm-12">
                <div class="iq-card">
                    <div class="iq-card-header d-flex justify-content-between">
                    <div class="iq-header-title">
                        <h4 class="card-title">Lead List</h4>
                    </div>
                    </div>
                    <div class="iq-card-body">
                    <div class="table-responsive">
                        <div class="row justify-content-between">
                            <div class="col-sm-12 col-md-6">
                                <div id="user_list_datatable_info" class="dataTables_filter">
                                {{-- <form class="mr-3 position-relative">
                                    <div class="form-group mb-0">
                                        <input type="search" class="form-control" id="exampleInputSearch" placeholder="Search" aria-controls="user-list-table">
                                    </div>
                                </form> --}}
                                </div>
                            </div>
                            <!--<div class="col-sm-12 col-md-6">-->
                            <!--    <div class="user-list-files d-flex float-right">-->
                            <!--    <a class="iq-bg-primary" href="javascript:void();" >-->
                            <!--        Print-->
                            <!--        </a>-->
                            <!--    <a class="iq-bg-primary" href="javascript:void();">-->
                            <!--        Excel-->
                            <!--        </a>-->
                            <!--        <a class="iq-bg-primary" href="javascript:void();">-->
                            <!--        Pdf-->
                            <!--        </a>-->
                            <!--    </div>-->
                            <!--</div>-->
                        </div>
                        
                        <table id="user-list-table" class="table table-striped table-borderless mt-4" role="grid" aria-describedby="user-list-page-info">
                            <thead>
                                <tr>
                                <th>Sr No.</th>
                                <th>First Name</th>
                                <th>Email</th>
                                <!-- <th>Birth Date</th> -->
                                <th>Gender	</th>
                                <th>Phone Number</th>
                                <th>Loan Amount Offered</th>
                                <th>Annual Gross Income</th>
                                <th>Action</th>
                                <th>Category</th>
                                <!-- <th>Status</th> -->
                                </tr>
                            </thead>
                            <?php $i=1; ?>
                            <tbody>
                            @foreach($staff_leads as $staff_lead)
                                <tr>
                                <td>{{$i++}}</td>
                                <td>{{$staff_lead->first_name}} {{$staff_lead->last_name}}</td>
                                
                                <td>{{$staff_lead->email}}</td>
                                <!-- <td>{{$staff_lead->birth_date}}</td> -->
                                <td>{{$staff_lead->gender}}</td>
                                <td>{{$staff_lead->phone_number}}</td>
                                <td>{{$staff_lead->loan_amount_offered}}</td>
                                <td>{{$staff_lead->annual_gross_income}}</td>
                                <td>
                                    <div class="flex align-items-center list-user-action">
                                        <a class="iq-bg-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Add" href="{{route('show.staff.leads')}}"><i class="ri-user-add-line"></i></a>
                                        <a class="iq-bg-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit" href="{{route('edit.staff.leads',$staff_lead->id)}}"><i class="ri-pencil-line"></i></a>
                                        
                                        <a class="iq-bg-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete" href="{{route('delete.staff',$staff_lead->id)}}"><i class="ri-forbid-line text-danger"></i></a>

                                        <a class="iq-bg-primary usercredentials" data-toggle="tooltip" data-placement="top" title="" data-email="{{ $staff_lead->email }}"  data-first-name="{{ $staff_lead->first_name }}" data-original-title="Mail" href="#"><i class="ri-key-line"></i></a>
                                    </div>
                                </td>

                                <td>
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input switch-toggle" id="switch{{$loop->iteration}}" data-lead-id="{{$staff_lead->id}}" {{$staff_lead->category_flag ? 'checked' : ''}}>

                                        <label class="custom-control-label" for="switch{{$loop->iteration}}"></label>
                                    </div>
                                </td>

                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                        <div class="row justify-content-between mt-3">
                            <!--<div id="user-list-page-info" class="col-md-6">-->
                            <!--    <span>Showing 1 to 5 of 5 entries</span>-->
                            <!--</div>-->
                            <!--<div class="col-md-6">-->
                            <!--    <nav aria-label="Page navigation example">-->
                            <!--    <ul class="pagination justify-content-end mb-0">-->
                            <!--        <li class="page-item disabled">-->
                            <!--            <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>-->
                            <!--        </li>-->
                            <!--        <li class="page-item active"><a class="page-link" href="#">1</a></li>-->
                            <!--        <li class="page-item"><a class="page-link" href="#">2</a></li>-->
                            <!--        <li class="page-item"><a class="page-link" href="#">3</a></li>-->
                            <!--        <li class="page-item">-->
                            <!--            <a class="page-link" href="#">Next</a>-->
                            <!--        </li>-->
                            <!--    </ul>-->
                            <!--    </nav>-->
                            <!--</div>-->
                        </div>
                    </div>
                </div>
        </div>
        </div>
    </div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
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

</script>

<style>

    .qualified {
        color: green;
    }

    .disqualified {
        color: red;
    }

</style>

<script>
    $(document).ready(function(){
        $('.usercredentials').click(function(event){
            event.preventDefault();
            var leadEmail = $(this).data('email');
            var firstName = $(this).data('first-name');

            $.ajax({
                url:"{{route('user.credentials')}}",
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

@endsection
