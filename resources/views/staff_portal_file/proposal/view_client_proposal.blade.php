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
                           <h4 class="card-title">PID{{$proposal->id}}</h4>
                        </div>
                     </div>
                     <div class="iq-card-body">
                        <div class="row">
                            <div class="col-md-4 col-4">
                                <h6>Mortgage Id:</h6>
                             </div>
                            <div class="col-md-8 col-8">
                                <p>{{$proposal->mortgageplan->mortgage_plan_id}}</p>
                            </div>
                        </div>
                        <div class="row">
                           <div class="col-md-4 col-4">
                               <h6>Plan Name:</h6>
                            </div>
                           <div class="col-md-8 col-8">
                               <p>{{$proposal->mortgageplan->plan_name}}</p>
                           </div>
                       </div>
                       <div class="row">
                        <div class="col-md-4 col-4">
                            <h6>Bank Name:</h6>
                         </div>
                        <div class="col-md-8 col-8">
                            <p>{{$proposal->mortgageplan->bank->name}}</p>
                        </div>
                    </div>
                    <div class="row">
                     <div class="col-md-4 col-4">
                         <h6>Product Name: </h6>
                      </div>
                     <div class="col-md-8 col-8">
                        <p>{{$proposal->mortgageplan->product->name}}</p>
                     </div>
                 </div>
                        <div class="row">
                            <div class="col-md-4 col-4">
                                <h6>Interest Rate:</h6>
                            </div>
                            <div class="col-md-8 col-8">
                                <p>{{$proposal->mortgageplan->product->interest_rate}}</p>
                            </div>
                        </div>
                        
                        <div class="row">
                           <div class="col-md-4 col-4">
                               <h6>Tenure:</h6>
                           </div>
                           <div class="col-md-8 col-8">
                               <p>{{$proposal->mortgageplan->product->tenure}}</p>
                           </div>
                       </div>
                       
                        <div class="row">
                           <div class="col-md-4 col-4">
                               <h6>Monthly Installment:</h6>
                           </div>
                           <div class="col-md-8 col-8">
                               <p>{{$proposal->mortgageplan->product->monthly_installment}}</p>
                           </div>
                       </div>
                     
                     <button class="btn btn-primary" onclick="return goBack()">Go Back</button>
                     @if($proposal->status == 'deactive')
                     <a class="btn btn-primary create-application-button"style="margin-right: -43px;"  href="{{ route('create.application',$proposal->id) }}">
                        Create Application
                    </a>
                    @else
                    <a class="btn btn-primary create-application-button"style="margin-right: -43px;"  href="javascript:void(0)">
                        Application created
                    </a>
                    
                     </div>
                    
                    
                    @endif
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