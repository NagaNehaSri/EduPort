@extends('admin.layouts.main')
@section('content')

<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('blog_slider_image.index',['blog_id' => $blog_id]) }}">Blog Slider Images</a></li>
                    <li class="breadcrumb-item active">Add Blog Slider Images</li>
                </ol>
            </div>
            @section('page_title')
            Add Blog Slider Images
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
                <h4 class="page-title">Add Blog Slider Images</h4>
                <hr>
                <form action="{{ route('blog_slider_image.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <input type="hidden" name="blog_id" value="{{ $blog_id }}">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="blog_slider_image">Blog Slider Images * :</label>
                                    <input type="file" class="dropify @error('blog_slider_image') is-invalid @enderror" name="blog_slider_image" id="blog_slider_image" accept="image/jpg, image/jpeg, image/png, image/webp">
                                    @error('blog_slider_image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    <div class="text-muted mt-1"><kbd>* Image size 260 x 325 pixels</kbd></div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <button type="submit" class="btn btn-success waves-effect waves-light">Add</button>
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
