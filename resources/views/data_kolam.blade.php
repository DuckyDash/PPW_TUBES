@extends('layouts.app')

@section('title', 'Data Kolam - Tambak Ikan Mina Jaya')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/data_kolam.css') }}">
<style>
  .kolam-card {
    border: none;
    border-radius: 1rem;
    box-shadow: 0 2px 10px rgba(0,0,0,0.08);
    transition: all 0.2s ease-in-out;
    background-color: #fff;
    height: 230px; /* biar semua sama */
  }
  .kolam-card:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 14px rgba(0,0,0,0.1);
  }
  .status-indikator {
    width: 12px;
    height: 12px;
    border-radius: 50%;
    display: inline-block;
    margin-right: 6px;
  }
  .status-aktif { background-color: #28a745; }       /* hijau */
  .status-perawatan { background-color: #ffc107; }   /* kuning */
  .status-nonaktif { background-color: #dc3545; }    /* merah */
  .card-body {
    padding: 1rem 1.25rem;
  }
  .btn-menu {
    border: none;
    background: transparent;
    color: #6c757d;
  }
  .btn-menu:hover {
    color: #0d6efd;
  }
  .kolam-info small {
    color: #6c757d;
  }
</style>
@endpush

@section('header')
Data Kolam POKDAKAN Mina Jaya
@endsection

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
  <h5 class="fw-bold text-primary">Monitoring Kolam Ikan</h5>
  <button class="btn btn-success btn-sm rounded-4 shadow-sm" data-bs-toggle="modal" data-bs-target="#modalKolam">
    <i class="bi bi-plus-lg me-1"></i> Tambah Kolam
  </button>
</div>

<div class="row g-4" id="kolamContainer">
  {{-- Contoh card statis (nanti dari JS juga bisa) --}}
  <div class="col-md-4">
    <div class="card kolam-card">
      <div class="card-body d-flex flex-column justify-content-between">
        <div class="d-flex justify-content-between align-items-start">
          <div>
            <h6 class="fw-semibold mb-1 text-primary">Kolam Lele A1</h6>
            <div class="d-flex align-items-center mb-1">
              <span class="status-indikator status-aktif"></span>
              <small class="fw-semibold">Aktif</small>
            </div>
          </div>
          <div class="dropdown">
            <button class="btn-menu" type="button" data-bs-toggle="dropdown">
              <i class="bi bi-three-dots-vertical"></i>
            </button>
            <ul class="dropdown-menu dropdown-menu-end shadow-sm rounded-3">
              <li><button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modalDetailKolam">Lihat Detail</button></li>
              <li><button class="dropdown-item text-warning">Edit</button></li>
              <li><button class="dropdown-item text-danger">Hapus</button></li>
            </ul>
          </div>
        </div>
        <div class="kolam-info mt-2">
          <small>Jenis Ikan: Lele</small><br>
          <small>Suhu Air: 28°C</small><br>
          <small>pH Air: 7.1</small><br>
          <small>Pemilik: Pak Darto</small>
        </div>
      </div>
    </div>
  </div>

  {{-- Tambahan card lain tinggal copas aja --}}
</div>

{{-- Modal Tambah / Edit Kolam --}}
<div class="modal fade" id="modalKolam" tabindex="-1" aria-labelledby="modalKolamLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content border-0 shadow">
      <div class="modal-header bg-light border-0">
        <h5 class="modal-title fw-semibold text-primary" id="modalKolamLabel">Tambah Data Kolam</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body px-4 pb-4">
        <form id="formKolam">
          <input type="hidden" id="editIndex">

          <div class="row g-4">
            <div class="col-md-6">
              <div class="mb-3">
                <label class="form-label">Nama Kolam</label>
                <input type="text" class="form-control rounded-3 shadow-sm" id="kolamName" required>
              </div>
              <div class="mb-3">
                <label class="form-label">Jenis Ikan</label>
                <input type="text" class="form-control rounded-3 shadow-sm" id="jenisIkan" required>
              </div>
              <div class="mb-3">
                <label class="form-label">Suhu Air (°C)</label>
                <input type="number" class="form-control rounded-3 shadow-sm" id="suhuAir" required>
              </div>
              <div class="mb-3">
                <label class="form-label">PH Air</label>
                <input type="text" class="form-control rounded-3 shadow-sm" id="phAir" required>
              </div>
            </div>

            <div class="col-md-6">
              <div class="mb-3">
                <label class="form-label">Status Pakan</label>
                <select class="form-select rounded-3 shadow-sm" id="statusPakan">
                  <option value="Diberikan">Diberikan</option>
                  <option value="Belum Diberikan">Belum Diberikan</option>
                </select>
              </div>
              <div class="mb-3">
                <label class="form-label">Pemilik Kolam</label>
                <input type="text" class="form-control rounded-3 shadow-sm" id="pemilikKolam" required>
              </div>
              <div class="mb-3">
                <label class="form-label">Status Kolam</label>
                <select class="form-select rounded-3 shadow-sm" id="statusKolam">
                  <option value="Aktif">Aktif</option>
                  <option value="Dalam Perawatan">Dalam Perawatan</option>
                  <option value="Tidak Aktif">Tidak Aktif</option>
                </select>
              </div>
            </div>
          </div>

          <div class="text-center mt-4">
            <button type="submit" class="btn btn-success rounded-4 px-5 py-2">
              <i class="bi bi-check-circle me-1"></i> Simpan
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

{{-- Modal Detail Kolam --}}
<div class="modal fade" id="modalDetailKolam" tabindex="-1">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content border-0 shadow">
      <div class="modal-header bg-light border-0">
        <h5 class="modal-title fw-semibold text-primary">Detail Kolam</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body px-4 pb-4" id="detailKolamBody">
        {{-- Isi detail dari JS --}}
      </div>
    </div>
  </div>
</div>
@endsection

@push('scripts')
<script src="{{ asset('js/data_kolam.js') }}"></script>
@endpush
