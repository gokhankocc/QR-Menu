@extends('admin.pages.main')
@section('breadcumb','Sözleşme Yönetimi')
@section('content')
    <div class="container-fluid">
        <div class="row layout-top-spacing">
            <div class="col-lg-12 layout-spacing">
                <div class="statbox widget box box-shadow">
                    <div class="widget-header">
                        <div class="row">
                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                <h4>{{$agreement->title}} Düzenle</h4>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="widget-content widget-content-area">
                        <div class="row">
                            <div class="col-9">
                                <form action="{{ route('admin.agreements.update',$agreement->id) }}" method="post" id="mainForm"
                                      enctype="multipart/form-data">
                                    @csrf @method('PUT')
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
                                                <p>Sözleşme Başlığı</p>
                                                <input id="t-text" type="text" name="title" value="{{$agreement->title}}"
                                                       class="form-control @error('name') is-invalid @enderror" readonly
                                                       required>
                                                @error('name')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <p>Sözleşme İçeriği</p>
                                                <textarea id="summernot" name="text" style="width: 100%; height: 200px" required>{{$agreement->content}}</textarea>
                                                @error('text')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
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
