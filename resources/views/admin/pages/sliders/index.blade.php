@extends('admin.pages.main')
@section('breadcumb','Slider Yönetimi')
@section('content')
    <div class="layout-px-spacing">
        <div class="row layout-top-spacing">
            <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                <div class="widget-content widget-content-area br-6 ">
                    <table id="zero-config" class="table dt-table-hover" style="width:100%;padding: 15px">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Fotoğraf</th>
                            <th>Slider Başlık</th>
                            <th class="no-content">İşlem</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($sliders as $key => $slider)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>
                                    @if($slider->image != null)
                                        <img width="150" height="120" src="{{ $slider->image }}">
                                    @else
                                        Resim Yok
                                    @endif
                                </td>
                                <td>{{ $slider->top_title }}</td>
                                <td>
                                    <a href="{{ route('admin.sliders.edit',$slider->id) }}"><i style="color: cornflowerblue" class="far fa-edit fa-2x"></i>  </a>
                                    <a href="#" onclick="checkBeforeDelete('deleteform{{$key}}')"><i style="color: red" class="far fa-trash-alt fa-2x"></i></a>
                                    <form id="deleteform{{ $key }}" method="POST" action="{{ route('admin.sliders.destroy',$slider->id) }}">@method('DELETE')@csrf</form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Fotoğraf</th>
                            <th>Slider Başlık</th>
                            <th class="no-content">İşlem</th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
