@extends('staff.staff_dashboard')

@section('staff')

     

<div class="container-fluid">
   <div class="row">
       <div class="col-lg-2"></div>
       <div class="col-lg-8">
           <div class="iq-card">
               <div class="iq-card-header d-flex justify-content-between">
                   <div class="iq-header-title">
                       <h4 class="card-title">Edit Application</h4>
                   </div>
               </div>
               <div class="iq-card-body">
                   <div class="new-user-info">
                       <form method="POST" action="{{ route('update.loan.applications', $loans->id) }}">
                           @csrf
                           @method('PUT')
                           <div class="row">
                               <div class="form-group col-md-6">
                                   <label for="application_number">Application Number</label>
                                   <input type="text" class="form-control" id="application_number" placeholder="Application Number" name="application_number" value="{{ $loans->application_number }}" autocomplete="off">
                               </div>
                               <div class="form-group col-md-6">
                                <label for="loan_number">Loan Number</label>
                                <select class="form-control" id="loan_number" name="loan_number">
                                    <option value="" selected disabled>Select Loan Number</option>
                                    <option value="LN-12334213" {{ $loans->loan_number == 'LN-12334213' ? 'selected' : '' }}>LN-12334213</option>
                                    <option value="LN-12323413" {{ $loans->loan_number == 'LN-12323413' ? 'selected' : '' }}>LN-12323413</option>
                                    <option value="LN-123234313" {{ $loans->loan_number == 'LN-123234313' ? 'selected' : '' }}>LN-123234313</option>
                                    <option value="LN-12324513" {{ $loans->loan_number == 'LN-12324513' ? 'selected' : '' }}>LN-12324513</option>
                                    <option value="LN-12334213" {{ $loans->loan_number == 'LN-12334213' ? 'selected' : '' }}>LN-12334213</option>
                                </select>
                            </div>
                               <div class="form-group col-md-6">
                                   <label for="applicant_name">Applicant's Name</label>
                                   <select class="form-control" name="bank_branch">
                                    <option selected=""> Please select one…</option>
                                    @foreach($client as $clients)
                                       <option value="{{$clients->id}}" {{ $clients->id == $loans->applicant_name ? 'selected' : '' }}>
                                          {{$clients->first_name}}
                                       </option>
                                    @endforeach
                                 </select>

                                  
                               </div>
                               <div class="form-group col-md-6">
                                   <label for="applicant_mobile">Applicant's Mobile</label>
                                   <input type="text" class="form-control" id="applicant_mobile" placeholder="Applicant's Mobile" name="applicant_mobile" value="{{ $loans->applicant_mobile }}" autocomplete="off">
                               </div>
                               <div class="form-group col-md-6">
                                   <label for="email">Email ID</label>
                                   <input type="email" class="form-control" id="email" placeholder="Email ID" name="email" value="{{ $loans->email }}" autocomplete="off">
                               </div>
                               <div class="form-group col-md-6">
                                   <label for="address">Address</label>
                                   <input type="text" class="form-control" id="address" placeholder="Address" name="address" value="{{ $loans->address }}" autocomplete="off">
                               </div>
                               <div class="form-group col-md-6">
                                   <label for="city">City</label>
                                   <input type="text" class="form-control" id="city" placeholder="City" name="city" value="{{ $loans->city }}" autocomplete="off">
                               </div>
                               <div class="form-group col-md-6">
                                   <label for="residence_country">Residence Country</label>
                                   <input type="text" class="form-control" id="residence_country" placeholder="Residence Country" name="residence_country" value="{{ $loans->residence_country }}" autocomplete="off">
                               </div>
                               <div class="form-group col-md-6">
                                   <label for="nationality">Nationality</label>
                                   <input type="text" class="form-control" id="nationality" placeholder="Nationality" name="nationality" value="{{ $loans->nationality }}" autocomplete="off">
                               </div>
                               <div class="form-group col-md-6">
                                   <label for="property">Property</label>
                                   <input type="text" class="form-control" id="property" placeholder="Property" name="property" value="{{ $loans->property }}" autocomplete="off">
                               </div>

                               
                               <div class="form-group col-md-6">
                                <label for="bank_applied">Staff Name</label>
                                <select class="form-control" name="bank_branch">
                                   <option selected=""> Please select one…</option>
                                   @foreach($staff as $staffs)
                                      <option value="{{$staffs->id}}" {{ $staffs->id == $loans->staff_name ? 'selected' : '' }}>
                                         {{$staffs->first_name}}
                                      </option>
                                   @endforeach
                                </select>
                             </div>

                      
                               <div class="form-group col-md-6">
                                   <label for="document_id">Document ID</label>
                                   <input type="text" class="form-control" id="document_id" placeholder="Document ID" name="document_id" value="{{ $loans->document_id }}" autocomplete="off">
                               </div>
                               {{-- <div class="form-group col-md-6">
                                   <label for="bank_applied">Bank Applied</label>
                                   <input type="text" class="form-control" id="bank_applied" placeholder="Bank Applied" name="bank_applied" value="{{ $loans->bank_applied }}" autocomplete="off">
                               </div> --}}

                               <div class="form-group col-md-6">
                                <label for="bank_applied">Bank Branch</label>
                                <select class="form-control" name="bank_branch">
                                   <option selected=""> Please select one…</option>
                                   @foreach($bank as $banks)
                                      <option value="{{$banks->id}}" {{ $banks->id == $loans->bank_branch ? 'selected' : '' }}>
                                         {{$banks->name}}
                                      </option>
                                   @endforeach
                                </select>
                             </div>


                             
                             <div class="form-group col-md-6">
                                <label for="bank_product">Bank Product</label>
                                <select class="form-control" name="bank_product">
                                   <option selected=""> Please select one…</option>
                                   @foreach($bank_product as $banks)
                                      <option value="{{$banks->id}}" {{ $banks->id == $loans->bank_product ? 'selected' : '' }}>
                                         {{$banks->name}}
                                      </option>
                                   @endforeach


                                   
                                </select>

                             </div>
                   
                              
                               <div class="form-group col-md-6">
                                   <label for="tenure">Tenure</label>
                                   <input type="text" class="form-control" id="tenure" placeholder="Tenure" name="tenure" value="{{ $loans->tenure }}" autocomplete="off">
                               </div>
                               <div class="form-group col-md-6">
                                   <label for="interest_rate">Interest Rate</label>
                                   <input type="text" class="form-control" id="interest_rate" placeholder="Interest Rate" name="interest_rate" value="{{ $loans->interest_rate }}" autocomplete="off">
                               </div>
                               <div class="form-group col-md-6">
                                   <label for="upfront_down_payment">Upfront Down Payment</label>
                                   <input type="text" class="form-control" id="upfront_down_payment" placeholder="Upfront Down Payment" name="upfront_down_payment" value="{{ $loans->upfront_down_payment }}" autocomplete="off">
                               </div>
                               <div class="form-group col-md-6">
                                   <label for="monthly_instalment">Monthly Instalment</label>
                                   <input type="text" class="form-control" id="monthly_instalment" placeholder="Monthly Instalment" name="monthly_instalment" value="{{ $loans->monthly_instalment }}" autocomplete="off">
                               </div>
                               <div class="form-group col-md-6">
                                <label for="application_date">Application Date</label>
                                <input type="date" class="form-control" id="application_date" placeholder="Application Date" name="application_date" value="{{ $loans->application_date }}" autocomplete="off">
                            </div>
                            {{-- <div class="form-group col-md-6">
                                <label for="application_status">Application Status</label>
                                <input type="text" class="form-control" id="application_status" placeholder="Application Status" name="application_status" value="{{ $loans->application_status }}" autocomplete="off">
                            </div> --}}

                            <div class="form-group col-md-6">
                                <label for="application_status">Application Status</label>
                                <select class="form-control" id="application_status" name="application_status">
                                    <option value="" selected disabled>Select Application Status</option>
                                    <option value="In_Progress" {{ $loans->application_status == 'In_Progress' ? 'selected' : '' }}>In Progress</option>
                                    <option value="On_Hold" {{ $loans->application_status == 'On_Hold' ? 'selected' : '' }}>On Hold</option>
                                    <option value="Rejected" {{ $loans->application_status == 'Rejected' ? 'selected' : '' }}>Rejected</option>
                                    <option value="Approved" {{ $loans->application_status == 'Approved' ? 'selected' : '' }}>Approved</option>
                                </select>
                            </div>
                            
                            <div class="form-group col-md-6">
                                <label for="bank_feedback">Bank Feedback</label>
                                <input type="text" class="form-control" id="bank_feedback" placeholder="Bank Feedback" name="bank_feedback" value="{{ $loans->bank_feedback }}" autocomplete="off">
                            </div>
                              </div>
                              <button type="button" class="btn btn-primary" onclick="history.back()">Go Back</button>
                              <button id="createLeaddBtn" type="submit" class="btn btn-primary">Update Loan Application</button>
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