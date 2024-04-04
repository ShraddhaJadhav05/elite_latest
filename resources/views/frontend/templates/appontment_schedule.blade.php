@extends("frontend.layouts.app")

@section('page_content')
<div id="home" class="confidence-home-area five-banner-here">

    <div class="container-fluid">

        <div class="row align-items-center">

            <div class="col-lg-12 col-md-12">

                <div class="confidence-home-content text-center">

                    <h1>Book An Appointment</h1>

                    <nav class="text-center">

                        <ol class="breadcrumb">

                            <li class="breadcrumb-item"><a href="{{route('homePage')}}">Home</a></li>

                            <li class="breadcrumb-item active">Book Appointment</li>

                        </ol>

                    </nav>

                </div>

            </div>

        </div>

    </div>

</div>

<div id="contact" class="pt-100 pb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-12"></div>
            <div class="col-lg-6 col-md-12">
                <div class="let-contact-form with-main-color process_mg">
                    @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>    
                        <strong>{{ $message }}</strong>
                    </div>
                    @endif

                    @if ($message = Session::get('error'))
                    <div class="alert alert-danger alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>    
                        <strong>{{ $message }}</strong>
                    </div>
                    @endif
                    <h3>Schedule Date & Time</h3>
                    <form method="post" action="{{route('appointmentScheduleDateTime')}}">
                        @csrf
                        <div class="row m-0">
                            <div class="col-sm-12 col-lg-12">
                                <div class="form-group">
                                    <label for="name">Select Date</label>
                                    <input type="text" class="dateselect form-control" name="date" required="required" placeholder="Date" autoClose="true" autocomplete="off"/>
                                    <span><i class="fas fa-calendar calendaricon"></i></span>
                                </div>
                            </div>
                            <div class="col-sm-12 col-lg-12 time-slote">
                                <div class="form-group">
                                    <label for="name">Select Time</label>                 
                                    <div class="row timeslotmain">
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 col-lg-12">
                                <div class="let-contact-btn">
                                    <button class="main-default-btn cnt_btn" type="submit">Continue</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-lg-3 col-md-12"></div>
            </div>            
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.min.js"></script>
<script>
    $(document).ready(function() {
        $('.time-slote').hide();
    });
</script>
<script>
    $('.dateselect').datepicker({
        format: 'mm/dd/yyyy',
        autoclose:true
        // startDate: '-3d'
    });
</script>

<script>
    var selector = '.timeslot';

    $(selector).on('click', function(){
        $(selector).removeClass('activebtntime');
        $(this).addClass('activebtntime');
    });
</script>
<script>
    $('.dateselect').on('change', function() {
        var date    = $(this).val();
        if(date)
        {
            $.ajax({
                url: "{{ route('getSlot') }}",
                type: "GET",
                data: { date: date },
                success: function(response) {
                    $('.timeslotmain').empty();
                    response.forEach(function(slot) {
                        $('.timeslotmain').append(
                                            `<div class="col-lg-4 col-md-6 col-6">
                                                <label class="btn btn-secondary timeslot " for="option1">
                                                    <input type="radio" class="btn-check" name="time_slots" value="`+slot.time_slot+`" id="option1" autocomplete="off" checked=""> `+slot.time_slot+`
                                                </label>
                                            </div>`
                                        );
                    });
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
            $('.time-slote').show();
        }
        else{
            $('.time-slote').hide();
        }
    });
</script>
@endsection