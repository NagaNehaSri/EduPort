@extends('frontend.layouts.main')
@section('main-section')
    <!-- Navbar -->

    <!-- Page Header -->
    <header class="page-header">
        <div class="container">
                @php
                $about_cms = App\Models\Cms::find(2);
                @endphp
            <h1>{{ $about_cms->heading}}</h1>
            {!!$about_cms->description!!}
            <!--<p>Our mission is to make quality education accessible to everyone, everywhere.</p>-->
        </div>
    </header>

    <!-- Main Content -->
    <main class="container my-5">
        <!-- Section 1: Our Story / Mission -->
        <section class="about-section mb-5">
            <div class="row align-items-center">
                <div class="col-lg-6 mb-4 mb-lg-0">
                    <h2>{{ $about->heading }}</h2>
                    {!! $about->aboutpage_description !!}
                    {{-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                    <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p> --}}
                    <a href="{{ route('chapters') }}" class="btn btn-primary mt-2">Explore Our Courses</a>
                </div>
                <div class="col-lg-6">
                    <!-- Replace with relevant images -->
                    <div class="row g-3">
                        <div class="col-6">
                            <img src="{{ asset('uploads/about/' . $about->aboutpage_image) }}" class="img-fluid shadow"
                                alt="Team meeting">
                        </div>
                        <div class="col-6">
                            <img src="{{ asset('uploads/about/' . $about->aboutpage_image_2) }}" class="img-fluid shadow"
                                alt="Woman studying">
                        </div>
                        <div class="col-12">
                            <img src="{{ asset('uploads/about/' . $about->aboutpage_image_3) }}" class="img-fluid shadow"
                                alt="Online learning setup">
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Section 2: Founder / Team Quote -->
        <section class="text-center bg-light p-5 rounded mb-5 shadow-sm">
            <img src="{{ asset('uploads/about/' . $ceomessage->image) }}" alt="Founder" class="rounded-circle mb-3"
                style="width: 120px; height: 120px; object-fit: cover;">
            <h4 class="mb-3">"{{ $ceomessage->tag }}"</h4>
            <p class="lead fst-italic mb-1">{{ $ceomessage->heading }}</p>
            <p class="text-muted">{{ $ceomessage->designation }}</p>
        </section>


        <!-- Section 3: Why Choose Us / Values -->
        <section class="values-section mb-5">
            @php
                $why_learn_cms = App\Models\Cms::find(2);
            @endphp
            <h2 class="text-center mb-5">{{ $why_learn_cms->heading  }}</h2>
            <div class="row text-center">
                @foreach ( $whatweprovides as $whatweprovide )
                <div class="col-md-4 mb-4 value-item">
                    <div class="icon"><i class="fas fa-{{ $whatweprovide->icon_name }}"></i></div>
                    <h5>{{ $whatweprovide->title}}</h5>
                    {!!  $whatweprovide->short_description  !!}
                </div>
                @endforeach
                
                {{-- <div class="col-md-4 mb-4 value-item">
                    <div class="icon"><i class="fas fa-book-open"></i></div>
                    <h5>Comprehensive Curriculum</h5>
                    <p>Access a wide range of courses covering the latest skills.</p>
                </div>
                <div class="col-md-4 mb-4 value-item">
                    <div class="icon"><i class="fas fa-infinity"></i></div>
                    <h5>Flexible Learning</h5>
                    <p>Study at your own pace, anytime, anywhere, with lifetime access.</p>
                </div> --}}
            </div>
        </section>

    </main>

    <!-- Footer -->
    <!-- Scripts -->
@endsection
