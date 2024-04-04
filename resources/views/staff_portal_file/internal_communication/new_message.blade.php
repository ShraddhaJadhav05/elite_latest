@extends('staff.staff_dashboard')

@section('staff')

    <div class="container-fluid relative">
        <div class="row">
            <div class="col-lg-2 mail-box-detail"></div>
            <div class="col-lg-8 mail-box-detail">
            <div class="iq-card iq-border-radius-20">
                <div class="iq-card-body">
                    <div class="row">
                        <div class="col-md-12 mb-3">
                        <h5 class="text-primary card-title"> Compose Message</h5>
                        </div>
                    </div>
                    <form id="emailForm" class="email-form" method="POST" action="{{ route('send.message') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">To:</label>
                        
                        <div class="col-sm-10">
                        
                            <select id="inputEmail3" class="select2jsMultiSelect form-control" multiple="multiple" name="client_id[]">
                                @foreach($clients as $client)
                                    <option value="{{ $client->id }}">{{ $client->email }}</option>
                                @endforeach                                
                            </select>
                            <span id="clientemailError" class="text-danger"></span>
                            
                        </div>
                        </div>
                    
                        <div class="form-group row">
                        <label for="subject" class="col-sm-2 col-form-label">Subject:</label>
                        <div class="col-sm-10">
                            <input type="text"  id="subject" class="form-control" name="subject">

                            <span id="subjectError" class="text-danger"></span>

                        </div>
                        </div>
                        <div class="form-group row">
                        <label for="subject" class="col-sm-2 col-form-label">Your Message:</label>
                        <div class="col-md-10">
                            <textarea class="textarea form-control" rows="5" id="message" name="message"></textarea>
                            <span id="messageError" class="text-danger"></span>

                        </div>
                        </div>
                        <div class="form-group row align-items-center">
                        <div class="d-flex flex-grow-1 align-items-center">
                            <div class="send-btn pl-3">
                                <button type="submit" class="btn btn-primary">Send</button>
                            </div>
                            <div class="send-panel">
                                <label class="ml-2 mb-0 iq-bg-primary rounded" for="file"> <input type="file" id="file" name="attached_file" style="display: none" onchange="displaySelectedFileName(this)"> <a><i class="ri-attachment-line"></i> </a> </label>

                                
                            </div>
                            <div id="selectedFileNameContainer"></div>

                        </div>
                        <div class="d-flex mr-3 align-items-center">
                            <div class="send-panel float-right">
                                <label class="ml-2 mb-0 iq-bg-primary rounded"><a href="javascript:void();" id="resetForm">  <i class="ri-delete-bin-line text-primary"></i></a>  </label>
                            </div>
                        </div>
                        </div>
                    </form>
                </div>
            </div>
            </div>
            
            <div class="col-lg-2 mail-box-detail"></div>
        </div>
    </div>

<script>
  function displaySelectedFileName(input) {
    if (input.files && input.files[0]) {
        var selectedFileName = input.files[0].name;
        var selectedFileContainer = document.getElementById('selectedFileNameContainer');
        selectedFileContainer.innerHTML = "";
        
        // Create span element to display selected file name
        var selectedFileSpan = document.createElement('span');
        selectedFileSpan.textContent = " " + selectedFileName;
        
        // Create delete icon
        var deleteIcon = document.createElement('span');
        deleteIcon.classList.add('material-icons-outlined', 'delete-icon');
        deleteIcon.textContent = 'delete';
        deleteIcon.addEventListener('click', function() {
            selectedFileContainer.innerHTML = ""; // Clear selected file
            document.getElementById('filename').value = ""; // Clear file input value
        });
        
        // Append selected file name and delete icon to the container
        selectedFileContainer.appendChild(selectedFileSpan);
        selectedFileContainer.appendChild(deleteIcon);
    }
  }


</script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        document.getElementById('resetForm').addEventListener('click', function () {
            // Reset the form
            document.getElementById('emailForm').reset();

            // Clear the attached file input
            document.getElementById('file').value = '';

            // Clear the displayed file name
            document.getElementById('selectedFileNameContainer').textContent = '';
        });
    });
</script>

<style>
    .delete-icon{
        cursor: pointer;
    }
</style>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
    // Function to clear errors
    function clearErrors() {
        $('#subjectError').text('');
        $('#messageError').text('');
        $('#clientemailError').text('');
    }

    // Event listener to clear errors when input value changes
    $('#subject, #message, #inputEmail3').on('input change', clearErrors);

    $('#emailForm').submit(function(event) {
        event.preventDefault(); // Prevent form submission
        var form = $(this);
        var subject = $('#subject').val();
        var message = $('#message').val();
        var client_email = $('#inputEmail3').val();
        var file = $('#file').val();

        // Reset previous error messages
        clearErrors();

        // Perform validation
        if (client_email.length === 0) {
            $('#clientemailError').text('Please select at least one email.');
            return false;
        }

        if (subject.trim() === '') {
            $('#subjectError').text('Please enter a subject.');
            return false;
        }

        if (message.trim() === '') {
            $('#messageError').text('Please enter a message.');
            return false;
        }

        // You can add more validation rules here

        // If all validation passes, submit the form
        form.off('submit').submit();
    });
});

</script>


@endsection