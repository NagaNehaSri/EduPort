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
                            <li class="breadcrumb-item"><a href="{{ route('roles.index') }}">Roles</a></li>
                            <li class="breadcrumb-item active">Add Roles</li>
                        </ol>
                    </div>
                    @section('page_title')
                    Add Roles
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
                                <h4 class="page-title">Add Roles</h4>
                            </div>
                        </div>
                        <hr>
                        <form id="form" method="post" action="{{ route('roles.update',[$data->id]) }}"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="row">


                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="role_name">Role Name * :</label>
                                        <input type="text" class="form-control @error('role_name') is-invalid @enderror"
                                            name="role_name" id="role_name" value="{{ $data->role_name }}"
                                            autocomplete="off">
                                        @error('role_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="role_id">Privileges * :</label>
                                        @php
                                        $privileges = explode(',',$data->privileges);
                                        @endphp


                                        <div>
                                            <div class="form-check form-check-inline"> <input class="form-check-input" type="checkbox" name="privileges[]" id="site-settings" value="site-settings"
                                             {{ in_array('site-settings', old('privileges', $privileges)) ? 'checked' : '' }}> <label class="form-check-label" for="site-settings">Site Settings</label> </div>

                                            <div class="form-check form-check-inline"> <input class="form-check-input" type="checkbox" name="privileges[]" id="social-media-settings" value="social-media-settings" 
                                            {{ in_array('social-media-settings', old('privileges', $privileges)) ? 'checked' : '' }}> 
                                            <label class="form-check-label" for="social-media-settings">Social Media Settings</label> </div>

                                            <div class="form-check form-check-inline"> <input class="form-check-input" type="checkbox" name="privileges[]" id="active-ad" value="active-ad" 
                                            {{ in_array('active-ad', old('privileges', $privileges)) ? 'checked' : '' }}> <label class="form-check-label" for="active-ad">Active Ad</label> </div>

                                            <div class="form-check form-check-inline"> <input class="form-check-input" type="checkbox" name="privileges[]" id="seo-settings" value="seo-settings" {{ in_array('seo-settings', old('privileges', $privileges)) ? 'checked' : '' }}>
                                             <label class="form-check-label" for="seo-settings">SEO Settings</label> </div>

                                            <div class="form-check form-check-inline"> <input class="form-check-input" type="checkbox" name="privileges[]" id="service" value="service" {{ in_array('service', old('privileges', $privileges)) ? 'checked' : '' }}> <label class="form-check-label" for="service">Services</label> </div>

                                            <div class="form-check form-check-inline"> <input class="form-check-input" type="checkbox" name="privileges[]" id="service_feature" value="service_feature" {{ in_array('service_feature', old('privileges', $privileges)) ? 'checked' : '' }}> <label class="form-check-label" for="service_feature">Service Feature</label> </div>

                                            <div class="form-check form-check-inline"> <input class="form-check-input" type="checkbox" name="privileges[]" id="about" value="about" {{ in_array('about', old('privileges', $privileges)) ? 'checked' : '' }}> <label class="form-check-label" for="about">About</label> </div>

                                            <div class="form-check form-check-inline"> <input class="form-check-input" type="checkbox" name="privileges[]" id="team" value="team" {{ in_array('team', old('privileges', $privileges)) ? 'checked' : '' }}> <label class="form-check-label" for="team">Team</label> </div>

                                            <div class="form-check form-check-inline"> <input class="form-check-input" type="checkbox" name="privileges[]" id="roles" value="roles" {{ in_array('roles', old('privileges', $privileges)) ? 'checked' : '' }}> <label class="form-check-label" for="roles">Roles</label> </div>

                                            <div class="form-check form-check-inline"> <input class="form-check-input" type="checkbox" name="privileges[]" id="banner" value="banner" {{ in_array('banner', old('privileges', $privileges)) ? 'checked' : '' }}> <label class="form-check-label" for="banner">Banners</label> </div>

                                            <div class="form-check form-check-inline"> <input class="form-check-input" type="checkbox" name="privileges[]" id="home_about" value="home_about" {{ in_array('home_about', old('privileges', $privileges)) ? 'checked' : '' }}> <label class="form-check-label" for="home_about">Home About</label> </div>

                                            <div class="form-check form-check-inline"> <input class="form-check-input" type="checkbox" name="privileges[]" id="gallery" value="gallery" {{ in_array('gallery', old('privileges', $privileges)) ? 'checked' : '' }}> <label class="form-check-label" for="gallery">Gallery</label> </div>

                                            <div class="form-check form-check-inline"> <input class="form-check-input" type="checkbox" name="privileges[]" id="testimonials" value="testimonials" {{ in_array('testimonials', old('privileges', $privileges)) ? 'checked' : '' }}> <label class="form-check-label" for="testimonials">Testimonials</label> </div>

                                            <div class="form-check form-check-inline"> <input class="form-check-input" type="checkbox" name="privileges[]" id="count" value="count" {{ in_array('count', old('privileges', $privileges)) ? 'checked' : '' }}> <label class="form-check-label" for="count">Counts</label> </div>

                                            <div class="form-check form-check-inline"> <input class="form-check-input" type="checkbox" name="privileges[]" id="privilege_works" value="works" {{ in_array('works', old('privileges', $privileges)) ? 'checked' : '' }}> <label class="form-check-label" for="privilege_works">Works</label> </div>

                                            <div class="form-check form-check-inline"> <input class="form-check-input" type="checkbox" name="privileges[]" id="privilege_location" value="location" {{ in_array('location', old('privileges', $privileges)) ? 'checked' : '' }}> <label class="form-check-label" for="privilege_location">Location</label> </div>

                                            <div class="form-check form-check-inline"> <input class="form-check-input" type="checkbox" name="privileges[]" id="privilege_career" value="career" {{ in_array('career', old('privileges', $privileges)) ? 'checked' : '' }}> <label class="form-check-label" for="privilege_career">Career</label> </div>

                                            <div class="form-check form-check-inline"> <input class="form-check-input" type="checkbox" name="privileges[]" id="privilege_images" value="image_cms" {{ in_array('image_cms', old('privileges', $privileges)) ? 'checked' : '' }}> <label class="form-check-label" for="privilege_images">Images</label> </div>

                                            <div class="form-check form-check-inline"> <input class="form-check-input" type="checkbox" name="privileges[]" id="privilege_profile" value="profile" {{ in_array('profile', old('privileges', $privileges)) ? 'checked' : '' }}> <label class="form-check-label" for="privilege_profile">Profile</label> </div>

                                            <div class="form-check form-check-inline"> <input class="form-check-input" type="checkbox" name="privileges[]" id="privilege_system_logs" value="logs" {{ in_array('logs', old('privileges', $privileges)) ? 'checked' : '' }}> <label class="form-check-label" for="privilege_system_logs">System Logs</label> </div>
                                        </div>

                                        @error('privileges')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div>





                                </div>

                                <div class="form-group mb-0">
                                    <input type="submit" name="submit" id="save" class="btn btn-success" value="Upadte">
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