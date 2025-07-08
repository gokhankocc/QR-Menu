@extends('admin.pages.main')
@section('breadcumb','Ürün Yönetimi')
@section('content')
    <div class="layout-px-spacing">
        <div class="row layout-top-spacing">
            <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                <div class="widget-content widget-content-area br-6 ">
                    <table id="zero-config" class="table dt-table-hover" style="width:100%;padding: 15px">
                        {{--<div class="simple--counter-container" style="display: flex; justify-content: center;">
                            <h4 class="mt-5" style="font-weight: bold">{{$title}}</h4>
                        </div>--}}
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Fotoğraf</th>
                            <th>Ürün Başlık</th>
                            <th>Kategori</th>
                            <th>Fiyat</th>
                            <th>Sıra</th>
                            <th class="no-content">İşlem</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($products as $key => $product)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>
                                    @if($product->image != "0")
                                        <img width="150" height="120" src="/storage/{{ $product->image }}">
                                    @else
                                        Resim Yok
                                    @endif
                                </td>
                                <td>{{ $product->title }}</td>
                                <td>
                                    @if(isset($product->category))
                                        {{ $product->category->name }}
                                    @else
                                        Yok
                                    @endif
                                </td>
                                <td>{{ $product->price }}₺</td>
                                <td>{{ $product->rank }}</td>
                                <td>
                                    <a href="{{ route('admin.products.edit',$product->id) }}"><i style="color: cornflowerblue" class="far fa-edit fa-2x"></i> </a>
                                    <a href="#" onclick="checkBeforeDelete('deleteform{{$key}}')"><i style="color: red" class="far fa-trash-alt fa-2x"></i></a>
                                    <form id="deleteform{{ $key }}" method="POST" action="{{ route('admin.products.destroy',$product->id) }}">@method('DELETE')@csrf</form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Fotoğraf</th>
                            <th>Ürün Başlık</th>
                            <th>Kategori</th>
                            <th>Fiyat</th>
                            <th>Sıra</th>
                            <th class="no-content">İşlem</th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
