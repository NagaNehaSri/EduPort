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
<!-- footer__section__start -->
 <!-- Footer -->
 <footer>
	<div class="container">
	  <div class="row">
		<div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
		   <a class="footer-brand" href="{{ route('home') }}">
			<img src="{{ asset("site_settings/$setting->footer_logo") }}" alt="" class="mb-4"
			style="height: 50px">
		   </a>
		  <div class="mb-3">{!! $setting->description !!}</div>
		  <div class="social-icons">
			<a href="{{ $setting->facebook }}" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
			<a href="{{ $setting->twitter }}" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
			<a href="{{ $setting->instagram }}" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
			<a href="{{ $setting->linkedin }}" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
		  </div>
		</div>
		<div class="col-lg-2 col-md-6 mb-4 mb-lg-0">
		  <h5>Navigation</h5>
		  <ul class="list-unstyled">
			<li><a href="{{ route('home') }}">Home</a></li>
			<li><a href="{{ route('about') }}">About Us</a></li>
			<li><a href="{{ route('chapters') }}">Courses</a></li>
			<li><a href="{{ route('contact') }}">Contact</a></li>
		  </ul>
		</div>
		<div class="col-lg-3 col-md-6 mb-4 mb-lg-0">
		  <h5>Quick Links</h5>
		  <ul class="list-unstyled">
		
			<li><a href="{{ route('terms-conditions') }}">Terms of Service</a></li>
			<li><a href="{{ route('privacy-policy') }}">Privacy Policy</a></li>
			<li><a href="{{ route('refund-policy') }}">Refund Policy</a></li>
		  </ul>
		</div>
		<div class="col-lg-3 col-md-6 mb-4 mb-lg-0">
		  <h5>Contact Us</h5>
		  <ul class="list-unstyled">
			<li><i class="fas fa-map-marker-alt me-2"></i>{{ $setting->address }}</li>
			<li><i class="fas fa-phone me-2"></i> {{ $setting->mobile }}</li>
			<li><i class="fas fa-envelope me-2"></i> {{ $setting->email }}</li>
		  </ul>
		</div>
	  </div>
	  <div class="copyright">
		© {{ date('Y') }} {{ $seo_setting->title }}. All Rights Reserved.
	  </div>
	</div>
  </footer>
  <!-- Bootstrap JS Bundle -->
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
 
 <!-- Custom JS -->
 <script src="{{ asset('frontend/js/script.js') }}"></script>
 <script src="{{ asset('frontend/js/quiz_info.js') }}"></script>
  </body>
  </html>