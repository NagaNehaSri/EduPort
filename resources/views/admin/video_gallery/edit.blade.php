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
                            <li class="breadcrumb-item"><a href="{{ route('gallery.index') }}">Video Gallery</a></li>
                            <li class="breadcrumb-item active">Edit video Gallery</li>
                        </ol>
                    </div>
                    @section('page_title')
                    Video Gallery
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
                                <h4 class="page-title">Video Gallery</h4>
                            </div>
                        </div>
                        <hr>
                        <form id="form" method="post" action="{{ route('video_gallery.update', [$data->id]) }}"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            


                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="video">Video * :</label>
                                        <input type="file" class="dropify @error('video') is-invalid @enderror" name="video"
                                            id="video" accept="video/mp4, video/mkv, video/avi,video/webm" data-default-file="{{ asset('uploads/video_gallery/'.$data->video) }}">
                                        @error('video')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                   
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="video-preview" class="control-label">Video Preview:</label>
                                        <video id="video-preview" width="300" controls>
                                            <source src="{{ asset('uploads/video_gallery/'.$data->video) }}" type="video/mp4">
                                            Your browser does not support the video tag.
                                        </video>
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