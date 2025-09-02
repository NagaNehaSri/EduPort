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
                                <li class="breadcrumb-item"><a href="{{ route('home_page_enquiry.index') }}">Home Page Enquiry</a></li>
                                <li class="breadcrumb-item active">Edit Home Page Enquiry</li>
                            </ol>
                        </div>
                        @section('page_title')
                            Edit Home Page Enquiry
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
                                    <h4 class="page-title">Edit Home Page Enquiry</h4>
                                </div>
                            </div>
                            <hr>
                            <form id="form" method="post" action="{{ route('home_page_enquiry.update', [$data->id]) }}"
                                  enctype="multipart/form-data">@csrf
                                  @method('PUT')

                                <div class="row">
                                    

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="heading">Heading  * :</label>
                                            <textarea id="heading" class="form-control mini-suneditor @error('heading') is-invalid @enderror"
                                                name="heading">{{ $data->heading }}</textarea>
                                 
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
                                            <textarea id="short_description" class="form-control mini-suneditor @error('short_description') is-invalid @enderror"
                                                name="short_description">{{ $data->short_description }}</textarea>
                                            @error('short_description')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="video_text">video text   * :</label>
                                            <input type="text" class="form-control @error('video_text') is-invalid @enderror"
                                                   name="video_text" id="video_text" value="{{ $data->video_text }}"
                                                   autocomplete="off">
                                            @error('video_text')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="video_link">video_link  * :</label>
                                            <input type="text" class="form-control @error('video_link') is-invalid @enderror"
                                                   name="video_link" id="video_link" value="{{ $data->video_link }}"
                                                   autocomplete="off">
                                            @error('video_link')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
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

@endsection




