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
                            <li class="breadcrumb-item"><a href="{{ route('projects.index') }}">Projects</a></li>
                            <li class="breadcrumb-item active">Add Project</li>
                        </ol>
                    </div>
                    @section('page_title')
                    Add Project
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
                        <form action="{{ route('projects.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="homepageprojecttitle" class="control-label">Home Page Project Title *</label>
                                            <input type="text" id="homepageprojecttitle" class="form-control @error('homepageprojecttitle') is-invalid @enderror" name="homepageprojecttitle" value="{{ old('homepageprojecttitle') }}" />
                                            @error('homepageprojecttitle')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="homepageprojectheading" class="control-label">Home Page Project Heading *</label>
                                            <input type="text" id="homepageprojectheading" class="form-control @error('homepageprojectheading') is-invalid @enderror" name="homepageprojectheading" value="{{ old('homepageprojectheading') }}" />
                                            @error('homepageprojectheading')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="project_status" class="control-label">Project Status *</label>
                                            <select id="project_status" class="form-control @error('project_status') is-invalid @enderror" name="project_status">
                                                <option value="">Select Project Status</option>
                                                <option value="ongoing">Ongoing</option>
                                                <option value="upcoming">Upcoming</option>
                                            </select>
                                            @error('project_status')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="project_title" class="control-label">Project Title *</label>
                                            <input type="text" id="project_title" class="form-control @error('project_title') is-invalid @enderror" name="project_title" value="{{ old('project_title') }}" />
                                            @error('project_title')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="homepageprojectimage">Home Page Project Image * :</label>
                                            <input type="file" class="dropify @error('homepageprojectimage') is-invalid @enderror" name="homepageprojectimage" id="homepageprojectimage" accept="image/jpg, image/jpeg, image/png, image/webp">
                                            @error('homepageprojectimage')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                            <div class="text-muted mt-1"><kbd>* Image size 310 x 220 pixels</kbd></div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="project_image">Project Image * :</label>
                                            <input type="file" class="dropify @error('project_image') is-invalid @enderror" name="project_image" id="project_image" accept="image/jpg, image/jpeg, image/png, image/webp">
                                            @error('project_image')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                            <div class="text-muted mt-1"><kbd>* Image size 310 x 220 pixels</kbd></div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                <div class="form-group">
                                    <label for="project_view_page_about_description" class="control-label">Project View Page About Description *</label>
                                        name="project_view_page_about_description">{{ old('project_view_page_about_description') }}</textarea>
                                    @error('project_view_page_about_description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="project_view_page_description" class="control-label">Project View Page Description *</label>
                                    <textarea id="project_view_page_description" class="form-control sun-editor @error('project_view_page_description') is-invalid @enderror" name="project_view_page_description">{{ old('project_view_page_description') }}</textarea>
                                    @error('project_view_page_description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
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
                </div> <!-- end card -->
            </div> <!-- end col -->
        </div>
    </div> <!-- end container-fluid -->
</div> <!-- end content -->
@endsection

@section('csscodes')
<link href="{{ asset('admin_assets') . '/libs/dropify/dropify.min.css' }}" rel="stylesheet">
@endsection

@section('jscodes')
<!-- Plugins js -->
<script src="{{ asset('admin_assets') . '/libs/dropify/dropify.min.js' }}"></script>
<!-- Init js-->
<script src="{{ asset('admin_assets') . '/js/pages/form-fileuploads.init.js' }}"></script>
@endsection