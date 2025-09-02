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
                                <li class="breadcrumb-item"><a href="{{ route('filling_station_location_names.index',['filling_station_id' => $filling_station_id]) }}">Filling Station Location Names</a></li>
                                <li class="breadcrumb-item active">Add Filling Station Location Names</li>
                            </ol>
                        </div>
                    @section('page_title')
                            Add Filling Station Location Names
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
                                    <h4 class="page-title">Add Filling Station Location Names</h4>
                                </div>
                            </div>
                            <hr>
                            <form id="form" method="post" action="{{ route('filling_station_location_names.store') }}" enctype="multipart/form-data">
                                @csrf
                            
                                <div class="row">
                                    <!-- Hidden Field for Filling Station ID -->
                                    <input type="hidden" name="filling_station_id" value="{{ $filling_station_id }}">
                            
                                    <!-- Location Name Field -->
                                    <div class="col-md-12 mb-3">
                                        <div class="form-group">
                                            <label for="title" class="control-label">Location Name *</label>
                                            <input type="text" id="title" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}">
                                            @error('title')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                            
                                    <!-- Location Link Field -->
                                    <div class="col-md-12 mb-3">
                                        <div class="form-group">
                                            <label for="short_description" class="control-label">Location Link *</label>
                                            <input type="text" id="short_description" class="form-control @error('short_description') is-invalid @enderror" name="short_description" value="{{ old('short_description') }}">
                                            @error('short_description')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                            
                                    <!-- Priority Field -->
                                    <div class="col-md-12 mb-3">
                                        <div class="form-group">
                                            <label for="priority" class="control-label">Priority *</label>
                                            <input type="text" id="priority" class="form-control @error('priority') is-invalid @enderror" name="priority" value="{{ old('priority') }}">
                                            @error('priority')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            
                                <!-- Submit Button -->
                                <div class="form-group mt-4">
                                    <button type="submit" id="save" class="btn btn-success">
                                        <i class="fas fa-plus"></i> Add
                                    </button>
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