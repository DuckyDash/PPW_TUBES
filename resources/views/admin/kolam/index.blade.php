@extends('layouts.app')

@section('title', 'Data Seluruh Kolam - Admin')

@section('header')
<strong>Monitoring Seluruh Kolam User</strong>
@endsection

@section('content')
<div class="container-fluid px-0">

    {{-- Alert Notifikasi --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h5 class="mb-0 text-secondary fw-bold">Data Kolam & Pemilik</h5>
            <small class="text-muted">Memantau {{ $kolams->count() }} kolam terdaftar</small>
        </div>
        {{-- Tombol Print/Export bisa ditaruh sini jika nanti butuh --}}
    </div>

    <div class="card border-0 shadow-sm rounded-3">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="bg-light">
                        <tr>
                            <th class="px-4 py-3 text-secondary text-uppercase small fw-bold">No</th>
                            <th class="px-4 py-3 text-secondary text-uppercase small fw-bold">Pemilik</th>
                            <th class="px-4 py-3 text-secondary text-uppercase small fw-bold">Info Kolam</th>
                            <th class="px-4 py-3 text-secondary text-uppercase small fw-bold">Kondisi Air</th>
                            <th class="px-4 py-3 text-secondary text-uppercase small fw-bold">Status</th>
                            <th class="px-4 py-3 text-secondary text-uppercase small fw-bold text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($kolams as $key => $kolam)
                        <tr>
                            <td class="px-4">{{ $loop->iteration }}</td>
                            
                            {{-- Kolom Pemilik --}}
                            <td class="px-4">
                                <div class="d-flex align-items-center">
                                    <div class="bg-primary bg-opacity-10 text-primary rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 35px; height: 35px; font-weight: bold;">
                                        {{ substr($kolam->pemilik, 0, 1) }}
                                    </div>
                                    <div>
                                        <div class="fw-bold text-dark">{{ $kolam->pemilik }}</div>
                                        <small class="text-muted" style="font-size: 0.75rem;">User</small>
                                    </div>
                                </div>
                            </td>

                            {{-- Kolom Info Kolam --}}
                            <td class="px-4">
                                <div class="fw-semibold text-dark">{{ $kolam->nama_kolam }}</div>
                                <div class="text-muted small"><i class="bi bi-fish me-1"></i> {{ $kolam->jenis_ikan }}</div>
                            </td>

                            {{-- Kolom Kondisi Air (Suhu & pH) --}}
                            <td class="px-4">
                                <span class="badge bg-info bg-opacity-10 text-info border border-info border-opacity-25 me-1">
                                    <i class="bi bi-thermometer-half"></i> {{ $kolam->suhu_air }}°C
                                </span>
                                <span class="badge bg-warning bg-opacity-10 text-warning border border-warning border-opacity-25">
                                    <i class="bi bi-droplet-half"></i> pH {{ $kolam->ph_air }}
                                </span>
                                <div class="mt-1 small text-muted">
                                    Pakan: 
                                    <span class="{{ $kolam->status_pakan == 'Diberikan' ? 'text-success fw-bold' : 'text-danger fw-bold' }}">
                                        {{ $kolam->status_pakan }}
                                    </span>
                                </div>
                            </td>

                            {{-- Kolom Status --}}
                            <td class="px-4">
                                @php
                                    $badgeClass = 'bg-secondary';
                                    if($kolam->status == 'Aktif') $badgeClass = 'bg-success';
                                    if($kolam->status == 'Dalam Perawatan') $badgeClass = 'bg-warning text-dark';
                                    if($kolam->status == 'Tidak Aktif') $badgeClass = 'bg-danger';
                                @endphp
                                <span class="badge rounded-pill {{ $badgeClass }} bg-opacity-75 px-3 py-2">
                                    {{ $kolam->status }}
                                </span>
                            </td>

                            {{-- Kolom Aksi --}}
                            <td class="px-4 text-center">
                                <button type="button" class="btn btn-sm btn-outline-primary" 
                                        data-bs-toggle="modal" 
                                        data-bs-target="#modalDetail{{ $kolam->id }}">
                                    <i class="bi bi-eye"></i> Detail
                                </button>
                                
                                {{-- Tombol Hapus (Opsional untuk Admin) --}}
                                <form action="{{ route('admin.kolam.destroy', $kolam->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus kolam milik {{ $kolam->pemilik }} secara permanen?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger ms-1">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>

                        {{-- Modal Detail Per Item (Looping Modal) --}}
                        {{-- Cara simpel menampilkan detail tanpa AJAX --}}
                        <div class="modal fade" id="modalDetail{{ $kolam->id }}" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content border-0 shadow">
                                    <div class="modal-header bg-light border-0">
                                        <h5 class="modal-title fw-bold text-primary">Detail Kolam</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>
                                    <div class="modal-body p-4">
                                        <div class="text-center mb-4">
                                            <div class="avatar-initial bg-primary text-white rounded-circle mx-auto mb-2 d-flex align-items-center justify-content-center" style="width: 50px; height: 50px; font-size: 1.5rem;">
                                                {{ substr($kolam->pemilik, 0, 1) }}
                                            </div>
                                            <h5 class="fw-bold">{{ $kolam->nama_kolam }}</h5>
                                            <p class="text-muted mb-0">Pemilik: {{ $kolam->pemilik }}</p>
                                        </div>
                                        
                                        <div class="row g-3">
                                            <div class="col-6">
                                                <div class="p-3 bg-light rounded-3">
                                                    <small class="text-muted d-block">Jenis Ikan</small>
                                                    <span class="fw-bold text-dark">{{ $kolam->jenis_ikan }}</span>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="p-3 bg-light rounded-3">
                                                    <small class="text-muted d-block">Status</small>
                                                    <span class="fw-bold">{{ $kolam->status }}</span>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="p-2 border rounded text-center">
                                                    <small class="d-block text-muted" style="font-size: 0.7rem;">Suhu</small>
                                                    <strong>{{ $kolam->suhu_air }}°C</strong>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="p-2 border rounded text-center">
                                                    <small class="d-block text-muted" style="font-size: 0.7rem;">pH</small>
                                                    <strong>{{ $kolam->ph_air }}</strong>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="p-2 border rounded text-center">
                                                    <small class="d-block text-muted" style="font-size: 0.7rem;">Pakan</small>
                                                    <strong>{{ $kolam->status_pakan == 'Diberikan' ? 'Sudah' : 'Belum' }}</strong>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="mt-4 pt-3 border-top text-center">
                                            <small class="text-muted">Terdaftar pada: {{ $kolam->created_at->format('d M Y, H:i') }}</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        @empty
                        <tr>
                            <td colspan="6" class="text-center py-5 text-muted">
                                <i class="bi bi-inbox fs-1 d-block mb-2"></i>
                                Belum ada data kolam yang terdaftar.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection