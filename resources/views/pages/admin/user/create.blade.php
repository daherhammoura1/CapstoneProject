@extends('layout.layout')
@section('customcss')
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/tables/datatable/datatables.min.css')}}">
@endsection
@section('content')
<div class="content-header row">
    <div class="content-header-left col-md-6 col-12 mb-2">
        <h3 class="content-header-title">Entity Management</h3>
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
                            @if(!isset($user))
                            <form id="demo-form" data-parsley-validate action="{{ route('user.store') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="name" id="name" name="name">Name * :</label>
                                        <input type="text" id="fullname" class="form-control" name="name" required
                                            placeholder="Name" />
                                        @error('name')
                                        <div class="alert alert-danger mt-1 mb-1">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label class="control-label">Entity Type </label>
                                        {!! Form::select('role_id', $roles, 'Choose Role', ['class'
                                        => 'form-control select2', 'id' => 'role-select']) !!}
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="email" id="email" name="email">Email :</label>
                                        <input type="text" id="email" class="form-control" name="email" required
                                            placeholder="Email" />
                                        @error('email')
                                        <div class="alert alert-danger mt-1 mb-1">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="password" id="password" name="password">Password :</label>
                                        <input type="password" id="password" class="form-control" name="password"
                                            required placeholder="Password" />
                                        @error('password')
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
                                            <input type="text" id="first_name" class="form-control" name="first_name"
                                                placeholder="First Name " />
                                            @error('first_name')
                                            <div class="alert alert-danger mt-1 mb-1">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <label for="last_name" id="last_name" name="last_name">Last Name :</label>
                                            <input type="text" id="last_name" class="form-control" name="last_name"
                                                placeholder="Last Name " />
                                            @error('last_name')
                                            <div class="alert alert-danger mt-1 mb-1">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="phone" id="phone">Phone :</label>
                                            <input type="number" id="phone" class="form-control" name="mobile"
                                                placeholder="01-123456 " />
                                            @error('phone')
                                            <div class="alert alert-danger mt-1 mb-1">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <label for="dob" id="dob" name="dob">Date of Birth :</label>
                                            <input type="Date" id="dob" class="form-control" name="dob"
                                                placeholder="" />
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
                                            <input type="address" id="address" class="form-control" name="address"
                                                placeholder="Address"/>
                                            @error('address')
                                            <div class="alert alert-danger mt-1 mb-1">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <label for="zip" id="zip" name="zip"> ZIP Code: </label>
                                            <input type="number" id="zip" class="form-control" name="zip"
                                                placeholder="ZIP Code" />
                                            @error('zip')
                                            <div class="alert alert-danger mt-1 mb-1">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="Hospital-info" id="Hospital-info">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="name" id="hospital_name">Name :</label>
                                            <input type="text" id="hospital_name" class="form-control"
                                                name="hospital_name" placeholder="Name" />
                                            @error('name')
                                            <div class="alert alert-danger mt-1 mb-1">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <label for="location" id="location">Location :</label>
                                            <input type="text" id="location" class="form-control" name="location"
                                                placeholder="Location" />
                                            @error('location')
                                            <div class="alert alert-danger mt-1 mb-1">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="reg_number" id="reg_number">Regisration Number :</label>
                                            <input type="reg_number" id="reg_number" class="form-control"
                                                name="reg_number" placeholder="12345-A" />
                                            @error('reg_number')
                                            <div class="alert alert-danger mt-1 mb-1">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <label for="phone" id="phone" name="phone">Phone :</label>
                                            <input type="phone" id="phone" class="form-control" name="phone"
                                                placeholder="00-123456" />
                                            @error('phone')
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
                                            Add Entity
                                        </button>
                                    </div>
                                </div>
                                <br />
                            </form>
                            @else
                            <form id="demo-form" data-parsley-validate action="{{route('user.update',$user)}}"
                                method="POST" enctype="multipart/form-data">
                                @csrf @method('PUT')
                                <label for="name" id="name">Name * :</label>
                                <input type="text" id="fullname" class="form-control" name="name"
                                    value="{{$user->name}}" />
                                @error('name')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                @enderror

                                <label for="email" id="email" name="email">Email :</label>
                                <input type="text" id="email" class="form-control" name="email" value="{{$user->email}}"
                                    placeholder="Email" />
                                @error('email')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                @enderror

                                <label for="password" id="password" name="password">Password :</label>
                                <input type="password" id="password" class="form-control" name="password"
                                    value="{{$user->password}}" placeholder="Password" />
                                @error('password')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                @enderror
                                <br />
                                <button type="submit" class="btn btn-primary">
                                    Save Changes
                                </button>
                            </form>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection
@section('customscripts')
<!-- jQuery -->
<script>
$('#users').addClass('active');
</script>
<script>
$(document).ready(function() {
    $('#Hospital-info').hide();
    $('#Clients-info').hide();
    $('#role-select').on('change', function() {
        var optionSelected = $(this).find("option:selected");
        var textSelected = optionSelected.text();
        if (textSelected == 'HOSPITAL') {
            $('#Hospital-info').show();
            $('#Clients-info').hide();
        } else if (textSelected == 'USER') {
            $('#Hospital-info').hide();
            $('#Clients-info').show();
        } else {
            $('#Hospital-info').hide();
            $('#Clients-info').hide();
        }
    });
});
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>

@endsection
