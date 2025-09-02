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
                            <li class="breadcrumb-item">Vision Mission</li>
                            <li class="breadcrumb-item active">Edit Vision Mission</li>
                        </ol>
                    </div>
                    @section('page_title')
                    Vision Mission
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
                                <h4 class="page-title">Vision Mission</h4>
                            </div>
                        </div>
                        <hr>
                        <form id="form" method="post" action="{{ route('vision_mission.update', [$data->id]) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <!-- <div class="text-right mb-2">
                                <a href="{{ route('vision_mission_spec.index') }}" class="btn btn-dark waves-effect waves-light btn-xs">
                                    <i class="fas fa-plus"></i> Add Vision Mission 
                                </a>
                            </div> -->





                            <div class="row">
                                <div class="col-md-7">
                                    <div class="form-group">
                                        <label for="heading" class="control-label">Heading *</label>
                                        <input id="heading"
                                            type="text"
                                            class="form-control mini-suneditor @error('heading') is-invalid @enderror"
                                            name="heading"
                                            value="{{ $data->heading }}">
                                        @error('heading')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-7">
                                    <div class="form-group">
                                        <label for="icon_name" class="control-label">Icon Name *</label>
                                        <input id="icon_name"
                                            type="text"
                                            class="form-control @error('icon_name') is-invalid @enderror"
                                            name="icon_name"
                                            value="{{ $data->icon_name }}">
                                        @error('icon_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>



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

                                <!-- <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="image" class="control-label">Image *</label>
                                        <input type="file" id="image" class="dropify @error('image') is-invalid @enderror" name="image" accept="image/jpg, image/jpeg, image/png, image/webp, image/svg+xml" data-height="150" data-default-file="{{ asset('uploads/about/' . $data->image) }}" />
                                        @error('image')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                        <div class="text-muted mt-1"><kbd>* Image size 380 x 309 pixels</kbd></div>
                                    </div>
                                </div>



                                <div class="col-md-7">
                                    <div class="form-group">
                                        <label for="vision_heading" class="control-label">Vision Heading *</label>
                                        <textarea id="vision_heading" class="form-control mini-suneditor @error('vision_heading') is-invalid @enderror" name="vision_heading">{{ $data->vision_heading }}</textarea>
                                        @error('vision_heading')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="vision_description" class="control-label">Vision Description *</label>
                                        <textarea id="vision_description" class="form-control sun-editor @error('vision_description') is-invalid @enderror" name="vision_description">{{ $data->vision_description }}</textarea>
                                        @error('vision_description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="vision_image" class="control-label">Vision Image *</label>
                                        <input type="file" id="vision_image" class="dropify @error('vision_image') is-invalid @enderror" name="vision_image" accept="image/jpg, image/jpeg, image/png, image/webp, image/svg+xml" data-height="150" data-default-file="{{ asset('uploads/about/' . $data->vision_image) }}" />
                                        @error('image')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                        <div class="text-muted mt-1"><kbd>* Image size 380 x 348 pixels</kbd></div>
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <div class="form-group">
                                        <label for="mission_heading" class="control-label">Mission Heading *</label>
                                        <textarea id="mission_heading" class="form-control mini-suneditor @error('mission_heading') is-invalid @enderror" name="mission_heading">{{ $data->mission_heading }}</textarea>
                                        @error('mission_heading')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="mission_description" class="control-label">Mission Description *</label>
                                        <textarea id="mission_description" class="form-control sun-editor @error('mission_description') is-invalid @enderror" name="mission_description">{{ $data->mission_description}}</textarea>
                                        @error('mission_description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="Mission_image" class="control-label">Mission Image *</label>
                                        <input type="file" id="mission_image" class="dropify @error('mission_image') is-invalid @enderror" name="mission_image" accept="image/jpg, image/jpeg, image/png, image/webp, image/svg+xml" data-height="150" data-default-file="{{ asset('uploads/about/' . $data->mission_image) }}" />
                                        @error('image')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                        <div class="text-muted mt-1"><kbd>* Image size 390 x 390 pixels</kbd></div>
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <div class="form-group">
                                        <label for="business_objective_heading" class="control-label">Business Objective Heading *</label>
                                        <textarea id="business_objective_heading" class="form-control mini-suneditor @error('business_objective_heading') is-invalid @enderror" name="business_objective_heading">{{ $data->business_objective_heading }}</textarea>
                                        @error('business_objective_heading')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group" style="margin-bottom: 20px;">
                                        <label for="business_objective_description_1" class="control-label">Business Objective Description 1 *</label>
                                        <textarea id="business_objective_description_1" class="form-control sun-editor @error('business_objective_description_1') is-invalid @enderror" name="business_objective_description_1">{{ $data->business_objective_description_1 }}</textarea>
                                        @error('business_objective_description_1')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="business_objective_description_2" class="control-label">Business Objective Description 2 *</label>
                                        <textarea id="business_objective_description_2" class="form-control sun-editor @error('business_objective_description_2') is-invalid @enderror" name="business_objective_description_2">{{ $data->business_objective_description_2 }}</textarea>
                                        @error('business_objective_description_2')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div> -->

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