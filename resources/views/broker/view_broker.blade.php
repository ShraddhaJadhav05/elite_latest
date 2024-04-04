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
                           <h4 class="card-title">View Broker</h4>
                        </div>
                     </div>
                     <div class="iq-card-body">
                        <div class="new-user-info">
                           <form>
                           @csrf
                              <div class="row">
                                 <div class="form-group col-md-6">
                                    <label for="fname">First Name</label>
                                    <p class="form-control-static" id="fname">{{ $broker->first_name }}</p>
                                 </div>
                                 <div class="form-group col-md-6">
                                    <label for="lname">Last Name</label>
                                    <p class="form-control-static" id="lname">{{$broker->last_name}}</p>
                                 </div>
                                 <div class="form-group col-md-6">
                                    <label for="phone_number">Contact Number</label>
                                    
                                    <p class="form-control-static" id="Mobile Number">{{$broker->phone}}</p>
                                 </div>
                                 <div class="form-group col-md-6">
                                    <label for="email">Email ID</label>
                                    <p class="form-control-static" id="email">{{$broker->email}}</p>
                                 </div>
                                 <div class="form-group col-sm-6">
                                    <label>Nationality</label>
                                    <p class="form-control-static" id="nationality">
                                       {{ $broker->nationality }}
                                    </p>
                                 </div>
                                 <div class="form-group col-md-6">
                                    <label for="company">Company</label>
                                    <p class="form-control-static" id="company">{{$broker->company}}</p>
                                 </div>
                             
                              </div>
                              <button type="button" class="btn btn-primary" onclick="history.back()">Go Back</button>
                              <a class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit" href="{{route('edit.broker',$broker->id)}}">Edit Broker</a>
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