@extends('admin.pages.main')
@section('breadcumb','Ayarlar')
@section('content')
    <div class="container-fluid">
        <div class="row layout-top-spacing">
            <div class="col-lg-12 layout-spacing">
                <div class="statbox widget box box-shadow">
                    <div class="widget-content widget-content-area">
                        <div class="row">
                            <div class="col-12">
                                <form action="{{ route('admin.settings.update',1) }}" method="post" id="mainForm" enctype="multipart/form-data">@csrf @method('PUT')

                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="widget-header">
                                                <div class="row">
                                                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                        <h4>Genel Ayarlar</h4>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>

                                            <div class="form-group">
                                                <p>E-posta Adresi</p>
                                                <input id="t-text" type="text" name="email" value="{{ $settings->email }}" class="form-control @error('email') is-invalid @enderror" required>
                                                @error('email')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <p>Telefon Numarası</p>
                                                <input id="t-text" type="text" name="phone" value="{{ $settings->phone }}" class="form-control @error('telephone') is-invalid @enderror" required>
                                                @error('telephone')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <p>Whatsapp</p>
                                                <input id="t-text" type="text" name="whatsapp" value="{{ $settings->whatsapp }}" class="form-control @error('telephone') is-invalid @enderror" required>
                                                @error('telephone')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <p>Adres</p>
                                                <textarea class="form-control @error('address') is-invalid @enderror" name="full_address">{{ $settings->full_address }}</textarea>
                                                @error('address')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <p>Map Url</p>
                                                <input id="t-text" type="text" name="map" value="{{ $settings->map }}" class="form-control @error('email') is-invalid @enderror" required>
                                                @error('address')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <p>Twitter</p>
                                                <input id="t-text" type="text" name="twitter" value="{{ $settings->twitter }}" class="form-control @error('telephone') is-invalid @enderror" required>
                                                @error('telephone')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <p>Facebook</p>
                                                <input id="t-text" type="text" name="facebook" value="{{ $settings->facebook }}" class="form-control @error('telephone') is-invalid @enderror" required>
                                                @error('telephone')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <p>İnstagram</p>
                                                <input id="t-text" type="text" name="instagram" value="{{ $settings->instagram }}" class="form-control @error('telephone') is-invalid @enderror" required>
                                                @error('telephone')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <p>Youtube</p>
                                                <input id="t-text" type="text" name="youtube" value="{{ $settings->youtube }}" class="form-control @error('telephone') is-invalid @enderror" required>
                                                @error('telephone')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                    </div>
                                </form>
                                <div class="statbox widget box box-shadow">
                                    <div class="widget-content widget-content-area">
                                        <div class="row">
                                            <div class="col-lg-12 col-12 ">
                                                <button form="mainForm" type="submit" class="btn btn-success btn-lg m-3">Kaydet</button>
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
