<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard - Tambak Ikan Mina Jaya</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">

  <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
</head>
<body>

<div class="d-flex">
  <div class="sidebar d-flex flex-column align-items-center">
    <img src="{{ asset('images/logo.png') }}" width="80" class="mb-3">
    <h5 class="text-center">Tambak Ikan Mina Jaya</h5>
    <nav class="nav flex-column w-100 mt-4">
      <a href="/dashboard" class="nav-link active">Dashboard</a>
      <a href="/keuangan" class="nav-link">Keuangan</a>
      <a href="/inventaris" class="nav-link">Inventaris</a>
      <a href="/data_kolam" class="nav-link">Data Kolam</a>
    </nav>
  </div>

  <div class="main-content flex-grow-1">
    <div class="header">
      <div>Selamat Datang, <strong>Wawan Kurniawan</strong></div>
      <div>
        <i class="bi bi-envelope me-3"></i>
        <i class="bi bi-bell me-3"></i>
        <i class="bi bi-person-circle"></i>
      </div>
    </div>

    <div class="content">
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
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<script src="{{ asset('js/dashboard.js') }}"></script>
</body>
</html>
