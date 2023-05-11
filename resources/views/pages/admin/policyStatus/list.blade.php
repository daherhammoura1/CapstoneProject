@extends('layout.layout')


@section('content')
<div class="content-header row">
    <div class="content-header-left col-md-6 col-12 mb-2">
        <h3 class="content-header-title">List Policy Status </h3>
        <div class="row breadcrumbs-top">
            <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a>
                    </li>

                    <li class="breadcrumb-item active">Entities
                    </li>
                </ol>
            </div>
        </div>
    </div>
    <div class="content-header-right col-md-6 col-12">
        <div class="btn-group float-md-right" role="group" aria-label="Button group with nested dropdown">
            <button class="btn btn-info round box-shadow-2 px-2" onclick='location.href="{{route('policy_status.create')}}"' id="btnGroupDrop1" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="ft-plus-circle icon-left"></i> Create New Policy Status
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
                                        <th>Name</th>
                                        <th>Created at</th>
                                        <th>Updated at</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(count($policyStatus)>0)
                                    @foreach($policyStatus as $u)
                                    <tr>
                                        <td>{{$u->id}}</td>
                                        <td>{{$u->name}}</td>
                                        <td>{{$u->created_at}}</td>
                                        <td>{{$u->updated_at}}</td>


                                        <td>
                                            <a href="{{route('policy_status.edit',$u->id)}}" class="fa fa-edit mr-2"></a>
                                            <a href="javascript:deleteStatus('{{$u->id}}')" style="color:red" href="#" class="fa fa-trash"></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                    @endif
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>#ID</th>
                                        <th>Name</th>
                                        <th>Created at</th>
                                        <th>Updated at</th>
                                        <th>Action</th>
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
    $('#policyStatus').addClass('active');

    function deleteStatus(id) {
        Swal.fire({
            title: 'Are you sure?',
            text: 'This action cannot be undone',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'Cancel'
        }).then((result) => {
            // If the user confirms the action
            if (result.isConfirmed) {
                // Call the Laravel route using AJAX
                $.ajax({
                    url: "{{url('delete-policy-status')}}" + '/' + id,
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