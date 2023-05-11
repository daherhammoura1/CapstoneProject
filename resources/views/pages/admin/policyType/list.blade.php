@extends('layout.layout')
@section('customcss')
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/tables/datatable/datatables.min.css')}}">
@endsection

@section('content')
<div class="content-header row">
    <div class="content-header-left col-md-6 col-12 mb-2">
        <h3 class="content-header-title">List Policy Plans</h3>
        <div class="row breadcrumbs-top">
            <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a>
                    </li>

                    <li class="breadcrumb-item active">Policy Types
                    </li>
                </ol>
            </div>
        </div>
    </div>
    <div class="content-header-right col-md-6 col-12">
        <div class="btn-group float-md-right" role="group" aria-label="Button group with nested dropdown">
            <button class="btn btn-info round box-shadow-2 px-2"
                onclick='location.href="{{route('policy_type.create')}}"' id="btnGroupDrop1" type="button"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i
                    class="ft-plus-circle icon-left"></i> Create New Policy Type
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
                                        <th>Name</th>
                                        <th>Description</th>
                                        <th>Price</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(count($policytype)>0)
                                    @foreach($policytype as $u)
                                    <tr>
                                        <td>{{$u->name}}</td>
                                        <td>{{$u->description}}</td>
                                        <td>{{$u->price}}</td>

                                        <td>
                                            <a href="{{route('policy_type.edit',$u->id)}}" class="fa fa-edit mr-2"></a>
                                            <a href="javascript:deleteType('{{$u->id}}')" style="color:red" href="#"
                                                class="fa fa-trash"></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                    @endif
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Name</th>
                                        <th>Description</th>
                                        <th>Price</th>
                                        <th>Actions</th>
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
$('#policyType').addClass('active');

function deleteType(id) {
    Swal.fire({
        title: 'Are you sure?',
        text: 'This action cannot be undone',
        icon: 'warning',
        customClass: 'swal-height',
        showCancelButton: true,
        confirmButtonText: 'Yes, delete it!',
        cancelButtonText: 'Cancel'
    }).then((result) => {
        // If the user confirms the action
        if (result.isConfirmed) {
            // Call the Laravel route using AJAX
            $.ajax({
                url: "{{url('deleteType')}}" + '/' + id,
                success: function(response) {
                    // Handle the success response
                    Swal.fire('Item deleted!', '', 'success');
                    window.location.reload();
                },
                error: function(xhr) {
                    // Handle the error response
                    Swal.fire('Error', 'An error occurred', 'error');
                }
            });
        }
    });
};
</script>

@endsection