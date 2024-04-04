@extends("frontend.layouts.app")

@section('page_content')

<div id="home" class="five-banner-area">

    <div class="d-table">

        <div class="d-table-cell">

            <div class="container">

                <div class="row align-items-center">

                    <div class="col-lg-6 banner_one">

                        <div class="main-banner-content">

                            <h1>Mortgages <br>tailored <br>to your needs</h1>

                            <ul class="confidence-home-btn finance_banner">

                                <li>

                                    <a href="{{route('mortgageProcess')}}" class="main-default-btn">Start your mortgage process</a>

                                </li>

                                <li>

                                    <a href="" class="video-btn popup-youtube"><i class="bx bx-play"></i> <span>How It Works</span></a>

                                </li>

                            </ul>

                        </div>

                    </div>

                    <div class="col-lg-6 banner_two">
                        @if($get_data)
                            @if($get_data->banner)
                                <img class="move-img" src="/image_uploads/{{$get_data->banner}}" alt="Shape">
                            @else
                                <img class="move-img" src="{{ asset('static/frontend/img/home-five/banner-main.png') }}" alt="Shape">
                            @endif
                        @else
                            <img class="move-img" src="{{ asset('static/frontend/img/home-five/banner-main.png') }}" alt="Shape">
                        @endif
                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

<div id="about" class="about-style-area with-black-color pt-100 pb-70">

    <div class="container">

        <div class="row align-items-center">

            <div class="col-lg-6 col-md-12">

                <div class="about-style-image-wrap">

                    <img class="img-width" src="{{ asset('static/frontend/img/about-elite.png') }}" alt="image">

                </div>

            </div>

            <div class="col-lg-6 col-md-12">

                <div class="about-style-wrap-content">

                    <h3>Your Supportive Partner in Every Journey</h3>

                    <p class="bold">Elite Capital is a premier service provider offering comprehensive finance services, including complete mortgage solutions (Home and Land Finance For Everyone/Hand-over/Buy out/ Equity/ Construction )</p>

                    <div class="about-list-tab">

                        <ul class="nav nav-tabs" id="myTab" role="tablist">

                            <li class="nav-item">

                                <a class="nav-link active" id="about-1-tab" data-bs-toggle="tab" href="#about-1" role="tab" aria-controls="about-1">Our Mission</a>

                            </li>

                            <li class="nav-item">

                                <a class="nav-link" id="about-2-tab" data-bs-toggle="tab" href="#about-2" role="tab" aria-controls="about-2">Our Vision </a>

                            </li>

                        </ul>

                        <div class="tab-content" id="myTabContent">

                            <div class="tab-pane fade show active" id="about-1" role="tabpanel">

                                <div class="content">

                                    <p>At Elite Capital Mortgage, our mission is to empower individuals on their home financing journey in the UAE. We are dedicated to providing expert advice and comprehensive support to those looking to purchase a self-use property or make strategic investments in the dynamic home finance market.</p>

                                    <ul class="list">

                                        <li><i class="bx bx-chevrons-right"></i> Respect for all people</li>

                                        <li><i class="bx bx-chevrons-right"></i> Excellence in everything we do</li>

                                        <li><i class="bx bx-chevrons-right"></i> Truthfulness in our business</li>

                                    </ul>

                                </div>

                            </div>

                            <div class="tab-pane fade" id="about-2" role="tabpanel">

                                <div class="content">

                                    <p>Our Vision is to provide guidance to individuals seeking to purchase a property for personal use or invest in the home finance in the UAE. We encapsulate our vision in realizing the dreams of both customers and investors."We assist you in achieving your dreams." Let's begin the journey to turn your dreams into reality.</p>

                                    <ul class="list">

                                        <li><i class="bx bx-chevrons-right"></i> Respect for all people</li>

                                        <li><i class="bx bx-chevrons-right"></i> Excellence in everything we do</li>

                                        <li><i class="bx bx-chevrons-right"></i> Truthfulness in our business</li>

                                    </ul>

                                </div>

                            </div>

                            <div class="tab-btn">

                                <ul class="quote-btn">

                                    <li class="button_list">

                                        <a  class="main-default-btn">Talk to an Expert</a>

                                    </li>

                                    <li class="button_list">

                                        <a href="#howWorks" class="how_wrk">How it Works</a>

                                    </li>

                                </ul>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <div class="container pt-100">

        <div class="row justify-content-center">

            <div class="col-lg-3 col-sm-6">

                <div class="information-card">

                    <div class="icon">

                        <i class="bx bx-time"></i>

                    </div>

                    <p>

                        <span>Mon-Fri (9am - 6pm)</span>

                        <span>Saturday,Sunday off</span>

                    </p>

                </div>

            </div>

            <div class="col-lg-3 col-sm-6">

                <div class="information-card">

                    <div class="icon">

                        <i class="bx bxs-contact"></i>

                    </div>

                    <p>

                        <span>Contact us</span>

                        <span><a href="mailto:info@elitecapital.ae"><span class="__cf_email__" >info@elitecapital.ae</span></a></span>

                    </p>

                </div>

            </div>

            <div class="col-lg-3 col-sm-6">

                <div class="information-card">

                    <div class="icon">

                        <i class="bx bx-phone-call"></i>

                    </div>

                    <p>

                        <span>(24 hours / 7 days)</span>

                        <span><a href="tel:050 456 6833">050 456 6833</a></span>

                    </p>

                </div>

            </div>

            <div class="col-lg-3 col-sm-6">

                <div class="information-card">

                    <div class="icon">

                        <i class="bx bx-world"></i>

                    </div>

                    <p>

                        <span>1721 Parklane Tower,</span>

                        <span>Business Bay, Dubai - UAE</span>

                    </p>

                </div>

            </div>

        </div>

    </div>

</div>

<div id="contact" class="let-contact-area with-main-color">

    <div class="container">

        <div class="row align-items-center">

            <div class="col-lg-4 col-md-12">

                <div class="get-quote-style-content">

                    <h3>Crafting Solutions for Every Home Buying Path</h3>

                    <ul class="quote-btn">

                        <h6 class="text-white">Whether you're making your first home purchase, exploring investments, or seeking a change, we're here to assist to yet every stage of your journey. Our dedication to excellence extends beyond transactions; it encompasses building lasting relationships with our clients.</h6>

                    </ul>

                </div>

            </div>

            <div class="col-lg-8 col-md-12">

                <div class="let-contact-form">
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

                    <h3>Schedule Date & Time</h3>
                    <h3>Book a free consultation</h3>

                    <form method="POST"  method="post" action="{{route('enquiry')}}">
                        @csrf

                        <div class="row m-0">

                            <div class="col-sm-6 col-lg-6">

                                <div class="form-group">

                                    <label>Name</label>

                                    <input type="text" name="name" id="name" class="form-control" required data-error="Please enter your name" placeholder="William">

                                    <div class="help-block with-errors"></div>

                                </div>

                            </div>

                            <div class="col-sm-6 col-lg-6">

                                <div class="form-group">

                                    <label>Email</label>

                                    <input type="email" name="email" id="email" class="form-control" required data-error="Please enter your email" placeholder="pento@gmail.com">

                                    <div class="help-block with-errors"></div>

                                </div>

                            </div>

                            <div class="col-sm-6 col-lg-6">

                                <div class="form-group">

                                    <label>Phone Number</label>

                                    <input type="text" name="phone" id="phone_number" required data-error="Please enter your number" class="form-control" placeholder="+971 987895564">

                                    <div class="help-block with-errors"></div>

                                </div>

                            </div>

                            <div class="col-sm-6 col-lg-6">

                                <div class="form-group">

                                    <label>Subject</label>

                                    <input type="text" name="subject" id="msg_subject" class="form-control" required data-error="Please enter your subject" placeholder="your subject">

                                    <div class="help-block with-errors"></div>

                                </div>

                            </div>

                            <div class="col-md-12 col-lg-12">

                                <div class="form-group">

                                    <label>Your Message</label>

                                    <textarea name="message" class="form-control" id="message" cols="30" rows="8" required data-error="Write your message" placeholder="write your message"></textarea>

                                    <div class="help-block with-errors"></div>

                                </div>

                            </div>

                            <div class="col-md-12 col-lg-12">

                                <div class="let-contact-btn">

                                    <button type="submit" class="main-default-btn">Send Message</button> 

                                </div>

                            </div>

                        </div>

                        <div id="msgconsultation" style="color: white;"></div>

                    </form>

                </div>

            </div>

        </div>

    </div>

    <div class="let-contact-shape">

        <img src="{{ asset('static/frontend/img/more-home/let-contact-shape.png') }}" alt="image">

    </div>

</div>

<div class="why-choose-us-area-without-bg pt-100 pb-70">

    <div class="container">

        <div class="main-section-title">

            <h2>We're a leader in home financing in the UAE. <br>Here's Why</h2>

        </div>

        <div class="row justify-content-center ">

            <div class="blog-style-slider owl-carousel owl-theme">

                <div class="why-choose-us-item">

                    <div class="choose-image">

                        <img src="{{ asset('static/frontend/img/more-home/choose/choose-4.png') }}" alt="image">

                    </div>

                    <div class="choose-content">

                        <h3 class="mb-2">All Key Banks in a Single, User-Friendly Hub</h3>

                        <p>Stremline your search & compare over 1300 offers effortlessly</p>

                    </div>

                </div>

                <div class="why-choose-us-item">

                    <div class="choose-image">

                        <img src="{{ asset('static/frontend/img/more-home/choose/choose-5.png') }}" alt="image">

                    </div>

                    <div class="choose-content">

                        <h3 class="mb-2">Our exclusive bank deals for you</h3>

                        <p>Access special offers & partner benefits not avialble elsewhere in the market</p>

                    </div>

                </div>

                <div class="why-choose-us-item">

                    <div class="choose-image">

                        <img src="{{ asset('static/frontend/img/more-home/choose/choose-6.png') }}" alt="image">

                    </div>

                    <div class="choose-content">

                        <h3 class="mb-2">Expert Support Every Step of the Way</h3>

                        <p>Our dedicated team provides expert guidance & addresses all your quires</p>

                    </div>

                </div>

                <div class="why-choose-us-item">

                    <div class="choose-image">

                        <img src="{{ asset('static/frontend/img/more-home/choose/choose-7.png') }}" alt="image">

                    </div>

                    <div class="choose-content">

                        <h3 class="mb-2">Transparent & Honest Services</h3>

                        <p>No hidden fees or charges - we ensure complete transparency</p> 

                    </div>

                </div>

                <div class="why-choose-us-item">

                    <div class="choose-image">

                        <img src="{{ asset('static/frontend/img/more-home/choose/choose-8.png') }}" alt="image">

                    </div>

                    <div class="choose-content">

                        <h3 class="mb-2">Quick & Online Pre- Approval Process</h3>

                        <p>Kickstart your motorage process with swift online pre-approval</p>

                    </div>

                </div>

                <div class="why-choose-us-item">

                    <div class="choose-image">

                        <img src="{{ asset('static/frontend/img/more-home/choose/choose-9.png') }}" alt="image">

                    </div>

                    <div class="choose-content">

                        <h3 class="mb-2">Transparent Traking of Your Applicatuon's Process</h3>

                        <p>Stay informed of your applicaton's process, ensuring a smooth experience</p>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

<div id="howWorks" class="process-style-area ptb-100">

    <div class="container">

        <div class="main-section-title">

            <!-- <span class="sub-title">Steps & Process</span> -->

            <h2>Upgrade with Elite Capital</h2>

        </div>

        <div class="row align-items-center">

            <div class="col-lg-6 col-md-12">

                <div class="process-style-accordion">

                    <div class="accordion" id="ProcessAccordion">

                        <div class="accordion-item">

                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">

                                <span>01</span> Initial Consultation and Needs Assessment

                            </button>

                            <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#ProcessAccordion">

                                <div class="accordion-body">

                                    <p class="bold">Start your journey to upgrade your home with Elite Capital by scheduling an initial consultation.</p>

                                    <p>Our experts will assess your needs, financial goals, and preferences to tailor a mortgage solution that aligns with your aspirations.</p>

                                </div>

                            </div>

                        </div>

                        <div class="accordion-item">

                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">

                                <span>02</span> Personalized Mortgage Planning

                            </button>

                            <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#ProcessAccordion">

                                <div class="accordion-body">

                                    <p>Benefit from our tailored approach to mortgage planning. Elite Capital's team will work closely with you to design a mortgage strategy that suits your financial capacity, offering competitive rates and terms to facilitate a seamless upgrade.</p>

                                </div>

                            </div>

                        </div>

                        <div class="accordion-item">

                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">

                                <span>03</span> Property Valuation and Mortgage Approval

                            </button>

                            <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#ProcessAccordion">

                                <div class="accordion-body">

                                    <p>After defining your mortgage plan, we conduct a thorough property valuation to ensure alignment with the approved mortgage amount. Our team manages the mortgage approval process, ensuring a swift and efficient path to securing your upgraded home.</p>

                                </div>

                            </div>

                        </div>

                        <div class="accordion-item">

                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">

                                <span>04</span> Negotiation and Documentation Management

                            </button>

                            <div id="collapseFour" class="accordion-collapse collapse" data-bs-parent="#ProcessAccordion">

                                <div class="accordion-body">

                                    <p class="bold">Elite Capital's experienced negotiators will work on your behalf to secure favorable terms with lenders.</p>

                                    <p>We assist in gathering and organizing all necessary documentation, streamlining the negotiation and application process for a hassle-free experience.</p>

                                </div>

                            </div>

                        </div>

                        <div class="accordion-item">

                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">

                                <span>05</span> Closing and Transition Support

                            </button>

                            <div id="collapseFive" class="accordion-collapse collapse" data-bs-parent="#ProcessAccordion">

                                <div class="accordion-body">

                                    <p class="bold">As you approach the final stages, Elite Capital guides you through the closing process, ensuring all legalities are handled seamlessly.</p>

                                    <p>Our support extends to the transition phase, making the upgrade to your new home a smooth and gratifying experience.</p>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

            <div class="col-lg-6 col-md-12">

                <div class="process-style-image">

                    <img src="{{ asset('static/frontend/img/step-process.png') }}" alt="image">

                </div>

            </div>

        </div>

    </div>

</div>

<div class="testimonials-gradient-shape">

    <img src="{{ asset('static/frontend/img/more-home/testimonials/shape.png') }}" alt="image">

</div>

</div>

<div class="get-quote-style-area">

    <div class="container">

        <div class="row align-items-center">

            <div class="col-lg-6 col-md-6">

                <div class="get-quote-style-content">

                    <h3>We enjoy working with numbers</h3>

                    <ul class="quote-btn">

                        <li>

                            <a href="{{route('mortgageCalculator')}}" class="main-default-btn">Mortgage calculator</a>

                        </li>

                    </ul>

                </div>

            </div>

            <div class="col-lg-6 col-md-6">

                <div class="get-quote-style-image">

                    <img src="{{ asset('static/frontend/img/we-enjoy.png') }}" alt="image">

                </div>

            </div>

        </div>

    </div>

</div>

<div id="blog" class="blog-style-area pt-100 ">

    <div class="container">

        <div class="main-section-title">

            <!-- <span class="sub-title">Our Partners</span> -->

            <h2>We Collaborate with Reputed People</h2>

        </div>

        <div class="blog-style-slider1  owl-carousel owl-theme">

            <div class="blog-style-card">

                <img src="{{ asset('static/frontend/img/partners/partner1.png') }}">

            </div>

            <div class="blog-style-card">

                <img src="{{ asset('static/frontend/img/partners/partner2.png') }}">

            </div>

            <div class="blog-style-card">

                <img src="{{ asset('static/frontend/img/partners/partner3.png') }}">

            </div>

            <div class="blog-style-card">

                <img src="{{ asset('static/frontend/img/partners/partner4.png') }}">

            </div>

            <div class="blog-style-card">

                <img src="{{ asset('static/frontend/img/partners/partner5.png') }}">

            </div>

            <div class="blog-style-card">

                <img src="{{ asset('static/frontend/img/partners/partner6.png') }}">

            </div>

        </div>

    </div>

</div>

<div id="blog" class="blog-style-area pt-100 pb-100">

    <div class="container">

        <div class="main-section-title">

            <h2>How We Maximize Value for You</h2>

        </div>

        <div class="blog-style-slider owl-carousel owl-theme">
            @foreach($blogs as $blog)
            <div class="blog-style-card">

                <div class="tag">{{ $blog['image_text'] }}</div>

                <ul class="post-meta">

                    <li>

                    </li>

                    <li>

                        <i class="bx bxs-calendar"></i>{{ $blog['date'] }}

                    </li>

                </ul>

                <h3>

                    <a href="{{route('newsIndividualData', ['id' => $blog['id'],'title' => $blog['slug_title']])}}">{{$blog['title']}}</a>

                </h3>

                <p>{!! $blog['short_description'] !!}</p>

            </div>
            @endforeach

        </div>

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