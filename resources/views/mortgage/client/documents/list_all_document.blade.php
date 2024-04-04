@extends("mortgage.client.layouts.app")
@section('page_content')
<div id="content-page" class="content-page">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-2"></div>
            <div class="col-sm-8">
                <div class="iq-card">
                    <ul class="iq-edit-profile d-flex nav nav-pills">
                        <li class="col-md-6 p-0">
                            <a class="nav-link active" data-toggle="pill" href="#personal-information">
                            Loan Document
                            </a>
                        </li>
                        <li class="col-md-6 p-0">
                            <a class="nav-link" data-toggle="pill" href="#chang-pwd">
                            My Document
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="iq-card">
                    <div class="tab-content">
                        <div class="tab-pane fade active show" id="personal-information" role="tabpanel">
                            <div class="iq-card-header justify-content-between">
                                <div class="iq-header-title text-center document_upload mt-4 mb-5">
                                    <h4 class="card-title">Manage Your Documents</h4>
                                    <a class="btn btn-primary mt-3" href="{{ route('document.add' ,['type' => 'loan']) }}">Upload New Document</a>
                                </div>
                           </div>
                           <hr>
                           <div class="iq-card-body">
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
                                @if($loan_documents->isNotEmpty())
                                <table id="user-list-table" class="table table-borderless mt-3" role="grid" aria-describedby="user-list-page-info">
                                    <thead>
                                        <tr>
                                            <th>Documents</th>
                                            <th>Uploaded Date</th>
                                            <th>Shown To Agent</th>
                                            <th>Status</th>
                                            <th class="text-right">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($loan_documents as $key => $data)
                                        <tr>
                                            <td>{{$data->document_name}}</td>
                                            <td>{{ $data->created_at->format('d M ,Y') }}</td>
                                            <td>
                                                @if($data->shown_to_agent == true)
                                                    Yes
                                                @else
                                                    No
                                                @endif
                                            </td>
                                            <td>
                                                @if($data->status == 'Verified')
                                                <span class="badge iq-bg-success">Verified</span>
                                                @elseif($data->status == 'Rejected')
                                                <span class="badge iq-bg-danger">Rejected</span>
                                                @elseif($data->status == 'Pending')
                                                <span class="badge iq-bg-warning">Pending</span>
                                                @endif
                                            </td>
                                            <td class="text-right">
                                                <div class="flex align-items-center list-user-action">
                                                    <a class="iq-bg-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit" href="{{route('document.view' , ['id' => $data->id,'type' => 'loan'] )}}"><i class="ri-eye-line"></i></a>
                                                    <a class="iq-bg-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit" href="{{route('document.edit' , ['id' => $data->id,'type' => 'loan'] )}}"><i class="ri-pencil-line"></i></a>
                                                    <a class="iq-bg-primary delete-btn" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete" href="#" data-id="{{$data->id}}" onclick="showModalAndChangeColor(this)"><i class="ri-delete-bin-line"></i></a>
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
                        <div class="tab-pane fade" id="chang-pwd" role="tabpanel">
                            <div class="iq-card-header justify-content-between">
                                <div class="iq-header-title text-center document_upload mt-4 mb-5">
                                    <h4 class="card-title">Manage Your Documents</h4>
                                    <a class="btn btn-primary mt-3" href="{{ route('document.add') }}">Upload New Document</a>
                                </div>
                            </div>
                           <hr>
                           <div class="iq-card-body">
                                @if($get_data->isNotEmpty())
                                <table id="user-list-table" class="table table-borderless mt-3" role="grid" aria-describedby="user-list-page-info">
                                    <thead>
                                        <tr>
                                            <th>Documents</th>
                                            <th>Uploaded Date</th>
                                            <th>Loan Application</th>
                                            <th class="text-right">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($get_data as $key => $data)
                                        <tr>
                                            <td>{{$data->document_name}}</td>
                                            <td>{{ $data->created_at->format('d M ,Y') }}</td>
                                            <td>
                                                @if($data->is_loan_document == true)
                                                    Yes
                                                @else
                                                    No
                                                @endif
                                            </td>
                                            <td class="text-right">
                                                <div class="flex align-items-center list-user-action">
                                                    <a class="iq-bg-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit" href="{{route('document.view' , ['id' => $data->id] )}}"><i class="ri-eye-line"></i></a>
                                                    <a class="iq-bg-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit" href="{{route('document.edit' , ['id' => $data->id] )}}"><i class="ri-pencil-line"></i></a>
                                                    <a class="iq-bg-primary delete-btn" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete" href="#" data-id="{{$data->id}}" onclick="showModalAndChangeColor(this)"><i class="ri-delete-bin-line"></i></a>
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
                <div class="col-sm-2"></div>
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
                <h3 class="modal-title">Delete Document</h3>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete this document?</p>
            </div>
            <div class="modal-footer">
                <form action="{{route('document.delete')}}" method="post">
                    @csrf
                    <input type="hidden" name="id" id="delete-id" value="">
                    <button type="button" class="btn cancel_btn" onclick="document.getElementById('id01').style.display='none'"  data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
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
            var id  = $(this).attr('data-id');
            console.log(id)
            $('#delete-id').val(id);
        });
    });

</script>
@endsection