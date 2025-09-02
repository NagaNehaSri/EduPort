@extends('admin.layouts.main')

@section('content')

<div class="content">
    <!-- Start Content-->
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Add User</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Add User</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        @include('flash_msg')
                        <div class="row">
                            <div class="col-md-6">
                                <h4 class="page-title">Add User</h4>
                            </div>
                            <div class="col-md-6 text-right">
                                <a href="{{ route('user.create') }}" class="btn btn-success btn-sm ml-2">
                                    <i class="fas fa-plus"></i> Add user
                                </a>
                            </div>
                        </div>
                        <hr>

                        <div class="table-responsive">
                            <table id="example" class="table table-striped table-bordered dt-responsive nowrap"
                                style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th>S.No</th>
                                        <th>name</th>
                                        <th>Rolename</th>                     
                                        <th>Privileges</th>
                                        <th>Modified At</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $key => $user)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $user->name }}</td>
                                       
                                            <!-- <td>{{ $user->role_name }}</td> -->
                                       
                                            <td>{{ $user->privileges }}</td>
                                            <td>{{ $user->updated_at }}</td>
                                            <td>
                                                <a href="{{ route('user.edit', [$user->id]) }}"
                                                    class="btn btn-primary btn-xs"><i class="fas fa-edit"></i></a>
                                                <button data-value="{{ $user->id }}"
                                                    class="btn btn-danger btn-xs cdelete"><i class="fas fa-trash"></i></button>
                                                    <form id="deleteform{{ $user->id }}" method="post"
                                                    action="{{ route('user.destroy', [$user->id]) }}">
                                                    @csrf
                                                    {{ method_field('DELETE') }}
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div> <!-- end card -->
            </div> <!-- end col -->
        </div> <!-- end row -->
    </div> <!-- end container-fluid -->
</div> <!-- end content -->

@endsection

@section('csscodes')
<link href="{{ asset('admin_assets/libs/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
<link href="{{ asset('admin_assets/libs/datatables/responsive.bootstrap4.min.css') }}" rel="stylesheet">
<link href="{{ asset('admin_assets/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('jscodes')
<script src="{{ asset('admin_assets/libs/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('admin_assets/libs/datatables/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('admin_assets/libs/datatables/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('admin_assets/libs/datatables/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('admin_assets/libs/sweetalert2/sweetalert2.min.js') }}"></script>
<script src="{{ asset('admin_assets/js/pages/datatables.init.js') }}"></script>
<script src="{{ asset('admin_assets/js/pages/sweet-alerts.init.js') }}"></script>

<script>
    $('.cdelete').on('click', function() {
        var id = $(this).data('value');
        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            type: "warning",
            showCancelButton: !0,
            confirmButtonColor: "#348cd4",
            cancelButtonColor: "#6c757d",
            confirmButtonText: "Yes, delete it!"
        }).then(function(t) {
            if (t.value == true) {
                $("#deleteform" + id).submit();
            }
        })
    });
</script>
<script language="javascript">
    $('#example').DataTable({
        responsive: true
    });
</script>
@endsection
