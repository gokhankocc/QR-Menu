@extends('admin.pages.main')
@section('breadcumb','Slider Yönetimi')
@section('content')

    <div class="container-fluid">
        <div class="row layout-top-spacing">
            <div class="col-lg-12 layout-spacing">
                <div class="statbox widget box box-shadow">
                    <div class="widget-header">
                        <div class="row">
                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                <h4>Slider Düzenle</h4>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="widget-content widget-content-area">

                        <div class="row">
                            <div class="col-12">
                                <form action="{{ route('admin.sliders.update',$slider->id) }}" method="post" id="mainForm"
                                      enctype="multipart/form-data">@csrf @method('put')
                                    <ul class="nav nav-tabs  mb-3" id="lineTab" role="tablist">
                                        @foreach($locales as $key => $locale)
                                            <li class="nav-item">
                                                <a class="nav-link @if($key == 'tr') active @endif" id="underline-{{ $key }}-tab" data-toggle="tab" href="#underline-{{ $key }}" role="tab" aria-controls="underline-{{ $key }}" aria-selected=" @if($key == 'tr') true @else false @endif">{{ $locale }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                    <ul class="nav nav-tabs  mb-3" id="lineTab" role="tablist">
                                        {{--                                        @foreach($locales as $key => $locale)--}}
                                        <li class="nav-item">
                                            <a class="nav-link active" id="underline-tab" data-toggle="tab"
                                               href="#underline" role="tab" aria-controls="underline"
                                               aria-selected="  true ">Slider'a ait Detaylar</a>
                                        </li>
                                        {{--                                        @endforeach--}}
                                    </ul>

                                    <div class="tab-content" id="lineTabContent-3">
                                        @foreach($locales as $key => $locale)
                                            <div class="tab-pane fade  @if($key == 'tr')  show active @endif" id="underline-{{ $key }}" role="tabpanel" aria-labelledby="underline-{{ $key }}-tab"
                                                 aria-labelledby="underline-tab">
                                                <div class="form-group">
                                                    <p>Slider Adı {{$locale}}</p>
                                                    <input id="t-text" type="text" name="top_title[{{$key}}]"
                                                           class="form-control @error('name') is-invalid @enderror"
                                                           value="{{ $slider->getTranslation('top_title',$key) }}" required>
                                                    @error('name')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror

                                                    <p>Slider Adı 2 {{$locale}}</p>
                                                    <input id="t-text" type="text" name="sub_title[{{$key}}]"
                                                           class="form-control @error('name2') is-invalid @enderror"
                                                           value="{{ $slider->getTranslation('sub_title',$key) }}" required>
                                                    @error('name2')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>

                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="row col-12">
                <div class="col-lg-12 col-12 layout-spacing">
                    <div class="statbox widget box box-shadow">
                        <div class="widget-header">
                            <div class="row">
                                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                    <h4>Slider Görsel (1920X1094)</h4>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="widget-content widget-content-area">
                            <div class="row">
                                <div class="col-lg-12 col-12 ">
                                    <div class="custom-file-container" data-upload-id="myFirstImage">
                                        <label>Fotoğrafı Kaldır <a href="javascript:void(0)"
                                                                   class="custom-file-container__image-clear"
                                                                   title="Clear Image">x</a></label>
                                        <label class="custom-file-container__custom-file">
                                            <input type="file" form="mainForm" name="image"
                                                   class="custom-file-container__custom-file__custom-file-input"
                                                   accept="image/*">
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
                    <div class="statbox widget box box-shadow" style=" display: flex; justify-content: end">
                        <div class="widget-content widget-content-area">
                            <div class="row">
                                <div class="col-lg-12 col-12 ">
                                    <button form="mainForm" type="submit" class="btn btn-success btn-lg m-3">Güncelle
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
