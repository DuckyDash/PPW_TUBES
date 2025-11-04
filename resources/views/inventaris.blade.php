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
            <td>1</td>
            <td>Gagang Patah</td>
            <td class="text-center">
              <i class="bi bi-eye me-2 text-primary" style="cursor:pointer;"
                onclick="window.location.href='{{ url('inventaris/detail') }}'"></i>
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

{{-- Floating Button untuk tambah data --}}
<div class="floating-btn">
  <button class="btn btn-success shadow-lg" data-bs-toggle="modal" data-bs-target="#modalInventaris">
    <i class="bi bi-plus-lg"></i>
  </button>
</div>

{{-- Modal Tambah Inventaris --}}
<div class="modal fade" id="modalInventaris" tabindex="-1" aria-labelledby="modalInventarisLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content border-0 shadow">
      <div class="modal-header bg-light border-0">
        <h5 class="modal-title fw-semibold text-primary" id="modalInventarisLabel">Tambah Barang Inventaris</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body px-4 pb-4">
        <form>
          <div class="row g-4">
            <!-- Kiri -->
            <div class="col-md-6">
              <div class="mb-3">
                <label class="form-label">Nomor Barang</label>
                <input type="text" class="form-control rounded-3 shadow-sm" placeholder="Contoh: T9288">
              </div>

              <div class="mb-3">
                <label class="form-label">Nama Barang</label>
                <input type="text" class="form-control rounded-3 shadow-sm" placeholder="Masukkan nama barang">
              </div>

              <div class="mb-3">
                <label class="form-label">Kondisi Barang</label>
                <select class="form-select rounded-3 shadow-sm">
                  <option selected disabled>Pilih kondisi...</option>
                  <option>Baru</option>
                  <option>Baik</option>
                  <option>Rusak Ringan</option>
                  <option>Rusak Berat</option>
                </select>
              </div>

              <div class="mb-3">
                <label class="form-label">Jumlah</label>
                <input type="number" class="form-control rounded-3 shadow-sm" placeholder="Masukkan jumlah barang">
              </div>
            </div>

            <!-- Kanan -->
            <div class="col-md-6">
              <div class="mb-3">
                <label class="form-label">Pemilik / Lokasi</label>
                <input type="text" class="form-control rounded-3 shadow-sm" placeholder="Misal: Gudang / Sobari">
              </div>

              <div class="mb-3">
                <label class="form-label">Keterangan</label>
                <textarea class="form-control rounded-3 shadow-sm" rows="4" placeholder="Opsional..."></textarea>
              </div>

              <div class="mb-3">
                <label class="form-label">Upload Foto Barang</label><br>
                <button type="button" class="btn btn-outline-secondary btn-sm rounded-3 px-3">
                  <i class="bi bi-upload me-1"></i> Upload a Photo
                </button>
              </div>
            </div>
          </div>

          <div class="text-center mt-4">
            <button type="submit" class="btn btn-success rounded-4 px-5 py-2">
              <i class="bi bi-check-circle me-1"></i> Selesai
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
