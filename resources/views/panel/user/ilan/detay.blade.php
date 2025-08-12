@extends('panel.layout.app')

@section('content')
    <style>
        .ilan-card {
            transition: all 0.3s ease-in-out;
        }
        .ilan-card:hover {
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
            transform: translateY(-3px);
        }
        .badge-ozel {
            font-size: 0.9rem;
            padding: 0.4rem 0.7rem;
            border-radius: 0.5rem;
        }
    </style>

    <div class="container mt-4 animate__animated animate__fadeIn">
        <div class="card ilan-card border-0 shadow-lg">
            <div class="card-body">
                <h2 class="text-center text-primary mb-4 animate__animated animate__fadeInDown">
                    🚗 İlan Detay Bilgileri
                </h2>
                <hr>

                @foreach($ilan as $i)
                    <div class="row g-4 animate__animated animate__fadeInUp">
                        <div class="col-md-6">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <strong>👤 Sahip:</strong> {{ $i->user->name . ' ' . $i->user->surname ?? 'Bilinmiyor' }}
                                </li>
                                <li class="list-group-item">
                                    <strong>🚘 Model:</strong> {{ $i->model->name ?? 'Bilinmiyor' }}
                                </li>
                                <li class="list-group-item">
                                    <strong>🏷️ Marka:</strong> {{ $i->model->carBrand->name ?? 'Bilinmiyor' }}
                                </li>
                                <li class="list-group-item">
                                    <strong>📅 Yıl:</strong> {{ $i->year }}
                                </li>
                                <li class="list-group-item">
                                    <strong>🛣️ KM:</strong> {{ number_format($i->km) }} km
                                </li>
                                <li class="list-group-item">
                                    <strong>💰 Fiyat:</strong> <span class="text-success fw-bold">{{ number_format($i->fiyat, 0, ',', '.') }} ₺</span>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <strong>⚙️ Vites:</strong>
                                    <span class="badge bg-info text-dark badge-ozel">
                                    @switch($i->vites_türü)
                                            @case(0) Manuel @break
                                            @case(1) Otomatik @break
                                            @case(2) Yarı Otomatik @break
                                            @default Bilinmiyor
                                        @endswitch
                                </span>
                                </li>
                                <li class="list-group-item">
                                    <strong>⛽ Yakıt:</strong>
                                    <span class="badge bg-warning text-dark badge-ozel">
                                    @switch($i->yakıt_türü)
                                            @case(0) Benzin @break
                                            @case(1) Dizel @break
                                            @case(2) Elektrik @break
                                            @case(3) LPG @break
                                            @default Bilinmiyor
                                        @endswitch
                                </span>
                                </li>
                                <li class="list-group-item">
                                    <strong>📝 Açıklama:</strong>
                                    <p class="text-muted mt-2">{{ $i->description ?: 'Açıklama girilmemiş' }}</p>
                                </li>
                                <li class="list-group-item">
                                    <strong>💥 Hasar:</strong> {{ $i->damage->description ?? 'Hasar bilgisi yok' }}
                                </li>
                                <li class="list-group-item">
                                    <strong>📆 Hasar Tarihi:</strong> {{ $i->damage->hasar_tarihi ?? 'Bilinmiyor' }}
                                </li>
                            </ul>
                        </div>
                    </div>
                @endforeach

                <div class="mt-4 text-center">
                    <a href="{{ route('user.arabaIlan.index') }}" class="btn btn-outline-secondary btn-lg animate__animated animate__fadeInUp">
                        ← Listeye Dön
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
