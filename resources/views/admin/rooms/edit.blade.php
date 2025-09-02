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
                                <li class="breadcrumb-item"><a href="{{ route('flat.index') }}">Flat</a></li>
                                <li class="breadcrumb-item active">Edit Room</li>
                            </ol>
                        </div>
                    @section('page_title')
                        Room
                    @endsection
                </div>
            </div>
        </div>
        <!-- end page title -->
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        @include('flash_msg')
                        <div class="row">
                            <div class="col-md-6">
                                <h4 class="page-title">Rooms</h4>
                            </div>
                        </div>
                        <hr>

                        {{-- @method('PUT') --}}


                        <form id="form" method="post" action="{{ route('room.store') }}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-1">

                                <input type="hidden" name="flat_id" value="{{ $data->id }}">

                                <input type="hidden" name="room_id" value="{{ isset($room) ? $room->id : '' }}">

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="room_number">Room number * :</label>
                                        <input type="text"
                                            class="form-control @error('room_number') is-invalid @enderror"
                                            name="room_number" id="room_number"
                                            value="{{ old('room_number', isset($room) ? $room->room_number : '') }}"
                                            autocomplete="off">

                                        @error('room_number')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="view">Room facing * :</label>
                                        <input type="text" class="form-control @error('view') is-invalid @enderror"
                                            name="view" id="view"
                                            value="{{ old('view', isset($room) ? $room->view : '') }}" autocomplete="off">
                                        @error('view')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="BHK">BHK * :</label>
                                        <input type="text" class="form-control @error('BHK') is-invalid @enderror"
                                            name="BHK" id="BHK"
                                            value="{{ old('BHK', isset($room) ? $room->BHK : '') }}" autocomplete="off">
                                        @error('BHK')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="sqft">sqft * :</label>
                                        <input type="text" class="form-control @error('sqft') is-invalid @enderror"
                                            name="sqft" id="sqft"
                                            value="{{ old('sqft', isset($room) ? $room->sqft : '') }}" autocomplete="off">
                                        @error('sqft')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="status">Status * :</label>
                                        <select class="form-control @error('status') is-invalid @enderror"
                                            name="status" id="status">
                                            <option value="1" selected>Available</option>
                                            <option value="0">No Available</option>
                                        </select>
                                        @error('status')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                            </div>
                            {{-- </div> --}}

                            <div class="form-group mb-0">
                                <input type="submit" name="submit" id="save" class="btn btn-success"
                                    value="{{ isset($room) ? 'Update Room' : 'Add Room' }}">
                            </div>
                            @if(isset($room))
    <a href="{{ route('room.edit', [ $data->id]) }}" class="btn btn-dark mt-1 waves-effect waves-light">Add New Room</a>
@endif

                        </form>
                        <div class="row mt-4">

                            <div class="col-md-12">
                                <div class="form-group">

                                    <div class="table-responsive">
                                        <table id="example" class="table table-striped table-bordered dt-responsive"
                                            style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                            <thead>
                                                <tr>
                                                    <th>S.No</th>
                                                    <th>Room Number</th>
                                                    <th>Room Facing</th>
                                                    <th>BHK</th>
                                                    <th>Sqft</th>
                                                    <th>Status</th>
                                                    <th>Action</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($rooms as $key => $data1)
                                                    <tr>
                                                        <td>{{ $key + 1 }}</td>
                                                        <td>{{ $data1->room_number }}</td>
                                                        <td>{{ $data1->view }}</td>
                                                        <td>{{ $data1->BHK }}</td>
                                                        <td>{{ $data1->sqft }}</td>
                                                        <td>
                                                            @if ($data1->status == '1')
                                                                <span
                                                                    class="badge badge-success">{{ 'Available' }}</span>
                                                            @endif
                                                            @if ($data1->status == '0')
                                                                <span
                                                                    class="badge badge-danger">{{ 'No Available' }}</span>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            <a href="{{ route('edit_room.edit', ['flat_id' => $data->id, 'room_id' => $data1->id]) }}"
                                                                class="btn btn-info waves-effect waves-light btn-xs">
                                                                <i class="fas fa-edit"></i>
                                                            </a>

                                                            <button data-value="{{ $data1->id }}"
                                                                class="btn btn-danger waves-effect waves-light btn-xs cdelete"><i
                                                                    class="fas fa-trash"></i></button>
                                                            <form id="deleteform{{ $data1->id }}" method="post"
                                                                action="{{ route('room.destroy', [$data1->id]) }}">
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
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- end col -->
        </div>
        <!-- end row -->
    </div> <!-- end container-fluid -->
</div> <!-- end content -->
@endsection

@section('csscodes')
<link href="{{ asset('admin_assets') . '/libs/datatables/dataTables.bootstrap4.min.css' }}" rel="stylesheet">
<link href="{{ asset('admin_assets') . '/libs/datatables/responsive.bootstrap4.min.css' }}" rel="stylesheet">

<!-- Sweet Alert-->
<link href="{{ asset('admin_assets') . '/libs/sweetalert2/sweetalert2.min.css' }}" rel="stylesheet"
    type="text/css" />
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
            showCancelButton: !0,
            confirmButtonColor: "#F7531F",
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
