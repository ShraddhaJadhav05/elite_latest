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
                                            <h4 class="card-title">Profile</h4>
                                        </div>
                                        <a href="{{ route('account.profile.edit') }}"><i class="ri-pencil-line edit_size"></i></a>
                                    </div>
                                    <div class="iq-card-body">
                                        <div class="user-detail text-center">
                                            <div class="user-profile">
                                                @if($user_data->profile_image)
                                                <img src="{{ asset('mortgage/client/image_uploads/' . $user_data->profile_image) }}" alt="profile-img" class="avatar-130 img-fluid user__profile">
                                                @else
                                                <img src="{{ asset('mortgage/client/images/user/blank.png') }}" alt="profile-img" class="avatar-130 img-fluid user__profile">
                                                @endif
                                            </div>
                                            <div class="profile-detail mt-3">
                                                <h3 class="d-inline-block">{{$user_data->first_name}} {{$user_data->last_name}}</h3>        
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="iq-card">
                                    <div class="iq-card-header d-flex justify-content-between">
                                        <div class="iq-header-title">
                                            <h4 class="card-title">User Details</h4>
                                        </div>
                                    </div>
                                    <div class="iq-card-body">
                                        <div class="mt-2">
                                            <h6>Joined:</h6>
                                            <p>{{$user_data->created_at->format('F d, Y')}}</p>
                                        </div>
                                        <div class="mt-2">
                                            <h6>Address:</h6>
                                            @if($user_data->address_line1)
                                            <p>{{$user_data->address_line1}}</p>
                                            <p>{{$user_data->address_line2}}</p>
                                            @else
                                            <p>Not Found</p>
                                            @endif
                                        </div>
                                        <div class="mt-2">
                                            <h6>Email:</h6>
                                            <p><a href="mailto:{{$user_data->email}}"> {{$user_data->email}}</a></p>
                                        </div>
                                        <div class="mt-2">
                                            <h6>Contact:</h6>
                                            @if($user_data->phone_number)
                                            <p><a href="tel:{{$user_data->phone_number}}">{{$user_data->phone_number}}</a></p>
                                            @else
                                            <p>Not Found</p>
                                            @endif
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