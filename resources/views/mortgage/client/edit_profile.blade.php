@extends("mortgage.client.layouts.app")
@section('page_content')
<div id="content-page" class="content-page">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="iq-card">
                    <div class="iq-card-body p-0">
                        <div class="iq-edit-list">
                            <ul class="iq-edit-profile d-flex nav nav-pills">
                                <li class="col-md-3 p-0">
                                    <a class="nav-link active" data-toggle="pill" href="#personal-information">
                                        Personal Information
                                    </a>
                                </li>
                                <li class="col-md-3 p-0">
                                    <a class="nav-link" data-toggle="pill" href="#chang-pwd">
                                        Change Password
                                    </a>
                                </li>
                                <li class="col-md-3 p-0">
                                    <a class="nav-link" data-toggle="pill" href="#emailandsms">
                                        Email and SMS
                                    </a>
                                </li>
                                <li class="col-md-3 p-0">
                                    <a class="nav-link" data-toggle="pill" href="#manage-contact">
                                        Manage Contact
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="iq-edit-list-data">
                    <div class="tab-content">
                        <div class="tab-pane fade active show" id="personal-information" role="tabpanel">
                            <div class="iq-card">
                                <div class="iq-card-header d-flex justify-content-between">
                                    <div class="iq-header-title">
                                        <h4 class="card-title">Personal Information</h4>
                                    </div>
                                </div>
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
                                    <form method="POST" action="{{route('account.profile.edit')}}"  enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group row align-items-center">
                                            <div class="col-md-12">
                                                <div class="profile-img-edit">
                                                    @if($user_data->profile_image)
                                                    <img class="profile-pic" src="{{ asset('mortgage/client/image_uploads/' . $user_data->profile_image) }}" alt="profile-pic">
                                                    @else
                                                    <img class="profile-pic" src="{{ asset('mortgage/client/images/user/blank.png') }}" alt="profile-pic">
                                                    @endif
                                                    <div class="p-image">
                                                        <i class="ri-pencil-line upload-button upload-button-1"></i>
                                                        <input class="file-upload" name="image_file" type="file" accept="image/*"/>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class=" row align-items-center">
                                            <div class="form-group col-sm-6">
                                                <label for="fname">First Name:</label>
                                                <input type="text" class="form-control" id="fname" name="first_name" value="{{$user_data->first_name}}" placeholder="First Name" required>
                                            </div>
                                            <div class="form-group col-sm-6">
                                                <label for="lname">Last Name:</label>
                                                <input type="text" class="form-control" id="lname" name="last_name" value="{{$user_data->last_name}}" placeholder="Last Name" required>
                                            </div>
                                            <div class="form-group col-sm-6">
                                                <label for="uname">User Name:</label>
                                                <input type="text" class="form-control" id="uname" name="user_name" value="{{$user_data->user_name}}" placeholder="User Name">
                                            </div>
                                            <div class="form-group col-sm-6">
                                                <label for="cname">City:</label>
                                                <input type="text" class="form-control" id="cname" name="city" value="{{$user_data->city}}" placeholder="City">
                                            </div>
                                            <div class="form-group col-sm-6">
                                                <label class="d-block">Gender:</label>
                                                <div class="custom-control custom-radio custom-control-inline">
                                                    <input type="radio" id="customRadio6" name="gender" class="custom-control-input" value="Male" @if($user_data->gender == 'Male' || (!$user_data->gender)) checked="" @endif>
                                                    <label class="custom-control-label" for="customRadio6"> Male </label>
                                                </div>
                                                <div class="custom-control custom-radio custom-control-inline">
                                                    <input type="radio" id="customRadio7" name="gender" class="custom-control-input" value="Female" @if($user_data->gender == 'Female') checked="" @endif>
                                                    <label class="custom-control-label" for="customRadio7"> Female </label>
                                                </div>
                                            </div>
                                            <div class="form-group col-sm-6">
                                                <label for="dob">Date Of Birth:</label>
                                                <input  type="date" class="form-control" id="dob" value="{{$user_data->birth_date}}" name="birth_date">
                                            </div>
                                            <div class="form-group col-sm-6">
                                                <label>Marital Status:</label>
                                                <select class="form-control" id="exampleFormControlSelect1" name="marital_status" required>
                                                    <option value="" disabled selected>Select Marital Status</option>
                                                    <option value="Single" @if($user_data->marital_status == 'Single') selected="" @endif >Single</option>
                                                    <option value="Married" @if($user_data->marital_status == 'Married') selected="" @endif>Married</option>
                                                    <option value="Widowed" @if($user_data->marital_status == 'Widowed') selected="" @endif>Widowed</option>
                                                    <option value="Divorced" @if($user_data->marital_status == 'Divorced') selected="" @endif>Divorced</option>
                                                    <option value="Separated" @if($user_data->marital_status == 'Separated') selected="" @endif>Separated </option>
                                                </select>
                                            </div>
                                            <div class="form-group col-sm-6">
                                                <label>Age:</label>
                                                <select class="form-control" id="exampleFormControlSelect2" name="age" required>
                                                    <option value="" disabled selected>Select Age</option>
                                                    <option value="12-18"  @if($user_data->age == '12-18') selected="" @endif>12-18</option>
                                                    <option value="19-32"  @if($user_data->age == '19-32') selected="" @endif>19-32</option>
                                                    <option value="33-45"  @if($user_data->age == '33-45') selected="" @endif>33-45</option>
                                                    <option value="46-62"  @if($user_data->age == '46-62') selected="" @endif>46-62</option>
                                                    <option value="63 >"  @if($user_data->age == '63 >') selected="" @endif>63 > </option>
                                                </select>
                                            </div>
                                            <div class="form-group col-sm-6">
                                                <label>Country:</label>
                                                <select class="form-control" id="exampleFormControlSelect3" name="country" required>
                                                    <option value="" disabled selected>Select Country</option>
                                                    <option value="Caneda"  @if($user_data->country == 'Caneda') selected="" @endif>Caneda</option>
                                                    <option value="Noida"  @if($user_data->country == 'Noida') selected="" @endif>Noida</option>
                                                    <option value="USA"  @if($user_data->country == 'USA') selected="" @endif>USA</option>
                                                    <option value="India"  @if($user_data->country == 'India') selected="" @endif>India</option>
                                                    <option value="Africa"  @if($user_data->country == 'Africa') selected="" @endif>Africa</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-sm-6">
                                                <label>Emirates:</label>
                                                <select class="form-control" id="exampleFormControlSelect4" name="emirates" required>
                                                    <option value="" disabled selected>Select emirates</option>
                                                    <option>California</option>
                                                    <option>Florida</option>
                                                    <option>Georgia</option>
                                                    <option>Connecticut</option>
                                                    <option>Louisiana</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-sm-12">
                                                <label>Address:</label>
                                                <input  class="form-control" placeholder="Address Line 1" name="address_line1" value="{{$user_data->address_line1}}" required>
                                                <input  class="form-control mt-2" placeholder="Address Line 2" name="address_line2" value="{{$user_data->address_line2}}" required>
                                                <!-- <textarea class="form-control" name="address" rows="5" style="line-height: 22px;">
                                                    37 Cardinal Lane
                                                    Petersburg, VA 23803
                                                    United States of America
                                                    Zip Code: 85001
                                                </textarea> -->
                                          </div>
                                       </div>
                                       <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                       <button type="reset" class="btn iq-bg-danger">Cancel</button>
                                    </form>
                                 </div>
                              </div>
                           </div>
                           <div class="tab-pane fade" id="chang-pwd" role="tabpanel">
                                <div class="iq-card">
                                    <div class="iq-card-header d-flex justify-content-between">
                                        <div class="iq-header-title">
                                            <h4 class="card-title">Change Password</h4>
                                        </div>
                                    </div>
                                    <div class="iq-card-body">
                                        @if ($message = Session::get('password_success'))
                                        <div class="alert alert-success alert-block">
                                            <button type="button" class="close" data-dismiss="alert">×</button>    
                                            <strong>{{ $message }}</strong>
                                        </div>
                                        @endif

                                        @if ($message = Session::get('password_error'))
                                        <div class="alert alert-danger alert-block">
                                            <button type="button" class="close" data-dismiss="alert">×</button>    
                                            <strong>{{ $message }}</strong>
                                        </div>
                                        @endif
                                        <form method="POST" action="{{route('account.profile.change.password')}}">
                                            @csrf
                                            <div class="form-group">
                                                <label for="cpass">Current Password:</label>
                                                <a href="{{ route('clientForgotPasswordSendEmail') }}" class="float-right">Forgot Password</a>
                                                <input type="Password" class="form-control" id="cpass" name="current_password" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="npass">New Password:</label>
                                                <input type="Password" class="form-control" id="npass" name="new_password" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="vpass">Verify Password:</label>
                                                    <input type="Password" class="form-control" id="vpass" name="verify_password" required>
                                            </div>
                                            <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                            <button type="reset" class="btn iq-bg-danger">Cancel</button>
                                        </form>
                                     </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="emailandsms" role="tabpanel">
                                <div class="iq-card">
                                    <div class="iq-card-header d-flex justify-content-between">
                                        <div class="iq-header-title">
                                            <h4 class="card-title">Email and SMS</h4>
                                        </div>
                                    </div>
                                    <div class="iq-card-body">
                                        @if ($message = Session::get('email_success'))
                                        <div class="alert alert-success alert-block">
                                            <button type="button" class="close" data-dismiss="alert">×</button>    
                                            <strong>{{ $message }}</strong>
                                        </div>
                                        @endif

                                        @if ($message = Session::get('email_error'))
                                        <div class="alert alert-danger alert-block">
                                            <button type="button" class="close" data-dismiss="alert">×</button>    
                                            <strong>{{ $message }}</strong>
                                        </div>
                                        @endif
                                        <form method="POST" action="{{route('account.profile.change.notofication')}}">
                                            @csrf
                                            <div class="form-group row align-items-center">
                                                <label class="col-md-3" for="emailnotification">Email Notification:</label>
                                                <div class="col-md-9 custom-control custom-switch">
                                                    <input type="checkbox" class="custom-control-input" id="emailnotification"  name="enable_email_notification" value="true" @if($user_data->enable_email_notification == true) checked="" @endif>
                                                    <label class="custom-control-label" for="emailnotification"></label>
                                                </div>
                                            </div>
                                            <div class="form-group row align-items-center">
                                                <label class="col-md-3" for="smsnotification">SMS Notification:</label>
                                                <div class="col-md-9 custom-control custom-switch">
                                                    <input type="checkbox" class="custom-control-input" id="smsnotification" name="enable_sms_notification" value="true" @if($user_data->enable_sms_notification == true) checked="" @endif>
                                                    <label class="custom-control-label" for="smsnotification"></label>
                                                </div>
                                            </div>
                                            <div class="form-group row align-items-center">
                                                <label class="col-md-3" for="npass">When To Email</label>
                                                <div class="col-md-9">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="email01" name="when_to_mail_notification" value="true" @if($user_data->when_to_mail_notification == true) checked="" @endif>
                                                        <label class="custom-control-label" for="email01">You have new notifications.</label>
                                                    </div>
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="email02" name="when_to_mail_direct_message" value="true" @if($user_data->when_to_mail_direct_message == true) checked="" @endif>
                                                        <label class="custom-control-label" for="email02">You're sent a direct message</label>
                                                    </div>
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="email03" name="when_to_mail_connection" value="true" @if($user_data->when_to_mail_connection == true) checked="" @endif>
                                                        <label class="custom-control-label" for="email03">Someone adds you as a connection</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row align-items-center">
                                                <label class="col-md-3" for="npass">When To Escalate Emails</label>
                                                <div class="col-md-9">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="email04" name="when_to_escalate_order" value="true" @if($user_data->when_to_escalate_order == true) checked="" @endif>
                                                        <label class="custom-control-label" for="email04"> Upon new order.</label>
                                                    </div>
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="email05" name="when_to_escalate_membership_approval" value="true" @if($user_data->when_to_escalate_membership_approval == true) checked="" @endif>
                                                        <label class="custom-control-label" for="email05"> New membership approval</label>
                                                    </div>
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="email06" name="when_to_escalate_member_registration" value="true" @if($user_data->when_to_escalate_member_registration == true) checked="" @endif>
                                                        <label class="custom-control-label" for="email06"> Member registration</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                            <button type="reset" class="btn iq-bg-danger">Cancel</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="manage-contact" role="tabpanel">
                                <div class="iq-card">
                                    <div class="iq-card-header d-flex justify-content-between">
                                        <div class="iq-header-title">
                                            <h4 class="card-title">Manage Contact</h4>
                                        </div>
                                    </div>
                                    <div class="iq-card-body">
                                        @if ($message = Session::get('contact_success'))
                                        <div class="alert alert-success alert-block">
                                            <button type="button" class="close" data-dismiss="alert">×</button>    
                                            <strong>{{ $message }}</strong>
                                        </div>
                                        @endif

                                        @if ($message = Session::get('contact_error'))
                                        <div class="alert alert-danger alert-block">
                                            <button type="button" class="close" data-dismiss="alert">×</button>    
                                            <strong>{{ $message }}</strong>
                                        </div>
                                        @endif
                                        <form method="POST" action="{{route('account.profile.manage.contact')}}">
                                            @csrf
                                            <div class="form-group">
                                                <label for="cno">Contact Number:</label>
                                                <input type="text" class="form-control" id="cno" name="phone_number" value="{{$user_data->phone_number}}" name="phone_number" placeholder="Contact Number" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="email">Email:</label>
                                                <input type="text" class="form-control" id="email" placeholder="Email"  value="{{$user_data->email}}" name="email" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="url">Url:</label>
                                                <input type="text" class="form-control" id="url" placeholder="Url"  value="{{$user_data->url}}" name="url">
                                            </div>
                                            <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                            <button type="reset" class="btn iq-bg-danger">Cancel</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        // Scroll to the form container after the page loads
        window.onload = function() {
            @if(session('tab') === 'chang-pwd')
                // Remove active and show classes from other tab panes
                document.querySelectorAll('.tab-pane.fade').forEach(function(tabPane) {
                    tabPane.classList.remove('active', 'show');
                });

                // Add active and show classes to the "chang-pwd" tab pane
                document.getElementById('chang-pwd').classList.add('active', 'show');

                // Remove active class from other navigation links
                document.querySelectorAll('.iq-edit-profile .nav-link.active').forEach(function(navLink) {
                    navLink.classList.remove('active');
                });

                // Add active class to the "Change Password" navigation link
                document.querySelector('.iq-edit-profile a[href="#chang-pwd"]').classList.add('active');
            
            @elseif(session('tab') === 'emailandsms')
                document.querySelectorAll('.tab-pane.fade').forEach(function(tabPane) {
                    tabPane.classList.remove('active', 'show');
                });

                document.getElementById('emailandsms').classList.add('active', 'show');

                document.querySelectorAll('.iq-edit-profile .nav-link.active').forEach(function(navLink) {
                    navLink.classList.remove('active');
                });

                document.querySelector('.iq-edit-profile a[href="#emailandsms"]').classList.add('active');

            @elseif(session('tab') === 'manage-contact')
                document.querySelectorAll('.tab-pane.fade').forEach(function(tabPane) {
                    tabPane.classList.remove('active', 'show');
                });

                document.getElementById('manage-contact').classList.add('active', 'show');

                document.querySelectorAll('.iq-edit-profile .nav-link.active').forEach(function(navLink) {
                    navLink.classList.remove('active');
                });

                document.querySelector('.iq-edit-profile a[href="#manage-contact"]').classList.add('active');
            @endif
        };
    </script>
@endsection
