@extends("frontend.layouts.app")
@section('page_content')
<div id="home" class="confidence-home-area">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-lg-12 col-md-12">
                <div class="confidence-home-content text-center">
                    <h1>{{$get_data->title}}</h1>
                    <nav class="text-center">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('homePage')}}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{route('newsAndInsightData')}}">Blog</a></li>
                            <li class="breadcrumb-item active">{{$get_data->title}}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="blog" class="blog-style-area pt-100 pb-100">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-12 col-md-12 mb-5">
                <img class="blog_img" src="/image_uploads/{{ $get_data->image }}">
                <ul class="post-meta justify-content-between align-items-center blog_indiv_list">
                    <li>
                        <div class="tag blog_tag" >{{ $get_data->image_text }}</div>
                    </li>
                    <li>
                        <i class="bx bxs-calendar"></i>{{ \Carbon\Carbon::parse($get_data->date)->format('F d, Y') }}
                    </li>
                </ul>
                <h3>{{ $get_data->title }}</h3>
                {!! $get_data->description !!}
            </div>
        </div>
    </div>
</div>
@endsection