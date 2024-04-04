@extends('admin.admin_dashboard')

@section('admin')

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="iq-card">
                    <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                            <h4 class="card-title">Banks</h4>
                        </div>
                    </div>
                    <div class="iq-card-body">
                        <div class="table-responsive">
                            <div class="row justify-content-between">
                                <div class="col-sm-12 col-md-2">
                                   
                                </div>
                                <div class="col-sm-12 col-md-6">
                                    <div class="user-list-files d-flex float-right">
                                        <a class="btn btn-primary" href="{{ route('show.banks') }}">
                                            Add New Bank
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <table id="user-list-table" class="table table-striped table-borderless" role="grid" aria-describedby="user-list-page-info" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Sr No.</th>
                                        <th>Logo</th>
                                        <th>Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <?php $i=1; ?>
                                <tbody>
                                    @foreach($banks as $bank)
                                        <tr>
                                            <td>{{ $i++ }}</td>
                                            <td>
                                                @if($bank->logo)
                                                    <img class="rounded-circle img-fluid avatar-40" src="{{ asset('bank_logo/' . $bank->logo) }}" alt="Logo">
                                                @else
                                                    <img class="rounded-circle img-fluid avatar-40" src="{{ asset('images/user/blank.png') }}" alt="Logo">
                                                @endif
                                            </td>

                                            <td>{{ $bank->name }}</td>
                                          
                                            <td>
                                                <div class="flex align-items-center list-user-action">
                                                    <a class="iq-bg-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="view" href="{{ route('view.bank', $bank->id) }}"><i class="ri-eye-line"></i></a>
                                                    <a class="iq-bg-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit" href="{{ route('edit.bank', $bank->id) }}"><i class="ri-pencil-line"></i></a>

                                                    <a class="iq-bg-primary delete-btn" data-bank-id="{{ $bank->id }}" href="{{ route('delete.bank', $bank->id) }}" data-toggle="tooltip" data-placement="top" title="Delete"><i class="ri-delete-bin-line"></i></a>
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
