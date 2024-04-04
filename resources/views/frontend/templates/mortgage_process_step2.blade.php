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
                    <h3>Income Details</h3>
                    <form method="POST" action="{{route('mortgageProcessStep2')}}">
                        @csrf
                        <div class="row m-0">
                            <div class="col-sm-12 col-lg-12">
                                <div class='form-group'>
                                    <label for='status'>Profession</label>
                                    <div class="select-box process">
                                        <select id="selectMe" name="profession" required>
                                            <option value="" disabled selected>Select</option>
                                            <option value="option1">Salaried</option>
                                            <option value="option2">Self-Employed</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div id="option1" class="group">
                                <div class="col-sm-12 col-lg-12">
                                    <div class="form-group">
                                        <label>Monthly Salary</label>
                                        <input type="text" name="salary" id="name" class="form-control option1" placeholder="Monthly Salary">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-lg-12">
                                    <div class="form-group">
                                        <label>Designation</label>
                                        <input type="text" name="designation" id="name" class="form-control option1" placeholder="Designation">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-lg-12">
                                    <div class="form-group">
                                        <label>Company Name</label>
                                        <input type="text" name="salaried_company" id="name" class="form-control option1" placeholder="Company Name">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-lg-12">
                                    <div class="form-group">
                                        <label>Length of Service with Current Employer</label>
                                        <input type="text" name="service_legth" id="name" class="form-control service-legth" placeholder="">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-lg-12 previous-company">
                                    <div class="form-group">
                                        <label>Previous Company Name</label>
                                        <input type="text" name="previous_company_name" id="name" class="form-control" placeholder="">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                            </div>
                            <div id="option2" class="group">
                                <div class="col-sm-12 col-lg-12">
                                    <div class="form-group">
                                        <label>Company Name </label>
                                        <input type="text" name="company" id="name" class="form-control option2" placeholder="Company Name">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-lg-12">
                                    <div class="form-group">
                                        <label>Line of Business</label>
                                        <input type="text" name="line_of_business" id="name" class="form-control option2" placeholder="Line of Business">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-lg-12">
                                    <div class="form-group">
                                        <label>Length of Business</label>
                                        <input type="text" name="length_of_business" id="name" class="form-control option2" placeholder="Length of Business">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-lg-12">
                                    <div class="form-group">
                                        <label> Ownership % (As per MOA)</label>
                                        <input type="text" name="ownership" id="name" class="form-control option2" placeholder="">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-lg-12">
                                    <div class="form-group">
                                        <label>Net profit (previous year)</label>
                                        <input type="text" name="net_profit" id="name" class="form-control option2" placeholder="">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 col-lg-12">
                                <div class="let-contact-btn">
                                    <button type="submit" class="main-default-btn cnt_btn" style="pointer-events: all; cursor: pointer;">Continue</button>
                                    <!-- <a href="getstarted-3.html" class="main-default-btn cnt_btn " style="pointer-events: all; cursor: pointer;">Continue</a> -->
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
        $('.previous-company').hide();

        $('.group').hide();
        $('#selectMe').change(function () {
            $('.group').hide();
            $('#'+$(this).val()).show();

            $('.group input').removeAttr('required');
            $('.'+$(this).val()).prop('required', true);
        })
    });
    $('.service-legth').change(function () {
            var service_length  = $(this).val();

            if(service_length < 2)
            {
                $('.previous-company').show();
            }
            else{
                $('.previous-company').hide();
            }
        });
</script>
@endsection