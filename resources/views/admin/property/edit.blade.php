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
                                <li class="breadcrumb-item"><a href="{{ route('property.index') }}">Project</a></li>
                                <li class="breadcrumb-item active">Edit Project</li>
                            </ol>
                        </div>
                    @section('page_title')
                        Project
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
                                <h4 class="page-title">Project</h4>
                            </div>
                        </div>
                        <hr>
                        <form id="form" method="post" action="{{ route('property.update', [$data->id]) }}"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="row mb-1">

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="name" class="control-label">Name *</label>
                                        <input type="text" id="name"
                                            class="form-control @error('name') is-invalid @enderror" name="name"
                                            value="{{ $data->name }}" />
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>







                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="description" class="control-label">Description *</label>
                                        <textarea id="description" class="form-control ckeditor-desc @error('description') is-invalid @enderror"
                                            name="description">{{ $data->description }}</textarea>
                                        @error('description')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="address" class="control-label"> address *</label>
                                        <input type="text" id="address"
                                            class="form-control @error('address') is-invalid @enderror" name="address"
                                            value="{{ $data->address }}" />
                                        @error('address')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="side_facing">Side facing * :</label>
                                        <select class="form-control @error('side_facing') is-invalid @enderror"
                                            name="side_facing" id="side_facing">
                                            <option value="east" {{ $data->side_facing == 'east' ? 'selected' : '' }}>
                                                East</option>
                                            <option value="west"
                                                {{ $data->side_facing == 'west' ? 'selected' : '' }}>West</option>
                                            <option value="north"
                                                {{ $data->side_facing == 'north' ? 'selected' : '' }}>North</option>
                                            <option value="south"
                                                {{ $data->side_facing == 'south' ? 'selected' : '' }}>South</option>
                                        </select>
                                        @error('side_facing')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="square_yards" class="control-label">Square yards *</label>
                                        <input type="text" id="square_yards"
                                            class="form-control @error('square_yards') is-invalid @enderror"
                                            name="square_yards" value="{{ $data->square_yards }}" />
                                        @error('square_yards')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="square_feet" class="control-label">Square Feet *</label>
                                        <input type="text" id="square_feet"
                                            class="form-control @error('square_feet') is-invalid @enderror"
                                            name="square_feet" value="{{ $data->square_feet }}" />
                                        @error('square_feet')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="bedroom" class="control-label">Bedroom *</label>
                                        <input type="text" id="bedroom"
                                            class="form-control @error('bedroom') is-invalid @enderror" name="bedroom"
                                            value="{{ $data->bedroom }}" />
                                        @error('bedroom')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="bathroom" class="control-label">bathroom *</label>
                                        <input type="text" id="bathroom"
                                            class="form-control @error('bathroom') is-invalid @enderror"
                                            name="bathroom" value="{{ $data->bathroom }}" />
                                        @error('bathroom')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="garages" class="control-label">garages *</label>
                                        <input type="text" id="garages"
                                            class="form-control @error('garages') is-invalid @enderror" name="garages"
                                            value="{{ $data->garages }}" />
                                        @error('garages')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="year_built" class="control-label">year built *</label>
                                        <input type="text" id="year_built"
                                            class="form-control @error('year_built') is-invalid @enderror"
                                            name="year_built" value="{{ $data->year_built }}" />
                                        @error('year_built')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="contact_number" class="control-label">contact number *</label>
                                        <input type="text" id="contact_number"
                                            class="form-control @error('contact_number') is-invalid @enderror"
                                            name="contact_number" value="{{ $data->contact_number }}" />
                                        @error('contact_number')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="amount" class="control-label">amount *</label>
                                        <input type="text" id="amount"
                                            class="form-control @error('amount') is-invalid @enderror" name="amount"
                                            value="{{ $data->amount }}" />
                                        @error('amount')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                               

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="thumbnail_image">Thumbnail Image * :</label>
                                        <input type="file"
                                            class="dropify @error('thumbnail_image') is-invalid @enderror"
                                            name="thumbnail_image" id="thumbnail_image"
                                            accept="image/jpg, image/jpeg, image/png,image/webp"
                                            data-default-file="{{ asset('uploads/property/' . $data->thumbnail_image) }}">
                                        @error('thumbnail_image')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="slide_1">Slide 1 * :</label>
                                        <input type="file" class="dropify @error('slide_1') is-invalid @enderror"
                                            name="slide_1" id="slide_1"
                                            accept="image/jpg, image/jpeg, image/png, image/webp"
                                            data-default-file="{{ asset('uploads') }}/property/{{ $data->slide_1 }}">
                                        @error('slide_1')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="slide_2">Slide 2 * :</label>
                                        <input type="file" class="dropify @error('slide_2') is-invalid @enderror"
                                            name="slide_2" id="slide_2"
                                            accept="image/jpg, image/jpeg, image/png, image/webp"
                                            data-default-file="{{ asset('uploads') }}/property/{{ $data->slide_2 }}">
                                        @error('slide_2')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="project_complete_image">Project complete image * :</label>
                                        <input type="file" class="dropify @error('project_complete_image') is-invalid @enderror"
                                            name="project_complete_image" id="project_complete_image"
                                            accept="image/jpg, image/jpeg, image/png, image/webp"
                                            data-default-file="{{ asset('uploads') }}/property/{{ $data->project_complete_image }}">
                                        @error('project_complete_image')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror

                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="iframe" class="control-label">Map Iframe *</label>
                                        <textarea id="iframe" class="form-control  @error('iframe') is-invalid @enderror" name="iframe" rows="6">{{ $data->iframe }}</textarea>
                                        @error('iframe')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <link href="{{ asset('admin_assets/sumoselector/sumoselect.min.css') }}"
                                    rel="stylesheet">
                                <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> <!-- Ensure jQuery is loaded -->
                                <script src="{{ asset('admin_assets/sumoselector/jquery.sumoselect.min.js') }}"></script>

                                <div class="col-md-12 w-100">
                                    <div class="form-group">
                                        <label for="features" class="control-label">Features</label> <br>
                                        <select multiple id="features" class="form-control" name="features[]">
                                            <option value="Landscaped gardens" {{ in_array('Landscaped gardens', explode(',', $data->features)) ? 'selected' : '' }}>Landscaped gardens</option>
                                            <option value="Lush Green Avenue plantation" {{ in_array('Lush Green Avenue plantation', explode(',', $data->features)) ? 'selected' : '' }}>Lush Green Avenue plantation</option>
                                            <option value="40 ft wide Blacktop roads" {{ in_array('40 ft wide Blacktop roads', explode(',', $data->features)) ? 'selected' : '' }}>40 ft wide Blacktop roads</option>
                                            <option value="Drainage" {{ in_array('Drainage', explode(',', $data->features)) ? 'selected' : '' }}>Drainage</option>
                                            <option value="Electricity supply" {{ in_array('Electricity supply', explode(',', $data->features)) ? 'selected' : '' }}>Electricity supply</option>
                                            <option value="Compound Wall" {{ in_array('Compound Wall', explode(',', $data->features)) ? 'selected' : '' }}>Compound Wall</option>
                                            <option value="Grand entrance" {{ in_array('Grand entrance', explode(',', $data->features)) ? 'selected' : '' }}>Grand entrance</option>
                                            <option value="CCTV surveillance" {{ in_array('CCTV surveillance', explode(',', $data->features)) ? 'selected' : '' }}>CCTV surveillance</option>
                                            <option value="24 Hours Security" {{ in_array('24 Hours Security', explode(',', $data->features)) ? 'selected' : '' }}>24 Hours Security</option>
                                        </select>
                                    </div>
                                </div>

                                <script>
                                    $('#features').SumoSelect({
                                        placeholder: 'Select Features & Amenities',
                                        csvDispCount: 3, // Display up to 3 items in the select box
                                        captionFormat: '{0} selected',
                                        captionFormatAllSelected: 'All selected',
                                        floatWidth: '100%', // Set dropdown width to 100% of parent container
                                    });
                                </script>
<div class="col-md-12">
    <div class="form-group">
        <label for="brochure">Brochure * :</label>
        <input type="file" class="dropify @error('brochure') is-invalid @enderror"
            name="brochure" id="brochure"
            accept=".pdf,.docx"
            data-default-file="{{ asset('uploads') }}/property/{{ $data->brochure }}">
        @error('brochure')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror

    </div>
</div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="status">Status * :</label>
                                        <select class="form-control @error('status') is-invalid @enderror"
                                            name="status" id="status">
                                            <option value="1" @if ($data->status == 1) selected @endif>
                                                Active</option>
                                            <option value="0" @if ($data->status == 0) selected @endif>
                                                Inactive</option>
                                        </select>
                                        @error('status')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="completed">Complete * :</label>
                                        <select class="form-control @error('completed') is-invalid @enderror"
                                            name="completed" id="completed">
                                            <option value="1" @if ($data->completed == 1) selected @endif>
                                                Completed</option>
                                            <option value="0" @if ($data->completed == 0) selected @endif>
                                                Ongoing</option>
                                        </select>
                                        @error('completed')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="youtube_links" class="control-label">Youtube Links *</label>
                                        <textarea id="youtube_links" class="form-control  @error('youtube_links') is-invalid @enderror" name="youtube_links" rows="6">{{ $data->youtube_links }}</textarea>
                                        @error('youtube_links')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <small class="text-danger">Provide youtube links separated by comma(,)</small>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group mb-0">
                                <input type="submit" name="submit" id="save" class="btn btn-success"
                                    value="Update">
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
<style>
    /* Default styles for SumoSelect */
    .SumoSelect.open>.optWrapper {
        width: 72vw;
        /* height: 130px; */
    }

    .SumoSelect>.CaptionCont {
        /* width: 1092px; */
        width: 72vw;
    }

    .SumoSelect>.optWrapper>.options {
        width: 72vw;
    }

    /* Media query for mobile view */
    @media screen and (max-width: 767px) {
        .SumoSelect.open>.optWrapper {
            width: auto;
            /* Adjust width as needed for mobile */
            height: auto;
            /* Adjust height as needed for mobile */
        }

        .SumoSelect>.CaptionCont {
            width: auto;
            /* Adjust width as needed for mobile */
        }

        .SumoSelect>.optWrapper>.options {
            width: auto;
            /* Adjust width as needed for mobile */
        }
    }
</style>
@endsection
