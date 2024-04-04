@extends("frontend.layouts.app")

@section('page_content')

<div id="home" class="confidence-home-area five-banner-here">

    <div class="container-fluid">

        <div class="row align-items-center">

            <div class="col-lg-12 col-md-12">

                <div class="confidence-home-content text-center">

                    <h1>About Us</h1>

                    <nav class="text-center">

                        <ol class="breadcrumb">

                            <li class="breadcrumb-item"><a href="{{route('homePage')}}">Home</a></li>

                            <li class="breadcrumb-item active">About Us</li>

                        </ol>

                    </nav>

                </div>

            </div>

        </div>

    </div>

</div>

<div id="about" class="three-about-area four-about-area six-about-area pb-100 pt-100">

    <div class="container p-0">

        <div class="row align-items-center m-0">

            <div class="col-lg-6">

                <div class="about-content">

                    <div class="one-section-title three-section-title mb-3">

                        <h2>About Elite Capital</h2>

                    </div>

                    <p class="mb-4">Elite Capital is a premier service provider offering comprehensive finance services, including complete mortgage solutions (Home and Land Finance For Everyone/Hand-over/Buy out/ Equity/ Construction ). With more than ten years of industry expertise, we ensure a seamless and efficient experience for our clients.</p>

                    <p>The name "Elite" is synonymous with the high quality of services we provide and is well-represented in our extensive portfolio.</p>

                    <div class="one-section-title three-section-title">

                        <h2>We Are Fully Dedicated To Support You</h2>

                    </div>

                    <div class="about-mission">

                        <ul class="nav nav-pills" id="pills-tab" role="tablist">

                            <li class="nav-item" role="presentation">

                                <a class="nav-default active" id="pills-home-tab" data-bs-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">

                                    <i class="bx bx-bullseye"></i>

                                    OUR MISSION

                                </a>

                            </li>

                            <li class="nav-item" role="presentation">

                                <a class="nav-default" id="pills-profile-tab" data-bs-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false" tabindex="-1">

                                    <i class="bx bx-show-alt"></i>

                                    OUR VISION

                                </a>

                            </li>

                        </ul>

                        <div class="tab-content" id="pills-tabContent">

                            <div class="tab-pane fade active show" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">

                                <p>At Elite Capital, we are committed to empowering individuals throughout their home financing journey in the UAE. Our mission is to provide expert advice and comprehensive support for those interested in purchasing a self-use property or making strategic investments. The essence of our dedication is encapsulated in our motto, "Turning Dreams into Reality," as we actively assist clients in realizing their aspirations. Focused on excellence and personalized service, we strive to be a trustworthy partner, guiding you at every stage toward achieving your home financing goals.</p>

                                <ul>

                                    <li>

                                        <div class="about-support">

                                            <i class="bx bx-headphone"></i>

                                            <h3>Support Service</h3>

                                            <p>Elevating your experience with exceptional support services. </p>

                                        </div>

                                    </li>

                                    <li>

                                        <div class="about-support">

                                        <i class="bx bx-bar-chart-alt"></i>

                                            <h3>Refinance Guide</h3>

                                            <p>Your pathway to optimal financial restructuring. </p>

                                        </div>

                                    </li>

                                </ul>

                            </div>

                            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">

                                <p>At the core of our vision is the aim to guide individuals looking to buy a property for personal use in the UAE. We embody this vision by making the dreams of both customers and investors a reality. "We aid you in realizing your dreams." Let's commence the journey to transform your aspirations into tangible achievements.</p>

                                <ul>

                                    <li>

                                        <div class="about-support">

                                            <i class="bx bx-headphone"></i>

                                            <h3>Support Service</h3>

                                            <p>Elevating your experience with exceptional support services. </p>

                                        </div>

                                    </li>

                                    <li>

                                        <div class="about-support">

                                            <i class="bx bx-bar-chart-alt"></i>

                                            <h3>Refinance Guide</h3>

                                            <p>Your pathway to optimal financial restructuring. </p>

                                        </div>

                                    </li>

                                </ul>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

            <div class="col-lg-6 pr-0">

                <div class="about-img">

                    <img src="{{ asset('static/frontend/img/home-six/about2.png') }}" alt="About">

                </div>

            </div>

        </div>

    </div>

</div>    

<section id="team" class="four-team-area pb-100">

    <div class="container">

        <div class="one-section-title three-section-title">

            <h2>Our Team</h2>

        </div>

        <div class="row">

            <div class="col-sm-6 col-lg-4">

                <div class="team-item">

                    <img src="{{ asset('static/frontend/img/home-four/team1.png') }}" alt="Team">

                    <h3>ABDALQADER DARABAIH</h3>

                    <p>Founder & Managing Director</p>

                </div>

            </div>

            <div class="col-sm-6 col-lg-4">

                <div class="team-item">

                    <img src="{{ asset('static/frontend/img/home-four/team2.png') }}" alt="Team">

                    <h3>MOHAMMED ALHERBAWI</h3>

                    <p>Business Development Manager </p>

                </div>

            </div>

            <div class="col-sm-6 col-lg-4">
            <div class="team-item">

                <img src="{{ asset('static/frontend/img/home-four/team7.png') }}" alt="Team">

                <h3>SOURAV SARKAR</h3>

                <p>Business Development Manager </p>

                </div>

                

            </div>

        </div>

        <div class="row">
        <div class="col-sm-6 col-lg-3">

        <div class="team-item">

            <img src="{{ asset('static/frontend/img/home-four/team3.png') }}" alt="Team">

            <h3>MOHAMMED ABUSAMRA</h3>

            <p>Senior Mortgage Consultant</p>

        </div>

        </div>

            <div class="col-sm-6 col-lg-3">

                <div class="team-item">

                    <img src="{{ asset('static/frontend/img/home-four/team4.png') }}" alt="Team">

                    <h3>MOHAMMED ALHAJ</h3>

                    <p>Mortgage Consultant</p>

                </div>

            </div>

            <div class="col-sm-6 col-lg-3">

                <div class="team-item">

                    <img src="{{ asset('static/frontend/img/home-four/team5.png') }}" alt="Team">

                    <h3>HUSSAIN SHAIKH</h3>

                    <p>Mortgage Consultant</p>

                </div>

            </div>

            <div class="col-sm-6 col-lg-3">

                <div class="team-item">

                    <img src="{{ asset('static/frontend/img/home-four/team6.png') }}" alt="Team">

                    <h3>PRABHAKAR ARUNACHALAM</h3>

                    <p>Mortgage Consultant</p>

                </div>

            </div>

            

        </div>

    </div>

</section>

<div id="home" class="main-banner-area pb-100">

    <div class="container-fluid">

      <div class="row align-items-center">

        <div class="col-lg-6 col-md-12">

            <div class="main-banner-form-wrap let-contact-form">
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
                <h3>Start your Mortgage process</h3>

                <form method="POST"  method="post" action="{{route('enquiry')}}">
                    @csrf

                    <div class="form-group">

                        <label>Name</label>

                        <input type="text" name="name" id="name" class="form-control" required data-error="Please enter your name" placeholder="Your name">

                        <div class="help-block with-errors"></div>

                    </div>

                    <div class="form-group">

                        <label>Mobile</label>

                        <input type="number" name="phone" id="phone_number" required data-error="Please enter your number" class="form-control" placeholder="+971 987895564">

                        <div class="help-block with-errors"></div>

                    </div>

                    <div class="form-group">

                        <label>Email</label>

                        <input type="email" name="email" id="email" class="form-control" required data-error="Please enter your email" placeholder="sample@gmail.com">

                        <div class="help-block with-errors"></div>

                    </div>

                    <div class="form-group">

                        <label>Looking For</label>

                        <div class="select-box">

                            <select name="looking_for" id="looking_for">

                                <option value="Home" selected>Home</option>

                                <option value="Business">Business</option>

                            </select>

                        </div>

                    </div>

                    <div class="calculat-button">

                        <button type="submit" class="default-btn">Get a call back</button>

                    </div>

                    <div id="successMessage" style="color: white;"></div>

                </form>

                </div>

            </div>

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

                    <!-- <span class="sub-title">FAQ</span> -->

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