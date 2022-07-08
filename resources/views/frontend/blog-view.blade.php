@extends('frontend.index')
@push('styles')
@endpush

@extends('frontend.partials.header')

@section('content')
    <section class="text-page animate__animated animate__fadeInLeft mt-2">
        <div class="container">
            <div class="row">
                <div class="col-12 pb-5">
                    <h1 class="py-5">{!! $blog->title !!}</h1>
{{--                    @if(isset($blog->mainImage()->first()->path))--}}
{{--                        <div class="d-inline-block py-4">--}}
{{--                            <img src="{{ asset($blog->mainImage()->first()->path) }}" alt="{{ $blog->title }}" title="{{ $blog->title }}" class="img-fluid">--}}
{{--                        </div>--}}
{{--                    @endif--}}
                    <div class="text-small py-3">{!!  $blog->event_date->format('Y-m-d') !!}</div>
                    <div class="d-inline-block">{!! $blog->content !!}</div>
                </div>
            </div>
        </div>
    </section>
@endsection
@extends('frontend.partials.footer')

@push('scripts')
@endpush
