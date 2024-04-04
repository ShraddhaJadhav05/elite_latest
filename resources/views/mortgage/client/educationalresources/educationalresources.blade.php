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
            <hr>
            <div class="col-sm-12">
                <div class="">
                    <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                            <h4 class="card-title">Videos</h4>
                        </div>
                    </div>
                    @if($get_video_data->isNotEmpty())
                    <div class="">
                        <div class="row">
                            @foreach($get_video_data as $data)
                            <div class="col-sm-3">
                               <div class="card iq-mb-3">
                                    <a href="#lightbox" class="lightbox-toggle video_btn_top" data-lightbox-type="video" data-lightbox-content="{{$data->video}}">
                                        <img src="{{ asset('mortgage/client/image_uploads/educational_resources/' . $data->image) }}" class="card-img-top" alt="#">
                                        <img src="{{ asset('mortgage/client/images/elite-images/play.png') }}" class="video_btn" alt="#">
                                    </a>
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
<script>
    $('body').append(`
        <div class="lightbox">
        <a href="#lightbox" class="lightbox-close lightbox-toggle">X</a>
        <div class="lightbox-container">
            <div class="row">
            <div class="col-sm-12 lightbox-column">
                
            </div>
            </div>
        </div>
        </div>
    `);

    $('.lightbox-toggle').on('click', (event) => {
    event.preventDefault();
    $('.lightbox').fadeToggle('fast');
    
    let context = $(event.currentTarget).attr('data-lightbox-type');
    let content = $(event.currentTarget).attr('data-lightbox-content');
    console.log(event);
    if (context == 'video') {
        $('.lightbox-column').append(`
            <div class="lightbox-video">
            <iframe src="${content}" frameborder="0" allowfullscreen> </iframe>
            </div>
        `);
    } else if (context == 'image') {
        $('.lightbox-column').append(`
            <img src="${content}" class="img-" frameborder="0" allowfullscreen>
        `);
    }
    });

    $('.lightbox-close').on('click', (event) => {
    event.preventDefault();
    $('.lightbox-column > *').remove();
    });
</script>
@endsection