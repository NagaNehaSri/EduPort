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
                                <li class="breadcrumb-item"><a href="{{ route('management.index') }}">Management</a></li>
                                <li class="breadcrumb-item active">Edit Management</li>
                            </ol>
                        </div>
                        @section('page_title')
                            Management
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
                                    <h4 class="page-title">Management</h4>
                                </div>
                            </div>
                            <hr>
                            <form id="form" method="post" action="{{ route('management.update', [$data->id]) }}"
                                  enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="row">

                                    
                                  
    
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="name" class="control-label">Name *</label>
                                            <input type="text" id="name"
                                                class="form-control @error('name') is-invalid @enderror" name="name"
                                                value="{{ $data->name }}" />
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="designation">Designation  * :</label>
                                            <input type="text" class="form-control @error('designation') is-invalid @enderror"
                                                   name="designation" id="designation"                                                   autocomplete="off" value="{{ $data->designation }}">
                                            @error('designation')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group no-margin">
                                            <label for="review" class="control-label">Review*</label>
                                            <textarea class="form-control ckeditor-desc autogrow @error('review') is-invalid @enderror" id="review" name="review"
                                                style="overflow: hidden; word-wrap: break-word; resize: horizontal; height: 104px;">{{ $data->review }}</textarea>
                                            @error('review')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="profile_image">Profile Image * :</label>
                                            <input type="file" class="dropify @error('profile_image') is-invalid @enderror" name="profile_image"
                                                   id="profile_image" accept="image/jpg, image/jpeg, image/png,image/webp" data-default-file="{{ asset('uploads/management/'.$data->profile_image) }}">
                                            @error('profile_image')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                            <span class="font-13 text-muted">* Image size <code>width : 170px</code> x <code>height : 170px</code></span>
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

    <script src="https://cdn.ckeditor.com/4.18.0/full/ckeditor.js"></script>

    <script>

        setTimeout(function () {
            const editors = document.getElementsByClassName("ckeditor-desc");
            for (let i = 0; i < editors.length; i++) {
                CKEDITOR.replace(editors[i]);
            }
        }, 50);
    </script>

@endsection
