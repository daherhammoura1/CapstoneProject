@if($message->from_user == Auth::user()->id)
<div class="row msg_container base_sent" data-message-id="{{ $message->id }}">
    <div class="col-md-10 col-xs-10">
        <div class="messages msg_sent text-right">
            <p>{!! $message->content !!}</p>
        </div>
    </div>
    <div class="col-md-2 col-xs-2 avatar">
        <img src="{{ url('images/user-avatar.png') }}" width="50" height="50" class="img-responsive">
    </div>
</div>

@else

<div class="row msg_container base_receive" data-message-id="{{ $message->id }}">
    <div class="col-md-2 col-xs-2 avatar">
        <img src="{{ url('images/user-avatar.png') }}" width="50" height="50" class=" img-responsive ">
    </div>
    <div class="col-md-10 col-xs-10">
        <div class="messages msg_receive text-left">
            <p>{!! $message->content !!}</p>
        </div>
    </div>
</div>
@endif