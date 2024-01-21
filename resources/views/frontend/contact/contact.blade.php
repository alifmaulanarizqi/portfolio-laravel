@extends('frontend.main-master')
@section('main')

<!-- breadcrumb-area -->
@include('frontend.body.breadcrumb')
<!-- breadcrumb-area-end -->

<!-- contact-info-area -->
<section class="contact-info-area">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6">
                <div class="contact__info">
                    <div class="contact__info__icon">
                        <img src="{{ asset('frontend/assets/img/icons/contact_icon01.png') }}" alt="">
                    </div>
                    <div class="contact__info__content">
                        <h4 class="title">address line</h4>
                        <span>{{ $contact->address }}, {{ $contact->nation }}</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="contact__info">
                    <div class="contact__info__icon">
                        <img src="{{ asset('frontend/assets/img/icons/contact_icon02.png') }}" alt="">
                    </div>
                    <div class="contact__info__content">
                        <h4 class="title">Phone Number</h4>
                        <span>{{ $contact->phone }}</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="contact__info">
                    <div class="contact__info__icon">
                        <img src="{{ asset('frontend/assets/img/icons/contact_icon03.png') }}" alt="">
                    </div>
                    <div class="contact__info__content">
                        <h4 class="title">Email Address</h4>
                        <span>{{ $contact->email }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- contact-info-area-end -->

<!-- contact-area -->
<section class="homeContact homeContact__style__two">
    <div class="container">
        <div class="homeContact__wrap">
            <div class="row">
                <div class="col-lg-6">
                    <div class="section__title">
                        <span class="sub-title">Say hello</span>
                        <h2 class="title">Any questions? Feel free <br> to contact</h2>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="homeContact__form">
                        <form action="{{ route('send.message') }}" method="POST">
                            @csrf
                            <input type="text" name="name" placeholder="Enter name*">
                            <input type="email" name="email" placeholder="Enter email*">
                            <input type="text" name="subject" placeholder="Enter subject*">
                            <textarea name="message" placeholder="Enter Massage*"></textarea>
                            <button type="submit">Send Message</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- contact-area-end -->

@endsection
