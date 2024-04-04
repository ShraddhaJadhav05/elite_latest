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
                           <h4 class="card-title">Add New Staff</h4>
                        </div>
                     </div>
                     <div class="iq-card-body">
                        <div class="new-user-info">
                           <form id="addstaffform" method="POST" action="{{ route('add.staff') }}">
                           @csrf
                              <div class="row">
                                 <div class="form-group col-md-6">
                                    <label for="fname">Full Name <span style="color: red;"> *</span>:</label>
                                    <input type="text" class="form-control" id="first_name" placeholder="Full Name" name="first_name" autocomplete="off" value="">
                                    <span id="fnameError" class="text-danger"></span>
                                 </div>
                                 <div class="form-group col-md-6">
                                    <label for="email">Email <span style="color: red;"> *</span>:</label>
                                    <input type="email" class="form-control" id="email" placeholder="Email" name="email" autocomplete="off">
                                    <span id="emailError" class="text-danger"></span>
                                 </div>

                                 <div class="form-group col-md-6">
                                    <label for="nationality">Nationality<span style="color: red;"> *</span></label>
                                    <select class="form-control" id="nationality" name="nationality">
                                       <option value="">Select Nationality</option>
                                       <option value="Caneda">Caneda</option>
                                       <option value="Noida">Noida</option>
                                       <option value="USA">USA</option>
                                       <option value="India">India</option>
                                       <option value="Africa">Africa</option>
                                    </select>
                                    <span id="nationalityError" class="text-danger"></span>
                                 </div>

                                 <div class="form-group col-md-6">
                                    <label for="region">Designation <span style="color: red;"> *</span>:</label>
                                    <input type="text" class="form-control" id="region" placeholder="Designation" name="region" autocomplete="off">
                                    <span id="regionError" class="text-danger"></span>
                                 </div>

                                 <div class="form-group col-md-6">
                                    <label for="birth_date">Joined Date <span style="color: red;"> *</span>:</label>
                                    <input type="date" class="form-control" id="birth_date" placeholder="Joined Date" name="birth_date" autocomplete="off">
                                    <span id="birth_dateError" class="text-danger"></span>
                                 </div>

                                 <div class="form-group col-md-6">
                                    <label for="Roles">Roles<span style="color: red;"> *</span>:</label>
                                    <select class="form-control" name="role_id" id="role_id">
                                       <option value=" ">Select role</option>
                                        @foreach($sales_role as $sales_roles)
                                       <option value="{{$sales_roles->id}}">{{$sales_roles->name}}</option>
                                       @endforeach
                                    </select>
                                    <span id="role_idError" class="text-danger"></span>
                                 </div>


                                 <div class="form-group col-md-6">
                                    <label for="zip_code">Office Branch</label>
                                    <input type="text" class="form-control" id="zip_code" placeholder="Office Branch" name="zip_code" autocomplete="off">
                                 </div>

                                 <div class="form-group col-md-6">
                                    <label for="department">Department</label>
                                    <input type="text" class="form-control" id="department" placeholder="Department" name="department" autocomplete="off">
                                 </div>

                                 <div class="form-group col-md-6">
                                    <label for="add1">Location</label>
                                    <input type="text" class="form-control" id="add1" placeholder="Location" name="address_line1" autocomplete="off">
                                 </div>

                                 <div class="form-group col-md-6">
                                    <label for="city">City <span style="color: red;"> *</span>:</label>
                                    <select class="form-control" name="city" id="city">
                                       <option value="">Select City</option>
                                       <option value="Abu_Dhabi">Abu Dhabi</option>
                                       <option value="Dubai">Dubai</option>
                                       <option value="Sharjah">Sharjah</option>
                                       <option value="Ajman">Ajman</option>
                                       <option value="Umm_AlQuwain">Umm AlQuwain</option>
                                       <option value="Fujairah">Fujairah</option>
                                       <option value="Ras_AlKhaimah">Ras AlKhaimah</option>

                                    </select>
                                    <span id="cityError" class="text-danger"></span>
                                 </div>
                                 <div class="form-group col-md-6">
                                    <label for="emirates">Emirates<span style="color: red;"> *</span>:</label>
                                    <select class="form-control" name="gender" id="gender">
                                       <option value="">Select Emirates</option>
                                       <option value="Abu_Dhabi">Abu Dhabi</option>
                                       <option value="Dubai">Dubai</option>
                                       <option value="Sharjah">Sharjah</option>
                                       <option value="Ajman">Ajman</option>
                                       <option value="Umm_AlQuwain">Umm AlQuwain</option>
                                       <option value="Fujairah">Fujairah</option>
                                       <option value="Ras_AlKhaimah">Ras AlKhaimah</option>

                                    </select>
                                    <span id="genderError" class="text-danger"></span>
                                 </div>
                                
                                   <!-- <div class="form-group col-md-6">
                                    <label for="lname">Last Name:</label>
                                    <input type="text" class="form-control" id="lname" placeholder="Last Name" name="last_name" autocomplete="off">
                                 </div>
                              <div class="form-group col-md-6">
                                    <label for="email">Email:</label>
                                    <input type="email" class="form-control" id="email" placeholder="Email" name="email" autocomplete="off">
                                    <span id="emailError" class="text-danger"></span>
                                 </div>
                                 <div class="form-group col-md-6">
                                    <label for="birth_date">Birth Date:</label>
                                    <input type="date" class="form-control" id="birth_date" placeholder="Birth Date" name="birth_date" autocomplete="off">
                                 </div> -->
                                 <!-- <div class="form-group col-md-6">
                                    <label for="gender">Gender:</label>
                                    <select class="form-control" name="gender">
                                       <option value="">Please select one…</option>
                                       <option value="female">Female</option>
                                       <option value="male">Male</option>
                                       <option value="other">Other</option>
                                    </select>
                                 </div> 
                                  <div class="form-group col-md-6">
                                    <label for="phone_number">Phone Number:</label>
                                    <input type="number" class="form-control" id="phone_number" placeholder="Phone Number" name="phone_number" autocomplete="off">
                                 </div>
                                 <div class="form-group col-md-6">
                                    <label for="add1">Street Address 1:</label>
                                    <input type="text" class="form-control" id="add1" placeholder="Street Address 1" name="address_line1" autocomplete="off">
                                 </div>
                                 <div class="form-group col-md-6">
                                    <label for="add2">Street Address 2:</label>
                                    <input type="text" class="form-control" id="add2" placeholder="Street Address 2" name="address_line2" autocomplete="off">
                                 </div> -->
                                



                                 <div class="form-group col-md-12">
                                    <!-- <label for="password">Password:</label> -->
                                    <input type="hidden" class="form-control" id="Password" placeholder="password" name="password" autocomplete="off">
                                 </div>
                              </div>
                              <button type="button" class="btn btn-primary" onclick="history.back()">Go Back</button>
                              <button type="submit" class="btn btn-primary">Add New Staff</button>
                           </form>
                        </div>
                     </div>
                  </div>
            </div>
         </div>
      </div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
   $(document).ready(function() {
        $('#email').on('blur', function() {
            var email = $(this).val();
            $.ajax({
                url: '/check-email',
                type: 'POST',
                data: {
                    email: email,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    if (response.exists) {
                        $('#emailError').text('Email already exists');
                    } else {
                        $('#emailError').text('');
                    }
                }
            });
        });

      //   clear error if email change
        $('#email').on('input', function() {
            $('#emailError').text('');
        });
    });
</script>

<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

<script>
    document.getElementById('addstaffform').addEventListener('submit', function(event) {
        event.preventDefault(); // Prevent the form from submitting normally
        
        // Get the form action URL which includes the lead id
        var formAction = this.getAttribute('action');
        
        // Submit the form via AJAX
        axios.post(formAction, new FormData(this))
            .then(function(response) {
                // If successful, show a pop-up message
                alert('Data Added Successfully');
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


<script>
   $(document).ready(function() {
       function validateInput() {
           var first_name = $('#first_name').val();
           var email = $('#email').val();
           var region = $('#region').val();
           var birth_date = $('#birth_date').val();
           var role_id = $('#role_id').val();
           var city = $('#city').val();
           var gender = $('#gender').val();
           //alert(city);

           var isValid = true;

           if (first_name.trim() === '') {
               $('#fnameError').text('Please enter the name').show();
               isValid = false;
           } else {
               $('#fnameError').hide();
           }


           if (email.trim() === '') {
               $('#emailError').text('Please enter the email').show();
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
               $('#cityError').text('Please select the city').show();
               isValid = false;
           } else {
               $('#cityError').hide();
           }


            if (gender.trim() === '') {
               $('#genderError').text('Please enter the emirates').show();
               isValid = false;
           } else {
               $('#genderError').hide();
           }

           return isValid;
       }

  

       $('#addstaffform').submit(function(event) {
           if (!validateInput()) {
               event.preventDefault(); // Prevent form submission if validation fails
                return;
           }
       });
   });
</script>

@endsection


