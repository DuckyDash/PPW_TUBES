@extends('layouts.app')

@section('title', 'Inventaris - Tambak Ikan Mina Jaya')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/inventaris.css') }}">
@endpush

@section('header')
<strong>Inventaris Tambak Ikan Mina Jaya</strong>
@endsection

@section('content')
<div class="container-fluid px-4">

  {{-- Ringkasan Inventaris --}}
  <div class="card shadow-sm mb-4 border-0">
    <div class="card-body d-flex justify-content-between align-items-center">
      <div>
        <h5 class="fw-bold mb-1">Inventaris Kepemilikan POKDAKAN</h5>
        <small class="text-muted">Data inventaris aktif</small>
      </div>
      <div class="text-end">
        <h1 class="fw-bold display-6">
          {{ $inventaris->sum('jumlah') }}
          <span class="fs-5 text-secondary">Unit</span>
        </h1>
      </div>
    </div>
  </div>

  {{-- Tabel Inventaris --}}
  <div class="card shadow-sm border-0">
    <div class="card-body">
      <h5 class="fw-bold text-primary mb-3">Daftar Inventaris</h5>

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
            @forelse ($inventaris as $item)
            <tr>
              <td>{{ $item->nomor_barang }}</td>
              <td>{{ $item->nama_barang }}</td>
              <td>{{ $item->kondisi }}</td>
              <td>{{ $item->pemilik }}</td>
              <td>{{ $item->jumlah }}</td>
              <td>{{ $item->keterangan ?? '-' }}</td>
              <td class="text-center">
                <a href="{{ route('inventaris.detail', $item->id) }}">
                  <i class="bi bi-eye text-primary me-2"></i>
                </a>
              </td>
            </tr>
            @empty
            <tr>
              <td colspan="7" class="text-center text-muted py-4">
                Data inventaris belum tersedia
              </td>
            </tr>
            @endforelse
          </tbody>
        </table>
      </div>

    </div>
  </div>

  {{-- Floating Button --}}
  <div class="floating-btn">
    <button class="btn btn-success shadow-lg"
      data-bs-toggle="modal"
      data-bs-target="#modalInventaris">
      <i class="bi bi-plus-lg"></i>
    </button>
  </div>

</div>

{{-- Modal Tambah Inventaris --}}
<div class="modal fade" id="modalInventaris" tabindex="-1">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content border-0 shadow">
      <div class="modal-header bg-light border-0">
        <h5 class="modal-title fw-semibold text-primary">
          Tambah Barang Inventaris
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <form method="POST"
            action="{{ route('inventaris.store') }}"
            enctype="multipart/form-data">
        @csrf

        <div class="modal-body px-4 pb-4">
          <div class="row g-4">

            {{-- Kiri --}}
            <div class="col-md-6">
              <div class="mb-3">
                <label class="form-label">Nomor Barang</label>
                <input type="text" name="nomor_barang" class="form-control" required>
              </div>

              <div class="mb-3">
                <label class="form-label">Nama Barang</label>
                <input type="text" name="nama_barang" class="form-control" required>
              </div>

              <div class="mb-3">
                <label class="form-label">Kondisi Barang</label>
                <select name="kondisi" class="form-select" required>
                  <option value="Baru">Baru</option>
                  <option value="Baik">Baik</option>
                  <option value="Rusak Ringan">Rusak Ringan</option>
                  <option value="Rusak Berat">Rusak Berat</option>
                </select>
              </div>

              <div class="mb-3">
                <label class="form-label">Jumlah</label>
                <input type="number" name="jumlah" class="form-control" required>
              </div>
            </div>

            {{-- Kanan --}}
            <div class="col-md-6">
              <div class="mb-3">
                <label class="form-label">Pemilik / Lokasi</label>
                <input type="text" name="pemilik" class="form-control" required>
              </div>

              <div class="mb-3">
                <label class="form-label">Keterangan</label>
                <textarea name="keterangan" class="form-control" rows="4"></textarea>
              </div>
            </div>

          </div>

          <div class="text-center mt-4">
            <button type="submit" class="btn btn-success px-5">
              <i class="bi bi-check-circle me-1"></i> Simpan
            </button>
          </div>
        </div>
      </form>

    </div>
  </div>
</div>
@endsection
