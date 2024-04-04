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

                <div class="let-contact-form with-main-color process_mg mortgage_frm">

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

                    <h3>Calculate your mortgage</h3>

                    <form action="{{route('mortgageCalculator')}}" method="post" class="custom-form contact-form" role="form" autocomplete="off" enctype="multipart/form-data">
                        @csrf

                        <div class="row m-0">

                            <div class="col-sm-12 col-lg-12">

                                <div class="form-group">

                                    <label>Property Price</label>
                                        <div class="qty-input">
                                            <button class="qty-count qty-count--minus" data-action="minus" type="button">-</button>
                                            <input class="product-qty mortgage-calc" type="number" name="property_price" min="0"  value="1000000">
                                            <button class="qty-count qty-count--add" data-action="add" type="button">+</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-lg-12">

                                    <div class="form-group check_box">

                                        <label>Do you already own a property with mortgage</label>
                                        <span><input type="checkbox" name="mortgage" value="Yes">Yes</span>
                                        <span><input type="checkbox" name="mortgage" value="No">No</span>
                                    </div>
                                </div>

                                <div class="col-sm-12 col-lg-12">

                                    <div class="form-group">

                                        <label>Down payment </label>
                                        <div class="row">
                                            <div class="col-md-8 col-6 pad-right">

                                            <input type="text" name="down_payment" id="price" class="form-control input_radius" required="" data-error="Please enter Price" placeholder="AED 200000">
                                        </div>
                                        <div class="col-md-4 col-6 pad-left">
                                            <span class="input_info">
                                                Pay up front <br>
                                                <span class="percentage-span">20%</span>
                                                <input type="hidden" name="down_perc" class="down-perc">
                                            </span>
                                        </div>
                                    </div>
                                    <span class="info_font">Usually ,  at least 20% of the home's price is paid upfront and in cash.  </span>
                                </div>
                                <div class="form-group">

                                    <div class="slider-box">                     

                                        <label for="priceRange"></label>

                                        <input type="text" id="percentageRange" value="20 %" readonly>

                                        <div id="percentagerange" class="slider"></div>

                                    </div>

                                </div>

                            </div>

                            <div class="col-sm-12 col-lg-12">

                                <div class="form-group">

                                    <label>Mortgage length</label>

                                    <div class="slider-box">                     

                                        <label for="priceRange"></label>

                                        <input type="text" id="priceRange" name="years" value="12 years" readonly>

                                        <div id="price-range" class="slider"></div>

                                    </div>

                                </div>

                            </div>

                            
                            <div class="col-sm-12 col-lg-12">

                                <div class="form-group">

                                    <label>Not sure where to begin? Try our most popular mortgage products</label>

                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-4 col-4">
                                                <button type="button" class="fixed_rate_btn" value="3.94"><span>3 years fixed</span><br>3.94%</button>
                                            </div>
                                            <div class="col-md-4 col-4">
                                                <button type="button" class="fixed_rate_btn" value="4.19"><span>5 years fixed</span><br>4.19%</button>
                                            </div>
                                            <div class="col-md-4 col-4">
                                                <button type="button" class="fixed_rate_btn" value="6.69"><span>Varible rate</span><br>6.69%</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="qty-inputpercentage">
                                        <button class="qty-count qty-count1 qty-count--minus" data-action="minus" type="button">-</button>
                                        <input class="product-qty1 product-qty" type="text" name="interest_rate" min="0.5" max="10.5" value="5.5">
                                        <button class="qty-count qty-count1 qty-count--add" data-action="add" type="button">+</button>
                                    </div>
                                </div>
                            </div>

                            <div class="let-contact-btn bottom_btn mt-3">
                                <!-- <a href="{{route('callBackData')}}" class="skip_btn" style="pointer-events: all; cursor: pointer;">Skip & Get A Call Back</a>
                                <button type="submit" name="button" value="submit" class="main-default-btn cnt_btn btn_new2 step-3-btn" style="pointer-events: all; cursor: pointer;">I'm Interested</button> -->
                                <p class="para_calc p-0 mt-3">If you're unsure, reach out to our mortgage consultant.</p>
                                <a href="{{route('callBackData')}}" type="submit" class="main-default-btn cnt_btn btn_new1" style="pointer-events: all; cursor: pointer;">Get A Call Back</a>
                                <a href="{{route('appointmentScheduleDateTime')}}" type="submit" class="main-default-btn cnt_btn btn_new2 " style="pointer-events: all; cursor: pointer;">Book An Appointment</a>     
                            </div>
                        </div>
                

                </div>

            </div>

            <div class="col-lg-6 col-md-12">

                <div class="col-sm-12 col-lg-12">

                    <div class="row cnt_time calculate_main">

                        <!-- <div class="calculate_process">
                            <h3 class="mt-0 mb-0 calculate_title"><span>save aed 2,000</span> NO PRYPCO FEE </h3>
                            <div class="highlight_calc">
                                <p class="mt-4 mb-0" >Monthly Installment </p>
                                <h3 id="monthly-pay"></h3>
                                <input type="hidden" name="monthly_pay" class="input-monthly-pay">
                                <input type="hidden" name="total_pay" class="input-total-pay">
                                <p class="mt-3 mb-0" >Amount Required Upfront </p>
        
                                <h3 id="total-pay"></h3>
        
                                <div class="let-contact-btn mt-4 calc_btn">
                                    <a href="{{route('callBackData')}}" type="submit" class="main-default-btn cnt_btn btn_new1" style="pointer-events: all; cursor: pointer;">Get A Call Back</a>
                                    <button type="submit" class="main-default-btn cnt_btn btn_new2" style="pointer-events: all; cursor: pointer;">Get Started</button>
                                </div>
                            </div>
                        </div> -->

                        <div class="calculate_process">
                            <div class="highlight_calc">
                                <p class="mt-4 mb-0" >Property Price</p>
                                <h3 id="property-price"></h3>
                                <div class="row">
                                    <div class="col-md-6">
                                        <p class="mt-4 mb-0" >Monthly Installment</p>
                                        <h3 id="monthly-pay"></h3>
                                    </div>
                                    <div class="col-md-6">
                                        <p class="mt-3 mb-0">Upfront Required</p>
                                        <h3 id="total-pay"></h3>
                                    </div>
                                </div>
                                <div class="let-contact-btn mt-4 calc_btn">
                                    <button type="submit" class="main-default-btn cnt_btn btn_new2 calcualtor_btnwidth mb-3" style="pointer-events: all; cursor: pointer;">Get Started</button>
                                    <p class="para_calc">If you're unsure, reach out to our mortgage consultant.</p>
                                    <a href="{{route('callBackData')}}" type="submit" class="main-default-btn cnt_btn btn_new1" style="pointer-events: all; cursor: pointer;">Get A Call Back</a>
                                    <a href="{{route('appointmentScheduleDateTime')}}" type="submit" class="main-default-btn cnt_btn btn_new2 " style="pointer-events: all; cursor: pointer;">Book An Appointment</a>
                                </div>
                            </div>
                        </div>

                        <h4 class="calc_title">Breakdown amount required upfront</h4>
                        <div class="calc_description">
                        <div class="d-flex justify-content-between">
                            <p>Land Department Fee</p><p id="land-dept-fee"></p>
                            <input type="hidden" name="land_dept_fee" class="input-land-dept-fee">
                        </div>
                        <span>One-time tax paid to the government.</span>
                        <span>4% of the property value + AED 580 admin fee</span>
                       </div>

                       <div class="calc_description">

                        <div class="d-flex justify-content-between">
                            <p>Trustee Fee</p><p id="trustee-fee"></p>
                            <input type="hidden" name="trustee_fee" class="input-trustee-fee">
                        </div>
                        <span>Paid to the bank for a range of services.</span>
                        <span>AED 2,000 + VAT for properties below AED 500,000</span>
                        <span>AED 4,200 + VAT for properties equal or above AED 500,000</span>
                        </div>

                        <div class="calc_description">

                        <div class="d-flex justify-content-between">
                            <p>Mortgage Registration Fee</p><p id="mortgage-reg-fee"></p>
                            <input type="hidden" name="mortgage_reg_fee" class="input-mortgage-reg-fee">
                        </div>
                        <span>Paid to the government to register your property as security for home loan. </span>
                        <span>0.25% of the loan amount + AED 290 admin fee</span>
                        </div>

                        <div class="calc_description">

                        <div class="d-flex justify-content-between">
                            <p>Bank Processing Fee</p><p id="bank-pr-fee"></p>
                            <input type="hidden" name="bank_processing_fee" class="input-bank-pr-fee">
                        </div>
                        <span>Paid to the bank to process your mortgage.</span>
                        <span> Up to 1% of the loan amount + 5% VAT</span>
                        </div>

                        <div class="calc_description">

                        <div class="d-flex justify-content-between">
                            <p>Valuation Fee</p><p id="valuation-fee"></p>
                            <input type="hidden" name="valuation_fee" class="input-valuation-fee">
                        </div>
                        <span>Paid to the bank for a basic inspection of your property. </span>
                        <span> Between AED 2,500 and AED 3,500 + 5 VAT</span>
                        </div>
                        <div class="let-contact-btn bottom_btn mt-3">
                            <a href="{{route('callBackData')}}" type="submit" class="main-default-btn cnt_btn btn_new1" style="pointer-events: all; cursor: pointer;">Get A Call Back</a>
                            <button type="submit" class="main-default-btn cnt_btn btn_new2" style="pointer-events: all; cursor: pointer;">Get Started</button>
                        </div>
                    </div>

                </div>

            </div>

        </div>

    </div>
    </form>
    <div class="let-contact-shape">

        <img src="https://elitecapital.ae/static/frontend/img/more-home/let-contact-shape.png" alt="image">

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

                    <img src="https://elitecapital.ae/static/frontend/img/step-process.png" alt="image">

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

                    <a href="https://elitecapital.ae/calculate-mortgage" class="quote-btn">Mortgage Calculator</a>

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

                    <img src="https://elitecapital.ae/static/frontend/img/faq-3.png" alt="image">

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
    $(document).ready(function() {
        mortgageCalculator();

        var change = false;

        $('input[name="mortgage"]').on('change', function() {
            // Uncheck all other checkboxes
            $('input[name="mortgage"]').not(this).prop('checked', false);

            var check_val   = $(this).val();
            var perc        = parseInt($('#percentageRange').val());

            if(check_val == 'Yes' & perc < 40 & change == false)
            {
                var property_price  = parseFloat($('.product-qty').val());
                var get_perc        = 40;
                var down_payment    = (get_perc / 100) * property_price;

                
                $('#price').val('AED '+ down_payment);
                $('.percentage-span').text(get_perc+" %");
                $('#percentageRange').val(get_perc + " %");
                $("#percentagerange").slider("value", get_perc);
            }
            else if(check_val == 'Yes' & perc < 40 & change == true)
            {
                var property_price  = parseFloat($('.product-qty').val());
                var get_perc        = 40;
                var down_payment    = (get_perc / 100) * property_price;

                
                $('#price').val('AED '+ down_payment);
                $('.percentage-span').text(get_perc+" %");
                $('#percentageRange').val(get_perc + " %");
                $("#percentagerange").slider("value", get_perc);
            }
            else if(change == false){
                var property_price  = parseFloat($('.product-qty').val());
                var get_perc        = 20;
                var down_payment    = (get_perc / 100) * property_price;

                
                $('#price').val('AED '+ down_payment);
                $('.percentage-span').text(get_perc+" %");
                $('#percentageRange').val(get_perc + " %");
                $("#percentagerange").slider("value", get_perc);
            }
            mortgageCalculator();
        });

        $('#price').on('change', function() {
            change = true;
            var selectedCheckboxValue = $('input[name="mortgage"]:checked').val();

            var property_price  = parseFloat($('.product-qty').val());
            var down_payment    = $(this).val();
            var down_payment    = parseFloat(down_payment.replace(/[^\d.-]/g, ''));
            var get_perc        = parseInt((down_payment / property_price) * 100);
            
            if(get_perc > 80){
                get_perc        = 80;
                down_payment    = (get_perc / 100) * property_price;

                $('#price').val('AED '+ down_payment);
                $('.percentage-span').text(get_perc+" %");
                $('#percentageRange').val(get_perc + " %");
                $("#percentagerange").slider("value", get_perc);
            }
            else if(selectedCheckboxValue == 'Yes' && get_perc < 40)
            {
                get_perc        = 40;
                down_payment    = (get_perc / 100) * property_price;

                $('#price').val('AED '+ down_payment);
                $('.percentage-span').text(get_perc+" %");
                $('#percentageRange').val(get_perc + " %");
                $("#percentagerange").slider("value", get_perc);
            }
            else{

                $('#price').val('AED '+ down_payment);
                $('.percentage-span').text(get_perc+" %");
                $('#percentageRange').val(get_perc + " %");
                $("#percentagerange").slider("value", get_perc);
            }
            
            mortgageCalculator()
        });

        $('.fixed_rate_btn').on('click', function() {
            var interest_val   = $(this).val();
            $('.product-qty1').val(interest_val);
            
            mortgageCalculator()
        });
    });

</script>
@endsection