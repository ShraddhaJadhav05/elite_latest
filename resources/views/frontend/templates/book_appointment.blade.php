@extends("frontend.layouts.app")

@section('page_content')
<div id="home" class="confidence-home-area five-banner-here">
    <div class="container-fluid">
        <div class="row align-items-center">

            <div class="col-lg-12 col-md-12">

                <div class="confidence-home-content text-center">

                    <h1>You are marking appointment</h1>

                    <span>Date: {{$date}}</span>  <span>Time: {{$time_slot}}</span>

                </div>

            </div>

        </div>

    </div>

</div>

<div id="contact" class="pt-100 pb-100">

    <div class="container">

        <div class="row">
           
            <div class="col-lg-3 col-md-12"></div>
            <div class="col-lg-6 col-md-12">

                <div class="let-contact-form with-main-color process_mg">
                    <h3>Fill Your Information</h3>
                    <form method="post" action="{{route('bookAppointment')}}" onsubmit="">
                        @csrf
                        <input type="hidden" name="date" value="{{$date}}">
                        <input type="hidden" name="time_slot" value="{{$time_slot}}">
                        <div class="row m-0">
                            <div class="col-sm-12 col-lg-12">
                                <div class="form-group">
                                    <label for="name">Full Name</label>
                                    <input type="text" name="name" id="name" class="form-control" required="" data-error="Please enter your name" placeholder="William">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-lg-12">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" id="email" class="form-control" required="" data-error="Please enter a valid email address" placeholder="demo@gmail.com">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-lg-12">
                                <div class="form-group">
                                    <label for="phone_number">Phone Number</label>
                                    <input class="logincountryselection form-control" id="phone" name="phone" type="tel" placeholder="Phone no">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-lg-12">
                                <div class="form-group">
                                    <label for="name">Company</label>
                                    <input type="text" name="company" id="name" class="form-control" required="" data-error="Please enter your company name" placeholder="">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-md-12 col-lg-12">

                                <div class="form-group">

                                    <label for="message">Your Message</label>

                                    <textarea name="message" class="form-control" id="message" cols="30" rows="8" required="" data-error="Write your message" placeholder="Write your message"></textarea>

                                    <div class="help-block with-errors"></div>

                                </div>

                            </div>
                            <div class="col-md-12 col-lg-12">
                                <div class="let-contact-btn">
                                    <button class="main-default-btn cnt_btn" type="submit">Submit</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-lg-3 col-md-12"></div>
            </div>
        </div>
    </div>
</div>
@endsection