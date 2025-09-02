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
                            <li class="breadcrumb-item"><a href="{{ route('vision_mission_spec.index') }}">Vison Mission specifications</a></li>
                            <li class="breadcrumb-item active">Vison Mission specifications</li>
                        </ol>
                    </div>
                    @section('page_title')
                    Vison Mission specifications
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
                                <h4 class="page-title">Vison Mission specifications</h4>
                            </div>
                        </div>
                        <hr>
                        <form id="form" method="post" action="{{ route('vision_mission_spec.update', [$data->id]) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="title" class="control-label">Title *</label>
                                        <input type="text" id="title" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ $data->title }}" />
                                        @error('title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="short_description" class="control-label">Short Description *</label>
                                        <textarea id="short_description" class="form-control mini-suneditor @error('short_description') is-invalid @enderror"
                                            name="short_description">{{ $data->short_description }}</textarea>
                                        @error('short_description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="image">Image * :</label>
                                        <input type="file" class="dropify @error('image') is-invalid @enderror" name="image"
                                            id="image" accept="image/jpg, image/jpeg, image/png, image/webp, image/svg+xml"
                                            data-default-file="{{ asset('uploads/vision_mission_spec/' . $data->image) }}">
                                        @error('image')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                        <div class="text-muted mt-1"><kbd>* Image size 60 x 60 pixels</kbd></div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group mb-0">
                                <input type="submit" name="submit" id="save" class="btn btn-success" value="Update">
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