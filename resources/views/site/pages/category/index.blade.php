@extends('site.layouts.main')
@section('content')

    {{--<div class="swiper mySwiper">
        <div class="swiper-wrapper">
            @foreach($sliders as $slider)
                <div class="swiper-slide">
                    <img src="{{$slider->image}}" alt="Slide 1" />
                </div>
            @endforeach
        </div>
    </div>--}}

    <div class="container">
        <div class="grid">
            @foreach($categories as $category)
                <a href="{{route('site.category.select',$category->id)}}" class="large">
                    <img src="/storage/{{$category->image}}" alt="{{$category->name}}">
                    <div class="overlay"></div>
                    <div class="label">{{$category->name}}</div>
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

