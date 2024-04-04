@extends('staff.staff_dashboard')

@section('staff')
{{-- @dump($clientDocument); --}}
      <div class="container-fluid">
         <div class="row">
            <div class="col-sm-2"></div>
            <div class="col-sm-8">
                  <div class="iq-card">
                    <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                           <h4 class="card-title">Verify Document</h4>
                        </div>
                     </div>
                     <div class="iq-card-body">
                        <div class="row">
                            <div class="col-md-4 col-4">
                                <h6>File Name</h6>
                             </div>
                            <div class="col-md-8 col-8">
                                <p>{{$clientDocument->document_name}}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 col-4">
                                <h6>Name:</h6>
                       
                            </div>
                            <div class="col-md-8 col-8">
                                <p>{{$client->first_name}}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 col-4">
                                <h6>Email:</h6>
                       
                            </div>
                            <div class="col-md-8 col-8">
                                <p>{{$client->email}}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 col-4">
                                <h6>Status</h6>
                            </div>
                            <div class="col-md-8 col-8">
                                @if($clientDocument->document_status == 'varified')
                                        <p><span class="badge iq-bg-success">Verified</span></p>
                                       @elseif($clientDocument->document_status == 'rejected')
                                       <p><span class="badge iq-bg-danger">Rejected</span></p>
                                       @else
                                       <p><span class="badge iq-bg-danger">Pending</span></p>
                                 @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 col-4">
                                <h6>Document</h6>
                            </div>
                            <div class="col-md-8 col-8">
                                <div class="form-group col-md-12 image_editing_section verify_file">
                                    <img src="{{ asset($clientDocument->file_path) }}" class="edit_image">

                                    <div class="newproduct_icons">
                                        <button type="button" class="newproduct_iconsbtn" data-toggle="modal" data-target="#exampleModalCenteredScrollable">
                                        <i class="ri-eye-line"></i>
                                        </button>
                                        
                                    </div>
                                </div>
                                 </div>
                            
                        </div>
                        <!-- <div class="iq-header-title text-center document_upload ">
                            <button class="btn btn-primary mb-3" onclick="return goBack()">Go Back</button>
                           
                         </div> -->
                     
                      
                    </div>
                  
                           
                     </div>
            </div>
            <div class="col-sm-2"></div>
            <div id="exampleModalCenteredScrollable" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenteredScrollableTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
                   <div class="modal-content">
                      <div class="modal-header">
                         
                         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">×</span>
                         </button>
                      </div>
                      <div class="modal-body">
                        @if(pathinfo($clientDocument->filename, PATHINFO_EXTENSION)=='pdf')
                            <embed src="{{ asset($clientDocument->file_path) }}" width="800px" height="2100px" />
                            @else
                            <img src="{{ asset($clientDocument->file_path) }}" class="w-100">
                         @endif
                       
                         
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-danger mb-0" onclick="change_status('rejected', '{{ $clientDocument->id }}')">Reject</button>
                        <button type="button" class="btn btn-success mb-0" onclick="change_status('varified', '{{ $clientDocument->id }}')">Verify</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        
                      </div>
                   </div>
                </div>
             </div>
            </div>
         </div>

@endsection


<script>
    function goBack() {
        var clientId = "{{ $clientDocument->client_id }}";
    var documentId = "{{ $clientDocument->id }}";
    var url = "{{ route('view.customer', ['documentIdPlaceholder', 'clientIdPlaceholder']) }}";
    url = url.replace('documentIdPlaceholder', documentId).replace('clientIdPlaceholder', clientId);
    window.location.href = url;
        return false; // Prevents the default action of the button
    }
   
    function change_status(status, id) {
        // var csrfToken = $('meta[name="csrf-token"]').attr('content');
  // Construct the URL with the CSRF token as a query parameter
  var url = '{{ route('update.document.status') }}'

// Append other query parameters
    url += '?&status=' +status+ '&id=' +id;
        $.ajax({
            url: url,
            method: 'GET',
            success: function(response) {
                if (response.status == 1) {
                // Reload the page
                    location.reload();
                } else {
                    // Handle other cases if needed
                    console.error('Failed to update status');
                }
            },
            // error: function(xhr, error) {
            //     // Handle error response
            //     console.error('Error updating status:', error);
            // }
        });
    }
    </script>