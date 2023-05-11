@extends('layout.layout')
@section('customcss')
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/tables/datatable/datatables.min.css')}}">
@endsection
@section('content')
<div class="content-header row">
    <div class="content-header-left col-md-6 col-12 mb-2">
        <h3 class="content-header-title">Claims Status Management</h3>
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
                                @if(!isset($claimStatus))
                                <form id="demo-form" data-parsley-validate action="{{ route('claim_status.store') }}"
                                    method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <label for="name" id="name" name="name">Name * :</label>
                                    <input type="text" id="name" class="form-control" name="name" required
                                        placeholder="Name" />
                                    @error('name')
                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror
                                    <br />
                                    <button type="submit" class="btn btn-primary">Add New Claim Status</button>
                                </form>
                                @else
                                <form id="demo-form" data-parsley-validate
                                    action="{{ route('claim_status.update',$claimStatus->id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <label for="name" id="name" name="name">Name * :</label>
                                    <input type="text" id="fullname" class="form-control" name="name"
                                        value="{{$claimStatus->name}}" required />
                                    @error('name')
                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror

                                    <br />
                                    <button type="submit" class="btn btn-primary">Add New Claim Status</button>
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
        $('#claimsStatus').addClass('active');
    </script>
@endsection
