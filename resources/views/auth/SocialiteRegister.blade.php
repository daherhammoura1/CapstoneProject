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
                                    <span>Please Enter The Following Information</span>
                                </h6>
                            </div>
                            <div class="card-content">


                                <div class="card-body pt-0">
                                    <form class="form-horizontal" method="POST" action="{{ route('client_info.store') }}">
                                        @csrf
                                        <fieldset class="form-group floating-label-form-group">
                                            <label for="user-name">First Name</label>
                                            <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" required>
                                        </fieldset>
                                        <fieldset class="form-group floating-label-form-group">
                                            <label for="user-name">Last Name</label>
                                            <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" required>
                                        </fieldset>
                                        <fieldset class="form-group floating-label-form-group">
                                            <label for="user-name">Phone Number</label>
                                            <input id="mobile" type="number" class="form-control @error('mobile') is-invalid @enderror" name="mobile" required>
                                        </fieldset>



                                        <input type="hidden" value="{{$newUser->id}}" name="user_id">
                                        <button type="submit" class="btn btn-outline-info btn-block"><i class="ft-user"></i> Register</button>
                                    </form>
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