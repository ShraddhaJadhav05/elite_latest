@extends("frontend.layouts.app")

@section('page_content')

<div id="home" class="confidence-home-area five-banner-here">
   <div class="container-fluid">
      <div class="row align-items-center">
         <div class="col-lg-12 col-md-12">
            <div class="confidence-home-content text-center">
               <h1>News & Insights</h1>
               <nav class="text-center">
                  <ol class="breadcrumb">
                     <li class="breadcrumb-item"><a href="{{route('homePage')}}">Home</a></li>
                     <li class="breadcrumb-item active">News & Insights</li>
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
         @foreach($blogs as $blog)
         <div class="col-lg-4 col-md-12 mb-5">
            <div class="blog-style-left-card">
               <div class="blog-image">
                  <a href="{{route('newsIndividualData', ['id' => $blog['id'],'title' => $blog['slug_title']] )}}">
                  <img src="/image_uploads/{{$blog['image']}}" alt="image">
                  </a>
                  <div class="tag">{{ $blog['image_text'] }}</div>
               </div>
               <div class="blog-content">
                  <ul class="post-meta d-flex justify-content-between align-items-center">
                     <li>
                     </li>
                     <li>
                        <i class="bx bxs-calendar"></i> {{ $blog['date'] }}
                     </li>
                  </ul>
                  <h3>
                     <a href="{{route('newsIndividualData', ['id' => $blog['id'],'title' => $blog['slug_title']])}}">{{$blog['title']}}</a>
                  </h3>
                  <p>{!! $blog['short_description'] !!}</p>
               </div>
            </div>
         </div>
         @endforeach
      </div>
   </div>
</div>

@endsection