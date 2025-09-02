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
                            <li class="breadcrumb-item"><a href="{{ route('product_feature.index') }}">Product Feature</a></li>
                            <li class="breadcrumb-item active">Edit Product Feature</li>
                        </ol>
                    </div>
                    @section('page_title')
                    Product Feature
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
                                <h4 class="page-title">Product</h4>
                            </div>
                        </div>
                        <hr>
                        <form id="form" method="post" action="{{ route('product_feature.update', [$data->id]) }}"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="feature_image">Feature Image * :</label>
                                    <input type="file"
                                        class="dropify @error('feature_image') is-invalid @enderror"
                                        name="feature_image" id="feature_image"
                                        accept="image/jpg, image/jpeg, image/png, image/webp"
                                        data-default-file="{{ asset('uploads/products/' . $data->feature_image) }}">
                                    @error('feature_image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    <a href="{{ asset('uploads/products/' . $data->feature_image) }}" target="_blank"> → view image</a>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="heading" class="control-label">Heading *</label>
                                    <textarea id="heading" class="form-control mini-suneditor @error('heading') is-invalid @enderror"
                                        name="heading">{{ $data->heading }}</textarea>
                                    @error('heading')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="short_description" class="control-label">Short Description *</label>
                                    <textarea id="short_description" class="form-control sun-editor @error('short_description') is-invalid @enderror" name="short_description">{{ $data->short_description }}</textarea>
                                    @error('short_description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="feature_description" class="control-label">Feature Description *</label>
                                    <textarea id="feature_description"
                                        class="form-control sun-editor @error('feature_description') is-invalid @enderror"
                                        name="feature_description">{{ old('feature_description', $data->feature_description) }}</textarea>
                                    @error('feature_description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                    </div>

                    <div class="form-group mb-0">
                        <input type="submit" name="submit" id="save" class="btn btn-success"
                            value="Update">
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