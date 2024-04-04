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
            <div class="col-md-12">
                <div class="let-contact-form with-main-color process_mg mortgage_frm">
                    <h3>How much are you investing in this home?</h3>
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="let-contact-form with-main-color process_mg mortgage_frm">
                    <form action="{{route('mortgageCalculatorStep3')}}" method="post" class="custom-form contact-form" role="form" autocomplete="off" enctype="multipart/form-data">
                        @csrf
                        <div class="row m-0">
                            <div class="col-sm-12 col-lg-12">
                                <div class="form-group">
                                    <label>Property Price</label>
                                        <div class="qty-input">
                                            <button class="qty-count qty-count--minus" data-action="minus" type="button">-</button>
                                            <input class="product-qty" type="number" name="property_price" min="0"  value="{{$response['property_price']}}">
                                            <button class="qty-count qty-count--add" data-action="add" type="button">+</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-lg-12">
                                    <div class="form-group">
                                        <label>Down payment </label>
                                        <div class="row">
                                            <div class="col-md-8 col-6 pad-right">
                                                <input type="text" name="down_payment" id="price" class="form-control input_radius" required="" data-error="Please enter Price" placeholder="AED {{$response['down_payment']}}">
                                            </div>
                                            <div class="col-md-4 col-6 pad-left">
                                                <span class="input_info">
                                                    Pay up front <br>
                                                    <span class="percentage-span">{{$response['down_perc']}}%</span>
                                                    <input type="hidden" name="down_perc" class="down-perc">
                                                </span>
                                            </div>
                                        </div>
                                        <span class="info_font">A percentage of the home price paid up front and in cash. Usually at least 20% </span>
                                    </div>
                                    <div class="form-group">
                                        <div class="slider-box">                     
                                            <label for="priceRange"></label>
                                            <input type="text" id="percentageRange" value="{{$response['down_perc']}}" readonly>
                                            <div id="percentagerange" class="slider"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-lg-12">
                                    <div class="form-group">
                                        <label>Morgage length</label>
                                        <div class="slider-box">                     
                                            <label for="priceRange"></label>
                                            <input type="text" id="priceRange" name="years" value="{{$response['years']}}" readonly>
                                            <div id="price-range" class="slider"></div>
                                        </div>
                                    </div>
                                </div>
                                <!-- <div class="let-contact-btn bottom_btn mt-3">
                                    <button type="submit" name="button" value="skip" class="main-default-btn cnt_btn btn_new1" style="pointer-events: all; cursor: pointer;">Skip</button>
                                    <button type="submit" name="button" value="submit" class="main-default-btn cnt_btn btn_new2" style="pointer-events: all; cursor: pointer;">I'm Interested</button>
                                </div> -->
                                <div class="let-contact-btn bottom_btn mt-3">
                                    <a href="{{route('callBackData')}}" class="skip_btn" style="pointer-events: all; cursor: pointer;">Skip & Get A Call Back</a>
                                    <button type="submit" name="button" value="submit" class="main-default-btn cnt_btn btn_new2 step-3-btn" style="pointer-events: all; cursor: pointer;">I'm Interested</button>
                                    <p class="para_calc p-0 mt-3">If you're unsure, reach out to our mortgage consultant.</p>
                                    <a href="{{route('callBackData')}}" type="submit" class="main-default-btn cnt_btn btn_new1" style="pointer-events: all; cursor: pointer;">Get A Call Back</a>
                                    <a href="{{route('appointmentScheduleDateTime')}}" type="submit" class="main-default-btn cnt_btn btn_new2 " style="pointer-events: all; cursor: pointer;">Book An Appointment</a>     
                                </div>
                        </div>
                    
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="one-faq-area ">
                    <div class="container">
                        <h5 class="mb-3">Our Popular Mortgage Product</h5>
                        <div class="faq-content">
                            <ul class="accordion">
                                <div class="toggle_top">
                                    <div class="col-md-4">
                                        <span class="toggle_span-1">3 years fixed</span><span class="toggle_span-2">3.94%</span>
                                        <input class="product-qty1 product-qty" type="hidden" name="interest_rate" min="2.5" max="10.5" value="3.94">
                                    </div>
                                    <div class="col-md-4">
                                        <span class="toggle_span-1">Mortgage type</span><span class="toggle_span-2">3 years fixed</span>
                                    </div>
                                    <div class="col-md-4">
                                        <span class="toggle_span-1">Monthly payment</span>
                                        <span class="toggle_span-2" id="monthly-pay"></span>
                                        <input type="hidden" name="monthly_pay" class="input-monthly-pay">
                                        <input type="hidden" name="total_pay" class="input-total-pay">
                                    </div>
                                </div>
                                <li>
                                    <a>Breakdown</a>
                                    <p class="list_main">Cost Breakdown</p>
                                    <div class="d-flex justify-content-between toggle_active_list">
                                        <p>Land Department Fee</p><p id="land-dept-fee"></p>
                                        <input type="hidden" name="land_dept_fee" class="input-land-dept-fee">
                                    </div>
                                    <div class="d-flex justify-content-between toggle_active_list">
                                        <p>Trustee Fee</p><p id="trustee-fee"></p>
                                        <input type="hidden" name="trustee_fee" class="input-trustee-fee">
                                    </div>
                                    <div class="d-flex justify-content-between toggle_active_list">
                                        <p>Mortgage Registration Fee</p><p id="mortgage-reg-fee"></p>
                                        <input type="hidden" name="mortgage_reg_fee" class="input-mortgage-reg-fee">
                                    </div>
                                    <div class="d-flex justify-content-between toggle_active_list">
                                        <p>Bank Processing Fee</p><p id="bank-pr-fee"></p>
                                        <input type="hidden" name="bank_processing_fee" class="input-bank-pr-fee">
                                    </div>
                                    <div class="d-flex justify-content-between toggle_active_list">
                                        <p>Valuation Fee</p><p id="valuation-fee"></p>
                                        <input type="hidden" name="valuation_fee" class="input-valuation-fee">
                                    </div>

                                    <p class="list_main">Loan Breakdown</p>
                                    <!-- <div class="d-flex justify-content-between toggle_active_list">
                                        <p>Land Department Fee</p><p id="loan-land-dept-fee"></p>
                                        <input type="hidden" name="loan_land_dept_fee" class="input-land-dept-fee">
                                    </div>
                                    <div class="d-flex justify-content-between toggle_active_list">
                                        <p>Trustee Fee</p><p id="loan-trustee-fee"></p>
                                        <input type="hidden" name="loan_trustee_fee" class="input-trustee-fee">
                                    </div>
                                    <div class="d-flex justify-content-between toggle_active_list">
                                        <p>Mortgage Registration Fee</p><p id="loan-mortgage-reg-fee"></p>
                                        <input type="hidden" name="loan_mortgage_reg_fee" class="input-mortgage-reg-fee">
                                    </div>
                                    <div class="d-flex justify-content-between toggle_active_list">
                                        <p>Bank Processing Fee</p><p id="loan-bank-pr-fee"></p>
                                        <input type="hidden" name="loan_bank_processing_fee" class="input-bank-pr-fee">
                                    </div>
                                    <div class="d-flex justify-content-between toggle_active_list">
                                        <p>Valuation Fee</p><p id="loan-valuation-fee"></p>
                                        <input type="hidden" name="loan_valuation_fee" class="input-valuation-fee">
                                    </div> -->
                                    
                                    <div class="d-flex justify-content-between toggle_active_list">
                                        <p>Product type</p><p>3 years fixed</p>
                                    </div>
                                    <div class="d-flex justify-content-between toggle_active_list">
                                        <p>Interest Rate</p><p>3.94%</p>
                                    </div>
                                    <div class="d-flex justify-content-between toggle_active_list">
                                        <p>Bank processing fee</p><p>0.525%</p>
                                    </div>
                                    <div class="d-flex justify-content-between toggle_active_list">
                                        <p>Life insurance</p><p>0.0227%</p>
                                    </div>
                                    <div class="d-flex justify-content-between toggle_active_list">
                                        <p>Property insurance</p><p>0.04%</p>
                                    </div>
                                    <p></p>
                                </li>
                                <div class="toggle_top">
                                    <div class="col-md-4">
                                        <span class="toggle_span-1">5 years fixed</span><span class="toggle_span-2">4.19%</span>
                                        <input class="interest_rate_five" type="hidden" name="interest_rate_five" min="2.5" max="10.5" value="4.19">
                                    </div>
                                    <div class="col-md-4">
                                        <span class="toggle_span-1">Mortgage type</span><span class="toggle_span-2">5 years fixed</span>
                                    </div>
                                    <div class="col-md-4">
                                        <span class="toggle_span-1">Monthly payment</span>
                                        <span class="toggle_span-2" id="monthly-pay-five"></span>
                                        <input type="hidden" name="monthly_pay_five" class="input-monthly-pay-five">
                                    </div>
                                </div>
                                <li>
                                    <a>Breakdown</a>
                                    <p class="list_main">Cost Breakdown</p>
                                    <div class="d-flex justify-content-between toggle_active_list">
                                        <p>Land Department Fee</p><p id="five-land-dept-fee"></p>
                                        <input type="hidden" name="five_land_dept_fee" class="five-input-land-dept-fee">
                                    </div>
                                    <div class="d-flex justify-content-between toggle_active_list">
                                        <p>Trustee Fee</p><p id="five-trustee-fee"></p>
                                        <input type="hidden" name="five_trustee_fee" class="five-input-trustee-fee">
                                    </div>
                                    <div class="d-flex justify-content-between toggle_active_list">
                                        <p>Mortgage Registration Fee</p><p id="five-mortgage-reg-fee"></p>
                                        <input type="hidden" name="five_mortgage_reg_fee" class="five-input-mortgage-reg-fee">
                                    </div>
                                    <div class="d-flex justify-content-between toggle_active_list">
                                        <p>Bank Processing Fee</p><p id="five-bank-pr-fee"></p>
                                        <input type="hidden" name="five_bank_processing_fee" class="five-input-bank-pr-fee">
                                    </div>
                                    <div class="d-flex justify-content-between toggle_active_list">
                                        <p>Valuation Fee</p><p id="five-valuation-fee"></p>
                                        <input type="hidden" name="five_valuation_fee" class="five-input-valuation-fee">
                                    </div>

                                    <p class="list_main">Loan Breakdown</p>
                                    <!-- <div class="d-flex justify-content-between toggle_active_list">
                                        <p>Land Department Fee</p><p id="five-loan-land-dept-fee"></p>
                                        <input type="hidden" name="five_loan_land_dept_fee" class="five-input-land-dept-fee">
                                    </div>
                                    <div class="d-flex justify-content-between toggle_active_list">
                                        <p>Trustee Fee</p><p id="five-loan-trustee-fee"></p>
                                        <input type="hidden" name="five_loan_trustee_fee" class="five-input-trustee-fee">
                                    </div>
                                    <div class="d-flex justify-content-between toggle_active_list">
                                        <p>Mortgage Registration Fee</p><p id="five-loan-mortgage-reg-fee"></p>
                                        <input type="hidden" name="five_loan_mortgage_reg_fee" class="five-input-mortgage-reg-fee">
                                    </div>
                                    <div class="d-flex justify-content-between toggle_active_list">
                                        <p>Bank Processing Fee</p><p id="five-loan-bank-pr-fee"></p>
                                        <input type="hidden" name="five_loan_bank_processing_fee" class="five-input-bank-pr-fee">
                                    </div>
                                    <div class="d-flex justify-content-between toggle_active_list">
                                        <p>Valuation Fee</p><p id="five-loan-valuation-fee"></p>
                                        <input type="hidden" name="five_loan_valuation_fee" class="five-input-valuation-fee">
                                    </div> -->
                                    <div class="d-flex justify-content-between toggle_active_list">
                                        <p>Product type</p><p>5 years fixed</p>
                                    </div>
                                    <div class="d-flex justify-content-between toggle_active_list">
                                        <p>Interest Rate</p><p>4.19%</p>
                                    </div>
                                    <div class="d-flex justify-content-between toggle_active_list">
                                        <p>Bank processing fee</p><p>0.525%</p>
                                    </div>
                                    <div class="d-flex justify-content-between toggle_active_list">
                                        <p>Life insurance</p><p>0.0227%</p>
                                    </div>
                                    <div class="d-flex justify-content-between toggle_active_list">
                                        <p>Property insurance</p><p>0.04%</p>
                                    </div>
                                    <p></p>
                                </li>
                                <div class="toggle_top">
                                    <div class="col-md-4">
                                        <span class="toggle_span-1">Variable rate</span><span class="toggle_span-2">6.69%</span>
                                        <input class="variable_rate" type="hidden" name="variable_rate" min="2.5" max="10.5" value="6.69">
                                    </div>
                                    <div class="col-md-4">
                                        <span class="toggle_span-1">Mortgage type</span><span class="toggle_span-2">Variable rate</span>
                                    </div>
                                    <div class="col-md-4">
                                        <span class="toggle_span-1">Monthly payment</span>
                                        <span class="toggle_span-2" id="monthly-pay-variable-rate"></span>
                                        <input type="hidden" name="monthly_pay_variable_rate" class="input-monthly-pay-variable-rate">
                                    </div>
                                </div>
                                <li>
                                    <a>Breakdown</a>
                                    <p class="list_main">Cost Breakdown</p>
                                    <div class="d-flex justify-content-between toggle_active_list">
                                        <p>Land Department Fee</p><p id="variable-land-dept-fee"></p>
                                        <input type="hidden" name="variable_land_dept_fee" class="variable-input-land-dept-fee">
                                    </div>
                                    <div class="d-flex justify-content-between toggle_active_list">
                                        <p>Trustee Fee</p><p id="variable-trustee-fee"></p>
                                        <input type="hidden" name="variable_trustee_fee" class="variable-input-trustee-fee">
                                    </div>
                                    <div class="d-flex justify-content-between toggle_active_list">
                                        <p>Mortgage Registration Fee</p><p id="variable-mortgage-reg-fee"></p>
                                        <input type="hidden" name="variable_mortgage_reg_fee" class="variable-input-mortgage-reg-fee">
                                    </div>
                                    <div class="d-flex justify-content-between toggle_active_list">
                                        <p>Bank Processing Fee</p><p id="variable-bank-pr-fee"></p>
                                        <input type="hidden" name="variable_bank_processing_fee" class="variable-input-bank-pr-fee">
                                    </div>
                                    <div class="d-flex justify-content-between toggle_active_list">
                                        <p>Valuation Fee</p><p id="variable-valuation-fee"></p>
                                        <input type="hidden" name="variable_valuation_fee" class="variable-input-valuation-fee">
                                    </div>

                                    <p class="list_main">Loan Breakdown</p>
                                    <!-- <div class="d-flex justify-content-between toggle_active_list">
                                        <p>Land Department Fee</p><p id="variable-loan-land-dept-fee"></p>
                                        <input type="hidden" name="variable_loan_land_dept_fee" class="variable-input-land-dept-fee">
                                    </div>
                                    <div class="d-flex justify-content-between toggle_active_list">
                                        <p>Trustee Fee</p><p id="variable-loan-trustee-fee"></p>
                                        <input type="hidden" name="variable_loan_trustee_fee" class="variable-input-trustee-fee">
                                    </div>
                                    <div class="d-flex justify-content-between toggle_active_list">
                                        <p>Mortgage Registration Fee</p><p id="variable-loan-mortgage-reg-fee"></p>
                                        <input type="hidden" name="variable_loan_mortgage_reg_fee" class="variable-input-mortgage-reg-fee">
                                    </div>
                                    <div class="d-flex justify-content-between toggle_active_list">
                                        <p>Bank Processing Fee</p><p id="variable-loan-bank-pr-fee"></p>
                                        <input type="hidden" name="variable_loan_bank_processing_fee" class="variable-input-bank-pr-fee">
                                    </div>
                                    <div class="d-flex justify-content-between toggle_active_list">
                                        <p>Valuation Fee</p><p id="variable-loan-valuation-fee"></p>
                                        <input type="hidden" name="variable_loan_valuation_fee" class="variable-input-valuation-fee">
                                    </div> -->
                                    <div class="d-flex justify-content-between toggle_active_list">
                                        <p>Product type</p><p>Variable rate</p>
                                    </div>
                                    <div class="d-flex justify-content-between toggle_active_list">
                                        <p>Interest Rate</p><p>6.69%</p>
                                    </div>
                                    <div class="d-flex justify-content-between toggle_active_list">
                                        <p>Bank processing fee</p><p>0.525%</p>
                                    </div>
                                    <div class="d-flex justify-content-between toggle_active_list">
                                        <p>Life insurance</p><p>0.0227%</p>
                                    </div>
                                    <div class="d-flex justify-content-between toggle_active_list">
                                        <p>Property insurance</p><p>0.04%</p>
                                    </div>
                                    <p></p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>

    <div class="let-contact-shape">

        <img src="{{ asset('static/frontend/img/more-home/let-contact-shape.png') }}" alt="image">

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
    });

</script>
@endsection