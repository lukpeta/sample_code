@extends('frontend.index')
@push('styles')
@endpush

@extends('frontend.partials.header')

@section('content')
    <section class="text-page animate__animated animate__fadeInLeft mt-2">
        <div class="container">
            <div class="row">
                <div class="col-12 pb-5">
                    <h1 class="py-5">Śledzenie przesyłki</h1>
                    <div class="row text-page-check-status mb-5">
                        <div class="col-12 py-4 py-lg-0 pt-lg-4 text-center">
                            <span class="d-inline pe-lg-4">Sprawdź status przesyłki:</span>
                            <form method="get" name="tracking" action="{{ route('tracking') }}" class="d-inline">
                                <input type="text" name="tracking" value="{{request()->get('tracking')}}" required
                                       placeholder="Wpisz numer przesyłki"
                                       class="my-2">
                                <input type="submit" value="Sprawdź" class="d-inline text-center mt-2 mt-xl-0 ms-md-4">
                            </form>
                        </div>
                    </div>
                    @if($tracking != null)
                    <div class="tracking-area pt-4">
                        @if(!isset($tracking['error']))
                            <div id="tracking">
                                <div class="text-center tracking-status-intransit">
                                    <p class="tracking-status text-tight">{{ $tracking['main_status']->title }}</p>
                                    <p class="tracking-status">
                                        <small>{{ $tracking['main_status']->description }}</small></p>
                                </div>
                                <div class="tracking-list">
                                    @foreach($tracking['tracking_details'] as $item)
                                        <div class="tracking-item">
                                            <div class="tracking-icon status-intransit">
                                                @if ($loop->last)<i class="fa fa-car"></i>
                                                @elseif ($loop->first)<i class="fa fa-check"></i>
                                                @else<i class="fa fa-circle"></i>@endif
                                            </div>
                                            <div class="tracking-date">{{ $item['datetime'] }}</div>
                                            <div class="tracking-content">{{ $item['status']->title ?? '' }}
                                                <span>{{ $item['status']->description ?? ''}}</span>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @else
                            <p class="text-center py-5">{{ $tracking['message'] ?? '' }}</p>
                        @endif
                    </div>
                    @else
                        <p class="text-center py-5">Proszę wprowadzić numer przesyłki InPost</p>
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection
@extends('frontend.partials.footer')

@push('scripts')
@endpush
