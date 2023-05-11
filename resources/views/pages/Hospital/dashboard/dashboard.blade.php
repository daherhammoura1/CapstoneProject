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
                                <a href="{{route('user.index')}}">
                                    <h3 class="success">{{$claims_count}}</h3>
                                    <h6>Claims Issued</h6>


                            </div>
                            <div>
                                <i class="fa fa-user success font-large-2 float-right"></i>
                            </div>
                            </a>
                        </div>
                        <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                            <div class="progress-bar bg-gradient-x-success" role="progressbar" style="width: {{$claims_count}}%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">
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
                                <a href="{{route('hospital-claim-list')}}">
                                    <h3 class="warning">{{$claims_pending}} </h3>
                                    <h6>Pending Claims</h6>
                            </div>

                            <div>
                                <i class="icon-pie-chart warning font-large-2 float-right"></i>
                            </div>
                            </a>
                        </div>
                        <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                            <div class="progress-bar bg-gradient-x-warning" role="progressbar" style="width: {{$claims_pending}}%" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100">
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
                                <a href="{{route('policies.index')}}">
                                    <h3 class="danger">{{$hospital_Policies}} </h3>
                                    <h6>Number of Policies You Have</h6>
                            </div>
                            <div>
                                <i class="fa fa-handshake-o danger font-large-2 float-right"></i>
                            </div>
                            </a>
                        </div>
                        <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                            <div class="progress-bar bg-gradient-x-danger" role="progressbar" style="width: {{$hospital_Policies}}%" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100">
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
                                <a href="{{route('policy_type.index')}}">
                                    <h3 class="info">{{$policies}}</h3>
                                    <h6>Policy Availabe</h6>
                            </div>
                            <div>
                                <i class="icon-heart  info font-large-2 float-right"></i>
                            </div>
                            </a>
                        </div>
                        <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                            <div class="progress-bar bg-gradient-x-info" role="progressbar" style="width: {{$policies}}%" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100">
                            </div>
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