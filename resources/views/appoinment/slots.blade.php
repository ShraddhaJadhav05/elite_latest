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
                                 <h4 class="card-title">Available Slots</h4>
                              </div>
                           </div>
                           <div class="iq-card-body">
                              <div class="new-user-info">
                                 <form id="addslotsForm" method="POST" action="{{ route('add.slots') }}">
                                 @csrf
                                    <div class="row">
                                    <!-- <div class="form-group col-md-12">
                                       <label for="bankname">Staff Name:</label>
                                       <select class="form-control" name="staff_id" id="staff_id">
                                          <option selected=""> Please select one…</option>
                                          @foreach($staff as $staffs)
                                          <option value="{{$staffs->id}}">{{$staffs->first_name}}</option>
                                          @endforeach

                                       </select>
                                    </div> -->
                                       <div class="form-group col-sm-12">
                                        <label>Select Date</label>
                                        <input type="date" class="dateselect form-control" placeholder="Date" id="selected_date" name="date" autoClose="true" min="{{ date('Y-m-d') }}"/>
                                        </div>
                                       
                                        <div class="form-group col-md-12">
                                            <div id="user-list-table">
                                          <div class="col-md-12 pl-0"><label for="lname">Select Time</label></div>
                                        
                                        <table  class="table table-borderless" role="grid" aria-describedby="user-list-page-info">
                                          <thead>
                                              <tr>
                                                 <th>Time Slot</th>
                                                 <th>Status</th>
                                                 <th>Action</th>
                                              </tr>
                                          </thead>
                                          <tbody>
                                             @foreach($timeSlots as $key => $slot)
                                                <tr>
                                                      <td>{{ $slot }}</td>
                                                       <td>
                                                        
                                                            <span id="status{{ $key }}" class="badge iq-bg-danger">Inactive</span>
                                                         
                                                      </td>
                                                      <td>
                                                         <div class="custom-control custom-switch custom-switch-color custom-control-inline">
                                                               <input type="checkbox" class="custom-control-input bg-success" id="customSwitch{{ $key }}" name="slot[]" value="0" onclick="switch_collapse(this)">
                                                               <label class="custom-control-label" for="customSwitch{{ $key }}"></label>
                                                         </div>
                                                         <input type="hidden" id="customSwitchInput{{ $key }}" name="slot1[]" value="0">
                                                         
                                                      </td>
                                                </tr>
                                             @endforeach
                                          </tbody>
                                        </table>
                                        <button id="submitButton" type="submit" class="btn btn-primary" onclick="return validate_slot();">Add slots </button>
                                    
                                    </div>
                                       </div>
                                       
                                       

                                       </div>

                                    </div>
                                    

                                 </form>
                              </div>
                           </div>
                        </div>
                  </div>
                  <div class="col-lg-2">

                  </div>
               </div>
<script type="text/javascript">
    function validate_slot()
    {
        var selectedDateValue = $('#selected_date').val();
        // Check if the value is empty
        if (selectedDateValue === '') {
            alert('Please select a date.');
        } 
    }
</script>

<script>
    function switch_collapse(element) {
        
        const str = element.id;
        const digit = str.match(/\d/);


        
        var inputElement = document.getElementById('customSwitchInput' + element.id.slice(-1));
        
        var statusElement = document.getElementById('status' + element.id.slice(-1));
        
        if ($(element).is(":checked")) {
            inputElement.value = 1;
            statusElement.textContent = "Active";
            $(statusElement).removeClass("badge iq-bg-danger");
            $(statusElement).addClass("badge dark-icon-light iq-bg-primary");
        } else {
            inputElement.value = 0;
            statusElement.textContent = "Inactive";
            $(statusElement).removeClass("badge dark-icon-light iq-bg-primary ");
            $(statusElement).addClass("badge iq-bg-danger");
        }
    }
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
   $(document).ready(function() {
    $('#selected_date').on('change', function() {
        var selectedDate = $(this).val();

        // Send AJAX request to check if staff ID exists for the selected date
        $.ajax({
            url: 'check-staff-date',
            type: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                date: selectedDate
            },
            success: function(response) {

                $('#user-list-table').html(response.html);
                 var actionValue = $('#action').val();
                if(actionValue=='update'){
                    alert('Slots are available');
                }else{
                     alert('Slots are not available');
                }
               
                // if (response.exists) {
                //     alert('Staff exists for the selected date');

                //     // Populate get-date-slot table with time slots and statuses
                //     var slots = response.slots;
                //     $.each(slots, function(index, slot) {
                //         var slotIndex = index + 1;
                //         var checkbox = $('#get-date-slot input[name="slot[]"]').eq(index);
                //         var hiddenInput = $('#get-date-slot input[name="slot1[]"]').eq(index);
                //         var statusElement = $('#get-date-slot #status' + slotIndex);

                //         checkbox.prop('checked', slot.status == 1);
                //         hiddenInput.val(slot.status);
                //         statusElement.text(slot.status == 1 ? 'Active' : 'Inactive');
                //         statusElement.css('color', slot.status == 1 ? 'green' : 'red');
                //     });

                //     // Display the get-date-slot table
                //     $('#get-date-slot').show();
                // } else {
                //     // Staff ID does not exist for the selected date
                //     alert('Staff does not exist for the selected date ' + selectedDate);
                // }
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    });
});


    document.getElementById('addslotsForm').addEventListener('submit', function(event) {
        event.preventDefault(); // Prevent the form from submitting normally
        
        // Get the form action URL which includes the lead id
        var formAction = this.getAttribute('action');

        var actionValue = document.getElementById('action').value;

        
        // Submit the form via AJAX
        axios.post(formAction, new FormData(this))
            .then(function(response) {
                //alert(actionValue);
                // If successful, show a pop-up message
                if(actionValue=='update'){
                    alert('Data Updated Successfully');
                }else{
                     alert('Data Added Successfully');
                }
                // Optionally, you can redirect the user to another page after successful submission
                window.location.href = '{{ route("all.slots") }}';
            })
            .catch(function(error) {
                // Handle errors here
                console.error(error);
            });
    });

</script>


@endsection
