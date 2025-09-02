@extends('frontend.layouts.main')
@section('main-section')
    <section class="hero-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-7">
                    <h1 class="display-4">{{ $banners->heading }}</h1>
                    <div class="description">
                        {!! $banners->description !!}
                    </div>

                    <a href="{{ route('chapters') }}" class="btn btn-primary btn-lg">Explore Courses</a>
                    <a href="{{ route('about') }}" class="btn btn-outline-light btn-lg">Learn More</a>
                </div>
                 <div class="col-lg-5 mt-4 mt-lg-0 hero-image">
                    <img src="{{ asset('uploads/banners/' . $banners->image) }}" alt="Students learning online"
                        class="img-fluid w-100 h-auto rounded shadow-lg" style="object-fit: cover; max-height: 300px;">
                </div>
                <!--<div class="col-lg-5 mt-4 mt-lg-0 hero-image">-->
                <!--    <img src="{{ asset('uploads/banners/' . $banners->image) }}" alt="Students learning online"-->
                <!--        class="img-fluid rounded shadow-lg">-->
                <!--</div>-->
            </div>
        </div>
    </section>

    <!-- Partners Section -->
    <!-- <section class="partners-section text-center">
            <div class="container">
                <p class="text-muted mb-4">Trusted by over 1,000+ partners worldwide</p>

                <img src="https://via.placeholder.com/120x40/CCCCCC/888888?text=Partner1" alt="Partner 1">
                <img src="https://via.placeholder.com/120x40/CCCCCC/888888?text=Partner2" alt="Partner 2">
                <img src="https://via.placeholder.com/120x40/CCCCCC/888888?text=Partner3" alt="Partner 3">
                <img src="https://via.placeholder.com/120x40/CCCCCC/888888?text=Partner4" alt="Partner 4">
                <img src="https://via.placeholder.com/120x40/CCCCCC/888888?text=Partner5" alt="Partner 5">
            </div>
        </section> -->

    <!-- Popular Topics Section -->
    <section class="topics-section">
        <div class="container">
            @php
                $topics_cms = App\Models\Cms::find(1);
            @endphp
            <h2 class="section-title">{{ $topics_cms->heading }}</h2>
            <div class="row">
                <!-- Topic Card 1: Design -->
                @foreach ($homeservices as $homeservice)
                    <div class="col-lg-3 col-md-6 mb-4">
                        <div class="topic-card">
                            <div class="icon"><i class="fas fa-{{ $homeservice->heading2 }}"></i></div>
                            <h5>{{ $homeservice->heading }}</h5>
                            <p>{{ $homeservice->short_description }}</p>
                        </div>
                    </div>
                @endforeach

                {{-- <!-- Topic Card 2: Management -->
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="topic-card">
                        <div class="icon"><i class="fas fa-tasks"></i></div>
                        <h5>Management</h5>
                        <p>400+ Courses</p>
                    </div>
                </div>
                <!-- Topic Card 3: Programming -->
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="topic-card">
                        <div class="icon"><i class="fas fa-code"></i></div>
                        <h5>Programming</h5>
                        <p>400+ Courses</p>
                    </div>
                </div>
                <!-- Topic Card 4: Business -->
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="topic-card">
                        <div class="icon"><i class="fas fa-briefcase"></i></div>
                        <h5>Business</h5>
                        <p>400+ Courses</p>
                    </div>
                </div>
                <!-- Topic Card 5: Audio + Music -->
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="topic-card">
                        <div class="icon"><i class="fas fa-headphones-alt"></i></div>
                        <h5>Audio + Music</h5>
                        <p>400+ Courses</p>
                    </div>
                </div>
                <!-- Topic Card 6: Finance -->
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="topic-card">
                        <div class="icon"><i class="fas fa-chart-line"></i></div>
                        <h5>Finance</h5>
                        <p>400+ Courses</p>
                    </div>
                </div>
                <!-- Topic Card 7: Accounting -->
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="topic-card">
                        <div class="icon"><i class="fas fa-calculator"></i></div>
                        <h5>Accounting</h5>
                        <p>400+ Courses</p>
                    </div>
                </div>
                <!-- Topic Card 8: Content Writing -->
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="topic-card">
                        <div class="icon"><i class="fas fa-pen-nib"></i></div>
                        <h5>Content Writing</h5>
                        <p>400+ Courses</p>
                    </div>
                </div> --}}
            </div>
            <div class="text-center mt-4">
                <a href="{{ route('chapters') }}" class="btn btn-primary">View All Topics</a>
            </div>
        </div>
    </section>

    <!-- Benefits Section -->
    <section class="benefits-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 mb-4 mb-lg-0">
                    <!-- Replace with a relevant image -->
                    <img src="{{ asset('/uploads/home_about/' . $homeabout->image1) }}" alt="Team working together"
                        class="img-fluid rounded shadow">
                </div>
                <div class="col-lg-6">
                    <h2 class="mb-3">{{ $homeabout->heading }}</h2>
                    <div class="homeabout-description">
                        {!! $homeabout->description !!}
                    </div>
                    {{-- <p class="mb-4">Gain professional skills with our flexible, engaging courses. Learn at your own pace,
                        connect with experts, and achieve your career goals faster.</p> --}}
                    <ul class="list-unstyled">
                        @foreach ($highlights as $highlight)
                        <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i>{{$highlight->heading  }}</li>
    
                        @endforeach
                        {{-- <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i> Lifetime Access</li>
                        <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i> Learn Anywhere, Anytime
                        </li>
                        <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i> Get Certified</li> --}}
                    </ul>
                    <a href="{{ route('chapters') }}" class="btn btn-primary mt-3">Start Learning Now</a>
                </div>
            </div>
        </div>
    </section>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const descriptionElement = document.querySelector(
                '.description'); // Replace '.description' with the correct class or ID of your element
            const descriptionHTML = descriptionElement.innerHTML;

            // Check if the description contains <p> tags
            if (descriptionHTML.includes('<p>')) {
                // Add the "lead" class to all <p> tags in the element
                descriptionElement.innerHTML = descriptionHTML.replace(/<p>/g, '<p class="lead">');
            }
        });
        document.addEventListener('DOMContentLoaded', () => {
            const homeAboutElement = document.querySelector(
            '.homeabout-description'); // Replace with your actual selector
            const content = homeAboutElement.innerHTML;

            if (content.includes('<p>')) {
                homeAboutElement.innerHTML = content.replace(/<p>/g, '<p class="mb-4">');
            }
        });
    </script>
@endsection
