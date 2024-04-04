@extends('staff.staff_dashboard')

@section('staff')

<div class="container-fluid">
    <div class="row">
    <div class="col-sm-12">
            <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between">
                <div class="iq-header-title">
                    <h4 class="card-title">Documents</h4>
                </div>
                </div>
                <div class="iq-card-body">
                <div class="table-responsive">
                    <div class="row justify-content-between">
                        <div class="col-sm-12 col-md-2">
                            <div id="user_list_datatable_info" class="dataTables_filter">
                            <!--<form class="position-relative">-->
                            <!--    <div class="form-group">-->
                            <!--        <input type="search" class="form-control" id="exampleInputSearch" placeholder="Search" aria-controls="user-list-table">-->
                            <!--    </div>-->
                            <!--</form>-->
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-2"></div>
                        <div class="col-sm-12 col-md-2">
                        <form action="{{ route('show.documments') }}" method="GET">
                        <div class="form-group">
                            
                            <select class="form-control filter_select select_name" name="document_name">
                                <option selected="" disabled="">Select Type</option>
                                @foreach($client_document as $client_documents)
                                <option value="{{$client_documents->document_name}}">{{$client_documents->document_name}}</option>
                                @endforeach

                            </select>
                            </div>

                        </div>
                        <div class="col-sm-12 col-md-2">
                            <div class="form-group select_namemain">
                            <select class="form-control filter_select select_name" name="client_id">
                                <option selected="" disabled="">Select Name</option>
                                @foreach($client as $clients)
                                <option value="{{$clients->id}}">{{$clients->first_name}}</option>
                                @endforeach

                            </select>
                            </div>
                        </div>
                        <!-- <div class="col-sm-12 col-md-2">
                        <div class="form-group">
                            <input type="text" class="form-control"  placeholder="Email">
                            </div>
                        </div> -->
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
                            <th>Icon</th>
                            <th>Client Name</th>
                            <th>Document Name</th>
                            <th>Client Email</th>
                            <th>Action</th>
                            <th>Status</th>
                            
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($client_document as $client_documents)
                            <tr>
                            <td><i class="document_icons ri-image-line"></i></td>
                            <td> 
                                @foreach($client as $clients)
                                    @if($clients->id == $client_documents->client_id)
                                        {{$clients->first_name}}
                                    @endif
                                @endforeach
                            </td>
                            <td>{{$client_documents->document_name}}</td>
                            <td>
                                @foreach($client as $clients)
                                    @if($clients->id == $client_documents->client_id)
                                        {{$clients->email}}
                                    @endif
                                @endforeach
                            </td>
                            
                            <td>
                                <div class="flex align-items-center list-user-action">
                                    <a class="iq-bg-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Add" href="#"><i class="ri-eye-line"></i></a>
                                    <a class="iq-bg-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete" href="{{route('delete.documents',$client_documents->id)}}"><i class="ri-delete-bin-line"></i></a>
                                </div>
                            </td>
                            <td class="text-right">
                                    @if($client_documents->document_status == 'varified')
                                        <i class="fa fa-check verified"></i>
                                       @elseif($client_documents->document_status == 'rejected')
                                       <i class="fa fa-close rejected"></i>
                                       @else
                                       <a href="{{route('documments.verfication',$client_documents->id)}}" class="verify_btn">Verify</a>
                                       @endif
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

@endsection