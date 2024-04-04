
@extends('staff.staff_dashboard')

@section('staff')

      <div class="container-fluid">
         <div class="row">
            <div class="col-lg-2">
                
            </div>
            <div class="col-lg-8">
                  <div class="iq-card">
                     <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                           <h4 class="card-title">Edit Document</h4>
                        </div>
                     </div>
                     <div class="iq-card-body">
                        <div class="new-user-info">
                           <form id="updatedocumentForm" method="POST" action="{{ route('update.document', ['id' => $clientDocument->id]) }} "enctype="multipart/form-data">
                           @csrf
                           @method('PUT')
                              <div class="row">
                                 <div class="form-group col-md-12">
                                    <label for="document_name">Document Name:</label>
                                    <input type="text" class="form-control" id="document_name" placeholder="" name="document_name" value="{{$clientDocument->document_name}}">
                                 </div>
                                 
                                 <div class="form-group col-md-12">
                                    <label for="lname">Upload Your File</label>

                                       <div class="upload-files-container">
                                          <div class="drag-file-area">
                                             <span class="material-icons-outlined upload-icon"> file_upload </span>
                                             <h3 class="dynamic-message"> Drag & drop any file here </h3>
                                             <label class="label"> or <span class="browse-files"> <input type="file" name="filename" id="filename" />
                                             

                                             <span class="browse-files-text">browse file</span> <span>from device</span> </span> </label>

                                             
                                          </div>
                                          @if($clientDocument->filename)
                                          <img class="rounded-circle img-fluid avatar-70" src="{{ asset('cleint_documents/' . $clientDocument->filename) }}" alt="filename">

                                          @else
                                          <img class="rounded-circle img-fluid avatar-70" src="{{ asset('/generic_file.jpeg') }}" alt="file">
                                       
                                          @endif

                                         <p>{{$clientDocument->filename}}</p>
                                          
                                          <span class="cannot-upload-message"> <span class="material-icons-outlined">error</span> Please select a file first <span class="material-icons-outlined cancel-alert-button">cancel</span> </span>
                                          <div class="file-block">
                                             <div class="file-info"> <span class="material-icons-outlined file-icon">description</span> <span class="file-name"> </span> | <span class="file-size">  </span> </div>
                                             <span class="material-icons remove-file-icon">delete</span>
                                             <div class="progress-bar"> </div>
                                          </div>
                                          <button type="button" class="upload-button"> Upload </button>
                                       </div>
                                    
                                   
                                 </div>
                                 
                              
                              </div>
                              <button type="submit" class="btn btn-primary">Edit Document</button>
                           </form>
                        </div>
                     </div>
                  </div>
            </div>
            <div class="col-lg-2">
                
            </div>
         </div>
      </div>

<style>
    #filename {
        display: none;
    }
   
</style>
@endsection