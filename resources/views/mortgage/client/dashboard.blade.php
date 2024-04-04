@extends("mortgage.client.layouts.app")
@section('page_content')
<div id="content-page" class="content-page">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6 col-md-6 col-lg-6">
                <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                    <div class="iq-card-body">
                        <div class="d-flex align-items-center justify-content-between text-right">
                            <div class="icon iq-icon-box rounded-circle dark-icon bg-primary">
                                <i class="ri-inbox-line"></i>
                            </div>
                            <div>
                                <h5 class="mb-1 font-size-12">You have two unread messgaes</h5>
                                <a href="inbox.html" class="btn btn-secondary dashboard_btn">View Messages</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-6">
                <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                    <div class="iq-card-body">
                        <div class="d-flex align-items-center justify-content-between text-right">
                            <div class="icon iq-icon-box rounded-circle dark-icon bg-primary">
                                <i class="ri-notification-line"></i>
                            </div>
                            <div>
                                <h5 class="mb-1 font-size-12">You have 10 unread notifications</h5>
                                <a href="notification.html" class="btn btn-secondary dashboard_btn">View Notification</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                    <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                            <h4 class="card-title">Applied Loans</h4>
                        </div>
                        <a href="" class="btn btn-primary dashboard_btn">View All</a>  
                    </div>
                    <div class="iq-card-body">
                        <div class="table-responsive">
                            <table class="table mb-0 table-borderless">
                                <thead>
                                    <tr>
                                    <th scope="col">Id</th>
                                    <th scope="col">Product</th>
                                    <th scope="col">Start Date</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Progress</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                    <td>#1234</td>
                                    
                                    <td>Home Finance</td>
                                    
                                    <td>16/01/2020</td>
                                    <td>
                                        <div class="badge badge-pill badge-success">Approved</div>
                                    </td>
                                    <td>
                                        <div class="iq-progress-bar">
                                            <span class="bg-success" data-percent="90" style="transition: width 2s ease 0s; width: 90%;"></span>
                                        </div>
                                    </td>
                                    </tr>
                                    <tr>
                                    <td>#1234</td>
                                    
                                    <td>Business Loan</td>
                                    
                                    <td>16/01/2020</td>
                                    <td>
                                        <div class="badge badge-pill badge-danger">Rejected</div>
                                    </td>
                                    <td>
                                        <div class="iq-progress-bar">
                                            <span class="bg-danger" data-percent="48" style="transition: width 2s ease 0s; width: 48%;"></span>
                                        </div>
                                    </td>
                                    </tr>
                                    <tr>
                                    <td>#1234</td>
                                    
                                    <td>Business Loan</td>
                                    
                                    <td>16/01/2020</td>
                                    <td>
                                        <div class="badge badge-pill badge-info">Processing</div>
                                    </td>
                                    <td>
                                        <div class="iq-progress-bar">
                                            <span class="bg-info" data-percent="90" style="transition: width 2s ease 0s; width: 90%;"></span>
                                        </div>
                                    </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8 col-md-6">
                <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                    <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                            <h4 class="card-title">Recommended To Me</h4>
                        </div>
                        <a href="application.html" class="btn btn-primary dashboard_btn">View All</a>
                    </div>
                    <div class="iq-card-body">
                        <ul class="list-inline p-0 m-0">
                            <li class="d-flex mb-3 align-items-center p-3 sell-list border-primary rounded">
                                <div class="user-img img-fluid">
                                    <img src="{{ asset('mortgage/client/images/elite-images/partners/partner1.png') }}" alt="story-img" class="img-fluid recommended_bank">
                                </div>
                                <div class="media-support-info ml-3">
                                    <h6>ADIB Bank</h6>
                                
                                </div>
                                <div class="iq-card-header-toolbar d-flex align-items-center">
                                    <div class="font-size-20"><p class="mb-0 font-size-12">Interest Rate</p><h6>10% </h6> </div>
                                </div>
                            </li>
                            <li class="d-flex mb-3 align-items-center p-3 sell-list border-primary rounded">
                                <div class="user-img img-fluid">
                                    <img src="{{ asset('mortgage/client/images/elite-images/partners/partner2.png') }}" alt="story-img" class="img-fluid  recommended_bank">
                                </div>
                                <div class="media-support-info ml-3">
                                    <h6>United Arab Bank</h6>
                                
                                </div>
                                <div class="iq-card-header-toolbar d-flex align-items-center">
                                    <div class="font-size-20"><p class="mb-0 font-size-12">Interest Rate</p><h6>10% </h6> </div>
                                </div>
                            </li>
                            <li class="d-flex mb-3 align-items-center p-3 sell-list border-primary rounded">
                                <div class="user-img img-fluid">
                                    <img src="{{ asset('mortgage/client/images/elite-images/partners/partner3.png') }}" alt="story-img" class="img-fluid recommended_bank">
                                </div>
                                <div class="media-support-info ml-3">
                                    <h6>Dubai Islamic Bank</h6>
                                
                                </div>
                                <div class="iq-card-header-toolbar d-flex align-items-center">
                                    <div class="font-size-20"><p class="mb-0 font-size-12">Interest Rate</p><h6>10% </h6> </div>
                                </div>
                            </li>
                            <li class="d-flex mb-3 align-items-center p-3 sell-list border-primary rounded">
                                <div class="user-img img-fluid">
                                    <img src="{{ asset('mortgage/client/images/elite-images/partners/partner4.png') }}" alt="story-img" class="img-fluid  recommended_bank">
                                </div>
                                <div class="media-support-info ml-3">
                                    <h6>Commercial Bank Of Dubai</h6>
                                
                                </div>
                                <div class="iq-card-header-toolbar d-flex align-items-center">
                                    <div class="font-size-20"><p class="mb-0 font-size-12">Interest Rate</p><h6>10% </h6> </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-4">
                <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                    <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                            <h4 class="card-title">Total Progress</h4>
                        </div>
                    </div>
                    <div class="iq-card-body">
                        <div id="progress-chart-3"></div>
                        <div class="d-flex align-items-center justify-content-between mt-3 text-center">
                            <div class="title position-relative">
                                <h5>Total</h5>
                                <p class="mb-0">75%</p>
                            </div>
                            <div class="title">
                                <h5>Panding</h5>
                                <p class="mb-0">70%</p>
                            </div>
                            <div class="title">
                                <h5>Success</h5>
                                <p class="mb-0">72%</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection