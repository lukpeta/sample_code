@extends('frontend.index')
@push('styles')
@endpush

@extends('frontend.partials.header')

@section('content')
    @if ($splashes->first())
        <section class="home-slider animate__animated animate__fadeInRight py-0">
            <div class="container">
                <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-indicators text-start mx-0 slide-pagination">
                        @foreach($splashes as $splash)
                            @if (isset($splash->mainImage) && !empty($splash->mainImage->first()->path))
                                <button type="button" data-bs-target="#carouselExampleIndicators"
                                        data-bs-slide-to="{{ $loop->index }}"
                                        class="@if ($loop->first) active @endif" aria-current="true"
                                        aria-label="Slide {{ $loop->index }}"></button>
                            @endif
                        @endforeach
                    </div>
                    <div class="carousel-inner">
                        @foreach($splashes as $splash)
                            @if (isset($splash->mainImage) && !empty($splash->mainImage->first()->path))
                                <div class="carousel-item @if ($loop->first) active @endif"><a
                                        href="{{ $splash->url }}">
                                        <img
                                            src="{{asset($splash->mainImage->first()->path)}}"
                                            alt="odsylamy.pl" class="d-block w-100">
                                    </a>
                                </div>
                            @endif
                        @endforeach
                    </div>
                    {{--                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"--}}
                    {{--                            data-bs-slide="prev">--}}
                    {{--                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>--}}
                    {{--                        <span class="visually-hidden">Previous</span>--}}
                    {{--                    </button>--}}
                    {{--                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"--}}
                    {{--                            data-bs-slide="next">--}}
                    {{--                        <span class="carousel-control-next-icon" aria-hidden="true"></span>--}}
                    {{--                        <span class="visually-hidden">Next</span>--}}
                    {{--                    </button>--}}
                </div>
            </div>
        </section>
    @endif

    <section class="home-check-status animate__animated animate__fadeInLeft">
        <div class="container">
            <div class="row">
                <div class="col-12 py-4 py-lg-0 pt-lg-4 text-center">
                    <span class="d-inline pe-lg-4">Status Twojej przesyłki:</span>
                    <form method="get" name="tracking" action="{{ route('tracking') }}" class="d-inline">
                        <input type="text" name="tracking" value="" required placeholder="Wpisz numer przesyłki"
                               class="my-2">
                        <input type="submit" value="Sprawdź" class="d-inline text-center mt-2 mt-xl-0 ms-md-4">
                    </form>
                </div>
            </div>
        </div>
    </section>

    <section class="home-how-we-work animate__animated animate__fadeInRight">
        <div class="container">
            <h1 class="text-center py-2 py-md-4">Oto jak działamy</h1>

            <div class="row text-md-end pb-3 pb-lg-0">
                <div class="col-12 col-md-6 order-1">
                    <h2 class="pb-2 pt-3 pb-md-4 pt-md-5">Załóż konto i wysyłaj paczki
                        za pomocą paru kliknięć</h2>
                    {!! $description_values[0]->content !!}
                </div>
                <div class="col-12 col-md-6 text-center order-2">
                    <img src="{{ asset('assets/images/how-we-work-1.png') }}"
                         class="img-fluid pt-3 pt-md-0 d-none d-md-block">
                    <img src="{{ asset('assets/images/how-we-work-1-s.png') }}"
                         class="img-fluid pt-3 pt-md-0 d-block d-md-none">
                </div>
            </div>

            <div class="row pb-3 pb-lg-0">
                <div class="col-12 col-md-6 text-center order-2 order-md-1 text-md-end">
                    <img src="{{ asset('assets/images/how-we-work-2.png') }}"
                         class="img-fluid pt-3 pt-md-0 d-none d-md-block">
                    <img src="{{ asset('assets/images/how-we-work-2-s.png') }}"
                         class="img-fluid pt-3 pt-md-0 d-block d-md-none">
                </div>
                <div class="col-12 col-md-6 order-1 order-md-2">
                    <h2 class="pb-2 pt-3 pb-md-4 pt-md-5">Kliknij „Wyślij paczkę”
                        – na stronie naszego partnera lub nadaj po NIP</h2>
                    {!! $description_values[1]->content !!}
                </div>
            </div>

            <div class="row text-md-end pb-3 pb-lg-0">
                <div class="col-12 col-md-6 order-1">
                    <h2 class="pb-2 pt-3 pb-md-4 pt-md-5">Wybierz parametry przesyłki i nadaj paczkę</h2>
                    {!! $description_values[2]->content !!}
                </div>
                <div class="col-12 col-md-6 text-center order-2">
                    <img src="{{ asset('assets/images/how-we-work-3.png') }}"
                         class="img-fluid pt-3 pt-md-0 d-none d-md-block">
                    <img src="{{ asset('assets/images/how-we-work-3-s.png') }}"
                         class="img-fluid pt-3 pt-md-0 d-block d-md-none">
                </div>
            </div>

            <div class="row pb-3 pb-lg-0">
                <div class="col-12 col-md-6 text-center order-2 order-md-1 text-md-end position-relative">
                    <a href="https://odsylamy.pl/rejestracja" class="home-how-we-work-read-more">Zacznij wysyłać</a>
                    <img src="{{ asset('assets/images/how-we-work-4.png') }}"
                         class="img-fluid pt-5 pt-md-0 position-relative home-how-we-work-last-step d-none d-md-inline">
                    <img src="{{ asset('assets/images/how-we-work-4-s.png') }}"
                         class="img-fluid pt-5 pt-md-0 position-relative home-how-we-work-last-step d-inline d-md-none">
                </div>
                <div class="col-12 col-md-6 order-1 order-md-2 pb-5 pb-md-0">
                    <h2 class="pb-2 pt-3 pb-md-4 pt-md-5">Twoją paczkę odeślemy do Ciebie za darmo!</h2>
                    {!! $description_values[3]->content !!}
                </div>
            </div>
        </div>
    </section>

    <section class="home-rental animate__animated animate__fadeInLeft pt-5 pb-4">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6 line-height-1">
                <div class="title1 text-center text-md-start">Być może</div>
                    <div class="title1 text-center text-md-start">prowadzisz</div>
                    <div class="title2 text-center text-md-start pt-2 pt-md-0">własną firmę?</div>
                </div>
                <div class="col-12 col-md-6">
                    <img src="{{ asset('assets/images/rental-steps.png') }}"
                         class="img-fluid pt-3 pt-md-0 d-none d-md-block">
{{--                    <img src="{{ asset('assets/images/rental-steps-s.png') }}"--}}
{{--                         class="img-fluid pt-3 pt-md-0 d-block d-md-none">--}}
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-4 line-height-1 col-xl-5 col-xxl-6">
                    <div class="title3 text-start pt-3">
                        {!! $description_values[4]->content !!}
                    </div>
                    <div class="pt-5">
                        <img src="{{ asset('assets/images/rental-steps2.png') }}"
                             class="img-fluid pt-3 pt-md-0 home-rental-step2 d-none d-md-block">
{{--                        <img src="{{ asset('assets/images/rental-steps2s.png') }}"--}}
{{--                             class="img-fluid pt-3 pt-md-0 home-rental-step2 d-block d-md-none">--}}
                    </div>
                </div>
                <div class="col-12 col-md-8 col-xl-7 col-xxl-6">
                    <div class="row pt-3 pt-md-2 pb-1 pb-md-3">
                        <div class="col-12 col-md-4 text-center">
                            <img src="{{ asset('assets/images/rental-step-ico1.png') }}" class="pb-3 pb-md-0">
                        </div>
                        <div class="col-12 col-md-8 ps-md-5 ps-lg-1">
                            <div class="description-title pt-5 text-start">
                                {!! $description_values[5]->content !!}
                            </div>
                        </div>
                    </div>

                    <div class="row pt-3 pt-md-2 pb-1 pb-md-3">
                        <div class="col-12 col-md-4 text-center">
                            <img src="{{ asset('assets/images/rental-step-ico2.png') }}" class="pb-3 pb-md-0">
                        </div>
                        <div class="col-12 col-md-8 ps-md-5 ps-lg-1">
                            <div class="description-title pt-5 text-start">
                                {!! $description_values[6]->content !!}
                            </div>
                        </div>
                    </div>

                    <div class="row pt-3 pt-md-2">
                        <div class="col-12 col-md-4 text-center">
                            <img src="{{ asset('assets/images/rental-step-ico3.png') }}" class="pb-3 pb-md-0">
                        </div>
                        <div class="col-12 col-md-8 ps-md-5 ps-lg-1">
                            <div class="description-title pt-5 text-start">
                                {!! $description_values[7]->content !!}
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <section class="home-why-us animate__animated animate__fadeInRight py-5">
        <div class="container">
            <h2 class="text-center py-3">Dlaczego my?</h2>
            <div class="row justify-content-center pt-2">
                <div class="col-6 col-sm-4 col-lg-3 col-xxl-2 pb-4 pb-md-0 fadeInUp animated">
                    <div class="why-us-list p-md-4 text-center">
                        <img src="{{ asset('assets/images/why-us1.png')}}" class="">
                        <div class="why-us-list-title pt-3">
                            Proste
                        </div>
                        <div class="why-us-list-title pt-1">
                            zamawianie
                        </div>
                    </div>
                </div>
                <div class="col-6 col-sm-4 col-lg-3 col-xxl-2 pb-4 pb-md-0 fadeInUp animated">
                    <div class="why-us-list p-md-4 text-center">
                        <img src="{{ asset('assets/images/why-us2.png')}}" class="">
                        <div class="why-us-list-title pt-3">
                            Szybka
                        </div>
                        <div class="why-us-list-title pt-1">
                            dostawa
                        </div>
                    </div>
                </div>
                <div class="col-6 col-sm-4 col-lg-3 col-xxl-2 pb-4 pb-md-0 fadeInUp animated">
                    <div class="why-us-list p-md-4 text-center">
                        <img src="{{ asset('assets/images/why-us3.png')}}" class="">
                        <div class="why-us-list-title pt-3">
                            Darmowe
                        </div>
                        <div class="why-us-list-title pt-1">
                            zwroty
                        </div>
                    </div>
                </div>
                <div class="col-6 col-sm-4 col-lg-3 col-xxl-2 pb-4 pb-md-0 fadeInUp animated">
                    <div class="why-us-list p-md-4 text-center">
                        <img src="{{ asset('assets/images/why-us4.png')}}" class="">
                        <div class="why-us-list-title pt-3">
                            Łatwy
                        </div>
                        <div class="why-us-list-title pt-1">
                            kontakt
                        </div>
                    </div>
                </div>
                <div class="col-6 col-sm-4 col-lg-3 col-xxl-2 pb-4 pb-md-0 fadeInUp animated">
                    <div class="why-us-list p-md-4 text-center">
                        <img src="{{ asset('assets/images/why-us5.png')}}" class="">
                        <div class="why-us-list-title pt-3">
                            Nowoczesne
                        </div>
                        <div class="why-us-list-title pt-1">
                            rozwiazania
                        </div>
                    </div>
                </div>
                <div class="col-6 col-sm-4 col-lg-3 col-xxl-2 pb-4 pb-md-0 fadeInUp animated">
                    <div class="why-us-list p-md-4 text-center">
                        <img src="{{ asset('assets/images/why-us6.png')}}" class="">
                        <div class="why-us-list-title pt-3">
                            Dobre
                        </div>
                        <div class="why-us-list-title pt-1">
                            ceny
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="home-integration animate__animated animate__fadeInLeft pt-5">
        <div class="container pt-md-5">
            <div class="row">
                <div class="col-12 col-md-4 right-line">
                    <h2 class="pt-4"><span class="title">Integracja</span><br/> z partnerami</h2>
                </div>
                <div class="col-12 col-md-8 ps-md-5">
                    <div class="pt-5">
                        {!! $description_values[8]->content !!}
                    </div>
                </div>
            </div>
            <div class="row pt-5">
                <div class="col-12 text-center">
                    <img src="{{ asset('assets/images/integration.png') }}" class="img-fluid">
                </div>
            </div>
        </div>
    </section>

    @if($comments->count() > 0)
        <section class="home-opinions animate__animated animate__fadeInRight pt-5">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center">
                        <h2><span class="title"><b>Opinie</b></span> naszych Klientów:</h2>
                    </div>
                    <div class="col-12 bg px-md-5">
                        <div id="opinionsCarousel" class="carousel slide py-5 d-none d-md-block"
                             data-bs-ride="carousel">
                            <div class="carousel-indicators position-relative">
                                @foreach($comments->chunk(3) as $chunk)
                                    <button type="button" data-bs-target="#opinionsCarousel"
                                            data-bs-slide-to="{{ $loop->index }}" @if ($loop->first) class="active"
                                            aria-current="true" @endif aria-label="Slide {{ $loop->index }}"></button>
                                @endforeach
                            </div>
                            <div class="carousel-inner pt-md-3">
                                @foreach($comments->chunk(3) as $chunk)
                                    <div class="carousel-item @if ($loop->first) active @endif">
                                        <div class="px-4">
                                            <div class="row gx-5">
                                                @foreach($chunk as $item)
                                                    <div class="col-12 col-lg-4">
                                                        <div class="comment mb-3 mb-lg-0">
                                                            {!! $item->content !!}
                                                            <div class="author py-4">{{ $item->author }}</div>
{{--                                                            <div class="text-center position-relative"><img--}}
{{--                                                                    src="{{ asset('assets/images/comments-item.png') }}"--}}
{{--                                                                    class="position-absolute comment-item"></div>--}}
                                                        </div>
{{--                                                        <img src="{{ asset('assets/images/comments-shadow.png') }}"--}}
{{--                                                             class="img-fluid mt-2">--}}
                                                    </div>

                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>


                        <div id="opinionsCarousel2" class="carousel slide py-5 d-block d-md-none"
                             data-bs-ride="carousel">
                            <div class="carousel-indicators position-relative">
                                @foreach($comments as $item)
                                    <button type="button" data-bs-target="#opinionsCarousel2"
                                            data-bs-slide-to="{{ $loop->index }}" @if ($loop->first) class="active"
                                            aria-current="true" @endif aria-label="Slide {{ $loop->index }}"></button>
                                @endforeach
                            </div>
                            <div class="carousel-inner pt-md-3">
                                @foreach($comments as $item)
                                    <div class="carousel-item @if ($loop->first) active @endif">
                                        <div class="px-4">
                                            <div class="row gx-5">
                                                <div class="col-12 col-lg-4">
                                                    <div class="comment mb-3 mb-lg-0">
                                                        {!! $item->content !!}
                                                        <div class="author py-4">{{ $item->author }}</div>
                                                        <div class="text-center position-relative"><img
                                                                src="{{ asset('assets/images/comments-item.png') }}"
                                                                class="position-absolute comment-item"></div>
                                                    </div>
{{--                                                    <img src="{{ asset('assets/images/comments-shadow.png') }}"--}}
{{--                                                         class="img-fluid mt-2">--}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>
    @endif

    <section class="home-polish-capital animate__animated animate__fadeInLeft">
        <div class="container-fluid">
            <div class="row">
                <img src="{{ asset('assets/images/polish-capital.jpg') }}" class="img-fluid">
            </div>
        </div>
    </section>

    <section class="home-stats animate__animated animate__fadeInRight">
        <div class="container">
            <h2 class="py-3 py-xl-5 text-center"><b>Odsyłamy.pl</b> w liczbach</h2>
            <div class="row pb-5">
                <div class="col-12 col-md-3 right-line">
                    <div class="count">2000+</div>
                    <div class="description">Odwiedzin strony</div>
                </div>
                <div class="col-12 col-md-3 right-line">
                    <div class="count">500+</div>
                    <div class="description">Zamówionych
                        przesyłek
                    </div>
                </div>
                <div class="col-12 col-md-3 right-line">
                    <div class="count">200+</div>
                    <div class="description">Zadowolonych użytkowników</div>
                </div>
                <div class="col-12 col-md-3">
                    <div class="count">100+</div>
                    <div class="description">Współpracujących firm</div>
                </div>
            </div>
        </div>
    </section>

    @if($partners->count() > 0)
        <section class="home-partners animate__animated animate__fadeInLeft">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h2 class="py-3 py-xl-5 text-center">Nasi operatorzy pocztowi</h2>
                        <div class="owl-carousel owl-theme pb-5">
                            @foreach($partners as $partner)
                                <div class="item">
                                    <img src="{{ asset('upload/otherfile') }}/{{ $partner->file_name }}"
                                         alt="{{ $partner->name }}">
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif

    <section class="home-blog animate__animated animate__fadeInRight">
        <div class="container pb-3">
            <div class="row">
                <div class="col-12">
                    <h2 class="py-3 py-xl-5 text-center">Co słychać? - BLOG</h2>
                    <div class="row">
                        @foreach($blogs as $blog)
                            <div class="col-12 col-md-6 col-lg-4 pb-3 pb-lg-0">
                                <div class="news-item text-center text-md-start">
                                    <a href="{{ route('blogView', ['slug' => $blog->slug]) }}">
                                        @php
                                            if(isset($blog->mainImage()->first()->path)){
                                                $image = $blog->mainImage()->first()->path;
                                            }
                                            else {
                                                $image = 'storage/none.jpg';
                                            }
                                        @endphp
{{--                                        <div class="news-item-img position-relative img-fluid m-auto m-md-0 text-center"--}}
{{--                                             style="background-image: url('{{ asset($image) }}');background-repeat: no-repeat">--}}
{{--                                        </div>--}}
                                        <div class="news-item-img position-relative img-fluid m-auto m-md-0 text-center">
                                            <img src="{{ asset($image) }}" class="img-fluid">
                                        </div>
                                        <div class="news-item-title mt-3 text-center">{!! $blog->title !!}
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                        <div class="pt-5"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('frontend.partials.popup')
@endsection
@extends('frontend.partials.footer')

@push('scripts')
    <script>
        $('.owl-carousel').owlCarousel({
            loop: true,
            margin: 10,
            responsiveClass: true,
            autoplay: true,
            autoplayTimeout: 2000,
            autoplayHoverPause: true,
            responsive: {
                0: {
                    items: 1,
                    nav: true
                },
                600: {
                    items: 3,
                    nav: true
                },
                1100: {
                    items: 4,
                    nav: true,
                    loop: true
                },
                1200: {
                    items: 5,
                    nav: true,
                    loop: true
                }
            }
        })
    </script>
@endpush
