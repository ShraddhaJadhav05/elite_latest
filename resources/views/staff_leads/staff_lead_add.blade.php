@extends('staff.staff_dashboard')

@section('staff')
<div class="col-lg-12">
<div class="iq-card">
   <div class="iq-card-header d-flex justify-content-between">
      <div class="iq-header-title">
         <h4 class="card-title">Mortgage Process</h4>
      </div>
   </div>
   <div class="iq-card-body">
      <div class="new-user-info">
         <form id="addLeadForm" method="POST" action="{{ route('add.staff.leads') }}">
         @csrf

            <div class="row">
               <div class="form-group col-md-6">
                  <label for="fname">First Name:</label>
                  <input type="text" class="form-control" id="fname" placeholder="First Name" name="first_name" autocomplete="off">
               </div>
               <div class="form-group col-md-6">
                  <label for="lname">Last Name:</label>
                  <input type="text" class="form-control" id="lname" placeholder="Last Name" name="last_name" autocomplete="off">
               </div>
               <div class="form-group col-md-6">
                  <label for="email">Email:</label>
                  <input type="email" class="form-control" id="email" placeholder="Email" name="email" autocomplete="off">
                  <span id="emailError" class="text-danger"></span>
               </div>
               <div class="form-group col-md-6">
                  <label for="birth_date">Birth Date:</label>
                  <input type="date" class="form-control" id="birth_date" placeholder="Birth Date" name="birth_date" autocomplete="off">
               </div>
               <div class="form-group col-md-6">
                  <label for="gender">Gender:</label>
                  <select class="form-control" name="gender">
                     <option value="">Please select one…</option>
                     <option value="female">Female</option>
                     <option value="male">Male</option>
                     <option value="other">Other</option>
                  </select>
               </div>
               <div class="form-group col-md-6">
                  <label for="phone_number">Phone Number:</label>
                  <input type="number" class="form-control" id="phone_number" placeholder="Phone Number" name="phone_number" autocomplete="off">
               </div>
               <div class="form-group col-md-6">
                  <label for="add1">Street Address 1:</label>
                  <input type="text" class="form-control" id="add1" placeholder="Street Address 1" name="address_line1" autocomplete="off">
               </div>
               <div class="form-group col-md-6">
                  <label for="add2">Street Address 2:</label>
                  <input type="text" class="form-control" id="add2" placeholder="Street Address 2" name="address_line2" autocomplete="off">
               </div>
               <div class="form-group col-md-12">
                  <label for="city">City:</label>
                  <input type="text" class="form-control" id="city" placeholder="City" name="city" autocomplete="off">
               </div>
               <div class="form-group col-md-12">
                  <label for="region">Region:</label>
                  <input type="text" class="form-control" id="region" placeholder="Region" name="region" autocomplete="off">
               </div>

               <div class="form-group col-md-12">
                  <label for="zip_code">Zip Code:</label>
                  <input type="number" class="form-control" id="zip_code" placeholder="Zip Code" name="zip_code" autocomplete="off">
               </div>
               <div class="form-group col-sm-12">
                  <label>Country:</label>
                  <select class="form-control" id="selectcountry" name="country">
                     <option>Select Country</option>
                     <option>Caneda</option>
                     <option>Noida</option>
                     <option >USA</option>
                     <option>India</option>
                     <option>Africa</option>
                  </select>
               </div>
               <div class="form-group col-md-6">
                  <label for="reference_id">Reference Id:</label>
                  <input type="text" class="form-control" id="reference_id" placeholder="Reference Id" name="reference_id" autocomplete="off">
               </div>
               <div class="form-group col-md-6">
                  <label for="security_number">Security Number:</label>
                  <input type="text" class="form-control" id="security_number" placeholder="Security Number" name="security_number" autocomplete="off">
               </div>
               <div class="form-group col-md-6">
                  <label for="employment">Employment:</label>
                  <select class="form-control" id="employment" name="employment">
                     <option value="">Select Employment</option>
                     <option value="employed">Employed</option>
                     <option value="social_security">Social Security</option>
                     <option value="pension">Pension</option>
                     <option value="disability">Disability</option>
                     <option value="self_employed">Self Employed</option>
                     <option value="student">Student</option>
                     <option value="unemployed">Unemployed</option>
                  </select>
               </div>
               <div class="form-group col-md-6">
                  <label for="loan_amount_offered">Loan Amount Offered:</label>
                  <input type="text" class="form-control" id="loan_amount_offered" placeholder="Loan Amount Offered" name="loan_amount_offered" autocomplete="off">
               </div>
               <div class="form-group col-md-12">
                  <label for="annual_gross_income">Annual Gross Income:</label>
                  <input type="text" class="form-control" id="annual_gross_income" placeholder="Annual Gross Income" name="annual_gross_income" autocomplete="off">
               </div>
            </div>
            <!-- <hr> -->
            <!-- <h5 class="mb-3">Security</h5> -->
            <div class="row">
               <div class="form-group col-md-12">
                  <label for="reason_for_loan">Reason For Loan:</label>
                  <input type="text" class="form-control" id="reason_for_loan" placeholder="Reason For Loan" name="reason_for_loan" autocomplete="off">
               </div>
               <div class="form-group col-md-6">
                  <label for="rent_homeowner">Rent Or Homeowner:</label>
                  <select class="form-control" name="rent_homeowner">
                     <option value="">Please select one…</option>
                     <option value="home_owner">Home Owner</option>
                     <option value="rent">Rent</option>
                     <option value="live_with_family">Live With Family</option>
                     <option value="other">Other</option>
                  </select>
               </div>
               
            </div>

               <!-- <div class="form-group col-md-12">
                  <input type="hidden" class="form-control" id="Password" placeholder="password" name="password" autocomplete="off">
               </div> -->
            
            <button type="submit"  class="btn btn-primary">Add New User</button>
         </form>
      </div>
   </div>
</div>
</div>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
   $(document).ready(function() {
        $('#email').on('blur', function() {
            var email = $(this).val();
            $.ajax({
                url: '/check-email-staff-leads',
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

@endsection

