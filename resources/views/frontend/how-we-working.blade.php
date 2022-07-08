@extends('frontend.index')
@push('styles')
@endpush

@extends('frontend.partials.header')

@section('content')
    <section class="how-we-working animate__animated animate__fadeInLeft mt-2">
        <div class="container">
            <div class="row">
                <div class="col-12 pb-5">
                    <h1 class="py-5">Poznaj jak to działa</h1>
                    {!! $description_values[10]->content !!}
                </div>
            </div>

            <div class="row pb-4 pb-lg-0">
                <div class="col-12 col-md-3 order-1">
                    <img src="{{ asset('assets/images/how-we-work-box1.png') }}" class="img-fluid pt-3 pt-md-0">
                </div>
                <div class="col-12 col-md-8 order-2 pt-5 pt-md-0">
                    <h2 class="ps-md-2 mt-md-5 pt-md-5 pb-md-5"><b>Chcę być klientem<br/>
                        indywidualnym</b></h2>

                    <hr>
                </div>
            </div>

            <div class="row text-md-end pb-3 pb-lg-0">
                <div class="col-12 col-md-6 order-1">
                    <h2 class="pb-2 pt-md-3 pb-md-4 pt-md-5">Zarejestruj się</h2>
                    {!! $description_values[11]->content !!}
                </div>
                <div class="col-12 col-md-6 text-center order-2">
                    <img src="{{ asset('assets/images/how-we-work-step1.png') }}" class="img-fluid pt-3 pt-md-0 d-none d-md-block">
                    <img src="{{ asset('assets/images/how-we-work-step1-s.png') }}" class="img-fluid pt-3 pt-md-0 d-block d-md-none">
                </div>
            </div>

            <div class="row pb-3 pb-lg-0">
                <div class="col-12 col-md-6 text-center order-2 order-md-1 text-md-end">
                    <img src="{{ asset('assets/images/how-we-work-step2.png') }}" class="img-fluid pt-3 pt-md-0 d-none d-md-block">
                    <img src="{{ asset('assets/images/how-we-work-step2-s.png') }}" class="img-fluid pt-3 pt-md-0 d-block d-md-none">
                </div>
                <div class="col-12 col-md-6 order-1 order-md-2">
                    <h2 class="pb-2 pt-3 pb-md-4 pt-md-5">Nadaj paczkę</h2>
                    {!! $description_values[12]->content !!}
                </div>
            </div>

            <div class="row text-md-end pb-0 pb-lg-0">
                <div class="col-12 col-md-6 order-1">
                    <h2 class="pb-2 pt-3 pb-md-4 pt-md-5">Twoja przesyłka jest już w drodze</h2>
                    {!! $description_values[13]->content !!}
                </div>
                <div class="col-12 col-md-6 text-center order-2">
                    <img src="{{ asset('assets/images/how-we-work-step3.png') }}" class="img-fluid pt-3 pt-md-0">
                </div>
            </div>

            <div class="pb-md-5 text-center"><img src="{{asset('assets/images/integration-hr.png')}}"
                                               class="img-fluid"></div>


            <div class="row pb-4 pb-lg-0">
                <div class="col-12 col-md-3 order-1">
                    <img src="{{ asset('assets/images/how-we-work-box2.png') }}" class="img-fluid pt-3 pt-md-0">
                </div>
                <div class="col-12 col-md-8 order-2 pt-5 pt-md-0">
                    <h2 class="ps-md-2 mt-md-5 pt-md-5 pb-md-5"><b>Chcę być klientem<br/>
                        firmowym</b></h2>
                    <hr>
                    <div class="pt-4">
                        {!! $description_values[14]->content !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@extends('frontend.partials.footer')

@push('scripts')
@endpush
