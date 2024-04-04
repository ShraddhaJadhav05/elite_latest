<!doctype html>
<html lang="en">
   <head>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>Elite Capital Mortgage Consultant - finance your new home in UAE</title>
      <!-- Favicon -->
      <link rel="shortcut icon" href="{{ asset('adminbackend/assets/images/elite-images/favicon.png') }}" />
      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="{{ asset('adminbackend/assets/css/bootstrap.min.css') }}">
      <!-- Typography CSS -->
      <link rel="stylesheet" href="{{ asset('adminbackend/assets/css/typography.css') }}">
      <!-- Style CSS -->
      <link rel="stylesheet" href="{{ asset('adminbackend/assets/css/style.css') }}">
      <!-- Responsive CSS -->
      <link rel="stylesheet" href="{{ asset('adminbackend/assets/css/responsive.css') }}">

      <link rel="stylesheet" href="{{ asset('adminbackend/assets/https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css') }}">
      <link rel="stylesheet" href="{{ asset('adminbackend/assets/css/swiper-bundle.min.css') }}">

      <!-- Include jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- Include Toastr CSS and JS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

   </head>
   <body>

      <!-- Wrapper Start -->
      <div class="wrapper">
         <!-- Sidebar  -->
         @include('banks_and_products.body.sidebar')
         <!-- TOP Nav Bar -->
         @include('banks_and_products.body.heder')
         <!-- TOP Nav Bar END -->
      <!-- Page Content  -->
   <div id="content-page" class="content-page">
    @yield('banks_and_products')
   </div>
   </div>
   <!-- Wrapper END -->
    <!-- Footer -->
   <!-- Footer -->
   @include('banks_and_products.body.footer')

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
 <!-- Owl Carousel JavaScript -->
 <script src="{{ asset('adminbackend/assets/js/owl.carousel.min.js') }}"></script>
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
 <!-- Flatpicker Js -->
 <script src="{{ asset('adminbackend/assets/https://cdn.jsdelivr.net/npm/flatpickr') }}"></script>
 <!-- Chart Custom JavaScript -->
 <script src="{{ asset('adminbackend/assets/js/chart-custom.js') }}"></script>
 <!-- Custom JavaScript -->
 <script src="{{ asset('adminbackend/assets/js/custom.js') }}"></script>
 <!-- swiper -->
 <script src="{{ asset('adminbackend/assets/js/swiper.min.js') }}"></script>
 <script src="{{ asset('adminbackend/assets/js/slider.js') }}"> </script>
 <script>
    $(document).ready(function() {
        $('.delete-bank').on('click', function(event) {
            event.preventDefault(); // Prevent the default link behavior

            // Get the URL from the href attribute of the clicked link
            var deleteUrl = $(this).attr('href');

            // Directly perform the AJAX request to delete
            $.ajax({
                url: deleteUrl,
                type: 'POST', // Change to 'DELETE' if your route supports it. You might need to adjust according to your backend setup.
                data: {
                    "_token": "{{ csrf_token() }}",
                    "_method": "DELETE" // Laravel uses this to simulate DELETE requests over POST
                },
                success: function(result) {
                    toastr.success('Bank deleted successfully');
                    location.reload(); // Or use jQuery to remove the row without reloading
                },
                error: function() {
                    toastr.error('Error deleting the bank');
                }
            });
        });
    });
    </script>




</body>
</html>
