@extends("frontend.layouts.app")
@section('page_content')
<div id="contact" class="pt-100 pb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-12"></div>
            <div class="col-lg-6 col-md-12">
                <div class="let-contact-form with-main-color process_mg">
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
                    <h3>Property Details</h3>
                    <form method="POST" action="{{route('mortgageProcessStep3')}}">
                        @csrf
                        <div class="row m-0">
                            <div class="col-sm-12 col-lg-12">
                                <div class='form-group'>
                                    <label for='status'>Property Finalised</label>
                                    <div class="select-box process">
                                        <select id="selectMe" name="property_finalised" required>
                                            <option value="" disabled selected>Select</option>
                                            <option value="option1">Yes</option>
                                            <option value="option2">No</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div id="option1" class="group">
                                <div class="col-sm-12 col-lg-12">
                                    <div class="form-group">
                                        <label>Project Name</label>
                                        <input type="text" name="project_name" id="name" class="form-control option1" placeholder="Project Name">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-lg-12">
                                    <div class="form-group">
                                        <label>Expected Handover Date</label>
                                        <input type="text" name="expected_handover_date" id="name" class="form-control option1" placeholder="Expected Handover date">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-lg-12">
                                    <div class='form-group option1'>
                                        <label for='status'>Emirates</label>
                                        <div class="select-box process">
                                            <select id="selectMe" name="emirates">
                                                <option value="" disabled selected>Select</option>
                                                <option value="Abu Dhabi">Abu Dhabi</option>
                                                <option value="Dubai">Dubai</option>
                                                <option value="Sharjah">Sharjah</option>
                                                <option value="Ajman">Ajman</option>
                                                <option value="Umm Al Quwain"> Umm Al Quwain</option>
                                                <option value="Ras Al Khaimah"> Ras Al Khaimah </option>
                                                <option value="Fujairah"> Fujairah</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-lg-12">
                                    <div class="form-group">
                                        <label>Property Price</label>
                                        <input type="text" name="property_price" id="name" class="form-control option1" placeholder="Property Price">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-lg-12">
                                    <div class="form-group">
                                        <div class="slider-box">
                                            <label for="priceRange">Down Payment</label>
                                            <input type="text" id="percentageRange" name="down_payment" readonly>
                                            <div id="percentagerange" class="slider"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 col-lg-12">
                                <div class="let-contact-btn">
                                    <button type="submit" class="main-default-btn cnt_btn" style="pointer-events: all; cursor: pointer;">Submit</button>
                                    <!-- <a href="#" class="main-default-btn cnt_btn " style="pointer-events: all; cursor: pointer;">Submit</a> -->
                                    <div id="successmortgageMessage" style="color: white;"></div>
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
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(document).ready(function () {
        $('.group').hide();
        $('#selectMe').change(function () {
            $('.group').hide();
            $('#'+$(this).val()).show();

            $('.group input').removeAttr('required');
            $('.'+$(this).val()).prop('required', true);
        })
    });
</script>
<script>
    $(function() {
        $("#percentagerange").slider({
        range: "max",
        min: 10,
        max: 90, 
        value: 20, 
        step: 1, 
        slide: function(event, ui) {
            $("#percentageRange").val(ui.value + " %");
        }
        });
        $("#percentagerange").on("mousedown touchstart", function(event) {
            event.preventDefault(); // Prevent default action for mousedown/touchstart
        });
        $("#percentageRange").val( $("#percentagerange").slider("value") + " %");
    });
</script>
@endsection