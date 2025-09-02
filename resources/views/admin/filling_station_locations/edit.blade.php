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
                                <li class="breadcrumb-item">Filling Station</li>
                                <li class="breadcrumb-item active">Edit Filling Station</li>
                            </ol>
                        </div>
                        @section('page_title')
                            Filling Station 
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
                                    <h4 class="page-title">Filling Station</h4>
                                </div>
                            </div>

                            <hr>
                            <form id="form" method="post"
                                action="{{ route('filling_station_locations.update', [$data->id]) }}"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="heading" class="control-label">State Location Name *</label>
                                            <input type="text" id="heading"
                                                class="form-control @error('heading') is-invalid @enderror" name="heading"
                                                value="{{ old('heading', $data->heading) }}">
                                            @error('heading')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="priority" class="control-label">Priority *</label>
                                            <input type="text" id="priority"
                                                class="form-control @error('priority') is-invalid @enderror" name="priority"
                                                value="{{ old('priority', $data->priority) }}">
                                            @error('priority')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group mt-3">
                                    <button type="submit" id="save" class="btn btn-success">
                                       Update
                                    </button>
                                </div>
                            </form>


                        </div>
                    </div>
                </div> <!-- end col -->
            </div>
            <!-- end row -->
        </div> <!-- end container-fluid -->
    </div> <!-- end content -->
@endsection
@section('csscodes')
    <link rel="stylesheet" href="{{ asset('admin_assets') . '/libs/dropify/dropify.min.css' }}">
@endsection
@section('jscodes')
    <!-- Plugins js -->
    <script src="{{ asset('admin_assets') . '/libs/dropify/dropify.min.js' }}"></script>

    <!-- Init js-->
    <script src="{{ asset('admin_assets') . '/js/pages/form-fileuploads.init.js' }}"></script>

@endsection