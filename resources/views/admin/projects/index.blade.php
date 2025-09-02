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
                            <li class="breadcrumb-item active">Projects</li>
                        </ol>
                    </div>
                    @section('page_title')
                    Projects
                    @endsection
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
                                <h4 class="page-title">Projects</h4>
                            </div>
                            <div class="col-md-6">
                                <a href="{{ route('projects.create') }}">
                                    <button class="btn btn-success btn-sm float-right ml-2"><i class="fas fa-plus"></i>
                                        Create Project
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
                                        <th>S.No</th>
                                        <th>Project Name</th>
                                        <th>Home Page Project Image</th>
                                        <th>Add Project Images</th>
                                        <th>Modified At</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($projects as $key => $project)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $project->homepageprojecttitle }}</td>
                                        <td>
                                            @if ($project->homepageprojectimage != '')
                                            <a href="{{ asset('uploads/projects/' . $project->homepageprojectimage) }}"
                                                target="_blank">
                                                <img class="avatar-lg"
                                                    src="{{ asset('uploads/projects/' . $project->homepageprojectimage) }}"
                                                    alt="">
                                            </a>
                                            @else
                                            <span class="badge badge-warning">No Project Image</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{route('project_images.index', ['project_id' => $project->id])}}" class="btn btn-dark waves-effect waves-light btn-xs">
                                                <i class="fas fa-plus"></i> Add Project Images
                                            </a>
                                        </td>
                                        <td>{{ \Carbon\Carbon::parse($project->updated_at)->format('d M Y h:i A') }}
                                        </td>
                                        <td>
                                            <a href="{{ route('projects.edit', $project->id) }}"
                                                class="btn btn-primary waves-effect waves-light btn-xs"><i
                                                    class="fas fa-edit"></i></a>
                                            <button data-value="{{ $project->id }}"
                                                class="btn btn-danger waves-effect waves-light btn-xs cdelete"><i
                                                    class="fas fa-trash"></i></button>
                                            <form id="deleteform{{ $project->id }}" method="post"
                                                action="{{ route('projects.destroy', $project->id) }}">
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
        </div>
    </div> <!-- end container-fluid -->
</div> <!-- end content -->
@endsection

@section('csscodes')
<link href="{{ asset('admin_assets') . '/libs/datatables/dataTables.bootstrap4.min.css' }}" rel="stylesheet">
<link href="{{ asset('admin_assets') . '/libs/datatables/responsive.bootstrap4.min.css' }}" rel="stylesheet">

<!-- Sweet Alert-->
<link href="{{ asset('admin_assets') . '/libs/sweetalert2/sweetalert2.min.css' }}" rel="stylesheet" type="text/css" />
@endsection

@section('jscodes')
<!-- Tables -->
<script src="{{ asset('admin_assets') . '/libs/datatables/jquery.dataTables.min.js' }}"></script>
<script src="{{ asset('admin_assets') . '/libs/datatables/dataTables.bootstrap4.min.js' }}"></script>

<script src="{{ asset('admin_assets') . '/libs/datatables/dataTables.responsive.min.js' }}"></script>
<script src="{{ asset('admin_assets') . '/libs/datatables/responsive.bootstrap4.min.js' }}"></script>

<!-- Sweet Alerts js -->
<script src="{{ asset('admin_assets') . '/libs/sweetalert2/sweetalert2.min.js' }}"></script>

<!-- Init js-->
<script src="{{ asset('admin_assets') . '/js/pages/datatables.init.js' }}"></script>
<script src="{{ asset('admin_assets') . '/js/pages/sweet-alerts.init.js' }}"></script>
<script>
    $('.cdelete').on('click', function() {
        var id = $(this).data('value');
        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#E73E08",
            cancelButtonColor: "#6c757d",
            confirmButtonText: "<span style='font-size: 14px;'>Yes, delete it!</span>",
            cancelButtonText: "<span style='font-size: 14px;'>Cancel</span>",
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
