@extends("mortgage.client.layouts.app")
@section('page_content')
<div id="content-page" class="content-page">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-2"></div>
            <div class="col-lg-8">
                <div class="iq-card">
                    <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                            <h4 class="card-title">Add Document</h4>
                        </div> 
                    </div>
                    <div class="iq-card-body">
                        <div class="new-user-info">
                            <form action="{{ route('document.add') }}" method="POST" enctype="multipart/form-data" id="document-form">
                                @csrf
                                <input type="hidden" name="document_type" value="{{$document_type}}">
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <label for="fname">Document Name:</label>
                                        <input type="text" class="form-control" id="fname" name="document_name" placeholder="Document Name" required>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="lname">Upload Your File</label>
                                        <div class="upload-files-container">
                                            <div class="drag-file-area">
                                                <span class="material-icons-outlined upload-icon"> file_upload </span>
                                                <h3 class="dynamic-message"> Drag & drop any file here </h3>
                                                <label class="label"> or 
                                                    <span class="browse-files"> 
                                                        <input type="file" name="document" class="default-file-input" required/> 
                                                        <span class="browse-files-text">browse file</span> <span>from device</span> 
                                                    </span> 
                                                </label>
                                            </div>
                                            <span class="cannot-upload-message"> 
                                                <span class="material-icons-outlined">error</span> Please select a file first 
                                                <span class="material-icons-outlined cancel-alert-button">cancel</span> 
                                            </span>
                                            <div class="file-block">
                                                <div class="file-info"> 
                                                    <span class="material-icons-outlined file-icon">description</span> 
                                                    <span class="file-name"> </span> | <span class="file-size">  </span> 
                                                </div>
                                                <span class="material-icons remove-file-icon">delete</span>
                                                <div class="progress-bar"></div>
                                            </div>
                                            <button type="button" class="upload-button"> Upload </button>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="fname">Shown to Agent</label>
                                        <div class="custom-control custom-switch custom-switch-text custom-switch-color ">
                                            <div class="">
                                                <input type="checkbox" class="custom-control-input bg-success" id="customSwitch-33" name="shown_to_agent" value="Yes" checked="">
                                                <label class="custom-control-label" for="customSwitch-33" data-on-label="Yes" data-off-label="No">
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Add Document</button>
                            </form>
                        </div>
                     </div>
                  </div>
                </div>
            <div class="col-lg-2"></div>
        </div>
    </div>
</div>

@endsection