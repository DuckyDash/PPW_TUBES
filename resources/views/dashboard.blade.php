@extends('layouts.app')

@section('title', 'Dashboard - Tambak Ikan Mina Jaya')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
@endpush

@section('content')
  <h3 class="text-center fw-bold text-primary mb-4">STATISTIK KOLAM</h3>

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
        <h2>AAAA</h2>
      </div>
    </div>
  </div>

  <div class="row g-3 equal-height">
    <div class="col-md-6 d-flex">
      <div class="card p-3 w-100">
        <h5 class="fw-bold text-primary mb-3">Jenis Ikan</h5>

        <div class="fish-section">
          <ul class="list-unstyled fish-list mb-0">
            <li><span class="dot dot-blue"></span> Ikan Mujair - 40%</li>
            <li><span class="dot dot-green"></span> Ikan Lele - 25%</li>
            <li><span class="dot dot-teal"></span> Ikan Nila - 20%</li>
            <li><span class="dot dot-purple"></span> Ikan Patin - 15%</li>
          </ul>
          <canvas id="fishChart"></canvas>
        </div>
      </div>
    </div>

    <div class="col-md-6 d-flex">
      <div class="card p-3 w-100">
        <h5 class="fw-bold text-primary mb-3">Status Sensor Kolam</h5>
        <ul class="list-unstyled mb-3">
          <li>Total Sensor: 12</li>
          <li>Sensor Aktif: 12</li>
          <li>Sensor Inaktif: 0</li>
        </ul>
        <a href="#" class="text-decoration-none small text-primary mt-auto">Periksa Selengkapnya</a>
      </div>
    </div>
  </div>
@endsection

@push('scripts')
<script src="{{ asset('js/dashboard.js') }}"></script>
@endpush
