@extends('admin.admin_dashboard')

@section('admin')


<div class="container-fluid">
         <div class="row">
            <div class="col-lg-2">
                 
            </div>
            <div class="col-lg-8">
                  <div class="iq-card">
                     <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                           <h4 class="card-title">View Client</h4>
                        </div>
                     </div>
                     <div class="iq-card-body">
                        <div class="new-user-info">
                           <form>
                           @csrf
                              <div class="row">
                                 <div class="form-group col-md-6">
                                    <label for="fname">Full Name</label>
                                    <p class="form-control-static" id="fname">{{ $enquiry->name }}</p>
                                 </div>
                                 
                                 
                                 <div class="form-group col-md-6">
                                    <label for="email">Email:</label>
                                    <p class="form-control-static" id="email">{{$enquiry->email}}</p>
                                 </div>
                                 <div class="form-group col-md-6">
                                    <label for="phone_number">Phone Number</label>
                                    
                                    <p class="form-control-static" id="Phone Number">{{$enquiry->phone}}</p>
                                 </div>
                                 
                                 <div class="form-group col-md-6">
                                    <label for="Subject">Subject</label>
                                    <p class="form-control-static" id="Subject">{{$enquiry->subject}}</p>
                                 </div>
                                 

                                 <div class="form-group col-sm-6">
                                    <label>message:</label>
                                    
                                    <p class="form-control-static" id="message">
                                       {{ $enquiry->message }}
                                    
                                    </p>
                                 </div>

                                 <div class="form-group col-md-6">
                                    <label for="looking_for">Looking For:</label>
                                    
                                    <p class="form-control-static" id="looking_for">
                                       {{ $enquiry->looking_for }}
                                       
                                    </p>
                                 </div>

                                 
                              </div>
                              <button type="button" class="btn btn-primary" onclick="history.back()">Go Back</button>
                           </form>
                        </div>
                     </div>
                  </div>
            </div>
            <div class="col-lg-2">
                 
            </div>
         </div>
</div>
   
<script>
   function goBack() {
      // Go back one page in the browser's history
      window.history.go(-1);
   }
</script>
@endsection