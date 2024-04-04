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
                                    <p class="form-control-static" id="fname">{{ $clients->first_name }}</p>
                                 </div>
                                 <!-- <div class="form-group col-md-6">
                                    <label for="lname">Last Name:</label>
                                    <p class="form-control-static" id="lname">{{$clients->last_name}}</p>
                                 </div> -->
                                 <div class="form-group col-md-6">
                                    <label for="phone_number">Contact Number</label>
                                    
                                    <p class="form-control-static" id="Mobile Number">{{$clients->phone_number}}</p>
                                 </div>
                                 <div class="form-group col-md-6">
                                    <label for="email">Email ID</label>
                                    <p class="form-control-static" id="email">{{$clients->email}}</p>
                                 </div>

                                 <div class="form-group col-sm-6">
                                    <label>Nationality</label>
                                    
                                    <p class="form-control-static" id="nationality">
                                       {{ $clients->nationality }}
                                    
                                    </p>
                                 </div>

                                 <div class="form-group col-md-6">
                                    <label for="employment">Residence Country</label>
                                    
                                    <p class="form-control-static" id="Residency_Status">
                                       {{ $clients->residence_country }}
                                       
                                    </p>
                                 </div>
                                 
                                 <div class="form-group col-md-12">
                                    <label for="add1">Current Residence Address</label>
                                    <p class="form-control-static" id="add1">{{$clients->address_line1}}</p>
                                 </div>
                                 
                                 <div class="form-group col-md-6">
                                    <label for="emirates">Emirates</label>
                                    <p class="form-control-static" id="emirates">{{$clients->emirates}}</p>
                                 </div>

                                 <div class="form-group col-md-6">
                                    <label for="company">Company you work</label>
                                    <p class="form-control-static" id="company">{{$clients->company}}</p>
                                 </div>

                                 
                                 
                                 
                                 <div class="form-group col-md-6">
                                    <label for="reference_id">Reference Id</label>
                                    <p class="form-control-static" id="reference_id">{{$clients->reference_id}}</p>
                                 </div>
                                 <div class="form-group col-md-6">
                                    <label for="security_number">Emirates ID Number</label>
                                    
                                    <p class="form-control-static" id="security_number">{{$clients->security_number}}</p>
                                 </div>
                                 <div class="form-group col-md-6">
                                    <label for="employment">Employment</label>
                                    
                                    <p class="form-control-static" id="employment">
                                    {{ $clients->employment }}
                                    
                                    </p>

                                 </div>
                                 <div class="form-group col-md-6">
                                    <label for="loan_amount_offered">Loan Amount</label>
                                    <p class="form-control-static" id="loan_amount_offered">{{$clients->loan_amount_offered}}</p>
                                 </div>
                                 <div class="form-group col-md-6">
                                    <label for="annual_gross_income">Monthly Salary Drawn</label>
                                    <p class="form-control-static" id="annual_gross_income">{{$clients->annual_gross_income}}</p>
                                 </div>
                                 <div class="form-group col-md-6">
                                    <label for="reason_for_loan">Property Status</label>
                                    <p class="form-control-static" id="reason_for_loan">
                                       {{ $clients->reason_for_loan }}
                                       
                                    </p>
                                 </div>
                                 <div class="form-group col-md-6">
                                    <label for="office_address">Office Address</label>
                                    <p class="form-control-static" id="reason_for_loan">
                                       {{ $clients->office_address }}</p>
                                 </div>
                                 <div class="form-group col-md-6">
                                    <label for="office_number">Office Phone Number</label>
                                    
                                    <p class="form-control-static" id="office_number">
                                       {{ $clients->office_phone_number }}</p>
                                 </div>
                                 <!-- <div class="form-group col-md-6">
                                    <label for="lead_type">Lead Type</label>
                                    <p class="form-control-static" id="lead_type">
                                       {{ $clients->lead_type }}</p>
                                    
                                 </div> -->
                              </div>
                              <button type="button" class="btn btn-primary" onclick="history.back()">Go Back</button>
                              <a class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit" href="{{route('edit.clients',$clients->id)}}">Edit Client</a>
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

