@extends('admin.admin_dashboard')

@section('admin')

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="iq-card">
                    <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                            <h4 class="card-title">Bank Branch</h4>
                        </div>
                    </div>
                    <div class="iq-card-body">
                        <div class="table-responsive">
                            <div class="row justify-content-between">
                                <div class="col-sm-12 col-md-2">
                                    
                                </div>
                                <div class="col-sm-12 col-md-6">
                                    <div class="user-list-files d-flex float-right">
                                        <a class="btn btn-primary" href="{{ route('show.banks_branch') }}">
                                            Add New Bank
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <table id="user-list-table" class="table table-striped table-borderless mt-4" role="grid" aria-describedby="user-list-page-info">
                                <thead>
                                    <tr>
                                        <th>Sr No.</th>
                                        <th>Logo</th>
                                        <th>Bank Name</th>
                                        <th>Branch Name</th>
                                        <th>Contact Number</th>
                                        <th>Emirates</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <?php $i=1; ?>
                                <tbody>
                                    @foreach($bankBranches as $value)
                                        <tr>
                                            <td>{{ $i++ }}</td>
                                            <td>
                                                @if($value->logo)
                                                    <img class="rounded-circle img-fluid avatar-40" src="{{ asset('bank_logo/' . $value->logo) }}" alt="Logo">
                                                @else
                                                    <img class="rounded-circle img-fluid avatar-40" src="{{ asset('images/user/blank.png') }}" alt="Logo">
                                                @endif
                                            </td>

                                            <td>{{ $value->bank->name ?? '' }}</td>
                                            <td>{{ $value->branch->branch_name }}</td>
                                            <td>{{ $value->contact }}</td>
                                            <td>{{ $value->emirate }}</td>
                                            <td>
                                                <div class="flex align-items-center list-user-action">
                                                    <a class="iq-bg-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="view" href="{{ route('view.banks_branch', $value->id) }}"><i class="ri-eye-line"></i></a>
                                                    <a class="iq-bg-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit" href="{{ route('edit.banks_branch', $value->id) }}"><i class="ri-pencil-line"></i></a>

                                                    <a class="iq-bg-primary delete-btn" data-value-id="{{ $value->id }}" href="{{ route('delete.banks_branch', $value->id) }}" data-toggle="tooltip" data-placement="top" title="Delete"><i class="ri-delete-bin-line"></i></a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
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
@endsection
