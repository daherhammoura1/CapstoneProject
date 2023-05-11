@extends('layout.layout')
@section('customcss')

<!-- Include the Select2 CSS and JS files -->

<link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/tables/datatable/datatables.min.css')}}">

@endsection
@section('content')
<div class="content-header row">
    <div class="content-header-left col-md-6 col-12 mb-2">
        <h3 class="content-header-title">Policy Management</h3>
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
                            @if(!isset($policy))
                            <form id="demo-form" data-parsley-validate action="{{ route('policies.store') }}"
                                method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="policynumber" id="policynumber" name="policynumber">Policy Number
                                            :</label>
                                        <input readonly type="string" name="policynumber" class="form-control"
                                            id="policynumber" value="{{ app('custom-id-generator')->generate() }} "
                                            placeholder="this.value">

                                        @error('policynumber')
                                        <div class="alert alert-danger mt-1 mb-1">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label class="control-label">Choose User :</label>
                                        {!! Form::select('user_id', $users, 'Choose User', ['class'
                                        => 'form-control select2', 'id' => 'user_id']) !!}
                                    </div>
                                </div>

                                <br>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="policy_creation_date" id="policy_creation_date"
                                            name="policy_creation_date">Policy Creation Date :</label>
                                        <input type="date" id="policy_creation_date" class="form-control"
                                            name="policy_creation_date" required placeholder="" />
                                        @error('policy_creation_date')
                                        <div class="alert alert-danger mt-1 mb-1">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>

                                    <div class="col-md-6">
                                        <label class="control-label">Choose Policy Type:</label>
                                        {!! Form::select('policy_type_id', $policyType, 'Policy Type :',
                                        ['class' => 'form-control select2', 'id' => 'policy_type_id']) !!}
                                    </div>

                                </div>
                                <br>

                                <div class="row">

                                    <div class="col-md-6">
                                        <label for="policy_expiry_date" id="policy_expiry_date"
                                            name="policy_expiry_date">Policy Expiry Date :</label>
                                        <input type="date" id="policy_expiry_date" class="form-control"
                                            name="policy_expiry_date" required placeholder="" />
                                        @error('policy_expiry_date')
                                        <div class="alert alert-danger mt-1 mb-1">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label class="control-label">Choose Policy Status:</label>
                                        {!! Form::select('policy_status_id', $policyStatus, 'Policy Status :',
                                        ['class' => 'form-control select2', 'id' => 'policy_status_id']) !!}
                                    </div>

                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="discount" id="discount" name="discount">Discount :</label>
                                        <input type="number" id="discount" class="form-control" name="discount" required
                                            placeholder="please let it be in the % format " />
                                        @error('discount')
                                        <div class="alert alert-danger mt-1 mb-1">
                                            {{ $message }}
                                        </div>
                                        @enderror

                                    </div>

                                </div>

                                <br>
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
                            <form id="demo-form" data-parsley-validate action="{{route('policies.update',$policy->id)}}"
                                method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="policynumber" id="policynumber" name="policynumber">Policy Number
                                            :</label>
                                        <input readonly type="string" id="policynumber" class="form-control"
                                            name="policynumber" value="{{$policy->policynumber}}"
                                            placeholder="this.value" />
                                        @error('policynumber')
                                        <div class=" alert alert-danger mt-1 mb-1">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label class="control-label">Choose User :</label>

                                        {!! Form::select('user_id', $users, 'Choose User', ['class'
                                        => 'form-control select2', 'id' => 'user_id']) !!}

                                    </div>
                                </div>

                                <br>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="policy_creation_date" id="policy_creation_date"
                                            name="policy_creation_date">Policy Creation Date :</label>
                                        <input type="date" id="policy_creation_date" class="form-control"
                                            name="policy_creation_date" required placeholder=""
                                            value="{{$policy->policy_creation_date}}" />
                                        @error('policy_creation_date')
                                        <div class=" alert alert-danger mt-1 mb-1">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>

                                    <div class="col-md-6">
                                        <label class="control-label">Choose Policy Type:</label>
                                        {!! Form::select('policy_type_id', $policyType, 'Policy Type :',
                                        ['class' => 'form-control select2', 'id' => 'policy_type_id']) !!}
                                    </div>

                                </div>
                                <br>

                                <div class="row">

                                    <div class="col-md-6">
                                        <label for="policy_expiry_date" id="policy_expiry_date"
                                            name="policy_expiry_date">Policy
                                            Expiry Date :</label>
                                        <input type="date" id="policy_expiry_date" class="form-control"
                                            name="policy_expiry_date" required placeholder=""
                                            value="{{$policy->policy_expiry_date}}" />
                                        @error('policy_expiry_date')
                                        <div class="alert alert-danger mt-1 mb-1">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label class="control-label">Choose Policy Status:</label>
                                        {!! Form::select('policy_status_id', $policyStatus, 'Policy Status :',
                                        ['class' => 'form-control select2', 'id' => 'policy_status_id']) !!}
                                    </div>

                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="discount" id="discount" name="discount">Discount :</label>
                                        <input type="number" id="discount" class="form-control" name="discount" required
                                            placeholder="please let it be in the % format "
                                            value="{{$policy->discount}}" />
                                        @error('discount')
                                        <div class="alert alert-danger mt-1 mb-1">
                                            {{ $message }}
                                        </div>
                                        @enderror

                                    </div>

                                </div>

                                <br>
                                <div class="row">
                                    <div class="col-md-3">
                                        <button type="submit" class="btn btn-primary">
                                            Save Changes
                                        </button>
                                    </div>
                                </div>
                                <br />
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
<script>
$('#policyManagement').addClass('active');
</script>



@endsection