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
                         <form id="updateprofileForm" method="POST" action="{{ route('profile.update', ['id' => $adminData->id]) }} "enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group row align-items-center">
                                <div class="col-md-12">
                                    <div class="profile-img-edit">
                                        <!-- Display the profile picture or a default image if none is set -->
                                        <img class="profile-pic" src="{{ $adminData->logo ? asset('user_profile/' . $adminData->logo) : asset('adminbackend/assets/images/user/blank.png') }}" alt="profile-pic">
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
                                  <input type="text" class="form-control" id="fname"  name="fname" value="{{$adminData->fname }}">
                               </div>
                               <div class="form-group col-sm-6">
                                  <label for="lname">Last Name:</label>
                                  <input type="text" class="form-control" id="lname" name="lname" value="{{$adminData->lname }}">
                               </div>
                         
                               <div class="form-group col-sm-6">
                                  <label for="cname">City:</label>
                                  <input type="text" class="form-control" id="cname" name="city" value="{{$adminData->city }}">
                               </div>
                               <div class="form-group col-md-6">
                                <label for="gender">Gender:</label>
                                <select class="form-control" name="gender">
                                <option value="" {{ $adminData->gender == '' ? 'selected' : '' }}>Please select one…</option>
                                <option value="female" {{ $adminData->gender == 'female' ? 'selected' : '' }}>Female</option>
                                <option value="male" {{ $adminData->gender == 'male' ? 'selected' : '' }}>Male</option>
                                <option value="other" {{ $adminData->gender == 'other' ? 'selected' : '' }}>Other</option>
                             </select>
                             </div>
                             <div class="form-group col-md-6">
                                <label for="birth_date">Birth Date:</label>
                                <input type="date" class="form-control" id="dob" placeholder="Birth Date" name="dob" value="{{$adminData->dob}}" autocomplete="off">
                             </div>
                               <div class="form-group col-sm-6">
                                  <label>Marital Status:</label>
                                  <select class="form-control" id="exampleFormControlSelect1" name="marital">
                                     <option value="" {{ $adminData->marital == '' ? 'selected' : '' }}>Single</option>
                                     <option value="married" {{ $adminData->marital == 'married' ? 'selected' : '' }}>Married</option>
                                     <option value="widowed" {{ $adminData->marital == 'widowed' ? 'selected' : '' }}>Widowed</option>
                                     <option value="divorced" {{ $adminData->marital == 'divorced' ? 'selected' : '' }}>Divorced</option>
                                     <option value="separated" {{ $adminData->marital == 'separated' ? 'selected' : '' }}>Separated</option>
                                  </select>
                               </div>



                               <div class="form-group col-sm-6">
                                  <label>Age:</label>
                                  <select class="form-control" id="exampleFormControlSelect2" name="age">
                                     <option value="" {{ $adminData->age == '' ? 'selected' : '' }}>33-45</option>
                                     <option value="12-18" {{ $adminData->age == '12-18' ? 'selected' : '' }}>12-18</option>
                                     <option value="19-32" {{ $adminData->age == '19-32' ? 'selected' : '' }}>19-32</option>
                                     <option value="46-62" {{ $adminData->age == '46-62' ? 'selected' : '' }}>46-62</option>
                                     <option value="63 >" {{ $adminData->age == '63 >' ? 'selected' : '' }}>63 ></option>

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
                                       <option value="" {{ $adminData->state == '' ? 'selected' : '' }}>Select Emirates</option>
                                       <option value="Abu_Dhabi" {{ $adminData->state == 'Abu_Dhabi' ? 'selected' : '' }}>Abu Dhabi</option>
                                       <option value="Dubai" {{ $adminData->state == 'Dubai' ? 'selected' : '' }}>Dubai</option>
                                       <option value="Sharjah" {{ $adminData->state == 'Sharjah' ? 'selected' : '' }}>Sharjah</option>
                                       <option value="Ajman" {{ $adminData->state == 'Ajman' ? 'selected' : '' }}>Ajman</option>
                                       <option value="Umm_AlQuwain" {{ $adminData->state == 'Umm_AlQuwain' ? 'selected' : '' }}>Umm AlQuwain</option>
                                       <option value="Fujairah" {{ $adminData->state == 'Fujairah' ? 'selected' : '' }}>Fujairah</option>
                                       <option value="Ras_AlKhaimah" {{ $adminData->state == 'Ras_AlKhaimah' ? 'selected' : '' }}>Ras AlKhaimah</option>

                                    </select>
                                 </div>

                               <div class="form-group col-md-12">
                                <label for="address">Address</label>
                                <input type="text" class="form-control" id="address" placeholder="Street Address" name="address" value="{{$adminData->address}}" autocomplete="off">
                             </div>
                            </div>

                            
                            <button type="submit" class="btn btn-primary mr-2">Submit</button>
                            <!-- <button type="reset" class="btn iq-bg-danger">Cancle</button> -->
                         </form>
                      </div>
                   </div>
                </div>
                <div class="tab-pane fade" id="chang-pwd" role="tabpanel">
                    <div class="iq-card">
                      <div class="iq-card-header d-flex justify-content-between">
                         <div class="iq-header-title">
                            <h4 class="card-title">Change Password</h4>
                         </div>
                      </div>
                      <div class="iq-card-body">
                         <form>
                            <div class="form-group">
                               <label for="cpass">Current Password:</label>
                               <a href="javascripe:void();" class="float-right">Forgot Password</a>
                                  <input type="Password" class="form-control" id="cpass" value="">
                               </div>
                            <div class="form-group">
                               <label for="npass">New Password:</label>
                               <input type="Password" class="form-control" id="npass" value="">
                            </div>
                            <div class="form-group">
                               <label for="vpass">Verify Password:</label>
                                  <input type="Password" class="form-control" id="vpass" value="">
                            </div>
                            <button type="submit" class="btn btn-primary mr-2">Submit</button>
                            <button type="reset" class="btn iq-bg-danger">Cancle</button>
                         </form>
                      </div>
                   </div>
                </div>
              
                <div class="tab-pane fade" id="manage-contact" role="tabpanel">
                    <div class="iq-card">
                      <div class="iq-card-header d-flex justify-content-between">
                         <div class="iq-header-title">
                            <h4 class="card-title">Manage Contact</h4>
                         </div>
                      </div>
                      <div class="iq-card-body">
                         <form>
                            <div class="form-group">
                               <label for="cno">Contact Number:</label>
                               <input type="text" class="form-control" id="cno" value="001 2536 123 458">
                            </div>
                            <div class="form-group">
                               <label for="email">Email:</label>
                               <input type="text" class="form-control" id="email" mailto:value="nikjone@demo.com">
                            </div>
                            <div class="form-group">
                               <label for="url">Url:</label>
                               <input type="text" class="form-control" id="url" value="https://getbootstrap.com">
                            </div>

                            

                            <button type="submit" class="btn btn-primary mr-2">Submit</button>
                            <!-- <button type="reset" class="btn iq-bg-danger">Cancle</button> -->
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
@endsection