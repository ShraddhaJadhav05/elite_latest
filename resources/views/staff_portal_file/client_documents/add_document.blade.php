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
                           <h4 class="card-title">Add Document</h4>
                        </div>
                     </div>
                     <div class="iq-card-body">
                        <div class="new-user-info">
                           <form method="POST" action="{{ route('add.document', ['clientId' => $clientId])}}" enctype="multipart/form-data">
                           @csrf
                           <input type="hidden" name="client_id" value="{{ $clientId }}">
                              <div class="row">
                                 <div class="form-group col-md-12">
                                    <label for="doc_name">Document Name:</label>
                                    <input type="text" class="form-control" name="document_name" id="doc_name" placeholder="">
                                 </div>

                                 <div class="form-group col-md-12">
                                    <label for="lname">Upload Your File</label>

                                       <div class="upload-files-container">
                                          <div class="drag-file-area">
                                             <span class="material-icons-outlined upload-icon"> file_upload </span>
                                             <h3 class="dynamic-message"> Drag & drop any file here </h3>
                                             <label class="label"> or <span class="browse-files">
                                                 <input type="file" name="filename" id="filename" onchange="displaySelectedFileName(this)" /> 

                                                 <span class="browse-files-text">browse file

                                                 </span> <span>from device</span> </span> 
                                                </label>
                                          </div>
                                          <div id="selectedFileNameContainer" class="file-box"></div>

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
                              <button type="button" class="btn btn-primary" onclick="history.back()">Go Back</button>
                              <button type="submit" class="btn btn-primary">Add Document</button>
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

    /* #selectedFileNameContainer {
      color: #f7fff7;
      background-color: #7b2cbf;
      transition: all 1s;
      width: 350px;
      position: relative;
      display: none;
	   flex-direction: row;
      justify-content: space-between;
      align-items: center;
      margin: 10px 0 15px;
      padding: 10px 20px;
      border-radius: 25px;
      cursor: pointer;
	
   }

   .file-info {
      flex: 1;
   } */

   .delete-icon {
      margin-left: 20px; /* Adjust spacing */
      cursor: pointer;
   }

   /* .file-indicator {
      content: '';
      position: absolute;
      left: 0;
      top: 0;
      width: 10px;
      height: 100%;
      background-color: #7b2cbf;
      border-radius: 25px 0 0 25px;
   } */
   
</style>

<script>
   function goBack() {
      // Go back one page in the browser's history
      window.history.go(-1);
   }
</script>
<script>
  function displaySelectedFileName(input) {
    if (input.files && input.files[0]) {
        var selectedFileName = input.files[0].name;
        var selectedFileContainer = document.getElementById('selectedFileNameContainer');
        selectedFileContainer.innerHTML = "";
        
        // Create span element to display selected file name
        var selectedFileSpan = document.createElement('span');
        selectedFileSpan.textContent = " " + selectedFileName;
        
        // Create delete icon
        var deleteIcon = document.createElement('span');
        deleteIcon.classList.add('material-icons-outlined', 'delete-icon');
        deleteIcon.textContent = 'delete';
        deleteIcon.addEventListener('click', function() {
            selectedFileContainer.innerHTML = ""; // Clear selected file
            document.getElementById('filename').value = ""; // Clear file input value
        });
        
        // Append selected file name and delete icon to the container
        selectedFileContainer.appendChild(selectedFileSpan);
        selectedFileContainer.appendChild(deleteIcon);
    }
}


</script>

@endsection