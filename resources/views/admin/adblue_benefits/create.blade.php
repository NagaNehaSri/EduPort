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
                                <li class="breadcrumb-item"><a href="{{ route('adblue_benefits.index') }}">Adblue
                                        Benefits</a></li>
                                <li class="breadcrumb-item active">Add Adblue Benefits</li>
                            </ol>
                        </div>
                        @section('page_title')
                            Add Adblue Benefits
                        @endsection
                    </div>
                </div>
            </div>
            <!-- end page title -->
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <h4 class="page-title">Add Adblue Benefits</h4>
                                </div>
                            </div>
                            <hr>
                            <form id="form" method="post" action="{{ route('adblue_benefits.store') }}"
                                enctype="multipart/form-data">@csrf

                                <div class="row">
                                    {{-- <input type="hidden" name="studyabroad_id" value="{{$studyabroad_id}}"> --}}
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="name" class="control-label">Title *</label>
                                            <input type="text" id="name"
                                                class="form-control @error('name') is-invalid @enderror" name="name"
                                                value="{{ old('name') }}" />
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>


                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="description" class="control-label">Short Description *</label>
                                            <textarea id="description"
                                                class="form-control mini-suneditor @error('description') is-invalid @enderror"
                                                name="description">{{ old('description') }}</textarea>
                                            @error('description')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="icon_name" class="control-label">Icon Name *</label>
                                            <input type="text" id="icon_name"
                                                class="form-control @error('icon_name') is-invalid @enderror" name="icon_name"
                                                value="{{ old('icon_name') }}" />
                                            @error('icon_name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    {{-- <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="image">Image * :</label>
                                            <input type="file" class="dropify @error('image') is-invalid @enderror"
                                                name="image" id="image" accept="image/jpg, image/jpeg, image/png">
                                            @error('image')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                            <div class="text-muted mt-1"><kbd>* Image size 370 x 370 pixels</kbd></div>
                                        </div>
                                    </div> --}}






                                </div>

                                <div class="form-group mb-0">
                                    <input type="submit" name="submit" id="save" class="btn btn-success" value="Add">
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