@extends("mortgage.client.layouts.app")
@section('page_content')
<div id="content-page" class="content-page">
    <div class="container-fluid relative">
        <div class="row">
            <div class="col-lg-2 mail-box-detail"></div>
            <div class="col-lg-8 mail-box-detail">
                <div class="iq-card">
                    <div class="iq-card-body p-0">
                        <div class="">
                            @if(!empty($get_data))
                            @foreach($get_data as $key => $data)
                            <div class="notification_msg {{ $data['view'] == false ? 'unread_notification' : 'read_notification' }}">
                                <div class="row notification_msg1 align-items-center">
                                    <div class="notification_txt">
                                        {{$data['text']}}&nbsp;–&nbsp;
                                        @if($data['view'] == false)
                                        <span>@ {{$get_client_data->first_name}} - Very cool :) {{$get_client_data->first_name}}, You have a new direct message.</span>
                                        @endif
                                    </div>
                                    <div class="notification_time list-user-action text-right">
                                        <span class="iq-email-date text-right">{{$data['time']}}</span>
                                        <button class="iq-bg-primary border-0 iq-border-radius-5 view-notification" data-toggle="modal" data-target="#exampleModalCenter{{$key}}" data-notification-id="{{$data['id']}}"><i class="ri-eye-line"></i></button>                   
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="exampleModalCenter{{$key}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                        {{$data['text']}}
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary model-btn" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            @else
                            <div style="text-align: center;">
                                No Data Found
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 mail-box-detail"></div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('.view-notification').on('click', function() {
            var notificationId = $(this).data('notification-id');
            // AJAX request to update view status
            $.ajax({
                url: '{{ route("communication.notification.view.update") }}',
                type: 'POST',
                data: {
                    notification_id: notificationId,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    console.log(response);
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        });
    });
</script>
<script>
    $(document).ready(function() {
        // Listen for modal close event
        $('.model-btn').on('click', function() {
            // Reload the page
            location.reload();
        });
    });
</script>
@endsection