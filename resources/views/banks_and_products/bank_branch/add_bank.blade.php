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
                           <h4 class="card-title">Add New Bank Branch</h4>
                        </div>
                     </div>
                     <div class="iq-card-body">
                        <div class="new-user-info">
                           <form id="addbankForm" method="POST" action="{{ route('add.banks_branch') }}" enctype="multipart/form-data">
                           @csrf
                              <div class="row">
                                 
                                 <div class="form-group col-md-6">
                                    <label for="bankname">Bank Name</label>
                                    <select class="form-control" name="bank_id">
                                       <option value="" selected> Please select one…</option>
                                       @foreach($bank as $banks)
                                       <option value="{{$banks->id}}">{{$banks->name}}</option>
                                       @endforeach

                                    </select>
                                 </div>
                                 
                                 <div class="form-group col-md-6">
                                    <label for="branchname">Branch Name</label>
                                    <select class="form-control" name="branch_id">
                                       <option value="" selected> Please select one…</option>
                                       @foreach($branch as $value)
                                       <option value="{{$value->id}}">{{$value->branch_name}}</option>
                                       @endforeach
                                    </select>
                                 </div>

                                 <div class="form-group col-md-6">
                                    <label for="address">Address</label>
                                    <input type="text" class="form-control" id="address" placeholder="address" name="address"  autocomplete="off">
                                 </div>
                                 <div class="form-group col-md-6">
                                    <label for="city">City</label>
                                    <select class="form-control" name="city">
                                       <option value="">Select City</option>
                                       <option value="Abu_Dhabi">Abu Dhabi</option>
                                       <option value="Dubai">Dubai</option>
                                       <option value="Sharjah">Sharjah</option>
                                       <option value="Ajman">Ajman</option>
                                       <option value="Umm_AlQuwain">Umm AlQuwain</option>
                                       <option value="Fujairah">Fujairah</option>
                                       <option value="Ras_AlKhaimah">Ras AlKhaimah</option>

                                    </select>
                                 </div>
                                 <div class="form-group col-md-6">
                                    <label for="emirates">Emirates</label>
                                    <select class="form-control" name="emirate">
                                       <option value="">Select Emirates</option>
                                       <option value="Abu_Dhabi">Abu Dhabi</option>
                                       <option value="Dubai">Dubai</option>
                                       <option value="Sharjah">Sharjah</option>
                                       <option value="Ajman">Ajman</option>
                                       <option value="Umm_AlQuwain">Umm AlQuwain</option>
                                       <option value="Fujairah">Fujairah</option>
                                       <option value="Ras_AlKhaimah">Ras AlKhaimah</option>

                                    </select>
                                 </div>
                                 <div class="form-group col-sm-6">
                                    <label for="nationality">Nation</label>
                                    <select class="form-control" name="country" disabled>
                                       <option value="United Arab Emirates" selected>United Arab Emirates</option>
                                       <!-- <option value="Caneda">Caneda</option>
                                       <option value="Noida">Noida</option>
                                       <option value="USA">USA</option>
                                       <option value="India">India</option>
                                       <option value="Africa">Africa</option> -->
                                    </select>
                                 </div>
                                 <div class="form-group col-md-6">
                                    <label for="contact">Contact Number</label>
                                    <input type="number" class="form-control" id="contact" placeholder="Contact" name="contact" autocomplete="off">
                                 </div>

                                 <div class="form-group col-md-6">
                                    <label for="description">Description</label>
                                    <textarea class="form-control" id="description" name="description" rows="2" cols="40" ></textarea>
                                 </div>


                              </div>
                              <button class="btn btn-primary" onclick="return goBack()">Go Back</button>
                              <button type="submit" class="btn btn-primary">Add Bank</button>

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

<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

<script>
    document.getElementById('addbankForm').addEventListener('submit', function(event) {
        event.preventDefault(); // Prevent the form from submitting normally
        
        // Get the form action URL which includes the lead id
        var formAction = this.getAttribute('action');
        
        // Submit the form via AJAX
        axios.post(formAction, new FormData(this))
            .then(function(response) {
                // If successful, show a pop-up message
                alert('Data Added Successfully');
                // Optionally, you can redirect the user to another page after successful submission
                window.location.href = '{{ route("all.banks") }}';
            })
            .catch(function(error) {
                // Handle errors here
                console.error(error);
            });
    });
</script>
@endsection

