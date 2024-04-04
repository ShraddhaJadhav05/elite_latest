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
                           <h4 class="card-title">Update Bank</h4>
                        </div>
                     </div>
                     <div class="iq-card-body">
                        <div class="new-user-info">
                           <form id="updatebankForm" method="POST" action="{{ route('update.bank', ['id' => $bank->id]) }} "enctype="multipart/form-data">
                           @csrf
                           @method('PUT')
                              <div class="row">
                                 <div class="form-group col-md-6">
                                    <label for="name">Bank Name</label>
                                    <input type="text" class="form-control" id="name" placeholder="Full Name" name="name" value="{{$bank->name}}" autocomplete="off">
                                 </div>
                                 <div class="form-group col-md-6">
                                    <label for="logo">Logo</label>
                                    <input type="file" class="form-control" id="logo" placeholder="Logo" name="logo" value="{{$bank->logo}}" autocomplete="off"><br>
                                    <!-- <p class="form-control-static" id="logo">{{$bank->logo}}</p> -->
                                       @if($bank->logo)
                                          <img class="rounded-circle img-fluid avatar-70" src="{{ asset('bank_logo/' . $bank->logo) }}" alt="Logo">
                                       @else
                                          <img class="rounded-circle img-fluid avatar-70" src="{{ asset('images/user/blank.png') }}" alt="Logo">
                                       @endif

                                 </div>
                                 {{-- <div class="form-group col-md-6">
                                    <label for="branch_name">Branch Name</label>
                                    <input type="text" class="form-control" id="branch_name" placeholder="Branch Name" name="branch_name" value="{{$bank->branch_name}}" autocomplete="off">
                                 </div>


                                 <div class="form-group col-md-6">
                                    <label for="address">Address</label>
                                    <input type="text" class="form-control" id="address" placeholder="address" name="address" value="{{$bank->address}}"  autocomplete="off">
                                 </div>


                                 <div class="form-group col-md-6">
                                    <label for="city">City</label>

                                    <select class="form-control" name="city">
                                       <option value="" {{ $bank->city == '' ? 'selected' : '' }}>Select City</option>
                                       <option value="Abu_Dhabi" {{ $bank->city == 'Abu_Dhabi' ? 'selected' : '' }}>Abu Dhabi</option>
                                       <option value="Dubai" {{ $bank->city == 'Dubai' ? 'selected' : '' }}>Dubai</option>
                                       <option value="Sharjah" {{ $bank->city == 'Sharjah' ? 'selected' : '' }}>Sharjah</option>
                                       <option value="Ajman" {{ $bank->city == 'Ajman' ? 'selected' : '' }}>Ajman</option>
                                       <option value="Umm_AlQuwain" {{ $bank->city == 'Umm_AlQuwain' ? 'selected' : '' }}>Umm AlQuwain</option>
                                       <option value="Fujairah" {{ $bank->city == 'Fujairah' ? 'selected' : '' }}>Fujairah</option>
                                       <option value="Ras_AlKhaimah" {{ $bank->city == 'Ras_AlKhaimah' ? 'selected' : '' }}>Ras AlKhaimah</option>

                                    </select>
                                 </div>
                                 <div class="form-group col-md-6">
                                    <label for="emirates">Emirates</label>
                                    <select class="form-control" name="emirate">
                                       <option value="" {{ $bank->emirates == '' ? 'selected' : '' }}>Select Emirates</option>
                                       <option value="Abu_Dhabi" {{ $bank->emirates == 'Abu_Dhabi' ? 'selected' : '' }}>Abu Dhabi</option>
                                       <option value="Dubai" {{ $bank->emirates == 'Dubai' ? 'selected' : '' }}>Dubai</option>
                                       <option value="Sharjah" {{ $bank->emirates == 'Sharjah' ? 'selected' : '' }}>Sharjah</option>
                                       <option value="Ajman" {{ $bank->emirates == 'Ajman' ? 'selected' : '' }}>Ajman</option>
                                       <option value="Umm_AlQuwain" {{ $bank->emirates == 'Umm_AlQuwain' ? 'selected' : '' }}>Umm AlQuwain</option>
                                       <option value="Fujairah" {{ $bank->emirates == 'Fujairah' ? 'selected' : '' }}>Fujairah</option>
                                       <option value="Ras_AlKhaimah" {{ $bank->emirates == 'Ras_AlKhaimah' ? 'selected' : '' }}>Ras AlKhaimah</option>

                                    </select>
                                 </div>
                                 <div class="form-group col-sm-6">
                                    <label>Nation</label>
                                    <select class="form-control" id="selectcountry" name="country" disabled>
                                    <option value="United Arab Emirates" selected>United Arab Emirates</option>

                                 </select>
                                 </div>
                                 <div class="form-group col-md-6">
                                    <label for="contact">Contact Number</label>
                                    <input type="number" class="form-control" id="contact" placeholder="Contact" name="contact" value="{{$bank->contact}}" autocomplete="off">
                                 </div>



                                 <div class="form-group col-md-6">
                                    <label for="description">Description</label>
                                    <textarea class="form-control" id="description" name="description" rows="2" cols="40" value="">{{$bank->description}}</textarea>
                                 </div> --}}


                              </div>
                              <button class="btn btn-primary" onclick="return goBack()">Go Back</button>
                              <button type="submit" class="btn btn-primary">Update Bank</button>
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
    document.getElementById('updatebankForm').addEventListener('submit', function(event) {
        event.preventDefault(); // Prevent the form from submitting normally
        
        // Get the form action URL which includes the lead id
        var formAction = this.getAttribute('action');
        
        // Submit the form via AJAX
        axios.post(formAction, new FormData(this))
            .then(function(response) {
                // If successful, show a pop-up message
                alert('Data Updated Successfully');
                // Optionally, you can redirect the user to another page after successful submission
                window.location.href = '{{ route("all.banks") }}';
            })
            .catch(function(error) {
                // Handle errors here
                console.error(error);
            });
    });
</script>

@endsection

