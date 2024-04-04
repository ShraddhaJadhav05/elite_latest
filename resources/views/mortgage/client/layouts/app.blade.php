@php
    // Get the current route name or URL
    $currentRoute    = Route::current()->getName();
    $currentUrl      = url()->current();

    $routeSegments   = explode('.', $currentRoute);
    $firstSegment    = $routeSegments[0];
    $secondSegment  = isset($routeSegments[1]) ? $routeSegments[1] : null;

@endphp

@php
$client_id = session()->get('client_id');

// Retrieve the last 4 notifications for the client
$notifications = DB::table('client_notifications')->where('client_id', $client_id)
    ->latest()
    ->take(4)
    ->get();

$all_notifications = [];

foreach ($notifications as $notification) {
    date_default_timezone_set('Asia/Dubai'); // Set the timezone to Dubai

    $notificationTime = Carbon\Carbon::parse($notification->created_at);
    $currentTime = Carbon\Carbon::now();
    
    if ($notificationTime->diffInSeconds($currentTime) < 60) {
        // If created within the last minute, display "just now"
        $formattedTime = "just now";
    } else {
        if ($notificationTime->isToday()) {
            $hoursDifference = $notificationTime->diffInHours($currentTime);
            
            if ($hoursDifference > 0) {
                if ($hoursDifference == 1) {
                    $formattedTime = $hoursDifference . " hour";
                } else {
                    $formattedTime = $hoursDifference . " hours";
                }
            } else {
                $minutesDifference = $notificationTime->diffInMinutes($currentTime);
                $formattedTime = $minutesDifference . " min ago";
            }
        } else {
            $formattedTime = $notificationTime->diffForHumans();
        }
    }
    
    $all_notifications[]    = [
                                'id' => $notification->id,
                                'text' => $notification->client_notification,
                                'time' => $formattedTime
                            ];
}

$notificationsCount     = count($all_notifications);
@endphp
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
   <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/themes/smoothness/jquery-ui.css">
   <!-- Typography CSS -->
   <link rel="stylesheet" href="{{ asset('mortgage/client/css/typography.css') }}">
   <!-- Style CSS -->
   <link rel="stylesheet" href="{{ asset('mortgage/client/css/style.css') }}">
   <!-- Responsive CSS -->
   <link rel="stylesheet" href="{{ asset('mortgage/client/css/responsive.css') }}">
   
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
   <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined" rel="stylesheet">

   <script src="{{ asset('mortgage/client/js/jquery.min.js') }}"></script>
</head>
   <body>
      <!-- Wrapper Start -->
        <div class="wrapper">
            <!-- Sidebar  -->
            <div class="iq-sidebar">
                <div class="iq-sidebar-logo d-flex justify-content-between">
                <a href="{{route('clientDashboard')}}">
                <div class="iq-light-logo">
                    <img src="{{ asset('mortgage/client/images/elite-images/logo.png') }}" class="img-fluid" alt="">
                </div>
                
                </a>
                <div class="iq-menu-bt-sidebar">
                    <div class="iq-menu-bt align-self-center">
                        <div class="wrapper-menu">
                            <div class="main-circle"><i class="ri-arrow-left-s-line"></i></div>
                            <div class="hover-circle"><i class="ri-arrow-right-s-line"></i></div>
                        </div>
                    </div>
                </div>
                </div>
                <div id="sidebar-scrollbar">
                <nav class="iq-sidebar-menu">
                    <ul id="iq-sidebar-toggle" class="iq-menu">
                        <li class="iq-menu-title"><i class="ri-subtract-line"></i><span></span></li>
                        <li class="{{ ($currentRoute == 'clientDashboard') ? 'active' : '' }}">
                            <a href="{{route('clientDashboard')}}" class="iq-waves-effect" aria-expanded="false">
                                <i class="ri-home-4-line"></i><span>Dashboard</span>
                            </a>
                        </li>
                        <li><a href="application.html" class="iq-waves-effect" aria-expanded="false"><i class="ri-tablet-line"></i><span>Application</span></a></li>
                        <li>
                            <a href="#mailbox" class="iq-waves-effect collapsed"  data-toggle="collapse" aria-expanded="false"><i class="ri-pencil-ruler-line"></i><span>Loan</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                            <ul id="mailbox" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                            <li><a href="mortgage.html"><i class="ri-calculator-fill"></i>Mortgages</a></li>
                            <li><a href="loan.html"><i class="ri-file-paper-line"></i>My Loan</a></li>
                            </ul>
                        </li>
                        
                        <li class="{{ ($firstSegment == 'document') ? 'active' : '' }}">
                            <a href="{{ route('document.list') }}" class="iq-waves-effect">
                                <i class="ri-file-list-line"></i><span>Documents</span>
                            </a>
                        </li>
                        <li class="{{ ($firstSegment == 'communication') ? 'active' : '' }}">
                            <a href="#forms" class="iq-waves-effect collapsed" data-toggle="collapse" aria-expanded="{{ ($firstSegment == 'communication') ? 'true' : '' }}"><i class="ri-chat-4-line"></i><span>Communication center</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                            <ul id="forms" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                                <li><a href="inbox.html"><i class="ri-inbox-line"></i>Inbox</a></li>
                                <li class="{{ ($secondSegment == 'notification') ? 'active' : '' }}">
                                    <a href="{{ route('communication.notification.list') }}"><i class="ri-notification-line"></i>Notification</a>
                                </li>
                            </ul>
                        </li>
                        <li class="{{ ($firstSegment == 'account') ? 'active' : '' }}">
                            <a href="#accounts" class="iq-waves-effect collapsed" data-toggle="collapse" aria-expanded="{{ ($firstSegment == 'account') ? 'true' : '' }}">
                                <i class="ri-account-box-line"></i><span>Accounts</span>
                                <i class="ri-arrow-right-s-line iq-arrow-right"></i>
                            </a>
                            <ul id="accounts" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                                <li class="{{ ($secondSegment == 'profile') ? 'active' : '' }}">
                                    <a href="{{ route('account.profile.view') }}">
                                        <i class="ri-user-line"></i>Profile
                                    </a>
                                </li>
                                <li><a href="#"><i class="ri-money-dollar-box-line"></i>Payment</a></li>
                                <li  class="{{ ($secondSegment == 'password') ? 'active' : '' }}">
                                    <a href="{{ route('account.password.reset') }}">
                                        <i class="ri-record-mail-line"></i>Reset Password
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="{{ ($firstSegment == 'mortgage') ? 'active' : '' }}">
                            <a href="{{ route('mortgage.step1') }}" class="iq-waves-effect">
                                <i class="ri-calculator-line"></i><span>Mortgage Calculator</span>
                            </a>
                        </li>
                        <li class="{{ ($firstSegment == 'help') ? 'active' : '' }}">
                            <a href="#support" class="iq-waves-effect collapsed" data-toggle="collapse" aria-expanded="{{ ($firstSegment == 'help') ? 'true' : '' }}"><i class="ri-contacts-line"></i><span>Help & Support</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                            <ul id="support" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                            <li class="{{ ($secondSegment == 'support') ? 'active' : '' }}">
                                <a href="{{ route('help.support.list_support_tickets') }}">
                                    <i class="ri-headphone-line"></i>Support
                                </a>
                            </li>
                            <li class="{{ ($secondSegment == 'educational') ? 'active' : '' }}">
                                <a href="{{ route('help.educational.resources') }}">
                                    <i class="ri-book-open-line"></i>Educational Resources
                                </a>
                            </li>
                            <li class="{{ ($secondSegment == 'privacy') ? 'active' : '' }}">
                                <a href="{{ route('help.privacy.security') }}">
                                    <i class="ri-lock-line"></i>Privacy & Security
                                </a>
                            </li>
                            </ul>
                        </li>
                        <li><a href="{{ route('clientLogout') }}" class="iq-waves-effect"><i class="ri-login-box-line"></i><span>Logout</span></a></li>
                        
                    </ul>
                </nav>
                <div class="p-3"></div>
                </div>
            </div>
            <!-- TOP Nav Bar -->
            <div class="iq-top-navbar">
                <div class="iq-navbar-custom">
                <div class="iq-sidebar-logo">
                    <div class="top-logo">
                        <a href="{{route('clientDashboard')}}" class="logo">
                        <div class="iq-light-logo">
                    <img src="{{ asset('mortgage/client/images/elite-images/logo.png') }}" class="img-fluid" alt="">
                </div>
                
                        </a>
                    </div>
                </div>
                <nav class="navbar navbar-expand-lg navbar-light p-0">
                    
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"  aria-label="Toggle navigation">
                    <i class="ri-menu-3-line"></i>
                    </button>
                    <div class="iq-menu-bt align-self-center">
                        <div class="wrapper-menu">
                            <div class="main-circle"><i class="ri-arrow-left-s-line"></i></div>
                            <div class="hover-circle"><i class="ri-arrow-right-s-line"></i></div>
                        </div>
                    </div>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ml-auto navbar-list">
                            
                            <li class="nav-item">
                            <a href="#" class="search-toggle iq-waves-effect">
                                <div id="lottie-beil"></div>
                                <span class="bg-danger dots"></span>
                            </a>
                            <div class="iq-sub-dropdown">
                                <div class="iq-card shadow-none m-0">
                                    <div class="iq-card-body p-0 ">
                                        <div class="bg-primary p-3">
                                        <h5 class="mb-0 text-white">All Notifications<small class="badge  badge-light float-right pt-1">{{$notificationsCount}}</small></h5>
                                        </div>
                                        @foreach($all_notifications as $data)
                                        <a href="#" class="iq-sub-card" >
                                        <div class="media align-items-center">
                                            <div class="">
                                                <img class="avatar-40 rounded" src="{{ asset('mortgage/client/images/user/blank.png') }}" alt="">
                                            </div>
                                            <div class="media-body ml-3">
                                                <h6 class="mb-0 ">{{$data['text']}}</h6>
                                                <small class="float-right font-size-12">{{$data['time']}}</small>
                                                <!-- <p class="mb-0">95 MB</p> -->
                                            </div>
                                        </div>
                                        </a>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            </li>
                            <li class="nav-item dropdown">
                            <a href="#" class="search-toggle iq-waves-effect">
                                <div id="lottie-mail"></div>
                                <span class="bg-primary count-mail"></span>
                            </a>
                            <div class="iq-sub-dropdown">
                                <div class="iq-card shadow-none m-0">
                                    <div class="iq-card-body p-0 ">
                                        <div class="bg-primary p-3">
                                        <h5 class="mb-0 text-white">All Messages<small class="badge  badge-light float-right pt-1">5</small></h5>
                                        </div>
                                        <a href="#" class="iq-sub-card" >
                                        <div class="media align-items-center">
                                            <div class="">
                                                <img class="avatar-40 rounded" src="{{ asset('mortgage/client/images/user/blank.png') }}" alt="">
                                            </div>
                                            <div class="media-body ml-3">
                                                <h6 class="mb-0 ">Nik Emma Watson</h6>
                                                <small class="float-left font-size-12">13 Jun</small>
                                            </div>
                                        </div>
                                        </a>
                                        <a href="#" class="iq-sub-card" >
                                        <div class="media align-items-center">
                                            <div class="">
                                                <img class="avatar-40 rounded" src="{{ asset('mortgage/client/images/user/blank.png') }}" alt="">
                                            </div>
                                            <div class="media-body ml-3">
                                                <h6 class="mb-0 ">Lorem Ipsum Watson</h6>
                                                <small class="float-left font-size-12">20 Apr</small>
                                            </div>
                                        </div>
                                        </a>
                                        <a href="#" class="iq-sub-card" >
                                        <div class="media align-items-center">
                                            <div class="">
                                                <img class="avatar-40 rounded" src="{{ asset('mortgage/client/images/user/blank.png') }}" alt="">
                                            </div>
                                            <div class="media-body ml-3">
                                                <h6 class="mb-0 ">Why do we use it?</h6>
                                                <small class="float-left font-size-12">30 Jun</small>
                                            </div>
                                        </div>
                                        </a>
                                        <a href="#" class="iq-sub-card" >
                                        <div class="media align-items-center">
                                            <div class="">
                                                <img class="avatar-40 rounded" src="{{ asset('mortgage/client/images/user/blank.png') }}" alt="">
                                            </div>
                                            <div class="media-body ml-3">
                                                <h6 class="mb-0 ">Variations Passages</h6>
                                                <small class="float-left font-size-12">12 Sep</small>
                                            </div>
                                        </div>
                                        </a>
                                        <a href="#" class="iq-sub-card" >
                                        <div class="media align-items-center">
                                            <div class="">
                                                <img class="avatar-40 rounded" src="{{ asset('mortgage/client/images/user/blank.png') }}" alt="">
                                            </div>
                                            <div class="media-body ml-3">
                                                <h6 class="mb-0 ">Lorem Ipsum generators</h6>
                                                <small class="float-left font-size-12">5 Dec</small>
                                            </div>
                                        </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            </li>
                        </ul>
                    </div>
                    <ul class="navbar-list">
                        <li>
                            <a href="#" class="search-toggle iq-waves-effect d-flex align-items-center rounded">
                                <img src="{{ asset('mortgage/client/images/user/blank.png') }}" class="img-fluid rounded mr-3" alt="user">
                                <div class="caption">
                                    <h6 class="mb-0 line-height text-black">Nik jone</h6>
                                </div>
                            </a>
                            <div class="iq-sub-dropdown iq-user-dropdown">
                                <div class="iq-card shadow-none m-0">
                                    <div class="iq-card-body p-0 ">
                                        <div class="bg-primary p-3">
                                            <h5 class="mb-0 text-white line-height">Hello Nik jone</h5>
                                        </div>
                                        <a href="{{ route('account.profile.view') }}" class="iq-sub-card iq-bg-primary-hover">
                                            <div class="media align-items-center">
                                            <div class="rounded iq-card-icon iq-bg-primary">
                                                <i class="ri-file-user-line"></i>
                                            </div>
                                            <div class="media-body ml-3">
                                                <h6 class="mb-0 ">My Profile</h6>
                                                <p class="mb-0 font-size-12">View personal profile details.</p>
                                            </div>
                                            </div>
                                        </a>
                                        <a href="{{ route('account.profile.edit') }}" class="iq-sub-card iq-bg-primary-hover">
                                            <div class="media align-items-center">
                                            <div class="rounded iq-card-icon iq-bg-primary">
                                                <i class="ri-profile-line"></i>
                                            </div>
                                            <div class="media-body ml-3">
                                                <h6 class="mb-0 ">Edit Profile</h6>
                                                <p class="mb-0 font-size-12">Modify your personal details.</p>
                                            </div>
                                            </div>
                                        </a>
                                        <a href="account-setting.html" class="iq-sub-card iq-bg-primary-hover">
                                            <div class="media align-items-center">
                                            <div class="rounded iq-card-icon iq-bg-primary">
                                                <i class="ri-account-box-line"></i>
                                            </div>
                                            <div class="media-body ml-3">
                                                <h6 class="mb-0 ">Account settings</h6>
                                                <p class="mb-0 font-size-12">Manage your account parameters.</p>
                                            </div>
                                            </div>
                                        </a>
                                        <a href="privacy-setting.html" class="iq-sub-card iq-bg-primary-hover">
                                            <div class="media align-items-center">
                                            <div class="rounded iq-card-icon iq-bg-primary">
                                                <i class="ri-lock-line"></i>
                                            </div>
                                            <div class="media-body ml-3">
                                                <h6 class="mb-0 ">Privacy Settings</h6>
                                                <p class="mb-0 font-size-12">Control your privacy parameters.</p>
                                            </div>
                                            </div>
                                        </a>
                                        <div class="d-inline-block w-100 text-center p-3">
                                            <a class="btn btn-primary dark-btn-primary" href="{{ route('clientLogout') }}" role="button">Sign out<i class="ri-login-box-line ml-2"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
            <!-- TOP Nav Bar END -->
            <!-- Page Content  -->
            @yield('page_content')
        </div>
        <!-- Wrapper END -->
        <!-- Footer -->
        <footer class="iq-footer">
            <div class="container-fluid">
                <div class="row">
                <div class="col-lg-6">
                    <ul class="list-inline mb-0">
                        <li class="list-inline-item"><a href="privacy-policy.html">Privacy Policy</a></li>
                        <li class="list-inline-item"><a href="terms-of-service.html">Terms of Use</a></li>
                    </ul>
                </div>
                <div class="col-lg-6 text-right">
                    &copy; 2023 <a href="#"> Elite Capital Mortgage Consultant.</a> All Rights Reserved.
                </div>
                </div>
            </div>
        </footer>
      
        <!-- Footer END -->
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        
        <!-- Rtl and Darkmode -->
        <script src="{{ asset('mortgage/client/js/rtl.js') }}"></script>
        <script src="{{ asset('mortgage/client/js/customizer.js') }}"></script>
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
        <script src="js/owl.carousel.min.js') }}"></script>
        <!-- Magnific Popup JavaScript -->
        <script src="{{ asset('mortgage/client/js/jquery.magnific-popup.min.js') }}"></script>
        <!-- Smooth Scrollbar JavaScript -->
        <script src="{{ asset('mortgage/client/js/smooth-scrollbar.js') }}"></script>
        <!-- lottie JavaScript -->
        <script src="{{ asset('mortgage/client/js/lottie.js') }}"></script>
        <!-- am core JavaScript -->
        <script src="{{ asset('mortgage/client/js/core.js') }}"></script>
        <!-- am charts JavaScript -->
        <script src="{{ asset('mortgage/client/js/charts.js') }}"></script>
        <!-- am animated JavaScript -->
        <script src="{{ asset('mortgage/client/js/animated.js') }}"></script>
        <!-- am kelly JavaScript -->
        <script src="{{ asset('mortgage/client/js/kelly.js') }}"></script>
        <!-- Flatpicker Js -->
        <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
        <!-- Chart Custom JavaScript -->
        <script src="{{ asset('mortgage/client/js/chart-custom.js') }}"></script>
        <script src="{{ asset('mortgage/client/js/rangeslider.js') }}"></script>
        <!-- Custom JavaScript -->
        <script src="{{ asset('mortgage/client/js/custom.js') }}"></script>
        <script>
            var isAdvancedUpload = function() {
                var div = document.createElement('div');
                return (('draggable' in div) || ('ondragstart' in div && 'ondrop' in div)) && 'FormData' in window && 'FileReader' in window;
            }();

            let defaultValue = document.createElement('div'); 
            
            let draggableFileArea = document.querySelector(".drag-file-area") ?? defaultValue;;
            let browseFileText = document.querySelector(".browse-files") ?? defaultValue;;
            let uploadIcon = document.querySelector(".upload-icon") ?? defaultValue;;
            let dragDropText = document.querySelector(".dynamic-message") ?? defaultValue;;
            let fileInput = document.querySelector(".default-file-input") ?? defaultValue;;
            let cannotUploadMessage = document.querySelector(".cannot-upload-message") ?? defaultValue;;
            let cancelAlertButton = document.querySelector(".cancel-alert-button") ?? defaultValue;;
            let uploadedFile = document.querySelector(".file-block") ?? defaultValue;;
            let fileName = document.querySelector(".file-name") ?? defaultValue;;
            let fileSize = document.querySelector(".file-size") ?? defaultValue;;
            let progressBar = document.querySelector(".progress-bar") ?? defaultValue;;
            let removeFileButton = document.querySelector(".remove-file-icon") ?? defaultValue;;
            let uploadButton = document.querySelector(".upload-button") ?? defaultValue;;
            let fileFlag = 0;
            // Add the name attribute

            // Get the icon button elements
            let iconButtons = document.querySelectorAll('.newproduct_iconsbtn_edit');
            let uploadedImage = document.getElementById('uploadedImage');

            // Add click event listeners to the icon buttons
            iconButtons.forEach(button => {
                button.addEventListener('click', function() {
                    fileInput.click(); // Trigger click event on file input
                });
            });

            // Assuming removeFileIcon is the NodeList of delete button elements
            let removeFileIcon = document.querySelectorAll('.newproduct_iconsbtn_delete');

            // Iterate over each delete button element
            removeFileIcon.forEach(button => {
                // Add click event listener to each delete button
                button.addEventListener("click", () => {
                    // Reset the file upload area to its initial state
                    uploadedFile.style.cssText = "display: none;";
                    fileInput.value = ''; // Clear the file input value
                    uploadIcon.innerHTML = 'file_upload';
                    dragDropText.innerHTML = 'Drag & drop any file here';
                    
                    // // Reinsert the "drag & drop" text span
                    // let dragDropSpan = document.createElement('span');
                    // dragDropSpan.textContent = 'drag & drop ';
                    // let label = document.querySelector('.label');
                    // label.insertBefore(dragDropSpan, label.firstChild);

                    // Reset the upload button text
                    uploadButton.innerHTML = `Upload`;

                    // Remove the block containing the image and editing icons
                    let imageEditingSection = document.querySelector(".image_editing_section");
                    if (imageEditingSection) {
                        // imageEditingSection.parentNode.removeChild(imageEditingSection);
                        imageEditingSection.style.display = "none";
                    }

                    fileInput.setAttribute("required", "required");
                });
            });
              
            
            fileInput.addEventListener("click", () => {
                fileInput.value = '';
                console.log(fileInput.value);
            });
            
            fileInput.addEventListener("change", e => {
                console.log(" > " + fileInput.value)
                uploadIcon.innerHTML = 'check_circle';
                dragDropText.innerHTML = 'File Dropped Successfully!';
                let dragDropSpan = document.createElement('span');

                dragDropSpan.textContent = 'drag & drop ';
                let label = document.querySelector('.label');
                label.insertBefore(dragDropSpan, label.firstChild)
                // document.querySelector(".label").innerHTML = `drag & drop or <span class="browse-files"> <input type="file" name="document" class="default-file-input" style=""/> <span class="browse-files-text" style="top: 0;"> browse file</span></span>`;
                
                uploadButton.innerHTML = `Upload`;
                fileName.innerHTML = fileInput.files[0].name;
                fileSize.innerHTML = (fileInput.files[0].size/1024).toFixed(1) + " KB";
                uploadedFile.style.cssText = "display: flex;";
                progressBar.style.width = 0;
                fileFlag = 0;

                let formData = new FormData();

                formData.append('document', fileInput.files[0]);
                
                console.log('------');
                console.log(fileInput.files[0]);
                console.log(fileInput.files);
                console.log(formData);

                let imageEditingSection = document.querySelector(".image_editing_section");
                if (imageEditingSection) {
                    
                    imageEditingSection.style.display = "block";
                }

                // Your existing code to handle file selection goes here
                console.log('Selected file:', fileInput.files[0]);
                console.log('File size:', fileInput.files[0].size);
                console.log('File type:', fileInput.files[0].type);

                if (fileInput.files && fileInput.files[0]) {
                    let reader = new FileReader();
                    reader.onload = function(e) {
                        uploadedImage.src = e.target.result;
                    };
                    reader.readAsDataURL(fileInput.files[0]);
                }
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
                    dragDropSpan.textContent = 'drag & drop ';
                    let label = document.querySelector('.label');
                    label.insertBefore(dragDropSpan, label.firstChild)

                    // document.querySelector(".label").innerHTML = `drag & drop or <span class="browse-files"> <input type="file" name="document" class="default-file-input" style=""/> <span class="browse-files-text" style="top: -23px; left: -20px;"> browse file</span> </span>`;
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
                dragDropSpan.textContent = 'drag & drop ';
                let label = document.querySelector('.label');
                label.insertBefore(dragDropSpan, label.firstChild)
                // document.querySelector(".label").innerHTML = `or <span class="browse-files"> <input type="file" name="document" class="default-file-input"/> <span class="browse-files-text">browse file</span> <span>from device</span> </span>`;
                uploadButton.innerHTML = `Upload`;
            });
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
    <script>
        $(".accordion a").click(function (j) {
            var dropDown = $(this).closest("li").find("p");
            $(this).closest(".accordion").find("p").not(dropDown).slideUp();
            if ($(this).hasClass("active")) {
                $(this).removeClass("active");
            } else {
                $(this).closest(".accordion").find("a.active").removeClass("active");
                $(this).addClass("active");
            }
            dropDown.stop(false, true).slideToggle();
            j.preventDefault();
        });
    </script>
    </body>
</html>