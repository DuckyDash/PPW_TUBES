@extends('layouts.app')

@section('title', 'Dashboard - Tambak Ikan Mina Jaya')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
@endpush

@section('header')
<strong>Dashboard Tambak Ikan Mina Jaya</strong>
@endsection

@section('content')
  <h3 class="text-center fw-bold text-primary mb-4">STATISTIK KOLAM</h3>

  {{-- Stat atas --}}
  <div class="row g-3 mb-4">
    <div class="col-md-4">
      <div class="stat-box stat-blue">
        <p>Suhu Air Kolam</p>
        <h2>6.20°C</h2>
      </div>
    </div>
    <div class="col-md-4">
      <div class="stat-box stat-orange">
        <p>Ph Air Kolam</p>
        <h2>6.20</h2>
      </div>
    </div>
    <div class="col-md-4">
      <div class="stat-box stat-red">
        <p>Kadar Oksigen Air</p>
        <h2>12</h2>
      </div>
    </div>
  </div>

  {{-- Jenis Ikan & Status Sensor --}}
  <div class="row g-3 equal-height">
    <!-- Jenis Ikan -->
    <div class="col-md-6 d-flex">
      <div class="card p-3 w-100 d-flex flex-column justify-content-between">
        <h5 class="fw-bold text-primary mb-3">Jenis Ikan</h5>
        <div class="chart-section d-flex justify-content-between align-items-center flex-wrap">
          <ul class="list-unstyled fish-list mb-0">
            <li><span class="dot dot-blue"></span> Ikan Mujair - 40%</li>
            <li><span class="dot dot-green"></span> Ikan Lele - 25%</li>
            <li><span class="dot dot-teal"></span> Ikan Nila - 20%</li>
            <li><span class="dot dot-purple"></span> Ikan Patin - 15%</li>
          </ul>
          <div class="chart-container">
            <canvas id="fishChart"></canvas>
          </div>
        </div>
      </div>
    </div>

    <!-- Status Sensor Kolam -->
    <div class="col-md-6 d-flex">
      <div class="card p-3 w-100 d-flex flex-column justify-content-between">
        <h5 class="fw-bold text-primary mb-3">Status Sensor Kolam</h5>
        <div class="chart-section d-flex justify-content-between align-items-center flex-wrap">
          <ul class="list-unstyled sensor-list mb-0">
            <li><span class="dot dot-blue"></span> Total Sensor: 12</li>
            <li><span class="dot dot-green"></span> Sensor Aktif: 12</li>
            <li><span class="dot dot-teal"></span> Sensor Inaktif: 0</li>
          </ul>
          <div class="status-check">
            <i class="bi bi-check-circle-fill"></i>
          </div>
        </div>
        <a href="#" class="text-decoration-none small text-primary mt-2">Periksa Selengkapnya</a>
      </div>
    </div>
  </div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  const ctx = document.getElementById('fishChart').getContext('2d');
  new Chart(ctx, {
    type: 'doughnut',
    data: {
      labels: ['Ikan Mujair', 'Ikan Lele', 'Ikan Nila', 'Ikan Patin'],
      datasets: [{
        data: [40, 25, 20, 15],
        backgroundColor: ['#7366ff', '#54c78c', '#00bcd4', '#7b61ff'],
        borderWidth: 1
      }]
    },
    options: {
      cutout: '65%',
      plugins: { legend: { display: false } },
      responsive: true,
      maintainAspectRatio: false
    }
  });
</script>
@endpush
