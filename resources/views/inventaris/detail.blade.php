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
        <h4 class="fw-bold mb-1">{{ $inventaris->nama_barang }}</h4>
        <small class="text-muted">
          Nomor Barang: {{ $inventaris->nomor_barang }}
        </small>
      </div>

      <span class="badge 
        {{ $inventaris->kondisi == 'Baik' ? 'bg-success' : 
           ($inventaris->kondisi == 'Baru' ? 'bg-primary' : 'bg-warning') }} fs-6">
        {{ $inventaris->kondisi }}
      </span>
    </div>

    <div class="row mb-4">
      <div class="col-md-6">
        <table class="table table-borderless">
          <tr>
            <th class="text-muted" width="150">Nama Barang</th>
            <td>{{ $inventaris->nama_barang }}</td>
          </tr>
          <tr>
            <th class="text-muted">Kondisi</th>
            <td>{{ $inventaris->kondisi }}</td>
          </tr>
          <tr>
            <th class="text-muted">Pemilik</th>
            <td>{{ $inventaris->pemilik }}</td>
          </tr>
          <tr>
            <th class="text-muted">Jumlah</th>
            <td>{{ $inventaris->jumlah }} Unit</td>
          </tr>
          <tr>
            <th class="text-muted">Keterangan</th>
            <td>{{ $inventaris->keterangan ?? '-' }}</td>
          </tr>
        </table>
      </div>
    </div>

    <div class="d-flex justify-content-end">
      <button class="btn btn-outline-primary me-2">
        <i class="bi bi-download"></i> Unduh Data
      </button>

      <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalEditInventaris">
        <i class="bi bi-pencil-square"></i> Edit Barang
      </button>
    </div>

  </div>
</div>

{{-- MODAL EDIT --}}
<div class="modal fade" id="modalEditInventaris" tabindex="-1">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content border-0 shadow">
      <div class="modal-header bg-light border-0">
        <h5 class="modal-title fw-semibold text-primary">Edit Barang Inventaris</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <form method="POST"
            action="{{ route('inventaris.update', $inventaris->id) }}"
            enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="modal-body px-4 pb-4">
          <div class="row g-4">

            <div class="col-md-6">
              <div class="mb-3">
                <label class="form-label">Nomor Barang</label>
                <input type="text" name="nomor_barang"
                       class="form-control" value="{{ $inventaris->nomor_barang }}">
              </div>

              <div class="mb-3">
                <label class="form-label">Nama Barang</label>
                <input type="text" name="nama_barang"
                       class="form-control" value="{{ $inventaris->nama_barang }}">
              </div>

              <div class="mb-3">
                <label class="form-label">Kondisi Barang</label>
                <select name="kondisi" class="form-select">
                  @foreach(['Baru','Baik','Rusak Ringan','Rusak Berat'] as $kondisi)
                    <option value="{{ $kondisi }}"
                      {{ $inventaris->kondisi == $kondisi ? 'selected' : '' }}>
                      {{ $kondisi }}
                    </option>
                  @endforeach
                </select>
              </div>

              <div class="mb-3">
                <label class="form-label">Jumlah</label>
                <input type="number" name="jumlah"
                       class="form-control" value="{{ $inventaris->jumlah }}">
              </div>
            </div>

            <div class="col-md-6">
              <div class="mb-3">
                <label class="form-label">Pemilik / Lokasi</label>
                <input type="text" name="pemilik"
                       class="form-control" value="{{ $inventaris->pemilik }}">
              </div>

              <div class="mb-3">
                <label class="form-label">Keterangan</label>
                <textarea name="keterangan" class="form-control"
                          rows="4">{{ $inventaris->keterangan }}</textarea>
              </div>
            </div>

          </div>

          <div class="text-center mt-4">
            <button type="submit" class="btn btn-success px-5">
              <i class="bi bi-check-circle me-1"></i> Simpan Perubahan
            </button>
          </div>
        </div>
      </form>

    </div>
  </div>
</div>
@endsection
