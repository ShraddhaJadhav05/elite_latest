<div class="iq-sidebar">
    <div class="iq-sidebar-logo d-flex justify-content-between">
       <a href="index.html">
       <div class="iq-light-logo">
          <img src="{{ asset('adminbackend/assets/images/elite-images/logo-two.png') }}" class="img-fluid" alt="">
       </div>
       <div class="iq-dark-logo">
          <img src="{{ asset('adminbackend/assets/images/logo-dark.gif') }}" class="img-fluid" alt="">
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
             <li >
                <a href="index.html" class="iq-waves-effect"><i class="ri-home-4-line"></i><span>Dashboard </span></a>
             </li>
             <li><a href="{{route('all.loans')}}" class="iq-waves-effect"><i class="ri-pencil-ruler-line"></i><span>Loans</span></a></li>
             <li>
                <a href="#leads" class="iq-waves-effect collapsed"  data-toggle="collapse" aria-expanded="false"><i class="ri-archive-drawer-line"></i><span>Leads</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                <ul id="leads" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                    <li><a href="{{route('all.leads')}}"><i class="ri-archive-drawer-line"></i>Leads</a></li>
                    <li><a href="{{route('show.leads')}}"><i class="ri-chat-check-line"></i>Create New Lead</a></li>
                </ul>
             </li>
             <li>
               <a href="#userinfo" class="iq-waves-effect collapsed" data-toggle="collapse" aria-expanded="false"><i class="ri-user-line"></i><span>Clients</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
               <ul id="userinfo" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                  <li><a href="{{route('all.clients')}}"><i class="ri-file-list-line"></i>Clients</a></li>
                  <li><a href="{{route('show.show_client')}}"><i class="ri-user-add-line"></i>Create New Client</a></li>
               </ul>
             </li>
             <li>
               <a href="#brokers" class="iq-waves-effect collapsed" data-toggle="collapse" aria-expanded="false"><i class="ri-folder-user-line"></i><span>Brokers</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
               <ul id="brokers" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                  <li><a href="{{route('all.broker')}}"><i class="ri-file-list-line"></i>Brokers </a></li>
                  <li><a href="{{route('show.show_broker')}}"><i class="ri-user-add-line"></i>Add New Broker</a></li>

               </ul>
             </li>
             <li>
               <a href="#banks" class="iq-waves-effect collapsed" data-toggle="collapse" aria-expanded="false"><i class="ri-bank-line"></i><span>Banks</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                <ul id="banks" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                        <li><a href="{{route('all.banks')}}"><i class="ri-file-list-line"></i>Banks </a></li>
                        <li><a href="{{route('all.banks.products')}}"><i class="ri-product-hunt-line"></i>Products</a></li>
                        <li><a href="{{route('show.banks')}}"><i class="ri-file-list-line"></i>Add New Bank </a></li>
                        <li><a href="{{route('show.banks.products')}}"><i class="ri-product-hunt-line"></i>Add New Product</a></li>

                    </ul>
             </li>
             <li class="active">
             <a href="#staffusers" class="iq-waves-effect collapsed" data-toggle="collapse" aria-expanded="false"><i class="ri-user-line"></i><span>Staff users</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                <ul id="staffusers" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                    <li><a href="{{route('all.staff')}}"><i class="ri-file-list-line"></i>Staff Users </a></li>
                    <li><a href="{{ route('all.roles') }}"><i class="ri-file-list-line"></i>Roles</a></li>
                    <li><a href="{{route('show.show_staff')}}"><i class="ri-user-add-line"></i>Add New Staff </a></li>

                </ul>
             </li>
             <li>
             <a href="#apponitments" class="iq-waves-effect collapsed" data-toggle="collapse" aria-expanded="false"><i class="ri-calendar-2-line"></i><span>Apponitments</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                <ul id="apponitments" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                    <li><a href="{{route('all.appoinments')}}"><i class="ri-file-list-line"></i>Apponitments </a></li>
                    <li><a href="{{route('all.slots')}}"><i class="ri-calendar-todo-line"></i>Slots</a></li>
                    <li><a href="{{route('show.show_appoinment')}}"><i class="ri-add-line"></i>Create An Appointment </a></li>

                </ul>
             </li>
             <li>
             <a href="#notifications" class="iq-waves-effect collapsed" data-toggle="collapse" aria-expanded="false"><i class="ri-notification-line"></i><span>Notifications</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                <ul id="notifications" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                <li><a href="{{route('all.notification.agents')}}"><i class="ri-file-info-line"></i>Agents </a></li>
                    <li><a href="{{route('all.notification.borrowers')}}"><i class="ri-file-list-line"></i>Borrowers</a></li>
                    <!-- <li><a href="{{route('all.notification.types')}}"><i class="ri-file-user-line"></i>Types</a></li> -->
                </ul>
             </li>
             <li><a href="{{route('all.enquires')}}" class="iq-waves-effect"><i class="ri-contacts-line"></i><span>Enquires</span></a></li>
                <li>
                    <a href="#cms" class="iq-waves-effect collapsed" data-toggle="collapse" aria-expanded="false"><i class="ri-pages-line"></i><span>CMS</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                    <ul id="cms" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                        <li><a href="{{route('frontpage.blocks')}}"><i class="ri-file-info-line"></i>Frontpages </a></li>
                        <li><a href="{{route('cms.pages')}}"><i class="ri-file-edit-line"></i>Pages</a></li>
                        <li><a href="slideshow.html"><i class="ri-slideshow-line"></i>Slideshow</a></li>
                        <li><a href="blocks.html"><i class="ri-file-paper-line"></i>Blocks</a></li>
                        <li><a href="{{route('blogs.list')}}"><i class="ri-file-paper-line"></i>Blogs</a></li>
                    </ul>
             </li>
             <li>
             <a href="#services" class="iq-waves-effect collapsed" data-toggle="collapse" aria-expanded="false"><i class="ri-shield-flash-line"></i><span>Services</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                <ul id="services" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                    <li><a href="services.html"><i class="ri-file-info-line"></i>Services </a></li>
                    <li><a href="adnewservices.html"><i class="ri-file-list-line"></i>Add New Service</a></li>
                    <li><a href="category.html"><i class="ri-slideshow-line"></i>Category</a></li>

                </ul>
             </li>
             <li>
             <a href="#faq" class="iq-waves-effect collapsed" data-toggle="collapse" aria-expanded="false"><i class="ri-questionnaire-line"></i><span>FAQs</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                <ul id="faq" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                    <li><a href="{{route('faq.list')}}"><i class="ri-file-edit-line"></i>FAQs</a></li>
                    <li><a href="{{route('faq.add')}}"><i class="ri-file-edit-line"></i>Add New FAQ</a></li>
                    <li><a href="{{route('category_type.list')}}"><i class="ri-file-edit-line"></i>Category Type</a></li>
                    <li><a href="{{route('category.list')}}"><i class="ri-file-edit-line"></i>Category</a></li>
                </ul>
             </li>
             <li><a href="mortgagecalculator.html" class="iq-waves-effect"><i class="ri-calculator-line"></i><span>Mortgage Calculator</span></a></li>
                <li>
                    <a href="#settings" class="iq-waves-effect collapsed" data-toggle="collapse" aria-expanded="false"><i class="ri-chat-settings-line"></i><span>Settings</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                    <ul id="settings" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                        <li><a href="general.html"><i class="ri-home-8-line"></i>General </a></li>
                        <li><a href="seo-smo.html"><i class="ri-file-2-line"></i>SEO & SMO</a></li>
                        <li><a href="sales.html"><i class="ri-file-3-line"></i>Sales</a></li>
                        <li><a href="contact.html"><i class="ri-contacts-book-2-line"></i>Contacts</a></li>
                        <li><a href="loan.html"><i class="ri-file-4-line"></i>Loan</a></li>

                    </ul>
             </li>
             <li>
             <a href="#admin" class="iq-waves-effect collapsed" data-toggle="collapse" aria-expanded="false"><i class="ri-admin-line"></i><span>Admin</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                <ul id="admin" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                    <li><a href="users.html"><i class="ri-admin-line"></i>Users </a></li>
                    <li><a href="userrole.html"><i class="ri-file-2-line"></i>Roles</a></li>
                    <li><a href="createnewuser.html"><i class="ri-user-add-line"></i>Create New User</a></li>

                </ul>
             </li>

          </ul>
       </nav>
       <div class="p-3"></div>
    </div>
 </div>
