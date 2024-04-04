@php
   $profileid = Auth::user()->id;
   $adminData = App\Models\User::find($profileid);
@endphp

<div class="iq-top-navbar">
    <div class="iq-navbar-custom">
       <div class="iq-sidebar-logo">
          <div class="top-logo">
             <a href="index.html" class="logo">
             <div class="iq-light-logo">
          <img src="{{ asset('staffbackend/assets/images/elite-images/logo.png') }}" class="img-fluid" alt="">
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
                               <h5 class="mb-0 text-white">All Notifications<small class="badge  badge-light float-right pt-1">4</small></h5>
                            </div>
                            <a href="#" class="iq-sub-card" >
                               <div class="media align-items-center">
                                  <div class="">
                                     <img class="avatar-40 rounded" src="{{ asset('staffbackend/assets/images/user/blank.png') }}" alt="">
                                  </div>
                                  <div class="media-body ml-3">
                                     <h6 class="mb-0 ">Emma Watson Nik</h6>
                                     <small class="float-right font-size-12">Just Now</small>
                                     <p class="mb-0">95 MB</p>
                                  </div>
                               </div>
                            </a>
                            <a href="#" class="iq-sub-card" >
                               <div class="media align-items-center">
                                  <div class="">
                                     <img class="avatar-40 rounded" src="{{ asset('staffbackend/assets/images/user/blank.png') }}" alt="">
                                  </div>
                                  <div class="media-body ml-3">
                                     <h6 class="mb-0 ">New customer is join</h6>
                                     <small class="float-right font-size-12">5 days ago</small>
                                     <p class="mb-0">Jond Nik</p>
                                  </div>
                               </div>
                            </a>
                            <a href="#" class="iq-sub-card" >
                               <div class="media align-items-center">
                                  <div class="">
                                     <img class="avatar-40 rounded" src="{{ asset('staffbackend/assets/images/user/blank.png') }}" alt="">
                                  </div>
                                  <div class="media-body ml-3">
                                     <h6 class="mb-0 ">Two customer is left</h6>
                                     <small class="float-right font-size-12">2 days ago</small>
                                     <p class="mb-0">Jond Nik</p>
                                  </div>
                               </div>
                            </a>
                            <a href="#" class="iq-sub-card" >
                               <div class="media align-items-center">
                                  <div class="">
                                     <img class="avatar-40 rounded" src="{{ asset('staffbackend/assets/images/user/blank.png') }}" alt="">
                                  </div>
                                  <div class="media-body ml-3">
                                     <h6 class="mb-0 ">New Mail from Fenny</h6>
                                     <small class="float-right font-size-12">3 days ago</small>
                                     <p class="mb-0">Jond Nik</p>
                                  </div>
                               </div>
                            </a>
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
                                     <img class="avatar-40 rounded" src="{{ asset('staffbackend/assets/images/user/blank.png') }}" alt="">
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
                                     <img class="avatar-40 rounded" src="{{ asset('staffbackend/assets/images/user/blank.png') }}" alt="">
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
                                     <img class="avatar-40 rounded" src="{{ asset('staffbackend/assets/images/user/blank.png') }}" alt="">
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
                                     <img class="avatar-40 rounded" src="{{ asset('staffbackend/assets/images/user/blank.png') }}" alt="">
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
                                     <img class="avatar-40 rounded" src="{{ asset('staffbackend/assets/images/user/blank.png') }}" alt="">
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
                   <img src="{{ $adminData->logo ? asset('user_profile/' . $adminData->logo) : asset('adminbackend/assets/images/user/blank.png') }}" class="img-fluid rounded mr-3" alt="profile-image">
                   <div class="caption">
                      <h6 class="mb-0 line-height text-black">{{ $adminData->fname }}</h6>
                   </div>
                </a>
                <div class="iq-sub-dropdown iq-user-dropdown">
                   <div class="iq-card shadow-none m-0">
                      <div class="iq-card-body p-0 ">
                         <div class="bg-primary p-3">
                            <h5 class="mb-0 text-white line-height">Hello {{ $adminData->fname }}</h5>
                         </div>
                         <a href="{{ route('staff.profile.edit') }}" class="iq-sub-card iq-bg-primary-hover">
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

                         <a href="{{ route('staff.profile.edit') }}" class="iq-sub-card iq-bg-primary-hover">
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
                         <a href="{{ route('staff.show.reset.password') }}" class="iq-sub-card iq-bg-primary-hover">
                           <div class="media align-items-center">
                              <div class="rounded iq-card-icon iq-bg-primary">
                                 <i class="ri-profile-line"></i>
                              </div>
                              <div class="media-body ml-3">
                                 <h6 class="mb-0 ">Reset-Password</h6>
                                 <p class="mb-0 font-size-12">Modify your password</p>
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
                            <a class="btn btn-primary dark-btn-primary" href="{{ route('staff.logout') }}" role="button">Sign out<i class="ri-login-box-line ml-2"></i></a>
                         </div>
                      </div>
                   </div>
                </div>
             </li>
          </ul>
       </nav>
    </div>
 </div>