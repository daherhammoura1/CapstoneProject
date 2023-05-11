@extends('layout.layout')


@section('content')
<div class="content-header row">
    <div class="content-header-left col-md-6 col-12 mb-2">
        <h3 class="content-header-title">List of {{Auth::user()->role->name}}'s Claims </h3>
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

                                        <th>Hospital</th>
                                        <th>Policy Number</th>
                                        <th>Statement</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($claim as $c )
                                    <tr>

                                        <td>{{$c->hospital->hospitalinfo->hospital_name}}</td>
                                        <td>{{$c->policy->policynumber}}</td>
                                        <td>{{$c->statement}}</td>

                                        <td>

                                            <a href="{{route('claim.edit',$c->id)}}">
                                                <button type="button" style="background-color:{{$c->status->color}}" class="btn  btn-sm btn-outline round"><span class="badge" style="color:white">{{ $c->status ? $c->status->name : 'N/A' }}</span></button>
                                            </a>
                                        </td>



                                        <td>

                                            <a href="javascript:deleteClaim('{{$c->id}}')" style="color:red" href="#" class="fa fa-trash"></a>
                                        </td>
                                    </tr>

                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>

                                        <th>Hospital</th>
                                        <th>Policy Number</th>
                                        <th>Statement</th>
                                        <th>Status</th>
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
    $('#claims').addClass('active');

    function deleteClaim(id) {
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
                    url: "{{url('delete-claim')}}" + '/' + id,
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