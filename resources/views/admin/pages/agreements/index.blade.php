@extends('admin.pages.main')
@section('breadcumb','Sözleşme Yönetimi')
@section('content')
    <div class="layout-px-spacing">
        <div class="row layout-top-spacing">
            <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                <div class="widget-content widget-content-area br-6 ">
                    <table id="zero-config" class="table dt-table-hover" style="width:100%;padding: 15px">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Sözleşme Başlık</th>
                            <th class="no-content">İşlem</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($agreements as $key => $agreement)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $agreement->title }}</td>
                                <td>
                                    <a href="{{ route('admin.agreements.edit',$agreement->id) }}"><i style="color: cornflowerblue" class="far fa-edit fa-2x"></i>  </a>
                                    {{--<a href="#" onclick="checkBeforeDelete('deleteform{{$key}}')"><i style="color: red" class="far fa-trash-alt fa-2x"></i></a>
                                    <form id="deleteform{{ $key }}" method="POST" action="{{ route('admin.agreements.destroy',$agreement->id) }}">@method('DELETE')@csrf</form>
                                --}}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Sözleşme Başlık</th>
                            <th class="no-content">İşlem</th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
