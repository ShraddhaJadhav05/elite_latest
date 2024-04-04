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
                           <h4 class="card-title">Update Appoinment</h4>
                        </div>
                     </div>
                     <div class="iq-card-body">
                        <div class="new-user-info">
                            <form id="updateappoinmentForm" method="POST" action="{{ route('update.appoinment', ['id' => $appoinment->id]) }}">
                            @csrf
                            @method('PUT')
                            <div class="row">

                                <div class="form-group col-md-6">
                                    <label for="name">Full Name</label>
                                    <input type="text" class="form-control" id="name" placeholder="Name" name="name" value="{{$appoinment->name}}" autocomplete="off">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="email">Email ID</label>
                                    <input type="email" class="form-control" id="email" placeholder="Email" name="email" value="{{$appoinment->email}}" autocomplete="off">
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="phone_number">Contact Number</label>
                                    <input type="number" class="form-control" id="phone_number" placeholder="Phone Number" name="phone" value="{{$appoinment->phone}}" autocomplete="off">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="company">Company</label>
                                    <input type="text" class="form-control" id="company" placeholder="Company" name="company" value="{{$appoinment->company}}" autocomplete="off">
                                </div>


                                <div class="form-group col-md-6">
                                    <label for="date">Date</label>
                                    <input type="date" class="form-control" id="appoin_date" placeholder="Date" name="date" value="{{ $appoinment->date }}" autocomplete="off">
                                </div>
                            </div>

                        <div class="row">

                            <div class="form-group col-md-8">
                                    <label for="time_slot">Time Slot</label>

                                    <!-- <div class="row timeslotmain">
                                            <div class="col-lg-4 col-md-6 col-6">
                                                <label class="btn btn-secondary timeslot activebtntime " for="option2">
                                                    <input type="radio" class="btn-check" name="time_slot" value="09:00AM - 10:00AM" id="option2" autocomplete="off"> 09:00AM - 10:00AM
                                                </label>
                                            </div>
                                            <div class="col-lg-4 col-md-6 col-6">
                                                <label class="btn btn-secondary timeslot " for="option1">
                                                    <input type="radio" class="btn-check" name="time_slot" value="10:00AM - 11:00AM" id="option1" autocomplete="off" checked=""> 10:00AM - 11:00AM
                                                </label>
                                            </div>
                                            <div class="col-lg-4 col-md-6 col-6">
                                                <label class="btn btn-secondary timeslot activebtntime " for="option2">
                                                    <input type="radio" class="btn-check" name="time_slot" value="11:00AM - 12:00AM" id="option2" autocomplete="off"> 11:00AM - 12:00AM
                                                </label>
                                            </div>
                                            <div class="col-lg-4 col-md-6 col-6">
                                                <label class="btn btn-secondary timeslot " for="option3">
                                                    <input type="radio" class="btn-check" name="time_slot" value="12:00AM - 01:00PM" id="option3" autocomplete="off"> 12:00AM - 01:00PM
                                                </label>
                                            </div>
                                            <div class="col-lg-4 col-md-6 col-6">
                                                <label class="btn btn-secondary timeslot " for="option4">
                                                    <input type="radio" class="btn-check" name="time_slot" value="01:00PM - 02:00PM" id="option4" autocomplete="off"> 01:00PM - 02:00PM
                                                </label>
                                            </div>
                                            <div class="col-lg-4 col-md-6 col-6">
                                                <label class="btn btn-secondary timeslot " for="option5">
                                                    <input type="radio" class="btn-check" name="time_slot" value="02:00PM - 03:00PM" id="option5" autocomplete="off"> 02:00PM - 03:00PM
                                                </label>
                                            </div>
                                            <div class="col-lg-4 col-md-6 col-6">
                                                <label class="btn btn-secondary timeslot " for="option6">
                                                    <input type="radio" class="btn-check" name="time_slot" value="03:00PM - 04:00PM" id="option6" autocomplete="off"> 03:00PM - 04:00PM
                                                </label>
                                            </div>
                                            <div class="col-lg-4 col-md-6 col-6">
                                                <label class="btn btn-secondary timeslot " for="option7">
                                                    <input type="radio" class="btn-check" name="time_slot" value="04:00PM - 05:00PM" id="option7" autocomplete="off"> 04:00PM - 05:00PM
                                                </label>
                                            </div>
                                            <div class="col-lg-4 col-md-6 col-6">
                                                <label class="btn btn-secondary timeslot " for="option7">
                                                    <input type="radio" class="btn-check" name="time_slot" value="05:00PM - 06:00PM" id="option7" autocomplete="off"> 05:00PM - 06:00PM
                                                </label>
                                            </div>

                                    </div> -->
                                    <div class="row timeslotmain">
                                        @foreach($time_slots as $time_slot)
                                            <div class="col-lg-4 col-md-6 col-6">
                                                <label class="btn btn-secondary timeslot {{ $appoinment->time_slot === $time_slot ? 'activebtntime' : '' }}" for="option{{ $loop->iteration }}">
                                                    <input type="radio" class="btn-check" name="time_slot" value="{{ $time_slot }}" id="option{{ $loop->iteration }}" autocomplete="off" {{ $appoinment->time_slot === $time_slot ? 'checked' : '' }}> {{ $time_slot }}
                                                </label>
                                            </div>
                                            @if($loop->iteration % 3 == 0)
                                                </div><div class="row timeslotmain">
                                            @endif
                                        @endforeach
                                    </div>


                                        <div class="form-group col-md-6">
                                            <label for="message">Message</label>
                                            <!-- <textarea class="form-control" id="message"  name="message" rows="4" cols="50">{{$appoinment->message}}</textarea> -->
                                            <textarea class="form-control" id="message" placeholder="" name="message" rows="4" style="width:200% !important">{{ $appoinment->message }}</textarea>

                                        </div>


                              <button type="button" class="btn btn-primary" onclick="history.back()">Go Back</button>
                              <button type="submit" class="btn btn-primary">Update Appoinment</button>
                           </form>
                        </div>
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

<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

<script>
    document.getElementById('updateappoinmentForm').addEventListener('submit', function(event) {
        event.preventDefault(); // Prevent the form from submitting normally
        
        // Get the form action URL which includes the lead id
        var formAction = this.getAttribute('action');
        
        // Submit the form via AJAX
        axios.post(formAction, new FormData(this))
            .then(function(response) {
                // If successful, show a pop-up message
                alert('Data Updated Successfully');
                // Optionally, you can redirect the user to another page after successful submission
                window.location.href = '{{ route("all.appoinments") }}';
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

@endsection

