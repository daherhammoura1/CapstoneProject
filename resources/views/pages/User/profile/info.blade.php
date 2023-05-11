@extends('layout.layout')
@section('content')
<div class="content-header row">
    <div class="content-header-left col-md-6 col-12 mb-2">
        <h3 class="content-header-title">My Personal Information</h3>
        <div class="row breadcrumbs-top">
        </div>
    </div>
</div>
<div class="content-body">
    <!-- horizontal grid start -->
    <section class="horizontal-grid" id="horizontal-grid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <a class="heading-elements-toggle"><i class="ft-align-justify font-medium-3"></i></a>
                        <div class="heading-elements">
                            <ul class="list-inline mb-0">
                                <li>
                                    <a data-action="collapse"><i class="ft-minus"></i></a>
                                </li>
                                <li>
                                    <a data-action="reload"><i class="ft-rotate-cw"></i></a>
                                </li>
                                <li>
                                    <a data-action="expand"><i class="ft-maximize"></i></a>
                                </li>
                                <li>
                                    <a data-action="close"><i class="ft-x"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-content collapse show">
                        <div class="card-body">
                            <form id="demo-form" data-parsley-validate action="{{ route('client_info.update',['client_info'=> Auth::user()->clientInfo]) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="email" id="email" name="email">Email :</label>
                                        <input readonly type="text" id="email" class="form-control" name="email" required value="{{Auth::user()->email}}" />
                                        @error('email')
                                        <div class="alert alert-danger mt-1 mb-1">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="Clients-info" id="Clients-info">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="first_name" id="first_name" name="first_name">First Name
                                                :</label>
                                            <input readonly type="text" id="first_name" class="form-control" name="first_name" value="{{Auth::user()->clientinfo->first_name}}" />
                                            @error('first_name')
                                            <div class="alert alert-danger mt-1 mb-1">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <label for="last_name" id="last_name" name="last_name">Last Name :</label>
                                            <input readonly type="text" id="last_name" class="form-control" name="last_name" value="{{Auth::user()->clientinfo->last_name}}" />
                                            @error('last_name')
                                            <div class="alert alert-danger mt-1 mb-1">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="phone" id="mobile">Phone :</label>
                                            <input type="number" id="phone" class="form-control" name="mobile" value="{{Auth::user()->clientinfo->mobile}}" />
                                            @error('mobile')
                                            <div class="alert alert-danger mt-1 mb-1">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <label for="dob" id="dob" name="dob">Date of Birth :</label>
                                            <input type="Date" id="dob" class="form-control" name="dob" placeholder="Date of Birth" value="{{Auth::user()->clientinfo->dob}}" />
                                            @error('dob')
                                            <div class="alert alert-danger mt-1 mb-1">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="address" id="address" name="address">
                                                Address :
                                            </label>
                                            <input type="address" id="address" class="form-control" name="address" placeholder="Address" value="{{Auth::user()->clientinfo->address}}" />
                                            @error('address')
                                            <div class="alert alert-danger mt-1 mb-1">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <label for="zip" id="zip" name="zip"> ZIP Code: </label>
                                            <input type="number" id="zip" class="form-control" name="zip" placeholder="ZIP Code" value="{{Auth::user()->clientinfo->zip}}" />
                                            @error('zip')
                                            <div class="alert alert-danger mt-1 mb-1">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <br />
                                <div class="row">
                                    <div class="col-md-3">
                                        <button type="submit" class="btn btn-primary">
                                            Submit
                                        </button>
                                    </div>
                                </div>
                                <br />
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

@section('customscripts')
<script>
    $('#User_info').addClass('active');
</script>

@endsection