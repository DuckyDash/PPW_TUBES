<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'Tambak Ikan Mina Jaya')</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

  <link rel="icon" href="{{ asset('images/logo.png') }}" type="image/png">

  {{-- CSS global --}}
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">

  {{-- CSS tambahan dari setiap halaman --}}
  @stack('styles')
</head>

<body>

  <div class="d-flex min-vh-100">
    {{-- Sidebar --}}
    <div class="sidebar d-flex flex-column align-items-center">
      <img src="{{ asset('images/logo.png') }}" width="80" class="mb-3 mt-3">
      <h5 class="text-center">Tambak Ikan Mina Jaya</h5>

      <nav class="nav flex-column w-100 mt-4">
        {{-- Menu yang bisa diakses SEMUA role --}}
        <a href="/dashboard" class="nav-link {{ request()->is('dashboard') ? 'active' : '' }}">Dashboard</a>

        {{-- LOGIKA ROLE: Hanya tampil jika role adalah ADMIN --}}
        @if(auth()->check() && auth()->user()->role === 'admin')

        <div class="text-white-50 small px-3 mt-2 mb-1 text-uppercase" style="font-size: 0.7rem;">Menu Admin</div>

        {{-- Menu Baru: LIST SEMUA KOLAM (Khusus Admin) --}}
        <a href="/admin/list-kolam" class="nav-link {{ request()->is('admin/list-kolam') ? 'active' : '' }}">
          <i class="bi bi-database-fill me-2"></i> List Semua Kolam
        </a>

        <a href="/users" class="nav-link {{ request()->is('users*') ? 'active' : '' }}">
          <i class="bi bi-people-fill me-2"></i> List User
        </a>

        <a href="/keuangan" class="nav-link {{ request()->is('keuangan') ? 'active' : '' }}">
          <i class="bi bi-cash-stack me-2"></i> Keuangan
        </a>

        <a href="/inventaris" class="nav-link {{ request()->is('inventaris') ? 'active' : '' }}">
          <i class="bi bi-box-seam-fill me-2"></i> Inventaris
        </a>

        <a href="{{ route('panen.admin') }}" class="nav-link {{ request()->is('admin/panen*') ? 'active' : '' }}">
          <i class="bi bi-basket-fill me-2"></i> Verifikasi Panen
        </a>

        <hr class="text-white-50 mx-3 my-2">
        @endif

        {{-- Menu User Biasa (User & Admin bisa lihat) --}}
        <div class="text-white-50 small px-3 mt-2 mb-1 text-uppercase" style="font-size: 0.7rem;">Menu User</div>

        <a href="/data_kolam" class="nav-link {{ request()->is('data_kolam') ? 'active' : '' }}">
          <i class="bi bi-water me-2"></i> Data Kolam Saya
        </a>
        <a href="{{ route('panen.user') }}" class="nav-link {{ request()->is('riwayat-panen') ? 'active' : '' }}">
          <i class="bi bi-clock-history me-2"></i> Riwayat Panen
        </a>
      </nav>
    </div>

    {{-- Main Content --}}
    <div class="main-content flex-grow-1">
      {{-- Header --}}
      <div class="header d-flex justify-content-between align-items-center p-3 border-bottom">
        <div>@yield('header', 'Selamat Datang')</div>
        <div class="d-flex align-items-center position-relative">
          <i id="notificationBell" class="bi bi-bell fs-5 me-3" style="cursor: pointer;"></i>

          <div id="notificationToastContainer" class="position-absolute top-100 end-0 mt-2" style="z-index: 1050; display: none;">
            <div class="toast show" role="alert" aria-live="assertive" aria-atomic="true">
              <div class="toast-header">
                <strong class="me-auto">Notifikasi</strong>
                <small>Baru</small>
                <button type="button" class="btn-close" onclick="this.closest('.toast').style.display='none';" aria-label="Close"></button>
              </div>
              <div class="toast-body">
                Anda memiliki 3 notifikasi baru.
              </div>
            </div>
          </div>

          {{-- Menampilkan Nama User yang Login --}}
          <div class="me-2 text-end d-none d-md-block">
            <small class="fw-bold d-block">{{ auth()->user()->name ?? 'Guest' }}</small>
            <small class="text-muted" style="font-size: 0.75rem;">{{ ucfirst(auth()->user()->role ?? '') }}</small>
          </div>

          <a href="{{ route('profile') }}" class="d-flex align-items-center">
            <i class="bi bi-person-circle fs-5 me-3"></i>
          </a>
        </div>
      </div>

      {{-- Page Content --}}
      <div class="content p-4">
        @yield('content')
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  @stack('scripts')
</body>

</html>

<script>
  document.addEventListener('DOMContentLoaded', () => {
    const bell = document.getElementById('notificationBell');
    const toastContainer = document.getElementById('notificationToastContainer');

    bell.addEventListener('click', () => {
      toastContainer.style.display = toastContainer.style.display === 'none' ? 'block' : 'none';
    });
  });
</script>