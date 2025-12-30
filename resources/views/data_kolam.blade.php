@extends('layouts.app')

@section('title', 'Data Kolam - Tambak Ikan Mina Jaya')

@push('styles')
<style>
  .kolam-card {
    border: none;
    border-radius: 1rem;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
    transition: all 0.2s ease-in-out;
    background-color: #fff;
    height: 230px;
  }

  .kolam-card:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 14px rgba(0, 0, 0, 0.1);
  }

  .status-indikator {
    width: 12px;
    height: 12px;
    border-radius: 50%;
    display: inline-block;
    margin-right: 6px;
  }

  .status-aktif {
    background-color: #28a745;
  }

  .status-perawatan {
    background-color: #ffc107;
  }

  .status-nonaktif {
    background-color: #dc3545;
  }

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
<strong>Data Kolam Tambak Ikan Mina Jaya</strong>
@endsection

@section('content')

{{-- Alert Notifikasi --}}
@if(session('success'))
<div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
  <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
  <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
</div>
@endif

<div class="d-flex justify-content-between align-items-center mb-3">
  <h5 class="fw-bold text-primary">Monitoring Kolam Ikan</h5>
  {{-- Panggil fungsi dari file eksternal --}}
  <button class="btn btn-success btn-sm rounded-4 shadow-sm" onclick="openModalTambah()">
    <i class="bi bi-plus-lg me-1"></i> Tambah Kolam
  </button>
</div>

<div class="row g-4" id="kolamContainer">
  @forelse($kolams as $kolam)
  @php
  $statusClass = 'status-nonaktif';
  if($kolam->status == 'Aktif') $statusClass = 'status-aktif';
  if($kolam->status == 'Dalam Perawatan') $statusClass = 'status-perawatan';
  @endphp

  <div class="col-md-4">
    <div class="card kolam-card">
      <div class="card-body d-flex flex-column justify-content-between">
        <div class="d-flex justify-content-between align-items-start">
          <div>
            <h6 class="fw-semibold mb-1 text-primary">{{ $kolam->nama_kolam }}</h6>
            <div class="d-flex align-items-center mb-1">
              <span class="status-indikator {{ $statusClass }}"></span>
              <small class="fw-semibold">{{ $kolam->status }}</small>
            </div>
          </div>
          <div class="dropdown">
            <button class="btn-menu" type="button" data-bs-toggle="dropdown">
              <i class="bi bi-three-dots-vertical"></i>
            </button>
            <ul class="dropdown-menu dropdown-menu-end shadow-sm rounded-3">

              {{-- TOMBOL DETAIL --}}
              <li>
                <button class="dropdown-item text-success fw-bold"
                  data-json="{{ json_encode($kolam) }}"
                  onclick="openModalPanen(this)">
                  <i class="bi bi-basket me-2"></i> Panen
                </button>
              </li>
              <li>
                <button class="dropdown-item"
                  data-json="{{ json_encode($kolam) }}"
                  onclick="showDetail(this)">
                  Lihat Detail
                </button>
              </li>

              {{-- TOMBOL EDIT --}}
              <li>
                <button class="dropdown-item text-warning"
                  data-json="{{ json_encode($kolam) }}"
                  onclick="openModalEdit(this)">
                  Edit
                </button>
              </li>

              {{-- TOMBOL HAPUS --}}
              <li>
                <form action="{{ route('data_kolam.destroy', $kolam->id) }}" method="POST" onsubmit="return confirm('Hapus data kolam ini?')">
                  @csrf @method('DELETE')
                  <button type="submit" class="dropdown-item text-danger">Hapus</button>
                </form>
              </li>
            </ul>
          </div>
        </div>
        <div class="kolam-info mt-2">
          <small>Jenis Ikan: {{ $kolam->jenis_ikan }}</small><br>
          <small>Suhu Air: {{ $kolam->suhu_air }}°C</small><br>
          <small>pH Air: {{ $kolam->ph_air }}</small><br>
          <small>Pemilik: {{ $kolam->pemilik }}</small>
        </div>
      </div>
    </div>
  </div>
  @empty
  <div class="col-12 text-center py-5 text-muted">
    <i class="bi bi-water fs-1 d-block mb-3"></i>
    <p>Belum ada data kolam. Silakan tambah data baru.</p>
  </div>
  @endforelse
</div>

{{-- Modal Tambah / Edit Kolam --}}
<div class="modal fade" id="modalKolam" tabindex="-1" aria-labelledby="modalKolamLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content border-0 shadow">
      <div class="modal-header bg-light border-0">
        <h5 class="modal-title fw-semibold text-primary" id="modalTitle">Tambah Data Kolam</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body px-4 pb-4">

        <form id="formKolam" method="POST" action="">
          @csrf
          {{-- Container untuk method PUT --}}
          <div id="methodInput"></div>

          <div class="row g-4">
            <div class="col-md-6">
              <div class="mb-3">
                <label class="form-label">Nama Kolam</label>
                <input type="text" class="form-control rounded-3 shadow-sm" name="nama_kolam" id="nama_kolam" required>
              </div>
              <div class="mb-3">
                <label class="form-label">Jenis Ikan</label>
                <input type="text" class="form-control rounded-3 shadow-sm" name="jenis_ikan" id="jenis_ikan" required>
              </div>
              <div class="mb-3">
                <label class="form-label">Berat Bibit Awal (Kg)</label>
                <input type="number" step="0.01" class="form-control rounded-3 shadow-sm" name="berat_bibit" id="berat_bibit" required>
              </div>
              <div class="mb-3">
                <label class="form-label">Suhu Air (°C)</label>
                <input type="number" step="0.01" class="form-control rounded-3 shadow-sm" name="suhu_air" id="suhu_air" required>
              </div>
              <div class="mb-3">
                <label class="form-label">PH Air</label>
                <input type="number" step="0.1" class="form-control rounded-3 shadow-sm" name="ph_air" id="ph_air" required>
              </div>
            </div>

            <div class="col-md-6">
              <div class="mb-3">
                <label class="form-label">Status Pakan</label>
                <select class="form-select rounded-3 shadow-sm" name="status_pakan" id="status_pakan">
                  <option value="Diberikan">Diberikan</option>
                  <option value="Belum Diberikan">Belum Diberikan</option>
                </select>
              </div>

              <div class="mb-3">
                <label class="form-label">Pemilik</label>
                <div class="form-control bg-light text-muted">
                  {{ Auth::user()->name }} (Otomatis)
                </div>
              </div>

              <div class="mb-3">
                <label class="form-label">Status Kolam</label>
                <select class="form-select rounded-3 shadow-sm" name="status" id="status">
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


{{-- Modal Panen --}}
<div class="modal fade" id="modalPanen" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title">Form Panen Ikan</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('panen.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="kolam_id" id="panen_kolam_id">
                    
                    {{-- Data Readonly (Otomatis Terisi) --}}
                    <div class="mb-3">
                        <label class="small text-muted">Pemilik</label>
                        <input type="text" class="form-control bg-light" id="panen_pemilik" readonly>
                    </div>
                    <div class="row">
                        <div class="col-6 mb-3">
                            <label class="small text-muted">Jenis Ikan</label>
                            <input type="text" class="form-control bg-light" id="panen_jenis" readonly>
                        </div>
                        <div class="col-6 mb-3">
                            <label class="small text-muted">Berat Bibit (Kg)</label>
                            <input type="text" class="form-control bg-light" id="panen_bibit" readonly>
                        </div>
                    </div>

                    {{-- Input User --}}
                    <div class="mb-3">
                        <label class="form-label fw-bold text-success">Berat Hasil Panen (Kg)</label>
                        <input type="number" step="0.01" name="berat_panen" class="form-control form-control-lg border-success" required>
                    </div>

                    <button type="submit" class="btn btn-success w-100">Ajukan Panen</button>
                </form>
            </div>
        </div>
    </div>
</div>  
@endsection

@push('scripts')
{{-- Panggil File JS Eksternal --}}
<script src="{{ asset('js/script_kolam.js') }}"></script>
<script src="{{ asset('js/panen_kolam.js') }}"></script>
@endpush