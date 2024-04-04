<!doctype html>
<html lang="en">

<head>
   <!-- Required meta tags -->
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <title>Elite Capital Mortgage Consultant - finance your new home in UAE</title>
   <!-- Favicon -->
   <link rel="shortcut icon" href="{{ asset('staffbackend/assets/images/elite-images/favicon.png') }}" />
   <!-- Bootstrap CSS -->
   <link rel="stylesheet" href="{{ asset('staffbackend/assets/css/bootstrap.min.css') }}">
   <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/themes/smoothness/jquery-ui.css">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css">
   <!-- Typography CSS -->
   <link rel="stylesheet" href="{{ asset('staffbackend/assets/css/typography.css') }}">
   <!-- Style CSS -->
   <link rel="stylesheet" href="{{ asset('staffbackend/assets/css/style.css') }}">
   <!-- Responsive CSS -->
   <link rel="stylesheet" href="{{ asset('staffbackend/assets/css/responsive.css') }}">
   
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
   <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined" rel="stylesheet">
   
 
</head>
   
   <body>
      <!-- Wrapper Start -->
      <div class="wrapper">
         <!-- Sidebar  -->
         @include('staff.body.sidebar')
         <!-- TOP Nav Bar -->
         @include('staff.body.header')
         <!-- TOP Nav Bar END -->
         <!-- Page Content  -->
         <div id="content-page" class="content-page">
           @yield('staff')
         </div>
      </div>
      <!-- Wrapper END -->
      <!-- Footer -->
      @include('staff.body.footer')
      
      <!-- Footer END -->
      <!-- Optional JavaScript -->
      <!-- jQuery first, then Popper.js, then Bootstrap JS -->
      <script src="{{ asset('staffbackend/assets/js/jquery.min.js') }}"></script>
       <!-- Rtl and Darkmode -->
       <script src="{{ asset('staffbackend/assets/js/rtl.js') }}"></script>
       <script src="{{ asset('staffbackend/assets/js/customizer.js') }}"></script>
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
      <!-- lottie JavaScript -->
      <script src="{{ asset('staffbackend/assets/js/lottie.js') }}"></script>
      <!-- am core JavaScript -->
      <script src="{{ asset('staffbackend/assets/js/core.js') }}"></script>
      <!-- am charts JavaScript -->
      <script src="{{ asset('staffbackend/assets/js/charts.js') }}"></script>
      <!-- am animated JavaScript -->
      <script src="{{ asset('staffbackend/assets/js/animated.js') }}"></script>
      <!-- am kelly JavaScript -->
      <script src="{{ asset('staffbackend/assets/js/kelly.js') }}"></script>
      <!-- Flatpicker Js -->
      <script src="{{ asset('staffbackend/assets/https://cdn.jsdelivr.net/npm/flatpickr') }}"></script>
      <!-- Chart Custom JavaScript -->
      <script src="{{ asset('staffbackend/assets/js/chart-custom.js') }}"></script>
      <script src="{{ asset('staffbackend/assets/js/rangeslider.js') }}"></script>
      <!-- Custom JavaScript -->
      <script src="{{ asset('staffbackend/assets/js/custom.js') }}"></script>


       <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <!-- Include Popper.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <!-- Include Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Include DataTables JS -->
    <script src="https://cdn.datatables.net/2.0.3/js/dataTables.js"></script>
    <!-- Include DataTables Bootstrap 4 JS -->
    <script src="https://cdn.datatables.net/2.0.3/js/dataTables.bootstrap4.js"></script>



    <script>
    new DataTable('#user-list-table');
    </script>
     


      <script>
         var isAdvancedUpload = function() {
            var div = document.createElement('div');
            return (('draggable' in div) || ('ondragstart' in div && 'ondrop' in div)) && 'FormData' in window && 'FileReader' in window;
          }();
          
          let draggableFileArea = document.querySelector(".drag-file-area");
          let browseFileText = document.querySelector(".browse-files");
          let uploadIcon = document.querySelector(".upload-icon");
          let dragDropText = document.querySelector(".dynamic-message");
          let fileInput = document.querySelector(".default-file-input");
          let cannotUploadMessage = document.querySelector(".cannot-upload-message");
          let cancelAlertButton = document.querySelector(".cancel-alert-button");
          let uploadedFile = document.querySelector(".file-block");
          let fileName = document.querySelector(".file-name");
          let fileSize = document.querySelector(".file-size");
          let progressBar = document.querySelector(".progress-bar");
          let removeFileButton = document.querySelector(".remove-file-icon");
          let uploadButton = document.querySelector(".upload-button");
          let fileFlag = 0;
          
          fileInput.addEventListener("click", () => {
             fileInput.value = '';
             console.log(fileInput.value);
          });
          
          fileInput.addEventListener("change", e => {
             console.log(" > " + fileInput.value)
             uploadIcon.innerHTML = 'check_circle';
             dragDropText.innerHTML = 'File Dropped Successfully!';
             document.querySelector(".label").innerHTML = `drag & drop or <span class="browse-files"> <input type="file" class="default-file-input" style=""/> <span class="browse-files-text" style="top: 0;"> browse file</span></span>`;
             uploadButton.innerHTML = `Upload`;
             fileName.innerHTML = fileInput.files[0].name;
             fileSize.innerHTML = (fileInput.files[0].size/1024).toFixed(1) + " KB";
             uploadedFile.style.cssText = "display: flex;";
             progressBar.style.width = 0;
             fileFlag = 0;
          });
          
          uploadButton.addEventListener("click", () => {
             let isFileUploaded = fileInput.value;
             if(isFileUploaded != '') {
                if (fileFlag == 0) {
                    fileFlag = 1;
                    var width = 0;
                    var id = setInterval(frame, 50);
                    function frame() {
                         if (width >= 390) {
                           clearInterval(id);
                         uploadButton.innerHTML = `<span class="material-icons-outlined upload-button-icon"> check_circle </span> Uploaded`;
                         } else {
                           width += 5;
                           progressBar.style.width = width + "px";
                         }
                    }
                  }
             } else {
                cannotUploadMessage.style.cssText = "display: flex; animation: fadeIn linear 1.5s;";
             }
          });
          
          cancelAlertButton.addEventListener("click", () => {
             cannotUploadMessage.style.cssText = "display: none;";
          });
          
          if(isAdvancedUpload) {
             ["drag", "dragstart", "dragend", "dragover", "dragenter", "dragleave", "drop"].forEach( evt => 
                draggableFileArea.addEventListener(evt, e => {
                   e.preventDefault();
                   e.stopPropagation();
                })
             );
          
             ["dragover", "dragenter"].forEach( evt => {
                draggableFileArea.addEventListener(evt, e => {
                   e.preventDefault();
                   e.stopPropagation();
                   uploadIcon.innerHTML = 'file_download';
                   dragDropText.innerHTML = 'Drop your file here!';
                });
             });
          
             draggableFileArea.addEventListener("drop", e => {
                uploadIcon.innerHTML = 'check_circle';
                dragDropText.innerHTML = 'File Dropped Successfully!';
                document.querySelector(".label").innerHTML = `drag & drop or <span class="browse-files"> <input type="file" class="default-file-input" style=""/> <span class="browse-files-text" style="top: -23px; left: -20px;"> browse file</span> </span>`;
                uploadButton.innerHTML = `Upload`;
                
                let files = e.dataTransfer.files;
                fileInput.files = files;
                console.log(files[0].name + " " + files[0].size);
                console.log(document.querySelector(".default-file-input").value);
                fileName.innerHTML = files[0].name;
                fileSize.innerHTML = (files[0].size/1024).toFixed(1) + " KB";
                uploadedFile.style.cssText = "display: flex;";
                progressBar.style.width = 0;
                fileFlag = 0;
             });
          }
          
          removeFileButton.addEventListener("click", () => {
             uploadedFile.style.cssText = "display: none;";
             fileInput.value = '';
             uploadIcon.innerHTML = 'file_upload';
             dragDropText.innerHTML = 'Drag & drop any file here';
             document.querySelector(".label").innerHTML = `or <span class="browse-files"> <input type="file" class="default-file-input"/> <span class="browse-files-text">browse file</span> <span>from device</span> </span>`;
             uploadButton.innerHTML = `Upload`;
          });</script>
    
    
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
          });
       
          $countBtn.click(function () {
             var operator = this.dataset.action;
             var $this = $(this);
             var $input = $this.siblings(".product-qty");
             var qty = parseInt($input.val());
       
             if (operator == "add") {
                qty += 10000;
                if (qty >= qtyMin + 1) {
                   $this.siblings(".qty-count--minus").attr("disabled", false);
                }
       
                if (qty >= qtyMax) {
                   $this.attr("disabled", true);
                }
             } else {
                qty = qty <= qtyMin ? qtyMin : (qty -= 10000);
                
                if (qty == qtyMin) {
                   $this.attr("disabled", true);
                }
       
                if (qty < qtyMax) {
                   $this.siblings(".qty-count--add").attr("disabled", false);
                }
             }
       
             $input.val(qty);
          });
       })();
       
    </script>
    
    <script>
       $(function() {
           $("#percentagerange").slider({
           range: "max",
           min: 20,
           max: 80, 
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
    
    
    
    
       $(function() {
           $("#price-range").slider({
           range: "max",
           min: 1,
           max: 25, 
           value: 12, 
           step: 1, 
           slide: function(event, ui) {
               $("#priceRange").val(ui.value + " year");
           }
           });
           $("#price-range").on("mousedown touchstart", function(event) {
               event.preventDefault(); // Prevent default action for mousedown/touchstart
           });
           $("#priceRange").val( $("#price-range").slider("value") + " year");
       });
    </script>
    <script>
    
       var QtyInput1 = (function () {
           var $qtyInputs1 = $(".qty-inputpercentage");
       
           if (!$qtyInputs1.length) {
               return;
           }
       
           var $inputs = $qtyInputs1.find(".product-qty1");
           var $countBtn = $qtyInputs1.find(".qty-count1");
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
           });
       
           $countBtn.click(function () {
               var operator = this.dataset.action;
               var $this = $(this);
               var $input = $this.siblings(".product-qty1");
               var qty = parseInt($input.val());
       
               if (operator == "add") {
                   qty += 2.5;
                   if (qty >= qtyMin + 1.5) {
                       $this.siblings(".qty-count--minus").attr("disabled", false);
                   }
       
                   if (qty >= qtyMax) {
                       $this.attr("disabled", true);
                   }
               } else {
                   qty = qty <= qtyMin ? qtyMin : (qty -= 1.5);
                   
                   if (qty == qtyMin) {
                       $this.attr("disabled", true);
                   }
       
                   if (qty < qtyMax) {
                       $this.siblings(".qty-count--add").attr("disabled", false);
                   }
               }
       
               $input.val(qty);
           });
       })();
       
    </script>
   </body>
</html>