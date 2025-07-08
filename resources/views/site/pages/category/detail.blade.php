@extends('site.layouts.main')

@section('content')

    <style>
        .breadcrumb {
            font-size: 12px;
            color: #ccc;
            margin-bottom: 15px;
            margin-top: 15px;
            padding: 5px 10px;
            border-radius: 8px;
            background: rgba(255, 204, 0, 0.05); /* sarımsı hafif arkaplan */
            border: 1px solid rgba(255, 204, 0, 0.3);
            display: inline-block;
        }

        .breadcrumb a {
            color: #ffcc00;
            text-decoration: none;
        }

        .breadcrumb a:hover {
            text-decoration: underline;
        }

        .breadcrumb span {
            color: #fff;
        }

    </style>
    <div class="breadcrumb">
        <a href="/">Anasayfa</a>
        @if($category != null)
            <a href="{{route('site.branches.select',$category->branch_id)}}">Menü</a>
            <span>{{$category->name}}</span>
        @endif
    </div>

    <div class="menu-container">
        @foreach($products as $product)
            <div class="menu-card">
                <div class="menu-image">
                    <img src="/storage/{{$product->image}}" alt="{{$product->name}}">
                </div>
                <div class="menu-content">
                    <div class="menu-info">
                        <h3>{{$product->title}}</h3>
                        <p>{!! $product->text !!}</p>
                    </div>
                    <div class="menu-price-wrapper">
                        <div class="price">{{$product->price}} ₺</div>
                    </div>
                </div>
            </div>
        @endforeach

        {{--<div class="menu-card">
            <div class="menu-image">
                <img src="https://www.cajuncornertrabzon.com.tr/wp-content/uploads/2025/02/hoty-burger-1.png" alt="Cajun Hoty Burger">
            </div>
            <div class="menu-content">
                <div class="menu-info">
                    <h3>Cajun Hoty Burger</h3>
                    <p>100 gr Panelenmiş Tavuk Pirzola, Acı Sos, Burger Sos, Aysberg Marul + Baharatlı Patates Kızartması + Seçeceğiniz 2 Sos + 1 Adet İçecek</p>
                </div>
                <div class="menu-price-wrapper">
                    <div class="price">285,00 ₺</div>
                </div>
            </div>
        </div>--}}
    </div>
@endsection
