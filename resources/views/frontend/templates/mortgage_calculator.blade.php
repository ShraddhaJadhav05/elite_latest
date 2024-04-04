@extends("frontend.layouts.app")

@section('page_content')

<div id="home" class="confidence-home-area five-banner-here">

    <div class="container-fluid">

        <div class="row align-items-center">

            <div class="col-lg-12 col-md-12">

                <div class="confidence-home-content text-center">

                    <h1>Mortgage Calculator</h1>

                    <nav class="text-center">

                        <ol class="breadcrumb">

                            <li class="breadcrumb-item"><a href="{{route('homePage')}}">Home</a></li>

                            <li class="breadcrumb-item active">Mortgage Calculator</li>

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

                    <!-- <span class="sub-title">Mortgage Calculator</span> -->

                    <h3>Calculate your mortgage</h3>

                    <form id="contactForm" novalidate="true">

                        <div class="row m-0">

                            <div class="col-sm-12 col-lg-12">

                                <div class="form-group">

                                    <label>Property Price</label>

                                    <input type="text" name="price" id="price" class="form-control" required="" data-error="Please enter Price" placeholder="AED 200000">

                                    <div class="help-block with-errors"></div>

                                </div>

                            </div>

                            <div class="col-sm-12 col-lg-12">

                                <div class="form-group">

                                    <label>Down Payment</label>

                                    <input type="text" name="amount" id="amount" class="form-control" required="" data-error="Please enter Down Payment Amount" placeholder="AED 20000">

                                    <div class="help-block with-errors"></div>

                                </div>

                            </div>

                            <div class="col-sm-12 col-lg-12">

                                <div class="form-group">

                                    <label>Down Payment</label>

                                    <div class="slider-box">                     

                                        <label for="priceRange"></label>

                                        <input type="text" id="priceRange" readonly>

                                        <div id="price-range" class="slider"></div>

                                    </div>

                                </div>

                            </div>

                            <div class="col-md-12 col-lg-12">

                                <div class="let-contact-btn">

                                    <div class="form-group amount-div">

                                        <label style="display: inline-block;">Loan Amount : <h5 style="display: inline-block; margin: 0;" id="loanAmount">AED 180000</h5></label>

                                    </div>

                                    <div class="mb-4 amount-div">

                                        <div class="form-group">

                                            <label class="me-3" style="display: inline-block;">Annual Interest Rate : <h6 style="display: inline-block; margin: 0;" id="interest"></h6></label>

                                        </div>

                                        <div class="form-group">

                                            <label style="display: inline-block;">Monthly Payment : <h6 style="display: inline-block; margin: 0;" id="monthly-pay"></h6></label>

                                        </div>

                                    </div>

                                    <button id="submit-btn" type="submit" class="main-default-btn cnt_btn disabled w-100" style="pointer-events: all; cursor: pointer;">Calculate Mortgage</button>

                                    <div id="msgSubmit" class="h3 text-center hidden"></div>

                                    <div class="clearfix"></div>

                                </div>

                            </div>

                        </div>

                    </form>

                </div>

            </div>

            <div class="col-lg-6 col-md-12">

                <div class="col-sm-12 col-lg-12">

                    <div class="row cnt_time">

                        

                        <h3 class="mt-3 mb-0">Speak to our mortgage experts</h3>

                        <p class="mt-3">Getting a mortgage can be pretty exciting because it opens up the chance to own your dream home in a more affordable way. But, let's be real, understanding all the ins and outs of the process, the terms, and the calculations involved can be a bit tricky for many folks.At Elite Capital, we get it. As one of the leaders in the market, we've worked hard to make things easier for our valued clients and future homeowners."</p>

                        <a href="#" class="main-default-btn text-white text-center cnt_person">Contact Our Experts</a>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <div class="let-contact-shape">

        <img src="{{ asset('static/frontend/img/more-home/let-contact-shape.png') }}" alt="image">

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

     

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script>

    $(document).ready(function () {

        $('.amount-div').hide();



        $("#price").on("change", function () {

            $('.amount-div').hide();

            var propertyPrice = ($("#price").val()) ? parseFloat($("#price").val().replace(/[^0-9.]/g, '')) : 0;



            $("#price").val("AED " + propertyPrice)

        });



        $("#amount").on("change", function () {

          $('.amount-div').hide();

            var downPayment   = ($("#amount").val()) ? parseFloat($("#amount").val().replace(/[^0-9.]/g, '')) : 0;

            

            $("#amount").val("AED " + downPayment)

        });



        $("#price-range").slider({

          change: function(event, ui) {

            $('.amount-div').hide();

          }

        });

    });



    $("#submit-btn").on("click", function () {

        var propertyPrice = ($("#price").val()) ? parseFloat($("#price").val().replace(/[^0-9.]/g, '')) : 0;

        var downPayment   = ($("#amount").val()) ? parseFloat($("#amount").val().replace(/[^0-9.]/g, '')) : 0;



        if(propertyPrice && downPayment){

            $('.amount-div').show();

            var loanAmount    = propertyPrice - downPayment;

            $("#loanAmount").text("AED " + loanAmount.toFixed(2));

            

            sliderValue       = $("#priceRange").val(); 



            var annualInterestRate  = parseFloat(4.44);

            var loanTermYears       = parseInt(sliderValue);



            var monthlyInterestRate = annualInterestRate / (100 * 12);



            var totalPayments       = loanTermYears * 12;



            // Calculate monthly mortgage payment using the formula

            var monthlyPayment      = (loanAmount * monthlyInterestRate) / (1 - Math.pow(1 + monthlyInterestRate, -totalPayments));

            

            $("#monthly-pay").text("AED " + monthlyPayment.toFixed(2));

            $("#interest").text(annualInterestRate + "%");            

        }

    });  

</script>

@endsection



