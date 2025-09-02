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
                                <li class="breadcrumb-item"><a href="{{ route('benefit.index') }}">Service</a></li>
                                <li class="breadcrumb-item active">Edit Service</li>
                            </ol>
                        </div>
                        @section('page_title')
                            Service
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
                                    <h4 class="page-title">Service</h4>
                                </div>
                            </div>
                            <hr>
                            <form id="form" method="post" action="{{ route('benefit.update', [$data->id]) }}"
                                  enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="row">

                                    
                                   
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="heading" class="control-label">Heading *</label>
                                            <input type="text" id="heading"
                                                class="form-control @error('heading') is-invalid @enderror" name="heading"
                                                value="{{ $data->heading }}" />
                                            @error('heading')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group no-margin">
                                            <label for="description" class="control-label">Description*</label>
                                            <textarea class="form-control autogrow @error('description') is-invalid @enderror" id="description" name="description"
                                                style="overflow: hidden; word-wrap: break-word; resize: horizontal; height: 104px;">{{ $data->description }}</textarea>
                                            @error('description')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="long_description" class="control-label">Long Description *</label>
                                            <textarea id="long_description" class="form-control ckeditor-desc @error('long_description') is-invalid @enderror"
                                                name="long_description">{{ $data->long_description }}</textarea>
                                            @error('long_description')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="image">Image * :</label>
                                            <input type="file" class="dropify @error('image') is-invalid @enderror" name="image"
                                                   id="image" accept="image/jpg, image/jpeg, image/png, image/svg+xml" data-default-file="{{ asset('uploads/benefits/'.$data->image) }}">
                                            @error('image')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="view_image">View Image * :</label>
                                            <input type="file"
                                                class="dropify @error('view_image') is-invalid @enderror"
                                                name="view_image" id="view_image"
                                                accept="image/jpg, image/jpeg, image/png, image/webp" data-default-file="{{ asset('uploads') }}/benefits/{{ $data->view_image }}">
                                            @error('view_image')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            <a href="{{ asset('uploads') }}/{{ $data->view_image }}" target="_blank"> → view image</a>
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
