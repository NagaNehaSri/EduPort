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
                                <li class="breadcrumb-item"><a href="{{ route('flat.index') }}">Flat</a></li>
                                <li class="breadcrumb-item active">Edit Flat</li>
                            </ol>
                        </div>
                    @section('page_title')
                        Flat
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
                                <h4 class="page-title">Flat</h4>
                            </div>
                        </div>
                        <hr>
                        <form id="form" method="post" action="{{ route('flat.update', [$data->id]) }}"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="row mb-1">
                                
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="category">Under*</label>
                                        <select class="form-control" id="category" name="property_id">
                                            <option value="">Select Under</option>
                                            @foreach($categories as $category)
                                                <option value="{{ $category->id }}" {{ $data->property_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>


                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="property_name" class="control-label">Property Name *</label>
                                        <input type="text" id="property_name"
                                            class="form-control @error('property_name') is-invalid @enderror" name="property_name"
                                            value="{{ $data->property_name }}" />
                                        @error('property_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                               

                               
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="image">Image * :</label>
                                        <input type="file"
                                            class="dropify @error('image') is-invalid @enderror"
                                            name="image" id="image"
                                            accept="image/jpg, image/jpeg, image/png, image/webp" data-default-file="{{ asset('uploads') }}/flats/{{ $data->image }}">
                                        @error('image')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <a href="{{ asset('uploads') }}/flats.{{ $data->image }}" target="_blank"> → view image</a>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="image2">Image 2 * :</label>
                                        <input type="file"
                                            class="dropify @error('image2') is-invalid @enderror"
                                            name="image2" id="image2"
                                            accept="image/jpg, image/jpeg, image/png, image/webp" data-default-file="{{ asset('uploads') }}/flats/{{ $data->image2 }}">
                                        @error('image2')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <a href="{{ asset('uploads') }}/flats/{{ $data->image2 }}" target="_blank"> → view image</a>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="status">Status * :</label>
                                        <select class="form-control @error('status') is-invalid @enderror" name="status"
                                                id="status">
                                            <option value="1" @if($data->status == 1) selected @endif>Active</option>
                                            <option value="0" @if($data->status == 0) selected @endif>Inactive</option>
                                        </select>
                                        @error('status')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="form-group mb-0">
                                <input type="submit" name="submit" id="save" class="btn btn-success"
                                    value="Update">
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
<script src="https://cdn.ckeditor.com/4.18.0/full/ckeditor.js"></script>

<script>
    setTimeout(function() {
        const editors = document.getElementsByClassName("ckeditor-desc");
        for (let i = 0; i < editors.length; i++) {
            CKEDITOR.replace(editors[i]);
        }
    }, 50);
</script>
@endsection
