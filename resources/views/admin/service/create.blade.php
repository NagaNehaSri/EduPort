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
                <form action="{{ route('service.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="row">



                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="service_name" class="control-label">Service Name *</label>
                                    <input type="text" id="product_name" class="form-control @error('service_name') is-invalid @enderror" name="service_name" value="{{ old('service_name') }}" />
                                    @error('service_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="priority" class="control-label">priority *</label>
                                    <input type="text" id="priority" class="form-control @error('priority') is-invalid @enderror" name="priority" value="{{ old('priority') }}" />
                                    @error('priority')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="service_page_short_description" class="control-label">Home Short Description*</label>
                                    <textarea id="service_page_short_description" class="form-control mini-suneditor @error('service_page_short_description') is-invalid @enderror" name="service_page_short_description"></textarea>
                                    @error('service_page_short_description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="thumbnail_image">Thumbnail Image * :</label>
                                    <input type="file" class="dropify @error('thumbnail_image') is-invalid @enderror" name="thumbnail_image" id="thumbnail_image" accept="image/jpg, image/jpeg, image/png, image/webp">
                                    @error('thumbnail_image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    <div class="text-muted mt-1"><kbd>* Image size 310 x 220 pixels</kbd></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="view_image">View Image * :</label>
                                    <input type="file" class="dropify @error('view_image') is-invalid @enderror" name="view_image" id="view_image" accept="image/jpg, image/jpeg, image/png, image/webp">
                                    @error('view_image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    <div class="text-muted mt-1"><kbd>* Image size 1110 x 376 pixels</kbd></div>
                                </div>
                            </div>
                            <!-- <div class="col-md-6">
                                <div class="form-group">
                                    <label for="icon_image">Icon Image * :</label>
                                    <input type="file" class="dropify @error('icon_image') is-invalid @enderror" name="icon_image" id="icon_image" accept="image/jpg, image/jpeg, image/png, image/webp">
                                    @error('icon_image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    <div class="text-muted mt-1"><kbd>* Image size 310 x 220 pixels</kbd></div>
                                </div>
                            </div> -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="heading_1" class="control-label">Heading *</label>
                                    <input type="text" id="heading_1" class="form-control @error('heading_1') is-invalid @enderror" name="heading_1" value="{{ old('heading_1')}}" />
                                    @error('heading_1')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="description_1" class="control-label">Service Description *</label>
                                    <textarea id="description" class="form-control sun-editor @error('description_1') is-invalid @enderror" name="description_1">{{ old('description_1') }}</textarea>
                                    @error('description_1')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <!-- <div class="col-md-7">
                                <div class="form-group">
                                    <label for="heading_3" class="control-label">Service Benefits Heading *</label>
                                    <input type="text" id="heading_3" class="form-control @error('heading_3') is-invalid @enderror" name="heading_3" value="{{ old('heading_3')}}" />
                                    @error('heading_3')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="col-md-7">
                                <div class="form-group">
                                    <label for="heading_2" class="control-label">Heading-3 *</label>
                                    <input type="text" id="heading_2" class="form-control @error('heading_2') is-invalid @enderror" name="heading_2" value="{{ old('heading_2')}}" />
                                    @error('heading_2')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="description_2" class="control-label">Service Description-3 *</label>
                                    <textarea id="description_2" class="form-control sun-editor @error('description_2') is-invalid @enderror" name="description_2">{{ old('description_2') }}</textarea>
                                    @error('description_2')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div> -->



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