@extends('frontend.main-master')
@section('main')

<main>

    <!-- breadcrumb-area -->
    @include('frontend.body.breadcrumb')
    <!-- breadcrumb-area-end -->

    <!-- about-area -->
    <section class="about about__style__two">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="about__image">
                        <img src="{{ asset($aboutMe->image) }}" alt="">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about__content">
                        <div class="section__title">
                            <span class="sub-title">01 - About me</span>
                            <h2 class="title">{{ $aboutMe->title }}</h2>
                        </div>
                        <div class="about__exp">
                            <div class="about__exp__icon">
                                <img src="{{ asset('frontend/assets/img/icons/about_icon.png') }}" alt="">
                            </div>
                            <div class="about__exp__content">
                                <p><span>{{ $aboutMe->short_title }}</p>
                            </div>
                        </div>
                        <p class="desc">{{ $aboutMe->short_desc }}</p>
                        @if ($aboutMe->cv !== null)
                            <a href="{{ route('show.pdf') }}" target="_blank" class="btn">Download my cv</a>
                        @endif
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="about__info__wrap">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="about-tab" data-bs-toggle="tab" data-bs-target="#about" type="button"
                                    role="tab" aria-controls="about" aria-selected="true">About</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="skills-tab" data-bs-toggle="tab" data-bs-target="#skills" type="button"
                                    role="tab" aria-controls="skills" aria-selected="false">Skills</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="awards-tab" data-bs-toggle="tab" data-bs-target="#awards" type="button"
                                    role="tab" aria-controls="awards" aria-selected="false">awards</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="education-tab" data-bs-toggle="tab" data-bs-target="#education" type="button"
                                    role="tab" aria-controls="education" aria-selected="false">education</button>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="about" role="tabpanel" aria-labelledby="about-tab">
                                <p class="desc">{!! $aboutMe->long_desc !!}</p>
                            </div>
                            <div class="tab-pane fade" id="skills" role="tabpanel" aria-labelledby="skills-tab">
                                <div class="about__skill__wrap">
                                    <div class="row">
                                        @foreach ($skills as $skill)
                                            <div class="col-md-6">
                                                <div class="about__skill__item">
                                                    <h5 class="title">{{ $skill->name }}</h5>
                                                    <div class="progress">
                                                        <div class="progress-bar" role="progressbar" style="width: {{ $skill->proficiency }}%;" aria-valuenow="{{ $skill->proficiency }}" aria-valuemin="0" aria-valuemax="100"><span class="percentage">{{ $skill->proficiency }}%</span></div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="awards" role="tabpanel" aria-labelledby="awards-tab">
                                <div class="about__award__wrap">
                                    <div class="row justify-content-center">
                                        @foreach ($awards as $award)
                                            <div class="col-md-6 col-sm-9">
                                                <div class="about__award__item">
                                                    <div class="award__content">
                                                        <h5 class="title">{{ $award->title }}</h5>
                                                        <p>{{ $award->desc }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="education" role="tabpanel" aria-labelledby="education-tab">
                                <div class="about__education__wrap">
                                    <div class="row">
                                        @foreach ($educations as $education)
                                        <div class="col-md-6">
                                            <div class="about__education__item">
                                                <h3 class="title">{{ $education->school }}</h3>
                                                <span class="date">{{ \Carbon\Carbon::parse($education->entry_year)->format('M, Y') }} – {{ \Carbon\Carbon::parse($education->graduate_year)->format('M, Y') }}</span>
                                                <p>{{ $education->desc }}</p>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- about-area-end -->

</main>

@endsection
