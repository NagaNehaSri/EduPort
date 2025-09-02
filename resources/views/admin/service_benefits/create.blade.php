@extends('admin.layouts.main')
@section('content')

    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('service_feature.index',['service_id' => $service_id]) }}">Service Benefits</a></li>
                        <li class="breadcrumb-item active">Add Service Benefits</li>
                    </ol>
                </div>
                @section('page_title')
                    Add Service Benefits
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
                    <h4 class="page-title">Add Service Benefits</h4>
                    <hr>
                    <form action="{{ route('service_benefits.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <div class="row">

                                <input type="hidden" name="service_id" value="{{$service_id}}">

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="heading" class="control-label">Service Benefit name *</label>
                                        <input type="text" id="heading"
                                               class="form-control @error('heading') is-invalid @enderror" name="heading" value="{{ old('heading') }}"/>
                                        @error('heading')
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
   
    <!-- <script>
        $('#save').on('click', function () {
            if ($('#image').val() === '') {
                alert('Please Select Image');
            }
        });
        $('#image').on('change', function () {
            var numb = $(this)[0].files[0].size / 1024 / 1024;
            numb = numb.toFixed(2);
            if (numb > 2) {
                alert('too big, maximum is 2MB. Your file size is: ' + numb + ' MB');
                $(':input[type="submit"]').prop('disabled', true);
            } else {
                $(':input[type="submit"]').prop('disabled', false);
            }
        });
    </script> -->
@endsection

