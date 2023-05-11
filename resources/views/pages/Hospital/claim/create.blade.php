@extends('layout.layout')
@section('customcss')
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/tables/datatable/datatables.min.css')}}">
@endsection
@section('content')
<div class="content-header row">
    <div class="content-header-left col-md-6 col-12 mb-2">
        <h3 class="content-header-title">Claims Management</h3>
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
                        <h4 class="card-title">Horizontal Grid</h4>
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

                            @if(session('status'))
                            <div class="alert alert-success mb-1 mt-1">
                                {{ session('status') }}
                            </div>
                            @endif

                            <div class="x_content">

                                <!-- start form for validation -->
                                @if(!isset($claim))
                                <form id="demo-form" data-parsley-validate action="{{ route('store-claim') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label for="statement" id="statement" name="statement">Statement :
                                            </label>
                                            <textarea type="text" id="statement" class="form-control" name="statement">
                                            </textarea>
                                            @error('statement')
                                            <div class="alert alert-danger mt-1 mb-1">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label class="control-label">Choose Policy Id :</label>
                                            {!! Form::select('policy_id', $policy, 'Choose Policy ID', ['class'
                                            => 'form-control select2', 'id' => 'policy_id']) !!}
                                        </div>


                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label for="description" id="description" name="description">Description :
                                            </label>
                                            <textarea type="text" id="description" class="form-control" name="description">
                                            </textarea>
                                            @error('statement')
                                            <div class="alert alert-danger mt-1 mb-1">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>

                                    </div>
                                    <br>
                                    <button type="submit" class="btn btn-primary">Create Claim </button>
                                    <br>
                                    <br>
                                    <div class="row ">
                                        <div class="col-md-12">

                                            @if(session()->has('error'))
                                            <div class="alert alert-danger ">
                                                {{ session()->get('error') }}
                                            </div>
                                            @endif
                                        </div>
                                    </div>

                                </form>
                                @else
                                <form id="demo-form" data-parsley-validate action="{{ route('hospital-claim.update',$claim->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label for="statement" id="statement" name="statement">Statement :
                                            </label>
                                            <textarea type="text" id="statement" class="form-control" name="statement" required>
                                            {{$claim->statement}}
                                            </textarea>
                                            @error('statement')
                                            <div class=" alert alert-danger mt-1 mb-1">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label class="control-label">Choose Policy Id :</label>
                                            {!! Form::select('policy_id', $policy, 'Choose Policy ID', ['class'
                                            => 'form-control select2', 'id' => 'policy_id']) !!}
                                        </div>


                                    </div>
                                    <br>
                                    <label for="description" id="description" name="description">Description * :</label>
                                    <input type="text" id="fullname" class="form-control" name="description" value="{{$claim->description}}" required />

                                    @error('description')
                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror

                                    <br />
                                    <button type="submit" class="btn btn-primary">Edit Claim</button>
                                </form>
                                @endif
                                <!-- end form for validations -->
                            </div>
                        </div>



                    </div>
                </div>
            </div>
    </section>
    <!-- // horizontal grid end -->
</div>


@endsection

@section('customscripts')
<script>
    $('#claims-hosp').addClass('active');
</script>
@endsection