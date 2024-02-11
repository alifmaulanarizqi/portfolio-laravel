@extends('frontend.main-master')
@section('main')

<!-- breadcrumb-area -->
@include('frontend.body.breadcrumb')
<!-- breadcrumb-area-end -->

<section class="portfolio__inner">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="portfolio__inner__nav">

                    <button class="active" data-filter="*">all</button>
                    @foreach (array_keys($portfolioBasedOnCategory) as $portfolioCategory)
                        @php
                            $formattedCategory = strtolower(str_replace(' ', '-', $portfolioCategory));
                        @endphp

                        <button data-filter=".{{ $formattedCategory }}">{{ $portfolioCategory }}</button>
                    @endforeach

                </div>
            </div>
        </div>

        <div class="portfolio__inner__active">

            @foreach ($portfolioBasedOnCategory as $keyOuter => $valueOuter)
                @php
                    $formattedCategory = strtolower(str_replace(' ', '-', $keyOuter));
                @endphp

                @foreach ($valueOuter as $valueInner)
                    <div class="portfolio__inner__item grid-item {{ $formattedCategory }}">
                        <div class="row gx-0 align-items-center">
                            <div class="col-lg-6 col-md-10">
                                <div class="portfolio__inner__thumb">
                                    <a href="portfolio-details.html">
                                        <img src="{{ asset($valueInner->imageThumbnail) }}" alt="Portfolio Image">
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-10">
                                <div class="portfolio__inner__content">
                                    <h2 class="title"><a href="portfolio-details.html">{{ $valueInner->title }}</a></h2>
                                    <p>{!! $valueInner->desc !!}</p>
                                    <a href="{{ route('home.detail.portfolio', $valueInner->id) }}" class="link">View Case Study</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endforeach

        </div>

    </div>
</section>

@endsection
