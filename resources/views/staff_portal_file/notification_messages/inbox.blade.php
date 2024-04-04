@extends('staff.staff_dashboard')

@section('staff')
    <div class="container-fluid relative">
        <div class="row">
            <div class="col-lg-2 mail-box-detail"></div>
            <div class="col-lg-8 mail-box-detail">
                <div class="iq-card">
                <div class="iq-card-body p-0">
                    <div class="">
                        

                    @foreach($inboxMessages as $message)
                        @foreach($message->clients as $client)
                        <div class="notification_msg read_notification">
                            <div class="row notification_msg1 align-items-center">
                            <div class="notification_txt">
                                {{$message->message,20}}
                        
                            </div>
                            <div class="notification_time">
                            <div class="iq-email-date text-right">{{$message->created_at->format('h:i A')}}</div>
                        </div>
                        </div>
                        </div>
                     @endforeach
                        @endforeach 
                    </div>
                </div>
                </div>
            </div>
            
            <div class="col-lg-2 mail-box-detail"></div>
        </div>
    </div>

@endsection