@extends('layouts.app')

@section('title', 'Inventaris - Tambak Ikan Mina Jaya')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/inventaris.css') }}">
@endpush

@section('header')
Inventaris POKDAKAN Mina Jaya
@endsection

@section('content')
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
@endsection
