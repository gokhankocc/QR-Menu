@extends('site.layouts.main')
@section('content')

    <div class="swiper mySwiper">
        <div class="swiper-wrapper">
            @foreach($sliders as $slider)
                <div class="swiper-slide">
                    <img src="{{$slider->image}}" alt="Slide 1" />
                </div>
            @endforeach
        </div>
    </div>

    <div class="container" style="padding: 0 !important;">

        {{-- Alt başlık --}}
        {{--<h2 class="text-center my-4 fw-bold" style="font-size: 26px; color: #ffc107; text-shadow: 1px 1px 3px rgba(0,0,0,0.5); text-align: center">
            Lütfen Seçim Yapınız
        </h2>--}}

        {{-- Şube fotoğraf seçim alanı --}}
        <div class="grid">
            @foreach($branches as $branch)
                <a href="{{ route('site.branches.select', $branch->id) }}" class="large">
                    <img src="/storage/{{ $branch->image }}" alt="{{ $branch->name }}" style=" height: 180px!important;">
                    <div class="overlay" style="background: linear-gradient(to bottom, rgb(0 0 0 / 0%), rgb(0 0 0 / 0%))!important;"></div>
                </a>
            @endforeach
        </div>
    </div>


@endsection
@section('js')
    <script>
        const swiper = new Swiper(".mySwiper", {
            loop: true,
            autoplay: {
                delay: 3000,
                disableOnInteraction: false,
            },
            effect: "slide",
        });
    </script>
@endsection

