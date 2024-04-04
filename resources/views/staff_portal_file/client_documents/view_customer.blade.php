@extends('staff.staff_dashboard')

@section('staff')

   <!-- Page Content  -->
   
      <div class="container-fluid">
         <div class="row">
            <div class="col-sm-2"></div>
            <div class="col-sm-8">
                  <div class="iq-card">
                    <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                           <h4 class="card-title">Customer Details</h4>
                        </div>
                     </div>
                     <div class="iq-card-body">
                     <div class="row">
                        <div class="form-group col-md-6">
                        <label for="fname">Full Name</label>
                        <p class="form-control-static" id="fname">{{ $client->first_name }}</p>
                        </div>
                        
                        <div class="form-group col-md-6">
                        <label for="phone_number">Contact Number</label>
                        
                        <p class="form-control-static" id="Mobile Number">{{$client->phone_number}}</p>
                        </div>
                        <div class="form-group col-md-6">
                        <label for="email">Email ID</label>
                        <p class="form-control-static" id="email">{{$client->email}}</p>
                        </div>

                        <div class="form-group col-sm-6">
                        <label>Nationality</label>
                        <p class="form-control-static" id="nationality">
                            {{ $client->nationality }}
                        </p>
                        </div>
                        <div class="form-group col-md-6">
                        <label for="employment">Residence Country</label>
                        <p class="form-control-static" id="Residency_Status">
                            {{ $client->residence_country }}
                        </p>
                        </div>
                        <div class="form-group col-md-12">
                        <label for="add1">Current Residence Address</label>
                        <p class="form-control-static" id="add1">{{$client->address_line1}}</p>
                        </div>
                        

                        <div class="form-group col-md-6">
                        <label for="emirates">Emirates</label>
                        <p class="form-control-static" id="emirates">{{$client->emirates}}</p>
                        </div>

                        <div class="form-group col-md-6">
                        <label for="company">Company you work</label>
                        <p class="form-control-static" id="company">{{$client->company}}</p>
                        </div>

                        <div class="form-group col-md-6">
                        <label for="reference_id">Reference Id</label>
                        <p class="form-control-static" id="reference_id">{{$client->reference_id}}</p>
                        </div>
                        <div class="form-group col-md-6">
                        <label for="security_number">Emirates ID Number</label>
                        
                        <p class="form-control-static" id="security_number">{{$client->security_number}}</p>
                        </div>
                        <div class="form-group col-md-6">
                        <label for="employment">Employment</label>
                        
                        <p class="form-control-static" id="employment">
                        {{ $client->employment }}
                        
                        </p>

                        </div>
                        <div class="form-group col-md-6">
                        <label for="loan_amount_offered">Loan Amount</label>
                        <p class="form-control-static" id="loan_amount_offered">{{$client->loan_amount_offered}}</p>
                        </div>
                        <div class="form-group col-md-6">
                        <label for="annual_gross_income">Monthly Salary Drawn</label>
                        <p class="form-control-static" id="annual_gross_income">{{$client->annual_gross_income}}</p>
                        </div>
                        <div class="form-group col-md-6">
                        <label for="reason_for_loan">Property Status</label>
                        <p class="form-control-static" id="reason_for_loan">
                            {{ $client->reason_for_loan }}
                            
                        </p>
                        </div>
                        <div class="form-group col-md-6">
                        <label for="office_address">Office Address</label>
                        <p class="form-control-static" id="reason_for_loan">
                            {{ $client->office_address }}</p>
                        </div>
                        <div class="form-group col-md-6">
                        <label for="office_number">Office Phone Number</label>
                        
                        <p class="form-control-static" id="office_number">
                            {{ $client->office_phone_number }}</p>
                        </div>
                        
                    </div>
                    </div>
                     <hr>
                     <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                           <h4 class="card-title">Documents</h4>
                        </div>
                     </div>
                     <div class="iq-card-body">
                        
                        
                           <table id="user-list-table" class="table table-borderless" role="grid" aria-describedby="user-list-page-info">
                             <thead>
                                 <tr>
                                    <th>Icon</th>
                                    <th>File Name</th>
                                    <th>Format</th>
                                    <th>Action</th>
                                    <th class="text-right">Document Status</th>
                                 </tr>
                             </thead>
                             <tbody>
                             @foreach ($clientDocument as $document)
                                @if($document->filename!=null)
                                 <tr>
                                    <td><i class="document_icons ri-image-line"></i></td>
                                    <td>{{$document->filename}}</td>
                                    <td>{{$document->document_name}}</td>
                                    <td>
                                       <div class="flex align-items-center list-user-action">
                                          <a class="iq-bg-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit" href="{{route('edit.document',$document->id)}}"><i class="ri-pencil-line"></i></a>
                                          <a class="iq-bg-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete" href="{{route('delete.document',$document->id)}}"><i class="ri-delete-bin-line"></i></a>
                                       </div>
                                    </td>
                                    <td class="text-right">
                                    @if($document->document_status == 'varified')
                                        <i class="fa fa-check verified"></i>
                                       @elseif($document->document_status == 'rejected')
                                       <i class="fa fa-close rejected"></i>
                                       @else
                                       <a href="{{route('documments.verfication',$document->id)}}" class="verify_btn">Verify</a>
                                       @endif
                                    </td>
                                 </tr>
                                 @endif
                            @endforeach
                             </tbody>
                           </table>
                     </div>
                     <hr>
                     <div class="iq-header-title text-center document_upload ">
                        <button class="btn btn-primary mb-3" onclick="return goBack()">Go Back</button>
                        <a class="btn btn-primary  mb-3" href="{{ route('show.document', ['id' => $client->id, 'client_id' => $client->id]) }}">Upload New Document</a>
                     </div>
                           
                     </div>
            </div>
            <div class="col-sm-2"></div>
            </div>
         </div>
   
<script>
    function goBack() {
        window.location.href = "{{ route('all.client.documments') }}";
        return false; // Prevents the default action of the button
    }
</script>

@endsection