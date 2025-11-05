<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'Tambak Ikan Mina Jaya')</title>

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

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
      <a href="/dashboard" class="nav-link {{ request()->is('dashboard') ? 'active' : '' }}">Dashboard</a>
      <a href="/keuangan" class="nav-link {{ request()->is('keuangan') ? 'active' : '' }}">Keuangan</a>
      <a href="/inventaris" class="nav-link {{ request()->is('inventaris') ? 'active' : '' }}">Inventaris</a>
      <a href="/data_kolam" class="nav-link {{ request()->is('data_kolam') ? 'active' : '' }}">Data Kolam</a>
    </nav>
  </div>

  {{-- Main Content --}}
  <div class="main-content flex-grow-1">
    {{-- Header --}}
    <div class="header d-flex justify-content-between align-items-center p-3 border-bottom">
      <div>@yield('header', 'Selamat Datang')</div>
      <div class="d-flex align-items-center position-relative">
          <!-- Bell Icon sebagai trigger -->
          <i id="notificationBell" class="bi bi-bell fs-5 me-3" style="cursor: pointer;"></i>

          <!-- Toast container -->
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

          <!-- Profile Icon -->
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

<!-- Bootstrap JS -->
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
