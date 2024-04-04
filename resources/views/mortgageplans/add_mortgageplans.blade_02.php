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
                           <h4 class="card-title">Add Mortgage Plan</h4>
                        </div>
                     </div>
                     <div class="iq-card-body">
                        <div class="new-user-info">
                           <form id="addMortgageForm" method="POST" action="{{ route('add.mortgageplans') }}" enctype="multipart/form-data">
                           @csrf
                              <div class="row">
                             

                                
                                <div class="form-group col-md-6">
                                    <label for="name">Plan Name:<span style="color: red;"> *</span></label>
                                    <input type="text" class="form-control" id="plan_name" placeholder="Plan Name" name="plan_name" autocomplete="off">
                                 </div>
                               


                                 <div class="form-group col-md-6">
                                    <label for="bankname">Bank Name:<span style="color: red;"> *</span></label>
                                    <select class="form-control" name="bank_id" id="bank_id" onchange="return getBankwiseBranch()">
                                       <option selected=""> Please select one…</option>
                                       @foreach($bank as $banks)
                                       <option value="{{$banks->id}}">{{$banks->name}}</option>
                                       @endforeach
                  
                                    </select>
                                    <span id="bank_id" class="text-danger"></span>
                                 </div>
                  
                                 <div class="form-group col-md-6">
                                    <label for="branchname">Branch Name<span style="color: red;"> *</span></label>
                                    <select class="form-control" name="branch_id" id="branch_id" onchange=" getBranchwiseProduct()">
                                       <option value="" selected> Please select one…</option>
                                      
                                    </select>
                                    <span id="branch_id" class="text-danger"></span>
                                 </div>
                  


                                 <div class="form-group col-md-6">
                                    <label for="branchname">Product Name<span style="color: red;"> *</span></label>
                                    <select class="form-control" name="product_id" id="product_id" onchange="getProductDetails()" >
                                       <option value="" selected> Please select one…</option>
                                       
                                    </select>
                                    <span id="branch_id" class="text-danger"></span>
                                 </div>
                  

                                 <div class="form-group col-md-6">
                                    <label for="branchname">Interest Rate:<span style="color: red;"> *</span></label>
                                    
                                    <span id="interest_rate" class="form-control"></span>
                                 </div>

                                 <div class="form-group col-md-6">
                                    <label for="branchname">Processing Fee:<span style="color: red;"> *</span></label>
                                    
                                    <span id="processing_fee" class="form-control"></span>
                                 </div>


                                 <div class="form-group col-md-6">
                                    <label for="branchname">Tenure:<span style="color: red;"> *</span></label>
                                    <span id="tenure" class="form-control"></span>
                                 </div>

                                 <div class="form-group col-md-6">
                                    <label for="branchname">Available Date:<span style="color: red;"> *</span></label>
                                   <span id="available_date" class="form-control"></span>
                                 </div>




                              </div>
                              <button class="btn btn-primary" onclick="return goBack()">Go Back</button>
                              <button type="submit" class="btn btn-primary">Add Bank</button>

                           </form>
                        </div>
                     </div>
                  </div>
            </div>
            <div class="col-lg-2">

            </div>
         </div>
      </div>
@endsection
<script>
   function goBack() {
      // Go back one page in the browser's history
      window.history.go(-1);
   }
</script>

<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

<script>
    document.getElementById('addMortgageForm').addEventListener('submit', function(event) {
        event.preventDefault(); // Prevent the form from submitting normally
        
        // Get the form action URL which includes the lead id
        var formAction = this.getAttribute('action');
        
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

   function getBranchwiseProduct() {
            var branch_id = $('#branch_id').val();
            let status_url = "{{ route('get.branch.product', ['id' => ':id']) }}".replace(':id', branch_id);

            $.ajax({
            type: 'GET',
            url: status_url,
            
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
            let status_url = "{{ route('get.product', ['id' => ':id']) }}".replace(':id', product_id);

            $.ajax({
            type: 'GET',
            url: status_url,
            
            success: function(data) {
               console.log(data[0].id);

               $('#tenure').html(data[0].tenure);
               $('#interest_rate').html(data[0].interest_rate);
               $('#processing_fee').html(data[0].processing_fee);
               $('#available_date').html(data[0].available_date);
    
            }
        });
   }
    
</script>



