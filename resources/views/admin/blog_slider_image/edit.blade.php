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
                            <li class="breadcrumb-item"><a href="{{ route('blog_slider_image.index') }}">Blog Slider About</a></li>
                            <li class="breadcrumb-item active">Edit Blog Slider Images</li>
                        </ol>
                    </div>
                    @section('page_title')
                    Blog Slider About
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
                                <h4 class="page-title">Blog Slider About</h4>
                            </div>
                        </div>
                        
                        <form id="form" method="post" action="{{ route('blog_slider_image.update', [$data->id]) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row mb-1">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="blog_slider_image">Blog Slider Image * :</label>
                                        <input type="file"
                                            class="dropify @error('blog_slider_image') is-invalid @enderror"
                                            name="blog_slider_image" id="blog_slider_image"
                                            accept="image/jpg, image/jpeg, image/png, image/webp"
                                            data-default-file="{{ asset('uploads/blog_slider_image/' . $data->blog_slider_image) }}">
                                        @error('blog_slider_image')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-0">
                                        <input type="submit" name="submit" id="save" class="btn btn-success" value="Update">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->
    </div> <!-- end container-fluid -->
</div> <!-- end content -->
@endsection

@section('csscodes')
<link rel="stylesheet" href="{{ asset('admin_assets/libs/dropify/dropify.min.css') }}">
@endsection

@section('jscodes')
<!-- Plugins js -->
<script src="{{ asset('admin_assets/libs/dropify/dropify.min.js') }}"></script>
<!-- Init js-->
<script>
    $(document).ready(function() {
        // Initialize Dropify
        $('.dropify').dropify();

        // Image validation
        $('#save').on('click', function() {
            if ($('#blog_slider_image').val() === '') {
                alert('Please Select Image');
            }
        });

        $('#blog_slider_image').on('change', function() {
            var numb = $(this)[0].files[0].size / 1024 / 1024;
            numb = numb.toFixed(2);
            if (numb > 2) {
                alert('Too big, maximum is 2MB. Your file size is: ' + numb + ' MB');
                $(':input[type="submit"]').prop('disabled', true);
            } else {
                $(':input[type="submit"]').prop('disabled', false);
            }
        });
    });
</script>
@endsection
