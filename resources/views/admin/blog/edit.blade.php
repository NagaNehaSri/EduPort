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
                            <li class="breadcrumb-item"><a href="{{ route('blog.index') }}">Blog</a></li>
                            <li class="breadcrumb-item active">Edit Blog</li>
                        </ol>
                    </div>
                    @section('page_title')
                    Blog
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
                                <h4 class="page-title">Blog</h4>
                            </div>
                        </div>
                        <hr>
                        <form id="form" method="post" action="{{ route('blog.update', [$data->id]) }}"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="row mb-1">

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="title" class="control-label">Title *</label>
                                        <input type="text" id="title"
                                            class="form-control @error('title') is-invalid @enderror" name="title"
                                            value="{{ $data->title }}" />
                                        @error('title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <!-- <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="category" class="control-label">Category *</label>
                                        <input type="text" id="category"
                                            class="form-control @error('category') is-invalid @enderror" name="category"
                                            value="{{ $data->category }}" />
                                        @error('category')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div> -->

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="date" class="control-label">Date *</label>
                                        <input type="date" id="date"
                                            class="form-control @error('date') is-invalid @enderror" name="date"
                                            value="{{ $data->date }}" />
                                        @error('date')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <!-- <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="blog_page_short_description" class="control-label">Blog Page Short Description *</label>
                                        <textarea id="blog_page_short_description" class="form-control mini-suneditor @error('blog_page_short_description') is-invalid @enderror" name="blog_page_short_description">{{ $data->blog_page_short_description }}</textarea>
                                        @error('blog_page_short_description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div> -->
                                

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="description" class="control-label">Hero Description *</label>
                                        <textarea id="description" class="form-control sun-editor @error('description') is-invalid @enderror"
                                            name="description">{{ $data->description }}</textarea>
                                        @error('description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="thumbnail_image">Thumbnail Image * :</label>
                                        <input type="file"
                                            class="dropify @error('thumbnail_image') is-invalid @enderror"
                                            name="thumbnail_image" id="thumbnail_image"
                                            accept="image/jpg, image/jpeg, image/png, image/webp" data-default-file="{{ asset('uploads') }}/blogs/{{ $data->thumbnail_image }}">
                                        @error('thumbnail_image')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                        <a href="{{ asset('uploads') }}/{{ $data->thumbnail_image }}" target="_blank"> → Thumbnail Image</a>
                                        <div class="text-muted mt-1"><kbd>* Image size 350 x 220 pixels</kbd></div>
                                        
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="header_image">Hero Image * :</label>
                                        <input type="file"
                                            class="dropify @error('header_image') is-invalid @enderror"
                                            name="header_image" id="header_image"
                                            accept="image/jpg, image/jpeg, image/png, image/webp" data-default-file="{{ asset('uploads') }}/blogs/{{ $data->header_image }}">
                                        @error('header_image')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                        <a href="{{ asset('uploads') }}/{{ $data->header_image }}" target="_blank"> → view image</a>
                                        <div class="text-muted mt-1"><kbd>* Image size 380 x 399 pixels</kbd></div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="view_image">View Image * :</label>
                                        <input type="file"
                                            class="dropify @error('view_image') is-invalid @enderror"
                                            name="view_image" id="view_image"
                                            accept="image/jpg, image/jpeg, image/png, image/webp" data-default-file="{{ asset('uploads') }}/blogs/{{ $data->view_image }}">
                                        @error('view_image')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                        <a href="{{ asset('uploads') }}/{{ $data->view_image }}" target="_blank"> → view image</a>
                                        <div class="text-muted mt-1"><kbd>* Image size 770 x 390 pixels</kbd></div>

                                    </div>
                                </div>
                                <!-- <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="view_image_2">View Image-2 * :</label>
                                        <input type="file"
                                            class="dropify @error('view_image_2') is-invalid @enderror"
                                            name="view_image_2" id="view_image_2"
                                            accept="image/jpg, image/jpeg, image/png, image/webp" data-default-file="{{ asset('uploads') }}/blogs/{{ $data->view_image_2 }}">
                                        @error('view_image_2')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                        <a href="{{ asset('uploads') }}/{{ $data->view_image_2 }}" target="_blank"> → view image</a>
                                    </div>
                                </div> -->
                                <!-- <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="status">Status * :</label>
                                        <select class="form-control @error('status') is-invalid @enderror" name="status"
                                                id="status">
                                            <option value="1" @if($data->status == 1) selected @endif>Active</option>
                                            <option value="0" @if($data->status == 0) selected @endif>Inactive</option>
                                        </select>
                                        @error('status')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div> -->
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="bottom_description" class="control-label">Description *</label>
                                        <textarea id="bottom_description" class="form-control sun-editor @error('bottom_description') is-invalid @enderror"
                                            name="bottom_description">{{ $data->bottom_description }}</textarea>
                                        @error('bottom_description')
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
<!-- <script src="https://cdn.ckeditor.com/4.18.0/full/ckeditor.js"></script>

<script>
    setTimeout(function() {
        const editors = document.getElementsByClassName("ckeditor-desc");
        for (let i = 0; i < editors.length; i++) {
            CKEDITOR.replace(editors[i]);
        }
    }, 50);
</script> -->
@endsection