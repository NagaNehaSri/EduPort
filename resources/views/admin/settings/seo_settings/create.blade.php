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
                                <li class="breadcrumb-item"><a href="{{ route('seo-settings.index') }}">SEO Settings</a></li>
                                <li class="breadcrumb-item active">Create SEO Page</li>
                            </ol>
                        </div>
                    @section('page_title')
                        Create SEO Page
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
                                <h4 class="page-title">Create SEO Page</h4>
                            </div>
                        </div>
                        <hr>
                        <form id="form" method="post" action="{{ route('seo-settings.store') }}"
                            enctype="multipart/form-data">@csrf

                            <div class="model-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="fullname">Page Name * :</label>
                                            <input type="text"
                                                class="form-control @error('page_name') is-invalid @enderror"
                                                name="page_name" id="page_name"
                                                autocomplete="off">
                                            @error('page_name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="fullname">Title * :</label>
                                            <input type="text"
                                                class="form-control @error('title') is-invalid @enderror" name="title"
                                                id="title" autocomplete="off">
                                            @error('title')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="fullname">Keywords * :</label>
                                            <input type="text"
                                                class="form-control @error('keywords') is-invalid @enderror"
                                                name="keywords" id="keywords"
                                                autocomplete="off" data-role="tagsinput">
                                            @error('keywords')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            <small class="text-muted pt-3">After typing one keyword please press
                                                <kbd>Enter</kbd> Key</small>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="fullname">Description * :</label>
                                            <textarea name="description" id="description" class="form-control"></textarea>
                                            @error('description')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="og_title">OG Title:</label>
                                            <input type="text"
                                                class="form-control @error('og_title') is-invalid @enderror"
                                                name="og_title" id="og_title"
                                                autocomplete="off">
                                            @error('og_title')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            <small class="text-mute">for Social Media Share</small>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="twitter_title">Twitter Title:</label>
                                            <input type="text"
                                                class="form-control @error('twitter_title') is-invalid @enderror"
                                                name="twitter_title" id="twitter_title"
                                                autocomplete="off">
                                            @error('twitter_title')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            <small class="text-mute">for Twitter Share</small>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="og_description">OG Description:</label>
                                            <textarea name="og_description" id="og_description" class="form-control"></textarea>
                                            @error('og_description')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            <small class="text-mute">for Social Media Share</small>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="twitter_description">Twitter Description:</label>
                                            <textarea name="twitter_description" id="twitter_description" class="form-control"></textarea>
                                            @error('twitter_description')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            <small class="text-mute">for Twitter Share</small>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="og_image" class="control-label">OG Image</label>
                                            <input type="file" id="og_image"
                                                class="dropify @error('og_image') is-invalid @enderror"
                                                name="og_image" data-height="150"/>
                                            @error('og_image')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            <small class="text-mute">for Social Media Share (Promotional Image)</small>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="twitter_image" class="control-label">Twitter Image</label>
                                            <input type="file" id="twitter_image"
                                                class="dropify @error('twitter_image') is-invalid @enderror"
                                                name="twitter_image" data-height="150"/>
                                            @error('twitter_image')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            <small class="text-mute">for Twitter Share (Promotional Image)</small>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group mb-0">
                                <input type="submit" name="submit" id="save" class="btn btn-success"
                                    value="Create">
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
<link href="{{ asset('admin_assets') . '/libs/bootstrap-tagsinput/bootstrap-tagsinput.css' }}" rel="stylesheet" />
<link rel="stylesheet" href="{{ asset('admin_assets') . '/libs/dropify/dropify.min.css' }}">
@endsection
@section('jscodes')
<script src="{{ asset('admin_assets') . '/libs/bootstrap-tagsinput/bootstrap-tagsinput.min.js' }}"></script>
<script src="{{ asset('admin_assets') . '/js/pages/form-advanced.init.js' }}"></script>
<script src="{{ asset('admin_assets') . '/libs/dropify/dropify.min.js' }}"></script>
<script src="{{ asset('admin_assets') . '/js/pages/form-fileuploads.init.js' }}"></script>
@endsection
