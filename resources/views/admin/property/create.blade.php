@extends('admin.layouts.main')
@section('content')

    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('property.index') }}">Project</a></li>
                        <li class="breadcrumb-item active">Add Project</li>
                    </ol>
                </div>
                @section('page_title')
                    Add Project
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
                    <h4 class="page-title">Add Project</h4>
                    <hr>
                    <form action="{{ route('property.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <div class="row">

                               
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="name" class="control-label">Name *</label>
                                        <input type="text" id="name"
                                               class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}"/>
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
                                        <textarea id="description"
                                               class="form-control ckeditor-desc @error('description') is-invalid @enderror" name="description">{{ old('description') }}</textarea>
                                        @error('description')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="address" class="control-label">Address *</label>
                                        <textarea id="address"
                                               class="form-control @error('address') is-invalid @enderror" name="address">{{ old('address') }}</textarea>
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
                                        <select class="form-control @error('side_facing') is-invalid @enderror" name="side_facing"
                                                id="side_facing">
                                            <option value="east" selected>East</option>
                                            <option value="west">West</option>
                                            <option value="north">North</option>
                                            <option value="south">South</option>
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
                                               class="form-control @error('square_yards') is-invalid @enderror" name="square_yards" value="{{ old('square_yards') }}"/>
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
                                               class="form-control @error('square_feet') is-invalid @enderror" name="square_feet" value="{{ old('square_feet') }}"/>
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
                                               class="form-control @error('bedroom') is-invalid @enderror" name="bedroom" value="{{ old('bedroom') }}"/>
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
                                               class="form-control @error('bathroom') is-invalid @enderror" name="bathroom" value="{{ old('bathroom') }}"/>
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
                                               class="form-control @error('garages') is-invalid @enderror" name="garages" value="{{ old('garages') }}"/>
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
                                               class="form-control @error('year_built') is-invalid @enderror" name="year_built" value="{{ old('year_built') }}"/>
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
                                               class="form-control @error('contact_number') is-invalid @enderror" name="contact_number" value="{{ old('contact_number') }}"/>
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
                                               class="form-control @error('amount') is-invalid @enderror" name="amount" value="{{ old('amount') }}"/>
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
                                        <input type="file" class="dropify @error('thumbnail_image') is-invalid @enderror" name="thumbnail_image"
                                               id="thumbnail_image" accept="image/jpg, image/jpeg, image/png">
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
                                        <input type="file" class="dropify @error('slide_1') is-invalid @enderror" name="slide_1"
                                               id="slide_1" accept="image/jpg, image/jpeg, image/png, image/webp">
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
                                        <input type="file" class="dropify @error('slide_2') is-invalid @enderror" name="slide_2"
                                               id="slide_2" accept="image/jpg, image/jpeg, image/png, image/webp">
                                        @error('slide_2')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="project_complete_image">Project Complete Image * :</label>
                                        <input type="file" class="dropify @error('project_complete_image') is-invalid @enderror" name="project_complete_image"
                                               id="project_complete_image" accept="image/jpg, image/jpeg, image/png, image/webp">
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
                                        <textarea id="iframe" rows="6"
                                               class="form-control  @error('iframe') is-invalid @enderror" name="iframe">{{ old('iframe') }}</textarea>
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
                                        <option value="Landscaped gardens" >Landscaped gardens</option>
                                        <option value="Lush Green Avenue plantation" >Lush Green Avenue plantation</option>
                                        <option value="40 ft wide Blacktop roads" >40 ft wide Blacktop roads</option>
                                        <option value="Drainage" >Drainage</option>
                                        <option value="Electricity supply" >Electricity supply</option>
                                        <option value="Compound Wall" >Compound Wall</option>
                                        <option value="Grand entrance" >Grand entrance</option>
                                        <option value="CCTV surveillance" >CCTV surveillance</option>
                                        <option value="24 Hours Security" >24 Hours Security</option>
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
                                    <input type="file" class="dropify @error('brochure') is-invalid @enderror" name="brochure"
                                           id="brochure" accept=".pdf,.docx">
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
                                        <select class="form-control @error('status') is-invalid @enderror" name="status"
                                                id="status">
                                            <option value="1" selected>Active</option>
                                            <option value="0">Inactive</option>
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
                                        <select class="form-control @error('completed') is-invalid @enderror" name="completed"
                                                id="completed">
                                            <option value="1" selected>Completed</option>
                                            <option value="0">Ongoing</option>
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
                                        <textarea id="youtube_links" class="form-control  @error('youtube_links') is-invalid @enderror" name="youtube_links" rows="6"></textarea>
                                        @error('youtube_links')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <small class="text-danger">Provide youtube links separated by comma(,)</small>
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
    <script src="https://cdn.ckeditor.com/4.18.0/full/ckeditor.js"></script>

    <script>

        setTimeout(function () {
            const editors = document.getElementsByClassName("ckeditor-desc");
            for (let i = 0; i < editors.length; i++) {
                CKEDITOR.replace(editors[i]);
            }
        }, 50);
    </script>
    <script>
        $('#save').on('click', function () {
            if ($('#image').val() === '') {
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
    <style>
        /* Default styles for SumoSelect */
        .SumoSelect.open>.optWrapper {
            width: 80vw;
            /* height: 130px; */
        }
    
        .SumoSelect>.CaptionCont {
            /* width: 1092px; */
            width: 80vw;
        }
    
        .SumoSelect>.optWrapper>.options {
            width: 80vw;
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

