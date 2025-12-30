@extends('layouts.app')
@section('title', 'Riwayat Panen Saya')
@section('content')
<div class="card border-0 shadow-sm">
    <div class="card-body">
        <h5 class="fw-bold mb-4">Riwayat Panen</h5>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Tanggal</th>
                    <th>Ikan</th>
                    <th>Berat Panen</th>
                    <th>Status</th>
                    <th>Estimasi Pendapatan</th>
                </tr>
            </thead>
            <tbody>
                @foreach($panens as $p)
                <tr>
                    <td>{{ $p->created_at->format('d M Y') }}</td>
                    <td>{{ $p->jenis_ikan }}</td>
                    <td>{{ $p->berat_panen }} Kg</td>
                    <td>
                         <span class="badge {{ $p->status == 'Terjual' ? 'bg-success' : ($p->status == 'Disetujui' ? 'bg-primary' : 'bg-warning') }}">
                            {{ $p->status }}
                        </span>
                    </td>
                    <td>
                        @if($p->total_harga)
                            @currency($p->total_harga) 
                            <small class="text-muted d-block">(@currency($p->harga_per_kilo) /kg)</small>
                        @else
                            <span class="text-muted fst-italic">Menunggu harga admin</span>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection