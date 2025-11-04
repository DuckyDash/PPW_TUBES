<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'Tambak Ikan Mina Jaya')</title>

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">

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
      <div>
        <i class="bi bi-bell me-3"></i>
        <i class="bi bi-person-circle"></i>
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
