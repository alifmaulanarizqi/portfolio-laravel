@extends('frontend.main-master')
@section('main')

<!-- banner-area -->
@include('frontend.home-all.home-slide')
<!-- banner-area-end -->

<!-- about-area -->
@include('frontend.home-all.about-me')
<!-- about-area-end -->

<!-- portfolio-area -->
<section class="portfolio">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-8">
                <div class="section__title text-center">
                    <span class="sub-title">04 - Portfolio</span>
                    <h2 class="title">All creative work</h2>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-12">
                <ul class="nav nav-tabs portfolio__nav" id="portfolioTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="all-tab" data-bs-toggle="tab" data-bs-target="#all"
                            type="button" role="tab" aria-controls="all" aria-selected="true">All</button>
                    </li>
                    @foreach (array_keys($portfolioBasedOnCategory) as $portfolioCategory)
                        @php
                            $formattedCategory = strtolower(str_replace(' ', '-', $portfolioCategory));
                        @endphp

                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="{{ $formattedCategory }}-tab" data-bs-toggle="tab" data-bs-target="#{{ $formattedCategory }}"
                                type="button" role="tab" aria-controls="{{ $formattedCategory }}"
                                aria-selected="false">{{ $portfolioCategory }}</button>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    <div class="tab-content" id="portfolioTabContent">
        <div class="tab-pane show active" id="all" role="tabpanel" aria-labelledby="all-tab">
            <div class="container">
                <div class="row gx-0 justify-content-center">
                    <div class="col">
                        <div class="portfolio__active">

                            @foreach ($portfolioBasedOnCategory as $valueOuter)
                                @foreach ($valueOuter as $valueInner)

                                    <div class="portfolio__item">
                                        <div class="portfolio__thumb">
                                            <img src="{{ asset($valueInner->imageThumbnail) }}"
                                                alt="Portfolio Image" style="width:100%; height:500px; object-fit: cover;">
                                                <div style="position:absolute; top:0; left:0; width:100%; height:100%; background-color: rgba(0, 0, 0, 0.5);"></div>
                                        </div>
                                        <div class="portfolio__overlay__content">
                                            <span>{{ $valueInner->category }}</span>
                                            <h4 class="title"><a href="portfolio-details.html">{{ $valueInner->title }}</a></h4>
                                            <a href="portfolio-details.html" class="link">Case Study</a>
                                        </div>
                                    </div>

                                @endforeach
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>

        @foreach ($portfolioBasedOnCategory as $keyOuter => $valueOuter)
            @php
                $formattedCategory = strtolower(str_replace(' ', '-', $keyOuter));
            @endphp

            <div class="tab-pane" id="{{ $formattedCategory }}" role="tabpanel"
            aria-labelledby="{{ $formattedCategory }}-tab">
                <div class="container">
                    <div class="row gx-0 justify-content-center">
                        <div class="col">
                            <div class="portfolio__active">

                                @foreach ($valueOuter as $valueInner)
                                    <div class="portfolio__item">
                                        <div class="portfolio__thumb">
                                            <img src="{{ asset($valueInner->imageThumbnail) }}"
                                                alt="Portfolio Image" style="width:100%; height:500px; object-fit: cover;">
                                                <div style="position:absolute; top:0; left:0; width:100%; height:100%; background-color: rgba(0, 0, 0, 0.5);"></div>
                                        </div>
                                        <div class="portfolio__overlay__content">
                                            <span>{{ $valueInner->category }}</span>
                                            <h4 class="title"><a href="portfolio-details.html">{{ $valueInner->title }}</a></h4>
                                            <a href="portfolio-details.html" class="link">Case Study</a>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        @endforeach
    </div>
</section>
<!-- portfolio-area-end -->

<!-- partner-area -->
<section class="partner">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <ul class="partner__logo__wrap">
                    <li>
                        <img class="light" src="assets/img/icons/partner_light01.png" alt="">
                        <img class="dark" src="assets/img/icons/partner_01.png" alt="">
                    </li>
                    <li>
                        <img class="light" src="assets/img/icons/partner_light02.png" alt="">
                        <img class="dark" src="assets/img/icons/partner_02.png" alt="">
                    </li>
                    <li>
                        <img class="light" src="assets/img/icons/partner_light03.png" alt="">
                        <img class="dark" src="assets/img/icons/partner_03.png" alt="">
                    </li>
                    <li>
                        <img class="light" src="assets/img/icons/partner_light04.png" alt="">
                        <img class="dark" src="assets/img/icons/partner_04.png" alt="">
                    </li>
                    <li>
                        <img class="light" src="assets/img/icons/partner_light05.png" alt="">
                        <img class="dark" src="assets/img/icons/partner_05.png" alt="">
                    </li>
                    <li>
                        <img class="light" src="assets/img/icons/partner_light06.png" alt="">
                        <img class="dark" src="assets/img/icons/partner_06.png" alt="">
                    </li>
                </ul>
            </div>
            <div class="col-lg-6">
                <div class="partner__content">
                    <div class="section__title">
                        <span class="sub-title">05 - partners</span>
                        <h2 class="title">I proud to have collaborated with some awesome companies</h2>
                    </div>
                    <p>I'm a bit of a digital product junky. Over the years, I've used hundreds of web and
                        mobile apps in different industries and verticals. Eventually, I decided that it would
                        be a fun challenge to try designing and building my own.</p>
                    <a href="contact.html" class="btn">Start a conversation</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- partner-area-end -->

<!-- testimonial-area -->
<section class="testimonial">
    <div class="container">
        <div class="row align-items-center justify-content-between">
            <div class="col-lg-6 order-0 order-lg-2">
                <ul class="testimonial__avatar__img">
                    <li><img src="assets/img/images/testi_img01.png" alt=""></li>
                    <li><img src="assets/img/images/testi_img02.png" alt=""></li>
                    <li><img src="assets/img/images/testi_img03.png" alt=""></li>
                    <li><img src="assets/img/images/testi_img04.png" alt=""></li>
                    <li><img src="assets/img/images/testi_img05.png" alt=""></li>
                    <li><img src="assets/img/images/testi_img06.png" alt=""></li>
                    <li><img src="assets/img/images/testi_img07.png" alt=""></li>
                </ul>
            </div>
            <div class="col-xl-5 col-lg-6">
                <div class="testimonial__wrap">
                    <div class="section__title">
                        <span class="sub-title">06 - Client Feedback</span>
                        <h2 class="title">Happy clients feedback</h2>
                    </div>
                    <div class="testimonial__active">
                        <div class="testimonial__item">
                            <div class="testimonial__icon">
                                <i class="fas fa-quote-left"></i>
                            </div>
                            <div class="testimonial__content">
                                <p>We are motivated by the satisfaction of our clients. Put your trust in us
                                    &share in our H.Spond Asset Management is made up of a team of expert,
                                    committed and experienced people with a passion for financial markets. Our
                                    goal is to achieve continuous.</p>
                                <div class="testimonial__avatar">
                                    <span>Rasalina De Wiliamson</span>
                                </div>
                            </div>
                        </div>
                        <div class="testimonial__item">
                            <div class="testimonial__icon">
                                <i class="fas fa-quote-left"></i>
                            </div>
                            <div class="testimonial__content">
                                <p>We are motivated by the satisfaction of our clients. Put your trust in us
                                    &share in our H.Spond Asset Management is made up of a team of expert,
                                    committed and experienced people with a passion for financial markets. Our
                                    goal is to achieve continuous.</p>
                                <div class="testimonial__avatar">
                                    <span>Rasalina De Wiliamson</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial__arrow"></div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- testimonial-area-end -->

<!-- blog-area -->
<section class="blog">
    <div class="container">
        <div class="row gx-0 justify-content-center">
            <div class="col-lg-4 col-md-6 col-sm-9">
                <div class="blog__post__item">
                    <div class="blog__post__thumb">
                        <a href="blog-details.html"><img src="assets/img/blog/blog_post_thumb01.jpg" alt=""></a>
                        <div class="blog__post__tags">
                            <a href="blog.html">Story</a>
                        </div>
                    </div>
                    <div class="blog__post__content">
                        <span class="date">13 january 2021</span>
                        <h3 class="title"><a href="blog-details.html">Facebook design is dedicated to what's new
                                in design</a></h3>
                        <a href="blog-details.html" class="read__more">Read mORe</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-9">
                <div class="blog__post__item">
                    <div class="blog__post__thumb">
                        <a href="blog-details.html"><img src="assets/img/blog/blog_post_thumb02.jpg" alt=""></a>
                        <div class="blog__post__tags">
                            <a href="blog.html">Social</a>
                        </div>
                    </div>
                    <div class="blog__post__content">
                        <span class="date">13 january 2021</span>
                        <h3 class="title"><a href="blog-details.html">Make communication Fast and
                                Effectively.</a></h3>
                        <a href="blog-details.html" class="read__more">Read mORe</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-9">
                <div class="blog__post__item">
                    <div class="blog__post__thumb">
                        <a href="blog-details.html"><img src="assets/img/blog/blog_post_thumb03.jpg" alt=""></a>
                        <div class="blog__post__tags">
                            <a href="blog.html">Work</a>
                        </div>
                    </div>
                    <div class="blog__post__content">
                        <span class="date">13 january 2021</span>
                        <h3 class="title"><a href="blog-details.html">How to increase your productivity at work
                                - 2021</a></h3>
                        <a href="blog-details.html" class="read__more">Read mORe</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="blog__button text-center">
            <a href="blog.html" class="btn">more blog</a>
        </div>
    </div>
</section>
<!-- blog-area-end -->

<!-- contact-area -->
<section class="homeContact">
    <div class="container">
        <div class="homeContact__wrap">
            <div class="row">
                <div class="col-lg-6">
                    <div class="section__title">
                        <span class="sub-title">07 - Say hello</span>
                        <h2 class="title">Any questions? Feel free <br> to contact</h2>
                    </div>
                    <div class="homeContact__content">
                        <p>There are many variations of passages of Lorem Ipsum available, but the majority have
                            suffered alteration in some form</p>
                        <h2 class="mail"><a href="mailto:Info@webmail.com">Info@webmail.com</a></h2>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="homeContact__form">
                        <form action="#">
                            <input type="text" placeholder="Enter name*">
                            <input type="email" placeholder="Enter mail*">
                            <input type="number" placeholder="Enter number*">
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
