<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Inventaris - Tambak Ikan Mina Jaya</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">

  <link rel="stylesheet" href="{{ asset('css/inventaris.css') }}">
</head>
<body>

<div class="d-flex">
  <div class="sidebar d-flex flex-column align-items-center">
    <img src="{{ asset('images/logo.png') }}" width="80" class="mb-3">
    <h5 class="text-center">Tambak Ikan Mina Jaya</h5>
    <nav class="nav flex-column w-100 mt-4">
      <a href="/dashboard" class="nav-link">Dashboard</a>
      <a href="/keuangan" class="nav-link">Keuangan</a>
      <a href="/inventaris" class="nav-link active">Inventaris</a>
      <a href="/data_kolam" class="nav-link">Data Kolam</a>
    </nav>
  </div>

  <div class="main-content flex-grow-1">
    <div class="header">
      <div>Inventaris POKDAKAN Mina Jaya</div>
      <div>
        <i class="bi bi-envelope me-3"></i>
        <i class="bi bi-bell me-3"></i>
        <i class="bi bi-person-circle"></i>
      </div>
    </div>

    <div class="content">
      <div class="card shadow-sm mb-4 border-0">
        <div class="card-body d-flex justify-content-between align-items-center">
          <div>
            <h5 class="fw-bold mb-1">Total Hasil Panen Ikan Tambak</h5>
            <small class="text-muted">Bulan September 2025</small>
          </div>
          <div class="text-end">
            <small class="text-muted d-block mb-1">Data Terbaru Tanggal : 18 September 2025</small>
            <h1 class="fw-bold display-5">2.728 <span class="fs-4 text-secondary">kg</span></h1>
            <button class="btn btn-outline-secondary btn-sm">
              Selengkapnya <i class="bi bi-chevron-down"></i>
            </button>
          </div>
        </div>
      </div>

      <div class="card shadow-sm border-0">
        <div class="card-body">
          <h5 class="fw-bold text-primary mb-3">Inventaris Kepemilikan POKDAKAN</h5>
          <div class="table-responsive">
            <table class="table table-hover align-middle">
              <thead class="table-light">
                <tr>
                  <th>Nomor</th>
                  <th>Nama Barang</th>
                  <th>Kondisi</th>
                  <th>Pemilik</th>
                  <th>Jumlah</th>
                  <th>Keterangan</th>
                  <th class="text-center">Aksi</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>T9288</td>
                  <td>Pancingan Si Mbah</td>
                  <td>Sgt. Baik</td>
                  <td>Sobari</td>
                  <td>Pcs</td>
                  <td>Gagang Patah</td>
                  <td class="text-center">
                    <i class="bi bi-eye me-2"></i>
                    <i class="bi bi-download"></i>
                  </td>
                </tr>
                <tr>
                  <td>T9289</td>
                  <td>Jaring Kolam</td>
                  <td>Baik</td>
                  <td>Alat</td>
                  <td>5</td>
                  <td>-</td>
                  <td class="text-center">
                    <i class="bi bi-eye me-2"></i>
                    <i class="bi bi-download"></i>
                  </td>
                </tr>
                <tr>
                  <td>T9290</td>
                  <td>Pompa Air</td>
                  <td>Baru</td>
                  <td>Gudang</td>
                  <td>2</td>
                  <td>-</td>
                  <td class="text-center">
                    <i class="bi bi-eye me-2"></i>
                    <i class="bi bi-download"></i>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>

      <div class="floating-btn">
        <button class="btn btn-success shadow-lg">
          <i class="bi bi-plus-lg"></i>
        </button>
      </div>

    </div> 
  </div> 
</div> 

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
