@extends('admin.pages.main')
@section('breadcumb','Kategori Yönetimi')
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
                            <th>Kategori Adı</th>
                            <th>Kategori Konumu</th>
                            <th>Kategori Sıra</th>
                            <th class="no-content">İşlem</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($categories as $key => $category)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>
                                    @if($category->image != null)
                                        <img  width="75" height="75" class="rounded-circle" src="/storage/{{ $category->image }}">
                                    @else
                                        Resim Yok
                                    @endif
                                </td>
                                <td>
                                    {{$category->name}}
                                </td>
                                <td>
                                    {{--@php
                                        $fullPath = $category->getFullPath();
                                        $boldRedCategoryName = '<span style="color: red; font-weight: bold;">' . $category->name . '</span>';
                                        $displayPath = str_replace($category->name, $boldRedCategoryName, $fullPath);
                                    @endphp
                                    {!! $displayPath !!}--}}
                                    @php
                                        $fullPath = $category->getFullPath(); // Tam yolu al
                                        $parts = explode('/', $fullPath); // '/' karakterine göre ayır
                                        $lastPartKey = array_search($category->name, $parts); // Mevcut kategorinin adının anahtarını bul
                                        $parts[$lastPartKey] = '<span style="color: red; font-weight: bold;">' . $parts[$lastPartKey] . '</span>'; // Sadece o anahtara sahip parçayı değiştir
                                        $displayPath = implode('/', $parts); // Parçaları tekrar '/' ile birleştir
                                    @endphp
                                    {!! $displayPath !!}

                                </td>
                                <td>
                                    {{$category->rank}}
                                </td>
                                <td>
                                    <a href="{{ route('admin.categories.edit',$category->id) }}"><i style="color: cornflowerblue" class="far fa-edit fa-2x"></i>  </a>
                                    <a href="#" onclick="checkBeforeDelete('deleteform{{$key}}')"><i style="color: red" class="far fa-trash-alt fa-2x"></i></a>
                                    <form id="deleteform{{ $key }}" method="POST" action="{{ route('admin.categories.destroy',$category->id) }}">@method('DELETE')@csrf</form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Fotoğraf</th>
                            <th>Kategori Adı</th>
                            <th>Kategori Konumu</th>
                            <th>Kategori Parent</th>
                            <th class="no-content">İşlem</th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
