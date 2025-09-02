@extends('admin.layouts.main')
@section('content')

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Edit User</li>
                        </ol>
                    </div>
                    @section('page_title')
                        Edit User
                    @endsection
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                @include('flash_msg')
                <div class="card">
                    <div class="card-body table-responsive">
                        <form id="userForm" action="{{ route('user.update', $user->id) }}" method="post">
                            @csrf
                            @method('PUT')

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="name" class="control-label">Name</label>
                                        <input type="text" class="form-control" id="name" name="name"
                                               placeholder="John" value="{{ $user->name }}" autocomplete="off">
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="email" class="control-label">Email Address</label>
                                        <input type="email" class="form-control" id="email" name="email"
                                               value="{{ $user->email }}" placeholder="example@mail.com">
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="role">Role</label>
                                        <select class="form-control" id="role" name="role_id">
                                            <option value="">Select Role</option>
                                            @foreach ($roles as $role)
                                                <option value="{{ $role->id }}" {{ $user->role_id == $role->id ? 'selected' : '' }}>
                                                    {{ $role->role_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12">
                                    <button type="submit" id="submit" class="btn btn-success waves-effect waves-light float-right">Update User</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection
