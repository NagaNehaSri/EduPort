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
                                <li class="breadcrumb-item"><a href="{{ route('content.index') }}">Content</a></li>
                                <li class="breadcrumb-item active">Content Edit</li>
                            </ol>
                        </div>
                    @section('page_title')
                        Content
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
                                <h4 class="page-title">Content</h4>
                            </div>
                        </div>
                        <hr>
                        <form id="form" method="post" action="{{ route('content.update', [$data->id]) }}"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="row mb-1">

                                <div class="col-md-12">
                                    <div class="form-group">
                                        {{-- <label for="tag" class="control-label">Section tag *</label> --}}
                                        <span class="badge badge-success">{{ $data->tag }}</span>
                                    </div>
                                </div>
                                @if($data->heading ?? false)
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="heading" class="control-label">Heading</label>
                                        <input type="text" id="heading" class="form-control @error('heading') is-invalid @enderror" name="heading" value="{{ $data->heading }}" />
                                        @error('heading')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            @endif
                            
                            @if($data->description ?? false)
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="description" class="control-label">Description</label>
                                        <textarea id="description" class="form-control ckeditor-desc @error('description') is-invalid @enderror" name="description">{{ $data->description }}</textarea>
                                        @error('description')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            @endif
                            
                            @if($data->image ?? false)
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="image">Image:</label>
                                        <input type="file" class="dropify @error('image') is-invalid @enderror" name="image" id="image" accept="image/jpg, image/jpeg, image/png,image/webp" data-default-file="{{ asset('uploads/cms/'.$data->image) }}">
                                        @error('image')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            @endif
                            

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
@endsection
