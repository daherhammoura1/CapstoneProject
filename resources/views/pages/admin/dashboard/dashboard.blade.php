@extends('layout.layout')

@section('content')
<!-- page content -->
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
                                    <h3 class="success">{{$clients}}</h3>
                                    <h6>New Clients</h6>

                            </div>
                            <div>
                                <i class="fa fa-user success font-large-2 float-right"></i>
                            </div>
                            </a>
                        </div>
                        <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                            <div class="progress-bar bg-gradient-x-success" role="progressbar"
                                style="width: {{$clients}}%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">
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
                                    <h3 class="info">{{$hospital}}</h3>
                                    <h6>Number of Hospitals</h6>

                            </div>
                            <div>
                                <i class="fa fa-hospital-o info font-large-2 float-right"></i>
                            </div>
                            </a>
                        </div>
                        <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                            <div class="progress-bar bg-gradient-x-info" role="progressbar"
                                style="width: {{$hospital}}%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100">
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
                                    <h3 class="warning">{{$claims}}</h3>
                                    <h6>All Claims issued by Hospitals</h6>
                            </div>
                            <div>
                                <i class="fa fa-flag warning font-large-2 float-right"></i>
                            </div>
                            </a>
                        </div>
                        <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                            <div class="progress-bar bg-gradient-x-warning" role="progressbar"
                                style="width: {{$pedning}}%" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100">
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
                                    <h3 class="warning">{{$pedning}}</h3>
                                    <h6>Pending Claims</h6>
                            </div>

                            <div>
                                <i class="icon-pie-chart warning font-large-2 float-right"></i>
                            </div>
                            </a>
                        </div>
                        <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                            <div class="progress-bar bg-gradient-x-warning" role="progressbar"
                                style="width: {{$pedning}}%" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100">
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
                                    <h3 class="danger">{{$polcies}} </h3>
                                    <h6>Number of Policies Created</h6>
                            </div>
                            <div>
                                <i class="fa fa-handshake-o danger font-large-2 float-right"></i>
                            </div>
                            </a>
                        </div>
                        <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                            <div class="progress-bar bg-gradient-x-danger" role="progressbar"
                                style="width: {{$polcies}}%" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100">
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
                                    <h3 class="info">{{$policy_type}}</h3>
                                    <h6>Policy Types</h6>
                            </div>
                            <div>
                                <i class="icon-heart  info font-large-2 float-right"></i>
                            </div>
                            </a>
                        </div>
                        <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                            <div class="progress-bar bg-gradient-x-info" role="progressbar"
                                style="width: {{$policy_type}}%" aria-valuenow="85" aria-valuemin="0"
                                aria-valuemax="100"></div>
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
                                <a href="{{route('chat')}}">
                                    <h3 class="danger"></h3>
                                    <h6>Customer Chats </h6>
                            </div>
                            <div>
                                <i class="icon-heart danger font-large-2 float-right"></i>
                            </div>
                            </a>
                        </div>
                        <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                            <div class="progress-bar bg-gradient-x-danger" role="progressbar" style="width: 100%"
                                aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ eCommerce statistic -->
    <!-- Products sell and New Orders -->

    <!--/ Products sell and New Orders -->
    <!-- Recent Transactions -->
    <div class="row">
        <div id="recent-transactions" class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Recent Claims Issued</h4>
                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                    <div class="heading-elements">
                        <ul class="list-inline mb-0">
                            <li><a class="btn btn-sm btn-danger box-shadow-2 round btn-min-width pull-right"
                                    href="invoice-summary.html" target="_blank">Invoice Summary</a></li>
                        </ul>
                    </div>
                </div>
                <div class="card-content">
                    <div class="table-responsive">
                        <table id="recent-orders" class="table table-hover table-xl mb-0">
                            <thead>
                                <tr>
                                    <th class="border-top-0">Status</th>
                                    <th class="border-top-0">Policy Number#</th>
                                    <th class="border-top-0">Hospital Name</th>
                                    <th class="border-top-0">Statement</th>
                                    <th class="border-top-0">Status</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach($claim as $c)
                                <tr>
                                    <td class="text-truncate"><i style="color:{{$c->status->color}}"
                                            class="la la-dot-circle-o font-medium-1 mr-1"></i> <span class="badge"
                                            style="background-color:{{$c->status->color}};color:white">{{ $c->status ? $c->status->name : 'N/A' }}</span>
                                    </td>
                                    <td class="text-truncate"><a href="#">{{$c->policy->policynumber}}</a></td>
                                    <td class="text-truncate">
                                        <span class="avatar avatar-xs">
                                            <img class="box-shadow-2" src="app-assets\images\logo\careconnectlog.jpg"
                                                alt="avatar">
                                        </span>
                                        <span> {{$c->hospital->hospitalinfo->hospital_name}} </span>
                                    </td>
                                    </td>
                                    <td class="text-truncate p-1">
                                        <ul class="list-unstyled users-list m-0">
                                            {{$c->statement}}
                                        </ul>
                                    </td>
                                    <td>
                                        <a href="{{route('claim.edit',$c->id)}}">
                                            <button type="button" style="background-color:{{$c->status->color}}"
                                                class="btn  btn-sm btn-outline round"><span class="badge"
                                                    style="color:white">{{ $c->status ? $c->status->name : 'N/A' }}</span></button>
                                        </a>
                                    </td>


                                </tr>

                                @endforeach
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection

@section('customscripts')
<script>
$('#dashboard').addClass('active');
</script>
@endsection