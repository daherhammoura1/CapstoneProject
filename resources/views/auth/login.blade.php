@extends('layout.authLayout')



@section('content')
<script>
    window.fbAsyncInit = function() {
        FB.init({
            appId: '227903633206142',
            xfbml: true,
            version: 'v16.0'
        });
        FB.AppEvents.logPageView();
    };

    (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) {
            return;
        }
        js = d.createElement(s);
        js.id = id;
        js.src = "https://connect.facebook.net/en_US/sdk.js";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>

<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">
            <section class="flexbox-container">
                <div class="col-12 d-flex align-items-center justify-content-center">
                    <div class="col-md-4 col-10 box-shadow-2 p-0">
                        <div class="card border-grey border-lighten-3 m-0">
                            <div class="card-header border-0">
                                <div class="card-title text-center">
                                    <div class="p-1">
                                        <img class="authimg" src="{{ asset('app-assets\images\logo\careconnectlog.jpg') }}" alt="branding logo" style="border-radius: 10%;">
                                    </div>
                                </div>
                                <h6 class="card-subtitle line-on-side text-muted text-center font-small-3 pt-2">
                                    <span>Easily Using</span>

                                </h6>
                            </div>
                            <div class="card-content">
                                <div class="card-body pt-0 text-center">
                                    <a href="{{url('auth/facebook')}}" class="btn btn-social mb-1 mr-1 btn-outline-facebook">
                                        <span class="la la-facebook"></span>
                                        <span class="px-1">facebook</span>
                                    </a>
                                    <a href="{{url('login/google')}}" class="btn btn-social mb-1 mr-1 btn-outline-google">
                                        <span class="la la-google-plus font-medium-4"></span>
                                        <span class="px-1">google</span>
                                    </a>
                                </div>
                                <p class="card-subtitle line-on-side text-muted text-center font-small-3 mx-2">
                                    <span>OR Using Account Details</span>
                                </p>
                                <div class="card-body pt-0">
                                    <form class="form-horizontal" action="{{ route('login') }}" method="POST">
                                        @csrf
                                        <fieldset class="form-group floating-label-form-group">
                                            <label for="user-name">Your Email</label>
                                            <input type="text" class="form-control" placeholder="Your Username" name="email">
                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </fieldset>
                                        <fieldset class="form-group floating-label-form-group mb-1">
                                            <label for="user-password">Enter Password</label>
                                            <input type="password" class="form-control" name="password" placeholder="Enter Password">
                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </fieldset>

                                        <button type="submit" class="btn btn-outline-info btn-block"><i class="ft-unlock"></i> Login</button>
                                    </form>
                                </div>
                                <!-- 
                                <p class="card-subtitle line-on-side text-muted text-center font-small-3 mx-2 my-1">
                                    <span>New to CareConncet ?</span>
                                </p>
                                <div class="card-body">
                                    <a href="{{route('register')}}" class="btn btn-outline-danger btn-block"><i class="ft-user"></i> Register</a>
                                </div>-->
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
@endsection