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
                            <li class="breadcrumb-item">About</li>
                            <li class="breadcrumb-item active">Edit Home About</li>
                        </ol>
                    </div>
                    @section('page_title')
                    Home About
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
                                <h4 class="page-title">Home About</h4>
                            </div>
                        </div>
                        <hr>
                        <form id="form" method="post" action="{{ route('home_about.update', [$data->id]) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group mb-0 text-right">
                                <a href="{{ route('highlight.index') }}"
                                    class="btn btn-dark waves-effect waves-light btn-xs">
                                    <i class="fas fa-plus"></i> Add Home About highlights
                                </a>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="image1" class="control-label">Home About Image *</label>
                                        <input type="file" id="image1" class="dropify @error('image1') is-invalid @enderror" name="image1" data-height="150" data-default-file="{{ asset('/uploads/home_about/' . $data->image1) }}" />
                                        @error('image1')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                        <div class="text-muted mt-1"><kbd>* Image size 570 x 367 pixels</kbd></div>
                                    </div>
                                </div>

                                <!-- <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="image2" class="control-label">Home About Image-2 *</label>
                                        <input type="file" id="image2" class="dropify @error('image2') is-invalid @enderror" name="image2" data-height="150" data-default-file="{{ asset('/uploads/home_about/' . $data->image2) }}" />
                                        @error('image2')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                        <div class="text-muted mt-1"><kbd>* Image size 290 x 420 pixels</kbd></div>
                                    </div>
                                </div> -->
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="heading" class="control-label">Heading *</label>
                                        <input type="text" id="heading" class="form-control @error('heading') is-invalid @enderror" 
                                               name="heading" value="{{ $data->heading }}" required>
                                
                                        @error('heading')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                
                                <!-- <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="short_description" class="control-label">Short Description *</label>
                                        <textarea id="short_description" class="form-control sun-editor @error('short_description') is-invalid @enderror" name="short_description">{{ $data->short_description }}</textarea>
                                        @error('short_description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div> -->


                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="description" class="control-label">Description *</label>
                                        <textarea id="description" class="form-control sun-editor @error('description') is-invalid @enderror" name="description">{{ $data->description }}</textarea>
                                        @error('description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <!-- <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="count">Count * :</label>
                                        <input type="text" class="form-control @error('count') is-invalid @enderror"
                                            name="count" id="count" value="{{ $data->count}}"
                                            autocomplete="off">
                                        @error('heading')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="count_heading">Count Heading * :</label>
                                        <input type="text" class="form-control @error('count_heading') is-invalid @enderror"
                                            name="count_heading" id="count_heading" value="{{ $data->count_heading }}"
                                            autocomplete="off">
                                        @error('count_heading')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div> -->



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