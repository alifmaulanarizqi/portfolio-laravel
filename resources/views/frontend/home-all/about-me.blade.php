<style>
    .image-container {
        position: relative;
        display: inline-block;
    }

    .popup-text {
        display: none;
        position: absolute;
        background-color: #f1f1f1;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        z-index: 1;
    }

    .image-container:hover .popup-text {
        display: block;
    }
</style>

<section id="aboutSection" class="about">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <ul class="about__icons__wrap">
                    @foreach ($skills as $skill)
                        <li>
                            <div class="image-container">
                                <img class="light" src="{{ asset($skill->icon) }}" alt="Skill icon">
                                <div class="popup-text">{{ $skill->name }}</div>
                            </div>
                        </li>
                    @endforeach
                </ul>
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
                            <p>{{ $aboutMe->short_title }}</p>
                        </div>
                    </div>
                    <p class="desc">{{ $aboutMe->short_desc }}</p>
                    @if ($aboutMe->cv !== null)
                        <a href="{{ route('show.pdf') }}" target="_blank" class="btn">Download my cv</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
