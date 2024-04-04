@extends('admin.admin_dashboard')

@section('admin')

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="iq-card">
                    <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                            <h4 class="card-title">Branch</h4>
                        </div>
                    </div>
                    <div class="iq-card-body">
                        <div class="table-responsive">
                            <div class="row justify-content-between">
                                <div class="col-sm-12 col-md-2">
                                    <!--<form id="searchForm" action="{{ route('all.branch') }}" method="GET">-->
                                    <!--    <div class="form-group mb-0">-->
                                    <!--        <input type="search" class="form-control" name="search" value="{{ request('search') }}" placeholder="Search" aria-controls="user-list-table" id="searchInput">-->
                                    <!--    </div>-->
                                    <!--</form>-->
                                </div>
                                <div class="col-sm-12 col-md-6">
                                    <div class="user-list-files d-flex float-right">
                                        <a class="btn btn-primary" href="{{ route('show.branch') }}">
                                            Add New Branch
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <table id="user-list-table" class="table table-striped table-borderless mt-4" role="grid" aria-describedby="user-list-page-info">
                                <thead>
                                    <tr>
                                        <th>Sr No.</th>
                                        <th>Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <?php $i=1; ?>
                                <tbody>
                                    @foreach($branch as $value)
                                        <tr>
                                            <td>{{ $i++ }}</td>
                                            

                                            <td>{{ $value->branch_name }}</td>
                                            <td>
                                                <div class="flex align-items-center list-user-action">
                                                    <a class="iq-bg-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="view" href="{{ route('view.branch', $value->id) }}"><i class="ri-eye-line"></i></a>
                                                    <a class="iq-bg-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit" href="{{ route('edit.branch', $value->id) }}"><i class="ri-pencil-line"></i></a>

                                                    <a class="iq-bg-primary delete-btn" data-branch-id="{{ $value->id }}" href="{{ route('delete.branch', $value->id) }}" data-toggle="tooltip" data-placement="top" title="Delete"><i class="ri-delete-bin-line"></i></a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <div class="row justify-content-between mt-3">
                            <div id="user-list-page-info" class="col-md-6">
                                {{ $branch->appends(['search' => request('search')])->links() }}
                            </div>
                        </div>
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
                              <div style="margin-top:20px;float:right;margin-right:20px;">
                                {{$branch->onEachSide(1)->links()}}
                              </div>
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
