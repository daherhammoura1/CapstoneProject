@extends('layout.layout')
@section('customcss')
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/tables/datatable/datatables.min.css')}}">
@endsection

@section('content')
<div class="content-header row">
    <div class="content-header-left col-md-6 col-12 mb-2">
        <h3 class="content-header-title">List Roles</h3>
        <div class="row breadcrumbs-top">
            <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a>
                    </li>

                    <li class="breadcrumb-item active">Roles
                    </li>
                </ol>
            </div>
        </div>
    </div>
    <div class="content-header-right col-md-6 col-12">
        <div class="btn-group float-md-right" role="group" aria-label="Button group with nested dropdown">
            <button class="btn btn-info round box-shadow-2 px-2" onclick='location.href="{{route('roles.create')}}"'
                id="btnGroupDrop1" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i
                    class="ft-plus-circle icon-left"></i> Create New Role
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
                                        <th>ID</th>
                                        <th>Name</th>



                                    </tr>
                                </thead>
                                <tbody>
                                    @if(count($role)>0)
                                    @foreach($role as $u)
                                    <tr>

                                        <td>{{$u->id}}</td>
                                        <td>{{$u->name}}</td>



                                    </tr>
                                    @endforeach
                                    @endif
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>




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
$('#role').addClass('active');
</script>
<script src="{{asset('app-assets/vendors/.js')}}/tables/datatable/datatables.min.js')}}" type="text/javascript">
</script>
<script src="{{asset('app-assets/vendors/.js')}}/tables/datatable/dataTables.buttons.min.js')}}" type="text/javascript">
</script>
<script src="{{asset('app-assets/vendors/.js')}}/tables/buttons.flash.min.js')}}" type="text/javascript"></script>
<script src="{{asset('app-assets/vendors/.js')}}/tables/.js')}}zip.min.js')}}" type="text/javascript"></script>
<script src="{{asset('app-assets/vendors/.js')}}/tables/pdfmake.min.js')}}" type="text/javascript"></script>
<script src="{{asset('app-assets/vendors/.js')}}/tables/vfs_fonts.js')}}" type="text/javascript"></script>
<script src="{{asset('app-assets/vendors/.js')}}/tables/buttons.html5.min.js')}}" type="text/javascript"></script>
<script src="{{asset('app-assets/vendors/.js')}}/tables/buttons.print.min.js')}}" type="text/javascript"></script>
<!-- END PAGE VENDOR .js')}}-->
<!-- BEGIN MODERN .js')}}-->
<script src="{{asset('app-assets/.js')}}/core/app-menu.js')}}" type="text/javascript"></script>
<script src="{{asset('app-assets/.js')}}/core/app..js')}}" type="text/javascript"></script>
<script src="{{asset('app-assets/.js')}}/scripts/customizer.js')}}" type="text/javascript"></script>
<!-- END MODERN .js')}}-->
<!-- BEGIN PAGE LEVEL .js')}}-->
<script src="{{asset('app-assets/.js')}}/scripts/tables/datatables/datatable-advanced.js')}}" type="text/javascript">
</script>
@endsection