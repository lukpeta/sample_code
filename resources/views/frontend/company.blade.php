@extends('frontend.index')
@push('styles')
@endpush

@extends('frontend.partials.header')

@section('content')
    <script src="https://geowidget.easypack24.net/js/sdk-for-javascript.js"></script>
    <script type="text/javascript">
        var activeModal = null;

        window.easyPackAsyncInit = function () {
            easyPack.init({
                defaultLocale: 'pl',
                locales: ['pl'],
                closeTooltip: true,
                mapType: 'google',
                searchType: 'google',
                map: {
                    initialTypes: ['parcel_locker'],
                    googleKey: '{{ env('GOOGLE_MAPS_GEOCODING_API_KEY') }}'
                },
                points: {
                    types: ['parcel_locker']
                },
                useGeolocation: true,
            });
            var map = easyPack.mapWidget('easypack-map', function (point) {
                if (activeModal == 1) {
                    $('#order_sending_parcel').val(point.name);
                    $('#myModal').modal('hide');
                } else {
                    $('#order_recipient_parcel').val(point.name);
                    $('#myModal').modal('hide');
                }
            });
        };
    </script>
    <link rel="stylesheet" href="https://geowidget.easypack24.net/css/easypack.css"/>

    <section class="company animate__animated animate__fadeInLeft mt-2">
        <div class="container">
            <div class="row">
                <div class="col-12 pb-5">
                    <h1 class="py-3 py-md-5">{{$company->companyDetails->settings['company_name'] }}</h1>
                    @if(session()->has('success'))
                        <div class="alert alert-success mt-2 mb-5">
                            {{ session()->get('success') }}
                        </div>
                    @endif
                    @if ($errors->any())
                        <div class="row alert alert-danger mt-2 mb-5">
                            @foreach ($errors->all() as $message)
                                <div class="error-pos">{{ $message }}</div><br/>
                            @endforeach
                        </div>
                    @endif
                    @if(Session::has('fail'))
                        <div class="alert alert-danger mt-2 mb-5">
                            {{Session::get('fail')}}
                        </div>
                    @endif

                    @if(request()->query('key') != '' && isset($fileName))
                        <div class="row py-5">
                            <div class="col-12 text-center mb-5">
                                <a href="{{ env('APP_URL') }}/inpost_label/{{ $fileName->inpost_label_file_name }}"
                                   target="_blank"><img
                                        src="{{ asset('assets/images/get-label.jpg') }}" alt="Pobierz etykietę"></a>
                            </div>
                        </div>
                    @endif

                    <ul class="nav nav-tabs" data-bs-tabs="tabs">
                        <li class="nav-item">
                            <a class="nav-link active" data-bs-toggle="tab" href="#shipment">Nadaj przesyłkę</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="true" data-bs-toggle="tab" href="#company">
                                O firmie</a>
                        </li>
                    </ul>
                    <div class="company-details tab-content">
                        <div class="tab-pane" id="company">
                            <div class="row px-3 pt-3 pt-md-5">
                                <div class="col-12 col-md-4 company-details-address px-md-5">
                                    <div class="pt-3 pt-md-5 mt-md-5">
                                        ul. {{ $company->companyDetails->settings['street'] }} {{ $company->companyDetails->settings['building_number'] }}
                                        <br/>
                                        {{ $company->companyDetails->settings['postal_code'] }} {{ $company->companyDetails->settings['city'] }}
                                        <br/>
                                        NIP: {{ $company->nip }}<br/>
                                    </div>
                                    <div class="pt-1 pt-md-3">
                                        @if($company->companyDetails->settings['phone'] != '')
                                            Tel.: {{ $company->companyDetails->settings['phone'] }}<br/>
                                        @endif
                                        @if($company->companyDetails->settings['email'] != '')
                                            E-mail: {{ $company->companyDetails->settings['email'] }}
                                        @endif
                                    </div>
                                </div>
                                <div class="col-12 col-md-8 pt-4 pt-md-0">
                                    <h2>{{$company->companyDetails->settings['company_name'] }}</h2>

                                    <div class="pt-3 pt-md-4">
                                        {{ nl2br($company->companyDetails->settings['description']) }}
                                    </div>
                                </div>
                            </div>
                            @if($company->show_map == 1 and $company->lat != '0.00000000' and $company->lng != '0.00000000')
                                <div class="row px-1 px-md-5 py-3 py-md-5 mt-2 mt-md-5 map text-center">
                                    <div id="company-map"></div>
                                </div>
                            @endif

                            <div class="row px-md-3 pb-5 mb-5 mt-2 mt-2 mt-2 mt-md-5">
                                <form id="contact-form" method="post"
                                      action="{{ route('contactWithCompany', ['slug' => $company->slug]) }}"
                                      role="form" autocomplete="off">
                                    {{ csrf_field()  }}

                                    <div class="row gx-3 px-3">
                                        <div class="col-12 col-md-4">
                                            <label for="name" class="form-label">Imię i nazwisko*:</label>
                                            <input type="text" class="form-control" id="name" name="name"
                                                   value="{{ old('name', (Auth::user()->name ?? null) ." ". (Auth::user()->surname ?? null)) }}"
                                                   required>
                                        </div>

                                        <div class="col-12 col-md-4">
                                            <label for="email" class="form-label">Twój adres e-mail*:</label>
                                            <input type="email" class="form-control" id="email" name="email"
                                                   value="{{ old('email', Auth::user()->email ?? null) }}"
                                                   required>
                                        </div>

                                        <div class="col-12 col-md-4">
                                            <label for="phone" class="form-label">Twój numer telefonu:</label>
                                            <input type="text" class="form-control" id="phone" name="phone"
                                                   value="{{ old('phone', Auth::user()->phone ?? null) }}">
                                        </div>
                                    </div>

                                    <div class="row px-3 pt-4">
                                        <div class="col-12">
                                            <label for="theme" class="form-label">Temat wiadomości*:</label>
                                            <input type="text" class="form-control" id="theme" name="theme"
                                                   value="{{ @old("theme") }}"
                                                   required>
                                        </div>
                                    </div>

                                    <div class="row px-3 pt-4">
                                        <div class="col-12">
                                            <label for="message" class="form-label">Treść wiadomości*:</label>
                                            <textarea name="message" id="message" class="form-control" cols="30"
                                                      rows="10" required>{{ @old("message") }}</textarea>
                                        </div>
                                    </div>


                                    <div class="icheck-primary ps-2 pt-3">
                                        <input type="checkbox" id="primary"/>
                                        <label for="primary">Zapoznałem się z <a
                                                href="{{ route('textPage', ['slug' => 'polityka-prywatnosci']) }}"
                                                target="_blank" class="text-decoration-underline">
                                                polityką prywatności</a>
                                            i wyrażam zgodę na archiwizację i przetwarzanie moich danych
                                            osobowych.</label>
                                    </div>
                                    @hasanyrole('individual|company')
                                    <div class="py-4 text-end"><input type="submit" value="Wyślij" class="send-btn">
                                    </div>
                                    @else
                                        <div class="text-center py-5">Wysłanie wiadomości możliwe jest po wcześniejszym
                                            zalogowaniu.
                                        </div>
                                        @endhasanyrole
                                </form>
                            </div>
                        </div>
                        <div class="tab-pane active" id="shipment">
                            <form id="contact-form" method="post"
                                  action="{{ route('orderPackage', ['slug' => $company->slug]) }}"
                                  role="form" autocomplete="off">
                                {{ csrf_field()  }}
                                <section class="shipment">
                                    <div class="row ps-3 pt-3 ps-md-5 pt-md-5">
                                        <div class="col-12 col-lg-2 title">
                                            Odbiorca:
                                        </div>
                                        <div class="col-12 col-lg-5">
                                            {{ $company->companyDetails->settings['company_name'] }}<br/>
                                            ul. {{ $company->companyDetails->settings['street'] }} {{ $company->companyDetails->settings['building_number'] }}
                                            <br/>
                                            {{ $company->companyDetails->settings['postal_code'] }} {{ $company->companyDetails->settings['city'] }}
                                            <br/>
                                            NIP: {{ $company->nip }}
                                        </div>
                                        <div class="col-12">
                                            <div class="pt-3">
                                                @if($company->companyDetails->settings['phone'] != '')
                                                    Tel.: {{ $company->companyDetails->settings['phone'] }}<br/>
                                                @endif
                                                @if($company->companyDetails->settings['email'] != '')
                                                    E-mail: {{ $company->companyDetails->settings['email'] }}<br/>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row ps-3 pt-3 ps-lg-5 pt-lg-5">
                                        <div class="col-12 col-lg-2 title">
                                            Nadawca:
                                        </div>
                                        <div class="col-12 col-lg-1  text-center py-4 py-lg-0">
                                            <img src="{{asset('assets/images/order.png')}}" class="img-fluid" alt="">
                                        </div>
                                        <div class="col-12 col-lg-9">
                                            <div class="row gx-3 px-md-3 me-3 me-md-0">
                                                <div class="col-12 col-md-5 pb-3 pb-md-0">
                                                    <input type="text" class="form-control" id="order_name"
                                                           name="order_name"
                                                           value="{{ old('order_name', Auth::user()->name ?? null) }}"
                                                           placeholder="Imię*"
                                                           required>
                                                </div>
                                                <div class="col-12 col-md-7 pb-3 pb-md-0">
                                                    <input type="text" class="form-control" id="order_surname"
                                                           name="order_surname"
                                                           value="{{ old('order_surname', Auth::user()->surname ?? null) }}"
                                                           placeholder="Nazwisko*"
                                                           required>
                                                </div>
                                            </div>

                                            <div class="row gx-3 px-md-3 me-3 me-md-0 pt-md-4">
                                                <div class="col-12 col-md-6 pb-3 pb-md-0">
                                                    <input type="text" class="form-control" id="order_address"
                                                           name="order_address"
                                                           value="{{ old('order_address', Auth::user()->street ?? null) }}"
                                                           placeholder="Ulica*"
                                                           required>
                                                </div>
                                                <div class="col-12 col-md-6 pb-3 pb-md-0">
                                                    <input type="text" class="form-control" id="building_number"
                                                           name="building_number"
                                                           value="{{ old('building_number', Auth::user()->building_number ?? null) }}"
                                                           placeholder="Numer budynku*"
                                                           required>
                                                </div>
                                            </div>

                                            <div class="row gx-3 px-md-3 pt-md-4 me-3 me-md-0">
                                                <div class="col-12 col-md-6 pb-3 pb-md-0">
                                                    <input type="text" class="form-control" id="order_city"
                                                           name="order_city"
                                                           value="{{ old('order_city', Auth::user()->city ?? null) }}"
                                                           placeholder="Miasto*"
                                                           required>
                                                </div>
                                                <div class="col-12 col-md-4 pb-3 pb-md-0">
                                                    <input type="text" class="form-control" id="order_post_code"
                                                           name="order_post_code"
                                                           value="{{ old('order_post_code', Auth::user()->postal_code ?? null) }}"
                                                           placeholder="Kod pocztowy*"
                                                           required>
                                                </div>
                                            </div>

                                            <div class="row gx-3 px-md-3 pt-md-4 me-3 me-md-0">
                                                <div class="col-12 col-md-6 pb-3 pb-md-0">
                                                    <input type="email" class="form-control" id="order_email"
                                                           name="order_email"
                                                           value="{{ old('order_email', Auth::user()->email ?? null) }}"
                                                           placeholder="Email*"
                                                           required>
                                                </div>
                                                <div class="col-12 col-md-6 pb-3 pb-md-0 me-4 me-md-0">
                                                    <input type="text" class="form-control" id="order_phone"
                                                           name="order_phone"
                                                           value="{{ old('order_phone', Auth::user()->phone ?? null) }}"
                                                           placeholder="Telefon*"
                                                           required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 pb-5 mt-3 text-center text-md-start">
                                            <img src="{{asset('assets/images/dotpay_big.png')}}" class="img-fluid pt-2"
                                                 alt="dotpay">
                                        </div>
                                    </div>
                                </section>

                                @if($company->companyDetails->settings['package_price_1'] > 0 || $company->companyDetails->settings['package_price_2'] > 0 || $company->companyDetails->settings['package_price_3'] > 0)
                                    <section class="shipment-order-form">
                                        <div class="row">
                                            <div class="col-3 col-md-2 pb-5">
                                                <img src="{{asset('assets/images/order_parcel.png')}}"
                                                     class="img-fluid ps-md-5">
                                            </div>
                                            <div class="col-3 col-md-10">
                                                <h2 class="pt-5 pb-3 pb-md-0">Przesyłka:</h2>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <h3 class="ps-md-5">Sposób przesyłki:</h3>
                                            <div class="col-12">
                                                <div class="shipment-order-form-options py-4 mt-2">
                                                    <div class="row px-3 ms-md-3">
                                                        <div class="col-12 col-md-4">
                                                            <div class="icheck-primary">
                                                                <input type="radio" class="shipping_method"
                                                                       name="shipping_method" checked value="1"/>
                                                                <label for="shipping_method">Paczka</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row pt-5">
                                            <h3 class="ps-md-5">Rodzaj przesyłki:</h3>
                                            <div class="col-12">
                                                <div class="shipment-order-form-options py-4 mt-2">
                                                    <div class="row px-3 ms-md-3">
                                                        <div class="col-12 col-md-4">
                                                            <div class="icheck-primary">
                                                                <input type="radio" id="package_type1"
                                                                       name="package_type"
                                                                       checked value="1" class="package_type"/>
                                                                <label for="package_type1">Paczkomat</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="row pt-5">
                                            <h3 class="ps-md-5">Rozmiar przesyłki:</h3>
                                            <div class="col-12">
                                                <div class="shipment-order-form-options py-4 mt-2">
                                                    <div class="row px-3">
                                                        @if($company->companyDetails->settings['package_price_1'] > 0)
                                                            <div class="col-12 col-md-4">
                                                                <div class="row align-items-center py-5 h-100">
                                                                    <div class="col-12 col-lg-4 text-center">
                                                                        <div class="icheck-primary">
                                                                            <input type="radio" id="package_size1"
                                                                                   name="package_size" checked value="1"
                                                                                   class="package_size"/>
                                                                            <label for="package_size1">
                                                                                <img
                                                                                    src="{{asset('assets/images/package_size1.png')}}"
                                                                                    class="img-fluid ms-3">
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                    <div
                                                                        class="col-12 col-lg-8 text-center text-lg-start pt-3 pt-xl-0">
                                                                        <div class="ms-3">
                                                                            <div
                                                                                class="shipment-order-form-option-title">
                                                                                Mała
                                                                            </div>
                                                                            <div
                                                                                class="shipment-order-form-option-description">
                                                                                max. {{ config('services.inpost.size_1_height') }}
                                                                                x {{ config('services.inpost.size_1_lenght') }}
                                                                                x {{ config('services.inpost.size_1_width') }}
                                                                                cm
                                                                            </div>
                                                                            <div
                                                                                class="shipment-order-form-option-description">
                                                                                do 25 kg
                                                                            </div>
                                                                            <div
                                                                                class="shipment-order-form-option-title pt-2">
                                                                                <strong>
                                                                                    <u>Cena: <span
                                                                                            class="price1"></span>
                                                                                        zł</u>
                                                                                </strong>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endif
                                                        @if($company->companyDetails->settings['package_price_2'] > 0)
                                                            <div class="col-12 col-md-4">
                                                                <div class="row align-items-center px-3 py-5 h-100">
                                                                    <div class="col-12 col-lg-4 text-center">
                                                                        <div class="icheck-primary">
                                                                            <input type="radio" id="package_size2"
                                                                                   name="package_size" value="2"
                                                                                   class="package_size"/>
                                                                            <label for="package_size2">
                                                                                <img
                                                                                    src="{{asset('assets/images/package_size2.png')}}"
                                                                                    class="img-fluid ms-3">
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                    <div
                                                                        class="col-12 col-lg-8 text-center text-lg-start pt-3 pt-xl-0">
                                                                        <div class="ms-3">
                                                                            <div
                                                                                class="shipment-order-form-option-title">
                                                                                Średnia
                                                                            </div>
                                                                            <div
                                                                                class="shipment-order-form-option-description">
                                                                                max. {{ config('services.inpost.size_2_height') }}
                                                                                x {{ config('services.inpost.size_2_lenght') }}
                                                                                price2
                                                                                x {{ config('services.inpost.size_2_width') }}
                                                                                cm
                                                                            </div>
                                                                            <div
                                                                                class="shipment-order-form-option-description">
                                                                                do 25 kg
                                                                            </div>
                                                                            <div
                                                                                class="shipment-order-form-option-title pt-2">
                                                                                <strong>
                                                                                    <u>Cena: <span
                                                                                            class="price2"></span>
                                                                                        zł</u>
                                                                                </strong>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endif
                                                        @if($company->companyDetails->settings['package_price_3'] > 0)
                                                            <div class="col-12 col-md-4">
                                                                <div class="row align-items-center px-3 py-5 h-100">
                                                                    <div class="col-12 col-lg-4 text-center">
                                                                        <div class="icheck-primary">
                                                                            <input type="radio" id="package_size3"
                                                                                   name="package_size" value="3"
                                                                                   class="package_size"/>
                                                                            <label for="package_size3">
                                                                                <img
                                                                                    src="{{asset('assets/images/package_size3.png')}}"
                                                                                    class="img-fluid ms-3">
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                    <div
                                                                        class="col-12 col-lg-8 text-center text-lg-start pt-3 pt-xl-0">
                                                                        <div class="ms-3">
                                                                            <div
                                                                                class="shipment-order-form-option-title">
                                                                                Duża
                                                                            </div>
                                                                            <div
                                                                                class="shipment-order-form-option-description">
                                                                                max. {{ config('services.inpost.size_3_height') }}
                                                                                x {{ config('services.inpost.size_3_lenght') }}
                                                                                x {{ config('services.inpost.size_3_width') }}
                                                                                cm
                                                                            </div>
                                                                            <div
                                                                                class="shipment-order-form-option-description">
                                                                                do 25 kg
                                                                            </div>
                                                                            <div
                                                                                class="shipment-order-form-option-title pt-2">
                                                                                <strong>
                                                                                    <u>Cena: <span
                                                                                            class="price3"></span>
                                                                                        zł</u>
                                                                                </strong>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row pt-5">
                                            <div class="col-12">
                                                <div class="shipment-order-form-value py-4 mt-2">
                                                    <div class="row px-3 pt-5 ms-md-3">
                                                        <div class="col-12">
                                                            <label for="order_sending_parcel" class="form-label">Wybierz
                                                                paczkomat, z którego chcesz nadać przesyłkę:* <br/><br/><a
                                                                    id="orderSendingParcel" class="hand"
                                                                    onclick="openPopupWithMap(1)">[wybierz
                                                                    z listy]</a><br/><br/></label>

                                                            <input type="text" name="order_sending_parcel"
                                                                   id="order_sending_parcel"
                                                                   class="form-control" readonly required
                                                                   value="{{ Auth::user()->shipping_default_inpost_parcel ?? null}}">
                                                        </div>
                                                    </div>

                                                    <div class="row px-3 pt-5 ms-md-3">
                                                        <div class="col-12">
                                                            <label for="order_recipient_parcel" class="form-label">Wybierz
                                                                paczkomat, z którego chcesz odebrać
                                                                przesyłkę:*<br/><br/><a
                                                                    id="orderSendingParcel" class="hand"
                                                                    onclick="openPopupWithMap(2)">[wybierz
                                                                    z listy]</a><br/><br/></label>
                                                            <input type="text" name="order_recipient_parcel"
                                                                   value="{{ Auth::user()->revicer_default_inpost_parcel ?? null}}"
                                                                   id="order_recipient_parcel" class="form-control"
                                                                   readonly
                                                                   required
                                                            >
                                                        </div>
                                                    </div>
                                                    <div class="row px-3 pt-5 ms-md-3">
                                                        <div class="col-12 col-md-4">
                                                            <div class="icheck-primary d-inline-block">
                                                                <input type="radio" id="shipping_company"
                                                                       name="shipping_company" checked value="1"/>
                                                                <label for="shipping_company"></label>
                                                            </div>
                                                            <img
                                                                src="{{asset('assets/images/inpost.png')}}"
                                                                class="img-fluid mx-3"> Paczkomat Inpost
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row pt-5">
                                            <div class="col-12 px-md-5">
                                                <label for="order_decsription" class="form-label px-2">Uwagi:</label>
                                                <textarea class="form-control" id="order_decsription" rows="9"
                                                          name="order_decsription">{{ @old("order_decsription") }}</textarea>
                                            </div>
                                        </div>

                                        <div class="row pt-5">
                                            <div class="col-12 px-md-5">
                                                <div class="icheck-primary ps-2 pt-3">
                                                    <input type="checkbox" id="primary2" name="accept1" required/>
                                                    <label for="primary2">Akceptuję <a
                                                            href="{{ route('textPage', ['slug' => 'regulamin']) }}"
                                                            target="_blank" class="text-decoration-underline">
                                                            regulamin serwisu*</a></label>
                                                </div>
                                                <div class="py-4 text-center">
                                                    @if($company->companyDetails->settings['ofert_type'] == 1)
                                                        <button class="send-btn3">Nadaj przesyłkę</button>
                                                    @else
                                                        <button class="send-btn3">Zapłać i nadaj przesyłkę</button>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                @endif
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="modal" id="myModal">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="modal_title"></h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div id="easypack-map"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Zamknij</button>
                </div>
            </div>
        </div>
    </div>
    <button type="button" class="btn btn-primary d-none" data-bs-toggle="modal" data-bs-target="#myModal"
            id="modalPopup">
        Open
    </button>


    <button type="button" class="btn btn-primary d-none errorModal" data-bs-toggle="modal"
            data-bs-target="#exampleModal">
    </button>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Informacja</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Proszę uzupełnić wszystkie pola oznaczone gwiazdką
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Zamknij</button>
                </div>
            </div>
        </div>
    </div>




    <button type="button" class="btn btn-primary d-none errorModal2" data-bs-toggle="modal"
            data-bs-target="#exampleModal2">
    </button>

    <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Informacja</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="discount-txt"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Zamknij</button>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
    <script>
        $(document).ready(function () {
            $(".send-btn").hide();

            $("#primary").click(function () {
                if ($("#primary").is(':checked')) {
                    $(".send-btn").show();
                } else {
                    $(".send-btn").hide();
                }
            });

            $("#primary2").click(function () {
                showOrderBtn();
            });

            function showOrderBtn() {
                if ($("#primary2").is(':checked') && status == 1) {
                    calculatePrice();
                }
            }
        });
    </script>
    <script
        src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_GEOCODING_API_KEY') }}&callback=initMap"
        async
    ></script>
    <script>
        var status = 0;
        $(document).ready(function () {
            calculatePrice();
            $('#package_size1').change(function () {
                calculatePrice();
            });

            $('#package_size2').change(function () {
                calculatePrice();
            });

            $('#package_size3').change(function () {
                calculatePrice();
            });

            $('#shipping_method').change(function () {
                calculatePrice();
            });

            $('#package_type1').change(function () {
                calculatePrice();
            });

            $(".send-btn3").click(function () {
                if (status == 1 && $('input[name=accept1]:checked')
                    && $("#primary2").is(':checked')
                    && $.trim($('#order_name').val()) != ''
                    && $.trim($('#order_surname').val()) != ''
                    && $.trim($('#order_address').val()) != ''
                    && $.trim($('#order_city').val()) != ''
                    && $.trim($('#order_post_code').val()) != ''
                    && $.trim($('#order_email').val()) != ''
                    && $.trim($('#order_phone').val()) != ''
                    && $.trim($('#order_sending_parcel').val()) != ''
                    && $.trim($('#order_recipient_parcel').val()) != ''
                ) {
                    console.log('send request....');
                } else {
                    $(".errorModal").trigger('click');
                    return false;
                }
            });

        });

        function calculatePrice() {
            $.getJSON('{{ route('calculatePrice') }}?&packageSize=' + $('input[name="package_size"]:checked').val() + '&slug={{ $company->slug }}', function (data) {
                if (data.status == 1) {
                    $('.price1').html(data.price_size_1);
                    $('.price2').html(data.price_size_2);
                    $('.price3').html(data.price_size_3);
                    status = data.status;
                    $(".send-btn3").show();
                } else {
                    $(".send-btn3").hide();
                }
            });
        }

        function openPopupWithMap(option) {
            var title, id = '';
            if (option == 1) {
                title = 'Wybierz paczkomat, z którego chcesz nadać przesyłkę: ';
                id = 'order_sending_parcel';
            } else {
                title = 'Wybierz paczkomat, z którego chcesz odebrać przesyłkę: ';
                id = 'order_recipient_parcel';
            }

            var modalTitle = document.getElementById('modal_title');
            modalTitle.innerHTML = '<b>' + title + '</b>';
            activeModal = option;
            document.getElementById('modalPopup').click();
        }

        @if($company->show_map == 1 and $company->lat != '0.00000000' and $company->lng != '0.00000000')
        function initMap() {
            const uluru = {lat: {{ $company->lat }}, lng: {{ $company->lng }}};
            const map = new google.maps.Map(document.getElementById("company-map"), {
                zoom: 16,
                center: uluru,
            });
            const contentString =
                "<b>{{$company->companyDetails->settings['company_name'] }}</b>";
            const infowindow = new google.maps.InfoWindow({
                content: contentString,
            });
            const marker = new google.maps.Marker({
                position: uluru,
                map,
                title: "{{$company->companyDetails->settings['company_name'] }}",
            });

            marker.addListener("click", () => {
                infowindow.open({
                    anchor: marker,
                    map,
                    shouldFocus: false,
                });
            });
        }

        @endif

    </script>
@endpush

@extends('frontend.partials.footer')

