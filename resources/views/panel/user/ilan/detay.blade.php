@extends('panel.layout.app')

@section('content')
    <div class="container mt-4">
        <div class="card shadow-sm border-0">
            <div class="card-body">
                <h2 class="mb-4 text-primary">🚗 İlan Detay</h2>
                <hr>

                @foreach($ilan as $i)
                    <div class="row mb-3">
                        <div class="col-md-6 mb-2">
                            <strong>Model:</strong> <span class="text-dark">{{ $i->model->name ?? 'Yok' }}</span>
                        </div>
                        <div class="col-md-6 mb-2">
                            <strong>Marka:</strong> <span class="text-dark">{{ $i->model->carBrand->name ?? 'Yok' }}</span>
                        </div>
                        <div class="col-md-6 mb-2">
                            <strong>Yıl:</strong> <span class="text-dark">{{ $i->year }}</span>
                        </div>
                        <div class="col-md-6 mb-2">
                            <strong>Vites Türü:</strong>
                            <span class="badge bg-info text-dark">
                        @if($i->vites_türü==0)
                                    Manuel Vites
                                @elseif($i->vites_türü==1)
                                    Otomatik Vites
                                @else
                                    Yarı Otomatik Vites
                                @endif
                    </span>
                        </div>
                        <div class="col-md-6 mb-2">
                            <strong>Yakıt Türü:</strong>
                            <span class="badge bg-warning text-dark">
                        @if($i->yakıt_türü==0)
                                    Benzin
                                @elseif($i->yakıt_türü==1)
                                    Dizel
                                @elseif($i->yakıt_türü==2)
                                    Elektrik
                                @else
                                    LPG
                                @endif
                    </span>
                        </div>
                        <div class="col-md-6 mb-2">
                            <strong>Kilometre:</strong> <span class="text-dark">{{ number_format($i->km) }} km</span>
                        </div>
                        <div class="col-md-6 mb-2">
                            <strong>Fiyat:</strong> <span class="fw-bold text-success">{{ number_format($i->fiyat, 0, ',', '.') }} ₺</span>
                        </div>
                        <div class="col-12 mb-2">
                            <strong>Açıklama:</strong> <span class="text-muted">{{ $i->description }}</span>
                        </div>
                        <div class="col-md-6 mb-2">
                            <strong>Hasar Açıklaması:</strong> <span class="text-danger">{{ $i->damage->description ?? 'Yok' }}</span>
                        </div>
                        <div class="col-md-6 mb-2">
                            <strong>Hasar Tarihi:</strong> <span class="text-muted">{{ $i->damage->hasar_tarihi ?? 'Yok' }}</span>
                        </div>
                    </div>
                @endforeach

                <div class="mt-4">
                    <a href="{{ route('user.arabaIlan.index') }}" class="btn btn-secondary">
                        ← Listeye Dön
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
