@extends('admin.pages.main')

@section('content')
    <div class="layout-px-spacing">

        @php
            $currentBranchId = auth('admin')->user()->current_branch;
        @endphp

        <div class="row layout-top-spacing">

            <div class="col-12">
                <div class="row">
                    @foreach($branches as $branch)
                        @php
                            $isActive = $currentBranchId == $branch->id;
                        @endphp

                        <div class="col-md-4 mb-4">
                            <div class="card h-100 text-center {{ $isActive ? 'border-success' : '' }}" style="{{ $isActive ? 'border: 3px solid green;' : '' }}">
                                <img src="/storage/{{ $branch->image }}" class="card-img-top" style="height: 200px; object-fit: cover;" alt="{{ $branch->name }}">
                                <div class="card-body d-flex flex-column justify-content-between">
                                    <h5 class="card-title mb-3">
                                        {{ $branch->name }}
                                    </h5>

                                    @if($isActive)
                                        <div class="alert alert-success p-2 mb-3">
                                            Aktif Şube
                                        </div>
                                    @endif

                                    <a href="{{ route('admin.admin.branches.changeCurrentBranch', $branch->id) }}"
                                       onclick="return confirm('{{ $branch->name }} şubesine geçmek istediğinize emin misiniz?')"
                                       class="btn btn-warning" {{ $isActive ? 'disabled' : '' }}>
                                        Geçiş Yap
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

        </div>

    </div>
@endsection
