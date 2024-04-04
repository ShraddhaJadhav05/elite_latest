@extends("frontend.layouts.app")
@section('page_content')
<div id="home" class="better-home-area">
   <div class="container">
      <div class="row align-items-center">
         <div class="col-lg-6 col-md-12">
            <div class="better-home-content">
               <h1>Collaboration enhances effectiveness</h1>
               <ul class="better-home-btn">
                  <li></li>
               </ul>
            </div>
         </div>
         <div class="col-lg-6 col-md-12">
            <div class="better-home-image agent_banner">
               <img src="{{ asset('static/frontend/img/about.jpg') }}" alt="image">
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
                           <i class="bx bx-customize"></i>
                        </div>
                        <h4>Case Management Simplified</h4>
                        <p>Effortlessly manage your home mortgage portfolios in one central hub. Submit mortgage leads, track client progress, and earn top-tier commissions, all through our user-friendly app.
                        </p>
                     </div>
                  </div>
                  <div class="col-lg-12 col-sm-12">
                     <div class="buying-inner-box">
                        <div class="icon">
                           <i class="bx bx-file"></i>
                        </div>
                        <h4>Streamlined Client Submission</h4>
                        <p>Submit new clients seamlessly from your contacts. Whether importing details or typing them in, the process is easy. Let us take care of the rest.
                        </p>
                     </div>
                  </div>
                  <div class="col-lg-12 col-sm-12">
                     <div class="buying-inner-box">
                        <div class="icon">
                           <i class="bx bx-calculator"></i>
                        </div>
                        <h4>Efficient Eligibility Calculation</h4>
                        <p>Prioritize your workload by swiftly assessing client eligibility using our mortgage calculator. Simplify the process and make informed decisions.
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
                  <h3 class="mb-2">Client Data Confidentiality Guarantee</h3>
                  <p>Your client's information is exclusively shared with your dedicated support team at Huspy – a commitment to utmost privacy.
                  </p>
               </div>
            </div>
            <div class="why-choose-us-item agents_slider">
               <div class="choose-image">
                  <img src="{{ asset('static/frontend/img/partner/choose-6.png') }}" alt="image">
               </div>
               <div class="choose-content">
                  <h3 class="mb-2">Comprehensive Support Throughout</h3>
                  <p>Rely on our team of dedicated experts to guide you and your clients through every step of the process.
                  </p>
               </div>
            </div>
            <div class="why-choose-us-item agents_slider">
               <div class="choose-image">
                  <img src="{{ asset('static/frontend/img/partner/elite-online.png') }}" alt="image">
               </div>
               <div class="choose-content">
                  <h3 class="mb-2">Real-Time Client Progress Updates</h3>
                  <p>Stay informed with instant updates on your clients' progress, ensuring timely follow-ups.
                  </p>
               </div>
            </div>
            <div class="why-choose-us-item agents_slider">
               <div class="choose-image">
                  <img src="{{ asset('static/frontend/img/partner/Service.png') }}" alt="image">
               </div>
               <div class="choose-content">
                  <h3 class="mb-2">Guaranteed Market-Leading Commissions        </h3>
                  <p>Whether submitting mortgage leads or assisting pre-approved buyers, we ensure you receive a fair share of the industry's leading commissions.</p>
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
                           <p> Elite Capital stands out for its top-notch customer care, leading commission rates, and exclusive access to diverse bank offers in the UAE. This sets them apart from other providers, making them a preferred choice for tailored financial solutions.
                           </p>
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