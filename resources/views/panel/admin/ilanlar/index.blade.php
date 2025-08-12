@extends('panel.layout.app')

@section('content')
    <div class="card p-3">
        <h4>İlan Yönetimi</h4>
        <table class="table">
            <thead>
            <tr>
                <th>#</th>
                <th>Model</th>
                <th>Marka</th>
                <th>Kullanıcı</th>
                <th>Durum</th>
                <th>İşlem</th>
            </tr>
            </thead>
            <tbody>
            @foreach($ilanlar as $ilan)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $ilan->model->name ?? '-' }}</td>
                    <td>{{ $ilan->model->carBrand->name ?? '-' }}</td>
                    <td>{{ $ilan->user->name.' '. $ilan->user->surname ?? '-' }}</td>
                    <td>
                        @if($ilan->status == 0)
                            <span class="badge bg-warning">Bekliyor</span>
                        @elseif($ilan->status == 1)
                            <span class="badge bg-success">Yayında</span>
                        @else
                            <span class="badge bg-danger">Reddedildi</span>
                        @endif
                    </td>
                    <td>
                        @if($ilan->status == 0) {{-- Bekliyor ise --}}
                        <form action="{{ route('admin.ilan.onayla', $ilan->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="btn btn-success btn-sm">Yayına Al</button>
                        </form>

                        <form action="{{ route('admin.ilan.reddet', $ilan->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="btn btn-danger btn-sm">Reddet</button>
                        </form>
                        @elseif($ilan->status == 1)
                            <span class="text-success">Yayında</span>
                        @elseif($ilan->status == 2)
                            <span class="text-danger">Reddedildi</span>
                        @endif
                    </td>

                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
