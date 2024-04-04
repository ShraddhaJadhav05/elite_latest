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
                           <h4 class="card-title">Add New Broker</h4>
                        </div>
                     </div>
                     <div class="iq-card-body">
                        <div class="new-user-info">
                        <form id="addbrokerform" method="post" action="{{route('add.broker')}}">
                              <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="fname">First Name<span style="color: red;"> *</span></label>
                                    <input type="text" class="form-control" id="fname" name="first_name" placeholder="First Name">
                                    <span id="fnameError" class="text-danger"></span>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="lname">Last Name<span style="color: red;"> *</span></label>
                                    <input type="text" class="form-control" id="lname" name="last_name" placeholder="Last Name">
                                    <span id="lnameError" class="text-danger"></span>
                                </div>
                                
                                <div class="form-group col-md-6">
                                    <label for="mobno">Contact Number</label>
                                    <input type="text" class="form-control" id="mobno" name="phone" placeholder="Contact Number">
                                </div>
                                
                                <div class="form-group col-md-6">
                                    <label for="email">Email ID<span style="color: red;"> *</span></label>
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Email ID">
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
                                    <label for="company">Company</label>
                                    <input type="text" class="form-control" id="company" name="company" placeholder="Company">
                                </div>
                            </div>
                                 <!-- <div class="form-group col-md-6">
                                    <label for="Password">Password:</label>
                                    <input type="password" class="form-control" id="Password" name="password" placeholder="Password" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="confirm_Password">Confirm Password:</label>
                                    <input type="password" class="form-control" id="confirm_Password" name="confirm_password" placeholder="Confirm Password">
                                </div> -->
                                 
                             
                              
                              <button type="button" class="btn btn-primary" onclick="history.back()">Go Back</button>
                              <button type="submit" class="btn btn-primary">Add New Broker</button>
                           </form>
                        </div>
                     </div>
                  </div>
            </div>
         </div>
      </div>
<style>
    .is-invalid {
        border-color: #dc3545;
    }
</style>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <!-- <script>
        $(document).ready(function() {
            $('#Password, #confirm_Password').on('input', function() {
                var password = $('#Password').val();
                var confirmPassword = $('#confirm_Password').val();

                if (password === confirmPassword) {
                    $('#confirm_Password').css('color', 'green');
                } else {
                    $('#confirm_Password').css('color', 'red');
                }
            });
        });
    </script> -->

<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

<script>
    document.getElementById('addbrokerform').addEventListener('submit', function(event) {
        event.preventDefault(); // Prevent the form from submitting normally
        
        // Get the form action URL which includes the lead id
        var formAction = this.getAttribute('action');
        
        // Submit the form via AJAX
        axios.post(formAction, new FormData(this))
            .then(function(response) {
                // If successful, show a pop-up message
                alert('Data Added Successfully');
                // Optionally, you can redirect the user to another page after successful submission
                window.location.href = '{{ route("all.broker") }}';
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
        $('#email').on('blur', function() {
            var email = $(this).val();
            $.ajax({
                url: '/check-user-email',
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

<script>
    $(document).ready(function() {
        function validateInput() {
            var fname = $('#fname').val();
            var lname = $('#lname').val();
            var email = $('#email').val();

            var isValid = true;

            if (fname.trim() === '') {
                $('#fnameError').text('Please enter the first name').show();
                isValid = false;
            } else {
                $('#fnameError').hide();
            }

            if (lname.trim() === '') {
                $('#lnameError').text('Please enter the last name').show();
                isValid = false;
            } else {
                $('#lnameError').hide();
            }

            if (email.trim() === '' || !isValidEmail(email)) {
                $('#emailError').text('Please enter a valid email address').show();
                isValid = false;
            } else {
                $('#emailError').hide();
            }

            return isValid;
        }

        function isValidEmail(email) {
            // You can implement a more sophisticated email validation if needed
            return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
        }

        $('#addbrokerform').submit(function(event) {
            if (!validateInput()) {
                event.preventDefault(); // Prevent form submission if validation fails
            }
        });
    });
</script>
@endsection