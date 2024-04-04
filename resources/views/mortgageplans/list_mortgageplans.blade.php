@extends('admin.admin_dashboard')

@section('admin')

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="iq-card">
                    <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                            <h4 class="card-title">Mortgage Plans List</h4>
                        </div>
                    </div>
                    <div class="iq-card-body">
                        <div class="table-responsive">
                            <div class="row justify-content-between">
                                <div class="col-sm-12 col-md-2">
                                    <form id="searchForm" action="" method="GET">
                                        <!-- <div class="form-group mb-0">
                                            <input type="search" class="form-control" name="search" value="{{ request('search') }}" placeholder="Search" aria-controls="user-list-table" id="searchInput">
                                        </div> -->
                                    </form>
                                </div>
                                <div class="col-sm-12 col-md-6">
                                    <div class="user-list-files d-flex float-right">
                                        <a class="btn btn-primary" href="{{ route('show.mortgageplans') }}">
                                            Add Mortgage Plan
                                        </a>
                                    </div>
                                </div>  
                            </div>
                            <table id="user-list-table" class="table table-striped table-borderless mt-4" role="grid" aria-describedby="user-list-page-info">
                                <thead>
                                    <tr>
                                        <th>Sr No.</th>
                                        <th>Mortgage loan Number</th> 
                                        <th>Mortgage Loan Name</th>    
                                        
                                        <th>Bank name</th>   
                                        <th>Branch Name</th>
                                        <th>Product Name</th>
                                        <th>Plan name</th>   
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <?php $i=1; ?>
                                <tbody>
                                    @foreach($mortgagePlan as $mortgagePlans)
                                        <tr>
                                            <td>{{ $i++ }}</td>
                                           
                                            <td>{{ $mortgagePlans->mortgage_plan_id }}</td>
                                             <td>{{ $mortgagePlans->plan_name }}</td>
                                            <td>
                                                {{ $mortgagePlans->bank->name}}
                                            </td>
                                            <td>
                                                {{ $mortgagePlans->branch->branch_name ?? ''}}
                                            </td>
                                                 
                                            <td>
                                                {{ $mortgagePlans->product->name}}
                                            </td>
                                            <td>{{ $mortgagePlans->product->plan }}</td>
                                            <td>
                                                <div class="flex align-items-center list-user-action">
                                                    <a class="iq-bg-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="view" href="{{ route('view.mortgageplans', $mortgagePlans->id) }}"><i class="ri-eye-line"></i></a>
                                                    <a class="iq-bg-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit" href="{{ route('edit.mortgageplans', $mortgagePlans->id) }}"><i class="ri-pencil-line"></i></a>

                                                    <a class="iq-bg-primary delete-btn" data-mortgagePlans-id="{{ $mortgagePlans->id }}" href="{{ route('delete.mortgageplans', $mortgagePlans->id) }}" data-toggle="tooltip" data-placement="top" title="Delete"><i class="ri-delete-bin-line"></i></a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        {{-- <div class="row justify-content-between mt-3">
                            <div id="user-list-page-info" class="col-md-6">
                                {{ $mortgagePlans->appends(['search' => request('search')])->links() }}
                            </div>
                        </div> --}}
                        <div class="row justify-content-between mt-3">
                              <div id="user-list-page-info" class="col-md-6">
                                 <!-- <span>Showing 1 to 5 of 5 entries</span> -->
                              </div>
                              <!-- <div class="col-md-6">
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
                              </div> -->
                              {{-- <div style="margin-top:20px;float:right;margin-right:20px;">
                                {{$banks->onEachSide(1)->links()}}
                              </div> --}}
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
@endsection
