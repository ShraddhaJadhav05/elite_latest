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
         <form id="updatestaffLeadForm" method="POST" action="{{ route('update.staff.leads', ['id' => $staff_leads->id]) }}">
         @csrf
         @method('PUT')
            <div class="row">
               <div class="form-group col-md-6">
                  <label for="fname">First Name:</label>
                  <input type="text" class="form-control" id="fname" placeholder="First Name" name="first_name" value="{{$staff_leads->first_name}}" autocomplete="off">
               </div>
               <div class="form-group col-md-6">
                  <label for="lname">Last Name:</label>
                  <input type="text" class="form-control" id="lname" placeholder="Last Name" name="last_name" value="{{$staff_leads->last_name}}" autocomplete="off">
               </div>
               <div class="form-group col-md-6">
                  <label for="email">Email:</label>
                  <input type="email" class="form-control" id="email" placeholder="Email" name="email" value="{{$staff_leads->email}}" autocomplete="off">
               </div>
               <div class="form-group col-md-6">
                  <label for="birth_date">Birth Date:</label>
                  <input type="date" class="form-control" id="birth_date" placeholder="Birth Date" name="birth_date" value="{{$staff_leads->birth_date}}" autocomplete="off">
               </div>
               <div class="form-group col-md-6">
                  <label for="gender">Gender:</label>
                  <select class="form-control" name="gender">
                    <option value="" {{ $staff_leads->gender == '' ? 'selected' : '' }}>Please select one…</option>
                    <option value="female" {{ $staff_leads->gender == 'female' ? 'selected' : '' }}>Female</option>
                    <option value="male" {{ $staff_leads->gender == 'male' ? 'selected' : '' }}>Male</option>
                    <option value="other" {{ $staff_leads->gender == 'other' ? 'selected' : '' }}>Other</option>
                </select>
               </div>
               <div class="form-group col-md-6">
                  <label for="phone_number">Phone Number:</label>
                  <input type="number" class="form-control" id="phone_number" placeholder="Phone Number" name="phone_number" value="{{$staff_leads->phone_number}}" autocomplete="off">
               </div>
               <div class="form-group col-md-6">
                  <label for="add1">Street Address 1:</label>
                  <input type="text" class="form-control" id="add1" placeholder="Street Address 1" name="address_line1" value="{{$staff_leads->address_line1}}" autocomplete="off">
               </div>
               <div class="form-group col-md-6">
                  <label for="add2">Street Address 2:</label>
                  <input type="text" class="form-control" id="add2" placeholder="Street Address 2" name="address_line2" value="{{$staff_leads->address_line2}}" autocomplete="off">
               </div>
               <div class="form-group col-md-12">
                  <label for="city">City:</label>
                  <input type="text" class="form-control" id="city" placeholder="City" name="city" value="{{$staff_leads->city}}" autocomplete="off">
               </div>
               <div class="form-group col-md-12">
                  <label for="region">Region:</label>
                  <input type="text" class="form-control" id="region" placeholder="Region" name="region" value="{{$staff_leads->region}}" autocomplete="off">
               </div>

               <div class="form-group col-md-12">
                  <label for="zip_code">Zip Code:</label>
                  <input type="number" class="form-control" id="zip_code" placeholder="Zip Code" name="zip_code" value="{{$staff_leads->zip_code}}" autocomplete="off">
               </div>
               <div class="form-group col-sm-12">
                  <label>Country:</label>
                  <select class="form-control" id="selectcountry" name="country">
                    <option value="" {{ $staff_leads->country == '' ? 'selected' : '' }}>Select Country</option>
                    <option value="Canada" {{ $staff_leads->country == 'Canada' ? 'selected' : '' }}>Canada</option>
                    <option value="Noida" {{ $staff_leads->country == 'Noida' ? 'selected' : '' }}>Noida</option>
                    <option value="USA" {{ $staff_leads->country == 'USA' ? 'selected' : '' }}>USA</option>
                    <option value="India" {{ $staff_leads->country == 'India' ? 'selected' : '' }}>India</option>
                    <option value="Africa" {{ $staff_leads->country == 'Africa' ? 'selected' : '' }}>Africa</option>
                </select>
               </div>
               <div class="form-group col-md-6">
                  <label for="reference_id">Reference Id:</label>
                  <input type="text" class="form-control" id="reference_id" placeholder="Reference Id" name="reference_id" value="{{$staff_leads->reference_id}}" autocomplete="off">
               </div>
               <div class="form-group col-md-6">
                  <label for="security_number">Security Number:</label>
                  <input type="text" class="form-control" id="security_number" placeholder="Security Number" name="security_number" value="{{$staff_leads->security_number}}" autocomplete="off">
               </div>
               <div class="form-group col-md-6">
                  <label for="employment">Employment:</label>
                  <select class="form-control" id="employment" name="employment">
                    <option value="" {{ $staff_leads->employment == '' ? 'selected' : '' }}>Select Employment</option>
                    <option value="employed" {{ $staff_leads->employment == 'employed' ? 'selected' : '' }}>Employed</option>
                    <option value="social_security" {{ $staff_leads->employment == 'social_security' ? 'selected' : '' }}>Social Security</option>
                    <option value="pension" {{ $staff_leads->employment == 'pension' ? 'selected' : '' }}>Pension</option>
                    <option value="disability" {{ $staff_leads->employment == 'disability' ? 'selected' : '' }}>Disability</option>
                    <option value="self_employed" {{ $staff_leads->employment == 'self_employed' ? 'selected' : '' }}>Self Employed</option>
                    <option value="student" {{ $staff_leads->employment == 'student' ? 'selected' : '' }}>Student</option>
                    <option value="unemployed" {{ $staff_leads->employment == 'unemployed' ? 'selected' : '' }}>Unemployed</option>
                  </select>

               </div>
               <div class="form-group col-md-6">
                  <label for="loan_amount_offered">Loan Amount Offered:</label>
                  <input type="text" class="form-control" id="loan_amount_offered" placeholder="Loan Amount Offered" name="loan_amount_offered" value="{{$staff_leads->loan_amount_offered}}" autocomplete="off">
               </div>
               <div class="form-group col-md-12">
                  <label for="annual_gross_income">Annual Gross Income:</label>
                  <input type="text" class="form-control" id="annual_gross_income" placeholder="Annual Gross Income" name="annual_gross_income" value="{{$staff_leads->annual_gross_income}}" autocomplete="off">
               </div>
            </div>
            <!-- <hr> -->
            <!-- <h5 class="mb-3">Security</h5> -->
            <div class="row">
               <div class="form-group col-md-12">
                  <label for="reason_for_loan">Reason For Loan:</label>
                  <input type="text" class="form-control" id="reason_for_loan" placeholder="Reason For Loan" name="reason_for_loan" value="{{$staff_leads->reason_for_loan}}" autocomplete="off">
               </div>
               <div class="form-group col-md-6">
                  <label for="rent_homeowner">Rent Or Homeowner:</label>
                  <select class="form-control" name="rent_homeowner">
                    <option value="" {{ $staff_leads->rent_homeowner == '' ? 'selected' : '' }}>Please select one...</option>
                    <option value="home_owner" {{ $staff_leads->rent_homeowner == 'home_owner' ? 'selected' : '' }}>Home Owner</option>
                    <option value="rent" {{ $staff_leads->rent_homeowner == 'rent' ? 'selected' : '' }}>Rent</option>
                    <option value="live_with_family" {{ $staff_leads->rent_homeowner == 'live_with_family' ? 'selected' : '' }}>Live With Family</option>
                    <option value="other" {{ $staff_leads->rent_homeowner == 'other' ? 'selected' : '' }}>Other</option>
                  </select>

               </div>
               
            </div>
            
            <button type="submit"  class="btn btn-primary">Update</button>
         </form>
         
      </div>
   </div>
</div>
</div>
</div>


@endsection

