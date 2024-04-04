@extends('admin.admin_dashboard')

@section('admin')
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
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-2"></div>
        <div class="col-sm-8">
            <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between">
                    <div class="iq-header-title">
                        <h4 class="card-title">Features</h4>
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
                                <a class="btn btn-primary" href="{{route('features.add')}}" >
                                    Add Feature
                                    </a>
                                </div>
                            </div>
                        </div>
                        @if($get_data->isNotEmpty())
                        <table id="user-list-table" class="table table-striped table-borderless mt-4" role="grid" aria-describedby="user-list-page-info">
                            <thead>
                                <tr>
                                    <th>Sr No.</th>
                                    <th>Title</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($get_data as $key => $data)
                                <tr>
                                    <td>{{intval($key) + 1}}</td>
                                    <td>{{$data->title}}</td>
                                    <td>
                                        <div class="flex align-items-center list-user-action">
                                            <a class="iq-bg-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Show" href="{{ route('features.view',['id' => $data->id]) }}"><i class="ri-eye-line"></i></a>
                                            <a class="iq-bg-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit" href="{{route('features.update',['id' => $data->id])}}"><i class="ri-pencil-line"></i></a>
                                            <a class="iq-bg-primary delete-btn" href="#" id="{{$data->id}}" onclick="showModalAndChangeColor(this)" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"><i class="fa fa-trash"></i></a>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
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
<!-- -----------------Delete model popup------------------ -->
<!-- Delete Modal -->
<div id="id01" class="modal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Delete Feature</h3>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete this feature?</p>
            </div>
            <div class="modal-footer">
                <form action="{{route('features.delete')}}" method="post">
                    @csrf
                    <input type="hidden" name="id" id="delete-id" value="">
                    <button type="button" class="btn btn-secondary" onclick="document.getElementById('id01').style.display='none'"  data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    function showModalAndChangeColor(element) {
        // Show your modal (assuming 'id01' is your modal's ID)
        document.getElementById('id01').style.display = 'block';
        // Change background color
        document.getElementById('id01').style.background = 'black';
    }

    // Get the modal
    var modal = document.getElementById('id01');
    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
    if (event.target == modal) {
            modal.style.display = "none";
        }
    }

    $(document).ready(function() {
        $('.delete-btn').on('click', function(e){
            var id  = $(this).attr('id');
            console.log(id)
            $('#delete-id').val(id);
        });
    });

</script>
@endsection
