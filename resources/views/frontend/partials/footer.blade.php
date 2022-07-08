@section('footer')
    <section class="dotpay-box pb-3 pt-5">
        <div class="container">
            <div class="row">
                <div class="col-12 text-end">Naszym operatorem płatności jest <a href="https://dotpay.pl"
                                                                                 target="_blank"><img
                            src="{{ asset('assets/images/dotpay.png') }}" class="ps-4"></a></div>
            </div>
        </div>
    </section>
    <footer>
        <div class="container">
            <div class="arrow-btn text-center"><img src="{{ asset('assets/images/arrow-bottom.png') }}"
                                                    class="position-relative"></div>
            <div class="row pt-md-4 footer-underline">
                <div class="col-12 col-lg-3 text-center text-lg-start pb-3 pb-lg-0">
                    <a href="/" class="d-inline-block pe-5">
                        <img src="{{ asset('assets/images/logo-bottom.png') }}" alt="logo"
                             class="img-fluid footer-logo">
                    </a>
                </div>
                <div class="col-12 col-lg-9 pt-lg-2 pt-3">
                    <div class="row bottom-menu">
                        <div class="col-12 col-md-3">
                            <ul>
                                <li><a href="{{ route('howWeWork') }}">Jak to działa</a></li>
                                <li><a href="{{ route('priceList') }}">Cennik</a></li>
                                <li><a href="{{ route('blog') }}">Blog</a></li>
                            </ul>
                        </div>
                        <div class="col-12 col-md-3">
                            <ul>
                                <li><a href="{{ route('textPage', ['slug' => 'regulamin']) }}">Regulamin</a></li>
                                <li><a href="{{ route('textPage', ['slug' => 'polityka-prywatnosci']) }}">Polityka
                                        prywatności</a></li>
                                <li><a href="{{ route('integration') }}">Integracja</a></li>
                            </ul>
                        </div>

                        <div class="col-12 col-md-3 text-center text-md-end">
                            <a href="#" target="_blank"><img src="{{ asset('assets/images/fb.png') }}"
                                                             class="pb-3 pb-md-0"></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row pb-4 pt-3">
                <div class="col-12 col-md-6 text-center text-lg-start copyright pt-2 pt-md-1">
                    ©2022 odsylamy.pl | Wszelkie prawa zastrzeżone
                </div>
                <div class="col-12 col-md-6 text-center text-lg-end copyright pt-2 pt-md-1">Projekt i wykonanie:
                    <a href="https://petastudio.pl" title="Tworzenie portali" target="_blank"><img
                            src="{{ asset('assets/images/ps.svg') }}" alt="tworzenie portali Gdynia"
                            class="img-fluid petastudio ps-2"></a>
                </div>
            </div>
        </div>
    </footer>
@endsection
