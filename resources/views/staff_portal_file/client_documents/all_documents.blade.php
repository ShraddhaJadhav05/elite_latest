@extends('staff.staff_dashboard')

@section('staff')

      <div class="container-fluid">
         <div class="row">
            <div class="col-sm-12">
                  <div class="iq-card">
                     <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                           <h4 class="card-title">Customers</h4>
                        </div>
                     </div>
                     <div class="iq-card-body">
                        <div class="table-responsive">
                           <div class="row justify-content-between">
                              <div class="col-sm-12 col-md-2">
                                 <div id="user_list_datatable_info" class="dataTables_filter">
                                 {{-- <form id="searchForm" action="{{ route('all.client.documments') }}" method="GET">
                                        <div class="form-group mb-0">
                                            <input type="search" class="form-control" name="search" value="{{ request('search') }}" placeholder="Search" aria-controls="user-list-table" id="searchInput">
                                        </div>
                                    </form> --}}
                                 </div>
                              </div>
                              <div class="col-sm-12 col-md-2"></div>
                              <div class="col-sm-12 col-md-2">
                                

                              </div>
                               
                                    <div class="col-sm-12 col-md-2">
                                    <form action="{{ route('all.client.documments') }}" method="GET">

                                        <div class="form-group select_namemain">
                                        
                                        <select class="form-control filter_select select_name" name="client_id">
                                            <option selected="" disabled="">Select Name</option>
                                            @foreach($client as $clients)
                                            <option value="{{$clients->id}}">{{$clients->first_name}}</option>
                                            @endforeach

                                        </select>
                                    <!-- <span class="select2 select2-container select2-container--default" dir="ltr" data-select2-id="2" style="width: 208.656px;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-z3tp-container"><span class="select2-selection__rendered" id="select2-z3tp-container" role="textbox" aria-readonly="true" title="Select Name">Select Name</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span> -->
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-2">

                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Email" name="email">
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-2">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary filter_btn">Filter</button>
                                        </div>
                                    </div>
                            
                                </form>
                           </div>
                           <table id="user-list-table" class="table table-striped table-borderless mt-4" role="grid" aria-describedby="user-list-page-info">
                             <thead>
                                 <tr>
                                    <th>Sr No.</th>
                                    <th>Client Name</th>
                                    <th>Contact</th>
                                    <th>Email</th>
                                    <th>City</th>
                                    <!-- <th>Product</th> -->
                                    <!-- <th>Status</th> -->
                                    <th>Date</th>
                                    <th>Action</th>
                                 </tr>
                             </thead>
                             <?php $i=1; ?>
                             <tbody>
                                @foreach($client_document as $client_documents)
                                 <tr>
                                    <td>{{$i++}}</td>
                                    <td> {{$client_documents->first_name}} </td>
                                    <td> {{$clients->phone_number}} </td>
                                    <td> {{$clients->email}}</td>
                                    <td>{{$clients->city}} </td>
                                    <!-- <td> 
                                        @foreach($client as $clients)
                                            @if($clients->id == $client_documents->client_id)
                                                {{$clients->reason_for_loan}}
                                            @endif
                                        @endforeach
                                    </td> -->
                                    <!-- <td><span class="badge  dark-icon-light iq-bg-primary">Lead</span></td> -->
                                    
                                    <td>{{ $clients->created_at->format('Y-m-d') }}</td>
                                    <td>
                                       <div class="flex align-items-center list-user-action">
       {{-- @if(!empty($client_documents) && isset($client_documents->id) && isset($client_documents->client)) --}}
    <a class="iq-bg-primary" data-toggle="tooltip" data-placement="top" title="View" href="{{ route('view.customer', ['id' => $client_documents->id]) }}">
        <i class="ri-eye-line"></i>
    </a>
{{-- @endif --}}

                                          <a class="iq-bg-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete" href="#"><i class="ri-delete-bin-line"></i></a>
                                       </div>
                                    </td>
                                 </tr>
                                @endforeach
                             </tbody>
                           </table>
                        </div>
                           <!-- <div class="row justify-content-between mt-3">
                              <div id="user-list-page-info" class="col-md-6">
                                 <span>Showing 1 to 5 of 5 entries</span>
                              </div>
                              <div class="col-md-6">
                                 <nav aria-label="Page navigation example">
                                    <ul class="pagination justify-content-end mb-0">
                                       <li class="page-item disabled">
                                          <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                                       </li>
                                       <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                       <li class="page-item"><a class="page-link" href="#">2</a></li>
                                       <li class="page-item"><a class="page-link" href="#">3</a></li>
                                       <li class="page-item">
                                          <a class="page-link" href="#">Next</a>
                                       </li>
                                    </ul>
                                 </nav>
                              </div>
                           </div> -->
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

<script>
   document.getElementById('searchInput').addEventListener('input', function () {
      document.getElementById('searchForm').submit();
   });
</script>
@endsection
