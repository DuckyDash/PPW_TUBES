@extends('layouts.app')

@section('title', 'Detail Transaksi - Tambak Ikan Mina Jaya')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/keuanganDetail.css') }}">
@endpush

@section('header')
Detail Transaksi <strong>Keuangan Tambak Ikan Mina Jaya</strong>
@endsection

@section('content')
<div class="container py-5">
  <div class="card shadow border-0 mx-auto detail-card">
    <div class="card-body">
      <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="fw-bold text-primary mb-0">Detail Transaksi</h4>
        <button onclick="window.history.back()" class="btn btn-secondary">
        <i class="bi bi-arrow-left"></i> Kembali
        </button>
        </a>
      </div>

      <div class="row mb-4">
        <div class="col-md-6">
          <p class="mb-1 text-muted">Nomor Transaksi</p>
          <h5 class="fw-semibold">#9288</h5>
        </div>
        <div class="col-md-6 text-md-end">
          <p class="mb-1 text-muted">Tanggal</p>
          <h5 class="fw-semibold">11/09/2025</h5>
        </div>
      </div>

      <hr>

      <div class="row g-4">
        <div class="col-md-6">
          <p class="text-muted mb-1">Nama Transaksi</p>
          <h5 class="fw-semibold">Pembelian Pakan Ikan</h5>

          <p class="text-muted mb-1 mt-4">Tipe Transaksi</p>
          <h5 class="fw-semibold text-danger">Pengeluaran</h5>

          <p class="text-muted mb-1 mt-4">Status Transaksi</p>
          <span class="badge bg-success fs-6">Selesai</span>
        </div>

        <div class="col-md-6">
          <p class="text-muted mb-1">Nominal Transaksi</p>
          <h4 class="fw-bold text-danger mb-3">– Rp. 920.000</h4>

          <p class="text-muted mb-1">Keterangan</p>
          <p class="fw-normal">Pembelian pakan ikan jenis pellet untuk kolam 1 dan kolam 2.</p>
        </div>
      </div>

      <hr>

      <div class="mt-4">
        <p class="text-muted mb-1">Bukti Transaksi</p>
        <img 
        src="{{ asset('images/12.png') }}" 
        class="img-fluid rounded shadow-sm proof-img" 
        alt="Bukti Transaksi">
      </div>
    </div>
  </div>
</div>
@endsection
