@extends('panel.layout.app')

@section('content')
    <div class="card">
        <h4 class="p-3">İlan İşlem Logları</h4>

        <div class="table-responsive text-nowrap">
            <table class="table">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Kullanıcı</th>
                    <th>İşlem</th>
                    <th>İlan</th>
                    <th>Tarih</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($logs as $log)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $log->user->name . ' ' . $log->user->surname }}</td>
                        <td>
                            @if($log->action === 'deleted')
                                <span class="badge bg-danger">Silindi</span>
                            @elseif($log->action === 'updated')
                                <span class="badge bg-info text-dark">Güncellendi</span>
                            @endif
                        </td>
                        <td>
                            {{ optional($log->car->model->carBrand)->name ?? '' }} - {{ optional($log->car->model)->name ?? '' }}
                        </td>
                        <td>{{ $log->created_at->format('d.m.Y H:i') }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
