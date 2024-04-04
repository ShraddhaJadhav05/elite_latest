<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Vito - Responsive Bootstrap 4 Admin Dashboard Template</title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('adminbackend/assets/images/favicon.ico') }}" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('adminbackend/assets/css/bootstrap.min.css') }}">
    <!-- Chart list Js -->
    <link rel="stylesheet" href="{{ asset('adminbackend/assets/./js/chartist/chartist.min.css') }}">
    <!-- Typography CSS -->
    <link rel="stylesheet" href="{{ asset('adminbackend/assets/css/typography.css') }}">
    <!-- Style CSS -->
    <link rel="stylesheet" href="{{ asset('adminbackend/assets/css/style.css') }}">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="{{ asset('adminbackend/assets/css/responsive.css') }}">
    
    <link rel="stylesheet" href=" https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js ">

    
</head>

<body class="sidebar-main-active right-column-fixed header-top-bgcolor">
    <!-- loader Start -->
    <div id="loading">
        <div id="loading-center">
        </div>
    </div>
    <!-- loader END -->
    <!-- Wrapper Start -->
    <div class="wrapper">
        <!-- Sidebar  -->
        @include('user.body.sidebar')
        <!-- TOP Nav Bar -->
        @include('user.body.header')
        <!-- TOP Nav Bar END -->
        <!-- Page Content  -->
        <div id="content-page" class="content-page">
            @yield('user')
        </div>
    </div>


    <!-- Wrapper END -->
    <!-- Footer -->
    @include('user.body.footer')
    <!-- Footer END -->
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->

    <script src="{{ asset('adminbackend/assets/js/jquery.min.js') }}"></script>
    <!-- Rtl and Darkmode -->
    <script src="{{ asset('adminbackend/assets/js/rtl.js') }}"></script>
    <script src="{{ asset('adminbackend/assets/js/customizer.js') }}"></script>
    <script src="{{ asset('adminbackend/assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('adminbackend/assets/js/bootstrap.min.js') }}"></script>
    <!-- Appear JavaScript -->
    <script src="{{ asset('adminbackend/assets/js/jquery.appear.js') }}"></script>
    <!-- Countdown JavaScript -->
    <script src="{{ asset('adminbackend/assets/js/countdown.min.js') }}"></script>
    <!-- Counterup JavaScript -->
    <script src="{{ asset('adminbackend/assets/js/waypoints.min.js') }}"></script>
    <script src="{{ asset('adminbackend/assets/js/jquery.counterup.min.js') }}"></script>
    <!-- Wow JavaScript -->
    <script src="{{ asset('adminbackend/assets/js/wow.min.js') }}"></script>
    <!-- Apexcharts JavaScript -->
    <script src="{{ asset('adminbackend/assets/js/apexcharts.js') }}"></script>
    <!-- Slick JavaScript -->
    <script src="{{ asset('adminbackend/assets/js/slick.min.js') }}"></script>
    <!-- Select2 JavaScript -->
    <script src="{{ asset('adminbackend/assets/js/select2.min.js') }}"></script>
    <!-- Magnific Popup JavaScript -->
    <script src="{{ asset('adminbackend/assets/js/jquery.magnific-popup.min.js') }}"></script>
    <!-- Smooth Scrollbar JavaScript -->
    <script src="{{ asset('adminbackend/assets/js/smooth-scrollbar.js') }}"></script>
    <!-- lottie JavaScript -->
    <script src="{{ asset('adminbackend/assets/js/lottie.js') }}"></script>
    <!-- am core JavaScript -->
    <script src="{{ asset('adminbackend/assets/js/core.js') }}"></script>
    <!-- am charts JavaScript -->
    <script src="{{ asset('adminbackend/assets/js/charts.js') }}"></script>
    <!-- am animated JavaScript -->
    <script src="{{ asset('adminbackend/assets/js/animated.js') }}"></script>
    <!-- am kelly JavaScript -->
    <script src="{{ asset('adminbackend/assets/js/kelly.js') }}"></script>
    <!-- Morris JavaScript -->
    <script src="{{ asset('adminbackend/assets/js/morris.js') }}"></script>
    <!-- am maps JavaScript -->
    <script src="{{ asset('adminbackend/assets/js/maps.js') }}"></script>
    <!-- am worldLow JavaScript -->
    <script src="{{ asset('adminbackend/assets/js/worldLow.js') }}"></script>
    <!-- ChartList Js -->
    <script src="{{ asset('adminbackend/assets/js/chartist/chartist.min.js') }}"></script>
    <!-- Chart Custom JavaScript -->
    <script async src="{{ asset('adminbackend/assets/js/chart-custom.js') }}"></script>
    <!-- Custom JavaScript -->
    <script src="{{ asset('adminbackend/assets/js/custom.js') }}"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"></script>

</body>

</html>
