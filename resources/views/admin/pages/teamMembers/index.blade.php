@extends('admin.pages.main')
@section('breadcumb','Çalışan Yönetimi')
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
                            <th>Ad Soyad</th>
                            <th>Ünvan</th>
                            <th>Telefon</th>
                            <th>Email</th>
                            <th class="no-content">İşlem</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($teamMembers as $key => $teamMember)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>
                                    @if($teamMember->image != null)
                                        <img width="150" height="120" src="{{ $teamMember->image }}">
                                    @else
                                        Resim Yok
                                    @endif
                                </td>
                                <td>{{ $teamMember->name }}</td>
                                <td>{{ $teamMember->title }}</td>
                                <td>{{ $teamMember->phone }}</td>
                                <td>{{ $teamMember->email }}</td>
                                <td>
                                    <a href="{{ route('admin.team_members.edit',$teamMember->id) }}"><i style="color: cornflowerblue" class="far fa-edit fa-2x"></i>  </a>
                                    <a href="#" onclick="checkBeforeDelete('deleteform{{$key}}')"><i style="color: red" class="far fa-trash-alt fa-2x"></i></a>
                                    <form id="deleteform{{ $key }}" method="POST" action="{{ route('admin.team_members.destroy',$teamMember->id) }}">@method('DELETE')@csrf</form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Fotoğraf</th>
                            <th>Ad Soyad</th>
                            <th>Ünvan</th>
                            <th>Telefon</th>
                            <th>Email</th>
                            <th class="no-content">İşlem</th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
