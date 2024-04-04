@extends('admin.admin_dashboard')

@section('admin')

<div class="container-fluid">
    <div class="row">

       <div class="col-lg-12">
          <div class="iq-edit-list-data">
             <div class="tab-content">
                <div class="tab-pane fade active show" id="add-new-page" role="tabpanel">
                    <div class="iq-card">
                      <div class="iq-card-header d-flex justify-content-between">
                         <div class="iq-header-title">
                            <h4 class="card-title">Add New Page</h4>
                         </div>
                      </div>
                      <div class="iq-card-body">
                         <form id="addPageForm" method="POST" action="{{ route('add.user') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row align-items-center">
                                <div class="col-md-12">
                                    <div class="profile-img-edit">
                                        <!-- Display the profile picture or a default image if none is set -->
                                        <img class="profile-pic" src="{{ asset('adminbackend/assets/images/user/blank.png') }}" alt="profile-pic">
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
                                  <input type="text" class="form-control" id="fname" name="fname" placeholder="Enter first name">
                               </div>
                               <div class="form-group col-sm-6">
                                  <label for="lname">Last Name:</label>
                                  <input type="text" class="form-control" id="lname" name="lname" placeholder="Enter last name">
                               </div>
                               <div class="form-group col-sm-6">
                                 <label for="email">Email:</label>
                                 <input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
                             </div>
                               <div class="form-group col-sm-6">
                                  <label for="cname">City:</label>
                                  <input type="text" class="form-control" id="cname" name="city" placeholder="Enter city">
                               </div>
                               <div class="form-group col-md-6">
                                <label for="gender">Gender:</label>
                                <select class="form-control" name="gender">
                                    <option value="" selected>Please select one...</option>
                                    <option value="female">Female</option>
                                    <option value="male">Male</option>
                                    <option value="other">Other</option>
                                </select>
                             </div>
                             <div class="form-group col-md-6">
                                <label for="dob">Birth Date:</label>
                                <input type="date" class="form-control" id="dob" name="dob" placeholder="Birth Date">
                             </div>
                               <div class="form-group col-sm-6">
                                  <label>Marital Status:</label>
                                  <select class="form-control" id="exampleFormControlSelect1" name="marital">
                                     <option value="" selected>Single</option>
                                     <option value="married">Married</option>
                                     <option value="widowed">Widowed</option>
                                     <option value="divorced">Divorced</option>
                                     <option value="separated">Separated</option>
                                  </select>
                               </div>
                               <div class="form-group col-sm-6">
                                  <label>Age:</label>
                                  <select class="form-control" id="exampleFormControlSelect2" name="age">
                                     <option value="" selected>33-45</option>
                                     <option value="12-18">12-18</option>
                                     <option value="19-32">19-32</option>
                                     <option value="46-62">46-62</option>
                                     <option value="63 >">63 ></option>
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
                                       <option value="" selected>Select Emirates</option>
                                       <option value="Abu_Dhabi">Abu Dhabi</option>
                                       <option value="Dubai">Dubai</option>
                                       <option value="Sharjah">Sharjah</option>
                                       <option value="Ajman">Ajman</option>
                                       <option value="Umm_AlQuwain">Umm AlQuwain</option>
                                       <option value="Fujairah">Fujairah</option>
                                       <option value="Ras_AlKhaimah">Ras AlKhaimah</option>
                                    </select>
                                 </div>
                               <div class="form-group col-md-12">
                                <label for="address">Address</label>
                                <input type="text" class="form-control" id="address" name="address" placeholder="Enter address">
                             </div>
                            </div>

                            <button type="button" class="btn btn-primary" onclick="history.back()">Go Back</button>
                            <button type="submit" class="btn btn-primary mr-2">Add User</button>
          
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

<script>
    document.getElementById('addPageForm').addEventListener('submit', function(event) {
        event.preventDefault(); // Prevent the form from submitting normally
        
        // Get the form action URL which includes the lead id
        var formAction = this.getAttribute('action');
        
        // Submit the form via AJAX
        axios.post(formAction, new FormData(this))
            .then(function(response) {
                // If successful, show a pop-up message
                alert('Data Added Successfully');
                // Optionally, you can redirect the user to another page after successful submission
                window.location.href = '{{ route("data.userData") }}';
            })
            .catch(function(error) {
                // Handle errors here
                console.error(error);
            });
    });
</script>
@endsection



