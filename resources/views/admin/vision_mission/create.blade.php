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
                            <li class="breadcrumb-item">Vision Mission</li>
                            <li class="breadcrumb-item active">Edit Vision Mission</li>
                        </ol>
                    </div>
                    @section('page_title')
                    Vision Mission
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
                                <h4 class="page-title">Vision Mission</h4>
                            </div>
                        </div>
                        <hr>
                        <form id="form" method="post" action="{{ route('vision_mission.store') }}" enctype="multipart/form-data">
                            @csrf
                         
                            <!-- <div class="text-right mb-2">
                                <a href="{{ route('vision_mission_spec.index') }}" class="btn btn-dark waves-effect waves-light btn-xs">
                                    <i class="fas fa-plus"></i> Add Vision Mission Specifications
                                </a>
                            </div> -->





                            <div class="row">



                                <div class="col-md-7">
                                    <div class="form-group">
                                        <label for="heading" class="control-label">Heading *</label>
                                        <input id="heading"
                                            type="text"
                                            class="form-control @error('heading') is-invalid @enderror"
                                            name="heading"
                                            value="{{ old('heading') }}">
                                        @error('heading')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-7">
                                    <div class="form-group">
                                        <label for="icon_name" class="control-label">Icon Name *</label>
                                        <input id="icon_name"
                                            type="text"
                                            class="form-control @error('icon_name') is-invalid @enderror"
                                            name="icon_name"
                                            value="{{ old('icon_name') }}">
                                        @error('icon_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>




                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="description" class="control-label">Description *</label>
                                        <textarea id="description" class="form-control sun-editor @error('description') is-invalid @enderror" name="description">{{ old('description') }}</textarea>
                                        @error('description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
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

@endsection