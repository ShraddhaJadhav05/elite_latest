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
                           <h4 class="card-title">View Bank Branch</h4>
                        </div>
                     </div>
                     <div class="iq-card-body">
                        <div class="new-user-info">
                           <form>
                           @csrf
                              <div class="row">
                                 <div class="form-group col-md-6">
                                    <label for="name">Bank Name</label>
                                    <p class="form-control-static" id="name">{{ $bank->name }}</p>
                                 </div>
                                 <div class="form-group col-md-6">
                                    <label for="logo">Logo</label>
                                    <p class="form-control-static" id="logo">{{$bank->logo}}</p>
                                    @if($bank->logo)
                                          <img class="rounded-circle img-fluid avatar-70" src="{{ asset('bank_logo/' . $bank->logo) }}" alt="Logo">
                                       @else
                                          <img class="rounded-circle img-fluid avatar-70" src="{{ asset('images/user/blank.png') }}" alt="Logo">
                                       @endif
                                 </div>
                                 <div class="form-group col-md-6">
                                    <label for="branch_name">Branch Name</label>
                                    <p class="form-control-static" id="branch_name">{{$bank->branch_name}}</p>
                                 </div>
                                 <div class="form-group col-md-6">
                                    <label for="Address">Address</label>
                                    <p class="form-control-static" id="Address">{{$bank->address}}</p>
                                 </div>
                                 <div class="form-group col-md-6">
                                    <label for="City">City</label>
                                    <p class="form-control-static" id="City">{{$bank->city}}</p>
                                 </div>
                                 <div class="form-group col-md-6">
                                    <label for="Emirates">Emirates</label>
                                    <p class="form-control-static" id="Emirates">{{$bank->emirate}}</p>
                                 </div>

                                 <div class="form-group col-md-6">
                                    <label for="Nationality">Nation</label>
                                    <p class="form-control-static" id="Nationality">{{$bank->country}}</p>
                                 </div>
                                 <div class="form-group col-md-6">
                                    <label for="Contact">Contact Number</label>
                                    <p class="form-control-static" id="Contact">{{$bank->contact}}</p>
                                 </div>

                                 <div class="form-group col-md-6">
                                    <label for="description">Description</label>
                                    <p class="form-control-static" id="description">{{$bank->description}}</p>
                                 </div>
                              </div>
                              <button type="button" class="btn btn-primary" onclick="return goBack()">Go Back</button>
                              <a class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit" href="{{route('edit.banks_branch',$bank->id)}}">Edit Bank</a>
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
@endsection

