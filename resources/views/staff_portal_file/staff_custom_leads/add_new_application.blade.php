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
                           <h4 class="card-title">Create New Leads</h4>
                        </div>
                     </div>
                     <div class="iq-card-body">
                        <div class="new-user-info">
                           <form id="addstaffleadForm" method="POST" action="{{ route('add.new.loan.application') }}">
                           @csrf

                              <div class="row">
                                 <div class="form-group col-md-6">
                                    <label for="fname">Full Name<span style="color: red;"> *</span></label>
                                    <input type="text" class="form-control" id="fname" placeholder="Full Name" name="first_name" autocomplete="off">
                                    <span id="fnameError" class="text-danger"></span>

                                    @error('first_name')
                                       <span class="text-danger">{{ $message }}</span>
                                    @enderror                                 
                                 </div>
                                 <!-- <div class="form-group col-md-6">
                                    <label for="lname">Last Name:</label>
                                    <input type="text" class="form-control" id="lname" placeholder="Last Name" name="last_name" autocomplete="off">
                                 </div> -->
                                 <div class="form-group col-md-6">
                                    <label for="phone_number">Contact Number<span style="color: red;"> *</span></label>
                                    <input type="number" class="form-control" id="phone_number" placeholder="" name="phone_number" autocomplete="off">
                                    <span id="phoneError" class="text-danger"></span>

                                 </div>
                                 <div class="form-group col-md-6">
                                    <label for="email">Email ID<span style="color: red;"> *</span></label>
                                    <input type="email" class="form-control" id="email" placeholder="" name="email" autocomplete="off">
                                    <span id="emailError" class="text-danger"></span>
                                 </div>
                                 
                                 <div class="form-group col-md-6">
                                    <label for="nationality">Nationality<span style="color: red;"> *</span></label>
                                    <select class="form-control" id="nationality" name="nationality">
                                       <option value="">Select Nationality</option>
                                       <option value="Caneda">Caneda</option>
                                       <option value="Noida">Noida</option>
                                       <option value="USA">USA</option>
                                       <option value="India">India</option>
                                       <option value="Africa">Africa</option>
                                    </select>
                                    <span id="nationalityError" class="text-danger"></span>
                                 </div>
                                 <div class="form-group col-sm-6">
                                    <label for="Residency_Status">Residence Country<span style="color: red;"> *</span></label>
                                    <select class="form-control" id="Residency_Status" name="residence_country" disabled>
                                       <option value="United Arab Emirates" selected>United Arab Emirates</option>
                                       
                                    </select>

                                 </div>
                                 <!-- <div class="form-group col-md-6">
                                    <label for="birth_date">Birth Date:</label>
                                    <input type="date" class="form-control" id="birth_date" placeholder="Birth Date" name="birth_date" autocomplete="off">
                                 </div> -->
                                 <!-- <div class="form-group col-md-6">
                                    <label for="gender">Gender:</label>
                                    <select class="form-control" name="gender">
                                       <option value="">Please select one…</option>
                                       <option value="female">Female</option>
                                       <option value="male">Male</option>
                                       <option value="other">Other</option>
                                    </select>
                                 </div> -->
                                 
                                 <div class="form-group col-md-12">
                                    <label for="add1">Current Residence Address<span style="color: red;"> *</span></label>
                                    <input type="text" class="form-control" id="add1" placeholder="Street Address" name="address_line1" autocomplete="off">
                                    <span id="residenceaddresserror" class="text-danger"></span>

                                 </div>
                                 <!-- <div class="form-group col-md-12">
                                    <label for="add2">Street Address 2:</label>
                                    <input type="text" class="form-control" id="add2" placeholder="Street Address 2" name="address_line2" autocomplete="off">
                                 </div> -->
                                 <!-- <div class="form-group col-md-6">
                                    <label for="city">City:</label>
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
                                 </div> -->
                                 <!-- <div class="form-group col-md-6">
                                    <label for="region">Region:</label>
                                    <input type="text" class="form-control" id="region" placeholder="Region" name="region" autocomplete="off">
                                 </div> -->

                                 <div class="form-group col-md-6">
                                    <label for="emirates">Emirates<span style="color: red;"> *</span></label>
                                    <select class="form-control" name="emirates" id="emirates">
                                       <option value="">Select Emirates</option>
                                       <option value="Abu_Dhabi">Abu Dhabi</option>
                                       <option value="Dubai">Dubai</option>
                                       <option value="Sharjah">Sharjah</option>
                                       <option value="Ajman">Ajman</option>
                                       <option value="Umm_AlQuwain">Umm AlQuwain</option>
                                       <option value="Fujairah">Fujairah</option>
                                       <option value="Ras_AlKhaimah">Ras AlKhaimah</option>
                                    </select>
                                    <span id="emirateserror" class="text-danger"></span>
                                 </div>

                                 <div class="form-group col-md-6">
                                    <label for="company">Company you work<span style="color: red;"> *</span></label>
                                    <input type="text" class="form-control" id="company" placeholder="" name="company" autocomplete="off">
                                    <span id="companyerror" class="text-danger"></span>

                                 </div>
                                 

                                 <!-- <div class="form-group col-md-6">
                                    <label for="zip_code">Zip Code:</label>
                                    <input type="number" class="form-control" id="zip_code" placeholder="Zip Code" name="zip_code" autocomplete="off">
                                 </div> -->
                                 
                                 
                                 <div class="form-group col-md-6">
                                    <label for="reference_id">Reference Id</label>
                                    <input type="text" class="form-control" id="reference_id" placeholder="Reference Id" name="reference_id" autocomplete="off">
                                 </div>
                                 <div class="form-group col-md-6">
                                    <label for="security_number">Emirates ID Number:</label>
                                    <input type="text" class="form-control" id="security_number" placeholder="Emirates ID Number" name="security_number" autocomplete="off">
                                 </div>
                                 <div class="form-group col-md-6">
                                    <label for="employment">Employment<span style="color: red;"> *</span></label>
                                    <select class="form-control" id="employment" name="employment">
                                       <option value="">Select Employment</option>
                                       <option value="salaried">Salaried</option>
                                       <option value="self-employed">Self-Employed</option>
                                    </select>
                                    <span id="employementerror" class="text-danger"></span>
                                 </div>
                                 
                                 <div class="form-group col-md-6">
                                    <label for="loan_amount_offered">Loan Amount</label>
                                    <input type="text" class="form-control" id="loan_amount_offered" placeholder="Loan Amount Offered" name="loan_amount_offered" autocomplete="off">
                                 </div>
                                 <div class="form-group col-md-6">
                                    <label for="annual_gross_income">Monthly Salary Drawn
                                    </label>
                                    <input type="text" class="form-control" id="annual_gross_income" placeholder="" name="annual_gross_income" autocomplete="off">
                                 </div>
                                 <div class="form-group col-md-6">
                                    <label for="reason_for_loan">Property Status<span style="color: red;"> *</span></label>
                                    <select class="form-control" id="reason_for_loan" name="reason_for_loan">
                                       <option value="">Select Service</option>
                                       <option value="resident_mortgages">Resident Mortgages</option>
                                       <option value="non_resident_mortgages">Non-Resident Mortgages</option>
                                       <option value="equity_releases_buyouts">Equity Releases/buyouts</option>
                                       <option value="commercial_finance">Commercial Finance</option>
                                    </select>
                                    <span id="propertyerror" class="text-danger"></span>
                                 </div>
                                 <div class="form-group col-md-6">
                                    <label for="office_address">Office Address<span style="color: red;"> *</span></label>
                                    <input type="text" class="form-control" id="office_address" placeholder="" name="office_address" autocomplete="off">
                                    <span id="officeaddresserror" class="text-danger"></span>
                                 </div>
                                 <div class="form-group col-md-6">
                                    <label for="office_number">Office Phone Number<span style="color: red;"> *</span></label>
                                    <input type="text" class="form-control" id="office_number" placeholder="" name="office_phone_number" autocomplete="off">
                                    <span id="officephoneerror" class="text-danger"></span>
                                 </div>
                                 <div class="form-group col-md-6">
                                    <label for="lead_type">Lead Type</label>
                                    <div>
                                       <input type="checkbox" id="lead_type_co_applicant" name="lead_type" value="Co-applicant">
                                       <label for="lead_type_co_applicant">Co-applicant</label>
                                    </div>
                                 </div>

                                 {{-- <div class="form-group col-md-6">
                                    <label>Application Status<span style="color: red;"> *</span></label><br>
                                    <label class="radio-inline"><input type="radio" name="application_status" value="Pending"> Pending</label>
                                    <label class="radio-inline"><input type="radio" name="application_status" value="In progress"> In Progress</label>
                                    <label class="radio-inline"><input type="radio" name="application_status" value="Completed"> Completed</label>
                                    <span id="statuserror" class="text-danger"></span>
                                </div> --}}

                              </div>

                              
                              <button type="button" class="btn btn-primary" onclick="history.back()">Go Back</button>
                              <input type="hidden" name="continueBtn" value="1"> 

                              <button type="button" href="{{route('show.loan.application.second')}}" class="btn btn-primary" id="continueBtn"  style="display: none;">Continue</button>
                              
                              <button type="submit" class="btn btn-primary" id="createLeadBtn">Create New Lead</button>
                           </form>

                          
                        </div>
                     </div>
                  </div>
            </div>
            <div class="col-lg-2">
                 
            </div>
         </div>
      </div>


      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
    // Function to clear errors
    function clearErrors() {
        $('#subjectError').text('');
        $('#messageError').text('');
        $('#clientemailError').text('');
    }

    // Event listener to clear errors when input value changes
    $('#subject, #message, #inputEmail3').on('input change', clearErrors);

    $('#emailForm').submit(function(event) {
        event.preventDefault(); // Prevent form submission
        var form = $(this);
        var subject = $('#subject').val();
        var message = $('#message').val();
        var client_email = $('#inputEmail3').val();
        var file = $('#file').val();

        // Reset previous error messages
        clearErrors();

        // Perform validation
        if (client_email.length === 0) {
            $('#clientemailError').text('Please select at least one email.');
            return false;
        }

        if (subject.trim() === '') {
            $('#subjectError').text('Please enter a subject.');
            return false;
        }

        if (message.trim() === '') {
            $('#messageError').text('Please enter a message.');
            return false;
        }

        // You can add more validation rules here

        // If all validation passes, submit the form
        form.off('submit').submit();
    });
});

</script>


<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>


<script>
    $(document).ready(function () {
        $('#lead_type_co_applicant').on('change', function () {
            if ($(this).is(':checked')) {
                
                $('#createLeadBtn').hide();
                $('#continueBtn').show();
            } else {
                
                $('#createLeadBtn').show();
                $('#continueBtn').hide();
            }
        });

        $('#continueBtn').on('click', function () {
            console.log("hello");
            $('#addstaffleadForm').submit();
        });
    });
</script>


<script>
   $(document).ready(function() {
        $('#email').on('blur', function() {
            var email = $(this).val();
            $.ajax({
                url: '/check-user-email',
                type: 'POST',
                data: {
                    email: email,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    if (response.exists) {
                        $('#emailError').text('Email already exists');
                    } else {
                        $('#emailError').text('');
                    }
                }
            });
        });

      //   clear error if email change
        $('#email').on('input', function() {
            $('#emailError').text('');
        });
    });
</script>

<script>
   function goBack() {
      // Go back one page in the browser's history
      window.history.go(-1);
   }
</script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>


@endsection