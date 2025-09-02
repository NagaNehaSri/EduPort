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
                            <li class="breadcrumb-item">Spot Admissions</li>
                            <li class="breadcrumb-item active">Edit Spot Admissions</li>
                        </ol>
                    </div>
                    @section('page_title')
                    Edit Spot Admissions
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
                                <h4 class="page-title">Edit Spot Admissions</h4>
                            </div>
                        </div>
                        <hr>
                        <form id="form" method="post" action="{{ route('spot_admissions.update', [$data->id]) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="title" class="control-label">Title *</label>
                                        <input type="text" id="title" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ $data->title }}" />
                                        @error('title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="category_id" class="control-label">Category *</label>
                                        <select id="category_id" class="form-control @error('category_id') is-invalid @enderror" name="category_id">
                                            @php
                                            $categories = \App\Models\Category::all();
                                            @endphp
                                            @foreach ($categories as $category)
                                            <option value="{{ $category->id }}" {{ $category->id == old('category', $data->category_id) ? 'selected' : '' }}>
                                                {{ $category->name }}
                                            </option>
                                            @endforeach
                                        </select>
                                        @error('category_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="date" class="control-label">Date *</label>
                                        <input type="date" id="date" class="form-control @error('date') is-invalid @enderror" name="date" value="{{ $data->date }}" />
                                        @error('date')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="bottom_description" class="control-label">Spot Admissions view page Description *</label>
                                        <textarea id="bottom_description" class="form-control sun-editor @error('bottom_description') is-invalid @enderror" name="bottom_description">{{ $data->bottom_description }}</textarea>
                                        @error('bottom_description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="blog_page_short_description" class="control-label">Spot Admissions Page Short Description *</label>
                                        <textarea id="short_description" class="form-control mini-suneditor @error('short_description') is-invalid @enderror" name="short_description">{{ $data->short_description }}</textarea>
                                        @error('short_description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="hero_heading" class="control-label">Spot Admissions Page Hero Heading *</label>
                                        <input type="text" id="hero_heading" class="form-control @error('hero_heading') is-invalid @enderror" name="hero_heading" value="{{ $data->hero_heading }}" />
                                        @error('hero_heading')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="hero_description" class="control-label">Spot Admissions Page Hero Description *</label>
                                        <textarea id="hero_description" class="form-control sun-editor @error('hero_description') is-invalid @enderror" name="hero_description">{{ $data->hero_description }}</textarea>
                                        @error('hero_description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="hero_image">Spot Admissions Page Hero Image * :</label>
                                        <input type="file" class="dropify @error('hero_image') is-invalid @enderror" name="hero_image" id="hero_image" accept="image/jpg, image/jpeg, image/png, image/webp" data-default-file="{{ asset('uploads/spot_admissions/' . $data->hero_image) }}">
                                        @error('hero_image')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                        <div class="text-muted mt-1"><kbd>* Image size 380 x 334 pixels</kbd></div>

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="hero_heading_2" class="control-label">Spot Admissions View Page Hero Heading *</label>
                                        <input type="text" id="hero_heading_2" class="form-control @error('hero_heading_2') is-invalid @enderror" name="hero_heading_2" value="{{ $data->hero_heading_2 }}" />
                                        @error('hero_heading_2')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="hero_description_2" class="control-label">Spot Admissions View Page Hero Description *</label>
                                        <textarea id="hero_description_2" class="form-control sun-editor @error('hero_description_2') is-invalid @enderror" name="hero_description_2">{{ $data->hero_description_2 }}</textarea>
                                        @error('hero_description_2')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="hero_image_2">Spot Admissions View Page Hero Image * :</label>
                                        <input type="file" class="dropify @error('hero_image_2') is-invalid @enderror" name="hero_image_2" id="hero_image_2" accept="image/jpg, image/jpeg, image/png, image/webp" data-default-file="{{ asset('uploads/spot_admissions/' . $data->hero_image_2) }}">
                                        @error('hero_image_2')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                        <div class="text-muted mt-1"><kbd>* Image size 380 x 334 pixels</kbd></div>

                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="thumbnail_image">Thumbnail Image * :</label>
                                        <input type="file" class="dropify @error('thumbnail_image') is-invalid @enderror" name="thumbnail_image" id="thumbnail_image" accept="image/jpg, image/jpeg, image/png, image/webp" data-default-file="{{ asset('uploads/spot_admissions/' . $data->thumbnail_image) }}">
                                        @error('thumbnail_image')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                        <div class="text-muted mt-1"><kbd>* Image size 770 x 330 pixels</kbd></div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="view_image">View Image * :</label>
                                        <input type="file" class="dropify @error('view_image') is-invalid @enderror" name="view_image" id="view_image" accept="image/jpg, image/jpeg, image/png, image/webp" data-default-file="{{ asset('uploads/spot_admissions/' . $data->view_image) }}">
                                        @error('view_image')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                        <div class="text-muted mt-1"><kbd>* Image size 770 x 330 pixels</kbd></div>
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
        </div> <!-- end row -->
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