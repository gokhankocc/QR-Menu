@extends('admin.pages.main')
@section('breadcumb','Hakkımızda Yönetimi')
@section('content')

    <div class="container-fluid">
        <div class="row layout-top-spacing">
            <div class="col-lg-12 layout-spacing">
                <div class="statbox widget box box-shadow">
                    <div class="widget-header">
                        <div class="row">
                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                <h4>Hakkımızda Düzenle</h4>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="widget-content widget-content-area">
                        <div class="row">
                            <div class="col-12">
                                <form action="{{ route('admin.abouts.update',$about->id) }}" method="post" id="mainForm"
                                      enctype="multipart/form-data">@csrf @method('put')
                                    <ul class="nav nav-tabs  mb-3" id="lineTab" role="tablist">
                                        @foreach($locales as $key => $locale)
                                            <li class="nav-item">
                                                <a class="nav-link @if($key == 'tr') active @endif" id="underline-{{ $key }}-tab" data-toggle="tab" href="#underline-{{ $key }}" role="tab" aria-controls="underline-{{ $key }}" aria-selected=" @if($key == 'tr') true @else false @endif">{{ $locale }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                    <div class="tab-content" id="lineTabContent-3">
                                        @foreach($locales as $key => $locale)
                                            <div class="tab-pane fade @if($key == 'tr')  show active @endif" id="underline-{{ $key }}" role="tabpanel" aria-labelledby="underline-{{ $key }}-tab">

                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <p>Meta Title {{$locale}}</p>
                                                            <input id="t-text" type="text" name="meta_title[{{ $key }}]" value="{{$about->getTranslation('meta_title',$key)}}"
                                                                   class="form-control @error('name') is-invalid @enderror"
                                                            >
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <p>Meta og:title {{$locale}}</p>
                                                            <input id="t-text" type="text" name="meta_og_title[{{ $key }}]" value="{{$about->getTranslation('meta_og_title',$key)}}"
                                                                   class="form-control @error('name') is-invalid @enderror"
                                                            >
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <p>Meta description {{$locale}}</p>
                                                            <input id="t-text" type="text" name="meta_description[{{ $key }}]" value="{{$about->getTranslation('meta_description',$key)}}"
                                                                   class="form-control @error('name') is-invalid @enderror"
                                                            >
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <p>Meta og:url {{$locale}}</p>
                                                            <input id="t-text" type="text" name="meta_og_url[{{ $key }}]" value="{{$about->getTranslation('meta_og_url',$key)}}"
                                                                   class="form-control @error('name') is-invalid @enderror"
                                                            >
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <p>Meta og:image {{$locale}}</p>
                                                            <input id="t-text" type="text" name="meta_og_image[{{ $key }}]" value="{{$about->getTranslation('meta_og_image',$key)}}"
                                                                   class="form-control @error('name') is-invalid @enderror"
                                                            >
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <p>Meta og:type {{$locale}}</p>
                                                            <input id="t-text" type="text" name="meta_og_type[{{ $key }}]" value="{{$about->getTranslation('meta_og_type',$key)}}"
                                                                   class="form-control @error('name') is-invalid @enderror"
                                                            >
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <p>Meta canonical {{$locale}}</p>
                                                            <input id="t-text" type="text" name="meta_canonical[{{ $key }}]" value="{{$about->getTranslation('meta_canonical',$key)}}"
                                                                   class="form-control @error('name') is-invalid @enderror"
                                                            >
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <p>Meta keywords {{$locale}}</p>
                                                            <input id="t-text" type="text" name="meta_keywords[{{ $key }}]" value="{{$about->getTranslation('meta_keywords',$key)}}"
                                                                   class="form-control @error('name') is-invalid @enderror"
                                                            >
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <p>Meta author {{$locale}}</p>
                                                            <input id="t-text" type="text" name="meta_author[{{ $key }}]" value="{{$about->getTranslation('meta_author',$key)}}"
                                                                   class="form-control @error('name') is-invalid @enderror"
                                                            >
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <p>Meta og:description {{$locale}}</p>
                                                            <input id="t-text" type="text" name="meta_og_description[{{ $key }}]" value="{{$about->getTranslation('meta_og_description',$key)}}"
                                                                   class="form-control @error('name') is-invalid @enderror"
                                                            >
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <p>Hakkımızda Yazısı İçeriği ({{ $locale }})</p>
                                                    <textarea class="summernote {{$key}}" name="text[{{ $key }}]">{{ $about->getTranslation('text',$key) }}</textarea>
                                                    @error('text')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <p>Hakkımızda(Kısa Açıklama) ({{ $locale }})</p>
                                                    <textarea class="summernote {{$key}}" name="text_short[{{ $key }}]">{{ $about->getTranslation('text_short',$key) }}</textarea>
                                                    @error('text')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <p>Hedefler(Kısa Açıklama) ({{ $locale }})</p>
                                                    <textarea class="summernote {{$key}}" name="targets[{{ $key }}]">{{ $about->getTranslation('targets',$key) }}</textarea>
                                                    @error('text')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <p>Değerler(Kısa Açıklama) ({{ $locale }})</p>
                                                    <textarea class="summernote {{$key}}" name="company_values[{{ $key }}]">{{ $about->getTranslation('company_values',$key) }}</textarea>
                                                    @error('text')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    {{--<div class="form-group">
                                        <p>Hakkımızda Yazısı İçeriği</p>
                                        <textarea class="summernote" style=" min-width: 100%"
                                                  name="content">{{ $about->content ?? '' }}</textarea>
                                        @error('text')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>--}}
                                </form>
                            </div>
                        </div>
                        <div class="col-lg-12 col-12 text-right ">
                            <button form="mainForm" type="submit" class="btn btn-success btn-lg">Değişiklikleri Kaydet
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
