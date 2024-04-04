@extends("frontend.layouts.app")

@section('page_content')

<div id="home" class="confidence-home-area five-banner-here">

    <div class="container-fluid">

        <div class="row align-items-center">

            <div class="col-lg-12 col-md-12">

                <div class="confidence-home-content text-center">

                    <h1>Why Elite Capital</h1>

                    <nav class="text-center">

                        <ol class="breadcrumb">

                            <li class="breadcrumb-item"><a href="{{route('homePage')}}">Home</a></li>

                            <li class="breadcrumb-item active">Why Us</li>

                        </ol>

                    </nav>

                </div>

            </div>

        </div>

    </div>

</div>

<div id="about" class="about-style-area ptb-100">

    <div class="container">

        <div class="row align-items-center">

            <div class="col-lg-1 col-md-12">

            </div>

            <div class="col-lg-10 col-md-12">

                <div class="about-style-content">

                    <h3>Why Choose Elite Capital?</h3>

                    <p class="bold">Comprehensive Solutions with a Single Call: Access an array of services, including complete mortgage solutions, all conveniently in one place.</p>

                    <p>Diversified Investment Portfolio: Our extensive portfolio of loyal clients facilitates advantageous interest exchanges, creating golden opportunities for all parties involved. Significant Transaction Volume: Facilitating a large number of mortgage  transactions annually through our broad portfolio of solutions. Expert Team and Integrated Services: Benefit from the seamless synergy of an expert team and a comprehensive set of services. Transparent Fee Structure: We provide full disclosure of all associated fees, ensuring transparency in our dealings. Client Information Security: Safeguarding client information through our structured processes is our top priority."</p>

                </div>

            </div>

            <div class="col-lg-1 col-md-12">

            </div>

        </div>

    </div>

</div>

<div id="about" class="about-style-area with-black-color pt-100 pb-70">

    <div class="container">

        <div class="row align-items-center">

            <div class="col-lg-6 col-md-12">

                <div class="about-style-wrap-content">

                    <h3>Your Supportive Partner in Every Journey</h3>

                    <p class="bold">Elite Capital stands as your supportive partner throughout your journey to homeownership. Specializing in house mortgages, we offer a comprehensive range of tailored solutions designed to make your dream home a reality. Our dedicated support team is committed to guiding you from the initial inquiry to the moment you unlock the door to your new home. Upholding principles of transparency and fairness, we provide clear information about terms, rates, and fees, building trust through ethical business practices.</p>

                </div>

            </div>

            <div class="col-lg-6 col-md-12">

                <div class="about-style-image-wrap">

                    <img src="{{ asset('static/frontend/img/more-home/about/loan-officer.jpg') }}" alt="image">

                </div>

            </div>

        </div>

    </div>        

</div>

<section class="ptb-100">

    <div class="container">

        <div class="row">

            <div class="col-md-12">

                <div class="about-style-content p-0">

                    <h3 class="pb-3">We leverage technology<br> To enhance and improve our services</h3>

                </div>

            </div>

            <div class="col-md-4">

                <div class="loan-item tech">

                    <i class="bx bx-home"></i>

                    <h3>Check Out Our Rates</h3>

                    <p>Explore Our Competitive Rates: Take a closer look at the rates that can shape your homeownership journey. Contact us today for detailed information and to discover the financing options that best suit your needs</p>

                </div>

            </div>

            <div class="col-md-4">

                <div class="loan-item tech">

                    <i class="bx bxs-check-shield"></i>

                    <h3>Apply online</h3>

                    <p>Effortless Application: Streamline your mortgage application process by applying online. Experience convenience and simplicity as you take the first step towards securing your dream home.</p>

                </div>

            </div>

            <div class="col-md-4">

                <div class="loan-item tech">

                    <i class="bx bx-calculator"></i>

                    <h3>Personal dashboard</h3>

                    <p>Your Personal Hub: Access your dedicated personal dashboard for a seamless and intuitive experience. Monitor your mortgage progress, view important updates, and manage your homeownership journey.</p>

                </div>

            </div>

        </div>

    </div>

</section>

@endsection