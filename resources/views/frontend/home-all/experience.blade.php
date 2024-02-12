<section class="services">
    <div class="container">
        <div class="services__title__wrap">
            <div class="row align-items-center justify-content-between">
                <div class="col-xl-5 col-lg-6 col-md-8">
                    <div class="section__title">
                        <span class="sub-title">02 - my Experience</span>
                        <h2 class="title">Creates amazing digital experiences</h2>
                    </div>
                </div>
                <div class="col-xl-5 col-lg-6 col-md-4">
                    <div class="services__arrow"></div>
                </div>
            </div>
        </div>
        <div class="row gx-0 services__active">

            @foreach ($experiences as $experience)

                <div class="col-xl-3">
                    <div class="services__item">
                        <div class="services__content">
                            <h3 class="title">{{ $experience->company }}</h3>
                            <small class="text-muted">{{ $experience->role }}</small>
                            <small class="text-muted">{{ $experience->entry_date }} - {{ $experience->exit_date }}</small>
                            <p class="mt-3">{!! $experience->desc !!}</p>

                            @if ($experience->company_profile !== null)
                                <a href="{{ $experience->company_profile }}" target="_blank" class="btn border-btn mt-3">Componay Profile</a>
                            @endif
                        </div>
                    </div>
                </div>

            @endforeach

        </div>
    </div>
</section>
