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
                           <h4 class="card-title">View Loan Application</h4>
                        </div>
                     </div>
                     <div class="iq-card-body">
                        <div class="new-user-info">
                           <form method="post" action="{{route('edit.loan.applications',$loan->id)}}">
                           @csrf
                           {{-- @patch --}}
                                 <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="application_number"><b>Application Number</b></label>
                                        <p class="form-control-static" id="application_number"><b>{{ $loan->application_number }}</b></p>
                                    </div>


                                    <div class="form-group col-md-6">
                                        <label for="loan_number"><b>Proposal ID</b></label>
                                        <p class="form-control-static" id="loan_number"><b>PID{{ $loan->client_proposal->id }}</b></p>
                                    </div>


{{-- 

                                    <div class="form-group col-md-6">
                                        <label for="document_id">Document ID</label>
                                        <p class="form-control-static" id="document_id">{{ $loans->document_id }}</p>
                                    </div> --}}
                                    <div class="form-group col-md-6">
                                        <label for="applicant_name" class="font-weight-bold">Applicant's Name</label>
                                        <p class="form-control-static" id="applicant_name">
                                            {{$loan->client->first_name}} 

                                        </p>
                                    </div>
                               
                                    <div class="form-group col-md-6">
                                        <label for="applicant_mobile" class="font-weight-bold">Applicant's Mobile</label>
                                        <p class="form-control-static" id="applicant_mobile">{{$loan->client->phone_number}} </p>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="email" class="font-weight-bold">Email ID</label>
                                        <p class="form-control-static" id="email">{{$loan->client->email}} </p>
                                    </div>
                                
                                    <div class="form-group col-md-6">
                                        <label for="address" class="font-weight-bold">Address</label>
                                        <p class="form-control-static" id="address">{{$loan->client->address_line1}} </p>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="city" class="font-weight-bold">City</label>
                                        <p class="form-control-static" id="city">{{$loan->client->city}} </p>
                                    </div>
                               
                                    <div class="form-group col-md-6">
                                        <label for="residence_country" class="font-weight-bold">Residence Country</label>
                                        <p class="form-control-static" id="residence_country">{{$loan->client->country}}</p>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="nationality" class="font-weight-bold">Nationality</label>
                                        <p class="form-control-static" id="nationality">{{ $loan->client->nationality }}</p>
                                    </div>
                               
                                    <div class="form-group col-md-6">
                                        <label for="property" class="font-weight-bold">Property</label>
                                        <p class="form-control-static" id="property">{{ $loan->client->property }}</p>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="staff_name" class="font-weight-bold">Staff Name</label>
                                        <p class="form-control-static" id="staff_name">
                                            {{$loan->staff->first_name ?? ''}}
                                        </p>
                                    </div>
                               
                                    <div class="form-group col-md-6">
                                        <label for="bank_branch" class="font-weight-bold">Bank Branch</label>
                                        <p class="form-control-static" id="bank_branch"> {{$loan->client_proposal->mortgageplan->branch->branch_name}}</p>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="bank_product" class="font-weight-bold">Bank Product</label>
                                        <p class="form-control-static" id="bank_product"> {{$loan->client_proposal->mortgageplan->product->name}}</p>
                                    </div>
                               
                                    <div class="form-group col-md-6">
                                        <label for="tenure" class="font-weight-bold">Tenure</label>
                                        <p class="form-control-static" id="tenure">{{ $loan->client_proposal->mortgageplan->product->tenure }}</p>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="interest_rate" class="font-weight-bold">Interest Rate</label>
                                        <p class="form-control-static" id="interest_rate">{{ $loan->client_proposal->mortgageplan->product->interest_rate }}</p>
                                    </div>
                               
                                    <div class="form-group col-md-6">
                                        <label for="upfront_down_payment" class="font-weight-bold">Upfront Down Payment</label>
                                        <p class="form-control-static" id="upfront_down_payment">{{ $loan->upfront_down_payment }}</p>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="monthly_instalment" class="font-weight-bold">Monthly Instalment</label>
                                        <p class="form-control-static" id="monthly_instalment">{{ $loan->client_proposal->mortgageplan->product->monthly_installment }}</p>
                                    </div>
                                
                                    <div class="form-group col-md-6">
                                        <label for="application_date" class="font-weight-bold">Application Date</label>
                                        <p class="form-control-static" id="application_date">{{ $loan->application_date }}</p>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="application_date" class="font-weight-bold">Document Verified</label>
                                        @foreach($document as $value)
                                        <p class="form-control-static" id="application_date">{{ $value->document_name }}</p>
                                        @endforeach
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="application_status" class="font-weight-bold">Application Status</label>
                                        <select class="form-control" id="application_status" name="application_status">
                                            <option value="pending" @if($loan->application_status=='pending')selected @endif>Pending</option>
                                            <option value="in_progress" @if($loan->application_status=='in_progress')selected @endif>In Progress</option>
                                            <option value="on_hold" @if($loan->application_status=='on_hold')selected @endif>On Hold</option>
                                            <option value="rejected" @if($loan->application_status=='rejected')selected @endif>Rejected</option>
                                            <option value="approved" @if($loan->application_status=='approved')selected @endif>Approved</option>
                                        </select>
                                    </div>
                                
                                    <div class="form-group col-md-6">
                                        <label for="bank_feedback" class="font-weight-bold">Bank Feedback</label>
                                        <input type="text" class="form-control" id="bank_feedback" placeholder="Bank Feedback" name="bank_feedback" autocomplete="off" value="{{$loan->bank_feedback}}">
                                    </div>
                                </div>
                                
                              </div>
                              <button type="button" class="btn btn-primary" onclick="history.back()">Go Back</button>
                              <button class="btn btn-primary" type="submit">Edit Loan Application</button>
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