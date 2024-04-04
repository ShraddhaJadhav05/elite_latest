
<x-guest-layout>

    <link rel="shortcut icon" href="{{ asset('staffbackend/assets/images/favicon.ico') }}" />
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="{{ asset('staffbackend/assets/css/bootstrap.min.css') }}">
        <!-- Typography CSS -->
        <link rel="stylesheet" href="{{ asset('staffbackend/assets/css/typography.css') }}">
        <!-- Style CSS -->
        <link rel="stylesheet" href="{{ asset('staffbackend/assets/css/style.css') }}">
        <!-- Responsive CSS -->
        <link rel="stylesheet" href="{{ asset('staffbackend/assets/css/responsive.css') }}">
        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />


        <form method="POST" action="{{ route('login') }}">
            @csrf
            <section class="sign-in-page">
            <div class="container bg-white p-0">
                <div class="row no-gutters">
                    <div class="col-sm-6 align-self-center">
                        <div class="sign-in-from">
                            <h1 class="mb-0 dark-signin">Sign in</h1>
                            <p>Enter your email address and password to access admin panel.</p>
                            <form class="mt-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Email address</label>
                                        <input type="email" class="form-control mb-0" id="email" name="email" placeholder="Enter email">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Password</label>

                                        <input type="password" class="form-control mb-0" id="password" name="password" placeholder="Password">
                                        <div class="flex items-center justify-end mt-4">
                                            @if (Route::has('password.request'))
                                                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                                    href="{{ route('password.request') }}">
                                                    {{ __('Forgot your password?') }}
                                                </a>
                                            @endif


                                        </div>
                                    </div>
                                    <div class="d-inline-block w-100">
                                        <div class="custom-control custom-checkbox d-inline-block mt-2 pt-1">
                                            <input type="checkbox" class="custom-control-input" id="customCheck1">
                                            <label class="custom-control-label" for="customCheck1">Remember Me</label>
                                        </div>
                                        <button type="submit" class="btn btn-primary float-right">Sign in</button>
                                    </div>

                                </form>
                        </div>
                    </div>
                    <div class="col-sm-6 text-center">
                        <div class="sign-in-detail text-white">
                            <a class="sign-in-logo mb-5" href="#"><img src="{{ asset('staffbackend/assets/images/elite-images/elite-logo-signup.png') }}" class="img-fluid" alt="logo"></a>
                            <div class="slick-slider11" data-autoplay="true" data-loop="true" data-nav="false" data-dots="true" data-items="1" data-items-laptop="1" data-items-tab="1" data-items-mobile="1" data-items-mobile-sm="1" data-margin="0">
                                <div class="item">
                                    <img src="{{ asset('staffbackend/assets/images/elite-images/login.png') }}" class="img-fluid mb-4" alt="logo">
                                    <h4 class="mb-1 text-white">Lorem ipsum dolor sit amet</h4>
                                    <p> consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat</p>
                                </div>
                                <div class="item">
                                    <img src="{{ asset('staffbackend/assets/images/elite-images/login.png') }}" class="img-fluid mb-4" alt="logo">
                                    <h4 class="mb-1 text-white">Lorem ipsum dolor sit amet</h4>
                                    <p>consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat</p>
                                </div>
                                <div class="item">
                                    <img src="{{ asset('staffbackend/assets/images/elite-images/login.png') }}" class="img-fluid mb-4" alt="logo">
                                    <h4 class="mb-1 text-white">Lorem ipsum dolor sit amet</h4>
                                    <p>consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

            
        </form>

        
        <script src="{{ asset('staffbackend/assets/js/jquery.min.js') }}"></script>
        <script src="{{ asset('staffbackend/assets/js/popper.min.js') }}"></script>
        <script src="{{ asset('staffbackend/assets/js/bootstrap.min.js') }}"></script>
        <!-- Appear JavaScript -->
        <script src="{{ asset('staffbackend/assets/js/jquery.appear.js') }}"></script>
        <!-- Countdown JavaScript -->
        <script src="{{ asset('staffbackend/assets/js/countdown.min.js') }}"></script>
        <!-- Counterup JavaScript -->
        <script src="{{ asset('staffbackend/assets/js/waypoints.min.js') }}"></script>
        <script src="{{ asset('staffbackend/assets/js/jquery.counterup.min.js') }}"></script>
        <!-- Wow JavaScript -->
        <script src="{{ asset('staffbackend/assets/js/wow.min.js') }}"></script>
        <!-- Apexcharts JavaScript -->
        <script src="{{ asset('staffbackend/assets/js/apexcharts.js') }}"></script>
        <!-- Slick JavaScript -->
        <script src="{{ asset('staffbackend/assets/js/slick.min.js') }}"></script>
        <!-- Select2 JavaScript -->
        <script src="{{ asset('staffbackend/assets/js/select2.min.js') }}"></script>
        <!-- Owl Carousel JavaScript -->
        <script src="{{ asset('staffbackend/assets/js/owl.carousel.min.js') }}"></script>
        <!-- Magnific Popup JavaScript -->
        <script src="{{ asset('staffbackend/assets/js/jquery.magnific-popup.min.js') }}"></script>
        <!-- Smooth Scrollbar JavaScript -->
        <script src="{{ asset('staffbackend/assets/js/smooth-scrollbar.js') }}"></script>
        <!-- Chart Custom JavaScript -->
        <script src="{{ asset('staffbackend/assets/js/chart-custom.js') }}"></script>
        <!-- Custom JavaScript -->
        <script src="{{ asset('staffbackend/assets/js/custom.js') }}"></script>
    </x-guest-layout>
</body>
</html>
