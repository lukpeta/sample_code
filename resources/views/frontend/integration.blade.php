@extends('frontend.index')
@push('styles')
@endpush

@extends('frontend.partials.header')

@section('content')
    <section class="integration animate__animated animate__fadeInLeft mt-2">
        <div class="container">
            <div class="row">
                <div class="col-12 pb-5">
                    <h1 class="py-5">Jak zacząć współpracę z odsylamy.pl?</h1>
                    <div class="row">
                        <div class="col-12 col-lg-6 pb-5 pb-lg-0">
                            <h2>{!! $description_values[15]->content !!}
                            </h2><br/>
                            {!! $description_values[16]->content !!}
                        </div>
                        <div class="col-12 col-lg-6 text-center">
                            <img src="{{asset('assets/images/integration2.png')}}" class="img-fluid">
                        </div>
                    </div>
                    <div class="pt-3 text-center"><img src="{{asset('assets/images/integration3.png')}}"
                                                       class="img-fluid"></div>
                    <div class="py-5 text-center"><img src="{{asset('assets/images/integration-hr.png')}}"
                                                       class="img-fluid"></div>
                    <div class="row">
                        <div class="col-12 col-lg-6 pb-5 pb-lg-0">
                            <div class="pt-md-5">{!! $description_values[17]->content !!}</div>
                        </div>
                        <div class="col-12 col-lg-6 text-center">
                            <img src="{{asset('assets/images/integration-domain.png')}}" class="img-fluid">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@extends('frontend.partials.footer')

@push('scripts')
@endpush
