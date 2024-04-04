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
                           <h4 class="card-title">Update Broker</h4>
                        </div>
                     </div>
                     <div class="iq-card-body">
                        <div class="new-user-info">
                        <form id="updatebrokerForm" method="POST" action="{{ route('update.broker', ['id' => $broker->id]) }}">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="fname">First Name</label>
                                    <input type="text" class="form-control" id="fname" placeholder="Full Name" name="first_name" value="{{ old('first_name', $broker->first_name) }}" autocomplete="off">
                                    <span id="fnameError" class="text-danger"></span>
                                  
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="lname">Last Name</label>
                                    <input type="text" class="form-control" id="lname" placeholder="Last Name" name="last_name" value="{{ old('last_name', $broker->last_name) }}" autocomplete="off">
                                    <span id="lnameError" class="text-danger"></span>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="phone_number">Contact Number</label>
                                    <input type="number" class="form-control" id="phone_number" placeholder="Contact Number" name="phone_number" value="{{ old('phone_number', $broker->phone) }}" autocomplete="off">
                                    @error('phone_number')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="email">Email ID</label>
                                    <input type="email" class="form-control" id="email" placeholder="Email ID" name="email" value="{{ old('email', $broker->email) }}" autocomplete="off">
                                    <span id="emailError" class="text-danger"></span>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="nationality">Nationality<span style="color: red;"> *</span></label>
                                    <select class="form-control" id="nationality" name="nationality">
                                       <option value="" {{ $broker->nationality == '' ? 'selected' : '' }}>Select Nationality</option>
                                       <option value="Canada" {{ $broker->nationality == 'Canada' ? 'selected' : '' }}>Canada</option>
                                       <option value="Noida" {{ $broker->nationality == 'Noida' ? 'selected' : '' }}>Noida</option>
                                       <option value="USA" {{ $broker->nationality == 'USA' ? 'selected' : '' }}>USA</option>
                                       <option value="India" {{ $broker->nationality == 'India' ? 'selected' : '' }}>India</option>
                                       <option value="Africa" {{ $broker->nationality == 'Africa' ? 'selected' : '' }}>Africa</option>
                                    </select>
                                    <span id="nationalityError" class="text-danger"></span>
                                 </div>
                                <div class="form-group col-md-6">
                                    <label for="company">Company</label>
                                    <input type="text" class="form-control" id="company" name="company" value="{{ old('company', $broker->company) }}" placeholder="Company">
                                    @error('company')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <button type="button" class="btn btn-primary" onclick="goBack()">Go Back</button>
                            <button type="submit" class="btn btn-primary" id="updateBroker">Update Broker</button>
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
    document.getElementById('updatebrokerForm').addEventListener('submit', function(event) {
        event.preventDefault(); // Prevent the form from submitting normally
        
        // Get the form action URL which includes the lead id
        var formAction = this.getAttribute('action');
        
        // Submit the form via AJAX
        axios.post(formAction, new FormData(this))
            .then(function(response) {
                // If successful, show a pop-up message
                alert('Data Updated Successfully');
                // Optionally, you can redirect the user to another page after successful submission
                window.location.href = '{{ route("all.broker") }}';
            })
            .catch(function(error) {
                // Handle errors here
                console.error(error);
            });
    });
</script>



<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

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

       function toggleButtons() {
           $('#updateBroker').prop('disabled', false);
       }

       $('#fname').on('input', function() {
           validateInput();
       });
      
       
       $('#lname').on('input', function() {
           validateInput();
       });

       
       $('#email').on('input', function() {
           validateInput();
       });


       $('#updateBroker').click(function() {
           validateInput();
       });

       $('#updatebrokerForm').submit(function(event) {
           if (!validateInput()) {
               event.preventDefault(); // Prevent form submission if validation fails
           }
       });

       toggleButtons(); // Call initial button state
   });
</script>
@endsection