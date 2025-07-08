@extends('admin.pages.main')
@section('breadcumb','Referans Yönetimi')
@section('content')
    <div class="container-fluid">
        <div class="row layout-top-spacing">
            <div class="col-lg-12 layout-spacing">
                <div class="statbox widget box box-shadow">
                    <div class="widget-header">
                        <div class="row">
                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                <h4>Referans Ekle</h4>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="widget-content widget-content-area">
                        <div class="row">
                            <div class="col-9">
                                <form action="{{ route('admin.references.store') }}" method="post" id="mainForm"
                                      enctype="multipart/form-data">
                                    @csrf
                                    <ul class="nav nav-tabs  mb-3" id="lineTab" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active " id="underline-tab" data-toggle="tab"
                                               href="#underline-1" role="tab" aria-controls="underline-1"
                                               aria-selected="true false ">Detaylar</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content" id="lineTabContent-3">
                                        <div class="tab-pane fade  show active" id="underline-1" role="tabpanel"
                                             aria-labelledby="underline-tab">
                                            <div class="form-group">
                                                <p>Referans Başlığı</p>
                                                <input id="t-text" type="text" name="title"
                                                       class="form-control @error('name') is-invalid @enderror"
                                                       required>
                                                @error('name')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-lg-12 layout-spacing">
                                                <div class="statbox widget box box-shadow">
                                                    <div class="widget-header">
                                                        <div class="row">
                                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                                <h4>Referans Kapak Görseli (700X500)</h4>
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
                                    </div>
                                </form>
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
