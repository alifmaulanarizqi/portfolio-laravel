@extends('frontend.main-master')
@section('main')

<!-- banner-area -->
@include('frontend.home-all.home-slide')
<!-- banner-area-end -->

<!-- about-area -->
@include('frontend.home-all.about-me')
<!-- about-area-end -->

<!-- experience-area -->
@include('frontend.home-all.experience')
<!-- experience-area-end -->

<!-- portfolio-area -->
@include('frontend.home-all.portfolio')
<!-- portfolio-area-end -->

<!-- blog-area -->
<section class="blog">
</section>
<!-- blog-area-end -->

<!-- contact-area -->
@include('frontend.home-all.contact')
<!-- contact-area-end -->

@endsection
