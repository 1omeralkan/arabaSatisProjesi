@extends('panel.layout.app')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

@section('content')
    <div class="container mt-4">
        <div class="row">

            @php
                $boxes = [
                    ['label' => 'Toplam Kullanıcı', 'value' => $toplamKullanici, 'color' => 'primary', 'icon' => 'fa-users'],
                    ['label' => 'Toplam İlan', 'value' => $toplamIlan, 'color' => 'secondary', 'icon' => 'fa-car'],
                    ['label' => 'Yayında Olan', 'value' => $yayindaOlan, 'color' => 'success', 'icon' => 'fa-check-circle'],
                    ['label' => 'Bekleyen', 'value' => $bekleyen, 'color' => 'warning', 'icon' => 'fa-clock'],
                    ['label' => 'Reddedilen', 'value' => $reddedilen, 'color' => 'danger', 'icon' => 'fa-times-circle'],
                    ['label' => 'Bugün Eklenen', 'value' => $bugunEklenen, 'color' => 'info', 'icon' => 'fa-calendar-day'],
                ];
            @endphp

            @foreach($boxes as $box)
                <div class="col-md-4 mb-4">
                    <div class="card bg-{{ $box['color'] }} text-white shadow">
                        <div class="card-body d-flex align-items-center justify-content-between">
                            <div>
                                <h5 class="card-title">{{ $box['label'] }}</h5>
                                <h3>{{ $box['value'] }}</h3>
                            </div>
                            <i class="fas {{ $box['icon'] }} fa-2x"></i>
                        </div>
                    </div>
                </div>
            @endforeach


        </div>
    </div>

    <div class="row mt-4">
        <div class="col-md-6">
            <canvas id="ilanDurumuChart"></canvas>
        </div>
        <div class="col-md-6">
            <canvas id="gunlukIlanChart"></canvas>
        </div>
    </div>

    <script>
        // İlan Durumu Grafiği
        const ilanDurumuCtx = document.getElementById('ilanDurumuChart').getContext('2d');
        new Chart(ilanDurumuCtx, {
            type: 'doughnut',
            data: {
                labels: ['Yayında', 'Bekliyor', 'Reddedildi'],
                datasets: [{
                    data: [{{ $yayindaOlan }}, {{ $bekleyen }}, {{ $reddedilen }}],
                    backgroundColor: ['#28a745', '#ffc107', '#dc3545']
                }]
            }
        });

        // Günlük İlan Grafiği
        const gunlukIlanCtx = document.getElementById('gunlukIlanChart').getContext('2d');
        new Chart(gunlukIlanCtx, {
            type: 'line',
            data: {
                labels: {!! json_encode($gunlukIlanlar->keys()) !!},
                datasets: [{
                    label: 'Günlük İlan Sayısı',
                    data: {!! json_encode($gunlukIlanlar->values()) !!},
                    borderColor: '#007bff',
                    tension: 0.4,
                    fill: true,
                    backgroundColor: 'rgba(0,123,255,0.1)'
                }]
            }
        });
    </script>

@endsection
