@extends('admin.pages.main')
@section('breadcumb','SSS Yönetimi')
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
                            <th>Blog Başlık</th>
                            <th class="no-content">İşlem</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($blogs as $key => $blog)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>
                                    @if($blog->image != "0")
                                        <img width="150" height="120" src="/storage/{{ $blog->image }}">
                                    @else
                                        Resim Yok
                                    @endif
                                </td>
                                <td>{{ $blog->name }}</td>
                                <td>
                                    <a href="{{ route('admin.blogs.edit',$blog->id) }}"><i style="color: cornflowerblue" class="far fa-edit fa-2x"></i>  </a>
                                    <a href="#" onclick="checkBeforeDelete('deleteform{{$key}}')"><i style="color: red" class="far fa-trash-alt fa-2x"></i></a>
                                    <form id="deleteform{{ $key }}" method="POST" action="{{ route('admin.blogs.destroy',$blog->id) }}">@method('DELETE')@csrf</form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>#</th>
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
