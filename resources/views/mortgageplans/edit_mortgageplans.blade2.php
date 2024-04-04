@extends('admin.admin_dashboard')

@section('admin')

      <div class="container-fluid">
         <div class="row">
            <div class="col-lg-2">

            </div>
            <div class="col-lg-8">
                  <div class="iq-card">
                     <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                           <h4 class="card-title">Edit Mortgage Plan</h4>
                        </div>
                     </div>
                     <div class="iq-card-body">
                        <div class="new-user-info">
                           <form id="EditMortgageForm" method="POST" action="{{ route('update.mortgageplans') }}" enctype="multipart/form-data">
                            <input type="hidden" name="mortgageplan_id" value="{{ $mortgagePlan->id }}">
                           @csrf
                              <div class="row">
                             

                                <div class="form-group col-md-6">
                                    <label for="name">Mortgage loan number:<span style="color: red;"> *</span></label>
                                    <input type="text" class="form-control" id="plan_name" value="{{$mortgagePlan->mortgage_plan_id	 }}" placeholder="Plan Name" name="plan_name" autocomplete="off" disabled>
                                 </div>
                               

                                
                                <div class="form-group col-md-6">
                                    <label for="name">Plan Name:<span style="color: red;"> *</span></label>
                                    <input type="text" class="form-control" id="plan_name" value="{{$mortgagePlan->plan_name }}" placeholder="Plan Name" name="plan_name" autocomplete="off">
                                 </div>
                               


                                 <div class="form-group col-md-6">
                                    <label for="bankname">Bank Name:</label>
                                    <select class="form-control" name="bank_id" id="bank_id" onchange="getBankwiseBranch()">
                                       <option selected=""> Please select one…</option>
                                       @foreach($bank as $banks)
                                       <option value="{{$banks->id}}"{{ $banks->id == $mortgagePlan->bank_id ? 'selected' : '' }}>{{$banks->name}}</option>
                                       @endforeach
                  
                                    </select>
                                 </div>

                                 <div class="form-group col-md-6">
                                    <label for="branchname">Branch Name</label>
                                    <select class="form-control" name="branch_id" id="branch_id" onchange="getBranchwiseProduct()">
                                       <option value="" selected> Please select one…</option>
                                       @foreach($branch as $value)
                                       <option value="{{$value->id}}"{{ $value->id == $mortgagePlan->branch_id ? 'selected' : '' }}>{{$value->branch->branch_name}}</option>
                                       @endforeach
                                    </select>
                                 </div>
                  


                                 <div class="form-group col-md-6">
                                    <label for="branchname">Product Name</label>
                                    <select class="form-control" name="product_id" id="product_id" onchange="getProductDetails()">
                                       <option value="" selected> Please select one…</option>
                                       @foreach($bankProduct as $value)
                                       <option value="{{$value->id}}"{{ $value->id == $mortgagePlan->product_id ? 'selected' : '' }}>{{$value->name}}</option>
                                       @endforeach
                                    </select>
                                 </div>
                        <div class="form-group col-md-6">
                                    <label for="branchname">Interest Rate:<span style="color: red;"> *</span></label>
                                   <span id="interest_rate" class="form-control">{{$mortgagePlan->product->interest_rate}}</span>
                              </div>
                              <div class="form-group col-md-6">
                                    <label for="branchname">Tenure:<span style="color: red;"> *</span></label>
                                    <span id="tenure" class="form-control">{{$mortgagePlan->product->tenure}}</span>
                              </div>

                              
                              <div class="form-group col-md-6">
                                    <label for="branchname">Monthly Installment:<span style="color: red;"> *</span></label>
                                   <span id="monthly_installment" class="form-control">{{$mortgagePlan->product->monthly_installment}}</span>
                              </div>

                              <div class="form-group col-md-6">
                                    <label for="branchname">Available Date:<span style="color: red;"> *</span></label>
                                   <span id="available_date" class="form-control">{{$mortgagePlan->product->available_date}}</span>
                                 </div>



                              </div>
                              <button class="btn btn-primary" onclick="return goBack()">Go Back</button>
                              <button type="submit" class="btn btn-primary">Update Mortgage loan</button>
                               <button type="reset" class="btn btn-primary">Reset</button>

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
    document.getElementById('EditMortgageForm').addEventListener('submit', function(event) {
        event.preventDefault(); // Prevent the form from submitting normally
        
        // Get the form action URL which includes the lead id
        var formAction = this.getAttribute('action');
        var mortgageplanId = document.querySelector('input[name="mortgageplan_id"]').value;

    // Create a new FormData object and append the mortgageplan_id
    var formData = new FormData(this);
    formData.append('mortgageplan_id', mortgageplanId);
        
        // Submit the form via AJAX
        axios.post(formAction, new FormData(this))
            .then(function(response) {
                // If successful, show a pop-up message
                alert('Data Added Successfully');
                // Optionally, you can redirect the user to another page after successful submission
                window.location.href = '{{ route("all.mortgageplans") }}';
            })
            .catch(function(error) {
                // Handle errors here
                console.error(error);
            });
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

               $('#product_id').empty();
                $('#product_id').append($('<option>', {
                value: '',
                text: 'Please select product'
            }));

                $('#tenure').empty();
                $('#available_date').empty();
                $('#monthly_installment').empty();
                $('#interest_rate').empty();


                $.each(data, function(key, value) {
                $('#branch_id').append($('<option>', {
                    value: value.id,
                    text: value.branch_name
                }));
            });
    
            }
        });
   }

   function getBranchwiseProduct() {
            var branch_id = $('#branch_id').val();

            $.ajax({
            type: 'GET',
            url: 'http://localhost/elite/public/admin/getBranchwiseProduct/'+ branch_id,
            
            success: function(data) {
                $('#product_id').empty();
                $('#product_id').append($('<option>', {
                value: '',
                text: 'Please select product'
            }));
                $.each(data, function(key, value) {
                $('#product_id').append($('<option>', {
                    value: value.id,
                    text: value.name
                }));
            });
    
            }
        });
   }

   function getProductDetails() {
            var product_id = $('#product_id').val();

            $.ajax({
            type: 'GET',
            url: 'http://localhost/elite/public/admin/getProductDetails/'+ product_id,
            
            success: function(data) {
               console.log(data[0].id);

               $('#tenure').html(data[0].tenure);
               $('#interest_rate').html(data[0].interest_rate);
               $('#processing_fee').html(data[0].processing_fee);
               $('#available_date').html(data[0].available_date);
               $('#monthly_installment').html(data[0].monthly_installment);
    
            }
        });
   }
</script>
@endsection

