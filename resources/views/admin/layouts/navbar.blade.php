@php
$site_settings = \App\Models\Setting::find('1')->first();
@endphp
<!-- Navigation Bar-->
<style type="text/css">
    #topnav .has-submenu.active>a {
        color: #030D38 !important;
    }

    #topnav .has-submenu.active .submenu li.active>a {
        color: #030D38 !important;
    }

    .navigation-menu>li .submenu li a:hover {
        color: #030D38 !important;
    }

    .navigation-menu>li>a:active,
    .navigation-menu>li>a:focus,
    .navigation-menu>li>a:hover {
        color: #030D38 !important;
    }
</style>
<header id="topnav">
    <!-- Topbar Start -->
    <div class="navbar-custom" style="background-color:#1abc9cc0;">
        <div class="container-fluid">
            <ul class="list-unstyled topnav-menu float-right mb-0">

                <li class="dropdown notification-list">
                    <!-- Mobile menu toggle-->
                    <a class="navbar-toggle nav-link">
                        <div class="lines">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </a>
                    <!-- End mobile menu toggle-->
                </li>

                <li class="dropdown notification-list">
                    <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect waves-light" data-toggle="dropdown"
                        href="#" role="button" aria-haspopup="false" aria-expanded="false">
                        <img src="{{ asset('admin_assets') . '/people.png' }}" alt="user-image" class="rounded-circle"
                            style="border: 3px solid #fff; height:40px; width: 40px;">
                    </a>
                    <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                        <!-- item-->
                        <a href="{{ route('admin_profile') }}" class="dropdown-item notify-item">
                            <i class="fe-user"></i>
                            <span>Profile</span>
                        </a>
                        <a href="{{ route('logs') }}" class="dropdown-item notify-item">
                            <i class="fe-hard-drive"></i>
                            <span>System Logs</span>
                        </a>
                        {{-- <a href="{{ route('roles.index') }}" class="dropdown-item notify-item">
                        <i class="fe-hard-drive"></i>
                        <span>Roles</span>
                        </a>
                        <a href="{{ route('user.index') }}" class="dropdown-item notify-item">
                            <i class="fe-hard-drive"></i>
                            <span>Add Staff</span>
                        </a> --}

                        {{-- <div class="dropdown-divider"></div> --}}

                        <!-- item-->
                        <a href="{{ route('logout') }}" class="dropdown-item notify-item">
                            <i class="fe-log-out"></i>
                            <span>Logout</span>
                        </a>

                    </div>
                </li>

            </ul>

            <!-- LOGO -->
           <div class="logo-box">
    <a href="{{ route('admin') }}" class="logo text-center logo-light">
        <!-- Large Logo -->
        <span class="logo-lg">
            <span class="logo-lg-text-light">
                <img src="{{ asset('site_settings/' . $site_settings->logo) }}" 
                     alt="Logo"
                     style="max-height: 50px; width: auto;">
            </span>
        </span>
        
        <!-- Small Logo -->
        <span class="logo-sm">
            <span class="logo-sm-text-light text-white">
                <img src="{{ asset('site_settings/' . $site_settings->logo) }}" 
                     alt="Small Logo"
                     style="max-height: 40px; width: auto;">
            </span>
        </span>
    </a>
</div>

            

        </div>
    </div>
    <!-- end Topbar -->

    <div class="topbar-menu">
        <div class="container-fluid">
            <div id="navigation">
                <!-- Navigation Menu-->
                <ul class="navigation-menu">

                    <li class="has-submenu">
                        <a href="{{ route('admin') }}">
                            <i class="fe-airplay"></i>Dashboard
                        </a>
                    </li>


                    <li class="has-submenu">
                        <a href="#"> <i class="fe-home"></i>Home
                            <div class="arrow-down"></div>
                        </a>
                        <ul class="submenu">
                            <li class="has-submenu">
                                <a href="{{ route('banner.edit',6) }}">Banner</a>
                            </li>
                            {{-- <li class="has-submenu">
                                <a href="{{ route('banner_feature.index') }}">Banner Feature</a>
                            </li> --}}
                            <li class="has-submenu">
                                <a href="{{ route('home_about.edit', 1) }}">Home About</a>
                            </li>
                            <!-- <li class="has-submenu">
                                <a href="{{ route('who_we_are.index') }}">Who We Are</a>
                            </li> -->

                            <li class="has-submenu">
                                <a href="{{ route('home_page_services.index') }}">Home Services</a>
                            </li>
                            {{-- <li class="has-submenu">
                                <a href="{{ route('what_we_provide.index') }}">What We Provide</a>
                            </li> --}}
                            {{-- <li class="has-submenu">
                                <a href="{{ route('home_page_enquiry.edit',2) }}">Home Page Enquiry </a>
                            </li> --}}




                            {{-- <li class="has-submenu">
                                <a href="{{ route('gallery.index') }}">Gallery</a>
                    </li> --}}

                    <!-- <li class="has-submenu">
                        <a href="{{ route('testimonial.index') }}">Testimonials</a>
                    </li> -->
                    {{-- <li class="has-submenu">
                        <a href="{{ route('count.index') }}">Counts</a>
                    </li> --}}
                    {{-- <li class="has-submenu">
                                <a href="{{ route('work.index') }}">Works</a>
                    </li>
                    <li class="has-submenu">
                        <a href="{{ route('location.edit', 1) }}">Location</a>
                    </li>
                    <li class="has-submenu">
                        <a href="{{ route('management.index') }}">Management</a>
                    </li>
                    <li class="has-submenu">
                        <a href="{{ route('explore.index') }}">Explore section</a>
                    </li> --}}
                </ul>



                </li>
                <li class="has-submenu">
                    <a href="#">
                        <i class="fe-user"></i> About
                        <div class="arrow-down"></div>
                    </a>

                    <ul class="submenu">
                        <li class="has-submenu">
                            <a href="{{ route('about.edit', 1) }}">About Us</a>

                        </li>
                        <li class="has-submenu">
                            <a href="{{ route('ceomessage.edit', 1) }}">CEO Message</a>

                        </li>
                        {{-- <li class="has-submenu">
                            <a href="{{ route('vision_mission.index' ) }}">Vision Mission </a>

                        </li> --}}
                        <li class="has-submenu">
                            <a href="{{ route('what_we_provide.index') }}">Why Learn With Us</a>

                        </li>
                        {{-- 
                      
                        <li class="has-submenu">
                            <a href="{{ route('succes_stories.edit', 1) }}">Succes Stories </a>

                        </li> --}}



                    </ul>



                </li>
                <li class="has-submenu">
                    <a href="#"> <i class="fe-package"></i>Chapters
                        <div class="arrow-down"></div>
                    </a>
                    <ul class="submenu">
                        <li class="has-submenu">
                            <a href="{{ route('categories.index') }}">Categories</a>

                        </li>
                        <li class="has-submenu">
                            <a href="{{ route('chapters.index') }}">Chapter</a>

                        </li>
                      
                        <!-- 
                        <li class="has-submenu">
                            <a href="{{ route('test_exams.index') }}">Test Exams</a>

                        </li> -->





                    </ul>



                </li>
                {{-- <li class="has-submenu">
                    <a href="#"> <i class="fas fa-graduation-cap"></i>Product
                        <div class="arrow-down"></div>
                    </a>
                    <ul class="submenu">
                        <li class="has-submenu">
                            <a href="{{ route('product.index') }}">Products</a>

                        </li>
                        <li class="has-submenu">
                            <a href="{{ route('product.index') }}">Products</a>

                        </li>
                        <!-- <li class="has-submenu">
                            <a href="{{ route('social_intiatives.edit',1) }}">Social Intiatives</a>

                        </li>
                        <li class="has-submenu">
                            <a href="{{ route('accreditations.edit',1) }}">Accreditations</a>

                        </li>
                        <li class="has-submenu">
                            <a href="{{ route('scholarship_faq.edit',1) }}">Scholarship Faq</a>
                        </li> -->





                    </ul>



                </li>
                <li class="has-submenu">
                    <a href="#"> <i class="fas fa-newspaper"></i>Adblue Benefits
                        <div class="arrow-down"></div>
                    </a>
                    <ul class="submenu">
                        <li class="has-submenu">
                            <a href="{{ route('adblue.edit',2) }}">Hero section</a>
                        </li>
                        <li class="has-submenu">
                            <a href="{{ route('adblue_benefits.index') }}">Adblue Benefits</a>
                        </li>
                        <li class="has-submenu">
                            <a href="{{ route('adblue_specifications.index') }}">Adblue Specifications</a>
                        </li>
                        <li class="has-submenu">
                            <a href="{{ route('adblue_solutions.index') }}">Adblue Solutions</a>
                        </li>
                        <li class="has-submenu">
                            <a href="{{ route('categories.index') }}">Categories</a>

                        </li>
                        <li class="has-submenu">
                            <a href="{{ route('spot_admissions.index') }}">Spot Admissions</a>

                        </li>
                        <li class="has-submenu">
                            <a href="{{ route('gallery.edit',1) }}">Gallery</a>

                        </li>
                        <li class="has-submenu">
                            <a href="{{ route('video_gallery_page.edit',1) }}">Video Gallery</a>
                        </li>
                    

                    </ul>



                </li> --}}
                {{-- <li class="has-submenu">
                        <a href="#"> <i class="fe-info"></i>About
                            <div class="arrow-down"></div>
                        </a>
                        <ul class="submenu">

                            <li class="has-submenu">
                                <a href="{{ route('about.edit', 1) }}">About</a>
                </li>

                <li class="has-submenu">
                    <a href="{{ route('why_choose_us_about.edit', 1) }}">Why choose us</a>
                </li>

                </ul>

                </li> --}}
                {{-- <li class="has-submenu">
                        <a href="#"> <i class="fe-file-text"></i>Resort
                            <div class="arrow-down"></div>
                        </a>
                        <ul class="submenu">
                            <li class="has-submenu">
                                <a href="{{ route('resortbanner.index') }}">Resort Banners</a>
                </li>
                <li class="has-submenu">
                    <a href="{{ route('resortgallery.index') }}">Resort Gallery</a>
                </li>
                <li class="has-submenu">
                    <a href="{{ route('facility.index') }}">Facilities</a>
                </li>
                <li class="has-submenu">
                    <a href="{{ route('highlight.index') }}">Highlights</a>
                </li>
                <li class="has-submenu">
                    <a href="{{ route('resort_section.index') }}">Resort Sections</a>
                </li>

                <li class="has-submenu">
                    <a href="{{ route('youtube.index') }}">Youtube Videos</a>
                </li>

                </ul>

                </li> --}}
                <!-- <li class="has-submenu">
                    <a href="#"> <i class="fe-folder"></i>Products
                        <div class="arrow-down"></div>
                    </a>
                    <ul class="submenu">
                        <li class="has-submenu">
                            <a href="{{ route('product_feature.index') }}">Products Feature</a>
                        </li>
                        <li class="has-submenu">
                            <a href="{{ route('product.index') }}">Products</a>
                        </li>
                        </ul>

                </li> -->

                {{-- <li class="has-submenu">
                                <a href="{{ route('blog.index') }}">Blogs</a>
                </li> --}}

                {{-- <li class="has-submenu">
                                <a href="{{ route('property.index') }}">Project</a>
                </li>
                <li class="has-submenu">
                    <a href="{{ route('flat.index') }}">Flat</a>
                </li> --}}
                {{-- <li class="has-submenu">
                                <a href="{{ route('categories.index') }}">Categories</a>
                </li> --}}

                {{-- <li class="has-submenu">
                                <a href="{{ route('youtube_video.index') }}">Youtube Video</a>
                </li> --}}
                <!--   <li class="has-submenu">
                                <a href="{{ route('team.index') }}">Team</a>
                            </li>
                            <li class="has-submenu">
                                <a href="{{ route('service.index') }}">Services</a>
                            </li> -->
                {{-- <li class="has-submenu">
                                <a href="{{ route('categories.index') }}">Categories</a>
                </li>
                <li class="has-submenu">
                    <a href="{{ route('product.index') }}">Products</a>
                </li>
                <li class="has-submenu">
                    <a href="{{ route('job.index') }}">Jobs</a>
                </li> --}}
{{-- 
                <li class="has-submenu">
                    <a href="#"> <i class="fe-folder"></i>Others
                        <div class="arrow-down"></div>
                    </a>
                    <ul class="submenu">
                        <li class="has-submenu">
                            <a href="{{ route('filling_station_locations.index') }}">Filling Stations</a>
                        </li>

                        <li class="has-submenu">
                                <a href="{{ route('blog.index') }}">Blogs</a>
                </li> 
            <li class="has-submenu">
                    <a href="{{ route('about.edit', 1) }}">About</a>

                </li>
                 <li class="has-submenu">
                    <a href="{{ route('service.index') }}">Services</a>
                </li>
                <li class="has-submenu">
                    <a href="{{ route('projects.index') }}">Projects</a>
                </li> 
                <li class="has-submenu">
                    <a href="{{ route('studyabroad.index') }}">Study Abroad</a>
                </li>
                <li class="has-submenu">
                    <a href="{{ route('blog.index') }}">Blog</a>
                </li>
                <li class="has-submenu">
                    <a href="{{ route('countries.index') }}">Country</a>
                </li>
                
                <li class="has-submenu">
                    <a href="{{ route('partner_with_us.edit',1) }}">Partner With Us</a>
                </li>
                <li class="has-submenu">
                    <a href="{{ route('career.index') }}">Career</a>
                </li>
              <li class="has-submenu">
                    <a href="{{ route('team.index') }}">Team</a>
                </li>
                <li class="has-submenu">
                    <a href="{{ route('career.index') }}">Career</a>
                </li>
                <li class="has-submenu">
                    <a href="{{ route('service.index') }}">Services</a>
                </li>
                 <li class="has-submenu">
                                <a href="{{ route('property.index') }}">Project</a>
                </li>
                <li class="has-submenu">
                    <a href="{{ route('flat.index') }}">Flat</a>
                </li> 
                <li class="has-submenu">
                                <a href="{{ route('categories.index') }}">Categories</a>
                </li> 

                 <li class="has-submenu">
                                <a href="{{ route('youtube_video.index') }}">Youtube Video</a>
                </li> 
                 <li class="has-submenu">
                                <a href="{{ route('team.index') }}">Team</a>
                            </li>
                            <li class="has-submenu">
                                <a href="{{ route('service.index') }}">Services</a>
                            </li> 
               <li class="has-submenu">
                                <a href="{{ route('categories.index') }}">Categories</a>
                </li>
                <li class="has-submenu">
                    <a href="{{ route('product.index') }}">Products</a>
                </li>
                <li class="has-submenu">
                    <a href="{{ route('job.index') }}">Jobs</a>
                </li> 
                </ul>

                </li> --}}

                <li class="has-submenu">
                    <a href="#"> <i class="fe-file-text"></i>CMS
                        <div class="arrow-down"></div>
                    </a>
                    <ul class="submenu">
                        {{-- <li class="{{ request()->is('active-ad*') ? 'active' : '' }}"><a
                            href="{{ route('active-ad.edit', 1) }}">Active/ Deactive Ad</a>
                </li> --}}
                {{-- <li class="has-submenu">
                                <a href="{{ route('content.index') }}">Contents</a>
                </li> --}}
                {{-- <li class="has-submenu">
                    <a href="{{ route('image_cms.index') }}">Images</a>
                </li> --}}
                <li class="has-submenu">
                    <a href="{{ route('cms.index') }}">Cms</a>
                </li>
                </ul>

                </li>
                <li
                    class="has-submenu {{ request()->is('site-settings*') || request()->is('social-media-settings*') || request()->is('seo-settings*') ? 'active' : '' }}">
                    <a href="#"> <i class="fe-settings"></i>Settings
                        <div class="arrow-down"></div>
                    </a>
                    <ul class="submenu">
                        <li class="{{ request()->is('site-settings*') ? 'active' : '' }}"><a
                                href="{{ route('site-settings.edit', 1) }}">Site Settings</a></li>
                        <li class="{{ request()->is('social-media-settings*') ? 'active' : '' }}"><a
                                href="{{ route('social-media-settings.edit', 1) }}">Social Media Settings</a>
                        </li>
                        <li class="{{ request()->is('seo-settings*') ? 'active' : '' }}"><a
                                href="{{ route('seo-settings.index') }}">SEO Settings</a></li>

                    </ul>
                </li>

                </ul>
                <!-- End navigation menu -->

                <div class="clearfix"></div>
            </div>
            <!-- end #navigation -->
        </div>
        <!-- end container -->
    </div>
    <!-- end navbar-custom -->

</header>
<!-- End Navigation Bar-->

<!-- ============================================================== -->
<!-- Start Page Content here -->
<!-- ============================================================== -->

<div class="content-page" style="">
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">