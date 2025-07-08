@extends('admin.pages.main')
@section('breadcumb','Hizmetler Yönetimi')

@section('content')
    <div class="layout-px-spacing">
        <div class="row layout-top-spacing">
            <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                <div class="widget-content widget-content-area br-6 ">
                    <div class="text-right">
                        <a href="{{ route('admin.services.create') }}">
                            <button class="btn btn-success m-3">Ekle</button>
                        </a>
                    </div>
                    <table id="zero-config" class="table dt-table-hover" style="width:100%;padding: 15px">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Fotoğraf</th>
                            <th>Hizmet Adı</th>
                            <th class="no-content">Eylem</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($services as $key => $service)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>
                                    @if($service->image != "0")
                                        <img width="150" height="120" src="/storage/{{ $service->image }}">
                                    @else
                                        Resim Yok
                                    @endif
                                </td>
                                <td>{{$service->name}}</td>
                                <td>
                                    <a href="{{ route('admin.services.edit',$service->id) }}"><i
                                            style="color: cornflowerblue"
                                            class="far fa-edit fa-2x"></i>
                                    </a>
                                    <a href="#" onclick="checkBeforeDelete('deleteform{{$key}}')"><i style="color: red" class="far fa-trash-alt fa-2x"></i></a>
                                    <form id="deleteform{{ $key }}" method="POST"
                                          action="{{ route('admin.services.destroy',$service->id) }}">@method('DELETE')@csrf</form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Fotoğraf</th>
                            <th>Hizmet Adı</th>
                            <th class="no-content">Eylem</th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
