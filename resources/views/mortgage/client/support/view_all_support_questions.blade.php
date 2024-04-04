@extends("mortgage.client.layouts.app")
@section('page_content')
<div id="content-page" class="content-page">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="iq-card">
                    <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                            <h4 class="card-title">Support Ticket</h4>
                        </div>
                    </div>
                    <div class="iq-card-body">
                        <div class="table-responsive">
                            <div class="row justify-content-between">
                                <div class="col-sm-12 col-md-6">
                                    <div id="user_list_datatable_info" class="dataTables_filter">
                                        <form class="mr-3 position-relative">
                                            <div class="form-group mb-0">
                                            <input type="search" class="form-control" id="exampleInputSearch" placeholder="Search" aria-controls="user-list-table">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6">
                                    <div class="user-list-files d-flex float-right">
                                        <a class="btn btn-primary" href="{{ route('help.support.add_support_tickets') }}" >
                                            Create Ticket
                                        </a>
                                    </div>
                                </div>
                            </div>
                            @if ($message = Session::get('success'))
                            <div class="alert alert-success alert-block">
                                <button type="button" class="close" data-dismiss="alert">×</button>    
                                <strong>{{ $message }}</strong>
                            </div>
                            @endif

                            @if ($message = Session::get('error'))
                            <div class="alert alert-danger alert-block">
                                <button type="button" class="close" data-dismiss="alert">×</button>    
                                <strong>{{ $message }}</strong>
                            </div>
                            @endif
                            @if($support_tikets->isNotEmpty())
                            <table id="user-list-table" class="table table-striped table-borderless mt-4" role="grid" aria-describedby="user-list-page-info">
                                <thead>
                                    <tr>
                                        <th>Ticket No</th>
                                        <th>Title</th>
                                        <th>Date</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="user-list-body">
                                    @foreach($support_tikets as $key => $data)
                                    <tr>
                                        <td>{{$data->id}}</td>
                                        <td>{{$data->subject}}</td>
                                        <td>{{ $data->created_at->format('d M ,Y') }}</td>
                                        <td>
                                            @if($data->status == 'Approved')
                                            <span class="badge dark-icon-light iq-bg-primary">Approved</span>
                                            @elseif($data->status == 'Completed')
                                            <span class="badge iq-bg-success">Completed</span>
                                            @elseif($data->status == 'Hold')
                                            <span class="badge iq-bg-info">Hold</span>
                                            @elseif($data->status == 'Verified')
                                            <span class="badge iq-bg-success">Verified</span>
                                            @elseif($data->status == 'Rejected')
                                            <span class="badge iq-bg-danger">Rejected</span>
                                            @elseif($data->status == 'Pending')
                                            <span class="badge iq-bg-warning">Pending</span>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="flex align-items-center list-user-action">
                                                <a class="iq-bg-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="View" href="{{ route('help.support.view_support_tickets',['id' => $data->id]) }}"><i class="ri-eye-line"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div style="text-align: center; display: none;" id="no-data-found">
                                No Data Found
                            </div>
                            @else
                            <div style="text-align: center;">
                                No Data Found
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        $('#exampleInputSearch').on('input', function () {
            var searchText = $(this).val();
            if (searchText.trim().length > 0) {
                $.ajax({
                    url: "{{ route('help.support.search_support_tickets') }}", 
                    type: 'GET',
                    data: { search: searchText },
                    success: function (response) {
                        if (response.length > 0) {
                            $('#user-list-body').empty();
                            $.each(response, function (index, data) {
                                var row = '<tr>' +
                                    '<td>' + data.id + '</td>' +
                                    '<td>' + data.subject + '</td>' +
                                    '<td>' + formatDate(data.created_at) + '</td>' +
                                    '<td>' + getStatusBadge(data.status) + '</td>' +
                                    '<td>' +
                                    '<div class="flex align-items-center list-user-action">' +
                                    '<a class="iq-bg-primary" data-toggle="tooltip" data-placement="top" title="View" href="' + getViewUrl(data.id) + '"><i class="ri-eye-line"></i></a>' +
                                    '</div>' +
                                    '</td>' +
                                    '</tr>';
                                $('#user-list-body').append(row);
                            });
                            $('#no-data-found').hide();
                        } else {
                            $('#user-list-body').empty();
                            $('#no-data-found').show();
                        }
                    }
                });
            } else {
                // If search input is empty, show all support tickets
                $.ajax({
                    url: "{{ route('help.support.get_support_tickets_all') }}",
                    type: 'GET',
                    success: function (response) {
                        $('#user-list-body').empty();
                        $.each(response, function (index, data) {
                            var row = '<tr>' +
                                '<td>' + data.id + '</td>' +
                                '<td>' + data.subject + '</td>' +
                                '<td>' + formatDate(data.created_at) + '</td>' +
                                '<td>' + getStatusBadge(data.status) + '</td>' +
                                '<td>' +
                                '<div class="flex align-items-center list-user-action">' +
                                '<a class="iq-bg-primary" data-toggle="tooltip" data-placement="top" title="View" href="' + getViewUrl(data.id) + '"><i class="ri-eye-line"></i></a>' +
                                '</div>' +
                                '</td>' +
                                '</tr>';
                            $('#user-list-body').append(row);
                        });
                        $('#no-data-found').hide();
                    }
                });
            }
        });
    });

    function getStatusBadge(status) {
        var badgeClass = '';
        switch (status) {
            case 'Approved':
                badgeClass = 'badge dark-icon-light iq-bg-primary';
                break;
            case 'Completed':
                badgeClass = 'badge iq-bg-success';
                break;
            case 'Hold':
                badgeClass = 'badge iq-bg-info';
                break;
            case 'Verified':
                badgeClass = 'badge iq-bg-success';
                break;
            case 'Rejected':
                badgeClass = 'badge iq-bg-danger';
                break;
            case 'Pending':
                badgeClass = 'badge iq-bg-warning';
                break;
            default:
                badgeClass = 'badge';
                break;
        }
        return '<span class="' + badgeClass + '">' + status + '</span>';
    }
    function getViewUrl(id) {
        return '{{ route("help.support.view_support_tickets", ["id" => ":id"]) }}'.replace(':id', id);
    }
</script>
<script>
    function formatDate(dateString) {
        var date = new Date(dateString);
        var options = { year: 'numeric', month: 'short', day: '2-digit' };
        return date.toLocaleDateString('en-US', options);
    }
</script>
@endsection