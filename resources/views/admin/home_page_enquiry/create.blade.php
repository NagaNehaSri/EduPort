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
                                <li class="breadcrumb-item active">Add Home Page Enquiry</li>
                            </ol>
                        </div>
                        @section('page_title')
                            Add Home Page Enquiry
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
                                    <h4 class="page-title">Add Home Page Enquiry</h4>
                                </div>
                            </div>
                            <hr>
                            <form id="form" method="post" action="{{ route('home_page_enquiry.store') }}"
                                  enctype="multipart/form-data">@csrf

                                <div class="row">
                                    

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="heading">Heading  * :</label>
                                            <textarea id="heading" class="form-control mini-suneditor @error('short_description') is-invalid @enderror"
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
                                            <textarea id="short_description" class="form-control mini-suneditor @error('short_description') is-invalid @enderror"
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
                                            <label for="video_text">video text   * :</label>
                                            <input type="text" class="form-control @error('video_text') is-invalid @enderror"
                                                   name="video_text" id="video_text" value="{{ old('video_text') }}"
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
                                                   name="video_link" id="video_link" value="{{ old('video_link') }}"
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
    <script>
        $('#save').on('click', function () {
            if ($('#image').val() == '') {
                alert('Please Select Image');
            }
        });
        $('#image').on('change', function () {
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




