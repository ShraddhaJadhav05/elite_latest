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
                           <h4 class="card-title">View Leads</h4>
                        </div>
                     </div>
                     <div class="iq-card-body">
                        <div class="new-user-info">
                           <form>
                           @csrf
                              <div class="row">
                                 <div class="form-group col-md-6">
                                    <label for="fname">Full Name</label>
                                    <p class="form-control-static" id="fname">{{ $lead->first_name }}</p>
                                 </div>
                                 <!-- <div class="form-group col-md-6">
                                    <label for="lname">Last Name:</label>
                                    <p class="form-control-static" id="lname">{{$lead->last_name}}</p>
                                 </div> -->
                                 <div class="form-group col-md-6">
                                    <label for="phone_number">Contact Number</label>
                                    
                                    <p class="form-control-static" id="Mobile Number">{{$lead->phone_number}}</p>
                                 </div>
                                 <div class="form-group col-md-6">
                                    <label for="email">Email ID</label>
                                    <p class="form-control-static" id="email">{{$lead->email}}</p>
                                 </div>

                                 <div class="form-group col-sm-6">
                                    <label>Nationality</label>
                                    <p class="form-control-static" id="nationality">
                                       {{ $lead->nationality }}
                                    </p>
                                 </div>
                                 <div class="form-group col-md-6">
                                    <label for="employment">Residence Country</label>
                                    <p class="form-control-static" id="Residency_Status">
                                       {{ $lead->residence_country }}
                                    </p>
                                 </div>
                                 <div class="form-group col-md-12">
                                    <label for="add1">Current Residence Address</label>
                                    <p class="form-control-static" id="add1">{{$lead->address_line1}}</p>
                                 </div>
                                 <!-- <div class="form-group col-md-6">
                                    <label for="birth_date">Birth Date:</label>
                                    <p class="form-control-static" id="birth_date">{{$lead->birth_date}}</p>
                                 </div>
                                 <div class="form-group col-md-6">
                                    <label for="gender">Gender:</label>
                                    <p class="form-control-static" id="gender">
                                       {{ $lead->gender }} -->
                                    <!-- @if($lead->gender == 'female')
                                             Female
                                          @elseif($lead->gender == 'male')
                                             Male
                                          @elseif($lead->gender == 'other')
                                             Other
                                          @else
                                             Please select one…
                                    @endif -->
                                    <!-- </p>
                                 </div> -->
                                 
                                 
                                 <!-- <div class="form-group col-md-12">
                                    <label for="add2">Street Address 2:</label>
                                    
                                    <p class="form-control-static" id="add2">{{$lead->address_line2}}</p>
                                 </div> -->
                                 <!-- <div class="form-group col-md-6">
                                    <label for="city">City:</label>
                                    <p class="form-control-static" id="city">{{$lead->city}}</p>
                                 </div> -->
                                 <!-- <div class="form-group col-md-6">
                                    <label for="region">Region:</label>
                                    <p class="form-control-static" id="region">{{$lead->region}}</p>
                                 </div> -->

                                 

                                 

                                 <div class="form-group col-md-6">
                                    <label for="emirates">Emirates</label>
                                    <p class="form-control-static" id="emirates">{{$lead->emirates}}</p>
                                 </div>

                                 <div class="form-group col-md-6">
                                    <label for="company">Company you work</label>
                                    <p class="form-control-static" id="company">{{$lead->company}}</p>
                                 </div>

                                 <!-- <div class="form-group col-md-6">
                                    <label for="zip_code">Zip Code:</label>
                                    
                                    <p class="form-control-static" id="zip_code">{{$lead->zip_code}}</p>
                                 </div> -->
                                 
                                 
                                 <div class="form-group col-md-6">
                                    <label for="reference_id">Reference Id</label>
                                    <p class="form-control-static" id="reference_id">{{$lead->reference_id}}</p>
                                 </div>
                                 <div class="form-group col-md-6">
                                    <label for="security_number">Emirates ID Number</label>
                                    
                                    <p class="form-control-static" id="security_number">{{$lead->security_number}}</p>
                                 </div>
                                 <div class="form-group col-md-6">
                                    <label for="employment">Employment</label>
                                    
                                    <p class="form-control-static" id="employment">
                                    {{ $lead->employment }}
                                    
                                    </p>

                                 </div>
                                 <div class="form-group col-md-6">
                                    <label for="loan_amount_offered">Loan Amount</label>
                                    <p class="form-control-static" id="loan_amount_offered">{{$lead->loan_amount_offered}}</p>
                                 </div>
                                 <div class="form-group col-md-6">
                                    <label for="annual_gross_income">Monthly Salary Drawn</label>
                                    <p class="form-control-static" id="annual_gross_income">{{$lead->annual_gross_income}}</p>
                                 </div>
                                 <div class="form-group col-md-6">
                                    <label for="reason_for_loan">Property Status</label>
                                    <p class="form-control-static" id="reason_for_loan">
                                       {{ $lead->reason_for_loan }}
                                       
                                    </p>
                                 </div>
                                 <div class="form-group col-md-6">
                                    <label for="office_address">Office Address</label>
                                    <p class="form-control-static" id="reason_for_loan">
                                       {{ $lead->office_address }}</p>
                                 </div>
                                 <div class="form-group col-md-6">
                                    <label for="office_number">Office Phone Number</label>
                                    
                                    <p class="form-control-static" id="office_number">
                                       {{ $lead->office_phone_number }}</p>
                                 </div>
                                 <!-- <div class="form-group col-md-6">
                                    <label for="lead_type">Lead Type</label>
                                    <p class="form-control-static" id="lead_type">
                                       {{ $lead->lead_type }}</p>
                                    
                                 </div> -->
                                 {{-- <div class="form-group col-md-6">
                                    <label for="application_status">Application Status</label>
                                    
                                    <p class="form-control-static" id="application_status">
                                       {{ $lead->application_status }}</p>
                                 </div> --}}
                              </div>
                              <button type="button" class="btn btn-primary" onclick="history.back()">Go Back</button>
                              <a class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit" href="{{route('edit.loan.application',$lead->lead->id)}}">Edit Loan Application</a>
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