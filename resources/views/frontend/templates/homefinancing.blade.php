@extends("frontend.layouts.app")

@section('page_content')

<div id="home" class="five-banner-area ">

    <div class="d-table">

        <div class="d-table-cell">

            <div class="container">

                <div class="row align-items-center">

                    <div class="col-lg-6 banner_one">

                        <div class="banner-content ">

                            <h1>Mortgages Personalized <span>for Your Comfort</span></h1>

                            <p>Reliable Sustainable Mortgage Provider</p>

                            <ul class="confidence-home-btn finance_banner">

                                <li>

                                    <a href="{{route('mortgageProcess')}}" class="main-default-btn">Start your mortgage process</a>

                                </li>

                                <li>

                                    <a href="{{route('mortgageCalculator')}}" class="main-default-btn finance_second_btn">Mortgage calculator</a>

                                </li>

                            </ul>

                        </div>

                    </div>

                    <div class="col-lg-6 banner_two">

                        <img class="move-img" src="{{ asset('static/frontend/img/home-five/financing-main.png') }}" alt="Shape">

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

<div class="fun-fact-style-area pt-100">

    <div class="container">

        <div class="row align-items-center">

            <div class="col-lg-6 col-md-12">

                <div class="row justify-content-center">

                    <div class="col-lg-6 col-md-6 col-sm-6">

                        <div class="fun-fact-style-card">

                            <h3>15+</h3>

                            <p>Years Of Experience</p>

                        </div>

                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-6">

                        <div class="fun-fact-style-card bg-E5F9F4">

                            <h3>500+</h3>

                            <p>Customers Worldwide</p>

                        </div>

                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-6">

                        <div class="fun-fact-style-card bg-E5F9F4">

                            <h3>56+</h3>

                            <p>Active Volunteers </p>

                        </div>

                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-6">

                        <div class="fun-fact-style-card">

                            <h3>500+</h3>

                            <p>Home Finance Completed</p>

                        </div>

                    </div>

                </div>

            </div>

            <div class="col-lg-6 col-md-12">

                <div class="fun-fact-style-content">

                    <h3>Achievements in Mortgage Excellence</h3>

                    <p class="bold">Showcasing Years of Expertise, Worldwide Presence, Volunteer Commitment, and Successfully Completed Veteran Homes"</p>

                </div>

            </div>

        </div>

    </div>

    <div class="fun-fact-style-shape">

        <img src="{{ asset('static/frontend/img/more-home/fun-fact-shape.png') }}" alt="image">

    </div>

</div>

<div class="buying-home-area ptb-100">

    <div class="container">

        <div class="row align-items-center justify-content-center">

            <div class="col-lg-5 col-md-12">

                <div class="buying-home-image">

                    <img src="{{ asset('static/frontend/img/more-home/buying-home/buying-home.jpg') }}" alt="image">

                    

                </div>

            </div>

            <div class="col-lg-7 col-md-12">

                <div class="buying-home-content">

                    <h3>We Are Here To Help You</h3>

                    <p>Explore a range of financing choices designed to make securing your dream home financially feasible and stress-free.</p>

                    <div class="row justify-content-center">

                        <div class="col-lg-6 col-sm-6">

                            <div class="buying-inner-box">

                                <div class="icon">

                                    <i class="bx bx-check"></i>

                                </div>

                                <h4>Expert Guidance for Homebuyers</h4>

                                <p>Trust our seasoned professionals for personalized advice and insights, ensuring a smooth journey into homeownership.</p>

                            </div>

                        </div>

                        <div class="col-lg-6 col-sm-6">

                            <div class="buying-inner-box">

                                <div class="icon">

                                    <i class="bx bx-check"></i>

                                </div>

                                <h4>Navigating the Home Buying Process with Ease</h4>

                                <p>We simplify the complex process, providing clarity and support from house hunting to closing, making your experience hassle-free.</p>

                            </div>

                        </div>

                        <div class="col-lg-6 col-sm-6">

                            <div class="buying-inner-box">

                                <div class="icon">

                                    <i class="bx bx-check"></i>

                                </div>

                                <h4>Tailored Solutions to Meet Your Unique Needs</h4>

                                <p>Our approach is not one-size-fits-all; we craft customized solutions to match your specific preferences, budget, and lifestyle.</p>

                            </div>

                        </div>

                        <div class="col-lg-6 col-sm-6">

                            <div class="buying-inner-box">

                                <div class="icon">

                                    <i class="bx bx-check"></i>

                                </div>

                                <h4>Streamlined Financing Options at Your Fingertips</h4>

                                <p>Explore a range of financing choices designed to make securing your dream home financially feasible and stress-free.</p>

                            </div>

                        </div>

                        <div class="col-lg-6 col-sm-6">

                            <div class="buying-inner-box">

                                <div class="icon">

                                    <i class="bx bx-check"></i>

                                </div>

                                <h4>Partnering with You Every Step of the Way</h4>

                                <p>From initial consultation to handing over the keys, our dedicated team is by your side, ensuring you feel confident and informed throughout the entire journey.</p>

                            </div>

                        </div>

                        <div class="col-lg-6 col-sm-6">

                            <div class="buying-inner-box">

                                <div class="icon">

                                    <i class="bx bx-check"></i>

                                </div>

                                <h4>Unlocking Your Dream Home - Our Supportive Approach</h4>

                                <p>Experience the joy of homeownership with our supportive and proactive approach, turning your dream home into a reality.</p>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

<div id="howWorks" class="process-style-area ptb-100">

    <div class="container">

        <div class="main-section-title">

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

<div class="mortgage-quote-area pb-100 mt_t">

    <div class="container">

        <div class="row m-0">

            <div class="col-lg-6 col-md-6 p-0">

                <div class="mortgage-quote-content">

                    <h3>Mortgage Calculator</h3>

                    <p>Request a mortgage quote today and take the first step towards realizing your homeownership goals, supported by transparent and competitive financing options.</p>

                    <a href="{{route('mortgageCalculator')}}" class="quote-btn">Mortgage Calculator</a>

                </div>

            </div>

            <div class="col-lg-6 col-md-6 p-0">

                <div class="mortgage-quote-image"></div>

            </div>

        </div>

    </div>

</div>

@endsection