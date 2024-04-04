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
                           <h4 class="card-title">{{$mortgagePlan->plan_name}}</h4>
                        </div>
                     </div>
                     <div class="iq-card-body">
                        <div class="row">
                            <div class="col-md-4 col-4">
                                <h6>Mortgage Id:</h6>
                             </div>
                            <div class="col-md-8 col-8">
                                <p>{{$mortgagePlan->mortgage_plan_id}}</p>
                            </div>
                        </div>
                        <div class="row">
                           <div class="col-md-4 col-4">
                               <h6>Mortgage Loan Name:</h6>
                            </div>
                           <div class="col-md-8 col-8">
                               <p>{{$mortgagePlan->plan_name}}</p>
                           </div>
                       </div>
                       <div class="row">
                        <div class="col-md-4 col-4">
                            <h6>Bank Name:</h6>
                         </div>
                        <div class="col-md-8 col-8">
                            <p>{{$mortgagePlan->bank->name}}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 col-4">
                            <h6>Branch Name:</h6>
                         </div>
                        <div class="col-md-8 col-8">
                            <p>{{$mortgagePlan->branch->branch_name}}</p>
                        </div>
                    </div>
                    <div class="row">
                     <div class="col-md-4 col-4">
                         <h6>Product Name: </h6>
                      </div>
                     <div class="col-md-8 col-8">
                        <p>{{$mortgagePlan->product->name}}</p>
                     </div>
                 </div>

                 <div class="row">
                     <div class="col-md-4 col-4">
                         <h6>Product Plan: </h6>
                      </div>
                     <div class="col-md-8 col-8">
                        <p>{{$mortgagePlan->product->plan}}</p>
                     </div>
                 </div>
                        <div class="row">
                            <div class="col-md-4 col-4">
                                <h6>Interest Rate:</h6>
                            </div>
                            <div class="col-md-8 col-8">
                                <p>{{$mortgagePlan->product->interest_rate}}%</p>
                            </div>
                        </div>
                        <div class="row">
                           <div class="col-md-4 col-4">
                               <h6>Monthly Installment:</h6>
                           </div>
                           <div class="col-md-8 col-8">
                               <p>	{{$mortgagePlan->product->monthly_installment}}</p>
                           </div>
                       </div>
                       <div class="row">
                           <div class="col-md-4 col-4">
                               <h6>Tenure:</h6>
                           </div>
                           <div class="col-md-8 col-8">
                               <p>	{{$mortgagePlan->product->tenure}}</p>
                           </div>
                       </div>
                       <a href="#" class="mt-3 go_back" onclick="return goBack()"><i class="ri-arrow-left-line"></i>Go Back</a>
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