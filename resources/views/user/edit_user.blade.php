@extends('admin.admin_dashboard')

@section('admin')
<div class="container-fluid">
    <div class="row">

       <div class="col-lg-12">
          <div class="iq-edit-list-data">
             <div class="tab-content">
                <div class="tab-pane fade active show" id="personal-information" role="tabpanel">
                    <div class="iq-card">
                      <div class="iq-card-header d-flex justify-content-between">
                         <div class="iq-header-title">
                            <h4 class="card-title">Personal Information</h4>
                         </div>
                      </div>
                      <div class="iq-card-body">
                         <form id="edituserform" action="{{ route('update.user', ['id' => $users->id]) }}" method="post" enctype="multipart/form-data">
                           @csrf
                           @method('put')
                            <div class="form-group row align-items-center">
                                <div class="col-md-12">
                                    <div class="profile-img-edit">
                                        <!-- Display the profile picture or a default image if none is set -->
                                        <img class="profile-pic" src="{{ $users->logo ? asset('user_profile/' . $users->logo) : asset('adminbackend/assets/images/user/blank.png') }}" alt="profile-pic">
                                        <div class="p-image">
                                            <!-- Icon indicating the action to upload a new image -->
                                            <i class="ri-pencil-line upload-button"></i>
                                            <!-- Input field for uploading a logo, serving as the profile picture upload mechanism -->
                                            <input class="file-upload" type="file" accept="image/*" id="logo" name="logo" autocomplete="off"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class=" row align-items-center">
                               <div class="form-group col-sm-6">
                                  <label for="fname">First Name:</label>
                                  <input type="text" class="form-control" id="fname"  name="fname" value="{{$users->fname }}">
                               </div>
                               <div class="form-group col-sm-6">
                                  <label for="lname">Last Name:</label>
                                  <input type="text" class="form-control" id="lname" name="lname" value="{{$users->lname }}">
                               </div>
                               <div class="form-group col-sm-6">
                                <label for="email">Email:</label>
                                <input type="email" class="form-control" id="email" name="email" value="{{$users->email }}">
                               </div>
                         
                               <div class="form-group col-sm-6">
                                  <label for="cname">City:</label>
                                  <input type="text" class="form-control" id="cname" name="city" value="{{$users->city }}">
                               </div>
                               <div class="form-group col-md-6">
                                <label for="gender">Gender:</label>
                                <select class="form-control" name="gender">
                                <option value="" {{ $users->gender == '' ? 'selected' : '' }}>Please select one…</option>
                                <option value="female" {{ $users->gender == 'female' ? 'selected' : '' }}>Female</option>
                                <option value="male" {{ $users->gender == 'male' ? 'selected' : '' }}>Male</option>
                                <option value="other" {{ $users->gender == 'other' ? 'selected' : '' }}>Other</option>
                             </select>
                             </div>
                             <div class="form-group col-md-6">
                                <label for="birth_date">Birth Date:</label>
                                <input type="date" class="form-control" id="dob" placeholder="Birth Date" name="dob" value="{{$users->dob}}" autocomplete="off">
                             </div>
                               <div class="form-group col-sm-6">
                                  <label>Marital Status:</label>
                                  <select class="form-control" id="exampleFormControlSelect1" name="marital">
                                     <option value="" {{ $users->marital == '' ? 'selected' : '' }}>Single</option>
                                     <option value="married" {{ $users->marital == 'married' ? 'selected' : '' }}>Married</option>
                                     <option value="widowed" {{ $users->marital == 'widowed' ? 'selected' : '' }}>Widowed</option>
                                     <option value="divorced" {{ $users->marital == 'divorced' ? 'selected' : '' }}>Divorced</option>
                                     <option value="separated" {{ $users->marital == 'separated' ? 'selected' : '' }}>Separated</option>
                                  </select>
                               </div>



                               <div class="form-group col-sm-6">
                                  <label>Age:</label>
                                  <select class="form-control" id="exampleFormControlSelect2" name="age">
                                     <option value="" {{ $users->age == '' ? 'selected' : '' }}>33-45</option>
                                     <option value="12-18" {{ $users->age == '12-18' ? 'selected' : '' }}>12-18</option>
                                     <option value="19-32" {{ $users->age == '19-32' ? 'selected' : '' }}>19-32</option>
                                     <option value="46-62" {{ $users->age == '46-62' ? 'selected' : '' }}>46-62</option>
                                     <option value="63 >" {{ $users->age == '63 >' ? 'selected' : '' }}>63 ></option>

                                  </select>
                               </div>
                               <div class="form-group col-sm-6">
                                <label for="country">Nation:</label>
                                <select class="form-control" id="country" name="country" disabled>
                                   <option value="United Arab Emirates" selected>United Arab Emirates</option>
                                </select>
                               </div>
                                <div class="form-group col-md-6">
                                    <label for="emirates">Emirates:</label>
                                    <select class="form-control" name="state">
                                       <option value="" {{ $users->state == '' ? 'selected' : '' }}>Select Emirates</option>
                                       <option value="Abu_Dhabi" {{ $users->state == 'Abu_Dhabi' ? 'selected' : '' }}>Abu Dhabi</option>
                                       <option value="Dubai" {{ $users->state == 'Dubai' ? 'selected' : '' }}>Dubai</option>
                                       <option value="Sharjah" {{ $users->state == 'Sharjah' ? 'selected' : '' }}>Sharjah</option>
                                       <option value="Ajman" {{ $users->state == 'Ajman' ? 'selected' : '' }}>Ajman</option>
                                       <option value="Umm_AlQuwain" {{ $users->state == 'Umm_AlQuwain' ? 'selected' : '' }}>Umm AlQuwain</option>
                                       <option value="Fujairah" {{ $users->state == 'Fujairah' ? 'selected' : '' }}>Fujairah</option>
                                       <option value="Ras_AlKhaimah" {{ $users->state == 'Ras_AlKhaimah' ? 'selected' : '' }}>Ras AlKhaimah</option>

                                    </select>
                                 </div>

                               <div class="form-group col-md-12">
                                <label for="address">Address</label>
                                <input type="text" class="form-control" id="address" placeholder="Street Address" name="address" value="{{$users->address}}" autocomplete="off">
                             </div>
                            </div>
                            <button type="button" class="btn btn-primary" onclick="history.back()">Go Back</button>
                            <button type="submit" class="btn btn-primary mr-2">Update User</button>
                          
                         </form>
                      </div>
                   </div>
                </div> 
             </div>
          </div>
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

<!-- <script>
    document.getElementById('edituserform').addEventListener('submit', function(event) {
        event.preventDefault(); // Prevent the form from submitting normally
        
        // Get the form action URL which includes the lead id
        var formAction = this.getAttribute('action');
        
        // Submit the form via AJAX
        axios.post(formAction, new FormData(this))
            .then(function(response) {
                // If successful, show a pop-up message
                alert('Data Updated Successfully');
                // Optionally, you can redirect the user to another page after successful submission
                window.location.href = '{{ route("data.userData") }}';
            })
            .catch(function(error) {
                // Handle errors here
                console.error(error);
            });
    });
</script> -->

@endsection


