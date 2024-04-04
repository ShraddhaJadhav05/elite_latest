@extends("frontend.layouts.app")
@section('page_content')
<div id="home" class="better-home-area">
   <div class="container">
      <div class="row align-items-center">
         <div class="col-lg-6 col-md-12">
            <div class="better-home-content">
               <h1>Become a Partner</h1>
               <p>Elite Capital – Your Strategic Partner for Success. Our dedicated partner portal streamlines case management, granting you access to premium bank rates. Let us take care of the complexities, allowing you to focus on your core business. Experience efficiency with our sophisticated online partner portal, where submitting and tracking cases is seamless. Receive real-time notifications at every stage, ensuring a well-managed workflow. Trust Elite Capital for a professional partnership that elevates your financial endeavors.</p>
               <ul class="better-home-btn">
                  <li>
                     <a href="{{ route('partnerRegistration') }}" class="main-default-btn">Become a Partner</a>
                  </li>
               </ul>
            </div>
         </div>
         <div class="col-lg-6 col-md-12">
            <div class="better-home-image">
               <img src="{{ asset('static/frontend/img/more-home/banner/better-home.png') }}" alt="image">
            </div>
         </div>
      </div>
   </div>
</div>
<div class="buying-home-area ptb-100">
   <div class="container">
      <div class="row align-items-center justify-content-center">
         <div class="col-lg-5 col-md-12">
            <div class="buying-home-image patrner_feature">
               <img src="{{ asset('static/frontend/img/more-home/video-overview.jpg') }}" alt="image">
            </div>
         </div>
         <div class="col-lg-7 col-md-12">
            <div class="buying-home-content">
               <h3>Features</h3>
               <p>Explore a range of financing choices designed to make securing your dream home financially feasible and stress-free.</p>
               <div class="row justify-content-center">
                  <div class="col-lg-12 col-sm-12">
                     <div class="buying-inner-box">
                        <div class="icon">
                           <i class="bx bx-check"></i>
                        </div>
                        <h4>Efficiently handle your case:</h4>
                        <p>Effectively navigate and manage your case with utmost efficiency using our streamlined system, ensuring a smooth and organized process for optimal outcomes.
                        </p>
                     </div>
                  </div>
                  <div class="col-lg-12 col-sm-12">
                     <div class="buying-inner-box">
                        <div class="icon">
                           <i class="bx bx-check"></i>
                        </div>
                        <h4>Exclusive rates from top banks </h4>
                        <p>When you share your client's information, our platform meticulously tailors its recommendations, presenting you with the finest bank products perfectly aligned with their profile. This personalized approach guarantees that your clients receive the best available options in the market, reflecting our commitment to delivering top-tier mortgage solutions.
                        </p>
                     </div>
                  </div>
                  <div class="col-lg-12 col-sm-12">
                     <div class="buying-inner-box">
                        <div class="icon">
                           <i class="bx bx-check"></i>
                        </div>
                        <h4>Draft a proposal</h4>
                        <p>Simplify the proposal creation process with unparalleled ease. Access premium bank rates, explore diverse offers, and customize your proposals effortlessly with just a few clicks, ensuring a seamless and efficient experience.
                        </p>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<div id="blog" class="blog-style-area why_partner ptb-100 five-service-area">
   <div class="container">
      <div class="main-section-title">
         <h2>Why Partner with Elite</h2>
      </div>
      <div class="row justify-content-center ">
         <div class="service-slider2 owl-carousel owl-theme">
            <div class="why-choose-us-item agents_slider">
               <div class="choose-image">
                  <img src="{{ asset('static/frontend/img/partner/choose-4.png') }}" alt="image">
               </div>
               <div class="choose-content">
                  <h3 class="mb-2">Access to Exclusive Rates:    </h3>
                  <p>Partnering with Elite opens the door to unparalleled access to exclusive bank rates, providing your clients with the most competitive and favorable mortgage options in the market.</p>
               </div>
            </div>
            <div class="why-choose-us-item agents_slider">
               <div class="choose-image">
                  <img src="{{ asset('static/frontend/img/partner/choose-6.png') }}" alt="image">
               </div>
               <div class="choose-content">
                  <h3 class="mb-2">Tailored Solutions for Every Client:    </h3>
                  <p>Our expertise allows us to customize mortgage solutions based on individual client profiles, ensuring a personalized approach that meets the unique financial needs and goals of each borrower.
                  </p>
               </div>
            </div>
            <div class="why-choose-us-item agents_slider">
               <div class="choose-image">
                  <img src="{{ asset('static/frontend/img/partner/elite-online.png') }}" alt="image">
               </div>
               <div class="choose-content">
                  <h3 class="mb-2">Streamlined Processes and Efficiency:    </h3>
                  <p>Experience a seamless and efficient collaboration with Elite, benefitting from streamlined processes that simplify case management, proposal creation, and access to a diverse range of bank products with just a few clicks.
                  </p>
               </div>
            </div>
            <div class="why-choose-us-item agents_slider">
               <div class="choose-image">
                  <img src="{{ asset('static/frontend/img/partner/Service.png') }}" alt="image">
               </div>
               <div class="choose-content">
                  <h3 class="mb-2"> Network of Bankers:        </h3>
                  <p>As the leading mortgage consultants in the UAE, Partnering with Elite means tapping into an extensive network of Bankers. This broad connection allows for comprehensive market coverage, increasing the likelihood of finding the best possible mortgage options for your clients.
                  </p>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<div id="team" class="staff-area ptb-100">
   <div class="container">
      <div class="main-section-title">
         <h2>Meet Our Mortgage Experts</h2>
      </div>
      <div class="staff-slider owl-carousel owl-theme">
         <div class="staff-card without-border">
            <div class="staff-image">
               <img src="{{ asset('static/frontend/img/home-four/team1.png') }}" alt="image">
            </div>
            <div class="staff-content">
               <h3>ABDALQADER DARABAIH</h3>
               <span>Founder & Managing Director</span>
            </div>
         </div>
         <div class="staff-card without-border">
            <div class="staff-image">
               <img src="{{ asset('static/frontend/img/home-four/team2.png') }}" alt="image">
            </div>
            <div class="staff-content">
               <h3>MOHAMMED ALHERBAWI</h3>
               <span>Business Development Manager</span>
            </div>
         </div>
         <div class="staff-card without-border">
            <div class="staff-image">
               <img src="{{ asset('static/frontend/img/home-four/team7.png') }}" alt="image">
            </div>
            <div class="staff-content">
               <h3>SOURAV SARKAR</h3>
               <span>Business Development Manager</span>
            </div>
         </div>
         <div class="staff-card without-border">
            <div class="staff-image">
               <img src="{{ asset('static/frontend/img/home-four/team3.png') }}" alt="image">
            </div>
            <div class="staff-content">
               <h3>MOHAMMED ABUSAMRA</h3>
               <span>Senior Mortgage Consultant</span>
            </div>
         </div>
         <div class="staff-card without-border">
            <div class="staff-image">
               <img src="{{ asset('static/frontend/img/home-four/team4.png') }}" alt="image">
            </div>
            <div class="staff-content">
               <h3>MOHAMMED ALHAJ</h3>
               <span>Mortgage Consultant</span>
            </div>
         </div>
         <div class="staff-card without-border">
            <div class="staff-image">
               <img src="{{ asset('static/frontend/img/home-four/team5.png') }}" alt="image">
            </div>
            <div class="staff-content">
               <h3>HUSSAIN SHAIKH</h3>
               <span>Mortgage Consultant</span>
            </div>
         </div>
         <div class="staff-card without-border">
            <div class="staff-image">
               <img src="{{ asset('static/frontend/img/home-four/team6.png') }}" alt="image">
            </div>
            <div class="staff-content">
               <h3>PRABHAKAR ARUNACHALAM</h3>
               <span>Mortgage Consultant</span>
            </div>
         </div>
      </div>
   </div>
</div>
<section class="two-lover-area five-lover-area six-lover-area pb-100">
   <div class="container-fluid p-0">
      <div class="one-section-title three-section-title">
         <h2>We Serve Our Clients Best Of Capacity</h2>
      </div>
      <div class="six-lover-slider owl-theme owl-carousel">
         <div class="lover-item">
            <ul>
               <li>
                  <div class="lover-content">
                     <h3>Donney Jon</h3>
                     <span>Perisian Org</span>
                     <p>Lorem ipsum dolor sit amet, consectetur adipisicing sit ut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.</p>
                     <ul>
                        <li>
                           <i class="bx bxs-star checked"></i>
                        </li>
                        <li>
                           <i class="bx bxs-star checked"></i>
                        </li>
                        <li>
                           <i class="bx bxs-star checked"></i>
                        </li>
                        <li>
                           <i class="bx bxs-star checked"></i>
                        </li>
                        <li>
                           <i class="bx bxs-star checked"></i>
                        </li>
                     </ul>
                     <div class="lover-icon">
                        <i class="bx bxs-quote-left"></i>
                     </div>
                  </div>
               </li>
            </ul>
         </div>
         <div class="lover-item">
            <ul>
               <li>
                  <div class="lover-content">
                     <h3>Oli Rubion</h3>
                     <span>Entoin Ect</span>
                     <p>Lorem ipsum dolor sit amet, consectetur adipisicing sit ut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.</p>
                     <ul>
                        <li>
                           <i class="bx bxs-star checked"></i>
                        </li>
                        <li>
                           <i class="bx bxs-star checked"></i>
                        </li>
                        <li>
                           <i class="bx bxs-star checked"></i>
                        </li>
                        <li>
                           <i class="bx bxs-star checked"></i>
                        </li>
                        <li>
                           <i class="bx bxs-star"></i>
                        </li>
                     </ul>
                     <div class="lover-icon">
                        <i class="bx bxs-quote-left"></i>
                     </div>
                  </div>
               </li>
            </ul>
         </div>
         <div class="lover-item">
            <ul>
               <li>
                  <div class="lover-content">
                     <h3>Sanaik Tubi</h3>
                     <span>Furnishhome, Internation</span>
                     <p>Roinin ipsum dolor sit amet, consectetur adipisicing sit ut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.</p>
                     <ul>
                        <li>
                           <i class="bx bxs-star checked"></i>
                        </li>
                        <li>
                           <i class="bx bxs-star checked"></i>
                        </li>
                        <li>
                           <i class="bx bxs-star checked"></i>
                        </li>
                        <li>
                           <i class="bx bxs-star checked"></i>
                        </li>
                        <li>
                           <i class="bx bxs-star checked"></i>
                        </li>
                     </ul>
                     <div class="lover-icon">
                        <i class="bx bxs-quote-left"></i>
                     </div>
                  </div>
               </li>
            </ul>
         </div>
         <div class="lover-item">
            <ul>
               <li>
                  <div class="lover-content">
                     <h3>Donney Jon</h3>
                     <span>Perisian Org</span>
                     <p>Lorem ipsum dolor sit amet, consectetur adipisicing sit ut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.</p>
                     <ul>
                        <li>
                           <i class="bx bxs-star checked"></i>
                        </li>
                        <li>
                           <i class="bx bxs-star checked"></i>
                        </li>
                        <li>
                           <i class="bx bxs-star checked"></i>
                        </li>
                        <li>
                           <i class="bx bxs-star checked"></i>
                        </li>
                        <li>
                           <i class="bx bxs-star checked"></i>
                        </li>
                     </ul>
                     <div class="lover-icon">
                        <i class="bx bxs-quote-left"></i>
                     </div>
                  </div>
               </li>
            </ul>
         </div>
         <div class="lover-item">
            <ul>
               <li>
                  <div class="lover-content">
                     <h3>Oli Rubion</h3>
                     <span>Entoin Ect</span>
                     <p>Lorem ipsum dolor sit amet, consectetur adipisicing sit ut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.</p>
                     <ul>
                        <li>
                           <i class="bx bxs-star checked"></i>
                        </li>
                        <li>
                           <i class="bx bxs-star checked"></i>
                        </li>
                        <li>
                           <i class="bx bxs-star checked"></i>
                        </li>
                        <li>
                           <i class="bx bxs-star checked"></i>
                        </li>
                        <li>
                           <i class="bx bxs-star"></i>
                        </li>
                     </ul>
                     <div class="lover-icon">
                        <i class="bx bxs-quote-left"></i>
                     </div>
                  </div>
               </li>
            </ul>
         </div>
         <div class="lover-item">
            <ul>
               <li>
                  <div class="lover-content">
                     <h3>Sanaik Tubi</h3>
                     <span>Furnishhome, Internation</span>
                     <p>Roinin ipsum dolor sit amet, consectetur adipisicing sit ut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.</p>
                     <ul>
                        <li>
                           <i class="bx bxs-star checked"></i>
                        </li>
                        <li>
                           <i class="bx bxs-star checked"></i>
                        </li>
                        <li>
                           <i class="bx bxs-star checked"></i>
                        </li>
                        <li>
                           <i class="bx bxs-star checked"></i>
                        </li>
                        <li>
                           <i class="bx bxs-star checked"></i>
                        </li>
                     </ul>
                     <div class="lover-icon">
                        <i class="bx bxs-quote-left"></i>
                     </div>
                  </div>
               </li>
            </ul>
         </div>
      </div>
   </div>
</section>
<div id="blog" class="blog-style-area ">
   <div class="">
      <div class="main-section-title">
         <!-- <span class="sub-title">Our Partners</span> -->
         <h2>Our Partners</h2>
      </div>
      <div class="blog-style-slider2  owl-carousel owl-theme">
         <div class="blog-style-card">
            <img src="https://elitecapital.ae/static/frontend/img/partners/partner1.png">
         </div>
         <div class="blog-style-card">
            <img src="https://elitecapital.ae/static/frontend/img/partners/partner2.png">
         </div>
         <div class="blog-style-card">
            <img src="https://elitecapital.ae/static/frontend/img/partners/partner3.png">
         </div>
         <div class="blog-style-card">
            <img src="https://elitecapital.ae/static/frontend/img/partners/partner4.png">
         </div>
         <div class="blog-style-card">
            <img src="https://elitecapital.ae/static/frontend/img/partners/partner5.png">
         </div>
         <div class="blog-style-card">
            <img src="https://elitecapital.ae/static/frontend/img/partners/partner6.png">
         </div>
      </div>
   </div>
</div>
<div class="faq-style-area-with-full-width with-black-color ptb-100">
   <div class="container-fluid">
      <div class="row align-items-center">
         <div class="col-lg-6 col-md-12">
            <div class="faq-style-image">
               <img src="https://elitecapital.ae/static/frontend/img/faq-3.png" alt="image">
            </div>
         </div>
         <div class="col-lg-6 col-md-12">
            <div class="faq-style-accordion">
               <h3>Seeking Assistances? Find Answers in our Popular FAQs</h3>
               <div class="accordion" id="FaqAccordion">
                  <div class="accordion-item">
                     <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                     Do you trust Elite for transparent client oversight and dedicated support in the            
                     mortgage process?
                     </button>
                     <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#FaqAccordion">
                        <div class="accordion-body">
                           <p>Yes, Elite ensures transparent client oversight through the Mortgage Portal and provides dedicated support with a Partner Success Executive
                           </p>
                        </div>
                     </div>
                  </div>
                  <div class="accordion-item">
                     <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                     What sets Elite Capital apart from other mortgage consultants  ?
                     </button>
                     <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#FaqAccordion">
                        <div class="accordion-body">
                           <p>Elite Capital stands out for its top-notch customer care, leading commission rates, and exclusive access to diverse bank offers in the UAE. This sets them apart from other providers, making them a preferred choice for tailored financial solutions.</p>
                        </div>
                     </div>
                  </div>
                  <div class="accordion-item">
                     <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                     How to track your client's mortgage progress effortlessly ?
                     </button>
                     <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#FaqAccordion">
                        <div class="accordion-body">
                           <p>You can easily monitor your client's mortgage progress via email, SMS, push notifications, and WhatsApp, keeping you informed about your client's milestones in real-time.
                           </p>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection