@extends('layouts.app')
@section('title', 'Admin - Data Panen')
@section('content')
<div class="card border-0 shadow-sm">
    <div class="card-body">
        <h5 class="fw-bold mb-4">Verifikasi Data Panen</h5>
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="bg-light">
                    <tr>
                        <th>Pemilik</th>
                        <th>Ikan</th>
                        <th>Bibit (Kg)</th>
                        <th>Panen (Kg)</th>
                        <th>Status</th>
                        <th>Harga/Kg & Total</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($panens as $p)
                    <tr>
                        <td>{{ $p->pemilik }}</td>
                        <td>{{ $p->jenis_ikan }}</td>
                        <td>{{ $p->berat_bibit }}</td>
                        <td class="fw-bold">{{ $p->berat_panen }}</td>
                        <td>
                            <span class="badge {{ $p->status == 'Terjual' ? 'bg-success' : ($p->status == 'Disetujui' ? 'bg-primary' : 'bg-warning') }}">
                                {{ $p->status }}
                            </span>
                        </td>
                        <td>
                            @if($p->harga_per_kilo)
                                <small>@currency($p->harga_per_kilo) /kg</small><br>
                                <strong>Total: @currency($p->total_harga)</strong>
                            @else
                                -
                            @endif
                        </td>
                        <td>
                            @if($p->status == 'Menunggu Verifikasi')
                                <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#verify{{ $p->id }}">
                                    Verifikasi
                                </button>
                                
                                {{-- Modal Verifikasi --}}
                                <div class="modal fade" id="verify{{ $p->id }}" tabindex="-1">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form action="{{ route('panen.verify', $p->id) }}" method="POST">
                                                @csrf @method('PUT')
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Verifikasi Panen</h5>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Berat Panen: <strong>{{ $p->berat_panen }} Kg</strong></p>
                                                    <label>Masukkan Harga Per Kilo (Rp)</label>
                                                    <input type="number" name="harga_per_kilo" class="form-control mt-2" required>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-primary">Simpan & Setujui</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                            @elseif($p->status == 'Disetujui')
                                <form action="{{ route('panen.sold', $p->id) }}" method="POST" onsubmit="return confirm('Tandai terjual dan masuk keuangan?')">
                                    @csrf @method('PUT')
                                    <button class="btn btn-sm btn-success">
                                        <i class="bi bi-cash"></i> Tandai Terjual
                                    </button>
                                </form>
                            @else
                                <span class="text-success"><i class="bi bi-check-circle"></i> Selesai</span>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection