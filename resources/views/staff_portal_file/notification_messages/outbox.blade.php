@extends('staff.staff_dashboard')

@section('staff')

    <div class="container-fluid relative">
    <div class="row">
        <div class="col-lg-2 mail-box-detail"></div>
        <div class="col-lg-8 mail-box-detail">
            <div class="iq-card">
                <div class="iq-card-body p-0">
                <div class="">
                    <div class="iq-email-to-list p-3">
                        <div class="d-flex justify-content-between align-items-center">
                            <ul>
                            <li>
                                <a href="#" id="navbarDropdown" data-toggle="dropdown">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck1">
                                        <label class="custom-control-label checkbox_bck" for="customCheck1"></label>
                                    </div>
                                </a>
                                
                            </li>
                            <!-- <li data-toggle="tooltip" data-placement="top" title="Archive"><a href="#"><i class="ri-mail-open-line"></i></a></li> -->
                            <li data-toggle="tooltip" data-placement="top" title="Delete"><a href="{{route('delete.all.outbox.notification')}}" onclick="return confirm('Are you sure you want to delete all outbox messages?')"><i class="ri-delete-bin-line"></i></a></li>
                            </ul>
                            <div class="iq-email-search d-flex align-items-center">
                            <form class="mr-3 position-relative" id="searchForm" action="{{ route('show.outbox.notification') }}" method="GET">
                                <div class="form-group mb-0">
                                    <input type="search" class="form-control" id="searchInput" name="search" value="{{ request('search') }}" aria-describedby="emailHelp" placeholder="Search">
                                    <a class="search-link" href="#"><i class="ri-search-line"></i></a>
                                </div>
                            </form>
                            <ul class="d-flex align-items-center">
                                <!-- <li class="mr-3">
                                    <a class="font-size-14" href="#" id="navbarDropdown" data-toggle="dropdown">
                                    1 - 50 of 505
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="#">20 per page</a>
                                        <a class="dropdown-item" href="#">50 per page</a>
                                        <a class="dropdown-item" href="#">100 per page</a>
                                    </div>
                                </li>
                                <li data-toggle="tooltip" data-placement="top" title="Previous"><a href="#"><i class="ri-arrow-left-s-line"></i></a></li>
                                <li data-toggle="tooltip" data-placement="top" title="Next"><a href="#"><i class="ri-arrow-right-s-line"></i></a></li> -->
                                <li data-toggle="tooltip" data-placement="top"><a class="btn btn-primary message_compose w-auto" href="{{route('new.notiiction.message')}}">New Message</a></li>
                            </ul>
                            </div>
                        </div>
                    </div>
                    <div class="">
                    

                    @foreach($sentMessages as $message)
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
        </div>
        
        <div class="col-lg-2 mail-box-detail"></div>
    </div>
    </div>

<script>
   document.getElementById('searchInput').addEventListener('input', function () {
      document.getElementById('searchForm').submit();
   });
</script>
@endsection