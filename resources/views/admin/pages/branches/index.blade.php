@extends('admin.pages.main')
@section('breadcumb','Şube Yönetimi')
@section('content')
    <div class="layout-px-spacing">
        <div class="row layout-top-spacing">
            <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                <div class="widget-content widget-content-area br-6 ">
                    <table id="zero-config" class="table dt-table-hover" style="width:100%;padding: 15px">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Logo</th>
                            <th>Fotoğraf</th>
                            <th>Blog Başlık</th>
                            <th class="no-content">İşlem</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($branches as $key => $branch)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>
                                    @if($branch->logo != "0")
                                        <img width="150" height="120" src="/storage/{{ $branch->logo }}">
                                    @else
                                        Resim Yok
                                    @endif
                                </td>
                                <td>
                                    @if($branch->image != "0")
                                        <img width="150" height="120" src="/storage/{{ $branch->image }}">
                                    @else
                                        Resim Yok
                                    @endif
                                </td>
                                <td>{{ $branch->name }}</td>
                                <td>
                                    <a href="{{ route('admin.branches.edit',$branch->id) }}">
                                        <i style="color: cornflowerblue" class="far fa-edit fa-2x"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Logo</th>
                            <th>Fotoğraf</th>
                            <th>Blog Başlık</th>
                            <th class="no-content">İşlem</th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
