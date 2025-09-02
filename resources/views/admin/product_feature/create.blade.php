@extends('admin.layouts.main')
@section('content')

<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('product_feature.index') }}">Product Feature</a></li>
                    <li class="breadcrumb-item active">Add Product Feature</li>
                </ol>
            </div>
            @section('page_title')
            Add Product Feature
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
                <h4 class="page-title">Add Product Feature</h4>
                <hr>
                <form action="{{ route('product_feature.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="feature_image">Feature Image * :</label>
                                    <input type="file" class="dropify @error('feature_image') is-invalid @enderror"
                                        name="feature_image" id="feature_image" accept="image/jpg, image/jpeg, image/png, image/webp">
                                    @error('feature_image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        
                            <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="heading" class="control-label">Heading *</label>
                                        <textarea id="heading" class="form-control mini-suneditor @error('heading') is-invalid @enderror"
                                            name="heading">{{ old('heading') }}</textarea>
                                        @error('heading')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="short_description" class="control-label">Short Description *</label>
                                    <textarea id="short_description" class="form-control sun-editor @error('short_description') is-invalid @enderror" name="short_description">{{ old('short_description') }}</textarea>
                                    @error('short_description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="feature_description" class="control-label">Feature Description *</label>
                                    <textarea id="feature_description"
                                        class="form-control sun-editor @error('feature_description') is-invalid @enderror"
                                        name="feature_description">{{ old('feature_description') }}</textarea>
                                    @error('feature_description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
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