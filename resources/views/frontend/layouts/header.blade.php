@php
    $setting = \App\Models\Setting::first();
    // $seo_setting = \App\SeoSetting::where('id',1)->first();

    $currentRouteName = Route::currentRouteName();
    $currentSlug = request()->route('slug');
    $seo_setting = \App\Models\SeoSetting::where('page_name', $currentRouteName)->first();
    if (!$seo_setting && $currentSlug) {
        $seo_setting = \App\Models\SeoSetting::where('page_name', $currentSlug)->first();
    }
    if (!$seo_setting) {
        $seo_setting = \App\Models\SeoSetting::where('page_name', 'home')->first();
    }
@endphp
<!DOCTYPE html>
<html class="no-js" lang="en">
<meta charset="UTF-8">

<title>{{ $seo_setting->title }}</title>

<!-- SEO Meta Tags -->
<meta name="description" content="{{ $setting->description }}">
<meta name="keywords" content="{{ $seo_setting->keywords }}">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="author" content="">

<meta property="og:locale" content="en_US">
<meta property="og:type" content="website">
<meta property="og:title" content="{{ $seo_setting->og_title }}">
<meta property="og:description" content="{{ $seo_setting->og_description }}">
<meta property="og:site_name" content="{{ $setting->site_name }}">

<meta property="og:updated_time" content="2021-04-13T14:03:56+00:00">
<meta property="og:image" content="{{ asset("site_settings/$seo_setting->og_image") }}">
<meta property="og:image:secure_url" content="{{ asset("site_settings/$seo_setting->og_image") }}">
<meta property="og:image:width" content="521">
<meta property="og:image:height" content="210">
<meta property="og:image:alt" content="Homepage">
<meta property="og:image:type" content="image/png">
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="{{ $seo_setting->twitter_title }}">
<meta name="twitter:description" content="{{ $seo_setting->twitter_description }}">
<meta name="twitter:image" content="{{ asset("site_settings/$seo_setting->twitter_image") }}">
<link rel="shortcut icon" type="image/x-icon" href="{{ asset("site_settings/$setting->favicon") }}">
<!-- Favicon -->
<link rel="icon" type="image/x-icon" href="{{ asset("site_settings/$setting->favicon") }}">

<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

<!-- Font Awesome (for icons) -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
    integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

<!-- Google Fonts (Poppins) -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<!-- Custom CSS -->
<link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">
<link rel="stylesheet" href="{{ asset('frontend/css/quiz_info.css') }}">
<style>
    /* .sticky-logo {
    max-width: 150px;
    height: auto;
} */
</style>
<!-- Navbar -->


<body>
    <nav class="navbar navbar-expand-lg sticky-top shadow-sm">
        <div class="container">
           <a class="navbar-brand d-flex align-items-center" href="{{ route('home') }}">
    @if($setting->site_name_option === 'yes')
 <h1 class="mb-0 fw-bold" style="font-size: 1.5rem;">{{ $setting->site_name }}</h1>    @else
        <img src="{{ asset('site_settings/' . $setting->logo) }}" 
             alt="Site Logo"
             style="height: 40px; width: auto; display: block;">
    @endif
</a>


            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('about') }}">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('chapters') }}">Courses</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('contact') }}">Contact</a>
                    </li>
                </ul>

                <div class="d-flex align-items-center">
                    @if (!session()->has('uid'))
                        <a href="{{ route('student.login') }}" class="btn btn-outline-primary me-2">Login</a>
                        <a href="{{ route('signup') }}" class="btn btn-primary">Sign Up</a>
                    @else
                        <!-- User Icon Dropdown -->
                        <div class="dropdown">
                            <button class="btn btn-link p-0" type="button" id="userDropdown">
                                <img src="{{ asset('frontend/user.png') }}" alt="User Icon"
                                    style="width: 35px; height: 35px; border-radius: 50%; object-fit: cover;">
                            </button>
                        </div>

                        <!-- Right-Side Sliding Panel -->
                        <div id="sidePanel" class="side-panel">
                            <div class="side-panel-content">
                                <!-- Close Button -->
                                <button id="closePanel" class="close-btn">&times;</button>

                                <!-- Profile Information -->
                                <div class="dropdown-header text-center">
                                    {{-- @php
                                        $uid=Session('ui');
                                        dd($uid);
                                    @endphp --}}
                                    @php
                                        $uid=session('uid');
                                        $username=App\Models\Signup::where('uid',$uid)->first();
                                        // dd($username);

                                    @endphp
                                    <p class="fw-bold mb-0">{{ $username->name }}</p>
                                    <small class="text-muted">{{ $username->email }}</small>
                                </div>

                                <!-- Links -->
                                <hr class="dropdown-divider">
                                <a href="{{ route('quizinfo') }}"
                                    class="dropdown-item d-flex align-items-center gap-2">
                                    <i class="fas fa-info-circle"></i> Quiz Info
                                </a>
                                <form action="{{ route('student.logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="dropdown-item d-flex align-items-center gap-2">
                                        <i class="fas fa-sign-out-alt"></i> Logout
                                    </button>
                                </form>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </nav>
