@extends('layouts.app')

@section('title', 'Keuangan - Tambak Ikan Mina Jaya')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/keuangan.css') }}">
@endpush

@section('header')
<strong>Keuangan Tambak Ikan Mina Jaya</strong>
@endsection

@section('content')
<div class="container-fluid px-4">

  {{-- Statistik Keuangan --}}
  <div class="row mb-4">

    {{-- Dana Tambak --}}
    <div class="col-md-6 mb-3">
      <div class="card shadow-sm border-0 stat-card">
        <div class="card-body">
          <div class="d-flex justify-content-between align-items-center">
            <div>
              <h6 class="fw-semibold mb-1">Dana Tambak</h6>
              <h3 class="fw-bold text-dark mb-1">
                Rp {{ number_format($saldo, 0, ',', '.') }}
              </h3>
              <small class="text-muted">
                Transaksi terakhir pada
                {{ $lastTransaksi->tanggal
                    ? \Carbon\Carbon::parse($lastTransaksi->tanggal)->format('d/m/Y')
                    : '-' }}
              </small>
            </div>
            <div class="text-end">
              <i class="bi bi-graph-up-arrow fs-2 text-success"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    {{-- Transaksi Terakhir --}}
    <div class="col-md-6 mb-3">
      <div class="card shadow-sm border-0 stat-card">
        <div class="card-body">
          <div class="d-flex justify-content-between align-items-center">
            <div>
              <h6 class="fw-semibold mb-1">Transaksi Terakhir</h6>

              @if($lastTransaksi->nominal > 0)
                <h3 class="fw-bold mb-1
                  {{ $lastTransaksi->tipe === 'Pengeluaran'
                      ? 'text-danger'
                      : 'text-success' }}">
                  {{ $lastTransaksi->tipe === 'Pengeluaran' ? '-' : '+' }}
                  Rp {{ number_format($lastTransaksi->nominal, 0, ',', '.') }}
                </h3>
              @else
                <h3 class="fw-bold mb-1 text-muted">
                  Rp 0
                </h3>
              @endif

              <small class="text-muted">
                {{ $lastTransaksi->nama_transaksi ?? '-' }}
              </small>
            </div>

            <div class="text-end">
              <i class="bi
                {{ $lastTransaksi->tipe === 'Pengeluaran'
                    ? 'bi-graph-down-arrow text-danger'
                    : 'bi-graph-up-arrow text-success' }}
                fs-2">
              </i>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

  {{-- Tabel Transaksi --}}
  <div class="card border-0 shadow-sm">
    <div class="card-body">
      <div class="d-flex justify-content-between align-items-center mb-3">
        <h5 class="fw-bold text-primary mb-0">Transaksi Keuangan Tambak</h5>
      </div>

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
            @forelse ($transaksis as $trx)
            <tr>
              <td>{{ $trx->nomor_transaksi }}</td>
              <td>{{ $trx->nama_transaksi }}</td>
              <td>{{ \Carbon\Carbon::parse($trx->tanggal)->format('d/m/Y') }}</td>
              <td>
                <span class="fw-semibold text-{{ $trx->tipe === 'Pengeluaran' ? 'danger' : 'success' }}">
                  {{ $trx->tipe }}
                </span>
              </td>
              <td>
                <span class="badge bg-success">{{ $trx->status }}</span>
              </td>
              <td>{{ $trx->keterangan ?? '-' }}</td>
              <td>
                <a href="{{ route('keuangan.detail', $trx->id) }}">
                  <i class="bi bi-eye text-secondary me-2"></i>
                </a>
              </td>
            </tr>
            @empty
            <tr>
              <td colspan="7" class="text-center text-muted py-4">
                Belum ada data transaksi
              </td>
            </tr>
            @endforelse
          </tbody>
        </table>
      </div>

    </div>
  </div>

  {{-- Modal Tambah Transaksi --}}
  <div class="modal fade" id="modalTransaksi" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content border-0 shadow">
        <div class="modal-header bg-light border-0">
          <h5 class="modal-title fw-semibold text-primary">Tambah Transaksi</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>

        <form method="POST" action="{{ route('keuangan.store') }}">
        @csrf
        <div class="modal-body px-4 pb-4">
          <div class="row g-4">

            <div class="col-md-6">
              <div class="mb-3">
                <label class="form-label">Nomor Transaksi</label>
                <input type="text" name="nomor_transaksi" class="form-control" required>
              </div>

              <div class="mb-3">
                <label class="form-label">Nama Transaksi</label>
                <input type="text" name="nama_transaksi" class="form-control" required>
              </div>

              <div class="mb-3">
                <label class="form-label">Nominal</label>
                <input type="number" name="nominal" class="form-control" required>
              </div>

              <div class="mb-3">
                <label class="form-label">Tanggal</label>
                <input type="date" name="tanggal" class="form-control" required>
              </div>

              <div class="mb-3">
                <label class="form-label">Jenis Transaksi</label>
                <select name="tipe" class="form-select" required>
                  <option value="Pemasukan">Pemasukan</option>
                  <option value="Pengeluaran">Pengeluaran</option>
                </select>
              </div>
            </div>

            <div class="col-md-6">
              <div class="mb-3">
                <label class="form-label">Keterangan</label>
                <textarea name="keterangan" class="form-control" rows="5"></textarea>
              </div>
            </div>

          </div>

          <div class="text-center mt-4">
            <button type="submit" class="btn btn-primary px-5">
              Simpan
            </button>
          </div>
        </div>
        </form>

      </div>
    </div>
  </div>

  {{-- Floating Button --}}
  <div class="floating-btn">
    <button class="btn btn-success rounded-circle"
      data-bs-toggle="modal"
      data-bs-target="#modalTransaksi">
      <i class="bi bi-plus-lg"></i>
    </button>
  </div>

</div>
@endsection

@push('scripts')
<script src="{{ asset('js/keuangan.js') }}"></script>
@endpush
