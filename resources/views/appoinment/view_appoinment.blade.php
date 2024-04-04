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
                           <h4 class="card-title">View Appoinment</h4>
                        </div>
                     </div>
                     <div class="iq-card-body">
                        <div class="new-user-info">
                           <form>
                           @csrf
                           <div class="row">
                              
                           <div class="form-group col-md-6">
                              <label for="name">Full Name</label>
                              <p class="form-control-static" id="name">{{ $appoinment->name }}</p>
                           </div>
                           <div class="form-group col-md-6">
                              <label for="email">Email ID</label>
                              <p class="form-control-static" id="email">{{ $appoinment->email }}</p>

                           </div>
                           
                           <div class="form-group col-md-6">
                              <label for="phone_number">Contact Number</label>
                              <p class="form-control-static" id="phone">{{ $appoinment->phone }}</p>

                           </div>
                           <div class="form-group col-md-6">
                              <label for="company">Company</label>
                              
                              <p class="form-control-static" id="company">{{ $appoinment->company }}</p>

                           </div>

                           
                           <div class="form-group col-md-6">
                                 <label for="date">Date</label>
                                 <p class="form-control-static" id="appoin_date">{{ $appoinment->date }}</p>
                              </div>
                           
                           <div class="form-group col-md-6">
                                 <label for="time_slot">Time Slot</label>
                                 <p class="form-control-static" id="time_slot">{{ $appoinment->time_slot }}</p>
                           </div>
                           <div class="form-group col-md-6">
                              <label for="message">Message</label>
                              <!-- <textarea class="form-control" id="message" name="message" rows="4" cols="50"></textarea> -->
                              <p class="form-control-static" id="message">{{ $appoinment->message }}</p>

                              <!-- <input type="text" class="form-control" id="company" placeholder="Company" name="company" autocomplete="off"> -->
                           </div>
                        </div>
                     
                              <button type="button" class="btn btn-primary" onclick="history.back()">Go Back</button>
                              <a class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit" href="{{route('edit.appoinment',$appoinment->id)}}">Edit Appoinment</a>
                           </form>
                        </div>
                     </div>
                  </div>
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

