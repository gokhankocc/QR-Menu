@extends('admin.pages.main')
@section('breadcumb','Blog Yönetimi')
@section('content')
    <div class="container-fluid">
        <div class="row layout-top-spacing">
            <div class="col-lg-12 layout-spacing">
                <div class="statbox widget box box-shadow">
                    <div class="widget-header">
                        <div class="row">
                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                <h4>Blog Ekle</h4>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="widget-content widget-content-area">
                        <div class="row">
                            <div class="col-12">
                                <form action="{{ route('admin.blogs.store') }}" method="post" id="mainForm"
                                      enctype="multipart/form-data">
                                    @csrf
                                    <ul class="nav nav-tabs  mb-3" id="lineTab" role="tablist">
                                        @foreach($locales as $key => $locale)
                                            <li class="nav-item">
                                                <a class="nav-link @if($key == 'tr') active @endif" id="underline-{{ $key }}-tab" data-toggle="tab" href="#underline-{{ $key }}" role="tab" aria-controls="underline-{{ $key }}" aria-selected=" @if($key == 'tr') true @else false @endif">{{ $locale }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                    <ul class="nav nav-tabs  mb-3" id="lineTab" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active " id="underline-tab" data-toggle="tab"
                                               href="#underline-1" role="tab" aria-controls="underline-1"
                                               aria-selected="true false ">Blog'a ait Detaylar</a>
                                        </li>
                                    </ul>
                                    {{--<div class="form-group">
                                        <p>Yazar</p>
                                        <input id="t-text" type="text" name="author"
                                               class="form-control @error('text') is-invalid @enderror"
                                               required>
                                        @error('text')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>--}}
                                    <div class="tab-content" id="lineTabContent-3">
                                        @foreach($locales as $key => $locale)
                                            <div class="tab-pane fade  @if($key == 'tr')  show active @endif" id="underline-{{ $key }}" role="tabpanel" aria-labelledby="underline-{{ $key }}-tab"
                                                 aria-labelledby="underline-tab">

                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <p>Meta Title {{$locale}}</p>
                                                            <input id="t-text" type="text" name="meta_title[{{ $key }}]"
                                                                   class="form-control @error('name') is-invalid @enderror"
                                                            >
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <p>Meta og:title {{$locale}}</p>
                                                            <input id="t-text" type="text" name="meta_og_title[{{ $key }}]"
                                                                   class="form-control @error('name') is-invalid @enderror"
                                                            >
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <p>Meta description {{$locale}}</p>
                                                            <input id="t-text" type="text" name="meta_description[{{ $key }}]"
                                                                   class="form-control @error('name') is-invalid @enderror"
                                                            >
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <p>Meta og:url {{$locale}}</p>
                                                            <input id="t-text" type="text" name="meta_og_url[{{ $key }}]"
                                                                   class="form-control @error('name') is-invalid @enderror"
                                                            >
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <p>Meta og:image</p>
                                                            <input id="t-text" type="text" name="meta_og_image"
                                                                   class="form-control @error('name') is-invalid @enderror"
                                                            >
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <p>Meta og:type {{$locale}}</p>
                                                            <input id="t-text" type="text" name="meta_og_type[{{ $key }}]"
                                                                   class="form-control @error('name') is-invalid @enderror"
                                                            >
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <p>Meta canonical {{$locale}}</p>
                                                            <input id="t-text" type="text" name="meta_canonical[{{ $key }}]"
                                                                   class="form-control @error('name') is-invalid @enderror"
                                                            >
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <p>Meta keywords {{$locale}}</p>
                                                            <input id="t-text" type="text" name="meta_keywords[{{ $key }}]"
                                                                   class="form-control @error('name') is-invalid @enderror"
                                                            >
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <p>Meta author {{$locale}}</p>
                                                            <input id="t-text" type="text" name="meta_author[{{ $key }}]"
                                                                   class="form-control @error('name') is-invalid @enderror"
                                                            >
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <p>Meta og:description {{$locale}}</p>
                                                            <input id="t-text" type="text" name="meta_og_description[{{ $key }}]"
                                                                   class="form-control @error('name') is-invalid @enderror"
                                                            >
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <p>Blog Başlığı {{$locale}}</p>
                                                    <input id="t-text" type="text" name="name[{{ $key }}]"
                                                           class="form-control @error('name') is-invalid @enderror"
                                                           required>
                                                    @error('name')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <div class="form-group">
                                                    <p>Blog İçeriği ({{ $locale }})</p>
                                                    <textarea class="summernote {{$key}}" name="details[{{ $key }}]"></textarea>
                                                    @error('details')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6 layout-spacing">
                                            <div class="statbox widget box box-shadow">
                                                <div class="widget-header">
                                                    <div class="row">
                                                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                            <h4>Blog Görseli (1400X542)</h4>
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
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
