@extends("mortgage.client.layouts.app")
@section('page_content')
<div id="content-page" class="content-page">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-2">   
            </div>
            <div class="col-lg-8">
                <div class="iq-card">
                    <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                            <h4 class="card-title">View Document</h4>
                        </div>
                    </div>
                     <div class="iq-card-body">
                        <div class="row">
                            <div class="col-md-4 col-4">
                                <h6>Document Name:</h6>
                             </div>
                            <div class="col-md-8 col-8">
                                <p>{{$document->document_name}}</p>
                            </div>
                        </div>
                        <div class="row">
                           <div class="col-md-4 col-4">
                               <h6>Uploaded Date:</h6>
                            </div>
                           <div class="col-md-8 col-8">
                               <p>{{ $document->created_at->format('d M ,Y') }}</p>
                           </div>
                       </div>
                       <div class="row">
                            <div class="col-md-4 col-4">
                                <h6>Shown to Agent:</h6>
                            </div>
                            <div class="col-md-8 col-8">
                                <p> 
                                    @if($document->shown_to_agent == true)
                                        Yes
                                    @else
                                        No
                                    @endif
                                </p>
                            </div>
                        </div>
                        @if($document_type)
                        <div class="row">
                            <div class="col-md-4 col-4">
                                <h6>Status: </h6>
                            </div>
                            <div class="col-md-8 col-8">
                                <p>
                                    @if($document->status == 'Verified')
                                    <span class="badge iq-bg-success">Verified</span>
                                    @elseif($document->status == 'Rejected')
                                    <span class="badge iq-bg-danger">Rejected</span>
                                    @elseif($document->status == 'Pending')
                                    <span class="badge iq-bg-warning">Pending</span>
                                    @endif
                                </p>
                            </div>
                        </div>
                        @endif
                        <div class="row">
                            <div class="col-md-4 col-4">
                                <h6>Document:</h6>
                            </div>
                            <div class="col-md-8 col-8">
                                @if($documentContent)
                                <img class="w-50" src="data:image/jpeg;base64,{{ base64_encode($documentContent) }}" alt="Document Image">
                                @else
                                <img class="w-50" src="{{ asset('mortgage/client/images/elite-images/boxed-bg.jpg') }}">
                                @endif
                            </div>
                        </div>
                        <div class="row mt-3">
                           <div class="col-md-4 col-4">
                               <h6>Action:</h6>
                           </div>
                           <div class="col-md-8 col-8">
                               <a href="{{route('document.edit' , ['id' => $document->id ,'type' => $document_type] )}}" class="btn btn-primary article_btn_padding">Edit</a>
                           </div>
                       </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-2">    
            </div>
        </div>
    </div>
</div>

@endsection