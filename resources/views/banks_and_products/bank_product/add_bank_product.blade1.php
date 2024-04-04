@extends('admin.admin_dashboard')

@section('admin')
<div class="col-lg-12">
<div class="iq-card">
   <div class="iq-card-header d-flex justify-content-between">
      <div class="iq-header-title">
         <h4 class="card-title">Bank Product Form</h4>
      </div>
   </div>
   <div class="iq-card-body">
      <div class="new-user-info">
         <form id="addbankproductForm" method="POST" action="{{ route('add.banks.products') }}">
         @csrf

            <div class="row">
               <div class="form-group col-md-6">
                  <label for="name">Product Name:<span style="color: red;"> *</span></label>
                  <input type="text" class="form-control" id="name"  placeholder="Product Name" name="name" autocomplete="off">
                  <span id="nameVal" class="text-danger"></span>
               </div>
               

               <div class="form-group col-md-6">
                  <label for="bankname">Bank Name:<span style="color: red;"> *</span></label>
                  <select class="form-control" name="bank_id" id="bank_id" onchange=" getBankwiseBranch()">
                     <option selected="" value=""> Please select one…</option>
                     @foreach($bank as $banks)
                     <option value="{{$banks->id}}">{{$banks->name}}</option>
                     @endforeach

                  </select>
                  <span id="bank_idVal" class="text-danger"></span>
               </div>

               <div class="form-group col-md-6">
                  <label for="branchname">Branch Name<span style="color: red;"> *</span></label>
                  <select class="form-control" name="branch_id" id="branch_id">
                     <option value="" selected> Please select one…</option>
                  </select>
                  <span id="branch_idVal" class="text-danger"></span>
               </div>

               
               <div class="form-group col-md-6">
                  <label for="plan">Plan:<span style="color: red;"> *</span></label>
                  <input type="text" class="form-control" id="plan" placeholder="plan" name="plan" autocomplete="off">
                  <span id="planVal" class="text-danger"></span>
               </div>
               <div class="form-group col-md-6">
                  <label for="interest_rate">Interest Rate:</label>
                  <input type="text" class="form-control" id="interest_rate" placeholder="Interest Rate" name="interest_rate" autocomplete="off">
                   <span id="interest_rateVal" class="text-danger"></span>
               </div>

               <div class="form-group col-md-6">
                  <label for="available_date">Available Date:</label>
                  <input type="date" class="form-control" id="available_date" placeholder="Available Date" name="available_date" autocomplete="off">
                  <span id="available_dateVal" class="text-danger"></span>
               </div>
               

               <div class="form-group col-md-6">
                  <label for="available_date">Processing Fee:</label>
                  <input type="text" class="form-control" id="processing_fee" placeholder="Processing Fee" name="processing_fee" autocomplete="off">
                  <span id="processing_feeVal" class="text-danger"></span>

               </div>


               <div class="form-group col-md-6">
                  <label for="available_date">Tenure:</label>
                  <input type="text" class="form-control" id="tenure" placeholder="Tenure" name="tenure" autocomplete="off">
                  <span id="tenureVal" class="text-danger"></span>
               </div>

               
            </div>
            <button class="btn btn-primary" onclick="return goBack()">Go Back</button>
            <button type="submit"  class="btn btn-primary" id="createProductBtn">Add New Bank Product</button>
         </form>
      </div>
   </div>
</div>
</div>
</div>


@endsection

<script>
    function get_branch_data() {
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

<script>
   function goBack() {
       // Go back one page in the browser's history
       window.history.go(-1);
   }
</script>




 <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<script>
   $(document).ready(function() {
       function validateInput() {
           var name = $('#name').val();
           var bankname = $('#bank_id').val();
           var brnachname = $('#branch_id').val();
           var plan = $('#plan').val();
           var interest_rate = $('#interest_rate').val();
           var processing_fee = $('#processing_fee').val();
           var tenure = $('#tenure').val();
          
           var isValid = true;

           if (name.trim() === '') {
               $('#nameVal').text('Please enter your product name').show();
               isValid = false;
           } else {
               $('#nameVal').hide();
           }

           if (bankname.trim() === '') {
               $('#bank_idVal').text('Please enter your bank name').show();
               isValid = false;
           } else {
               $('#bank_idVal').hide();
           }
           if (brnachname.trim() === '') {
               $('#branch_idVal').text('Please enter your branch name').show();
               isValid = false;
           } else {
               $('#branch_idVal').hide();
           }

           if (plan.trim() === '') {
               $('#planVal').text('Please enter your planVal').show();
               isValid = false;
           } else {
               $('#plan').hide();
           }

          

           if (interest_rate.trim() === '') {
               $('#interest_rateVal').text('Please enter the interest rate').show();
               isValid = false;
           } else {
               $('#interest_rateVal').hide();
           }

            if (processing_fee.trim() === '') {
               $('#processing_feeVal').text('Please enter the processing Fee').show();
               isValid = false;
           } else {
               $('#processing_feeVal').hide();
           }

           if (tenure.trim() === '') {
               $('#tenureVal').text('Please enter the tenure ').show();
               isValid = false;
           } else {
               $('#tenureVal').hide();
           }
           return isValid;
       }

       function toggleButtons() {
           $('#createProductBtn').prop('disabled', false);
       }

       $('#name').on('input', function() {
           //validateInput();
       });
       $('#bank_id').on('input', function() {
           //validateInput();
       });
       $('#branch_id').on('input', function() {
           //validateInput();
       });
       $('#plan').on('input', function() {
          // validateInput();
       });


       $('#addbankproductForm').submit(function(event) {

         console.log();
           if (!validateInput()) {
               event.preventDefault(); // Prevent form submission if validation fails
           }
       });

       toggleButtons(); // Call initial button state
   });

   function getBankwiseBranch() {

            var bank_id = $('#bank_id').val();

            $.ajax({
            type: 'GET',
            url: 'http://localhost/elite/public/admin/getBankwiseBranch/'+ bank_id,
            
            success: function(data) {
                $('#branch_id').empty();
                 $('#branch_id').append($('<option>', {
                value: '',
                text: 'Please select branch'
            }));
                $.each(data, function(key, value) {
                $('#branch_id').append($('<option>', {
                    value: value.id,
                    text: value.branch_name
                }));
            });
    
            }
        });

   }
</script>