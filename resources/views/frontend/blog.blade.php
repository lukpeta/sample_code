@extends('frontend.index')
@push('styles')
@endpush

@extends('frontend.partials.header')

@section('content')
    <section class="blog animate__animated animate__fadeInLeft mt-2">
        <div class="container">
            <div class="row">
                <div class="col-12 pb-5">
                    <h1 class="py-5">Blog</h1>
                    <div class="row">
                        @foreach($items as $blog)
                            <div class="col-12 col-md-6 col-lg-4 pb-3 pb-lg-3">
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
                                        <div class="news-item-title mt-3 text-center">{{ $blog->title }}
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                        <div class="pt-5"></div>
                            <div class="pagination-navigate d-flex mt-5">
                                {!! $items->links() !!}
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
