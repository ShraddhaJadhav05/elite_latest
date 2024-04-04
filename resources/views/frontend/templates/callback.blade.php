@extends("frontend.layouts.app")
@section('page_content')
<div id="home" class="confidence-home-area five-banner-here">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-lg-12 col-md-12">
                <div class="confidence-home-content text-center">
                    <h1>Get A Call Back</h1>
                    <nav class="text-center">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('homePage')}}">Home</a></li>
                            <li class="breadcrumb-item active">Get A Call Back</li>
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
            <div class="col-lg-3 col-md-12"></div>
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
                                    <input type="number" name="phone" id="phone_number" required data-error="Please enter a valid phone number" class="form-control" placeholder="+971 987895564">
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
                                    <button class="main-default-btn cnt_btn" type="submit">Get a Call Back</button>
                                    <div id="callbacksuccessMessage" style="color: white;"></div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-3 col-md-12"></div>
        </div>
    </div>
    <div class="let-contact-shape">
        <img src="{{ asset('static/frontend/img/more-home/let-contact-shape.png') }}" alt="image">
    </div>
</div>
<div class="faq-style-area-with-full-width with-black-color ptb-100">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-12">
                <div class="faq-style-image">
                    <img src="{{ asset('static/frontend/img/faq-3.png') }}" alt="image">
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="faq-style-accordion">
                    <h3>Seeking Assistances? Find Answers in our Popular FAQs</h3>
                    <div class="accordion" id="FaqAccordion">
                        <div class="accordion-item">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                What's the Maximum Loan Amount for Home Purchase?
                            </button>
                            <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#FaqAccordion">
                                <div class="accordion-body">
                                    <p>In the UAE, residents can qualify for loans up to eight times their annual income, while expatriates have the option to secure loans up to seven times their annual income."</p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                What's the Required Down Payment?
                            </button>
                            <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#FaqAccordion">
                                <div class="accordion-body">
                                    <p>In the UAE, citizens can take advantage of a favorable option with a 15% down payment, while expatriates have the opportunity to make a 20% down payment."</p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                Are down payment assistance programs available?
                            </button>
                            <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#FaqAccordion">
                                <div class="accordion-body">
                                    <p>Absolutely, we provide outstanding assistance programs for your down payment."</p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                What APR will I get with a 700 credit score ? 
                            </button>
                            <div id="collapseFour" class="accordion-collapse collapse" data-bs-parent="#FaqAccordion">
                                <div class="accordion-body">
                                    <p>The Annual Percentage Rate (APR) you receive with a 700 credit score can vary among different banks and financial institutions, as they often operate with various rate slabs.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection