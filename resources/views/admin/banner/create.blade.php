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
                            <li class="breadcrumb-item"><a href="{{ route('banner.index') }}">Banner</a></li>
                            <li class="breadcrumb-item active">Add Banner</li>
                        </ol>
                    </div>
                    @section('page_title')
                    Add Banner
                    @endsection
                </div>
            </div>
        </div>
        <!-- end page title -->
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <h4 class="page-title">Add Banner</h4>
                            </div>
                        </div>
                        <hr>
                        <form id="form" method="post" action="{{ route('banner.store') }}"
                            enctype="multipart/form-data">@csrf

                            <div class="row">

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="heading" class="control-label">Heading *</label>
                                        <textarea id="heading"
                                            class="form-control mini-suneditor @error('heading') is-invalid @enderror"
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
                                        <label for="priority">Priority * :</label>
                                        <input type="text" class="form-control @error('priority') is-invalid @enderror"
                                            name="priority" id="priority" value="{{ old('priority') }}"
                                            autocomplete="off">
                                        @error('priority')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <!-- <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="background_image">Background Image * :</label>
                                            <input type="file" class="dropify @error('background_image') is-invalid @enderror" name="background_image"
                                                   id="background_image" accept="image/jpg, image/jpeg, image/png">
                                            @error('background_image')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                            <div class="text-muted mt-1"><kbd>* Image size 1507 x 601 pixels</kbd></div>
                                       
                                        </div>
                                    </div> -->

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="description" class="control-label">Description *</label>
                                        <textarea id="description" class="form-control sun-editor @error('description') is-invalid @enderror"
                                            name="description"></textarea>
                                        @error('description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>



                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="image">Image * :</label>
                                        <input type="file" class="dropify @error('image') is-invalid @enderror" name="image"
                                            id="image" accept="image/jpg, image/jpeg, image/png">
                                        @error('image')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                        <div class="text-muted mt-1"><kbd>* Image size 655 x 521 pixels</kbd></div>
                                    </div>
                                </div>

                            </div>

                            <div class="form-group mb-0">
                                <input type="submit" name="submit" id="save" class="btn btn-success" value="Add">
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
<script>
    $('#save').on('click', function() {
        if ($('#image').val() == '') {
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