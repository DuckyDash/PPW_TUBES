{{-- 
   PENTING: Pastikan 'layouts.main' sesuai dengan nama file layout utama Anda.
   Misal: jika file layout Anda bernama 'app.blade.php', ubah jadi 'layouts.app' 
--}}
@extends('layouts.main')

@section('title', 'Daftar Pengguna - Mina Jaya')
@section('header', 'Manajemen Pengguna')

@section('content')
<div class="container-fluid px-0">
    
    {{-- Baris Atas: Pencarian & Tombol Tambah --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h5 class="mb-0 text-secondary">Data Semua Pengguna</h5>
        <a href="{{ route('users.create') }}" class="btn btn-primary d-flex align-items-center gap-2">
            <i class="bi bi-person-plus-fill"></i> Tambah User
        </a>
    </div>

    {{-- Card Container --}}
    <div class="card border-0 shadow-sm rounded-3">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="bg-light">
                        <tr>
                            <th class="px-4 py-3 text-secondary text-uppercase small fw-bold">No</th>
                            <th class="px-4 py-3 text-secondary text-uppercase small fw-bold">Nama</th>
                            <th class="px-4 py-3 text-secondary text-uppercase small fw-bold">Email</th>
                            <th class="px-4 py-3 text-secondary text-uppercase small fw-bold">Role</th>
                            <th class="px-4 py-3 text-secondary text-uppercase small fw-bold">Tanggal Gabung</th>
                            <th class="px-4 py-3 text-secondary text-uppercase small fw-bold text-end">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($users as $key => $user)
                        <tr>
                            <td class="px-4">{{ $users->firstItem() + $key }}</td>
                            <td class="px-4">
                                <div class="d-flex align-items-center">
                                    {{-- Avatar Placeholder dengan inisial --}}
                                    <div class="bg-primary bg-opacity-10 text-primary rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 35px; height: 35px; font-weight: 600;">
                                        {{ substr($user->name, 0, 1) }}
                                    </div>
                                    <div>
                                        <div class="fw-bold text-dark">{{ $user->name }}</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-4 text-muted">{{ $user->email }}</td>
                            <td class="px-4">
                                {{-- Logika warna badge berdasarkan Role --}}
                                <span class="badge rounded-pill {{ $user->role === 'admin' ? 'bg-danger' : 'bg-success' }} bg-opacity-75 px-3 py-2">
                                    {{ ucfirst($user->role) }}
                                </span>
                            </td>
                            <td class="px-4 text-muted small">
                                <i class="bi bi-calendar3 me-1"></i> {{ $user->created_at->format('d M Y') }}
                            </td>
                            <td class="px-4 text-end">
                                <div class="btn-group">
                                    <a href="#" class="btn btn-sm btn-outline-secondary" title="Edit">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>
                                    <form action="#" method="POST" class="d-inline" onsubmit="return confirm('Yakin hapus user ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="btn btn-sm btn-outline-danger ms-1" title="Hapus">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center py-5 text-muted">
                                <i class="bi bi-people fs-1 d-block mb-2"></i>
                                Belum ada data pengguna.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        
        {{-- Pagination (jika pakai paginate di controller) --}}
        @if($users->hasPages())
        <div class="card-footer bg-white py-3 border-0">
            {{ $users->links() }} 
            {{-- Pastikan pakai pagination bootstrap di AppServiceProvider --}}
        </div>
        @endif
    </div>
</div>
@endsection