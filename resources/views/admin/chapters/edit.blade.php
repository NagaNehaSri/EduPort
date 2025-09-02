@extends('admin.layouts.main')
@section('content')

    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('chapters.index') }}">Chapters</a></li>
                        <li class="breadcrumb-item active">Add Chapters</li>
                    </ol>
                </div>
            @section('page_title')
                Add Chapters
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
                <h4 class="page-title">Add Chapters</h4>
                <hr>

                <form id="form" method="POST" action="{{ route('chapters.update', [$data->id]) }}"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="row">
                            <!-- Chapter Category -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="chapter_category" class="control-label">Chapter Category </label>
                                    <select id="chapter_category"
                                        class="form-control @error('chapter_category') is-invalid @enderror"
                                        name="chapter_category">
                                        <option value="">Select Chapter Category</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}"
                                                {{ $data->chapter_category == $category->id ? 'selected' : '' }}>
                                                {{ $category->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('chapter_category')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Chapter Name -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="chapters_name" class="control-label">Chapter Name </label>
                                    <input type="text" id="chapters_name"
                                        class="form-control @error('chapters_name') is-invalid @enderror"
                                        name="chapters_name" value="{{ old('chapters_name', $data->chapters_name) }}">
                                    @error('chapters_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="chapter_amount" class="control-label">Amount </label>
                                    <input type="text" id="chapter_amount" class="form-control @error('chapter_amount') is-invalid @enderror" name="chapter_amount" value="{{ old('chapter_amount',$data->chapter_amount) }}" />
                                    @error('chapter_amount')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="chapter_link" class="control-label">Chapter Link </label>
                                    <input type="url" id="chapter_link"
                                           class="form-control @error('chapter_link') is-invalid @enderror" 
                                           name="chapter_link" value="{{ old('chapter_link',$data->chapter_link) }}"/>
                                    @error('chapter_link')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Author Name -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="author_name" class="control-label">Author Name </label>
                                    <input type="text" id="author_name"
                                        class="form-control @error('author_name') is-invalid @enderror"
                                        name="author_name" value="{{ old('author_name', $data->author_name) }}">
                                    @error('author_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Priority -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="priority" class="control-label">Priority </label>
                                    <input type="number" id="priority"
                                        class="form-control @error('priority') is-invalid @enderror" name="priority"
                                        value="{{ old('priority', $data->priority) }}">
                                    @error('priority')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Short Description -->
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="chapter_page_short_description" class="control-label">Chapter Short
                                        Description</label>
                                    <textarea id="chapter_page_short_description"
                                        class="form-control mini-suneditor @error('chapter_page_short_description') is-invalid @enderror"
                                        name="chapter_page_short_description">{{ $data->chapter_page_short_description }}</textarea>
                                    @error('chapter_page_short_description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Thumbnail Image -->
                            <div class="col-md-6">
                                <div class="form-group"> <label for="thumbnail_image">Thumbnail Image  :</label> <input
                                        type="file" class="dropify @error('thumbnail_image') is-invalid @enderror"
                                        name="thumbnail_image" id="thumbnail_image"
                                        accept="image/jpg, image/jpeg, image/png, image/webp"
                                        data-default-file="{{ asset('uploads') }}/chapters/{{ $data->thumbnail_image }}">
                                    @error('thumbnail_image')
                                        <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror <div class="text-muted mt-1"><kbd>* Image size 310 x 220 pixels</kbd>
                                    </div> <a href="{{ asset('uploads') }}/chapters/{{ $data->thumbnail_image }}"
                                        target="_blank"> → view image</a>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group"> <label for="view_image">View Image  :</label> <input
                                        type="file" class="dropify @error('view_image') is-invalid @enderror"
                                        name="view_image" id="view_image"
                                        accept="image/jpg, image/jpeg, image/png, image/webp"
                                        data-default-file="{{ asset('uploads') }}/chapters/{{ $data->view_image }}">
                                    @error('view_image')
                                        <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror <div class="text-muted mt-1"><kbd>* Image size 1110 x 376 pixels</kbd>
                                    </div> <a href="{{ asset('uploads') }}/chapters/{{ $data->view_image }}"
                                        target="_blank"> → view image</a>
                                </div>
                            </div>

                            <!-- Chapter Description -->
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="chapter_description" class="control-label">Chapter Description
                                        </label>
                                    <textarea id="chapter_description" class="form-control sun-editor @error('chapter_description') is-invalid @enderror"
                                        name="chapter_description">{{ $data->chapter_description }}</textarea>
                                    @error('chapter_description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 text-right">
                                <button type="submit" class="btn btn-success">Update</button>
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
