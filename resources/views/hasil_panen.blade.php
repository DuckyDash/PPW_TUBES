<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Total Hasil Panen Ikan Tambak</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>

<div class="d-flex">

  <div class="sidebar d-flex flex-column align-items-center py-4">
    <img src="{{ asset('images/logo.png') }}" alt="Logo" class="mb-3" width="80">
    <h6 class="text-white text-center fw-bold mb-4">Tambak Mina Jaya</h6>

    <nav class="nav flex-column w-100">
      <a href="/dashboard" class="nav-link"><i class="bi bi-house-door me-2"></i>Dashboard</a>
      <a href="/keuangan" class="nav-link"><i class="bi bi-wallet2 me-2"></i>Keuangan</a>
      <a href="/inventaris" class="nav-link"><i class="bi bi-box-seam me-2"></i>Inventaris</a>
      <a href="/data_kolam" class="nav-link"><i class="bi bi-droplet-half me-2"></i>Data Kolam</a>
    </nav>
  </div>

  <div class="main-content flex-grow-1">
    <div class="header d-flex justify-content-between align-items-center p-3 border-bottom bg-light">
      <h5 class="fw-semibold mb-0">Total Hasil Panen Ikan Tambak</h5>
      <div>
        <i class="bi bi-envelope me-3"></i>
        <i class="bi bi-bell me-3"></i>
        <i class="bi bi-person-circle"></i>
      </div>
    </div>

    <div class="p-4">

      <div class="total-box shadow-sm mb-4 p-3 bg-white rounded">
        <h6 class="text-muted">Hasil Tambak Selama Ini</h6>
        <h1 class="fw-bold text-dark">12.000.123.22 <span class="text-secondary fs-4">kg</span></h1>
      </div>

      <div class="card shadow-sm border-0">
        <div class="card-body">
          <div class="d-flex justify-content-between align-items-center mb-3">
            <h6 class="fw-bold text-primary mb-0">Data Hasil Panen POKDAKAN</h6>
            <a href="#" class="btn btn-sm btn-primary">Lihat data selengkapnya</a>
          </div>

          <table class="table align-middle">
            <thead class="table-light">
              <tr>
                <th>Batch Panen</th>
                <th>Status Panen</th>
                <th>Total Berat Batch</th>
                <th>Keterangan</th>
                <th class="text-center">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>September 2025</td>
                <td><span class="badge bg-warning text-dark">On-Progress</span></td>
                <td>1320 kg</td>
                <td>-</td>
                <td class="text-center">
                  <i class="bi bi-eye me-2 text-primary"></i>
                  <i class="bi bi-pencil-square me-2 text-success"></i>
                  <i class="bi bi-trash text-danger"></i>
                </td>
              </tr>
              <tr>
                <td>Agustus 2025</td>
                <td><span class="badge bg-info text-dark">Selesai</span></td>
                <td>1020 kg</td>
                <td>-</td>
                <td class="text-center">
                  <i class="bi bi-eye me-2 text-primary"></i>
                  <i class="bi bi-pencil-square me-2 text-success"></i>
                  <i class="bi bi-trash text-danger"></i>
                </td>
              </tr>
              <tr>
                <td>Juli 2025</td>
                <td><span class="badge bg-info text-dark">Selesai</span></td>
                <td>1100 kg</td>
                <td>-</td>
                <td class="text-center">
                  <i class="bi bi-eye me-2 text-primary"></i>
                  <i class="bi bi-pencil-square me-2 text-success"></i>
                  <i class="bi bi-trash text-danger"></i>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>

      <button class="btn btn-success rounded-circle position-fixed btn-float">
        <i class="bi bi-plus-lg fs-4"></i>
      </button>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
