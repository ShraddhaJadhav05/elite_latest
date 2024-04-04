<div class="iq-sidebar">
    <div class="iq-sidebar-logo d-flex justify-content-between">
       <a href="index.html">
       <div class="iq-light-logo">
          <img src="{{ asset('staffbackend/assets/images/elite-images/logo.png') }}" class="img-fluid" alt="">
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
             <li @if(($data['pageTitle'] ?? null)=='dashboard') class="active"  @endif><a href="index.html" class="iq-waves-effect" aria-expanded="false"><i class="ri-home-4-line"></i><span>Dashboard</span></a></li>
             
             <li @if(($data['pageTitle'] ?? null)=='loan_applications') class="active"  @endif>
                        <a href="#loanapplications" class="iq-waves-effect collapsed"  data-toggle="collapse" aria-expanded="false"><i class="ri-pencil-ruler-line"></i><span>Loan Applications</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                        <ul id="loanapplications" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                           <li><a href="{{ route('all.loan_applications','pending') }}"><i class="ri-archive-drawer-line"></i>New Applications</a></li>
                           <li><a href="{{ route('all.loan_applications','in_progress') }}"><i class="ri-file-list-line"></i>In-Progress Applications</a></li>
                           <li><a href="{{ route('all.loan_applications','approved') }}"><i class="ri-shield-user-line"></i>Approved Applications</a></li>
                           <li><a href="{{ route('all.loan_applications','on_hold') }}"><i class="ri-shield-user-line"></i>On Hold</a></li>
                           <li><a href="{{ route('all.loan_applications','rejected') }}"><i class="ri-shield-user-line"></i>Rejected</a></li>
                        </ul>
            </li>
      


                     <li @if(($data['pageTitle'] ?? null)=='mortgages') class="active"  @endif>
                        <a href="#mortgages" class="iq-waves-effect collapsed" data-toggle="collapse" aria-expanded="false"><i class="ri-contacts-line"></i><span>Mortgages Proposal</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                        <ul id="mortgages" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                           <li><a href="{{route('all.client.proposal')}}"><i class="ri-chat-2-line"></i>Clients Proposal</a></li>
                        </ul>
                     </li>


            <li @if(($data['pageTitle'] ?? null)=='staff_customer_lead') class="active"  @endif>
                <a href="#customer" class="iq-waves-effect collapsed" data-toggle="collapse" aria-expanded="false"><i class="ri-contacts-line"></i><span>Customers</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                <ul id="customer" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                  <li><a href="{{route('all.staff_leads')}}"><i class="ri-archive-drawer-line"></i>Leads</a></li>
                   <li><a href="{{route('loan.clients')}}"><i class="ri-user-2-line"></i>Clients</a></li>
                   <li><a href="{{route('show.communication')}}"><i class="ri-chat-2-line"></i>Communication</a></li>
                </ul>
             </li>
            
             <li @if(($data['pageTitle'] ?? null)=='documents') class="active"  @endif>
                        <a href="#document" class="iq-waves-effect collapsed" data-toggle="collapse" aria-expanded="false"><i class="ri-file-list-line"></i><span>Document Management</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                        <ul id="document" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                           <li><a href="{{route('all.client.documments')}}"><i class="ri-user-3-line"></i>Customers</a></li>
                           <li><a href="{{route('show.documments')}}"><i class="ri-file-lock-line"></i>Documents</a></li>
                        </ul>
            </li>
             <li @if(($data['pageTitle'] ?? null)=='reports') class="active"  @endif>
                <a href="#reporting" class="iq-waves-effect collapsed" data-toggle="collapse" aria-expanded="false"><i class="ri-archive-drawer-line"></i><span>Reporting and Analytics</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                <ul id="reporting" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                   <li><a href="{{route('perormance.reports')}}"><i class="ri-file-shield-2-line"></i>Performance Reports</a></li>
                   <li><a href="{{route('application.reports')}}"><i class="ri-shield-user-line"></i>Application Analytics</a></li>
                </ul>
             </li>
             <li class="iq-menu-title"><i class="ri-subtract-line"></i><span>Communication Center</span></li>
             <li @if(($data['pageTitle'] ?? null)=='internal_communication') class="active"  @endif>
                <a href="#communication" class="iq-waves-effect collapsed" data-toggle="collapse" aria-expanded="false"><i class="ri-chat-4-line"></i><span>Messages</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                <ul id="communication" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                   <li><a href="{{route('show.inbox')}}"><i class="ri-message-line"></i>Inbox</a></li>
                   <li><a href="{{route('show.outbox')}}"><i class="ri-inbox-line"></i>Outbox</a></li>
                   <!-- <li><a href="{{route('archive.messages')}}"><i class="ri-inbox-line"></i>Archive</a></li>
                   <li><a href="{{route('starred.messages')}}"><i class="ri-inbox-line"></i>Starred</a></li> -->


                </ul>
             </li>
             <li @if(($data['pageTitle'] ?? null)=='notification') class="active"  @endif>
                <a href="#notification" class="iq-waves-effect collapsed" data-toggle="collapse" aria-expanded="false"><i class="ri-notification-line"></i><span>Notification</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                <ul id="notification" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                   <li><a href="{{route('show.inbox.notification')}}"><i class="ri-message-line"></i>Inbox</a></li>
                   <li><a href="{{route('show.outbox.notification')}}"><i class="ri-inbox-line"></i>Outbox</a></li>
                </ul>
             </li>
             <li @if(($data['pageTitle'] ?? null)=='training') class="active"  @endif>
                <a href="#training" class="iq-waves-effect collapsed" data-toggle="collapse" aria-expanded="false"><i class="ri-file-info-line"></i><span>Training and Resources</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                <ul id="training" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                   <li><a href="{{route('training.material')}}"><i class="ri-file-settings-line"></i>Training Materials</a></li>
                   <li><a href="{{route('policy.document')}}"><i class="ri-file-add-line"></i>Policy Documents</a></li>
                </ul>
             </li>
             <li>
                <a href="#settings" class="iq-waves-effect collapsed" data-toggle="collapse" aria-expanded="false"><i class="ri-chat-settings-line"></i><span>Settings</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                <ul id="settings" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                   <li><a href="profilesettings.html"><i class="ri-admin-line"></i>Profile Settings</a></li>
                   <li><a href="notificationpreference.html"><i class="ri-notification-4-line"></i>Notification Preferences</a></li>
                </ul>
             </li>
             <li><a href="{{ route('ec-staff') }}" class="iq-waves-effect"><i class="ri-login-box-line"></i><span>Logout</span></a></li>
             
          </ul>
       </nav>
       <div class="p-3"></div>
    </div>
 </div>