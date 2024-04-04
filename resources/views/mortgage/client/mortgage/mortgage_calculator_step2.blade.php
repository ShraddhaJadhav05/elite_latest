@extends("mortgage.client.layouts.app")
@section('page_content')
<div id="content-page" class="content-page">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="iq-card">
                    <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                            <h4 class="card-title">Mortgage Calculator</h4>
                        </div>
                    </div>
                    <div class="iq-card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <a class="calculator__select" href="{{route('mortgage.step3')}}">
                                    <div class="service-item">
                                        <h3>I'm Still Exploring</h3>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-6">
                                <a class="calculator__select" href="{{route('mortgage.step3')}}">
                                    <div class="service-item">
                                        <h3>I've Come Across A Property.</h3>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>  
        </div>
    </div>
</div>
@endsection