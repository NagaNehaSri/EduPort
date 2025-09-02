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
                            <li class="breadcrumb-item"><a href="{{ route('product.index') }}">Product</a></li>
                            <li class="breadcrumb-item active">Edit Product</li>
                        </ol>
                    </div>
                    @section('page_title')
                    Product
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
                        <form id="form" method="post" action="{{ route('product.update', [$data->id]) }}"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')


                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="product_name" class="control-label">Product Name *</label>
                                    <input type="text" id="product_name"
                                        class="form-control @error('product_name') is-invalid @enderror" name="product_name"
                                        value="{{ $data->product_name }}" />
                                    @error('product_name')
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
                                        class="form-control @error('priority') is-invalid @enderror" name="priority" value="{{ $data->priority }}" />
                                    @error('priority')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="short_description" class="control-label">Home Page Description *</label>
                                    <textarea id="short_description" class="form-control sun-editor @error('short_description') is-invalid @enderror"
                                        name="short_description">{{ $data->short_description }}</textarea>
                                    @error('short_description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="thumbnail_image">Thumbnail Image * :</label>
                                    <input type="file"
                                        class="dropify @error('thumbnail_image') is-invalid @enderror"
                                        name="thumbnail_image" id="thumbnail_image"
                                        accept="image/jpg, image/jpeg, image/png, image/webp" data-default-file="{{ asset('uploads') }}/products/{{ $data->thumbnail_image }}">
                                    @error('thumbnail_image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    <div class="text-muted mt-1"><kbd>* Image size 310 x 220 pixels</kbd></div>
                                    <a href="{{ asset('uploads') }}/{{ $data->thumbnail_image }}" target="_blank"> → view image</a>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="view_image">View Image * :</label>
                                    <input type="file"
                                        class="dropify @error('view_image') is-invalid @enderror"
                                        name="view_image" id="view_image"
                                        accept="image/jpg, image/jpeg, image/png, image/webp" data-default-file="{{ asset('uploads') }}/products/{{ $data->view_image }}">
                                    @error('view_image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    <div class="text-muted mt-1"><kbd>* Image size 1110 x 376 pixels</kbd></div>
                                    <a href="{{ asset('uploads') }}/{{ $data->view_image }}" target="_blank"> → view image</a>
                                </div>
                            </div>

                        
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="description" class="control-label">Product Description *</label>
                                    <textarea id="description" class="form-control sun-editor @error('description') is-invalid @enderror"
                                        name="description">{{ $data->description }}</textarea>
                                    @error('description')
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