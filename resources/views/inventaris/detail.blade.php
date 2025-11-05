@extends('layouts.app')

@section('title', 'Detail Inventaris - Tambak Ikan Mina Jaya')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/inventaris.css') }}">
@endpush

@section('header')
Detail Barang Inventaris
@endsection

@section('content')
<div class="card shadow-sm border-0 mb-4">
  <div class="card-body">
    <button onclick="window.history.back()" class="btn btn-outline-secondary btn-sm mb-3">
      <i class="bi bi-arrow-left"></i> Kembali
    </button>

    <div class="d-flex justify-content-between align-items-start mb-4">
      <div>
        <h4 class="fw-bold mb-1">Pompa Air</h4>
        <small class="text-muted">Nomor Barang: T9290</small>
      </div>
      <span class="badge bg-success fs-6">Baik</span>
    </div>

    <div class="row mb-4">
      <div class="col-md-6">
        <table class="table table-borderless">
          <tr>
            <th class="text-muted" width="150">Nama Barang</th>
            <td>Pompa Air</td>
          </tr>
          <tr>
            <th class="text-muted">Kondisi</th>
            <td>Baik</td>
          </tr>
          <tr>
            <th class="text-muted">Pemilik</th>
            <td>Gudang</td>
          </tr>
          <tr>
            <th class="text-muted">Jumlah</th>
            <td>2 Unit</td>
          </tr>
          <tr>
            <th class="text-muted">Keterangan</th>
            <td>-</td>
          </tr>
        </table>
      </div>

      <div class="col-md-6 text-center">
        <img src="{{ asset('images/12.png') }}" class="img-fluid rounded shadow-sm proof-img" alt="Foto Barang" style="max-width: 300px;">
        <small class="d-block text-muted mt-2">Foto Barang Inventaris</small>
      </div>
    </div>

    <div class="d-flex justify-content-end">
      <button class="btn btn-outline-primary me-2">
        <i class="bi bi-download"></i> Unduh Data
      </button>
      <!-- Tombol buka modal -->
      <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalEditInventaris">
        <i class="bi bi-pencil-square"></i> Edit Barang
      </button>
    </div>
  </div>
</div>

{{-- Modal Edit Inventaris --}}
<div class="modal fade" id="modalEditInventaris" tabindex="-1" aria-labelledby="modalEditInventarisLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content border-0 shadow">
      <div class="modal-header bg-light border-0">
        <h5 class="modal-title fw-semibold text-primary" id="modalEditInventarisLabel">Edit Barang Inventaris</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body px-4 pb-4">
        <form>
          <div class="row g-4">
            <!-- Kiri -->
            <div class="col-md-6">
              <div class="mb-3">
                <label class="form-label">Nomor Barang</label>
                <input type="text" class="form-control rounded-3 shadow-sm" value="T9290">
              </div>

              <div class="mb-3">
                <label class="form-label">Nama Barang</label>
                <input type="text" class="form-control rounded-3 shadow-sm" value="Pompa Air">
              </div>

              <div class="mb-3">
                <label class="form-label">Kondisi Barang</label>
                <select class="form-select rounded-3 shadow-sm">
                  <option>Baru</option>
                  <option selected>Baik</option>
                  <option>Rusak Ringan</option>
                  <option>Rusak Berat</option>
                </select>
              </div>

              <div class="mb-3">
                <label class="form-label">Jumlah</label>
                <input type="number" class="form-control rounded-3 shadow-sm" value="2">
              </div>
            </div>

            <!-- Kanan -->
            <div class="col-md-6">
              <div class="mb-3">
                <label class="form-label">Pemilik / Lokasi</label>
                <input type="text" class="form-control rounded-3 shadow-sm" value="Gudang">
              </div>

              <div class="mb-3">
                <label class="form-label">Keterangan</label>
                <textarea class="form-control rounded-3 shadow-sm" rows="4">-</textarea>
              </div>

              <div class="mb-3">
                <label class="form-label">Upload Foto Barang</label><br>
                <button type="button" class="btn btn-outline-secondary btn-sm rounded-3 px-3">
                  <i class="bi bi-upload me-1"></i> Ganti Foto
                </button>
              </div>
            </div>
          </div>

          <div class="text-center mt-4">
            <button type="submit" class="btn btn-success rounded-4 px-5 py-2">
              <i class="bi bi-check-circle me-1"></i> Simpan Perubahan
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
