@extends("mortgage.client.layouts.app")
@section('page_content')
<div id="content-page" class="content-page">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="row">
                    <div class="col-lg-2 profile-left"></div>
                    <div class="col-lg-8 profile-center">
                        <div class="tab-content">
                            <div class="tab-pane fade active show" id="profile-profile" role="tabpanel">
                                <div class="iq-card">
                                    <div class="iq-card-header d-flex justify-content-between">
                                        <div class="iq-header-title">
                                            <h4 class="card-title">Ticket Details</h4>
                                        </div>
                                    </div>
                                    <div class="iq-card-body">
                                        <div class="row">
                                            <div class="col-md-4 col-4">
                                                <h6>Ticket No:</h6>
                                             </div>
                                            <div class="col-md-8 col-8">
                                                <p>{{$get_data->id}}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4 col-4">
                                                <h6>Title:</h6>
                                            </div>
                                            <div class="col-md-8 col-8">
                                                <p>{{$get_data->subject}}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4 col-4">
                                                <h6>Content:</h6>
                                            </div>
                                            <div class="col-md-8 col-8">
                                                <p>{{ $get_data->content }}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4 col-4">
                                                <h6>Date:</h6>
                                            </div>
                                            <div class="col-md-8 col-8">
                                                <p>{{ $get_data->created_at->format('d M ,Y') }}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4 col-4">
                                                <h6>Status</h6>
                                            </div>
                                            <div class="col-md-8 col-8">
                                                <p>
                                                    <!-- <span class="badge dark-icon-light iq-bg-primary">Active</span> -->
                                                    @if($get_data->status == 'Approved')
                                                    <span class="badge dark-icon-light iq-bg-primary">Approved</span>
                                                    @elseif($get_data->status == 'Completed')
                                                    <span class="badge iq-bg-success">Completed</span>
                                                    @elseif($get_data->status == 'Hold')
                                                    <span class="badge iq-bg-info">Hold</span>
                                                    @elseif($get_data->status == 'Verified')
                                                    <span class="badge iq-bg-success">Verified</span>
                                                    @elseif($get_data->status == 'Rejected')
                                                    <span class="badge iq-bg-danger">Rejected</span>
                                                    @elseif($get_data->status == 'Pending')
                                                    <span class="badge iq-bg-warning">Pending</span>
                                                    @endif
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                    <div class="col-lg-2 profile-right"></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection