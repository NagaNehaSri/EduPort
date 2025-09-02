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
                                <li class="breadcrumb-item"><a href="{{ route('youtube.index') }}">Youtube</a></li>
                                <li class="breadcrumb-item active">Edit Youtube Link</li>
                            </ol>
                        </div>
                        @section('page_title')
                            Youtube Link
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
                                    <h4 class="page-title">Youtube Link</h4>
                                </div>
                            </div>
                            <hr>
                            <form id="form" method="post" action="{{ route('youtube.update', [$data->id]) }}"
                                  enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="row mb-1">

                                    <div class="col-md-12">
                                        <form-group>
                                            <label for="youtube_link">Youtube Link</label>
                                            <input type="text" class="form-control @error('youtube_link') is-invalid @enderror" id="youtube_link" value="{{$data->youtube_link}}" name="youtube_link">
                                        </form-group>
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
        setTimeout(function() {
            const editors = document.getElementsByClassName("ckeditor-desc");
            for (let i = 0; i < editors.length; i++) {
                CKEDITOR.replace(editors[i]);
            }
        }, 50);
    </script>

@endsection

