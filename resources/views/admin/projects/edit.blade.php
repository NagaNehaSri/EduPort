@extends('admin.layouts.main')
@section('content')

<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('service.index') }}">Service</a></li>
                    <li class="breadcrumb-item active">Add Service</li>
                </ol>
            </div>
            @section('page_title')
            Add Service
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
                <h4 class="page-title">Add Service</h4>
                <hr>

                <form action="{{ route('projects.update', [$data->id]) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="homepageprojecttitle" class="control-label">Home Page Project Title *</label>
                                    <input type="text" id="homepageprojecttitle" class="form-control @error('homepageprojecttitle') is-invalid @enderror" name="homepageprojecttitle" value="{{ $data->homepageprojecttitle }}" />
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
                                    <input type="text" id="homepageprojectheading" class="form-control @error('homepageprojectheading') is-invalid @enderror" name="homepageprojectheading" value="{{ $data->homepageprojectheading }}" />
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
                                        <option value="ongoing" {{ $data->project_status == 'ongoing' ? 'selected' : '' }}>Ongoing</option>
                                        <option value="upcoming" {{ $data->project_status == 'upcoming' ? 'selected' : '' }}>Upcoming</option>
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
                                    <input type="text" id="project_title" class="form-control @error('project_title') is-invalid @enderror" name="project_title" value="{{ $data->project_title }}" />
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
                                    <input type="file" class="dropify @error('homepageprojectimage') is-invalid @enderror" name="homepageprojectimage" id="homepageprojectimage" accept="image/jpg, image/jpeg, image/png, image/webp" data-default-file="{{ asset('uploads') }}/projects/{{ $data->homepageprojectimage }}">
                                    @error('homepageprojectimage')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    <div class="text-muted mt-1"><kbd>* Image size 310 x 220 pixels</kbd></div>
                                    <a href="{{ asset('uploads') }}/projects/{{ $data->homepageprojectimage }}" target="_blank">→ view image</a>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="project_image">Project Image * :</label>
                                    <input type="file" class="dropify @error('project_image') is-invalid @enderror" name="project_image" id="project_image" accept="image/jpg, image/jpeg, image/png, image/webp" data-default-file="{{ asset('uploads') }}/projects/{{ $data->project_image }}">
                                    @error('project_image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    <div class="text-muted mt-1"><kbd>* Image size 310 x 220 pixels</kbd></div>
                                    <a href="{{ asset('uploads') }}/projects/{{ $data->project_image }}" target="_blank">→ view image</a>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="project_view_page_about_description" class="control-label">Project View Page About Description *</label>
                                    <textarea id="project_view_page_about_description"
                                        class="form-control sun-editor @error('project_view_page_about_description') is-invalid @enderror"
                                        name="project_view_page_about_description">{{ old('project_view_page_about_description', $data->project_view_page_about_description) }}</textarea>
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
                                    <textarea id="project_view_page_description" class="form-control sun-editor @error('project_view_page_description') is-invalid @enderror" name="project_view_page_description">{{ $data->project_view_page_description }}</textarea>
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
                                <button type="submit" class="btn btn-success waves-effect waves-light">Update</button>
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