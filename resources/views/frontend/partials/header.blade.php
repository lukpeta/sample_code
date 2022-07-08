@section('header')
    <header>
        <div class="container pt-2">
            <div class="text-center text-md-end">
                <div class="header-bg-menu d-md-inline">
                    <div class="pe-md-3 d-block d-md-inline top-right-line">
                        <div id="google_translate_element"></div>
                    </div>
                    <span class="ps-md-3 d-block d-none d-md-inline"><a href="{{ route('tracking') }}">Śledzenie przesyłki <img
                                src="{{ asset('assets/images/eye.png') }}" class="ps-1"> </a></span>
                </div>
            </div>
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container px-0 px-md-1">
                    <a class="navbar-brand" href="/">
                        <img src="{{ asset('assets/images/logo.png') }}" alt="logo" class="img-fluid logo pe-xl-5">
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav w-100 d-flex justify-content-between">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('howWeWork') }}">Jak to działa </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('priceList') }}">Cennik </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link"
                                   href="{{ route('textPage', ['slug' => 'regulamin']) }}">Regulamin </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('blog') }}">Blog </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </header>
@endsection
