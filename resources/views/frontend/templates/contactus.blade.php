@extends("frontend.layouts.app")

@section('page_content')

<div id="home" class="confidence-home-area five-banner-here">

    <div class="container-fluid">

        <div class="row align-items-center">

            <div class="col-lg-12 col-md-12">

                <div class="confidence-home-content text-center">

                    <h1>Contact Us</h1>

                    <nav class="text-center">

                        <ol class="breadcrumb">

                            <li class="breadcrumb-item"><a href="{{route('homePage')}}">Home</a></li>

                            <li class="breadcrumb-item active">Contact Us</li>

                        </ol>

                    </nav>

                </div>

            </div>

        </div>

    </div>

</div>

<div id="contact" class="pt-100 pb-100">

    <div class="container">

        <div class="row">

            <div class="col-lg-6 col-md-12">

                <div class="let-contact-form with-main-color cnt_bck">

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

                    <h3>Contact With Us</h3>

                    <form method="POST"  method="post" action="{{route('enquiry')}}">
                        @csrf

                        <div class="row m-0">

                            <div class="col-sm-6 col-lg-6">

                                <div class="form-group">

                                    <label for="name">Name</label>

                                    <input type="text" name="name" id="name" class="form-control" required data-error="Please enter your name" placeholder="William">

                                    <div class="help-block with-errors"></div>

                                </div>

                            </div>

                            <div class="col-sm-6 col-lg-6">

                                <div class="form-group">

                                    <label for="email">Email</label>

                                    <input type="email" name="email" id="email" class="form-control" required data-error="Please enter a valid email address" placeholder="pento@gmail.com">

                                    <div class="help-block with-errors"></div>

                                </div>

                            </div>

                            <div class="col-sm-6 col-lg-6">

                                <div class="form-group">

                                    <label for="phone_number">Phone Number</label>

                                    <input type="number" name="phone" id="phone_number" required data-error="Please enter a valid phone number" class="form-control" placeholder="+971 25654525">

                                    <div class="help-block with-errors"></div>

                                </div>

                            </div>

                            <div class="col-sm-6 col-lg-6">

                                <div class="form-group">

                                    <label for="msg_subject">Subject</label>

                                    <input type="text" name="subject" id="msg_subject" class="form-control" required data-error="Please enter your subject" placeholder="Your subject">

                                    <div class="help-block with-errors"></div>

                                </div>

                            </div>

                            <div class="col-md-12 col-lg-12">

                                <div class="form-group">

                                    <label for="message">Your Message</label>

                                    <textarea name="message" class="form-control" id="message" cols="30" rows="8" required data-error="Write your message" placeholder="Write your message"></textarea>

                                    <div class="help-block with-errors"></div>

                                </div>

                            </div>

                            <div class="col-md-12 col-lg-12">

                                <div class="let-contact-btn">

                                    <button class="main-default-btn cnt_btn" type="submit">Send Message</button>     

                                </div>

                                <div id="ContactsuccessMessage" style="color: white;"></div>

                            </div>

                        </div>

                    </form>

                </div>

            </div>

            <div class="col-lg-6 col-md-12">

                <div class="col-sm-12 col-lg-12">

                    <div class="row cnt_time">

                        <div class="hour-item">   

                            <i class="bx bxs-time"></i>

                            <div class="hour-inner">

                                <h3>Opening Time</h3>

                                <span>{{$get_data->opening_time}}</span><br>

                                <span>{{$get_data->opening_days}}</span>

                            </div>

                        </div>

                    </div>

                </div>

                <div class="col-sm-12 col-lg-12">

                    <div class="row cnt_time">

                        <div class="hour-item">

                            <i class="bx bx-current-location"></i>

                            <div class="hour-inner">

                                <h3>Address</h3>

                                {{$get_data->address}}

                            </div>

                        </div>

                    </div>

                </div>

                <div class="col-sm-12 col-lg-12">

                    <div class="row cnt_time">

                        <div class="col-md-6">

                            <div class="hour-item">

                                <i class="bx bxs-phone-call"></i>

                                <div class="hour-inner">

                                    <h3>Call Us:</h3>

                                    <a href="tel:{{$get_data->phone}}">{{$get_data->phone}}</a>

                                </div>

                            </div>

                        </div>

                        <div class="col-md-6">

                            <div class="hour-item">

                                <i class="bx bxl-whatsapp"></i>

                                <div class="hour-inner">

                                    <h3>Whatsapp:</h3>

                                    <a href="tel:{{$get_data->whatsapp}}">{{$get_data->whatsapp}}</a>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

                <div class="col-sm-12 col-lg-12">

                    <div class="row cnt_time">

                        <div class="hour-item">

                            <i class="bx bx-message-detail"></i>

                            <div class="hour-inner">

                                <h3>Contact Us</h3>

                                <a href="mailto:{{$get_data->email}}"><span class="__cf_email__" >{{$get_data->email}}</span></a>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <div class="let-contact-shape">

        <img src="{{ asset('static/frontend/img/more-home/let-contact-shape.png') }}" alt="image">

    </div>

</div>

<div class="four-map-area">

    <div class="container-fluid p-0">

        <iframe id="map" src="{{$get_data->location}}"  allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

    </div>

</div>

@endsection