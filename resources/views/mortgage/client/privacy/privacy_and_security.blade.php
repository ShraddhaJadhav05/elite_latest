@extends("mortgage.client.layouts.app")
@section('page_content')
<div id="content-page" class="content-page">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="">
                    <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                            <h4 class="card-title">Article</h4>
                        </div>
                    </div>
                    @if($get_article_data->isNotEmpty())
                    <div class="">
                        <div class="row">
                            @foreach($get_article_data as $data)
                            <div class="col-sm-3">
                               <div class="card iq-mb-3">
                                  <img src="{{ asset('mortgage/client/image_uploads/educational_resources/' . $data->image) }}" class="card-img-top" alt="#">
                                  <div class="card-body">
                                     <h4 class="card-title">{{$data->title}}</h4>
                                     <p class="card-text">{{$data->short_description}}</p>
                                     <a href="{{ route('help.educational.article.view',['id' => $data->id]) }}" class="btn dark-icon btn-primary article_btn_padding">View Detail</a>
                                  </div>
                               </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @else
                    <div style="text-align: center;">
                        No Data Found
                    </div>
                    @endif
                </div>
            </div> 
        </div>
    </div>
</div>
@endsection