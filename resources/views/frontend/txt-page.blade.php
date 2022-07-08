@extends('frontend.index')
@push('styles')
@endpush

@extends('frontend.partials.header')

@section('content')
    <section class="text-page animate__animated animate__fadeInLeft mt-2">
        <div class="container">
            <div class="row">
                <div class="col-12 pb-5">
                    <h1 class="py-5">{!! $txt->title !!}</h1>
                    <div class="d-inline-block">{!! $txt->content !!}</div>
                </div>
            </div>
        </div>
    </section>
@endsection
@extends('frontend.partials.footer')

@push('scripts')
@endpush
