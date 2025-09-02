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
                                <li class="breadcrumb-item"><a href="{{ route('quiz.index') }}">Chapters
                                        Content</a></li>
                                <li class="breadcrumb-item active">Edit Quiz</li>
                            </ol>
                        </div>
                    @section('page_title')
                        Quiz
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
                                <h4 class="page-title">Quiz</h4>
                            </div>
                        </div>
                        <hr>
                        <form id="form" method="post" action="{{ route('quiz.update', [$data->id]) }}"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="row mb-1">

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="question" class="control-label">Question *</label>
                                        <input type="text" id="question"
                                            class="form-control @error('question') is-invalid @enderror" name="question"
                                            value="{{ $data->question }}" />
                                        @error('question')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="priority" class="control-label">Priority *</label>
                                        <input type="text" id="priority"
                                            class="form-control @error('priority') is-invalid @enderror" name="priority"
                                            value="{{ $data->priority }}" />
                                        @error('priority')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                               <div class="col-md-6">
    <div class="form-group">
        <label for="option_1" class="control-label">Option-A</label>
        <textarea id="option_1"
                  class="form-control mini-suneditor @error('option_1') is-invalid @enderror"
                  name="option_1">{{ $data->option_1 }}</textarea>
        @error('option_1')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

                                <div class="col-md-6">
    <div class="form-group">
        <label for="option_2" class="control-label">Option-B</label>
        <textarea id="option_2"
                  class="form-control mini-suneditor @error('option_2') is-invalid @enderror"
                  name="option_2">{{ $data->option_2 }}</textarea>
        @error('option_2')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
<div class="col-md-6">
    <div class="form-group">
        <label for="option_3" class="control-label">Option-C</label>
        <textarea id="option_3"
                  class="form-control mini-suneditor @error('option_3') is-invalid @enderror"
                  name="option_3">{{ $data->option_3 }}</textarea>
        @error('option_3')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
<div class="col-md-6">
    <div class="form-group">
        <label for="option_4" class="control-label">Option-D</label>
        <textarea id="option_4"
                  class="form-control mini-suneditor @error('option_4') is-invalid @enderror"
                  name="option_4">{{ $data->option_4 }}</textarea>
        @error('option_4')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="image_1">Image-A:</label>
                                        <input type="file" class="dropify @error('image_1') is-invalid @enderror"
                                            name="image_1" id="image_1"
                                            accept="image/jpg, image/jpeg, image/png, image/webp" data-default-file="{{ asset('uploads/quiz/' . $data->image_1) }}">
                                        @error('image_1')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <div class="text-muted mt-1"><kbd>* Image size 1110 x 376 pixels</kbd></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="image_2">Image-B:</label>
                                        <input type="file" class="dropify @error('image_1') is-invalid @enderror"
                                            name="image_2" id="image_2"
                                            accept="image/jpg, image/jpeg, image/png, image/webp" data-default-file="{{ asset('uploads/quiz/' . $data->image_2) }}">
                                        @error('image_2')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <div class="text-muted mt-1"><kbd>* Image size 1110 x 376 pixels</kbd></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="image_3">Image-C:</label>
                                        <input type="file" class="dropify @error('image_3') is-invalid @enderror"
                                            name="image_3" id="image_3"
                                            accept="image/jpg, image/jpeg, image/png, image/webp" data-default-file="{{ asset('uploads/quiz/' . $data->image_3) }}">
                                        @error('image_3')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <div class="text-muted mt-1"><kbd>* Image size 1110 x 376 pixels</kbd></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="image_4">Image-D:</label>
                                        <input type="file" class="dropify @error('image_4') is-invalid @enderror"
                                            name="image_4" id="image_4"
                                            accept="image/jpg, image/jpeg, image/png, image/webp" data-default-file="{{ asset('uploads/quiz/' . $data->image_4) }}">
                                        @error('image_4')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <div class="text-muted mt-1"><kbd>* Image size 1110 x 376 pixels</kbd></div>
                                    </div>
                                </div>
                                 <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="question_image">Question Image:</label>
                                        <input type="file" class="dropify @error('question_image') is-invalid @enderror"
                                            name="question_image" id="question_image"
                                            accept="image/jpg, image/jpeg, image/png, image/webp" data-default-file="{{ asset('uploads/quiz/' . $data->question_image) }}">
                                        @error('question_image')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <div class="text-muted mt-1"><kbd>* Image size 1110 x 376 pixels</kbd></div>
                                    </div>
                                </div>
                             
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="correct_answer" class="control-label">Correct Answer*</label>

                                        <!-- Horizontal Radio Button Container -->
                                        <div class="d-flex gap-3">
                                            <!-- Option A -->
                                            <div class="form-check form-check-inline">
                                                <input type="radio" id="option_a"
                                                    class="form-check-input @error('correct_answer') is-invalid @enderror"
                                                    name="correct_answer" value="A"
                                                    {{ old('correct_answer', $data->correct_answer ?? null) === 'A' ? 'checked' : '' }}>
                                                <label class="form-check-label" for="option_a">A</label>
                                            </div>

                                            <!-- Option B -->
                                            <div class="form-check form-check-inline">
                                                <input type="radio" id="option_b"
                                                    class="form-check-input @error('correct_answer') is-invalid @enderror"
                                                    name="correct_answer" value="B"
                                                    {{ old('correct_answer', $data->correct_answer ?? null) === 'B' ? 'checked' : '' }}>
                                                <label class="form-check-label" for="option_b">B</label>
                                            </div>

                                            <!-- Option C -->
                                            <div class="form-check form-check-inline">
                                                <input type="radio" id="option_c"
                                                    class="form-check-input @error('correct_answer') is-invalid @enderror"
                                                    name="correct_answer" value="C"
                                                    {{ old('correct_answer', $data->correct_answer ?? null) === 'C' ? 'checked' : '' }}>
                                                <label class="form-check-label" for="option_c">C</label>
                                            </div>

                                            <!-- Option D -->
                                            <div class="form-check form-check-inline">
                                                <input type="radio" id="option_d"
                                                    class="form-check-input @error('correct_answer') is-invalid @enderror"
                                                    name="correct_answer" value="D"
                                                    {{ old('correct_answer', $data->correct_answer ?? null) === 'D' ? 'checked' : '' }}>
                                                <label class="form-check-label" for="option_d">D</label>
                                            </div>
                                        </div>

                                        <!-- Error Handling -->
                                        @error('correct_answer')
                                            <span class="invalid-feedback d-block" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>



                                {{--


                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="status">Status * :</label>
                            <select class="form-control @error('status') is-invalid @enderror" name="status"
                                id="status">
                                <option value="1" @if ($data->status == 1) selected @endif>Active</option>
                                <option value="0" @if ($data->status == 0) selected @endif>Inactive</option>
                            </select>
                            @error('status')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div> --}}

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

@endsection
