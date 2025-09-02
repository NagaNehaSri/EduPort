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
                            <li class="breadcrumb-item"><a href="{{ route('state_address.index') }}">State Addresses</a></li>
                            <li class="breadcrumb-item active">Edit State Address</li>
                        </ol>
                    </div>
                    @section('page_title')
                    Edit State Address
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
                                <h4 class="page-title">Edit State Address</h4>
                            </div>
                        </div>
                        <hr>
                        <form method="post" action="{{ route('state_address.update', $data->id) }}"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="state_id">State *</label>
                                        <select name="state_id" id="state_id" class="form-control">
                                            @foreach($states as $state)
                                                <option value="{{ $state->id }}" @if($data->state_id == $state->id) selected @endif>{{ $state->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('state_id')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="title">Title *</label>
                                        <input type="text" class="form-control" id="title" name="title" value="{{ $data->title }}">
                                        @error('title')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="sub_title">Sub Title *</label>
                                        <input type="text" class="form-control" id="sub_title" name="sub_title" value="{{ $data->sub_title }}">
                                        @error('sub_title')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="address">Address *</label>
                                        <textarea class="form-control" id="address" name="address">{{ $data->address }}</textarea>
                                        @error('address')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="mail">Mail *</label>
                                        <input type="email" class="form-control" id="mail" name="mail" value="{{ $data->mail }}">
                                        @error('mail')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="phone">Phone *</label>
                                        <input type="text" class="form-control" id="phone" name="phone" value="{{ $data->phone }}">
                                        @error('phone')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="iframe">iFrame *</label>
                                        <textarea class="form-control" id="iframe" name="iframe">{{ $data->iframe }}</textarea>
                                        @error('iframe')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="form-group mb-0">
                                <button type="submit" class="btn btn-success waves-effect waves-light mr-1">Update</button>
                                <a href="{{ route('state_address.index') }}" class="btn btn-secondary waves-effect">Cancel</a>
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
