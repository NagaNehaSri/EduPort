@extends('admin.layouts.main')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </div>
        </div>
        <h4 class="page-title">Welcome {{ Auth::User()->name }} !</h4>
    </div>
    <!-- end page title -->
</div>

<div class="row">

    {{-- <div class="col-xl-3 col-md-6">
            <div class="card widget-box-two bg-primary">
                <a href="{{ route('portfolio.index') }}">
    <div class="card-body">
        <div class="media">
            <div class="media-body wigdet-two-content">
                <p class="m-0 text-uppercase text-white">Total Portfolios</p>
                <h2 class="text-white"><span data-plugin="counterup">{{ $portfolios }}</span></h2>
            </div>
        </div>
    </div>
    </a>
</div>
</div> --}}

<div class="col-xl-3 col-md-6">
    <div class="card widget-box-two" style="background-color:  #000000 !important;">
        <a href="{{ route('admin.dashboard') }}">
            <div class="card-body">
                <div class="media">
                    <div class="media-body wigdet-two-content">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <p class="m-0 text-uppercase text-white">Total Contacts</p>
                                <h2 class="text-white">
                                    <span data-plugin="counterup">{{ $contacts }}</span>
                                </h2>
                            </div>
                            <div class="rounded-circle bg-white text-danger d-flex justify-content-center align-items-center" style="width: 50px; height: 50px;">
                            <i class="fas fa-file" style="color: rgb(116, 165, 2) !important;"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>


</div>

 {{-- <div class="col-xl-3 col-md-6">
            <div class="card widget-box-two" style="background-color: #000000 !important;
">
                <a href="{{ route('admin.dashboard.inquiry.index') }}">
<div class="card-body">
    <div class="media">
        <div class="media-body wigdet-two-content">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <p class="m-0 text-uppercase text-white">Get A Quote</p>
                    <h2 class="text-white">
                        <span data-plugin="counterup">{{ $inquiries }}</span>
                    </h2>
                </div>
                <div class="rounded-circle bg-white text-danger d-flex justify-content-center align-items-center" style="width: 50px; height: 50px;">
                <i class="fas fa-file" style="color: rgb(116, 165, 2) !important;"></i>
                </div>
            </div>
        </div>
    </div>
</div>
</a>
</div>
</div>  --}}

{{-- <div class="col-xl-3 col-md-6">
            <div class="card widget-box-two bg-primary">
                <a href="{{ route('contact.index') }}">
<div class="card-body">
    <div class="media">
        <div class="media-body wigdet-two-content">
            <p class="m-0 text-uppercase text-white">Total Contact</p>
            <h2 class="text-white"><span data-plugin="counterup">{{ $contact }}</span></h2>
        </div>
    </div>
</div>
</a>
</div>
</div>

<div class="col-xl-3 col-md-6">
    <div class="card widget-box-two bg-primary">
        <a href="{{ route('jobs.index') }}">
            <div class="card-body">
                <div class="media">
                    <div class="media-body wigdet-two-content">
                        <p class="m-0 text-uppercase text-white">Total Job Application</p>
                        <h2 class="text-white"><span data-plugin="counterup">{{ $jobs }}</span></h2>
                    </div>
                </div>
            </div>
        </a>
    </div>
</div>

<div class="col-xl-3 col-md-6">
    <div class="card widget-box-two bg-primary">
        <a href="{{ route('enquiries.index') }}">
            <div class="card-body">
                <div class="media">
                    <div class="media-body wigdet-two-content">
                        <p class="m-0 text-uppercase text-white">Total Enquires</p>
                        <h2 class="text-white"><span data-plugin="counterup">{{ $enquiries }}</span></h2>
                    </div>
                </div>
            </div>
        </a>
    </div>
</div> --}}

{{--

       <div class="col-xl-3 col-md-6">
           <div class="card widget-box-two bg-success">
            <a href="{{ route('batches.index') }}">
<div class="card-body">
    <div class="media">
        <div class="media-body wigdet-two-content">
            <p class="m-0 text-white text-uppercase">Total Batches</p>
            <h2 class="text-white"><span data-plugin="counterup">{{ $batches }}</span></h2>
        </div>
    </div>
</div>
</a>
</div>
</div>
<div class="col-xl-3 col-md-6">
    <div class="card widget-box-two bg-info">
        <a href="{{ route('students.index') }}">
            <div class="card-body">
                <div class="media">
                    <div class="media-body wigdet-two-content">
                        <p class="m-0 text-white text-uppercase">Total Active Students</p>
                        <h2 class="text-white"><span data-plugin="counterup">{{ $active_students }}</span></h2>
                    </div>
                </div>
            </div>
        </a>
    </div>
</div>
<div class="col-xl-3 col-md-6">
    <div class="card widget-box-two bg-danger">
        <a href="{{ route('students.index') }}">
            <div class="card-body">
                <div class="media">
                    <div class="media-body wigdet-two-content">
                        <p class="m-0 text-white text-uppercase">Total InActive Students</p>
                        <h2 class="text-white"><span data-plugin="counterup">{{ $inactive_students }}</span></h2>
                    </div>
                </div>
            </div>
        </a>
    </div>
</div>
<div class="col-xl-3 col-md-6">
    <div class="card widget-box-two bg-info">
        <a href="{{ route('teachers.index') }}">
            <div class="card-body">
                <div class="media">
                    <div class="media-body wigdet-two-content">
                        <p class="m-0 text-white text-uppercase">Total Teachers</p>
                        <h2 class="text-white"><span data-plugin="counterup">{{ $teachers }}</span></h2>
                    </div>
                </div>
            </div>
        </a>
    </div>
</div> --}}


</div>
@endsection