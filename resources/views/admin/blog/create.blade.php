@extends('admin.layouts.main')
@section('content')

<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('blog.index') }}">Blog</a></li>
                    <li class="breadcrumb-item active">Add Blog</li>
                </ol>
            </div>
            @section('page_title')
            Add Blog
            @endsection
        </div>
    </div>
    <!-- end page title -->
</div>

<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                @include('flash_msg')
                <h4 class="page-title">Add Blog</h4>
                <hr>
                <form action="{{ route('blog.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="title" class="control-label">Title *</label>
                                    <input type="text" id="title"
                                        class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" />
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
                                        class="form-control @error('category') is-invalid @enderror" name="category" value="{{ old('category') }}" />
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
                                        class="form-control @error('date') is-invalid @enderror" name="date" value="{{ old('date') }}" />
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
                                    <textarea id="blog_page_short_description"
                                        class="form-control mini-suneditor @error('blog_page_short_description') is-invalid @enderror"
                                        name="blog_page_short_description">{{ old('blog_page_short_description') }}</textarea>
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
                                    <textarea id="description"
                                        class="form-control sun-editor @error('description') is-invalid @enderror" name="description">{{ old('description') }}</textarea>
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
                                    <input type="file" class="dropify @error('thumbnail_image') is-invalid @enderror" name="thumbnail_image"
                                        id="thumbnail_image" accept="image/jpg, image/jpeg, image/png, image/webp">
                                    @error('thumbnail_image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="header_image">Hero Image * :</label>
                                    <input type="file" class="dropify @error('header_image') is-invalid @enderror" name="header_image"
                                        id="header_image" accept="image/jpg, image/jpeg, image/png, image/webp">
                                    @error('header_image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="view_image">View Image * :</label>
                                    <input type="file" class="dropify @error('view_image') is-invalid @enderror" name="view_image"
                                        id="view_image" accept="image/jpg, image/jpeg, image/png, image/webp">
                                    @error('view_image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <!-- <div class="col-md-4">
                                <div class="form-group">
                                    <label for="view_image_2">View Image-2 * :</label>
                                    <input type="file" class="dropify @error('view_image_2') is-invalid @enderror" name="view_image_2"
                                        id="view_image_2" accept="image/jpg, image/jpeg, image/png, image/webp">
                                    @error('view_image_2')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div> -->
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="bottom_description" class="control-label">Description *</label>
                                    <textarea id="bottom_description"
                                        class="form-control sun-editor @error('bottom_description') is-invalid @enderror" name="bottom_description">{{ old('bottom_description') }}</textarea>
                                    @error('bottom_description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>


                            <!-- <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="status">Status * :</label>
                                        <select class="form-control @error('status') is-invalid @enderror" name="status"
                                                id="status">
                                            <option value="1" selected>Active</option>
                                            <option value="0">Inactive</option>
                                        </select>
                                        @error('status')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div> -->

                        </div>
                        <div class="row">
                            <div class="col-12">
                                <button type="submit" class="btn btn-success waves-effect waves-light">Add
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
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

        setTimeout(function () {
            const editors = document.getElementsByClassName("ckeditor-desc");
            for (let i = 0; i < editors.length; i++) {
                CKEDITOR.replace(editors[i]);
            }
        }, 50);
    </script> -->
<script>
    $('#save').on('click', function() {
        if ($('#image').val() === '') {
            alert('Please Select Image');
        }
    });
    $('#image').on('change', function() {
        var numb = $(this)[0].files[0].size / 1024 / 1024;
        numb = numb.toFixed(2);
        if (numb > 2) {
            //            $('#image').val('');
            alert('too big, maximum is 2MB. Your file size is: ' + numb + ' MB');
            $(':input[type="submit"]').prop('disabled', true);
        } else {
            $(':input[type="submit"]').prop('disabled', false);
        }
    });
</script>
@endsection