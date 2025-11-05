@extends('layouts.app')

@section('title', 'Profile - Tambak Ikan Mina Jaya')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
@endpush

@section('header')
<strong>Profil Pengguna</strong>
@endsection

@section('content')
<div class="container py-4">
    <h3 class="text-center fw-bold text-primary mb-4">PROFIL ANGGOTA</h3>

    {{-- Header Profile --}}
    <div class="profile-header mb-4">
        <img src="{{ asset('images/user-placeholder.png') }}" alt="Profile Photo">
        <div class="profile-details">
            <h3>Wawan Kurniawan</h3>
            <p>ID Anggota: 12345</p>
            <p>Role: Admin</p>
        </div>
    </div>

    {{-- Informasi Tambahan --}}
    <div class="row g-3">
        <div class="col-md-6">
            <div class="info-card">
                <p><strong>Email:</strong> wawan@gmail.com</p>
                <p><strong>Jabatan:</strong> Sekretaris Tambak</p>
                <p><strong>Telepon:</strong> +62 812 3456 7890</p>
                <p><strong>Alamat:</strong> Purwokerto</p>
            </div>
        </div>
        <div class="col-md-6">
            <div class="info-card">
                <p><strong>Jenis Kelamin:</strong> Laki-laki</p>
                <p><strong>Tanggal Lahir:</strong> 14 Juni 1995</p>
                <p><strong>Status:</strong> Aktif</p>
                <p><strong>Anggota Sejak:</strong> 1 Januari 2020</p>
            </div>
        </div>
    </div>
</div>
@endsection
