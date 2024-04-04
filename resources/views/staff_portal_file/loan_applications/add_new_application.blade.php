@extends('staff.staff_dashboard')

@section('staff')

<div class="container-fluid">
   <div class="row">
       <div class="col-lg-2"></div>
       <div class="col-lg-8">
           <div class="iq-card">
               <div class="iq-card-header d-flex justify-content-between">
                   <div class="iq-header-title">
                       <h4 class="card-title">Add New Application</h4>
                   </div>
               </div>
               <div class="iq-card-body">
                   <div class="new-user-info">
                       <form method="POST" action="{{ route('add.loan.applications') }}">
                           @csrf
                           <div class="row">
                               {{-- <div class="form-group col-md-6">
                                   <label for="application_number">Application Number</label>
                                   <input type="text" class="form-control" id="application_number" placeholder="Application Number" name="application_number" autocomplete="off">
                               </div> --}}
                               <div class="form-group col-md-6">
                                <label for="loan_number">Loan Number</label>

                                <select class="form-control" id="loan_number" name="loan_number">
                                    <option value="" selected>Select Loan Number</option>
                                    <option value="LN-12334213">LN-12334213</option>
                                    <option value="LN-12323413">LN-12323413</option>
                                    <option value="LN-123234313">LN-123234313</option>
                                    <option value="LN-12324513">LN-12324513</option>
                                    <option value="LN-12334213">LN-12334213</option>
                                </select>

                            </div>

                               <div class="form-group col-md-6">
                                 <label for="applicant_name">Applicant's Name</label>
                                 <select class="form-control" name="applicant_name" id="applicant_name" onchange="handleApplicantNameChange()">
                                    <option value="" selected="selected">Select applicant name</option>
                                    @foreach($client as $clients)
                                    <option value="{{$clients->id}}">{{$clients->first_name}}</option>
                                    @endforeach
                                 </select>
                             </div>
                             <div class="form-group col-md-6">
                                 <label for="applicant_mobile">Applicant's Mobile</label>
                                 <input type="text" class="form-control" id="applicant_mobile" placeholder="Applicant's Mobile" name="applicant_mobile"  autocomplete="off">
                             </div>
                             <div class="form-group col-md-6">
                                 <label for="email">Email ID</label>
                                 <input type="email" class="form-control" id="email" placeholder="Email ID" name="email"  autocomplete="off" value="">
                             </div>
                             <div class="form-group col-md-6">
                                 <label for="address">Address</label>
                                 <input type="text" class="form-control" id="address" placeholder="Address" name="address"  autocomplete="off" value="">
                             </div>
                             <div class="form-group col-md-6">
                                 <label for="city">City</label>
                                 <input type="text" class="form-control" id="city" placeholder="City" name="city"  autocomplete="off" value="">
                             </div>
                             <div class="form-group col-md-6">
                                 <label for="residence_country">Residence Country</label>
                                 <input type="text" class="form-control" id="residence_country" placeholder="Residence Country" name="residence_country" autocomplete="off" value="">
                             </div>
                             <div class="form-group col-md-6">
                                 <label for="nationality">Nationality</label>
                                 <input type="text" class="form-control" id="nationality" placeholder="Nationality" name="nationality" autocomplete="off" value="">
                             </div>
                             <div class="form-group col-md-6">
                                 <label for="property">Property</label>
                                 <input type="text" class="form-control" id="property" placeholder="Property" name="property"  autocomplete="off" value="">
                             </div>
                             <div class="form-group col-md-6">
                                 <label for="staff_name">Staff Name</label>
                                 <select class="form-control" name="staff_name" id="staff_name" onchange="handleApplicantNameChange()">
                                      <option value="" selected>Select staff name</option>
                                    {{-- <option selected=""> Please select one…</option> --}}
                                    @foreach($staff as $staffs)
                                    <option value="{{$staffs->id}}">{{$staffs->first_name}}</option>
                                    @endforeach
                                 </select>
                              
                             </div>
                             <div class="form-group col-md-6">
                                 <label for="document_id">Varified Document </label>
                                 <input type="text" class="form-control" id="document_id" placeholder="Document ID" name="document_id"  autocomplete="off" disabled >
                             </div>
                             <div class="form-group col-md-6">
                                <label for="bankname">Bank Name</label>
                                <select class="form-control" name="bank_id">
                                     
                                   <option selected=""> Please select one…</option>
                                   @foreach($bank as $banks)
                                   <option value="{{$banks->id}}">{{$banks->name}}</option>
                                   @endforeach

                                </select>
                             </div>
                               <div class="form-group col-md-6">
                                   <label for="bank_branch">Bank Branch</label>
                                   <select class="form-control" name="bank_branch" id="bank_branch">
                                         <option value="" selected>Select branch name</option>
                                    {{-- <option selected=""> Please select one…</option> --}}
                                    @foreach($bank as $banks)
                                    <option value="{{$banks->id}}">{{$banks->branch_name}}</option>
                                    @endforeach
                                 </select>
                               </div>

                               <div class="form-group col-md-6">
                                   <label for="bank_product">Bank Product</label>
                                   <select class="form-control" name="bank_product" id="bank_product">
                                           <option value="" selected>Select bank product</option>
                                    {{-- <option selected=""> Please select one…</option> --}}
                                    @foreach($bank_product as $bank_products)
                                    <option value="{{$bank_products->id}}">{{$bank_products->name}}</option>
                                    @endforeach
                                 </select>
                                 
                               </div>
                               <div class="form-group col-md-6">
                                   <label for="tenure">Tenure</label>
                                   <input type="text" class="form-control" id="tenure" placeholder="Tenure" name="tenure" autocomplete="off">
                               </div>
                               <div class="form-group col-md-6">
                                   <label for="interest_rate">Interest Rate</label>
                                   <input type="text" class="form-control" id="interest_rate" placeholder="Interest Rate" name="interest_rate" autocomplete="off">
                               </div>
                               <div class="form-group col-md-6">
                                   <label for="upfront_down_payment">Upfront Down Payment</label>
                                   <input type="text" class="form-control" id="upfront_down_payment" placeholder="Upfront Down Payment" name="upfront_down_payment" autocomplete="off">
                               </div>
                               <div class="form-group col-md-6">
                                   <label for="monthly_instalment">Monthly Instalment</label>
                                   <input type="text" class="form-control" id="monthly_instalment" placeholder="Monthly Instalment" name="monthly_instalment" autocomplete="off">
                               </div>
                               <div class="form-group col-md-6">
                                   <label for="application_date">Application Date</label>
                                   <input type="date" class="form-control" id="application_date" placeholder="Application Date" name="application_date" autocomplete="off">
                               </div>
                               <div class="form-group col-md-6">
                                <label for="application_status">Application Status</label>
                                <select class="form-control" id="application_status" name="application_status">
                                    <option value="" selected disabled>Select Application Status</option>
                                    <option value="Pending" selected>Pending</option>
                                    <option value="In_Progress">In Progress</option>
                                    <option value="On_Hold">On Hold</option>
                                    <option value="Rejected">Rejected</option>
                                    <option value="Approved">Approved</option>
                                </select>
                            </div>
                               <div class="form-group col-md-6">
                                   <label for="bank_feedback">Bank Feedback</label>
                                   <input type="text" class="form-control" id="bank_feedback" placeholder="Bank Feedback" name="bank_feedback" autocomplete="off">
                               </div>
                           </div>
                           <button class="btn btn-primary" onclick="return goBack()">Go Back</button>
                           <button type="submit" class="btn btn-primary">Add New Application</button>
                       </form>
                   </div>
               </div>
           </div>
       </div>
       <div class="col-lg-2"></div>
   </div>
</div>
<script>
    function handleApplicantNameChange() {
        // Get the value of the applicant_name input field
        var applicantName = document.getElementById('applicant_name').value;

        // Perform actions based on the applicant's name
        console.log('Applicant Name:', applicantName);


        
        $.ajax({
            type: 'GET',
            url: 'http://127.0.0.1:8000/public/staff/getData_loan_applications/'+ applicantName,
            
            success: function(data) {
                // Display the returned data in browser
                $("#result").html(data);
    
    let documentNames = data.document.map(document => document.document_name);
    let commaSeparatedNames = documentNames.join(', ');
                console.log(commaSeparatedNames);

                document.getElementById('applicant_mobile').value = data.client.phone_number;
                    document.getElementById('email').value = data.client.email;
                    document.getElementById('address').value = data.client.address_line1;
                    document.getElementById('city').value = data.client.city;
                    document.getElementById('residence_country').value = data.client.residence_country;
                    document.getElementById('nationality').value = data.client.nationality;
                    document.getElementById('property').value = data.client.reason_for_loan;
                    document.getElementById('document_id').value = commaSeparatedNames;

            }
        });

    }
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