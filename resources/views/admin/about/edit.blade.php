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
                            <li class="breadcrumb-item active">Edit About</li>
                        </ol>
                    </div>
                    @section('page_title')
                    About
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
                                <h4 class="page-title">About</h4>
                            </div>
                        </div>
                        <hr>
                        <form id="form" method="post" action="{{ route('about.update', [$data->id]) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <!-- <div class="form-group mb-0">
                                <a href="{{route('about_image_slider.index', ['about_id' => $data->id])}}" class="btn btn-dark waves-effect waves-light btn-xs">
                                    <i class="fas fa-plus"></i> Add About Slider Images
                                </a>
                            </div> -->
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

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="heading" class="control-label">About Heading *</label>
                                        <input type="text" id="heading" class="form-control @error('heading') is-invalid @enderror" 
                                               name="heading" value="{{ $data->heading }}" 
                                               placeholder="Enter the heading">
                                
                                        @error('heading')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                
                                


                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="aboutpage_description" class="control-label">About Description *</label>
                                        <textarea id="aboutpage_description" class="form-control sun-editor @error('aboutpage_description') is-invalid @enderror" name="aboutpage_description">{{ $data->aboutpage_description }}</textarea>
                                        @error('aboutpage_description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="aboutpage_image" class="control-label">About Image-1 *</label>
                                        <input type="file" id="aboutpage_image" class="dropify @error('aboutpage_image') is-invalid @enderror" name="aboutpage_image" accept="image/jpg, image/jpeg, image/png, image/webp, image/gif" data-height="150" data-default-file="{{ asset('uploads/about/' . $data->aboutpage_image) }}" />
                                        @error('aboutpage_image')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                        <div class="text-muted mt-1"><kbd>* Image size 380 x 352 pixels</kbd></div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="aboutpage_image_2" class="control-label">About Image-2 *</label>
                                        <input type="file" id="aboutpage_image_2" class="dropify @error('aboutpage_image_2') is-invalid @enderror" name="aboutpage_image_2" accept="image/jpg, image/jpeg, image/png, image/webp, image/gif" data-height="150" data-default-file="{{ asset('uploads/about/' . $data->aboutpage_image_2) }}" />
                                        @error('aboutpage_image_2')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                        <div class="text-muted mt-1"><kbd>* Image size 380 x 352 pixels</kbd></div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="aboutpage_image_3" class="control-label">About Image-3 *</label>
                                        <input type="file" id="aboutpage_image_3" class="dropify @error('aboutpage_image_3') is-invalid @enderror" name="aboutpage_image_3" accept="image/jpg, image/jpeg, image/png, image/webp, image/gif" data-height="150" data-default-file="{{ asset('uploads/about/' . $data->aboutpage_image_3) }}" />
                                        @error('aboutpage_image_3')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                        <div class="text-muted mt-1"><kbd>* Image size 380 x 352 pixels</kbd></div>
                                    </div>
                                </div>
                                <!-- <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="about_nexus" class="control-label">About Nexus *</label>
                                        <textarea id="about_nexus" class="form-control mini-suneditor @error('about_nexus') is-invalid @enderror" name="about_nexus">{{ $data->about_nexus }}</textarea>
                                  
                                        @error('about_nexus')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="experienceiconimage" class="control-label">
                                        Experience Icon Image *</label>
                                        <input type="file" id="experienceiconimage" class="dropify @error('experienceiconimage') is-invalid @enderror" name="experienceiconimage" accept="image/jpg, image/jpeg, image/png, image/webp, image/gif" data-height="150" data-default-file="{{ asset('uploads/about/' . $data->experienceiconimage) }}" />
                                        @error('vision_image')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                        <div class="text-muted mt-1"><kbd>* Image size 60 x 60 pixels</kbd></div>
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <div class="form-group">
                                        <label for="experience_text" class="control-label">Experience Text*</label>
                                        <textarea id="experience_text" class="form-control mini-suneditor @error('experience_text') is-invalid @enderror" name="experience_text">{{ $data->experience_text }}</textarea>
                                        @error('experience_text')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="about_nexus_description_1" class="control-label">About Nexus Description 1 *</label>
                                        <textarea id="about_nexus_description_1" class="form-control sun-editor @error('about_nexus_description_1') is-invalid @enderror" name="about_nexus_description_1">{{ $data->about_nexus_description_1}}</textarea>
                                        @error('about_nexus_description_1')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="about_nexus_description_2" class="control-label">About Nexus Description 2 *</label>
                                        <textarea id="about_nexus_description_2" class="form-control sun-editor @error('about_nexus_description_2') is-invalid @enderror" name="about_nexus_description_2">{{ $data->about_nexus_description_2}}</textarea>
                                        @error('about_nexus_description_2')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="about_nexus_image" class="control-label">About Nexus Image *</label>
                                        <input type="file" id="about_nexus_image" class="dropify @error('about_nexus_image') is-invalid @enderror" name="about_nexus_image" accept="image/jpg, image/jpeg, image/png, image/webp, image/gif" data-height="150" data-default-file="{{ asset('uploads/about/' . $data->about_nexus_image) }}" />
                                        @error('about_nexus_image')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                        <div class="text-muted mt-1"><kbd>* Image size 390 x 377 pixels</kbd></div>
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