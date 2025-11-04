@extends('layouts.app')

@section('title', 'Keuangan - Tambak Ikan Mina Jaya')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/keuangan.css') }}">
@endpush

@section('header')
Selamat Datang di <strong>Keuangan Tambak Ikan Mina Jaya</strong>
@endsection

@section('content')
<div class="row mb-4">
  <div class="col-md-6">
    <div class="card stat-card shadow-sm p-3">
      <p class="mb-1 fw-semibold">Dana Tambak</p>
      <h3 class="text-success fw-bold">Rp. 12.000.000</h3>
      <small>Transaksi terakhir pada 12/09/2025</small>
      <button class="btn btn-outline-dark btn-sm mt-2">Selengkapnya ></button>
    </div>
  </div>
  <div class="col-md-6">
    <div class="card stat-card shadow-sm p-3">
      <p class="mb-1 fw-semibold">Transaksi Terakhir</p>
      <h3 class="text-danger fw-bold">- Rp. 920.000</h3>
      <small>Transaksi terakhir pada 12/09/2025</small>
      <button class="btn btn-outline-dark btn-sm mt-2">Selengkapnya ></button>
    </div>
  </div>
</div>

<div class="card p-3 shadow-sm">
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h5 class="fw-bold text-primary mb-0">Transaksi Keuangan Tambak</h5>
    <button class="btn btn-primary btn-sm">List data selengkapnya</button>
  </div>

  <div class="table-responsive">
    <table class="table table-hover align-middle">
      <thead class="table-light">
        <tr>
          <th>Nomor</th>
          <th>Nama Transaksi</th>
          <th>Tanggal</th>
          <th>Tipe</th>
          <th>Status</th>
          <th>Keterangan</th>
        </tr>
      </thead>
      <tbody>
        @for ($i = 0; $i < 6; $i++)
        <tr>
          <td>9288</td>
          <td>Pembelian Pakan Ikan</td>
          <td>11/09/25</td>
          <td>Keluar</td>
          <td><span class="badge bg-success">Selesai</span></td>
          <td>
            <i class="bi bi-eye me-2"></i>
            <i class="bi bi-pencil"></i>
          </td>
        </tr>
        @endfor
      </tbody>
    </table>
  </div>
</div>

{{-- Floating Button --}}
<div class="floating-btn">
  <button class="btn btn-success rounded-circle me-2" data-bs-toggle="modal" data-bs-target="#modalTransaksi">
    <i class="bi bi-plus-lg"></i>
  </button>
  <button class="btn btn-primary rounded-circle">
    <i class="bi bi-arrow-clockwise"></i>
  </button>

  <div class="floating-btn">
  <button class="btn btn-success shadow-lg">
    <i class="bi bi-plus-lg"></i>
    LAGI TEST
  </button>
</div>
</div>

{{-- Modal --}}
<div class="modal fade" id="modalTransaksi" tabindex="-1" aria-labelledby="modalTransaksiLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title" id="modalTransaksiLabel">Tambah Transaksi</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form>
          <div class="row g-3">
            <div class="col-md-6">
              <label class="form-label">Nomor Transaksi</label>
              <input type="text" class="form-control">
            </div>
            <div class="col-md-6">
              <label class="form-label">Jenis Transaksi</label>
              <select class="form-select">
                <option>Pemasukan</option>
                <option>Pengeluaran</option>
              </select>
            </div>

            <div class="col-md-6">
              <label class="form-label">Nama Transaksi</label>
              <input type="text" class="form-control">
            </div>
            <div class="col-md-6">
              <label class="form-label">Eviden Transaksi</label>
              <input type="file" class="form-control">
            </div>

            <div class="col-md-6">
              <label class="form-label">Nominal Transaksi</label>
              <input type="number" class="form-control">
            </div>
            <div class="col-md-6">
              <label class="form-label">Tanggal Transaksi</label>
              <input type="date" class="form-control">
            </div>

            <div class="col-6">
              <label class="form-label">Detail Transaksi</label>
              <textarea class="form-control" rows="3"></textarea>
            </div>
          </div>

          <div class="text-center mt-4">
            <button type="submit" class="btn btn-primary px-5">Selesai</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection

@push('scripts')
<script src="{{ asset('js/keuangan.js') }}"></script>
@endpush
