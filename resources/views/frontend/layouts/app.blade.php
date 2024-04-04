<!DOCTYPE html>
<html lang="zxx" class="theme-light">
@php
    $header_data    = DB::table('headers')->first(); 

    $footer_data    = DB::table('footers')->first(); 

    $contacts_data  = DB::table('contact_us')->first(); 

    $list_services  = DB::table('services')->get(); 
@endphp
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('static/frontend/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/themes/smoothness/jquery-ui.css">
    <link rel="stylesheet" href="{{ asset('static/frontend/css/boxicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('static/frontend/css/magnific-popup.min.css') }}">
    <link rel="stylesheet" href="{{ asset('static/frontend/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('static/frontend/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('static/frontend/css/nice-select.min.css') }}">
    <link rel="stylesheet" href="{{ asset('static/frontend/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('static/frontend/css/dark.css') }}">
    <link rel="stylesheet" href="{{ asset('static/frontend/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('static/frontend/css/home2.css') }}">
    <link rel="stylesheet" href="{{ asset('static/frontend/css/responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('static/frontend/counrty/css/intlTelInput.css') }}">
    
    <style>
        .help-block {
            color: red; /* Change this to the desired font color */
        }
    </style>
    <title>{{isset($get_data) ? $get_data->meta_title : 'Elite Capital Mortgage Consultant - finance your new home in UAE'}}</title>
    <meta name="keywords" content="{{isset($get_data) ? $get_data->meta_tag : ''}}">
    <meta name="description" content="{{isset($get_data) ? $get_data->meta_description : '' }}">
    

    <link rel="icon" type="image/png" href="{{ asset('static/frontend/img/favicon.png') }}">
</head>
<body data-spy="scroll" data-offset="70">
    <div class="main-navbar">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container-fluid">
                <div class="logo">
                    <a href="{{route('homePage')}}">
                        @if($header_data)
                        <img src="/image_uploads/{{$header_data->logo}}" class="black-logo" alt="Elite Capital">
                        @else
                        <img src="{{ asset('static/frontend/img/logo.png') }}" class="black-logo" alt="Elite Capital">
                        @endif
                    </a>
                </div>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav nav_first">
                        <li class="nav-item">
                            <a href="{{route('whyUsScreen')}}" class="nav-link">
                            Why US
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('mortgageCalculator')}}" class="nav-link">
                            Mortgage Calculator
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('newsAndInsightData')}}" class="nav-link">
                            News & Insights
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('faqData')}}" class="nav-link">
                            FAQs
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('callBackData')}}" class="nav-link">
                            Get Call Back
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('appointmentScheduleDateTime')}}" class="nav-link appointment_nav">
                            Book An Appointment
                            </a>
                        </li>
                    </ul>
                    <ul class="navbar-nav main_menu">
                        <li class="nav-item">
                            <a href="{{route('homePage')}}" class="nav-link">
                            Home
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('aboutUsScreen')}}" class="nav-link">
                            About Us
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('homeFinancingScreen')}}" class="nav-link">
                            Home Financing
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" id="navbarDropdownMenuLink11" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Mortgages
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink11">
                                @foreach($list_services as $service)
                                <li class="nav-item ">
                                    <a href="{{route('servicesPages', ['url_key' => $service->url_key])}}" class="nav-link">
                                        {{$service->title}}
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" id="navbarDropdownMenuLink11" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Partners
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink11">
                                <li class="nav-item ">
                                    <a href="{{route('partners')}}" class="nav-link">
                                        Partners
                                        
                                    </a>
                                </li>
                                <li class="nav-item ">
                                    <a href="{{route('agent')}}" class="nav-link">
                                        Agents
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('contactUsScreen')}}" class="nav-link">
                            Contact Us
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="others-option">
                    <div class="">
                        <div class="option-item">
                            <a href="{{route('mortgageProcess')}}" class="sign-up">Get Started</a>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </div>

    @yield('page_content')     

    <footer class="footer-style-area copy_footer">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-sm-6 col-lg-3">
                    <div class="single-footer-widget">
                        <div class="footer-logo">
                            <a href="#">
                                @if($footer_data)
                                <img class="footer-img" src="/image_uploads/{{$footer_data->logo}}" alt="Logo">
                                @else
                                <img class="footer-img" src="{{ asset('static/frontend/img/logo-two.png') }}" alt="Logo">
                                @endif
                            </a>
                            <p>{{ $footer_data->description ?? '' }}</p>
                            <ul class="footer-social">
                                <li>
                                    <a href="https://www.facebook.com/elitemortgageuae"  target="_blank">
                                        <i class="bx bxl-facebook"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://www.instagram.com/elitemortgageuae"  target="_blank">
                                        <i class="bx bxl-instagram"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://www.linkedin.com/company/elitemortgageuae"  target="_blank">
                                        <i class="bx bxl-linkedin"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://www.tiktok.com/@elitemortgageuae"  target="_blank">
                                        <i class="bx bxl-tiktok"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="single-footer-widget ps-3">
                        <h3>Company</h3>
                        <ul class="quick-link">
                            <li>
                                <a href="{{route('aboutUsScreen')}}">About Us </a>
                            </li>
                            <li>
                                <a href="{{route('whyUsScreen')}}">Why Us</a>
                            </li>
                            <li>
                                <a href="{{route('mortgageCalculator')}}">Calculator</a>
                            </li>
                            <li>
                                <a href="{{route('contactUsScreen')}}">Contact</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="single-footer-widget ps-3">
                        <h3>Support</h3>
                        <ul class="quick-link">
                            <li>
                                <a href="{{route('newsAndInsightData')}}">Blog</a>
                            </li>
                            <li>
                                <a href="{{route('faqData')}}">FAQs</a>
                            </li>
                            <li>
                                <a href="{{route('terms')}}">Terms</a>
                            </li>
                            <li>
                                <a href="{{route('privacy')}}">Privacy</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="single-footer-widget">
                        <h3>Address</h3>
                        <ul class="address-info">
                            <li>
                                <i class="bx bx-phone-call"></i>
                                <a href="tel:
                                {{$contacts_data->phone ?? ''}}">
                                {{$contacts_data->phone ?? ''}}</a>

                            </li>
                            <li>
                                <i class="bx bx-message-square-detail"></i>
                                <a href="mailto:{{$contacts_data->email ?? ''}}"><span class="__cf_email__">{{$contacts_data->email ?? ''}}</span></a>
                            </li>
                            <li>
                                <i class="bx bx-current-location"></i>
                                {{$contacts_data->address ?? ''}}
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <section class="footer-style-area secondary_footer">
        <div class="container">
            <div class="row justify-content-center">
                <div class="copyright-style-area">
                    <div class="row align-items-center">
                        <div class="col-lg-12 col-md-6">
                            <div class="copyright-item">
                                <p>© Elite Capital Mortgage Consultant 2023 </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="{{ asset('static/frontend/js/jquery.min.js') }}"></script>
    <script src="{{ asset('static/frontend/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('static/frontend/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('static/frontend/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('static/frontend/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('static/frontend/js/jquery.ajaxchimp.min.js') }}"></script>
    <script src="{{ asset('static/frontend/js/form-validator.min.js') }}"></script>
    <script src="{{ asset('static/frontend/js/contact-form-script.js') }}"></script>
    <script src="{{ asset('static/frontend/js/jquery.mixitup.min.js') }}"></script>
    <script src="{{ asset('static/frontend/js/rangeslider.js') }}"></script>
    <script src="{{ asset('static/frontend/js/custom.js') }}"></script>
    <!-- <script src="{{ asset('static/frontend/js/main.js') }}"></script> -->
    <script src="{{ asset('static/frontend/counrty/js/intlTelInput.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui-touch-punch/0.2.3/jquery.ui.touch-punch.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
    	var contactForm = $('#contact-form');
        if (contactForm.length) { 
                $('#contact-form').on('submit', function(e){ 
                var $this = $(this),
                    $target = contactForm.find('#successMessage');
                if (e.isDefaultPrevented()) {
                    $target.html("<div class='alert alert-success'><p>Please select all required field.</p></div>");
                } else {
                    $.ajax({
                        url: "mailer.php",
                        type: "POST",
                        data: contactForm.serialize(),
                        beforeSend: function () {
                            $target.html("<div style= 'color: white;'><p>Loading ...</p></div>");
                        },
                        success: function (text) {
                            if (text === "Message has been sent successfully.") {
                                $this[0].reset();
                                $target.html("<div class='alert alert-success'><p>Message has been sent successfully.</p></div>");
                            } else {
                                $target.html("<div class='alert alert-success success-cls'><p>" + text + "</p></div>");
                            }
                        }
                    });
                    return false;
                }
            });
        }
    </script>
    <script>
        function submitForm() {
            var contactForm = $('#contact-form');
            var $target = contactForm.find('#successMessage');

            $.ajax({
                url: "mailer.php",
                type: "POST",
                data: contactForm.serialize(),
                beforeSend: function () {
                    $target.html("<div style= 'color: white;'><p>Loading ...</p></div>");
                },
                success: function (response) {
                    if (response.trim() === "success") {
                        contactForm[0].reset();
                        $target.html("<div style= 'color: white;'><p>Message has been sent successfully.</p></div>");
                        
                        // Add a delay and then fade out the success message after 3 seconds (adjust as needed)
                        setTimeout(function () {
                            $target.fadeOut();
                        }, 3000);
                    } else {
                        $target.html("<div class='alert alert-danger'><p>" + response + "</p></div>");
                    }
                },
                error: function () {
                    $target.html("<div class='alert alert-danger'><p>There was an error. Please try again.</p></div>");
                }
            });

            return false; // Prevent the default form submission
        }
    </script>   
    <script>
    	var contactForm = $('#consultation-form');
        if (contactForm.length) { 
                $('#consultation-form').on('submit', function(e){ 
                var $this = $(this),
                    $target = contactForm.find('#msgconsultation');
                if (e.isDefaultPrevented()) {
                    $target.html("<div class='alert alert-success'><p>Please select all required field.</p></div>");
                } else {
                    $.ajax({
                        url: "consultationmailer.php",
                        type: "POST",
                        data: contactForm.serialize(),
                        beforeSend: function () {
                            $target.html("<div style= 'color: #555;'><p>Loading ...</p></div>");
                        },
                        success: function (text) {
                            if (text === "Message has been sent successfully.") {
                                $this[0].reset();
                                $target.html("<div class='alert alert-success'><p>Message has been sent successfully.</p></div>");
                            } else {
                                $target.html("<div class='alert alert-success success-cls'><p>" + text + "</p></div>");
                            }
                        }
                    });
                    return false;
                }
            });
        }
    </script>
    <script>
        function submitconsultForm() {
            var contactForm = $('#consultation-form');
            var $target = contactForm.find('#msgconsultation');

            $.ajax({
                url: "consultationmailer.php",
                type: "POST",
                data: contactForm.serialize(),
                beforeSend: function () {
                    $target.html("<div style= 'color: #555;'><p>Loading ...</p></div>");
                },
                success: function (response) {
                    if (response.trim() === "success") {
                    
                        contactForm[0].reset();
                        $target.html("<div style= 'color: #555;'><p>Message has been sent successfully.</p></div>");
                        
                        // Add a delay and then fade out the success message after 3 seconds (adjust as needed)
                        setTimeout(function () {
                            $target.fadeOut();
                        }, 3000);
                    } else {
                    
                        $target.html("<div class='alert alert-danger'><p>" + response + "</p></div>");
                    }
                },
                error: function () {
                
                    $target.html("<div class='alert alert-danger'><p>There was an error. Please try again.</p></div>");
                }
            });

            return false; // Prevent the default form submission
        }
    </script>       
    <script>
    	var contactForm = $('#contact-page-form');
        if (contactForm.length) { 
                $('#contact-page-form').on('submit', function(e){ 
                var $this = $(this),
                    $target = contactForm.find('#ContactsuccessMessage');
                if (e.isDefaultPrevented()) {
                    $target.html("<div class='alert alert-success'><p>Please select all required field.</p></div>");
                } else {
                    $.ajax({
                        url: "contactUsmailer.php",
                        type: "POST",
                        data: contactForm.serialize(),
                        beforeSend: function () {
                            $target.html("<div style= 'color: #555;'><p>Loading ...</p></div>");
                        },
                        success: function (text) {
                            if (text === "Message has been sent successfully.") {
                                $this[0].reset();
                                $target.html("<div class='alert alert-success'><p>Message has been sent successfully.</p></div>");
                            } else {
                                $target.html("<div class='alert alert-success success-cls'><p>" + text + "</p></div>");
                            }
                        }
                    });
                    return false;
                }
            });
        }
    </script>
    <script>
        function submitContactForm() {
            var contactForm = $('#contact-page-form');
            var $target = contactForm.find('#ContactsuccessMessage');

            $.ajax({
                url: "contactUsmailer.php",
                type: "POST",
                data: contactForm.serialize(),
                beforeSend: function () {
                    $target.html("<div style= 'color: #555;'><p>Loading ...</p></div>");
                },
                success: function (response) {
                    if (response.trim() === "success") {
                        contactForm[0].reset();
                        $target.html("<div style= 'color: #555;'><p>Message has been sent successfully.</p></div>");
                        
                        // Add a delay and then fade out the success message after 3 seconds (adjust as needed)
                        setTimeout(function () {
                            $target.fadeOut();
                        }, 3000);
                    } else {
                        $target.html("<div class='alert alert-danger'><p>" + response + "</p></div>");
                    }
                },
                error: function () {
                    $target.html("<div class='alert alert-danger'><p>There was an error. Please try again.</p></div>");
                }
            });

            return false; // Prevent the default form submission
        }
    </script>
    <script>
    	var contactForm = $('#mortgage-process-form');
        if (contactForm.length) { 
                $('#mortgage-process-form').on('submit', function(e){ 
                var $this = $(this),
                    $target = contactForm.find('#successmortgageMessage');
                if (e.isDefaultPrevented()) {
                    $target.html("<div class='alert alert-success'><p>Please select all required field.</p></div>");
                } else {
                    $.ajax({
                        url: "mortgagemailer.php",
                        type: "POST",
                        data: contactForm.serialize(),
                        beforeSend: function () {
                            $target.html("<div style= 'color: #555;'><p>Loading ...</p></div>");
                        },
                        success: function (text) {
                            if (text === "Message has been sent successfully.") {
                                $this[0].reset();
                                $target.html("<div class='alert alert-success'><p>Message has been sent successfully.</p></div>");
                            } else {
                                $target.html("<div class='alert alert-success success-cls'><p>" + text + "</p></div>");
                            }
                        }
                    });
                    return false;
                }
            });
        }
    </script>
    <script>
        function submitMortgageForm() {
            var contactForm = $('#mortgage-process-form');
            var $target = contactForm.find('#successmortgageMessage');

            $.ajax({
                url: "mortgagemailer.php",
                type: "POST",
                data: contactForm.serialize(),
                beforeSend: function () {
                    $target.html("<div style= 'color: #555;'><p>Loading ...</p></div>");
                },
                success: function (response) {
                    if (response.trim() === "success") {
                        contactForm[0].reset();
                        $target.html("<div style= 'color: #555;'><p>Message has been sent successfully.</p></div>");
                        
                        // Add a delay and then fade out the success message after 3 seconds (adjust as needed)
                        setTimeout(function () {
                            $target.fadeOut();
                        }, 3000);
                    } else {
                        $target.html("<div class='alert alert-danger'><p>" + response + "</p></div>");
                    }
                },
                error: function () {
                    $target.html("<div class='alert alert-danger'><p>There was an error. Please try again.</p></div>");
                }
            });

            return false; // Prevent the default form submission
        }
    </script>
    <script>
    	var contactForm = $('#callback-form');
        if (contactForm.length) { 
                $('#callback-form').on('submit', function(e){ 
                var $this = $(this),
                    $target = contactForm.find('#callbacksuccessMessage');
                if (e.isDefaultPrevented()) {
                        $target.html("<div class='alert alert-success'><p>Please select all required field.</p></div>");
                } else {
                    $.ajax({
                        url: "callbackmailer.php",
                        type: "POST",
                        data: contactForm.serialize(),
                        beforeSend: function () {
                            $target.html("<div style= 'color: #555;'><p>Loading ...</p></div>");
                        },
                        success: function (text) {
                            if (text === "Message has been sent successfully.") {
                                $this[0].reset();
                                $target.html("<div class='alert alert-success'><p>Message has been sent successfully.</p></div>");
                            } else {
                                $target.html("<div class='alert alert-success success-cls'><p>" + text + "</p></div>");
                            }
                        }
                    });
                    return false;
                }
            });
        }
    </script>
    <script>
        function submitcallbackForm() {
            var contactForm = $('#callback-form');
            var $target = contactForm.find('#callbacksuccessMessage');

            $.ajax({
                url: "callbackmailer.php",
                type: "POST",
                data: contactForm.serialize(),
                beforeSend: function () {
                    $target.html("<div style= 'color: #555;'><p>Loading ...</p></div>");
                },
                success: function (response) {
                    if (response.trim() === "success") {
                        contactForm[0].reset();
                        $target.html("<div style= 'color: #555;'><p>Message has been sent successfully.</p></div>");
                        
                        // Add a delay and then fade out the success message after 3 seconds (adjust as needed)
                        setTimeout(function () {
                            $target.fadeOut();
                        }, 3000);
                    } else {
                        $target.html("<div class='alert alert-danger'><p>" + response + "</p></div>");
                    }
                },
                error: function () {
                    $target.html("<div class='alert alert-danger'><p>There was an error. Please try again.</p></div>");
                }
            });

            return false; // Prevent the default form submission
        }
    </script>
    <script>
        $(function() {
            var percentageRange = parseInt($('#percentageRange').val());

            $("#percentagerange").slider({
            range: "max",
            min: 20,
            max: 80, 
            value: percentageRange, 
            step: 1, 
            slide: function(event, ui) {
                $("#percentageRange").val(ui.value + " %");
                
                mortgageCalculator();
            }
            });
            $("#percentagerange").on("mousedown touchstart", function(event) {
                event.preventDefault(); // Prevent default action for mousedown/touchstart
            });
            $("#percentageRange").val( $("#percentagerange").slider("value") + " %");
        });

        $(function() {
            var price_range = parseInt($('#priceRange').val());
            
            $("#price-range").slider({
            range: "max",
            min: 1,
            max: 25, 
            value: price_range, 
            step: 1, 
            slide: function(event, ui) {
                $("#priceRange").val(ui.value + " years");

                mortgageCalculator();
            }
            });
            $("#price-range").on("mousedown touchstart", function(event) {
                event.preventDefault(); // Prevent default action for mousedown/touchstart
            });
            $("#priceRange").val( $("#price-range").slider("value") + " years");
        });
    </script>
    <script>

var QtyInput = (function () {
	var $qtyInputs = $(".qty-input");

	if (!$qtyInputs.length) {
		return;
	}

	var $inputs = $qtyInputs.find(".product-qty");
	var $countBtn = $qtyInputs.find(".qty-count");
	var qtyMin = parseInt($inputs.attr("min"));
	var qtyMax = parseInt($inputs.attr("max"));

	$inputs.change(function () {
		var $this = $(this);
		var $minusBtn = $this.siblings(".qty-count--minus");
		var $addBtn = $this.siblings(".qty-count--add");
		var qty = parseInt($this.val());

		if (isNaN(qty) || qty <= qtyMin) {
			$this.val(qtyMin);
			$minusBtn.attr("disabled", true);
		} else {
			$minusBtn.attr("disabled", false);
			
			if(qty >= qtyMax){
				$this.val(qtyMax);
				$addBtn.attr('disabled', true);
			} else {
				$this.val(qty);
				$addBtn.attr('disabled', false);
			}
		}
        mortgageCalculator();
	});

	$countBtn.click(function () {
		var operator = this.dataset.action;
		var $this   = $(this);
		var $input  = $this.siblings(".product-qty");
		var qty     = parseInt($input.val());

		if (operator == "add") {
			qty += 100000;
			if (qty >= qtyMin + 1) {
				$this.siblings(".qty-count--minus").attr("disabled", false);
			}

			if (qty >= qtyMax) {
				$this.attr("disabled", true);
			}
		} else {
			qty = qty <= qtyMin ? qtyMin : (qty -= 100000);
			
			if (qty == qtyMin) {
				$this.attr("disabled", true);
			}

			if (qty < qtyMax) {
				$this.siblings(".qty-count--add").attr("disabled", false);
			}
		}

		$input.val(qty);
        mortgageCalculator();
	});
})();

    </script>



<script>

    var QtyInput1 = (function () {
        var $qtyInputs1 = $(".qty-inputpercentage");
    
        if (!$qtyInputs1.length) {
            return;
        }
    
        var $inputs = $qtyInputs1.find(".product-qty1");
        var $countBtn = $qtyInputs1.find(".qty-count1");
        var qtyMin = parseFloat($inputs.attr("min"));
        var qtyMax = parseFloat($inputs.attr("max"));
    
        $inputs.change(function () {
            var $this = $(this);
            var $minusBtn = $this.siblings(".qty-count--minus");
            var $addBtn = $this.siblings(".qty-count--add");
            var qty = parseFloat($this.val());
    
            if (isNaN(qty) || qty <= qtyMin) {
                $this.val(qtyMin);
                $minusBtn.attr("disabled", true);
            } else {
                $minusBtn.attr("disabled", false);
                
                if(qty >= qtyMax){
                    $this.val(qtyMax);
                    $addBtn.attr('disabled', true);
                } else {
                    $this.val(qty);
                    $addBtn.attr('disabled', false);
                }
            }
            mortgageCalculator();
        });
    
        $countBtn.click(function () {
            var operator = this.dataset.action;
            var $this = $(this);
            var $input = $this.siblings(".product-qty1");
            var qty = parseFloat($input.val());
            
            if (operator == "add") {
                qty += 0.01;
                if (qty >= qtyMin + 1.5) {
                    $this.siblings(".qty-count--minus").attr("disabled", false);
                }
    
                if (qty >= qtyMax) {
                    $this.attr("disabled", true);
                }
                
            } else {
                if(qty == 2.59){
                    qty = qty.toFixed(1);
                }

                qty = qty <= qtyMin ? qtyMin : (qty -= 0.01);
                
                if (qty == qtyMin) {
                    $this.attr("disabled", true);
                }
    
                if (qty < qtyMax) {
                    $this.siblings(".qty-count--add").attr("disabled", false);
                }
            }
            
            $input.val(qty.toFixed(2));
            
            mortgageCalculator();
        });
    })();
    
    </script>
    <script>
        var input = document.querySelector("#phone");
        window.intlTelInput(input, {
            utilsScript: "country/js/utils.js",
        });
    </script>
    <script>
        function mortgageCalculator() {
            console.log('-------Mortgage calculator')
            var property_price  = parseFloat($('.product-qty').val());
            
            var down_perc       = $('#percentageRange').val();
            var get_perc        = parseInt(down_perc);
             
            var down_payment    = (get_perc / 100) * property_price;
            $('#price').val('AED '+ down_payment);
            $('.percentage-span').text(down_perc);
            $('.down-perc').val(down_perc);
            
            // -------------------

            var loanAmount          = property_price - down_payment;

            var no_of_years         = $("#priceRange").val(); 

            var interestRate        = $('.product-qty1').val();
            interestRate            = parseFloat(interestRate);

            var loanTermYears       = parseInt(no_of_years);

            var monthlyInterestRate = interestRate / (100 * 12);
            var totalPayments       = loanTermYears * 12;
            // Calculate monthly mortgage payment using the formula

            var monthlyPayment      = (loanAmount * monthlyInterestRate) / (1 - Math.pow(1 + monthlyInterestRate, -totalPayments));
            
            $("#property-price").text("AED " + property_price.toFixed(2));
            $("#monthly-pay").text("AED " + monthlyPayment.toFixed(2));
            $(".input-monthly-pay").val(monthlyPayment.toFixed(2));

            // -------------------
            var propPerc        = (4 / 100) * property_price;
            var landDeptFee     = propPerc + 580;

            $("#land-dept-fee").text("AED " + landDeptFee.toFixed(2)); 
            $("#loan-land-dept-fee").text("AED " + landDeptFee.toFixed(2)); 
            $(".input-land-dept-fee").val(landDeptFee.toFixed(2));

            var vat             = 210;
            if (property_price < 500000)
            {
                var trustee_fee = 2000 + vat;
            }
            else
            {
                var trustee_fee = 4200 + vat;
            }
            $("#trustee-fee").text("AED " + trustee_fee.toFixed(2)); 
            // $("#loan-trustee-fee").text("AED " + trustee_fee.toFixed(2)); 
            $(".input-trustee-fee").val(trustee_fee.toFixed(2));
            
            var mortgage_reg_fee= ((0.25 / 100) * property_price) + 290; //0.25% of the loan amount + AED 290 admin fee
            $("#mortgage-reg-fee").text("AED " + mortgage_reg_fee.toFixed(2)); 
            // $("#loan-mortgage-reg-fee").text("AED " + mortgage_reg_fee.toFixed(2)); 
            $(".input-mortgage-reg-fee").val(mortgage_reg_fee.toFixed(2));

            var one_perc_loan   = ((1 / 100) * down_payment);
            var five_perc_vat   = ((5 / 100) * one_perc_loan);
           
            var bank_pr_fee     = one_perc_loan + five_perc_vat; //Up to 1% of the loan amount + 5% VAT

            $("#bank-pr-fee").text("AED " + bank_pr_fee.toFixed(2));
            // $("#loan-bank-pr-fee").text("AED " + bank_pr_fee.toFixed(2));
            $(".input-bank-pr-fee").val(bank_pr_fee.toFixed(2));
             
            var valuation_fee   = 3150; //Paid to the bank for a basic inspection of your property.Between AED 2,500 and AED 3,500 + 5 VAT
            $("#valuation-fee").text("AED " + valuation_fee.toFixed(2));
            // $("#loan-valuation-fee").text("AED " + valuation_fee.toFixed(2));
            $(".input-valuation-fee").val(valuation_fee.toFixed(2));
            
            
            var totalRepayable      = down_payment + landDeptFee + trustee_fee + mortgage_reg_fee + bank_pr_fee + valuation_fee;
            
            $("#total-pay").text("AED " + totalRepayable.toFixed(2)); 
            $(".input-total-pay").val(totalRepayable.toFixed(2));

            // -------------------

            
            // ---- five years
            var interestRate        = $('.interest_rate_five').val();
            interestRate            = parseFloat(interestRate);

            var loanTermYears       = parseInt(no_of_years);

            var monthlyInterestRate = interestRate / (100 * 12);
            var totalPayments       = loanTermYears * 12;
            // Calculate monthly mortgage payment using the formula

            var monthlyPayment      = (loanAmount * monthlyInterestRate) / (1 - Math.pow(1 + monthlyInterestRate, -totalPayments));
            
            $("#monthly-pay-five").text("AED " + monthlyPayment.toFixed(2));
            $(".input-monthly-pay-five").val(monthlyPayment.toFixed(2));

            //
            var propPerc        = (4 / 100) * property_price;
            var landDeptFee     = propPerc + 580;

            $("#five-land-dept-fee").text("AED " + landDeptFee.toFixed(2)); 
            // $("#five-loan-land-dept-fee").text("AED " + landDeptFee.toFixed(2)); 
            $(".five-input-land-dept-fee").val(landDeptFee.toFixed(2));

            var vat             = 210;
            if (property_price < 500000)
            {
                var trustee_fee = 2000 + vat;
            }
            else
            {
                var trustee_fee = 4200 + vat;
            }
            $("#five-trustee-fee").text("AED " + trustee_fee.toFixed(2)); 
            // $("#five-loan-trustee-fee").text("AED " + trustee_fee.toFixed(2)); 
            $(".five-input-trustee-fee").val(trustee_fee.toFixed(2));
            
            var mortgage_reg_fee= ((0.25 / 100) * property_price) + 290; //0.25% of the loan amount + AED 290 admin fee
            $("#five-mortgage-reg-fee").text("AED " + mortgage_reg_fee.toFixed(2)); 
            // $("#five-loan-mortgage-reg-fee").text("AED " + mortgage_reg_fee.toFixed(2)); 
            $(".five-input-mortgage-reg-fee").val(mortgage_reg_fee.toFixed(2));

            var one_perc_loan   = ((1 / 100) * down_payment);
            var five_perc_vat   = ((5 / 100) * one_perc_loan);
           
            var bank_pr_fee     = one_perc_loan + five_perc_vat; //Up to 1% of the loan amount + 5% VAT

            $("#five-bank-pr-fee").text("AED " + bank_pr_fee.toFixed(2));
            // $("#five-loan-bank-pr-fee").text("AED " + bank_pr_fee.toFixed(2));
            $(".five-input-bank-pr-fee").val(bank_pr_fee.toFixed(2));
             
            var valuation_fee   = 3150; //Paid to the bank for a basic inspection of your property.Between AED 2,500 and AED 3,500 + 5 VAT
            $("#five-valuation-fee").text("AED " + valuation_fee.toFixed(2));
            // $("#five-loan-valuation-fee").text("AED " + valuation_fee.toFixed(2));
            $(".five-input-valuation-fee").val(valuation_fee.toFixed(2));

            // ---- variable rate--------------------
            var interestRate        = $('.variable_rate').val();
            interestRate            = parseFloat(interestRate);

            var loanTermYears       = parseInt(no_of_years);

            var monthlyInterestRate = interestRate / (100 * 12);
            var totalPayments       = loanTermYears * 12;
            // Calculate monthly mortgage payment using the formula

            var monthlyPayment      = (loanAmount * monthlyInterestRate) / (1 - Math.pow(1 + monthlyInterestRate, -totalPayments));
            
            $("#monthly-pay-variable-rate").text("AED " + monthlyPayment.toFixed(2));
            $(".input-monthly-pay-variable-rate").val(monthlyPayment.toFixed(2));

            //
            var propPerc        = (4 / 100) * property_price;
            var landDeptFee     = propPerc + 580;

            $("#variable-land-dept-fee").text("AED " + landDeptFee.toFixed(2)); 
            // $("#variable-loan-land-dept-fee").text("AED " + landDeptFee.toFixed(2)); 
            $(".variable-input-land-dept-fee").val(landDeptFee.toFixed(2));

            var vat             = 210;
            if (property_price < 500000)
            {
                var trustee_fee = 2000 + vat;
            }
            else
            {
                var trustee_fee = 4200 + vat;
            }
            $("#variable-trustee-fee").text("AED " + trustee_fee.toFixed(2)); 
            // $("#variable-loan-trustee-fee").text("AED " + trustee_fee.toFixed(2)); 
            $(".variable-input-trustee-fee").val(trustee_fee.toFixed(2));
            
            var mortgage_reg_fee= ((0.25 / 100) * property_price) + 290; //0.25% of the loan amount + AED 290 admin fee
            $("#variable-mortgage-reg-fee").text("AED " + mortgage_reg_fee.toFixed(2)); 
            // $("#variable-loan-mortgage-reg-fee").text("AED " + mortgage_reg_fee.toFixed(2)); 
            $(".variable-input-mortgage-reg-fee").val(mortgage_reg_fee.toFixed(2));

            var one_perc_loan   = ((1 / 100) * down_payment);
            var five_perc_vat   = ((5 / 100) * one_perc_loan);
           
            var bank_pr_fee     = one_perc_loan + five_perc_vat; //Up to 1% of the loan amount + 5% VAT

            $("#variable-bank-pr-fee").text("AED " + bank_pr_fee.toFixed(2));
            // $("#variable-loan-bank-pr-fee").text("AED " + bank_pr_fee.toFixed(2));
            $(".variable-input-bank-pr-fee").val(bank_pr_fee.toFixed(2));
             
            var valuation_fee   = 3150; //Paid to the bank for a basic inspection of your property.Between AED 2,500 and AED 3,500 + 5 VAT
            $("#variable-valuation-fee").text("AED " + valuation_fee.toFixed(2));
            // $("#variable-loan-valuation-fee").text("AED " + valuation_fee.toFixed(2));
            $(".variable-input-valuation-fee").val(valuation_fee.toFixed(2));
            //
        }
    </script>
    <!-- <script>
        $(document).ready(function() {
            $(".alert").fadeTo(8000, 1000).slideUp(900, function(){
                $(".alert").slideUp(900);
            });
        });
    </script> -->
</body>
</html>