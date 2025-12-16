@extends('layouts.app')

@section('title', 'Manajemen User - Admin')

@section('header')
<strong>Manajemen User</strong>
@endsection

@push('styles')
<style>
    .avatar-initial {
        width: 35px; 
        height: 35px; 
        font-weight: 600;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
    }
</style>
@endpush

@section('content')
<div class="container-fluid px-0">

    {{-- Alert Notifikasi --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h5 class="mb-0 text-secondary fw-bold">Daftar Pengguna & Hak Akses</h5>
        {{-- Tombol Kembali tidak diperlukan karena sudah ada Sidebar, 
             tapi jika butuh tombol Tambah User bisa ditaruh di sini --}}
    </div>

    <div class="card border-0 shadow-sm rounded-3">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="bg-light">
                        <tr>
                            <th class="px-4 py-3 text-secondary text-uppercase small fw-bold">No</th>
                            <th class="px-4 py-3 text-secondary text-uppercase small fw-bold">Nama</th>
                            <th class="px-4 py-3 text-secondary text-uppercase small fw-bold">Email</th>
                            <th class="px-4 py-3 text-secondary text-uppercase small fw-bold">Role Saat Ini</th>
                            <th class="px-4 py-3 text-secondary text-uppercase small fw-bold text-end">Aksi (Ubah Role)</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $key => $user)
                        <tr>
                            <td class="px-4">{{ $key + 1 }}</td>
                            <td class="px-4">
                                <div class="d-flex align-items-center">
                                    {{-- Avatar Inisial --}}
                                    <div class="avatar-initial bg-primary bg-opacity-10 text-primary me-3">
                                        {{ substr($user->name, 0, 1) }}
                                    </div>
                                    <div class="fw-bold text-dark">{{ $user->name }}</div>
                                </div>
                            </td>
                            <td class="px-4 text-muted">{{ $user->email }}</td>
                            <td class="px-4">
                                @if($user->role == 'admin')
                                    <span class="badge rounded-pill bg-danger bg-opacity-75 px-3 py-2">
                                        <i class="bi bi-shield-lock-fill me-1"></i> Admin
                                    </span>
                                @else
                                    <span class="badge rounded-pill bg-success bg-opacity-75 px-3 py-2">
                                        <i class="bi bi-person-fill me-1"></i> User
                                    </span>
                                @endif
                            </td>
                            <td class="px-4 text-end">
                                {{-- Logika Tombol Aksi --}}
                                @if($user->role == 'user')
                                    <form action="{{ route('admin.makeAdmin', $user->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-outline-warning fw-bold" onclick="return confirm('Yakin ingin menjadikan user ini sebagai Admin?')">
                                            <i class="bi bi-arrow-up-circle"></i> Jadikan Admin
                                        </button>
                                    </form>
                                @elseif($user->role == 'admin' && $user->id != auth()->id()) 
                                    {{-- Cek agar tidak mendemote diri sendiri --}}
                                    <form action="{{ route('admin.makeUser', $user->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-outline-secondary" onclick="return confirm('Yakin ingin menurunkan user ini menjadi User Biasa?')">
                                            <i class="bi bi-arrow-down-circle"></i> Jadikan User
                                        </button>
                                    </form>
                                @else
                                    <span class="text-muted small fst-italic">Akun Anda</span>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection