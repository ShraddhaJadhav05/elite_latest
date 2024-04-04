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
                             <h4 class="card-title">Create New Proposal</h4>
                          </div>
                       </div>
                       <div class="iq-card-body">
                        
                       
                    
                          <div class="new-user-info">
                            <div id="formContainer">
                                <!-- Initial form -->
                                <div class="form">
                                    <form id="form1" action="{{ route('add.client.proposal', $client_id) }}" method="post">
                                       @csrf
                                        <div class="row">
                                            <div class="form-group col-sm-12">
                                                <label>Mortgage Plan:</label>
                                                <select name="plan_ids[]" class="form-control select-plan" id="selectplan_1" onchange="get_plan_details(this,1);">
                                                   <option  value="">Select Plan</option>
                                                   @foreach($mortgageplans as $value)
                                                   <option value="{{$value->id}}">{{$value->mortgage_plan_id}}</option>
                                                   @endforeach
                                                </select>
                                             </div>
                                           <div class="form-group col-md-6">
                                              <label for="fname">Plan Name:</label>
                                              <input type="text" class="form-control" id="plan_name_1" placeholder="" value="" readonly>
                                           </div>
                                           <div class="form-group col-md-6">
                                              <label for="lname">Bank Name:</label>
                                              
                                              <input type="text" class="form-control" id="bank_name_1" placeholder=""  value="" readonly>
                                           </div>
                                           <div class="form-group col-md-6">
                                             <label for="lname">Branch Name:</label>
                                             
                                             <input type="text" class="form-control" id="branch_name_1" placeholder="" value="" readonly>
                                          </div>
                                           <div class="form-group col-md-6">
                                              <label for="add1">Product Name:</label>
                                             
                                              <input type="text" class="form-control" id="product_name_1" placeholder="" value="" readonly>
                                           </div>
                                           <div class="form-group col-md-6">
                                              <label for="add2">Interest Rate:</label>
                                              
                                              <input type="text" class="form-control" id="interest_rate_1" placeholder="" value="" readonly>
                                           </div>
                                           
                                            <div class="form-group col-md-12">
                                              <label for="cname">Tenure:</label>
                                              <input type="text" class="form-control" id="tenure_1" placeholder="" value="" readonly>
                                           </div>
                                           
                                           <div class="form-group col-md-12">
                                              <label for="cname">Monthly Installment:</label>
                                              <input type="text" class="form-control" id="monthly_installment_1" placeholder="" value="" readonly>
                                           </div>
                                        </div>
                                        <hr class="frm_break">
                                        <div id="form_2"></div>
                                        <div id="form_3"></div>
                                     </form>
                                    
                                </div>
                               
                            </div>
                            <div class="row"><div class="col-md-12">
                           <button id="addButton" class="add_proposal"><i class="ri-add-circle-line"></i> New Proposal</button>
                        </div>
                        </div>
                           <div class="row">
                            <div class="create_proposal_btn">
                            <button type="button" class="btn btn-secondary cancel_btn mr-2" >Cancel</button><button type="button" onclick="submitAllForms()" class="btn btn-primary ">Submit</button>
                            </div>
                        </div>
                            
                            
                          </div>
                       </div>
                    </div>
              </div>
              <div class="col-lg-2">
                   
              </div>
           </div>
        </div>
     @endsection
     <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
        <script>
         
         var i=1;
       var mortgagePlans = <?php echo json_encode($mortgageplans); ?>;
    document.addEventListener("DOMContentLoaded", function() {
    var addButton = document.getElementById("addButton");
    var formContainer = document.getElementById("formContainer");
    var maxForms = 3; // Maximum number of forms to add
    var numForms = {{sizeof($proposals)}}+1; // Initial number of forms (excluding the initial form)
    
    addButton.addEventListener("click", function() {
      i++;
        if (numForms < maxForms) {
         var appendedHtml = `
       
          <div class="row">
            <div class="form-group col-sm-12">
              <label>Mortgage Plan:</label>
              <select name="plan_ids[]" class="form-control" id="selectplan_${i}" onchange="get_plan_details(this,${i});">
                <option value="">Select Plan</option>`;
                $.each(mortgagePlans, function(index, value) {
                                    appendedHtml += `<option value="${value.id}">${value.mortgage_plan_id}</option>`;
                                });
                                appendedHtml += `
                            </select>
            </div>
            <div class="form-group col-md-6">
                                              <label for="fname">Plan Name:</label>
                                              <input type="text" class="form-control" id="plan_name_${i}" placeholder="" value="" readonly>
                                           </div>
                                           <div class="form-group col-md-6">
                                              <label for="lname">Bank Name:</label>
                                              <input type="text" class="form-control" id="bank_name_${i}" placeholder="" value="" readonly>
                                           </div>
                                           <div class="form-group col-md-6">
                                              <label for="lname">Branch Name:</label>
                                              <input type="text" class="form-control" id="branch_name_${i}" placeholder="" value="" readonly>
                                           </div>
                                           <div class="form-group col-md-6">
                                              <label for="add1">Product Name:</label>
                                              <input type="text" class="form-control" id="product_name_${i}" placeholder="" value="" readonly>
                                           </div>
                                           <div class="form-group col-md-6">
                                              <label for="add2">Interest Rate:</label>
                                              <input type="text" class="form-control" id="interest_rate_${i}" placeholder="" value="" readonly>
                                           </div>
                                           <div class="form-group col-md-12">
                                              <label for="cname">Monthly Indtallment:</label>
                                              <input type="text" class="form-control" id="tenure_${i}" placeholder="" value="" readonly>
                                           </div>
                                           
                                              <div class="form-group col-md-12">
                                              <label for="cname">Monthly Indtallment:</label>
                                              <input type="text" class="form-control" id="monthly_installment_${i}" placeholder="" value="" readonly>
                                           </div>
                                           
          </div><hr class="frm_break">`;
      
      $('#form_'+ i).append(appendedHtml);
            // formContainer.appendChild(newForm);
            numForms++;
            // Update options in other select dropdowns
            // $('.select-plan').on('change', function() {
            //     var selectedIndex = $(this).data('index');
            //     var selectedValue = $(this).val();

            //     // Remove selected option from other select dropdowns
            //     $('.select-plan').not(this).find('option[value="' + selectedValue + '"]').remove();
            // });
            
        }
        if (numForms === maxForms) {
            addButton.disabled = true; // Disable the button when maximum forms reached
        }
    });
});

function get_plan_details(id, form_no) {
        // var csrfToken = $('meta[name="csrf-token"]').attr('content');
  // Construct the URL with the CSRF token as a query parameter
  var url = '{{ route('get.mortgageplan') }}';

// Append other query parameters
    url += '?id=' +id.value;
        $.ajax({
            url: url,
            method: 'GET',
            success: function(data) {
               document.getElementById('plan_name_'+form_no).value = data.plan_name;
                    document.getElementById('bank_name_'+form_no).value = data['bank'].name;
                    document.getElementById('branch_name_'+form_no).value = data['branch'].branch_name;
                    document.getElementById('product_name_'+form_no).value = data['product'].name;
                    document.getElementById('interest_rate_'+form_no).value = data['product'].interest_rate;
                    document.getElementById('tenure_'+form_no).value = data['product'].tenure;
                    document.getElementById('monthly_installment_'+form_no).value = data['product'].monthly_installment;
            },
            // error: function(xhr, error) {
            //     // Handle error response
            //     console.error('Error updating status:', error);
            // }
        });
    }

    function countForms() {
    var forms = document.getElementsByTagName("form");
    return forms.length;
   }

   // function submitAllForms() {
   //    var numberOfForms = countForms();
   //    alert(numberOfForms);
   //    document.getElementById("form1").submit();
   //    document.getElementById("form2").submit();
   //    document.getElementById("form3").submit();
   //    // for (var i = 1; i <= numberOfForms; i++) {
   //    //    document.getElementById("form" + i).submit();
   //    // }
   // }

   function submitAllForms() {
      var forms = document.querySelector('form');

      // Check if any value is selected in the 'plan_ids' select elements
      var planIds = forms.querySelectorAll('select[name="plan_ids[]"]');
         var hasValue = Array.from(planIds).some(function(element) {
            return element.value.trim() !== '';
         });

         // If 'plan_ids' array is empty, show an alert and return without submitting the form
         if (!hasValue) {
            alert('Please select at least one mortgage plan');
            return;
         }
        // Get the form action URL which includes the lead id
        var formAction = forms.getAttribute('action');
        
        // Submit the form via AJAX
        axios.post(formAction, new FormData(forms))
            .then(function(response) {
               if (response.status === 200) {
               // If successful, show a pop-up message
               alert(response.data.success);
            // Optionally, you can redirect the user to another page after successful submission
            // window.location.href = '{{ route("all.branch") }}';
        }
               window.location.href = '{{ route("all.client.proposal") }}';
            })
            .catch(function(error) {
               if (error.response.status === 422) {
                // If the status code is 422 (Unprocessable Entity), it means validation failed
                // You can assume it's because the bank and branch already exist
                alert(error.response.data.error);
               } else {
                  // For other errors, log them to the console
                  console.error(error);
               }
            });
         }
    </script>