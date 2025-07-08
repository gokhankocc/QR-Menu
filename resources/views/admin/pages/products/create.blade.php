@extends('admin.pages.main')
@section('breadcumb','Ürün Yönetimi')
@section('content')
    <div class="container-fluid">
        <div class="row layout-top-spacing">
            <div class="col-lg-12 layout-spacing">
                <div class="statbox widget box box-shadow">
                    <div class="widget-header">
                        <div class="row">
                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                <h4>Ürün Ekle</h4>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="widget-content widget-content-area">
                        <div class="row">
                            <div class="col-12">
                                <form action="{{ route('admin.products.store') }}" method="post" id="mainForm"
                                      enctype="multipart/form-data">
                                    @csrf
                                    <ul class="nav nav-tabs  mb-3" id="lineTab" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active " id="underline-tab" data-toggle="tab"
                                               href="#underline-1" role="tab" aria-controls="underline-1"
                                               aria-selected="true false ">Ürün Detayları</a>
                                        </li>
                                    </ul>
                                    <div class="row">
                                        <div class="col-lg-5">
                                            <div class="form-group">
                                                <p>Kategori Seçiniz</p>
                                                <select class="form-control basic" name="category_id">
                                                    <option value="0">Yok</option>
                                                    @foreach($categories as $category)
                                                        <option value="{{$category->id}}" @if($category->id == $latestProduct->category_id) selected @endif>{{$category->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-5">
                                            <div class="form-group">
                                                <p>Sıra Numarası</p>
                                                <input id="t-text" type="number" name="rank" placeholder="son eklenen: {{$latestProductRank}}"
                                                       class="form-control @error('name') is-invalid @enderror"
                                                       required>
                                            </div>
                                        </div>
                                    </div>
                                    <ul class="nav nav-tabs  mb-3" id="lineTab" role="tablist">
                                        @foreach($locales as $key => $locale)
                                            <li class="nav-item">
                                                <a class="nav-link @if($key == 'tr') active @endif" id="underline-{{ $key }}-tab" data-toggle="tab" href="#underline-{{ $key }}" role="tab" aria-controls="underline-{{ $key }}" aria-selected=" @if($key == 'tr') true @else false @endif">{{ $locale }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                    <div class="tab-content" id="lineTabContent-3">
                                        @foreach($locales as $key => $locale)
                                            <div class="tab-pane fade  @if($key == 'tr')  show active @endif" id="underline-{{ $key }}" role="tabpanel" aria-labelledby="underline-{{ $key }}-tab"
                                                 aria-labelledby="underline-tab">
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <p>Ürün Başlığı ({{$locale}})</p>
                                                            <input id="t-text" type="text" name="title[{{ $key }}]"
                                                                   class="form-control @error('name') is-invalid @enderror"
                                                                   required>
                                                            @error('name')
                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <p>Ürün Fiyatı ({{$locale}})</p>
                                                            <input id="t-text" type="number" name="price" step="any"
                                                                   class="form-control @error('name') is-invalid @enderror"
                                                                   required>
                                                            @error('name')
                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-12">
                                                        <div class="form-group">
                                                            <p>Ürün İçeriği ({{ $locale }})</p>
                                                            <textarea class="summernote {{$key}}" name="text[{{ $key }}]"></textarea>
                                                            @error('details')
                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </form>
                            </div>
                            <div class="col-lg-6 layout-spacing">
                                <div class="statbox widget box box-shadow">
                                    <div class="widget-header">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <h4>Ürün Kapak Görseli (700X500)</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="widget-content widget-content-area">
                                        <div class="row">
                                            <div class="col-lg-12 col-12 ">
                                                <div class="custom-file-container"
                                                     data-upload-id="myFirstImage">
                                                    <label>Fotoğrafı Kaldır <a href="javascript:void(0)"
                                                                               class="custom-file-container__image-clear"
                                                                               title="Clear Image">x</a></label>
                                                    <label class="custom-file-container__custom-file">
                                                        <input type="file" form="mainForm"
                                                               name="image"
                                                               class="custom-file-container__custom-file__custom-file-input"
                                                               accept="image/*" required>
                                                        <span
                                                            class="custom-file-container__custom-file__custom-file-control"></span>
                                                    </label>
                                                    <div class="custom-file-container__image-preview"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="statbox widget box box-shadow"
                                     style=" display: flex; justify-content: end">
                                    <div class="widget-content widget-content-area">
                                        <div class="row">
                                            <div class="col-lg-12 col-12 ">
                                                <button form="mainForm" type="submit"
                                                        class="btn btn-success btn-lg m-3">Kaydet
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
