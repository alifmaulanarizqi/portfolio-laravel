<section class="portfolio">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-8">
                <div class="section__title text-center">
                    <span class="sub-title">03 - Portfolio</span>
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
                                                alt="Portfolio Image" style="width:100%; height:520px; object-fit: cover;">
                                                <div style="position:absolute; top:0; left:0; width:100%; height:100%; background-color: rgba(0, 0, 0, 0.5);"></div>
                                        </div>
                                        <div class="portfolio__overlay__content">
                                            <span>{{ $valueInner->category }}</span>
                                            <h4 class="title"><a href="portfolio-details.html">{{ $valueInner->title }}</a></h4>
                                            <a href="{{ route('home.detail.portfolio', $valueInner->id) }}" class="link">Case Study</a>
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
                                                alt="Portfolio Image" style="width:100%; height:520px; object-fit: cover;">
                                                <div style="position:absolute; top:0; left:0; width:100%; height:100%; background-color: rgba(0, 0, 0, 0.5);"></div>
                                        </div>
                                        <div class="portfolio__overlay__content">
                                            <span>{{ $valueInner->category }}</span>
                                            <h4 class="title"><a href="portfolio-details.html">{{ $valueInner->title }}</a></h4>
                                            <a href="{{ route('home.detail.portfolio', $valueInner->id) }}" class="link">Case Study</a>
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
