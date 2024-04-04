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
                           <h4 class="card-title">Update Leads</h4>
                        </div>
                     </div>
                     <div class="iq-card-body">
                        <div class="new-user-info">
                           <form id="updateLeadForm" method="POST" action="{{ route('update.loan.application', ['id' => $lead->id]) }}">
                           @csrf
                           @method('PUT')
                              <div class="row">
                                 
                                 <div class="form-group col-md-6">
                                    <label for="fname">Full Name<span style="color: red;"> *</span></label>
                                    <input type="text" class="form-control" id="fname" placeholder="Full Name" value="{{$lead->first_name}}" name="first_name" autocomplete="off">
                                    <span id="fnameError" class="text-danger"></span>

                                    @error('first_name')
                                       <span class="text-danger">{{ $message }}</span>
                                    @enderror                                 
                                 </div>
                                 <!-- <div class="form-group col-md-6">
                                    <label for="lname">Last Name:</label>
                                    <input type="text" class="form-control" id="lname" placeholder="Last Name" name="last_name" value="{{$lead->last_name}}" autocomplete="off">
                                 </div> -->
                                
                                 <div class="form-group col-md-6">
                                    <label for="phone_number">Contact Number<span style="color: red;"> *</span></label>
                                    <input type="number" class="form-control" id="phone_number" value="{{$lead->phone_number}}" placeholder="" name="phone_number" autocomplete="off">
                                    <span id="phoneError" class="text-danger"></span>

                                 </div>
                                 
                                 <div class="form-group col-md-6">
                                    <label for="email">Email ID<span style="color: red;"> *</span></label>
                                    <input type="email" class="form-control" id="email" placeholder="" value="{{$lead->email}}" name="email" autocomplete="off">
                                    <span id="emailError" class="text-danger"></span>
                                 </div>
                                 <div class="form-group col-md-6">
                                    <label for="nationality">Nationality<span style="color: red;"> *</span></label>
                                    <select class="form-control" id="nationality" name="nationality">
                                       <option value="" {{ $lead->nationality == '' ? 'selected' : '' }}>Select Nationality</option>
                                       <option value="Canada" {{ $lead->nationality == 'Canada' ? 'selected' : '' }}>Canada</option>
                                       <option value="Noida" {{ $lead->nationality == 'Noida' ? 'selected' : '' }}>Noida</option>
                                       <option value="USA" {{ $lead->nationality == 'USA' ? 'selected' : '' }}>USA</option>
                                       <option value="India" {{ $lead->nationality == 'India' ? 'selected' : '' }}>India</option>
                                       <option value="Africa" {{ $lead->nationality == 'Africa' ? 'selected' : '' }}>Africa</option>
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
                                    <input type="text" class="form-control" id="add1" placeholder="Street Address" value="{{$lead->address_line1}}" name="address_line1" autocomplete="off">
                                    <span id="residenceaddresserror" class="text-danger"></span>

                                 </div>
                                 

                                 <div class="form-group col-md-6">
                                    <label for="emirates">Emirates<span style="color: red;"> *</span></label>
                                    <select class="form-control" name="emirates">
                                       <option value="" {{ $lead->emirates == '' ? 'selected' : '' }}>Select Emirates</option>
                                       <option value="Abu_Dhabi" {{ $lead->emirates == 'Abu_Dhabi' ? 'selected' : '' }}>Abu Dhabi</option>
                                       <option value="Dubai" {{ $lead->emirates == 'Dubai' ? 'selected' : '' }}>Dubai</option>
                                       <option value="Sharjah" {{ $lead->emirates == 'Sharjah' ? 'selected' : '' }}>Sharjah</option>
                                       <option value="Ajman" {{ $lead->emirates == 'Ajman' ? 'selected' : '' }}>Ajman</option>
                                       <option value="Umm_AlQuwain" {{ $lead->emirates == 'Umm_AlQuwain' ? 'selected' : '' }}>Umm AlQuwain</option>
                                       <option value="Fujairah" {{ $lead->emirates == 'Fujairah' ? 'selected' : '' }}>Fujairah</option>
                                       <option value="Ras_AlKhaimah" {{ $lead->emirates == 'Ras_AlKhaimah' ? 'selected' : '' }}>Ras AlKhaimah</option>

                                    </select>
                                    <span id="emirateserror" class="text-danger"></span>

                                 </div>

                                 <div class="form-group col-md-6">
                                    <label for="company">Company you work<span style="color: red;"> *</span></label>
                                    <input type="text" class="form-control" id="company" placeholder="" value="{{$lead->company}}" name="company" autocomplete="off">
                                    <span id="companyerror" class="text-danger"></span>

                                 </div>

                                 
                                 <div class="form-group col-md-6">
                                    <label for="reference_id">Reference Id</label>
                                    <input type="text" class="form-control" id="reference_id" value="{{$lead->reference_id}}" placeholder="Reference Id" name="reference_id" autocomplete="off">
                                 </div>
                                 <div class="form-group col-md-6">
                                    <label for="security_number">Emirates ID Number:</label>
                                    <input type="text" class="form-control" id="security_number" value="{{$lead->security_number}}" placeholder="Emirates ID Number" name="security_number" autocomplete="off">
                                 </div>

                                 <div class="form-group col-md-6">
                                    <label for="employment">Employment<span style="color: red;"> *</span></label>
                                    <select class="form-control" id="employment" name="employment">
                                    <option value="" {{ $lead->employment == '' ? 'selected' : '' }}>Select Employment</option>
                                    <option value="salaried" {{ $lead->employment == 'salaried' ? 'selected' : '' }}>Salaried</option>
                                    <option value="self-employed" {{ $lead->employment == 'self-employed' ? 'selected' : '' }}>Self-Employed</option>
                                    
                                    </select>
                                    <span id="employementerror" class="text-danger"></span>

                                 </div>
                                 
                                 <div class="form-group col-md-6">
                                    <label for="loan_amount_offered">Loan Amount</label>
                                    <input type="text" class="form-control" id="loan_amount_offered" value="{{$lead->loan_amount_offered}}" placeholder="Loan Amount Offered" name="loan_amount_offered" autocomplete="off">
                                 </div>

                                 <div class="form-group col-md-6">
                                    <label for="annual_gross_income">Monthly Salary Drawn
                                    </label>
                                    <input type="text" class="form-control" id="annual_gross_income" value="{{$lead->annual_gross_income}}" placeholder="" name="annual_gross_income" autocomplete="off">
                                 </div>

                                 <div class="form-group col-md-6">
                                    <label for="reason_for_loan">Property Status<span style="color: red;"> *</span></label>
                                       <select class="form-control" name="reason_for_loan">
                                          <option value="" {{ $lead->reason_for_loan == '' ? 'selected' : '' }}>Select Property Status</option>
                                          <option value="resident_mortgages" {{ $lead->reason_for_loan == 'resident_mortgages' ? 'selected' : '' }}>Resident Mortgages</option>
                                          <option value="non_resident_mortgages" {{ $lead->reason_for_loan == 'non_resident_mortgages' ? 'selected' : '' }}>Non-Resident Mortgages</option>
                                          <option value="equity_releases_buyouts" {{ $lead->reason_for_loan == 'equity_releases_buyouts' ? 'selected' : '' }}>Equity Releases/buyouts</option>
                                          <option value="commercial_finance" {{ $lead->reason_for_loan == 'commercial_finance' ? 'selected' : '' }}>Commercial Finance</option>
                                       </select>
                                       <span id="propertyerror" class="text-danger"></span>

                                    </div>
                                   

                                 <div class="form-group col-md-6">
                                    <label for="office_address">Office Address<span style="color: red;"> *</span></label>
                                    <input type="text" class="form-control" id="office_address" placeholder="" name="office_address" value="{{$lead->office_address}}" autocomplete="off">
                                    <span id="officeaddresserror" class="text-danger"></span>
                                 </div>
                                 <div class="form-group col-md-6">
                                    <label for="office_number">Office Phone Number<span style="color: red;"> *</span></label>
                                    <input type="text" class="form-control" id="office_number" value="{{$lead->office_phone_number}}" placeholder="" name="office_phone_number" autocomplete="off">
                                    <span id="officephoneerror" class="text-danger"></span>
                                 </div>
                                 {{-- <div class="form-group col-md-6">
                                    <label>Application Status<span style="color: red;"> *</span></label><br>
                                    <label class="radio-inline"><input type="radio" name="application_status" value="Pending" {{$lead->application_status == "Pending" ? 'checked' : ''}}> Pending</label>
                                    <label class="radio-inline"><input type="radio" name="application_status" value="In progress" {{$lead->application_status == "In progress" ? 'checked' : ''}}> In Progress</label>
                                    <label class="radio-inline"><input type="radio" name="application_status" value="Completed" {{$lead->application_status == "Completed" ? 'checked' : ''}}> Completed</label>
                                    <span id="statuserror" class="text-danger"></span>
                                </div> --}}
                              </div>
                              <button type="button" class="btn btn-primary" onclick="history.back()">Go Back</button>
                              <button id="createLeaddBtn" type="submit" class="btn btn-primary">Update Lead</button>
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
    document.getElementById('updateLeadForm').addEventListener('submit', function(event) {
        event.preventDefault(); // Prevent the form from submitting normally
        
        // Get the form action URL which includes the lead id
        var formAction = this.getAttribute('action');
        
        // Submit the form via AJAX
        axios.post(formAction, new FormData(this))
            .then(function(response) {
                // If successful, show a pop-up message
                alert('Data Updated Successfully');
                // Optionally, you can redirect the user to another page after successful submission
                window.location.href = '{{ route("new.loan.applications") }}';
            })
            .catch(function(error) {
                // Handle errors here
                console.error(error);
            });
    });
</script>

<!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<script>
    // Define validateInput function outside of document.ready
    function validateInput() {
      console.log("sfs");
        var fname = $('#fname').val();
        var phone_number = $('#phone_number').val();
        var email = $('#email').val();
        var residence_address = $('#add1').val();
        var emirates = $('#emirates').val();
        var company = $('#company').val();
        var employment = $('#employment').val();
        var reason_for_loan = $('#reason_for_loan').val();
        var office_address = $('#office_address').val();
        var office_number = $('#office_number').val();
        var nationality = $('#nationality').val();

        var isValid = true;

        if (fname.trim() === '') {
            $('#fnameError').text('Please enter your full name').show();
            isValid = false;
        } else {
            $('#fnameError').hide();
        }

        if (phone_number.trim() === '') {
                $('#phoneError').text('Please enter your contact Number').show();
                isValid = false;
            } else {
                $('#phoneError').hide();
            }
            if (email.trim() === '') {
                $('#emailError').text('Please enter your email').show();
                isValid = false;
            } else {
                $('#emailError').hide();
            }

            if (residence_address.trim() === '') {
                $('#residenceaddresserror').text('Please enter your address').show();
                isValid = false;
            } else {
                $('#residenceaddresserror').hide();
            }

            if (emirates.trim() === '') {
                $('#emirateserror').text('Please select your emirates').show();
                isValid = false;
            } else {
                $('#emirateserror').hide();
            }

            if (company.trim() === '') {
                $('#companyerror').text('Please enter your company you work').show();
                isValid = false;
            } else {
                $('#companyerror').hide();
            }

            if (employment.trim() === '') {
                $('#employementerror').text('Please select your employment').show();
                isValid = false;
            } else {
                $('#employementerror').hide();
            }

            if (reason_for_loan.trim() === '') {
                $('#propertyerror').text('Please select your property status').show();
                isValid = false;
            } else {
                $('#propertyerror').hide();
            }

            if (office_address.trim() === '') {
                $('#officeaddresserror').text('Please enter your office address').show();
                isValid = false;
            } else {
                $('#officeaddresserror').hide();
            }

            if (office_number.trim() === '') {
                $('#officephoneerror').text('Please enter your office nubmer').show();
                isValid = false;
            } else {
                $('#officephoneerror').hide();
            }

            if (nationality.trim() === '') {
                $('#nationalityError').text('Please enter your nationality').show();
                isValid = false;
            } else {
                $('#nationalityError').hide();
            }

        return isValid;
    }

    function toggleButtons() {
        $('#createLeaddBtn').prop('disabled', false);
    }

    $(document).ready(function() {
        // Your existing document.ready code...
        $('#fname').on('input', function() {
            validateInput();
        });
        $('#phone_number').on('input', function() {
            validateInput();
        });
        $('#email').on('input', function() {
            validateInput();
        });
        $('#add1').on('input', function() {
            validateInput();
        });
        $('#emirates').on('input', function() {
            validateInput();
        });
        $('#company').on('input', function() {
            validateInput();
        });
        $('#employment').on('input', function() {
            validateInput();
        });
        $('#reason_for_loan').on('input', function() {
            validateInput();
        });
        $('#office_number').on('input', function() {
            validateInput();
        });
        $('#office_address').on('input', function() {
            validateInput();
        });
        $('#nationality').on('input', function() {
            validateInput();
        });
        $('#createLeaddBtn').click(function() {
            validateInput();
        });

        $('#updateLeadForm').submit(function(event) {
            if (!validateInput()) {
                event.preventDefault(); // Prevent form submission if validation fails
            }
        });

        toggleButtons(); // Call initial button state
    });
</script> -->
@endsection