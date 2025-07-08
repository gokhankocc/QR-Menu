@extends('site.layouts.main')
@section('content')

    <div class="swiper mySwiper">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <img src="https://www.cajuncornertrabzon.com.tr/wp-content/uploads/2025/02/main-menu-pic.png" alt="Slide 1" />
            </div>
            <div class="swiper-slide">
                <img src="https://www.cajuncornertrabzon.com.tr/wp-content/uploads/2025/02/main-menu-pic.png" alt="Slide 2" />
            </div>
            <div class="swiper-slide">
                <img src="https://www.cajuncornertrabzon.com.tr/wp-content/uploads/2025/02/main-menu-pic.png" alt="Slide 3" />
            </div>
        </div>
    </div>

    <div class="container">
        <div class="grid">
            <a href="#" class="large">
                <img src="https://i0.wp.com/www.crakerspizza.net.tr/wp-content/uploads/2024/01/kampanyastock-1.jpg?fit=1480%2C986&ssl=1" alt="Kampanyalar">
                <div class="overlay"></div>
                <div class="label">KAMPANYALAR</div>
            </a>
            <a href="#">
                <img src="https://i0.wp.com/www.crakerspizza.net.tr/wp-content/uploads/2024/01/fenomenstok-1.jpg?fit=1080%2C1920&ssl=1" alt="Fenomen Pizzalar">
                <div class="overlay"></div>
                <div class="label">FENOMEN PİZZALAR</div>
            </a>
            <a href="#">
                <img src="https://i0.wp.com/www.crakerspizza.net.tr/wp-content/uploads/2024/01/fenomenstok-1.jpg?fit=1080%2C1920&ssl=1" alt="Spesiyal Pizzalar">
                <div class="overlay"></div>
                <div class="label">SPESİYAL PİZZALAR</div>
            </a>
            <a href="#" class="large">
                <img src="https://i0.wp.com/www.crakerspizza.net.tr/wp-content/uploads/2024/01/kampanyastock-1.jpg?fit=1480%2C986&ssl=1" alt="Royal Pizzalar">
                <div class="overlay"></div>
                <div class="label">ROYAL PİZZALAR</div>
            </a>
            <a href="#" class="large">
                <img src="https://i0.wp.com/www.crakerspizza.net.tr/wp-content/uploads/2024/01/kampanyastock-1.jpg?fit=1480%2C986&ssl=1" alt="Kampanyalar">
                <div class="overlay"></div>
                <div class="label">KAMPANYALAR</div>
            </a>
            <a href="#">
                <img src="https://i0.wp.com/www.crakerspizza.net.tr/wp-content/uploads/2024/01/fenomenstok-1.jpg?fit=1080%2C1920&ssl=1" alt="Fenomen Pizzalar">
                <div class="overlay"></div>
                <div class="label">FENOMEN PİZZALAR</div>
            </a>
            <a href="#">
                <img src="https://i0.wp.com/www.crakerspizza.net.tr/wp-content/uploads/2024/01/fenomenstok-1.jpg?fit=1080%2C1920&ssl=1" alt="Spesiyal Pizzalar">
                <div class="overlay"></div>
                <div class="label">SPESİYAL PİZZALAR</div>
            </a>
            <a href="#" class="large">
                <img src="https://i0.wp.com/www.crakerspizza.net.tr/wp-content/uploads/2024/01/kampanyastock-1.jpg?fit=1480%2C986&ssl=1" alt="Royal Pizzalar">
                <div class="overlay"></div>
                <div class="label">ROYAL PİZZALAR</div>
            </a>
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

