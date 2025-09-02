@extends('admin.layouts.main')
@section('content')

<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('spot_admissions.index') }}">Spot Admissions</a></li>
                    <li class="breadcrumb-item active">Add Spot Admissions</li>
                </ol>
            </div>
            @section('page_title')
            Add Spot Admissions
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
                <h4 class="page-title">Add Spot Admissions</h4>
                <hr>
                <form action="{{ route('spot_admissions.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="title" class="control-label">Title *</label>
                                    <input type="text" id="title"
                                        class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" />
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
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('category')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>



                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="date" class="control-label">Date *</label>
                                    <input type="date" id="date"
                                        class="form-control @error('date') is-invalid @enderror" name="date" value="{{ old('date') }}" />
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
                                    <textarea id="bottom_description"
                                        class="form-control sun-editor @error('bottom_description') is-invalid @enderror" name="bottom_description">{{ old('bottom_description') }}</textarea>
                                    @error('bottom_description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="short_description" class="control-label">Spot Admissions Page Short Description *</label>
                                    <textarea id="short_description"
                                        class="form-control mini-suneditor @error('short_description') is-invalid @enderror"
                                        name="short_description">{{ old('short_description') }}</textarea>
                                    @error('short_description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="hero_heading" class="control-label">Spot Admissions Page Hero Heading *</label>
                                    <input type="text" id="hero_heading"
                                        class="form-control @error('hero_heading') is-invalid @enderror" name="hero_heading" value="{{ old('hero_heading') }}" />
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
                                    <textarea id="hero_description"
                                        class="form-control sun-editor @error('hero_description') is-invalid @enderror" name="hero_description">{{ old('hero_description') }}</textarea>
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
                                    <input type="file" class="dropify @error('hero_image') is-invalid @enderror" name="hero_image"
                                        id="hero_image" accept="image/jpg, image/jpeg, image/png, image/webp">
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
                                    <input type="text" id="hero_heading_2"
                                        class="form-control @error('hero_heading_2') is-invalid @enderror" name="hero_heading_2" value="{{ old('hero_heading_2') }}" />
                                    @error('hero_heading_2')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                             
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="hero_description_2" class="control-label">Spot Admissions Page Hero Description *</label>
                                    <textarea id="hero_description_2"
                                        class="form-control sun-editor @error('hero_description_2') is-invalid @enderror" name="hero_description_2">{{ old('hero_description_2') }}</textarea>
                                    @error('hero_description_2')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="hero_image_2">Spot Admissions Page Hero Image * :</label>
                                    <input type="file" class="dropify @error('hero_image_2') is-invalid @enderror" name="hero_image_2"
                                        id="hero_image_2" accept="image/jpg, image/jpeg, image/png, image/webp">
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
                                    <input type="file" class="dropify @error('thumbnail_image') is-invalid @enderror" name="thumbnail_image"
                                        id="thumbnail_image" accept="image/jpg, image/jpeg, image/png, image/webp">
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
                                    <input type="file" class="dropify @error('view_image') is-invalid @enderror" name="view_image"
                                        id="view_image" accept="image/jpg, image/jpeg, image/png, image/webp">
                                    @error('view_image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                      <div class="text-muted mt-1"><kbd>* Image size 770 x 330 pixels</kbd></div>
                                </div>
                            </div>






                        </div>
                        <div class="row">
                            <div class="col-12">
                                <button type="submit" class="btn btn-success waves-effect waves-light">Add
                                </button>
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
<!-- <script src="https://cdn.ckeditor.com/4.18.0/full/ckeditor.js"></script>

    <script>

        setTimeout(function () {
            const editors = document.getElementsByClassName("ckeditor-desc");
            for (let i = 0; i < editors.length; i++) {
                CKEDITOR.replace(editors[i]);
            }
        }, 50);
    </script> -->
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