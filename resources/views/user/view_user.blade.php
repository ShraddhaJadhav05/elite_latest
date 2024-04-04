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
                         <form id="updateuserform" method="POST" action="{{ route('update.user', ['id' => $users->id]) }} }}"enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group row align-items-center">
                                <div class="col-md-12">
                                    <div class="profile-img-edit">
                                        <!-- Display the profile picture or a default image if none is set -->
                                        <img class="profile-pic" src="{{ $users->logo ? asset('user_profile/' . $users->logo) : asset('adminbackend/assets/images/user/blank.png') }}" alt="profile-pic">
                                        <!-- <div class="p-image"> -->
                                            <!-- Icon indicating the action to upload a new image -->
                                            <!-- <i class="ri-pencil-line upload-button"></i> -->
                                            <!-- Input field for uploading a logo, serving as the profile picture upload mechanism -->
                                            <!-- <input class="file-upload" type="file" accept="image/*" id="logo" name="logo" autocomplete="off"/> -->
                                        <!-- </div> -->
                                    </div>
                                </div>
                            </div>
                            <div class=" row align-items-center">
                               <div class="form-group col-sm-6">
                                  <label for="fname">First Name:</label>
                                  <p class="form-control-static" id="fname"  name="fname" >{{$users->fname }}</p>
                                </div>
                               <div class="form-group col-sm-6">
                                  <label for="lname">Last Name:</label>
                                  <p class="form-control-static" id="lname" name="lname" >{{$users->lname }}</p>

                             
                               </div>
                               <div class="form-group col-sm-6">
                                <label for="email">Email:</label>
                                <p class="form-control-static"  id="email" name="email" >{{$users->email }}</p>
                               
                               </div>
                         
                               <div class="form-group col-sm-6">
                                  <label for="cname">City:</label>
                                  <p class="form-control-static" id="cname" name="city">{{$users->city }}</p>
                               </div>
                               <div class="form-group col-md-6">
                                <label for="gender">Gender:</label>
                                <p class="form-control-static"  id="email" name="email" >{{$users->gender }}</p>                             
                             </div>
                             <div class="form-group col-md-6">
                                <label for="birth_date">Birth Date:</label>
                                <p class="form-control-static" id="dob" name="dob">{{$users->dob}}</p>                            
                             </div>
                               <div class="form-group col-sm-6">
                                  <label>Marital Status:</label>
                                  <p class="form-control-static" id="marital" name="marital">{{$users->marital}}</p>                                
                               </div>
                               <div class="form-group col-sm-6">
                                  <label>Age:</label>
                                    <p class="form-control-static" id="age" name="age">{{$users->age}}</p>
                               </div>
                               <div class="form-group col-sm-6">
                                <label for="country">Nation:</label>
                                <p class="form-control-static" id="country" name="country">{{$users->country}}</p>
                               </div>
                                <div class="form-group col-md-6">
                                    <label for="emirates">Emirates:</label>
                                    <p class="form-control-static" id="state" name="state">{{$users->state}}</p>
                                 </div>

                               <div class="form-group col-md-12">
                                <label for="address">Address</label>
                                <p class="form-control-static" id="address" name="address">{{$users->address}}</p>                
                             </div>
                            </div>
                            <button type="button" class="btn btn-primary" onclick="history.back()">Go Back</button>
                            <a  class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit" href="{{ route('edit.user',$users->id) }}">Edit</a>
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



