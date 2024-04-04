@extends("mortgage.client.layouts.app")
@section('page_content')
<div id="content-page" class="content-page">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6">
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
                <div class="iq-card">
                    <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                            <h4 class="card-title">Mortgage Calculator</h4>
                        </div>
                    </div>
                    <div class="iq-card-body">
                    
                        <form action="{{route('mortgage.step1')}}" method="post" enctype="multipart/form-data">
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
                                    <div class="form-group check_box">
                                        <label>Do you already have a property with a mortgage?</label>
                                            <span><input type="checkbox" name="mortgage" value="Yes">Yes</span>
                                            <span><input type="checkbox" name="mortgage" value="No">No</span>
                                    </div>
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
                                        <span class="info_font">Usually ,  at least 20% of the home's price is paid upfront and in cash. </span>
                                    </div>
                                    <div class="form-group">

                                        <div class="slider-box">                     

                                            <label for="priceRange"></label>

                                            <input type="text" id="percentageRange" value="20 %" readonly>

                                            <div id="percentagerange" class="slider"></div>

                                        </div>

                                    </div>
                                    <div class="form-group">

                                        <label>Mortgage length</label>

                                        <div class="slider-box">                     

                                            <label for="priceRange"></label>

                                            <input type="text" id="priceRange" name="years" value="12 years" readonly>

                                            <div id="price-range" class="slider"></div>

                                        </div>

                                    </div>
                                    <div class="form-group">
                                        <label>Unsure where to start? Explore our top mortgage options.</label>
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
                                        <div class="let-contact-btn mt-3 calc_btn">
                                            <div class="row">
                                                <div class="col-sm-12 col-lg-12">
                                                    <p class="para_calc text-left">If you're unsure, reach out your account manager.</p>
                                                </div>
                                                <!-- <div class="col-sm-12 col-lg-6">
                                                    <a href="{{route('callBackData')}}" type="submit" class="btn btn-primary w-100" style="pointer-events: all; cursor: pointer;">Get A Call Back</a>
                                                </div>
                                                <div class="col-sm-12 col-lg-6">
                                                    <a href="{{route('appointmentScheduleDateTime')}}" type="submit" class="btn btn-secondary w-100" style="pointer-events: all; cursor: pointer;">Book An Appointment</a>
                                                </div> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="iq-card">
                    <div class="iq-card-body">
                        <div class="row mt-3 mb-2">
                            <div class="col-sm-12 col-lg-12">
                                <div class="calculate_process">
                                    <div class="highlight_calc">
                                        <p class="mt-4 mb-0">Property Price </p>
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
                                        <div class="let-contact-btn mt-3 calc_btn">
                                            <button type="submit" class="btn btn-primary mr-2 w-100 mb-3" style="pointer-events: all; cursor: pointer;">Proceed Application</button>
                                            <div class="row">
                                                <div class="col-sm-12 col-lg-12">
                                                    <p class="para_calc text-left">If you're unsure, reach out your account manager.</p>
                                                </div>
                                                <!-- <div class="col-sm-12 col-lg-6">
                                                    <a href="{{route('callBackData')}}" class="btn btn-primary w-100" style="pointer-events: all; cursor: pointer;">Get A Call Back</a>
                                                </div>
                                                <div class="col-sm-12 col-lg-6">
                                                    <a href="{{route('appointmentScheduleDateTime')}}" class="btn btn-secondary w-100" style="pointer-events: all; cursor: pointer;">Book An Appointment</a>
                                                </div> -->
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
                                        <div class="let-contact-btn mt-3 calc_btn">
                                            <div class="row">
                                                <div class="col-sm-12 col-lg-12">
                                                    <p class="para_calc text-left">If you're unsure, reach out your account manager.</p>
                                                </div>
                                                <!-- <div class="col-sm-12 col-lg-6">
                                                    <a href="{{route('callBackData')}}" type="submit" class="btn btn-primary w-100" style="pointer-events: all; cursor: pointer;">Get A Call Back</a>
                                                </div>
                                                <div class="col-sm-12 col-lg-6">
                                                    <a href="{{route('appointmentScheduleDateTime')}}" type="submit" class="btn btn-secondary w-100" style="pointer-events: all; cursor: pointer;">Book An Appointment</a>
                                                </div> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </form>
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