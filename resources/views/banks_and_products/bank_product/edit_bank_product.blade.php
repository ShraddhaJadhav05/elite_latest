@extends('admin.admin_dashboard')

@section('admin')
<div class="col-lg-12">
<div class="iq-card">
   <div class="iq-card-header d-flex justify-content-between">
      <div class="iq-header-title">
         <h4 class="card-title">Bank Product Edit Form</h4>
      </div>
   </div>
   <div class="iq-card-body">
      <div class="new-user-info">
         <form id="updateLeadForm" method="POST" action="{{ route('update.bank.products', ['id' => $bank_product->id]) }}">
         @csrf
         @method('PUT')
            <div class="row">
               <div class="form-group col-md-6">
                  <label for="name">Product Name:</label>
                  <input type="text" class="form-control" id="name" placeholder="Full Name" name="name" id="name" value="{{$bank_product->name}}" autocomplete="off">
                  <span id="nameVal" class="text-danger"></span>
               </div>
      

               <div class="form-group col-md-6">
                  <label for="bankname">Bank Name:</label>
                  <select class="form-control" name="bank_id" id="bank_id" onchange=" getBankwiseBranch()">
                     <option selected="" value=""> Please select one…</option>
                     @foreach($bank as $banks)
                     <option value="{{$banks->id}}"{{ $banks->id == $bank_product->bank_id ? 'selected' : '' }}>{{$banks->name}}</option>
                     @endforeach

                  </select>
                  <span id="bank_idVal" class="text-danger"></span>
               </div>

               <div class="form-group col-md-6">
                  <label for="branchname">Branch Name</label>
                  <select class="form-control" name="branch_id" id="branch_id">
                     <option value="" selected> Please select one…</option>
                     @foreach($branch as $value)
                     <option value="{{$value->id}}"{{ $value->id == $bank_product->branch_id ? 'selected' : '' }}>{{$value->branch_name}}</option>
                     @endforeach
                  </select>
                  <span id="branch_idVal" class="text-danger"></span>
               </div>


               
               <div class="form-group col-md-6">
                  <label for="Plan">Product Plan:</label>
                  <input type="text" class="form-control" id="plan" placeholder="plan" name="plan" value="{{$bank_product->plan}}" autocomplete="off">
                    <span id="planVal" class="text-danger"></span>
               </div>
               <div class="form-group col-md-6">
                  <label for="Interest_Rate">Interest Rate:</label>
                  <input type="text" class="form-control" id="interest_rate" placeholder="Interest_Rate" name="interest_rate" value="{{$bank_product->interest_rate}}" autocomplete="off">
                    <span id="interest_rateVal" class="text-danger"></span>
               </div>
               
               <div class="form-group col-md-6">
                  <label for="interest_rate">Monthly Installment:</label>
                  <input type="text" class="form-control" id="monthly_installment" placeholder="Monthly Installment" value="{{$bank_product->monthly_installment}}" name="monthly_installment" autocomplete="off">
                   <span id="monthly_installmentVal" class="text-danger"></span>
               </div>

               
               <div class="form-group col-md-6">
                  <label for="available_date">Processing Fee:</label>
                  <input type="text" class="form-control" id="processing_fee" placeholder="Processing Fee" name="processing_fee"  value="{{$bank_product->processing_fee}}" autocomplete="off">
                  <span id="processing_feeVal" class="text-danger"></span>
               </div>


               <div class="form-group col-md-6">
                  <label for="available_date">Tenure:</label>
                  <input type="text" class="form-control" id="tenure" placeholder="Tenure" name="tenure"  value="{{$bank_product->tenure}}" autocomplete="off">
                  <span id="tenureVal" class="text-danger"></span>

               </div>
               <div class="form-group col-md-6">
                  <label for="Available_Date">Available Date:</label>
                  <input type="text" class="form-control" id="Available_Date" placeholder="Available_Date" name="available_date" value="{{$bank_product->available_date}}" autocomplete="off"><br>
                    <span id="available_dateVal" class="text-danger"></span>
               </div>
               
            </div>
            <button class="btn btn-primary" onclick="return goBack()">Go Back</button>
            <button type="submit"  class="btn btn-primary" id="createProductBtn">Update Bank Product</button>
         </form>
         
      </div>
   </div>
</div>
</div>
</div>

@endsection

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script>
   function goBack() {
       // Go back one page in the browser's history
       window.history.go(-1);
   }

   $(document).ready(function() {
       function validateInput() {
           var name = $('#name').val();
           var bankname = $('#bank_id').val();
           var brnachname = $('#branch_id').val();
           var plan = $('#plan').val();
           var interest_rate = $('#interest_rate').val();
           var processing_fee = $('#processing_fee').val();
           var tenure = $('#tenure').val();
           var monthly_installment = $('#monthly_installment').val();

           
          
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

           if (monthly_installment.trim() === '') {
               $('#monthly_installmentVal').text('Please enter the monthly installment ').show();
               isValid = false;
           } else {
               $('#monthly_installmentVal').hide();
           }
           return isValid;
       }

       function toggleButtons() {
           $('#createProductBtn').prop('disabled', false);
       }

       // $('#name').on('input', function() {
       //     //validateInput();
       // });
       // $('#bank_id').on('input', function() {
       //     //validateInput();
       // });
       // $('#branch_id').on('input', function() {
       //     //validateInput();
       // });
       // $('#plan').on('input', function() {
       //    // validateInput();
       // });


       $('#updateLeadForm').submit(function(event) {
         
        
           if (!validateInput()) {
               event.preventDefault(); // Prevent form submission if validation fails
           }
       });

       toggleButtons(); // Call initial button state
   });

   function getBankwiseBranch() {
           var bankId = $('#bank_id').val();
            let status_url = "{{ route('get.bank.branch', ['id' => ':id']) }}".replace(':id', bankId);
            
            $.ajax({
            type: 'GET',
            url: status_url,
            
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