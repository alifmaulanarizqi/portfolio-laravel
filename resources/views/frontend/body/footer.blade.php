@php
    $contactMe = \App\Models\Contact::find(1);
@endphp

<footer class="footer">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-lg-4">
                <div class="footer__widget">
                    <div class="fw-title">
                        <h5 class="sub-title">Contact us</h5>
                    </div>
                    <div class="footer__widget__text">
                        <p>{{ $contactMe->short_desc }}</p>
                        <br>
                        <p class="text-light">{{ $contactMe->phone }}</p>
                        <a class="text-light" href="mailto:{{$contactMe->email}}" class="mail">{{ $contactMe->email }}</a>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-sm-6">
                <div class="footer__widget">
                    <div class="fw-title">
                        <h5 class="sub-title">my address</h5>
                    </div>
                    <div class="footer__widget__address">
                        <p>{{ $contactMe->address }}, {{ $contactMe->nation }}</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-sm-6">
                <div class="footer__widget">
                    <div class="fw-title">
                        <h5 class="sub-title">Follow me</h5>
                    </div>
                    <div class="footer__widget__social">
                        <ul class="footer__social__list">
                            @if ($contactMe->linkedin)
                                <li><a href="{{ $contactMe->linkedin }}" target="_blank"><i class="fab fa-linkedin-in"></i></a></li>
                            @endif
                            @if ($contactMe->instagram)
                                <li><a href="{{ $contactMe->instagram }}" target="_blank"><i class="fab fa-instagram"></i></a></li>
                            @endif
                            @if ($contactMe->twitter)
                                <li><a href="{{ $contactMe->twitter }}" target="_blank"><i class="fab fa-twitter"></i></a></li>
                            @endif
                            @if ($contactMe->youtube)
                                <li><a href="{{ $contactMe->youtube }}" target="_blank"><i class="fab fa-youtube"></i></a></li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright__wrap">
            <div class="row">
                <div class="col-12">
                    <div class="copyright__text text-center">
                        <p>Copyright @ Theme_Pure 2021 All right Reserved</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
