@extends('layout.authLayout')

@section('content')



<!-- ////////////////////////////////////////////////////////////////////////////-->
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">
            <section class="flexbox-container">
                <div class="col-12 d-flex align-items-center justify-content-center">
                    <div class="col-md-4 col-10 box-shadow-2 p-0">
                        <div class="card border-grey border-lighten-3 px-1 py-1 m-0">
                            <div class="card-header border-0 pb-0">
                                <div class="card-title text-center">
                                    <img class="authimg" src="{{ asset('app-assets\images\logo\careconnectlog.jpg') }}" alt="branding logo" style="border-radius: 10%;">
                                </div>
                                <h6 class="card-subtitle line-on-side text-muted text-center font-small-3 pt-2">
                                    <span>Easily Using</span>
                                </h6>
                            </div>
                            <div class="card-content">
                                <div class="card-body text-center">
                                    <a href="#" class="btn btn-social mb-1 mr-1 btn-outline-facebook">
                                        <span class="la la-facebook"></span>
                                        <span class="px-1">facebook</span>
                                    </a>
                                    <a href="{{url('login/google')}}" class="btn btn-social mb-1 btn-outline-google">
                                        <span class="la la-google-plus font-medium-4"></span>
                                        <span class="px-1">google</span>
                                    </a>
                                </div>
                                <p class="card-subtitle line-on-side text-muted text-center font-small-3 mx-2 my-1">
                                    <span>OR Using Email</span>
                                </p>
                                <div class="card-body pt-0">
                                    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                                        @csrf
                                        <fieldset class="form-group floating-label-form-group">
                                            <label for="user-name">Name</label>
                                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                        </fieldset>
                                        <fieldset class="form-group floating-label-form-group">
                                            <label for="user-email">Email Address</label>
                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </fieldset>
                                        <fieldset class="form-group floating-label-form-group mb-1">
                                            <label for="user-password">Enter Password</label>
                                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required>
                                        </fieldset>
                                        <button type="submit" class="btn btn-outline-info btn-block"><i class="ft-user"></i> Register</button>
                                    </form>
                                </div>
                                <div class="card-body pt-0">
                                    <a href="{{route('login')}}" class="btn btn-outline-danger btn-block"><i class="ft-unlock"></i> Login</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
<!-- ////////////////////////////////////////////////////////////////////////////-->
<!-- BEGIN VENDOR JS-->
@endsection