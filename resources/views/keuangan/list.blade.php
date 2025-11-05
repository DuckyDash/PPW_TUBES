@extends('layouts.app')

@section('title', 'List Keuangan - Tambak Ikan Mina Jaya')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/keuangan.css') }}">
@endpush

@section('header')
Daftar Transaksi Keuangan Tambak Ikan Mina Jaya
@endsection

@section('content')
<div class="container-fluid px-4">

  {{-- Judul Halaman --}}
  <div class="d-flex justify-content-between align-items-center mb-4">
    <h5 class="fw-bold text-primary mb-0">Transaksi Keuangan Tambak</h5>
    <button class="btn btn-success rounded-circle" data-bs-toggle="modal" data-bs-target="#modalTransaksi">
      <i class="bi bi-plus-lg"></i>
    </button>
  </div>

  {{-- Tabel Transaksi --}}
  <div class="card border-0 shadow-sm">
    <div class="card-body">
      <div class="table-responsive">
        <table class="table align-middle table-hover mb-0">
          <thead class="table-light">
            <tr>
              <th>Nomor</th>
              <th>Nama Transaksi</th>
              <th>Tanggal</th>
              <th>Tipe</th>
              <th>Status</th>
              <th>Keterangan</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            @for ($i = 0; $i < 10; $i++)
            <tr>
              <td>9288</td>
              <td>Pembelian Pakan Ikan</td>
              <td>11/09/25</td>
              <td><span class="text-danger fw-semibold">Keluar</span></td>
              <td><span class="badge bg-success">Selesai</span></td>
              <td>-</td>
              <td>
                <a href="{{ route('keuangan.detail', ['id' => 9288]) }}">
                <i class="bi bi-eye me-2 text-secondary"></i>
                </a>
                <i class="bi bi-download text-secondary"></i>
              </td>
            </tr>
            @endfor
          </tbody>
        </table>
      </div>
    </div>
  </div>

  {{-- Modal Tambah Transaksi --}}
  <div class="modal fade" id="modalTransaksi" tabindex="-1" aria-labelledby="modalTransaksiLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content border-0 shadow">
        <div class="modal-header bg-light border-0">
          <h5 class="modal-title fw-semibold text-primary" id="modalTransaksiLabel">Tambah Transaksi</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <div class="modal-body px-4 pb-4">
          <form>
            <div class="row g-4">
              <!-- Kiri -->
              <div class="col-md-6">
                <div class="mb-3">
                  <label class="form-label">Nomor Transaksi</label>
                  <input type="text" class="form-control rounded-3 shadow-sm">
                </div>

                <div class="mb-3">
                  <label class="form-label">Nama Transaksi</label>
                  <input type="text" class="form-control rounded-3 shadow-sm">
                </div>

                <div class="mb-3">
                  <label class="form-label">Nominal Transaksi</label>
                  <input type="number" class="form-control rounded-3 shadow-sm">
                </div>

                <div class="mb-3">
                  <label class="form-label">Tanggal Transaksi</label>
                  <input type="date" class="form-control rounded-3 shadow-sm">
                </div>

                <div class="mb-3">
                  <label class="form-label">Jenis Transaksi</label>
                  <select class="form-select rounded-3 shadow-sm">
                    <option>Pemasukan</option>
                    <option>Pengeluaran</option>
                  </select>
                </div>
              </div>

              <!-- Kanan -->
              <div class="col-md-6">
                <div class="mb-3">
                  <label class="form-label">Detail Transaksi</label>
                  <textarea class="form-control rounded-3 shadow-sm" rows="5"></textarea>
                </div>

                <div class="mb-3">
                  <label class="form-label">Eviden Transaksi</label><br>
                  <button type="button" class="btn btn-outline-secondary btn-sm rounded-3 px-3">
                    <i class="bi bi-upload me-1"></i> Upload a Photo
                  </button>
                </div>
              </div>
            </div>

            <div class="text-center mt-4">
              <button type="submit" class="btn btn-primary rounded-4 px-5 py-2">Selesai</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

</div>
@endsection

@push('scripts')
<script src="{{ asset('js/keuangan.js') }}"></script>
@endpush
