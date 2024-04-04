
<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Elite Capital Mortgage Consultant - finance your new home in UAE</title>
        <!-- Favicon -->
        <link rel="shortcut icon" href="{{ asset('mortgage/client/images/elite-images/favicon.png') }}" />
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="{{ asset('mortgage/client/css/bootstrap.min.css') }}">
        <!-- Typography CSS -->
        <link rel="stylesheet" href="{{ asset('mortgage/client/css/typography.css') }}">
        <!-- Style CSS -->
        <link rel="stylesheet" href="{{ asset('mortgage/client/css/style.css') }}">
        <!-- Responsive CSS -->
        <link rel="stylesheet" href="{{ asset('mortgage/client/css/responsive.css') }}">
  
     </head>
   <body>
        <!-- Sign in Start -->
        <section class="sign-in-page">
            <div class="container bg-white p-0">
                <div class="row no-gutters">
                    <div class="col-sm-6 align-self-center">
                        <div class="sign-in-from">
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
                            <form method="POST" action="{{route('optVerificationForgotPassword')}}">
                                @csrf
                                <h1 class="mb-0 dark-signin">Verify</h1>
                                <p>Enter OTP received in your email {{$masked_email}}</p>
                                <div class="otp-field mb-4">
                                    <input type="number" class="otp"/>
                                    <input type="number" class="otp" disabled />
                                    <input type="number" class="otp" disabled />
                                    <input type="number" class="otp" disabled />
                                    <input type="number" class="otp" disabled />
                                    <input type="number" class="otp" disabled />
                                </div>
                                <input type="hidden" name="otp" id="otp">

                                <button type="submit" class="btn btn-primary mb-3">
                                    Verify
                                </button>
                    
                                <p class="resend text-muted mb-0">
                                    Didn't receive code? <a href="">Request again</a>
                                </p>
                            </form>
                        </div>
                    </div>
                    <div class="col-sm-6 text-center">
                        <div class="sign-in-detail text-white">
                            <a class="sign-in-logo mb-5" href="#"><img src="{{ asset('mortgage/client/images/elite-images/elite-logo-signup.png') }}" class="img-fluid" alt="logo"></a>
                            <div class="">
                                <div class="item">
                                    <img src="{{ asset('mortgage/client/images/elite-images/password-reset.png') }}" class="img-fluid" alt="Elite">
                                    <h4 class="mb-1 text-white">Lorem ipsum dolor sit amet</h4>
                                    <p> consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <script src="{{ asset('mortgage/client/js/jquery.min.js') }}"></script>
        <script src="{{ asset('mortgage/client/js/popper.min.js') }}"></script>
        <script src="{{ asset('mortgage/client/js/bootstrap.min.js') }}"></script>
        <!-- Appear JavaScript -->
        <script src="{{ asset('mortgage/client/js/jquery.appear.js') }}"></script>
        <!-- Countdown JavaScript -->
        <script src="{{ asset('mortgage/client/js/countdown.min.js') }}"></script>
        <!-- Counterup JavaScript -->
        <script src="{{ asset('mortgage/client/js/waypoints.min.js') }}"></script>
        <script src="{{ asset('mortgage/client/js/jquery.counterup.min.js') }}"></script>
        <!-- Wow JavaScript -->
        <script src="{{ asset('mortgage/client/js/wow.min.js') }}"></script>
        <!-- Apexcharts JavaScript -->
        <script src="{{ asset('mortgage/client/js/apexcharts.js') }}"></script>
        <!-- Slick JavaScript -->
        <script src="{{ asset('mortgage/client/js/slick.min.js') }}"></script>
        <!-- Select2 JavaScript -->
        <script src="{{ asset('mortgage/client/js/select2.min.js') }}"></script>
        <!-- Owl Carousel JavaScript -->
        <script src="{{ asset('mortgage/client/js/owl.carousel.min.js') }}"></script>
        <!-- Magnific Popup JavaScript -->
        <script src="{{ asset('mortgage/client/js/jquery.magnific-popup.min.js') }}"></script>
        <!-- Smooth Scrollbar JavaScript -->
        <script src="{{ asset('mortgage/client/js/smooth-scrollbar.js') }}"></script>
        <!-- Chart Custom JavaScript -->
        <script src="{{ asset('mortgage/client/js/chart-custom.js') }}"></script>
        <!-- Custom JavaScript -->
        <script src="{{ asset('mortgage/client/js/custom.js') }}"></script>
        <script>
            const inputs = document.querySelectorAll(".otp-field > input");
            const button = document.querySelector(".btn");

            window.addEventListener("load", () => inputs[0].focus());
            button.setAttribute("disabled", "disabled");

            inputs[0].addEventListener("paste", function (event) {
                event.preventDefault();

                const pastedValue = (event.clipboardData || window.clipboardData).getData(
                    "text"
                );
                const otpLength = inputs.length;

                for (let i = 0; i < otpLength; i++) {
                    if (i < pastedValue.length) {
                        inputs[i].value = pastedValue[i];
                        inputs[i].removeAttribute("disabled");
                        inputs[i].focus;
                    } else {
                        inputs[i].value = ""; // Clear any remaining inputs
                        inputs[i].focus;
                    }
                }
            });

            inputs.forEach((input, index1) => {
                input.addEventListener("keyup", (e) => {
                    const currentInput = input;
                    const nextInput = input.nextElementSibling;
                    const prevInput = input.previousElementSibling;

                    if (currentInput.value.length > 1) {
                        currentInput.value = "";
                        return;
                    }

                    if (
                        nextInput &&
                        nextInput.hasAttribute("disabled") &&
                        currentInput.value !== ""
                    ) {
                        nextInput.removeAttribute("disabled");
                        nextInput.focus();
                    }

                    if (e.key === "Backspace") {
                        inputs.forEach((input, index2) => {
                            if (index1 <= index2 && prevInput) {
                                input.setAttribute("disabled", true);
                                input.value = "";
                                prevInput.focus();
                            }
                        });
                    }

                    button.classList.remove("active");
                    button.setAttribute("disabled", "disabled");

                    updateHiddenInput();

                    const inputsNo = inputs.length;
                    if (!inputs[inputsNo - 1].disabled && inputs[inputsNo - 1].value !== "") {
                        button.classList.add("active");
                        button.removeAttribute("disabled");

                        return;
                    }
                });
                
            });

            function updateHiddenInput() {
                var otpInputs   = document.querySelectorAll('.otp');
                var hiddenInput = document.getElementById('otp');
                var otpValue = '';
                otpInputs.forEach(function(input) {
                    otpValue += input.value;
                });
                hiddenInput.value = otpValue;

                console.log('------------');
                console.log(otpValue);
            }
        </script>
   </body>
</html>