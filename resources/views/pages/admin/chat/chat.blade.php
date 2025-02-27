@extends('layout.chatLayout')

@section('content')

<div class="content-header row">
    <div class="content-header-left col-md-6 col-12 mb-2">
        <h3 class="content-header-title"><a href="{{route('dashboard')}}">Back</h3></a>
    </div>
</div>
<div class="container">
    <div class="content-body">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"> Your Chats</h4>
                    <div class="row">
                        <div class="col-md-5">
                            @if($users->count() > 0)
                            <h3>Pick a user to chat with</h3>






                            <ul id="users">
                                @foreach($users as $user)
                                <li><span class="label label-info">{{ $user->name }}</span> <a
                                        href="javascript:void(0);" class="chat-toggle" data-id="{{ $user->id }}"
                                        data-user="{{ $user->name }}">Open
                                        chat</a>
                                </li>
                                @endforeach
                            </ul>
                            @else
                            <p>No users found! try to add a new user using another browser by going to <a
                                    href="{{ url('register') }}">Register page</a></p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            @include('pages.admin.chat.chat-box')

            <input type="hidden" id="current_user" value="{{ \Auth::user()->id }}" />
            <input type="hidden" id="pusher_app_key" value="{{ env('PUSHER_APP_KEY') }}" />
            <input type="hidden" id="pusher_cluster" value="{{ env('PUSHER_APP_CLUSTER') }}" />
            @stop
        </div>
    </div>
    @section('script')

    <script src="https://js.pusher.com/4.1/pusher.min.js"></script>
    <script src="{{ asset('js/chat.js') }}"></script>

    @stop