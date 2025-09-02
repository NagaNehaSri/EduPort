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
                        <form id="form" method="post" action="{{ route('roles.store') }}"
                            enctype="multipart/form-data">@csrf

                            <div class="row">


                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="role_name">Role Name * :</label>
                                        <input type="text" class="form-control @error('role_name') is-invalid @enderror"
                                            name="role_name" id="role_name" value="{{ old('role_name') }}"
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
                                        <div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" name="privileges[]" id="site-settings" value="site-settings">
                                                <label class="form-check-label" for="privilege_banners">Site Settings</label>

                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" name="privileges[]" id="privilege_banners" value="social-media-settings">
                                                <label class="form-check-label" for="privilege_banners">Social Media Settings</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" name="privileges[]" id="privilege_banners" value="active-ad">
                                                <label class="form-check-label" for="privilege_banners">Active Ad</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" name="privileges[]" id="seo-settings" value="seo-settings">
                                                <label class="form-check-label" for="privilege_banners">Seo Settings</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" name="privileges[]" id="privilege_services" value="service">
                                                <label class="form-check-label" for="privilege_services">Services</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" name="privileges[]" id="service_feature" value="service_feature">
                                                <label class="form-check-label" for="service_feature">Service Feature</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" name="privileges[]" id="about" value="about">
                                                <label class="form-check-label" for="about">About</label>

                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" name="privileges[]" id="team" value="team">
                                                <label class="form-check-label" for="team">Team</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" name="privileges[]" id="roles" value="roles">
                                                <label class="form-check-label" for="roles">Roles</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" name="privileges[]" id="privilege_banners" value="banner">
                                                <label class="form-check-label" for="privilege_banners">Banners</label>

                                            </div>

                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" name="privileges[]" id="privilege_home_about" value="home_about">
                                                <label class="form-check-label" for="privilege_home_about">Home About</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" name="privileges[]" id="privilege_gallery" value="gallery">
                                                <label class="form-check-label" for="privilege_gallery">Gallery</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" name="privileges[]" id="privilege_testimonials" value="testimonials">
                                                <label class="form-check-label" for="privilege_testimonials">Testimonials</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" name="privileges[]" id="privilege_counts" value="count">
                                                <label class="form-check-label" for="privilege_counts">Counts</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" name="privileges[]" id="privilege_works" value="works">
                                                <label class="form-check-label" for="privilege_works">Works</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" name="privileges[]" id="privilege_location" value="location">
                                                <label class="form-check-label" for="privilege_location">Location</label>
                                            </div>
                                           
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" name="privileges[]" id="privilege_career" value="career">
                                                <label class="form-check-label" for="privilege_career">Career</label>
                                            </div>
                                           
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" name="privileges[]" id="privilege_images" value="image_cms">
                                                <label class="form-check-label" for="privilege_images">Images</label>
                                            </div>
                                         
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" name="privileges[]" id="privilege_profile" value="profile">
                                                <label class="form-check-label" for="privilege_profile">Profile</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" name="privileges[]" id="privilege_system_logs" value="logs">
                                                <label class="form-check-label" for="privilege_system_logs">System Logs</label>
                                            </div>
                                        </div>

                                        @error('role_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div>





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