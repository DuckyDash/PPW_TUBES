@extends('layouts.app')

@section('title', 'Data Kolam - Tambak Ikan Mina Jaya')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/data_kolam.css') }}">
@endpush

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
  <h5 class="fw-bold text-primary">KOLAM PODAKAN Mina Jaya</h5>
  <button class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#modalKolam">
    <i class="bi bi-plus-lg"></i> Tambahkan
  </button>
</div>

<div class="row g-4" id="kolamContainer">
  @for ($i = 1; $i <= 4; $i++)
  <div class="col-md-6 col-lg-4 col-xl-3">
    <div class="card p-3 shadow-sm">
      <div class="d-flex justify-content-between align-items-center">
        <h6 class="fw-bold">KOLAM {{ $i }} <span class="dot"></span></h6>
        <i class="bi bi-gear"></i>
      </div>
      <p class="mb-1"><strong>Jenis Ikan:</strong> Mujair</p>
      <p class="mb-1"><strong>Suhu Air:</strong> 28°C</p>
      <p class="mb-1"><strong>PH Air:</strong> 6.13</p>
      <p class="mb-1"><strong>Status Pakan:</strong> <span class="text-success">Diberikan</span></p>
      <p class="mb-1"><strong>Oksigen Air:</strong> 28°C</p>
      <p class="mb-0"><strong>Pemilik Kolam:</strong> Sujarwo</p>
    </div>
  </div>
  @endfor
</div>

{{-- Modal Tambah Data Kolam --}}
<div class="modal fade" id="modalKolam" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content p-3">
      <div class="modal-header border-0">
        <h5 class="modal-title fw-bold">Tambah Data Kolam</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <form id="formKolam">
          <div class="mb-2">
            <label class="form-label">Nama Kolam</label>
            <input type="text" class="form-control" id="kolamName" required>
          </div>
          <div class="mb-2">
            <label class="form-label">Jenis Ikan</label>
            <input type="text" class="form-control" id="jenisIkan" required>
          </div>
          <div class="mb-2">
            <label class="form-label">Suhu Air (°C)</label>
            <input type="number" class="form-control" id="suhuAir" required>
          </div>
          <div class="mb-2">
            <label class="form-label">PH Air</label>
            <input type="text" class="form-control" id="phAir" required>
          </div>
          <div class="mb-2">
            <label class="form-label">Status Pakan</label>
            <select class="form-select" id="statusPakan">
              <option value="Diberikan">Diberikan</option>
              <option value="Belum Diberikan">Belum Diberikan</option>
            </select>
          </div>
          <div class="mb-2">
            <label class="form-label">Pemilik Kolam</label>
            <input type="text" class="form-control" id="pemilikKolam" required>
          </div>
          <div class="text-end mt-3">
            <button type="submit" class="btn btn-primary">Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection

@push('scripts')
<script src="{{ asset('js/data_kolam.js') }}"></script>
@endpush
