@extends("mortgage.client.layouts.app")
@section('page_content')
<div id="content-page" class="content-page">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class=""> 
                    <div class="">
                        <div class="row">
                            <div class="col-sm-2"></div>
                            <div class="col-sm-8">
                                <div class="card iq-mb-3">
                                    <img src="{{ asset('mortgage/client/image_uploads/educational_resources/' . $get_article_data->image) }}" class="" alt="#">
                                    <div class="col-sm-3"></div>
                                    <div class="card-body">
                                        <h4 class="card-title">{{$get_article_data->title}}</h4>
                                        <p class="card-text">{{$get_article_data->short_description}}</p>   
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-2"></div>
                        </div>         
                    </div>
                </div>
            </div> 
        </div>
    </div>
</div>
@endsection