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
                                <li class="breadcrumb-item"><a href="{{ route('portfolio.index') }}">Portfolio</a></li>
                                <li class="breadcrumb-item active">Edit Portfolio</li>
                            </ol>
                        </div>
                    @section('page_title')
                        Portfolio
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
                                <h4 class="page-title">Portfolio</h4>
                            </div>
                        </div>
                        <hr>
                        <form id="form" method="post" action="{{ route('portfolio.update', [$data->id]) }}"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="row mb-1">

                                <div class="col-md-12">
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

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="client" class="control-label">Client *</label>
                                        <input type="text" id="client"
                                            class="form-control @error('client') is-invalid @enderror" name="client"
                                            value="{{ $data->client }}" />
                                        @error('client')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="architect" class="control-label">Architect *</label>
                                        <input type="text" id="architect"
                                            class="form-control @error('architect') is-invalid @enderror"
                                            name="architect" value="{{ $data->architect }}" />
                                        @error('architect')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="location" class="control-label">Location *</label>
                                        <input type="text" id="location"
                                            class="form-control @error('location') is-invalid @enderror" name="location"
                                            value="{{ $data->location }}" />
                                        @error('location')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="category">Category*</label>
                                        <select class="form-control" id="category" name="category">
                                            <option value="">Select Category</option>
                                            @foreach($categories as $category)
                                                <option value="{{ $category->name }}" {{ $data->category == $category->name ? 'selected' : '' }}>{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="description" class="control-label">Description *</label>
                                        <textarea id="description" class="form-control ckeditor-desc @error('description') is-invalid @enderror"
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
                                            accept="image/jpg, image/jpeg, image/png, image/webp" data-default-file="{{ asset('uploads') }}/{{ $data->thumbnail_image }}">
                                        @error('thumbnail_image')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <a href="{{ asset('uploads') }}/{{ $data->thumbnail_image }}" target="_blank"> → view image</a>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="header_image">Header Image * :</label>
                                        <input type="file"
                                            class="dropify @error('header_image') is-invalid @enderror"
                                            name="header_image" id="header_image"
                                            accept="image/jpg, image/jpeg, image/png, image/webp" data-default-file="{{ asset('uploads') }}/{{ $data->header_image }}">
                                        @error('header_image')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <a href="{{ asset('uploads') }}/{{ $data->header_image }}" target="_blank"> → view image</a>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="view_image">View Image * :</label>
                                        <input type="file"
                                            class="dropify @error('view_image') is-invalid @enderror"
                                            name="view_image" id="view_image"
                                            accept="image/jpg, image/jpeg, image/png, image/webp" data-default-file="{{ asset('uploads') }}/{{ $data->view_image }}">
                                        @error('view_image')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <a href="{{ asset('uploads') }}/{{ $data->view_image }}" target="_blank"> → view image</a>
                                    </div>
                                </div>

                                <div class="col-md-12">
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
<script src="https://cdn.ckeditor.com/4.18.0/full/ckeditor.js"></script>

<script>
    setTimeout(function() {
        const editors = document.getElementsByClassName("ckeditor-desc");
        for (let i = 0; i < editors.length; i++) {
            CKEDITOR.replace(editors[i]);
        }
    }, 50);
</script>
@endsection
