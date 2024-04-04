@extends("frontend.layouts.app")
@section('page_content')
<div class="faq-style-area-with-full-width  ptb-100">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-lg-2 col-md-12">
            </div>
            <div class="col-lg-8 col-md-12">
                <div class="faq-style-accordion indiv_faq">
                    <h3>Seeking Assistances? Find Answers in our Popular FAQs</h3>
                    @foreach($all_faqs as $key => $faqs)
                    <h4 class="mb-3">{{$key}}</h4>
                    <div class="accordion" id="FaqAccordion">
                        @foreach($faqs as $ary_key => $faq)
                        <div class="accordion-item">
                            <button class="accordion-button {{$ary_key != 0 ? 'collapsed' : ''}}" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne{{$ary_key}}" aria-expanded="{{$ary_key == 0 ? 'true' : false}}" aria-controls="collapseOne{{$ary_key}}">
                           {{$faq['question']}}
                            </button>
                            <div id="collapseOne{{$ary_key}}" class="accordion-collapse collapse {{$ary_key == 0 ? 'show' : ''}}" data-bs-parent="#FaqAccordion">
                                <div class="accordion-body">
                                <p>{{$faq['answer']}}</p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <hr class="mb-2 mt-4">
                    @endforeach
                </div>
            </div>
            <div class="col-lg-2 col-md-12">
            </div>
        </div>
    </div>
</div>
@endsection