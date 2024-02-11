@extends('frontend.main-master')
@section('main')

{{-- lightslider --}}
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/lightslider/1.1.6/css/lightslider.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0.5/dist/fancybox.css">

<style>
    .vrmedia-gallery {
        max-width: 80%;
        background: white;
        padding: 12px;
        box-shadow: rgb(100 100 111 / 20%) 0px 7px 29px 0px;
        border-radius: 8px;
        backdrop-filter: opacity(0.5)
    }

    .vrmedia-gallery img {
        object-fit: cover;
        width: 100%
    }

    .vrmedia-gallery .lSGallery {
        display: inline-flex
    }

    .vrmedia-gallery .lSGallery li {
        border-radius: 12px !important
    }

    .vrmedia-gallery .lSGallery li.active {
        border: 1px solid #242423
    }
</style>

<!-- breadcrumb-area -->
@include('frontend.body.breadcrumb')
<!-- breadcrumb-area-end -->

<section class="services__details">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="services__details__thumb">
                    <img src="{{ asset($portfolio->image_thumbnail) }}" class="img-fluid" alt="Portfolio Image">
                </div>
                <div class="services__details__content">
                    <h2 class="title">{{ $portfolio->title }}</h2>
                    <p>{!! $portfolio->desc !!}</p>

                    <br>

                    @if (count($portfolio->portfolioImages) > 0)
                        <h4 class="h4 mb-3">Project Images</h4>
                        <div class="vrmedia-gallery">
                            <ul class="ecommerce-gallery">
                                @foreach ($portfolio->portfolioImages as $portfolioImage)

                                    <li data-fancybox="gallery"
                                        data-thumb="{{ asset($portfolioImage->image) }}"
                                        data-src="{{ asset($portfolioImage->image) }}">
                                        <img
                                            src="{{ asset($portfolioImage->image) }}">
                                    </li>

                                @endforeach
                            </ul>
                        </div>
                    @endif

                </div>
            </div>
            <div class="col-lg-4">
                <aside class="services__sidebar">
                    <div class="widget">
                        <h5 class="title">Project Information</h5>
                        <ul class="sidebar__contact__info">
                            @if ($portfolio->client !== null)
                                <li><span>Client :</span> American</li>
                            @endif
                            <li><span>Category :</span> {{ $portfolio->portfolioCategory->name }}</li>
                            @if ($portfolio->project_link !== null)
                                <li><span>Project Link :</span> <a target="_blank" href="{{ $portfolio->project_link }}">{{ $portfolio->project_link }}</a></li>
                            @endif
                        </ul>
                    </div>
                </aside>
            </div>
        </div>
    </div>
</section>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script defer src="https://cdnjs.cloudflare.com/ajax/libs/lightslider/1.1.6/js/lightslider.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0.5/dist/fancybox.umd.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $(".ecommerce-gallery").lightSlider({
            gallery: true,
            item: 1,
            loop: true,
            thumbItem: 4,
            thumbMargin: 10
        });
    });
</script>

@endsection
