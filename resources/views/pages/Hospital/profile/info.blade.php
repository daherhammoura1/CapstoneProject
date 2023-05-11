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
                            <form id="demo-form" data-parsley-validate class="form-horizontal form-label-left" action="{{route('hospital-profile-update',['hospitalInfo'=> Auth::user()->hospitalinfo ] )}}" method="POST" enctype="multipart/form-data">
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

                                <div class="Hospital-info" id="Hospital-info">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="name" id="hospital_name">Name :</label>
                                            <input readonly type="text" id="hospital_name" class="form-control" name="hospital_name" value="{{Auth::user()->name}}" />
                                            @error('name')
                                            <div class="alert alert-danger mt-1 mb-1">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <label for="location" id="location">Location :</label>
                                            <input readonly type="text" id="location" class="form-control" name="location" value="{{Auth::user()->hospitalinfo->location}}" />
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
                                            <input readonly type="reg_number" id="reg_number" class="form-control" name="reg_number" value="{{Auth::user()->hospitalinfo->reg_number}}" />
                                            @error('reg_number')
                                            <div class="alert alert-danger mt-1 mb-1">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <label for="phone" id="phone" name="phone">Phone :</label>
                                            <input type="phone" id="phone" class="form-control" name="phone" value="{{Auth::user()->hospitalinfo->phone}}" />
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
                                            Sudmit Changes
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
    $('#Hospital-profile').addClass('active');
</script>

@endsection