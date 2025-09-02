@extends('admin.layouts.main')
@section('content')

    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('chapter_content.index',['chapter_id' => $chapter_id]) }}">Chapters Content</a></li>
                        <li class="breadcrumb-item active">Add Chapters Content</li>
                    </ol>
                </div>
                @section('page_title')
                    Add Chapters Content
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
                    <h4 class="page-title">Add Chapters Content</h4>
                    <hr>
                    <form action="{{ route('chapter_content.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <div class="row">

                                <input type="hidden" name="chapter_id" value="{{$chapter_id}}">

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="title" class="control-label">Title </label>
                                        <input type="text" id="title"
                                               class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}"/>
                                        @error('title')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                
                                
                               
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="description" class="control-label">Description </label>
                                        <textarea id="description"
                                               class="form-control sun-editor @error('description') is-invalid @enderror" name="description">{{ old('description') }}</textarea>
                                        @error('description')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="priority" class="control-label">Priority </label>
                                        <input type="text" id="priority"
                                               class="form-control @error('priority') is-invalid @enderror" name="priority" value="{{ old('priority') }}"/>
                                        @error('priority')
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

@endsection

