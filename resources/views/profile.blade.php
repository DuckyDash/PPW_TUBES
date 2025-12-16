@extends('layouts.app')

@section('title', 'Profile - Tambak Ikan Mina Jaya')

@push('styles')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<style>
    .profile-card {
        background: white;
        border-radius: 15px;
        border: none;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
        transition: transform 0.2s;
    }
    
    .profile-img-container {
        margin-top: -50px;
        margin-bottom: 15px;
    }

    .profile-img {
        width: 120px;
        height: 120px;
        object-fit: cover;
        border: 5px solid white;
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    }

    .bg-profile-header {
        background: linear-gradient(135deg, #155e95 0%, #0f4c7a 100%);
        height: 130px;
        border-radius: 15px 15px 0 0;
    }

    .info-label {
        color: #6c757d;
        font-size: 0.9rem;
        margin-bottom: 2px;
    }

    .info-value {
        font-weight: 600;
        color: #212529;
        font-size: 1rem;
    }

    .card-hover:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 15px rgba(0,0,0,0.1);
    }
</style>
@endpush

@section('header')
<div class="d-flex align-items-center">
    <i class="bi bi-person-circle me-2"></i> Profil Pengguna
</div>
@endsection

@section('content')
<div class="container py-4">
    
    <div class="row justify-content-center">
        <div class="col-lg-8">
            
            <div class="card profile-card mb-4">
                <div class="bg-profile-header"></div>
                
                <div class="card-body text-center pt-0 px-4 pb-4">
                    <div class="profile-img-container">
                        <img src="{{ asset('images/user-placeholder.png') }}" alt="Profile" class="rounded-circle profile-img bg-white">
                    </div>

                    <h3 class="fw-bold mb-1">{{ Auth::user()->name }}</h3>
                    <div class="mb-3">
                        @if(Auth::user()->role == 'admin')
                            <span class="badge bg-danger rounded-pill px-3"><i class="bi bi-shield-lock-fill me-1"></i> Administrator</span>
                        @else
                            <span class="badge bg-success rounded-pill px-3"><i class="bi bi-person-fill me-1"></i> Anggota</span>
                        @endif
                    </div>
                    
                    <p class="text-muted">
                        Bergabung sejak {{ Auth::user()->created_at->format('d F Y') }}
                    </p>

                    <hr class="my-4 opacity-25">

                    <div class="row g-4 text-start">
                        <div class="col-md-6">
                            <div class="d-flex align-items-start mb-3">
                                <div class="me-3 text-primary fs-4"><i class="bi bi-envelope-at"></i></div>
                                <div>
                                    <div class="info-label">Email Address</div>
                                    <div class="info-value">{{ Auth::user()->email }}</div>
                                </div>
                            </div>

                            <div class="d-flex align-items-start mb-3">
                                <div class="me-3 text-primary fs-4"><i class="bi bi-telephone"></i></div>
                                <div>
                                    <div class="info-label">Nomor Telepon</div>
                                    <div class="info-value">{{ Auth::user()->phone ?? '-' }}</div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="d-flex align-items-start mb-3">
                                <div class="me-3 text-primary fs-4"><i class="bi bi-geo-alt"></i></div>
                                <div>
                                    <div class="info-label">Alamat / Lokasi</div>
                                    <div class="info-value">{{ Auth::user()->address ?? 'Lokasi belum diatur' }}</div>
                                </div>
                            </div>

                            <div class="d-flex align-items-start mb-3">
                                <div class="me-3 text-primary fs-4"><i class="bi bi-fingerprint"></i></div>
                                <div>
                                    <div class="info-label">User ID</div>
                                    <div class="info-value">#{{ str_pad(Auth::user()->id, 5, '0', STR_PAD_LEFT) }}</div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="row g-3">
                <div class="col-md-6">
                    <button class="btn btn-outline-primary w-100 py-2 rounded-3 fw-bold profile-card card-hover">
                        <i class="bi bi-pencil-square me-2"></i> Edit Profil
                    </button>
                </div>
                <div class="col-md-6">
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-danger w-100 py-2 rounded-3 fw-bold profile-card card-hover text-danger bg-white border-0" onclick="return confirm('Apakah Anda yakin ingin keluar?')">
                            <i class="bi bi-box-arrow-right me-2"></i> Logout / Keluar
                        </button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection