@extends('layout.layout')


@section('content')
<div class="content-header row">
    <div class="content-header-left col-md-6 col-12 mb-2">
        <h3 class="content-header-title">List of {{Auth::user()->name}}'s Claims </h3>
        <div class="row breadcrumbs-top">
            <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a>
                    </li>

                    <li class="breadcrumb-item active">Claims
                    </li>
                </ol>
            </div>
        </div>
    </div>
    <div class="content-header-right col-md-6 col-12">
        <div class="btn-group float-md-right" role="group" aria-label="Button group with nested dropdown">
            <button class="btn btn-info round box-shadow-2 px-2" onclick='location.href="{{route('hospital-claim')}}"' id="btnGroupDrop1" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="ft-plus-circle icon-left"></i> Create New Claim
            </button>
        </div>
    </div>
</div>


<div class="content-body">
    <!-- File export table -->
    <section id="file-export">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">File export</h4>
                        <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                        <div class="heading-elements">
                            <ul class="list-inline mb-0">
                                <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                <li><a data-action="close"><i class="ft-x"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-content collapse show">
                        <div class="card-body card-dashboard">

                            <table class="table table-striped table-bordered file-export">
                                <thead>
                                    <tr>
                                        <th>#ID</th>
                                        <th>Policy Number</th>
                                        <th>Statement</th>
                                        <th>Status</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($claim as $c )

                                    <tr>
                                        <td>{{$c->id}}</td>
                                        <td>{{$c->policy->policynumber}}</td>
                                        <td>{{$c->statement}}</td>
                                        <td><span class="badge" style="background-color:{{$c->status->color}};color:white">{{ $c->status ? $c->status->name : 'N/A' }}</span>
                                        </td>


                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>#ID</th>

                                        <th>Policy Number</th>
                                        <th>Statement</th>
                                        <th>Status</th>

                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- File export table -->
</div>


@endsection

@section('customscripts')
<script>
    $('#claims-hosp').addClass('active');
</script>
@endsection