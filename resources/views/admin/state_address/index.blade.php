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
                            <li class="breadcrumb-item active">State Addresses</li>
                        </ol>
                    </div>
                    @section('page_title')
                    State Addresses
                    @endsection
                </div>
            </div>
        </div>
        <!-- end page title -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        {{-- <h4 class="page-title">State Addresses</h4> --}}
                        <hr>
                        @include('flash_msg')
                        <div class="row">
                            <div class="col-md-6">
                                <h4 class="page-title">State Addresses</h4>
                            </div>
                                <div class="col-md-6">
                                    <a href="{{ route('state_address.create') }}">
                                        <button class="btn btn-success btn-sm float-right ml-2"><i
                                                class="fas fa-plus"></i>
                                            Add Address
                                        </button>
                                    </a>
                                </div>
                        </div>
                        <hr>
                        <div class="table-responsive">
                            <table id="example" class="table table-striped table-bordered dt-responsive nowrap"
                                style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>State</th>
                                        <th>Title</th>
                                        <th>Sub Title</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $key => $stateAddress)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $stateAddress->state->name }}</td>
                                        <td>{{ $stateAddress->title }}</td>
                                        <td>{{ $stateAddress->sub_title }}</td>
                                        <td>
                                            <a href="{{ route('state_address.edit', $stateAddress->id) }}"
                                                class="btn btn-info waves-effect waves-light btn-xs"><i
                                                    class="fas fa-edit"></i></a>
                                            <form action="{{ route('state_address.destroy', $stateAddress->id) }}"
                                                method="POST" style="display: inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="btn btn-danger waves-effect waves-light btn-xs"
                                                    onclick="return confirm('Are you sure you want to delete this item?')">
                                                    <i class="fas fa-trash"></i>
                                                </button>
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
        </div>
        <!-- end row -->
    </div> <!-- end container-fluid -->
</div> <!-- end content -->

@endsection

@section('csscodes')
<!-- DataTables -->
<link href="{{ asset('admin_assets') }}/libs/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
<link href="{{ asset('admin_assets') }}/libs/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
@endsection

@section('jscodes')
<!-- Required datatable js -->
<script src="{{ asset('admin_assets') }}/libs/datatables/jquery.dataTables.min.js"></script>
<script src="{{ asset('admin_assets') }}/libs/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Responsive examples -->
<script src="{{ asset('admin_assets') }}/libs/datatables/dataTables.responsive.min.js"></script>
<script src="{{ asset('admin_assets') }}/libs/datatables/responsive.bootstrap4.min.js"></script>

<!-- Datatable init js -->
<script src="{{ asset('admin_assets') }}/js/pages/datatables.init.js"></script>
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
