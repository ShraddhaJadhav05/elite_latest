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
                           <h4 class="card-title">Update Staff</h4>
                        </div>
                     </div>
                     <div class="iq-card-body">
                        <div class="new-user-info">
                           <form id="updatestaffForm" method="POST" action="{{ route('update.staff', ['id' => $staff->id]) }}">
                           @csrf
                           @method('PUT')


                           <div class="row">
                            <div class="form-group col-md-6">
                               <label for="fname">Full Name</label>
                               <input type="text" class="form-control" id="name" placeholder="First Name" name="name" value="{{$staff->first_name}}" autocomplete="off">
                               <span id="fnameError" class="text-danger"></span>
                            </div>
                            <div class="form-group col-md-6">
                               <label for="email">Email</label>
                               <input type="email" class="form-control" id="email" placeholder="Email" name="email"  value="{{$staff->email}}" autocomplete="off">
                               <span id="emailError" class="text-danger"></span>
                            </div>
                            <div class="form-group col-md-6">
                                    <label for="nationality">Nationality<span style="color: red;"> *</span></label>
                                    <select class="form-control" id="nationality" name="nationality">
                                       <option value="" {{ $staff->nationality == '' ? 'selected' : '' }}>Select Nationality</option>
                                       <option value="Canada" {{ $staff->nationality == 'Canada' ? 'selected' : '' }}>Canada</option>
                                       <option value="Noida" {{ $staff->nationality == 'Noida' ? 'selected' : '' }}>Noida</option>
                                       <option value="USA" {{ $staff->nationality == 'USA' ? 'selected' : '' }}>USA</option>
                                       <option value="India" {{ $staff->nationality == 'India' ? 'selected' : '' }}>India</option>
                                       <option value="Africa" {{ $staff->nationality == 'Africa' ? 'selected' : '' }}>Africa</option>
                                    </select>
                                    <span id="nationalityError" class="text-danger"></span>
                                 </div>

                            <div class="form-group col-md-6">
                               <label for="region">Designation</label>
                               <input type="text" class="form-control" id="region" placeholder="Designation" name="region" value="{{$staff->region}}" autocomplete="off">
                               <span id="regionError" class="text-danger"></span>
                            </div>

                            <div class="form-group col-md-6">
                               <label for="birth_date">Joined Date</label>
                               <input type="date" class="form-control" id="birth_date" placeholder="Joined Date" value="{{$staff->birth_date}}" name="birth_date" autocomplete="off">
                               <span id="birth_dateError" class="text-danger"></span>
                            </div>


                            <div class="form-group col-md-6">
                                <label for="birth_date">Roles</label>
                                <select class="form-control" name="role_id" id="role_id">
                                       <option value="">Select role</option>
                                        @foreach($sales_role as $sales_roles)
                                       <option value="{{$sales_roles->id}}"
                                          {{ $sales_roles->id == $staff->role_id ? 'selected' : '' }}
                                          >{{$sales_roles->name}}</option>
                                       @endforeach
                                    </select>
                                 <span id="role_idError" class="text-danger"></span>
                             </div>


                            <div class="form-group col-md-6">
                               <label for="zip_code">Office Branch</label>
                               <input type="text" class="form-control" id="zip_code" placeholder="Office Branch" name="zip_code" value="{{$staff->zip_code}}" autocomplete="off">
                            </div>

                            <div class="form-group col-md-6">
                               <label for="department">Department</label>
                               <input type="text" class="form-control" id="department" placeholder="Department" name="department" value="{{$staff->department}}" autocomplete="off">
                            </div>

                            <div class="form-group col-md-6">
                               <label for="add1">Location</label>
                               <input type="text" class="form-control" id="add1" placeholder="Location" value="{{$staff->address_line1}}" name="address_line1" autocomplete="off">
                            </div>

                            <div class="form-group col-md-6">
                                <label for="city">City</label>
                                <!-- <input type="text" class="form-control" id="city" placeholder="City" name="city" value="{{$staff->city}}" autocomplete="off"> -->
                                <select class="form-control" name="city" id="city">
                                   <option value="" {{ $staff->city == '' ? 'selected' : '' }}>Select Emirates</option>
                                   <option value="Abu_Dhabi" {{ $staff->city == 'Abu_Dhabi' ? 'selected' : '' }}>Abu Dhabi</option>
                                   <option value="Dubai" {{ $staff->city == 'Dubai' ? 'selected' : '' }}>Dubai</option>
                                   <option value="Sharjah" {{ $staff->city == 'Sharjah' ? 'selected' : '' }}>Sharjah</option>
                                   <option value="Ajman" {{ $staff->city == 'Ajman' ? 'selected' : '' }}>Ajman</option>
                                   <option value="Umm_AlQuwain" {{ $staff->city == 'Umm_AlQuwain' ? 'selected' : '' }}>Umm AlQuwain</option>
                                   <option value="Fujairah" {{ $staff->city == 'Fujairah' ? 'selected' : '' }}>Fujairah</option>
                                   <option value="Ras_AlKhaimah" {{ $staff->city == 'Ras_AlKhaimah' ? 'selected' : '' }}>Ras AlKhaimah</option>
                                </select>
                                <span id="cityError" class="text-danger"></span>
                             </div>

                             <div class="form-group col-md-6">
                                <label for="emirates">Emirates</label>
                                <select class="form-control" name="gender" id="gender">
                                   <option value="" {{ $staff->gender == '' ? 'selected' : '' }}>Select Emirates</option>
                                   <option value="Abu_Dhabi" {{ $staff->gender == 'Abu_Dhabi' ? 'selected' : '' }}>Abu Dhabi</option>
                                   <option value="Dubai" {{ $staff->gender == 'Dubai' ? 'selected' : '' }}>Dubai</option>
                                   <option value="Sharjah" {{ $staff->gender == 'Sharjah' ? 'selected' : '' }}>Sharjah</option>
                                   <option value="Ajman" {{ $staff->gender == 'Ajman' ? 'selected' : '' }}>Ajman</option>
                                   <option value="Umm_AlQuwain" {{ $staff->gender == 'Umm_AlQuwain' ? 'selected' : '' }}>Umm AlQuwain</option>
                                   <option value="Fujairah" {{ $staff->gender == 'Fujairah' ? 'selected' : '' }}>Fujairah</option>
                                   <option value="Ras_AlKhaimah" {{ $staff->gender == 'Ras_AlKhaimah' ? 'selected' : '' }}>Ras AlKhaimah</option>

                                </select>
                                <span id="genderError" class="text-danger"></span>
                             </div>
                             


                            <div class="form-group col-md-6">
                                <!-- <label for="password">Password:</label> -->
                                <input type="hidden" class="form-control" id="Password" placeholder="password" name="password" autocomplete="off">
                             </div>
                          </div>


                              {{-- <div class="row">
                                 <div class="form-group col-md-6">
                                    <label for="fname">First Name:</label>
                                    <input type="text" class="form-control" id="fname" placeholder="First Name" name="first_name" value="{{$staff->first_name}}" autocomplete="off">
                                 </div>
                                 <div class="form-group col-md-6">
                                    <label for="lname">Last Name:</label>
                                    <input type="text" class="form-control" id="lname" placeholder="Last Name" name="last_name" value="{{$staff->last_name}}" autocomplete="off">
                                 </div>
                                 <div class="form-group col-md-6">
                                    <label for="email">Email:</label>
                                    <input type="email" class="form-control" id="email" placeholder="Email" name="email" value="{{$staff->email}}" autocomplete="off">
                                 </div>
                                 <div class="form-group col-md-6">
                                    <label for="birth_date">Birth Date:</label>
                                    <input type="date" class="form-control" id="birth_date" placeholder="Birth Date" name="birth_date" value="{{$staff->birth_date}}" autocomplete="off">
                                 </div>
                                 <div class="form-group col-md-6">
                                    <label for="gender">Gender:</label>
                                    <select class="form-control" name="gender">
                                    <option value="" {{ $staff->gender == '' ? 'selected' : '' }}>Please select one…</option>
                                    <option value="female" {{ $staff->gender == 'female' ? 'selected' : '' }}>Female</option>
                                    <option value="male" {{ $staff->gender == 'male' ? 'selected' : '' }}>Male</option>
                                    <option value="other" {{ $staff->gender == 'other' ? 'selected' : '' }}>Other</option>
                                 </select>
                                 </div>
                                 <div class="form-group col-md-6">
                                    <label for="phone_number">Phone Number:</label>
                                    <input type="number" class="form-control" id="phone_number" placeholder="Phone Number" name="phone_number" value="{{$staff->phone_number}}" autocomplete="off">
                                 </div>
                                 <div class="form-group col-md-6">
                                    <label for="add1">Street Address 1:</label>
                                    <input type="text" class="form-control" id="add1" placeholder="Street Address 1" name="address_line1" value="{{$staff->address_line1}}" autocomplete="off">
                                 </div>
                                 <div class="form-group col-md-6">
                                    <label for="add2">Street Address 2:</label>
                                    <input type="text" class="form-control" id="add2" placeholder="Street Address 2" name="address_line2" value="{{$staff->address_line2}}" autocomplete="off">
                                 </div>
                                 <div class="form-group col-md-12">
                                    <label for="city">City:</label>
                                    <input type="text" class="form-control" id="city" placeholder="City" name="city" value="{{$staff->city}}" autocomplete="off">
                                 </div>
                                 <div class="form-group col-md-12">
                                    <label for="region">Region:</label>
                                    <input type="text" class="form-control" id="region" placeholder="Region" name="region" value="{{$staff->region}}" autocomplete="off">
                                 </div>

                                 <div class="form-group col-md-12">
                                    <label for="zip_code">Zip Code:</label>
                                    <input type="number" class="form-control" id="zip_code" placeholder="Zip Code" name="zip_code" value="{{$staff->zip_code}}" autocomplete="off">
                                 </div>
                                 <div class="form-group col-sm-12">
                                    <label>Country:</label>
                                    <select class="form-control" id="selectcountry" name="country">
                                    <option value="" {{ $staff->country == '' ? 'selected' : '' }}>Select Country</option>
                                    <option value="Canada" {{ $staff->country == 'Canada' ? 'selected' : '' }}>Canada</option>
                                    <option value="Noida" {{ $staff->country == 'Noida' ? 'selected' : '' }}>Noida</option>
                                    <option value="USA" {{ $staff->country == 'USA' ? 'selected' : '' }}>USA</option>
                                    <option value="India" {{ $staff->country == 'India' ? 'selected' : '' }}>India</option>
                                    <option value="Africa" {{ $staff->country == 'Africa' ? 'selected' : '' }}>Africa</option>
                                 </select>
                                 </div>

                                 <div class="form-group col-md-12">
                                    <label for="department">Department:</label>
                                    <input type="text" class="form-control" id="department" placeholder="Department" name="department" value="{{$staff->department}}" autocomplete="off">
                                 </div>
                              </div> --}}
                              <button type="button" class="btn btn-primary" onclick="history.back()">Go Back</button>
                              <button type="submit" class="btn btn-primary">Update Staff</button>
                           </form>
                        </div>
                     </div>
                  </div>
            </div>
         </div>
      </div>

<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

<script>
    document.getElementById('updatestaffForm').addEventListener('submit', function(event) {
        event.preventDefault(); // Prevent the form from submitting normally
        
        // Get the form action URL which includes the lead id
        var formAction = this.getAttribute('action');
        
        // Submit the form via AJAX
        axios.post(formAction, new FormData(this))
            .then(function(response) {
                // If successful, show a pop-up message
                alert('Data Updated Successfully');
                // Optionally, you can redirect the user to another page after successful submission
                window.location.href = '{{ route("all.staff") }}';
            })
            .catch(function(error) {
                // Handle errors here
                console.error(error);
            });
    });
</script>

<script>
    function goBack() {
       // Go back one page in the browser's history
       window.history.go(-1);
    }
 </script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<script>
   $(document).ready(function() {
       function validateInput() {
       
           var fname = $('#name').val();
           var email = $('#email').val();

            var region = $('#region').val();
            var birth_date = $('#birth_date').val();
            var role_id = $('#role_id').val();

            var city = $('#city').val();
            var gender = $('#gender').val();

           var isValid = true;

           if (fname.trim() === '') {
               $('#fnameError').text('Please enter the name').show();
               isValid = false;
           } else {
               $('#fnameError').hide();
           }

           if (email.trim() === '') {
               $('#emailError').text('Please enter the valid email address').show();
               isValid = false;
           } else {
               $('#emailError').hide();
           }

           
           if (region.trim() === '') {
               $('#regionError').text('Please enter the designation').show();
               isValid = false;
           } else {
               $('#regionError').hide();
           }

            if (role_id.trim() === '') {
               $('#role_idError').text('Please select the role').show();
               isValid = false;
           } else {
               $('#role_idError').hide();
           }
               
           if (birth_date.trim() === '') {
               $('#birth_dateError').text('Please select joined date').show();
               isValid = false;
           } else {
               $('#birth_dateError').hide();
           }

           if (city.trim() === '') {
               $('#cityError').text('Please enter the city').show();
               isValid = false;
           } else {
               $('#cityError').hide();
           }

           if (gender.trim() === '') {
               $('#genderError').text('Please enter the gender').show();
               isValid = false;
           } else {
               $('#genderError').hide();
           }
         

           return isValid;
       }

  

       $('#updatestaffForm').submit(function(event) {

       
           if (!validateInput()) {
               event.preventDefault(); // Prevent form submission if validation fails
               return;
           }
       });
   });
</script>

@endsection