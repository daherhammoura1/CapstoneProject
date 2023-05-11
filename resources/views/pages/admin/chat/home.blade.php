@extends('layout.chatLayout')


@section('customcss')
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>Chat App</title>

<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/core/menu/menu-types/vertical-menu.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/core/colors/palette-gradient.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/fonts/simple-line-icons/style.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/pages/chat-application.css')}}">





@endsection

@section('content')
<!-- resources/views/chat.blade.php -->


<div class="container">

    <div class="row">
        <div class="col-md-5">
            @if($users->count() > 0)
            <h3>Pick a user to chat withaaaaaaaaaaaaaaaaaaa</h3>
            <ul id="users">
                @foreach($users as $user)
                <li><span class="label label-info">{{ $user->name }}</span> <a href="javascript:void(0);"
                        class="chat-toggle" data-id="{{ $user->id }}" data-user="{{ $user->name }}">Open chat</a></li>
                @endforeach
            </ul>
            @else
            <p>No users found! try to add a new user using another browser by going to <a
                    href="{{ url('register') }}">Register page</a></p>
            @endif
        </div>
    </div>

    @include('pages.admin.chat.chat-box')
    <input type="hidden" id="current_user" value="{{ \Auth::user()->id }}" />
    <input type="hidden" id="pusher_app_key" value="{{ env('PUSHER_APP_KEY') }}" />
    <input type="hidden" id="pusher_cluster" value="{{ env('PUSHER_APP_CLUSTER') }}" />
</div>



@endsection


@section('customscripts')
<script>
$('#chat').addClass('active');
alert("habura");
</script>

@endsection