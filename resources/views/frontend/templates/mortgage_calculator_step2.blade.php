@extends("frontend.layouts.app")

@section('page_content')
<div id="home" class="confidence-home-area five-banner-here">
    <div class="container-fluid">

        <div class="row align-items-center">

            <div class="col-lg-12 col-md-12">

                <div class="confidence-home-content text-center">

                    <h1>Mortgage Calculator</h1>

                    <nav class="text-center">

                        <ol class="breadcrumb">

                            <li class="breadcrumb-item"><a href="{{route('homePage')}}">Home</a></li>

                            <li class="breadcrumb-item active">Mortgage Calculator</li>

                        </ol>

                    </nav>

                </div>

            </div>

        </div>

    </div>

</div>

<section id="service" class="one-service-area ptb-100">
    <div class="container">
        <div class="one-section-title">
            <h2>What phase are you in on your journey?</h2>
        </div>
        <nav>
            <div class="nav nav-tabs" >
                <a class="nav-item nav-default" href="{{route('mortgageCalculatorStep3')}}" >
                    <div class="service-item">
                        <h3>I'm Still Exploring</h3>
                    </div>
                </a>
                <a class="nav-item nav-default"   href="{{route('mortgageCalculatorStep3')}}" >
                    <div class="service-item">
                        <h3>I've Come Across A Property.</h3>
                    </div>
                </a>
            </div>
        </nav>
    </div>
</section>
@endsection