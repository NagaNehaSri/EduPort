@extends('admin.layouts.main')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Site Settings</li>
                </ol>
            </div>
            @section('page_title')
            Site Settings
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
                <h4 class="page-title">Site Settings</h4>
                <hr>
                <form action="{{ route('site-settings.update', $data->id) }}" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="site_name" class="control-label">Site Name *</label>
                                    <input type="text" class="form-control @error('site_name') is-invalid @enderror"
                                        id="site_name" name="site_name" autocomplete="off"
                                        value="{{ $data->site_name }}">
                                    @error('site_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
    <div class="form-group">
        <label class="control-label d-block">Use Site Name as Logo or Site Image? *</label>
        
        <div class="form-check form-check-inline">
            <input class="form-check-input @error('site_name_option') is-invalid @enderror" 
                   type="radio" 
                   name="site_name_option" 
                   id="site_name_yes" 
                   value="yes" 
                   {{ old('site_name_option', $data->site_name_option) == 'yes' ? 'checked' : '' }}>
            <label class="form-check-label" for="site_name_yes">Name</label>
        </div>
        
        <div class="form-check form-check-inline">
            <input class="form-check-input @error('site_name_option') is-invalid @enderror" 
                   type="radio" 
                   name="site_name_option" 
                   id="site_name_no" 
                   value="no" 
                   {{ old('site_name_option', $data->site_name_option) == 'no' ? 'checked' : '' }}>
            <label class="form-check-label" for="site_name_no">Image</label>
        </div>

        @error('site_name_option')
        <span class="invalid-feedback d-block" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>


                            <div class="col-md-6">
                                <div class="form-group no-margin">
                                    <label for="description" class="control-label">Description*</label>
                                    <textarea class="form-control autogrow sun-editor @error('description') is-invalid @enderror" id="description" name="description"
                                        style="overflow: hidden; word-wrap: break-word; resize: horizontal; height: 104px;">{{ $data->description }}</textarea>

                                    @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group no-margin">
                                    <label for="address" class="control-label">Address*</label>
                                    <textarea class="form-control autogrow @error('address') is-invalid @enderror" id="address" name="address"
                                        style="overflow: hidden; word-wrap: break-word; resize: horizontal; height: 104px;">{{ $data->address }}</textarea>
                                    @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email" class="control-label">Email *</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror"
                                        id="email" name="email" autocomplete="off" value="{{ $data->email }}">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="mobile" class="control-label">Mobile Number *</label>
                                    <input type="text"
                                        class="form-control @error('mobile') is-invalid @enderror"
                                        id="mobile" name="mobile" autocomplete="off"
                                        value="{{ $data->mobile }}" maxlength="20">
                                    @error('mobile')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email2" class="control-label">Email 2 *</label>
                                    <input type="email2" class="form-control @error('email2') is-invalid @enderror"
                                        id="email2" name="email2" autocomplete="off" value="{{ $data->email2 }}">
                                    @error('email2')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="mobile2" class="control-label">Hotline *</label>
                                    <input type="text"
                                        class="form-control @error('mobile2') is-invalid @enderror"
                                        id="mobile2" name="mobile2" autocomplete="off"
                                        value="{{ $data->mobile2 }}" maxlength="20">
                                    @error('mobile2')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>



                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="logo" class="control-label">Logo *</label>
                                    <input type="file" id="logo"
                                        class="dropify @error('logo') is-invalid @enderror" name="logo"
                                        data-height="150"
                                        data-default-file="{{ asset('site_settings') . '/' . $data->logo }}" />
                                    @error('logo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>



                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="favicon" class="control-label">Favicon *</label>
                                    <input type="file" id="favicon"
                                        class="dropify @error('favicon') is-invalid @enderror" name="favicon"
                                        data-height="150"
                                        data-default-file="{{ asset('site_settings') . '/' . $data->favicon }}" />
                                    @error('favicon')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="footer_logo" class="control-label">Footer logo *</label>
                                    <input type="file" id="footer_logo"
                                        class="dropify @error('footer_logo') is-invalid @enderror" name="footer_logo"
                                        data-height="150"
                                        data-default-file="{{ asset('site_settings') . '/' . $data->footer_logo}}" />
                                    @error('footer_logo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    <div class="text-muted mt-1"><kbd>* Image size 164 x 448 pixels</kbd></div>
                                </div>
                            </div>
                            <!-- <div class="col-md-4">
                                <div class="form-group">
                                    <label for="home_page_banner" class="control-label">Home Page Banner Image *</label>
                                    <input type="file" id="home_page_banner"
                                        class="dropify @error('home_page_banner') is-invalid @enderror" name="home_page_banner"
                                        data-height="150"
                                        data-default-file="{{ asset('site_settings') . '/' . $data->home_page_banner}}" />
                                    @error('home_page_banner')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    <div class="text-muted mt-1"><kbd>* Image size 1507 x 448 pixels</kbd></div>
                                </div>
                            </div> -->



                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="header_image" class="control-label">Header Image *</label>
                                    <input type="file" id="header_image"
                                        class="dropify @error('header_image') is-invalid @enderror" name="header_image"
                                        data-height="150"
                                        data-default-file="{{ asset('site_settings') . '/' . $data->header_image }}" />
                                    @error('header_image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                        
                            <div class="col-md-12">
                                <div class="form-group no-margin">
                                    <label for="iframe" class="control-label">Map Code *</label>
                                    <textarea class="form-control autogrow @error('iframe') is-invalid @enderror" id="iframe" name="iframe"
                                        style="overflow: hidden; word-wrap: break-word; resize: horizontal; height: 104px;">{{ $data->iframe }}</textarea>
                                    @error('iframe')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group no-margin">
                                    <label for="iframe2" class="control-label">Contact page Map Code *</label>
                                    <textarea class="form-control autogrow @error('iframe2') is-invalid @enderror" id="iframe2" name="iframe2"
                                        style="overflow: hidden; word-wrap: break-word; resize: horizontal; height: 104px;">{{ $data->iframe2 }}</textarea>
                                    @error('iframe')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <button type="submit" class="btn btn-success waves-effect waves-light">Update
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
@endsection