@extends('frontend.index')
@push('styles')
@endpush

@extends('frontend.partials.header')

{{--{{ dd($packageCompanies) }}--}}

@section('content')
    <section class="price-list animate__animated animate__fadeInLeft mt-2">
        <div class="container pb-5">
            <div class="row">
                <div class="col-12 pb-5">
                    <h1 class="py-5">Cennik pakietów</h1>
                    {!! $description_values[9]->content !!}
                </div>
            </div>
            <div class="row price-box pb-4 px-md-4 pt-4 mb-4">
                @foreach($packageCompanies as $company)
                    <div class="col-12 pb-5">
                        <div class="row">
                            <div class="col-12 price-box-title pt-md-3 text-md-end">
                                {{ $company->title }}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 py-3">
                                {{ $company->description }}
                            </div>
                        </div>

                        <div class="row gx-5 pt-3">
                            @foreach($packages as $package)
                                @if($package->price != "0.00")
                                    <div class="col-12 col-lg-4 pb-3 pb-md-5">
                                        <div class="price-box-item text-center">
                                            <div class="price-box-item-title py-3">
                                                {{ $package->name }}
                                            </div>
                                            <div class="price-box-item-img">
                                                <img src="{{asset('assets/images/price-list-item.png')}}">
                                            </div>
                                            <div class="price-box-item-description pt-2">packages
                                                {{ $package->quantityA }} <small>wysyłek (gabaryt A: 8cm x 38cm x 64cm)</small><br/>
                                                {{ $package->quantityB }} <small>wysyłek (gabaryt B: 19cm x 38cm x 64cm)</small><br/>
                                                {{ $package->quantityC }} <small>wysyłek (gabaryt C: 41cm x 38cm x 64cm)</small><br/>
                                            </div>
                                            <div class="price-box-item-hr my-3"></div>
                                            <div class="price-box-item-description pt-3">
                                                {{ $package->sms }} SMS
                                            </div>
                                            <div class="price-box-item-hr my-3"></div>
                                            <div class="price-box-item-price pb-4 pt-3">{{ $package->price }} zł</div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
@extends('frontend.partials.footer')

@push('scripts')
@endpush
