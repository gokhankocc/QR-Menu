@extends('admin.pages.main')
@section('breadcumb','Kategori Yönetimi')
@section('content')
    <div class="container-fluid">
        <div class="row layout-top-spacing">
            <div class="col-lg-12 layout-spacing">
                <div class="statbox widget box box-shadow">
                    <div class="widget-header">
                        <div class="row">
                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                <h4>Kategori Düzenle</h4>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="widget-content widget-content-area">
                        <div class="row">
                            <div class="col-12">
                                <form action="{{ route('admin.categories.update',$category->id) }}" method="post" id="mainForm"
                                      enctype="multipart/form-data">
                                    @csrf @method('PUT')
                                    <ul class="nav nav-tabs  mb-3" id="lineTab" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active " id="underline-tab" data-toggle="tab"
                                               href="#underline-1" role="tab" aria-controls="underline-1"
                                               aria-selected="true false ">Kategori Detayları</a>
                                        </li>
                                    </ul>
                                    <div class="form-group">
                                        <p>Üst Kategori</p>
                                        <select class="form-control basic" name="parent_category_id">
                                            <option value="0">yok</option>
                                            {{--@foreach($categories as $cat)
                                                @php
                                                    $fullPath = $cat->getFullPath();
                                                    $boldRedCategoryName = '<span style="color: red; font-weight: bold;">' . $cat->name . '</span>';
                                                    $displayPath = str_replace($cat->name, $boldRedCategoryName, $fullPath);
                                                @endphp
                                                <option @if($cat->id == $category->parent_category_id) selected @endif value="{{$cat->id}}">{!! $displayPath !!}</option>
                                            @endforeach--}}
                                        </select>
                                        @error('parent_category')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
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
                                                    <div class="col-lg-9">
                                                        <div class="form-group">
                                                            <p>Kategori Başlığı ({{$locale}})</p>
                                                            <input id="t-text" type="text" name="name[{{ $key }}]"
                                                                   class="form-control {{$key}} @error('name') is-invalid @enderror"
                                                                   value="{{ $category->getTranslation('name',$key) }}" required>
                                                            @error('name')
                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                            <div class="col-lg-2">
                                                <div class="form-group">
                                                    <p>Sıra Numarası</p>
                                                    <input id="t-text" type="number" name="rank" value="{{$category->rank}}"
                                                           class="form-control @error('name') is-invalid @enderror"
                                                           required>
                                                </div>
                                            </div>
                                    </div>
                                </form>
                            </div>
                            <div class="col-lg-5 layout-spacing">
                                <div class="statbox widget box box-shadow">
                                    <div class="widget-header">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <h4>Kategori Görseli (700X500)</h4>
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
                                                               accept="image/*" >
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
