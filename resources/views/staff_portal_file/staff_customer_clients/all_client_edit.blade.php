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
                           <h4 class="card-title">Update Client</h4>
                        </div>
                     </div>
                     <div class="iq-card-body">
                        <div class="new-user-info">
                           <form id="updateclientForm" method="POST" action="{{ route('update.clients', ['id' => $clients->id]) }}">
                           @csrf
                           @method('PUT')
                              <div class="row">
                                 <div class="form-group col-md-6">
                                    <label for="fname">Full Name<span style="color: red;"> *</span></label>
                                    <input type="text" class="form-control" id="fname" placeholder="Full Name" name="first_name" value="{{$clients->first_name}}" autocomplete="off">
                                 </div>
                                 <!-- <div class="form-group col-md-6">
                                    <label for="lname">Last Name:</label>
                                    <input type="text" class="form-control" id="lname" placeholder="Last Name" name="last_name" value="{{$clients->last_name}}" autocomplete="off">
                                 </div> -->
                                 <div class="form-group col-md-6">
                                    <label for="phone_number">Contact Number<span style="color: red;"> *</span></label>
                                    <input type="number" class="form-control" id="phone_number" placeholder="" name="phone_number" value="{{$clients->phone_number}}" autocomplete="off">
                                 </div>
                                 <div class="form-group col-md-6">
                                    <label for="email">Email ID<span style="color: red;"> *</span></label>
                                    <input type="email" class="form-control" id="email" placeholder="Email" name="email" value="{{$clients->email}}" autocomplete="off">
                                 </div>

                                 <div class="form-group col-md-6">
                                    <label for="nationality">Nationality<span style="color: red;"> *</span></label>
                                    <select class="form-control" id="nationality" name="nationality">
                                       <option value="" {{ $clients->nationality == '' ? 'selected' : '' }}>Select Nationality</option>
                                       <option value="Canada" {{ $clients->nationality == 'Canada' ? 'selected' : '' }}>Canada</option>
                                       <option value="Noida" {{ $clients->nationality == 'Noida' ? 'selected' : '' }}>Noida</option>
                                       <option value="USA" {{ $clients->nationality == 'USA' ? 'selected' : '' }}>USA</option>
                                       <option value="India" {{ $clients->nationality == 'India' ? 'selected' : '' }}>India</option>
                                       <option value="Africa" {{ $clients->nationality == 'Africa' ? 'selected' : '' }}>Africa</option>
                                    </select>
                                    <span id="nationalityError" class="text-danger"></span>
                                 </div>
                                 <div class="form-group col-sm-6">
                                    <label for="Residency_Status">Residence Country<span style="color: red;"> *</span></label>
                                    <select class="form-control" id="Residency_Status" name="residence_country" disabled>
                                       <option value="United Arab Emirates" selected>United Arab Emirates</option>
                                       
                                    </select>

                                 </div>
                                 
                                 <div class="form-group col-md-12">
                                    <label for="add1">Current Residence Address<span style="color: red;"> *</span></label>
                                    <input type="text" class="form-control" id="add1" placeholder="Street Address" name="address_line1" value="{{$clients->address_line1}}" autocomplete="off">
                                 </div>
                                 

                                 <div class="form-group col-md-6">
                                    <label for="emirates">Emirates<span style="color: red;"> *</span></label>
                                    <select class="form-control" name="emirates">
                                       <option value="" {{ $clients->emirates == '' ? 'selected' : '' }}>Select Emirates</option>
                                       <option value="Abu_Dhabi" {{ $clients->emirates == 'Abu_Dhabi' ? 'selected' : '' }}>Abu Dhabi</option>
                                       <option value="Dubai" {{ $clients->emirates == 'Dubai' ? 'selected' : '' }}>Dubai</option>
                                       <option value="Sharjah" {{ $clients->emirates == 'Sharjah' ? 'selected' : '' }}>Sharjah</option>
                                       <option value="Ajman" {{ $clients->emirates == 'Ajman' ? 'selected' : '' }}>Ajman</option>
                                       <option value="Umm_AlQuwain" {{ $clients->emirates == 'Umm_AlQuwain' ? 'selected' : '' }}>Umm AlQuwain</option>
                                       <option value="Fujairah" {{ $clients->emirates == 'Fujairah' ? 'selected' : '' }}>Fujairah</option>
                                       <option value="Ras_AlKhaimah" {{ $clients->emirates == 'Ras_AlKhaimah' ? 'selected' : '' }}>Ras AlKhaimah</option>

                                    </select>
                                 </div>

                                 <div class="form-group col-md-6">
                                    <label for="company">Company you work<span style="color: red;"> *</span></label>
                                    <input type="text" class="form-control" id="company" placeholder="" name="company" value="{{$clients->company}}" autocomplete="off">
                                 </div>

                                 <!-- <div class="form-group col-md-6">
                                    <label for="zip_code">Zip Code:</label>
                                    <input type="number" class="form-control" id="zip_code" placeholder="Zip Code" name="zip_code" value="{{$clients->zip_code}}" autocomplete="off">
                                 </div> -->
                                 
                                 
                                 <div class="form-group col-md-6">
                                    <label for="reference_id">Reference Id</label>
                                    <input type="text" class="form-control" id="reference_id" placeholder="Reference Id" name="reference_id" value="{{$clients->reference_id}}" autocomplete="off">
                                 </div>
                                 <div class="form-group col-md-6">
                                    <label for="security_number">Emirates ID Number</label>
                                    <input type="text" class="form-control" id="security_number" placeholder="Emirates ID Number" name="security_number" value="{{$clients->security_number}}" autocomplete="off">
                                 </div>
                                 <div class="form-group col-md-6">
                                    <label for="employment">Employment<span style="color: red;"> *</span></label>
                                    <select class="form-control" id="employment" name="employment">
                                    <option value="" {{ $clients->employment == '' ? 'selected' : '' }}>Select Employment</option>
                                    <option value="salaried" {{ $clients->employment == 'salaried' ? 'selected' : '' }}>Salaried</option>
                                    <option value="self-employed" {{ $clients->employment == 'self-employed' ? 'selected' : '' }}>Self-Employed</option>
                                    
                                    </select>

                                 </div>
                                 <div class="form-group col-md-6">
                                    <label for="loan_amount_offered">Loan Amount</label>
                                    <input type="text" class="form-control" id="loan_amount_offered" placeholder="Loan Amount Offered" name="loan_amount_offered" value="{{$clients->loan_amount_offered}}" autocomplete="off">
                                 </div>
                                 <div class="form-group col-md-6">
                                    <label for="annual_gross_income">Monthly Salary Drawn</label>
                                    <input type="text" class="form-control" id="annual_gross_income" placeholder="Annual Gross Income" name="annual_gross_income" value="{{$clients->annual_gross_income}}" autocomplete="off">
                                 </div>

                                 <div class="form-group col-md-6">
                                    <label for="reason_for_loan">Property Status<span style="color: red;"> *</span></label>
                                       <select class="form-control" name="reason_for_loan">
                                          <option value="" {{ $clients->reason_for_loan == '' ? 'selected' : '' }}>Select Property Status</option>
                                          <option value="resident_mortgages" {{ $clients->reason_for_loan == 'resident_mortgages' ? 'selected' : '' }}>Resident Mortgages</option>
                                          <option value="non_resident_mortgages" {{ $clients->reason_for_loan == 'non_resident_mortgages' ? 'selected' : '' }}>Non-Resident Mortgages</option>
                                          <option value="equity_releases_buyouts" {{ $clients->reason_for_loan == 'equity_releases_buyouts' ? 'selected' : '' }}>Equity Releases/buyouts</option>
                                          <option value="commercial_finance" {{ $clients->reason_for_loan == 'commercial_finance' ? 'selected' : '' }}>Commercial Finance</option>
                                       </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                    <label for="office_address">Office Address<span style="color: red;"> *</span></label>
                                    <input type="text" class="form-control" id="office_address" value="{{$clients->office_address}}" placeholder="" name="office_address" autocomplete="off">
                                 </div>
                                 <div class="form-group col-md-6">
                                    <label for="office_number">Office Phone Number<span style="color: red;"> *</span></label>
                                    <input type="text" class="form-control" id="office_number" value="{{$clients->office_phone_number}}" placeholder="" name="office_phone_number" autocomplete="off">
                                 </div>
                                 <!-- <div class="form-group col-md-6">
                                    <label for="lead_type">Lead Type</label>
                                    <select class="form-control" id="lead_type" name="lead_type">
                                       <option value="" {{ $clients->lead_type == '' ? 'selected' : '' }}>Select Service</option>
                                       <option value="Primary" {{ $clients->lead_type == 'Primary' ? 'selected' : '' }}>Primary</option>
                                       <option value="Co_applicant" {{ $clients->lead_type == 'Co_applicant' ? 'selected' : '' }}>Co-applicant</option>

                                    </select>
                                 </div> -->
                              </div>
                              <button type="button" class="btn btn-primary" onclick="history.back()">Go Back</button>
                              <button type="submit" class="btn btn-primary">Update Client</button>
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
    document.getElementById('updateclientForm').addEventListener('submit', function(event) {
        event.preventDefault(); // Prevent the form from submitting normally
        
        // Get the form action URL which includes the lead id
        var formAction = this.getAttribute('action');
        
        // Submit the form via AJAX
        axios.post(formAction, new FormData(this))
            .then(function(response) {
                // If successful, show a pop-up message
                alert('Data Updated Successfully');
                // Optionally, you can redirect the user to another page after successful submission
                window.location.href = '{{ route("loan.clients") }}';
            })
            .catch(function(error) {
                // Handle errors here
                console.error(error);
            });
    });
</script>

@endsection