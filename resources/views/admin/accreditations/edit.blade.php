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
                            <li class="breadcrumb-item">Accreditations</li>
                            <li class="breadcrumb-item active">Edit Accreditations</li>
                        </ol>
                    </div>
                    @section('page_title')
                    Accreditations
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
                        <div class="text-right mb-2">
                            <a href="{{route('accreditations_images.index', ['accreditations_id' => $data->id])}}" class="btn btn-dark waves-effect waves-light btn-xs">
                                <i class="fas fa-plus"></i> Add Accreditations Images
                            </a>
                            
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <h4 class="page-title">Social Intiatives</h4>
                            </div>
                        </div>
                        <hr>
                        <form id="form" method="post" action="{{ route('accreditations.update', [$data->id]) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                        
                            <div class="row">



                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="tag" class="control-label">Tag *</label>
                                            <input type="text" id="tag" class="form-control @error('tag') is-invalid @enderror" name="tag" value="{{ $data->tag }}" />
                                            @error('tag')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-7">
                                        <div class="form-group">
                                            <label for="heading" class="control-label">Heading 1*</label>
                                            <textarea id="heading" class="form-control mini-suneditor @error('heading') is-invalid @enderror" name="heading">{{ $data->heading }}</textarea>
                                            @error('heading')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="description" class="control-label">Description 1*</label>
                                            <textarea id="description" class="form-control sun-editor @error('description') is-invalid @enderror" name="description">{{ $data->description }}</textarea>
                                            @error('description')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="image" class="control-label">Image 1*</label>
                                            <input type="file" id="image" class="dropify @error('image') is-invalid @enderror" name="image" accept="image/jpg, image/jpeg, image/png, image/webp, image/gif" data-height="150" data-default-file="{{ asset('uploads/accreditations/' . $data->image) }}" />
                                            @error('image')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                            <div class="text-muted mt-1"><kbd>* Image size 380 x 318 pixels</kbd></div>
                                        </div>
                                    </div>





                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="description_2" class="control-label">Description 2 *</label>
                                            <textarea id="description_2" class="form-control sun-editor @error('description_2') is-invalid @enderror" name="description_2">{{ $data->description_2 }}</textarea>
                                            @error('description_2')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="image_2" class="control-label">Image 2 *</label>
                                            <input type="file" id="image_2" class="dropify @error('image_2') is-invalid @enderror" name="image_2" accept="image/jpg, image/jpeg, image/png, image/webp, image/gif" data-height="150" data-default-file="{{ asset('uploads/accreditations/' . $data->image_2) }}" />
                                            @error('image_2')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                            <div class="text-muted mt-1"><kbd>* Image size 230 x 230 pixels</kbd></div>
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