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
                            <li data-toggle="tooltip" data-placement="top" title="Delete"><a href="{{ route('delete.all.inbox') }}" onclick="return confirm('Are you sure you want to delete all Inbox messages?')"><i class="ri-delete-bin-line"></i></a></li>
                            </ul>
                            <div class="iq-email-search d-flex align-items-center">
                            <form class="mr-3 position-relative" id="searchForm" action="{{ route('show.inbox') }}" method="GET">
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
        
                            </ul>
                            </div>
                        </div>
                    </div>
                    <div class="iq-email-listbox">
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="mail-inbox" role="tabpanel">
                            <ul class="iq-email-sender-list">
                            @foreach($inboxMessages as $message)
                                @foreach($message->clients as $client)
                                <li class="iq-unread">
                                    <div class="d-flex align-self-center">
                                        <div class="iq-email-sender-info">
                                        <div class="iq-checkbox-mail">
                                            <div class="custom-control custom-checkbox">
                                                <!-- Add an onchange event to the checkbox -->
                                                <input type="checkbox" class="custom-control-input" id="mail{{$loop->index}}" onchange="toggleTick(this)">
                                                <!-- Apply a tick class to the label -->
                                                <label class="custom-control-label checkbox_bck" for="mail{{$loop->index}}"></label>
                                            </div>
                                        </div>
                                        <span class="ri-star-line iq-star-toggle text-warning"></span>
                                        <a href="javascript: void(0);" class="iq-email-title">{{$client->first_name}}</a>
                                        </div>
                                        <div class="iq-email-content">
                                        <a href="javascript: void(0);" class="iq-email-subject">{{$message->subject,20}}
                                        </a>
                                        <div class="iq-email-date">{{$message->created_at->format('h:i A')}}</div>
                                        </div>
                                        <ul class="iq-social-media">
                                        <li><a href="{{route('delete.inbox.message',$message->id)}}"><i class="ri-delete-bin-2-line"></i></a></li>
                                        <li><a href="#"><i class="ri-mail-line"></i></a></li>
                                        </ul>
                                    </div>
                                </li>
                                <div class="email-app-details">
                                    <div class="iq-card">
                                        <div class="iq-card-body p-0">
                                        <div class="">
                                            <div class="iq-email-to-list p-3">
                                                <div class="d-flex justify-content-between">
                                                    <ul>
                                                    <li class="mr-3">
                                                        <a href="javascript: void(0);">
                                                            <h4 class="m-0"><i class="ri-arrow-left-line"></i></h4>
                                                        </a>
                                                    </li>
                                                    <li data-toggle="tooltip" data-placement="top" title="Delete"><a href="{{route('delete.outbox.message',$message->id)}}"><i class="ri-delete-bin-line"></i></a></li>
                                                    </ul>
                                                    <div class="iq-email-search d-flex">
                                                    <ul>
                                                        <!-- <li class="mr-3">
                                                            <a class="font-size-14" href="#">1 of 505</a>
                                                        </li> -->
                                                        <!-- <li data-toggle="tooltip" data-placement="top" title="Previous"><a href="#"><i class="ri-arrow-left-s-line"></i></a></li> -->
                                                        <!-- <li data-toggle="tooltip" data-placement="top" title="Next"><a href="#"><i class="ri-arrow-right-s-line"></i></a></li> -->
                                                    </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr class="mt-0">
                                            <div class="iq-inbox-subject p-3">
                                                <h5 class="mt-0">{{$message->subject}}</h5>
                                                <div class="iq-inbox-subject-info">
                                                    <div class="iq-subject-info">
                                                    <img src="{{asset('/email_profile.png')}}" class="img-fluid rounded-circle" alt="#">
                                                    <div class="iq-subject-status align-self-center">
                                                        <h6 class="mb-0">Elite Capital Mortgage <a href="dummy@gmail.com"><dummy@gmail.com></a></h6>
                                                        <div class="dropdown">
                                                            <a class="dropdown-toggle" href="#"  id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            to Me
                                                            </a>
                                                            <div class="dropdown-menu font-size-12" aria-labelledby="dropdownMenuButton">
                                                                <table class="iq-inbox-details">
                                                                <tbody>
                                                                    <tr>
                                                                        <td>from:</td>
                                                                        <td>{{$client->email}}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>reply-to:</td>
                                                                        <td>noreply@gmail.com</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>to:</td>
                                                                        <td>{{$loggedInUserEmail}}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>date:</td>
                                                                        <td>{{$message->created_at->format('d-m-Y,h:i A')}}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>subject:</td>
                                                                        <td>{{$message->subject}}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>security:</td>
                                                                        <td>Standard encryption</td>
                                                                    </tr>
                                                                </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <span class="float-right align-self-center">{{$message->created_at->format('d-m-Y,h:i A')}}</span>
                                                    </div>
                                                    <div class="iq-inbox-body mt-5">
                                                    <p>Hi {{$client->first_name}},</p>
                                                    <p>{{$message->message}}</p>
                                                    <p class="mt-5 mb-0">Regards,<span class="d-inline-block w-100">{{ Auth::user()->fname }} {{ Auth::user()->lname }}</span></p>
                                                    <div class="box-msg mt-3">
                                                    <span class="button-msg" onclick="toggleReplyForm({{ $message->id }})">Reply</span>
                                                    <form action="{{ route('replyToMessage', ['message_id' => $message->id]) }}" id="replyForm{{$message->id}}" style="display:none;" method="POST">
                                                        @csrf
                                                            <div class="form-group">
                                                                <label for="replyMessage">Message</label>
                                                                <textarea name="replyMessage" class="form-control w-100" rows="5" id="replyMessage" placeholder="Type Your Message"></textarea>

                                                            </div>
                                                            <button type="submit" class="btn btn-primary">Submit</button>
                                                        </form>
                                                    </div>

                                                    </div>
                                                    <hr>
                                                    <div class="attegement">
                                                    <h6 class="mb-2">ATTACHED FILES:</h6>
                                                    <ul>
                                                        <li class="icon icon-attegment">
                                                            <i class="fa fa-file-text-o" aria-hidden="true"></i> <span class="ml-1">{{$message->attached_file}}</span>
                                                        </li>
                                                        <!-- <li class="icon icon-attegment">
                                                            <i class="fa fa-file-text-o" aria-hidden="true"></i> <span class="ml-1">mydoc.pdf</span>
                                                        </li> -->
                                                    </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            @endforeach
                            </ul>
                            </div>
                    
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
        
        <div class="col-lg-2 mail-box-detail"></div>
    </div>
    </div>

<script>
    function toggleTick(checkbox) {
        // Get the label associated with the checkbox
        var label = checkbox.nextElementSibling;

        // Toggle the tick class
        if (checkbox.checked) {
            label.classList.add('tick');
        } else {
            label.classList.remove('tick');
        }
    }
</script>

<script>
   document.getElementById('searchInput').addEventListener('input', function () {
      document.getElementById('searchForm').submit();
   });
</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
function toggleReplyForm(messageId) {
    var form = $("#replyForm" + messageId);
    form.slideToggle('slow');
}

</script>


@endsection