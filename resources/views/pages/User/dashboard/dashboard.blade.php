@extends('layout.layout')

@section('content')
<div class="content-header row">
</div>
<div class="content-body">
    <!-- eCommerce statistic -->
    <div class="row">

        <div class="col-xl-3 col-lg-6 col-12">
            <div class="card pull-up">
                <div class="card-content">
                    <div class="card-body">
                        <div class="media d-flex">
                            <div class="media-body text-left">
                                <a href="{{route('policies.index')}}">
                                    <h3 class="success">{{$policy1}}</h3>
                                    <h6>Your Policy</h6>
                            </div>
                            <div>
                                <i class="fa fa-user success font-large-2 float-right"></i>
                            </div>
                            </a>
                        </div>
                        <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                            <div class="progress-bar bg-gradient-x-success" role="progressbar"
                                style="width: {{$policy1}}%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-xl-3 col-lg-6 col-12">
            <div class="card pull-up">
                <div class="card-content">
                    <div class="card-body">
                        <div class="media d-flex">
                            <div class="media-body text-left">
                                <a href="{{route('claim.index')}}">
                                    <h3 class="info">{{$pending}}</h3>
                                    <h6>Number of Pending Claims</h6>

                            </div>
                            <div>
                                <i class="fa fa-hospital-o info font-large-2 float-right"></i>
                            </div>
                            </a>
                        </div>
                        <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                            <div class="progress-bar bg-gradient-x-info" role="progressbar" style="width: {{$pending}}%"
                                aria-valuenow="80" aria-valuemin="0" aria-valuemax="100">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection

@section('customscripts')
<script>
$('#Dashboard').addClass('active');
</script>
@endsection