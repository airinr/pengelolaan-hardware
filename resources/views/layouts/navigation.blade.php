{{-- resources/views/layouts/admin.blade.php --}}
<!DOCTYPE html>
<html lang="id" class="h-full">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>@yield('title','Admin') — UNIKOM Hardware Lab</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;800&display=swap" rel="stylesheet">
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      darkMode: 'class',
      theme: {
        extend: {
          fontFamily: { sans: ['Inter','ui-sans-serif','system-ui'] },
          colors: {
            brand: {
              50:'#eff6ff',100:'#dbeafe',200:'#bfdbfe',300:'#93c5fd',400:'#60a5fa',
              500:'#3b82f6',600:'#2563eb',700:'#1d4ed8',800:'#1e40af',900:'#1e3a8a'
            }
          },
          boxShadow: { soft:'0 20px 60px -15px rgb(0 0 0 / 0.2)' }
        }
      }
    }
  </script>
  <style>html,body{height:100%}</style>
</head>
<body class="h-full bg-slate-50 text-slate-800 dark:bg-slate-900 dark:text-slate-100">
  {{-- Mobile overlay --}}
  <div id="overlay" class="fixed inset-0 bg-slate-900/40 backdrop-blur-[1px] z-30 hidden lg:hidden"></div>

  <div class="min-h-full">
    {{-- Sidebar --}}
    <aside id="sidebar"
      class="fixed inset-y-0 left-0 z-40 w-72 transform transition-transform duration-200 ease-out
             bg-white/90 dark:bg-slate-900/95 backdrop-blur-md border-r border-slate-200/70 dark:border-slate-800/60
             -translate-x-full lg:translate-x-0 shadow ">
      <div class="h-full flex flex-col">
        {{-- Brand --}}
        <div class="h-16 shrink-0 flex items-center gap-3 px-5 border-b border-slate-200/70 dark:border-slate-800/60">
          <img src="{{ asset('assets/images/logo_unikom.png') }}" alt="UNIKOM" class="h-9 w-9 object-contain">
          <div>
            <div class="text-sm font-bold">UNIKOM Hardware Lab</div>
            <div class="text-[11px] text-slate-500 dark:text-slate-400">Admin Panel</div>
          </div>
        </div>

        {{-- ===== NAVIGATION (tanpa admin.home) ===== --}}
@php
  // helper ikon singkat (svg path saja)
  $icon = fn($d) => '<svg viewBox="0 0 24 24" class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="1.8">'.$d.'</svg>';

  $items = [
    [
      'label'  => 'Dashboard',
      'href'   => url('/admin'),
      'active' => request()->is('admin') || request()->is('admin/dashboard*'),
      'icon'   => $icon('<path d="M3 10.5 12 3l9 7.5V20a1 1 0 0 1-1 1h-5v-6H9v6H4a1 1 0 0 1-1-1v-9.5Z"/>'),
    ],
    [
      'label'  => 'Perangkat',
      'href'   => url('/admin/perangkat'),
      'active' => request()->is('admin/perangkat*'),
      'icon'   => $icon('<path d="M4 6h16v4H4zM4 14h16v4H4z"/>'),
    ],
    [
      'label'  => 'Jadwal Asisten',
      'href'   => url('/admin/asisten'),
      'active' => request()->is('admin/asisten*'),
      'icon'   => $icon('<path d="M7 3v2m10-2v2M3 8h18M5 11h6m-6 4h10m-3-4h6" />'),
    ],
    [
      'label'  => 'Peminjaman',
      'href'   => url('/admin/peminjaman'),
      'active' => request()->is('admin/peminjaman*'),
      'icon'   => $icon('<path d="M3 6h18v12H3zM7 10h6" />'),
    ],
    [
      'label'  => 'Pengguna',
      'href'   => url('/admin/pengguna'),
      'active' => request()->is('admin/pengguna*'),
      'icon'   => $icon('<path d="M16 11a4 4 0 1 0-8 0m12 8a6 6 0 0 0-12 0" />'),
    ],
    [
      'label'  => 'Laporan',
      'href'   => url('/admin/laporan'),
      'active' => request()->is('admin/laporan*'),
      'icon'   => $icon('<path d="M4 4h16v16H4zM8 8h8m-8 4h5m-5 4h10" />'),
    ],
    [
      'label'  => 'Pengaturan',
      'href'   => url('/admin/settings'),
      'active' => request()->is('admin/settings*'),
      'icon'   => $icon('<path d="M12 8a4 4 0 1 0 0 8 4 4 0 0 0 0-8Z M3 12h3m12 0h3M12 3v3m0 12v3" />'),
    ],
  ];
@endphp

<nav class="flex-1 overflow-y-auto px-3 py-4 space-y-1">
  @foreach ($items as $it)
    <a href="{{ $it['href'] }}"
       class="group flex items-center gap-3 rounded-xl px-3 py-2.5 text-sm font-medium border
              {{ $it['active']
                  ? 'bg-brand-50 text-brand-700 border-brand-200 dark:bg-slate-800 dark:text-brand-200 dark:border-slate-700'
                  : 'text-slate-700 hover:bg-slate-100 border-transparent dark:text-slate-300 dark:hover:bg-slate-800' }}">
      {!! $it['icon'] !!}
      <span>{{ $it['label'] }}</span>
    </a>
  @endforeach
</nav>


        {{-- Footer sidebar --}}
        <div class="p-3 border-t border-slate-200/70 dark:border-slate-800/60 text-xs text-slate-500 dark:text-slate-400">
          © {{ date('Y') }} UNIKOM — Hardware Lab
        </div>
      </div>
    </aside>

    {{-- Main area --}}
    <div class="lg:pl-72 ">
      {{-- Topbar --}}
      <header class="sticky top-0 z-30 h-16 flex items-center gap-3 bg-white/80 dark:bg-slate-900/80 backdrop-blur-md border-b border-slate-200/60 dark:border-slate-800/60 px-4 ">
        {{-- Toggle (mobile) --}}
        <button id="btnOpen" class="lg:hidden inline-flex items-center justify-center h-10 w-10 rounded-lg hover:bg-slate-100 dark:hover:bg-slate-800" aria-label="Buka menu">
          <svg viewBox="0 0 24 24" class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="2">
            <path d="M4 6h16M4 12h16M4 18h16"/>
          </svg>
        </button>

        {{-- Page title slot --}}
        <div class="flex-1">
          <h1 class="text-lg font-semibold">@yield('page_title','Dashboard')</h1>
        </div>

        {{-- Search (opsional) --}}
        <form action="#" class="hidden md:block">
          <label class="relative">
            <input type="text" placeholder="Cari…" class="rounded-xl bg-slate-100/70 dark:bg-slate-800/70 border border-slate-200/60 dark:border-slate-700/60 pl-9 pr-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-brand-500">
            <svg class="absolute left-3 top-1/2 -translate-y-1/2 h-4 w-4 text-slate-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="7"/><path d="m20 20-3-3"/></svg>
          </label>
        </form>

        {{-- Dark mode toggle --}}
        <button id="themeBtn" class="ml-1 inline-flex items-center justify-center h-10 w-10 rounded-lg hover:bg-slate-100 dark:hover:bg-slate-800" aria-label="Tema">
          <svg id="sun" class="h-5 w-5 block dark:hidden" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="4"/><path d="M12 2v2m0 16v2M4.93 4.93l1.41 1.41M17.66 17.66l1.41 1.41M2 12h2m16 0h2M4.93 19.07l1.41-1.41M17.66 6.34l1.41-1.41"/></svg>
          <svg id="moon" class="h-5 w-5 hidden dark:block" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"/></svg>
        </button>

        {{-- User dropdown --}}
        <div class="relative">
          <button id="userBtn" class="inline-flex items-center gap-2 h-10 pl-2 pr-3 rounded-lg hover:bg-slate-100 dark:hover:bg-slate-800">
            <img src="{{ asset('assets/images/logo_unikom.png') }}" class="h-8 w-8 rounded-full object-cover" alt="avatar">
            <span class="hidden sm:block text-sm font-medium">{{ auth()->user()->name ?? 'User' }}</span>
            <svg viewBox="0 0 24 24" class="h-4 w-4 text-slate-500"><path d="M7 10l5 5 5-5" fill="currentColor"/></svg>
          </button>
          <div id="userMenu" class="absolute right-0 mt-2 w-48 rounded-lg border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-900 shadow-soft p-1 hidden">
            <a href="#" class="block rounded-md px-3 py-2 text-sm hover:bg-slate-100 dark:hover:bg-slate-800">Pengaturan</a>
            <form method="POST" action="{{ route('logout') }}">
              @csrf
              <button class="w-full text-left rounded-md px-3 py-2 text-sm hover:bg-slate-100 dark:hover:bg-slate-800">Keluar</button>
            </form>
          </div>
        </div>
      </header>

      {{-- Content --}}
      <main class="p-4 sm:p-6 lg:ml-72">
        @yield('content')
      </main>
    </div>
  </div>

  <script>
    // Sidebar toggle (mobile)
    const sidebar = document.getElementById('sidebar');
    const overlay = document.getElementById('overlay');
    document.getElementById('btnOpen')?.addEventListener('click', () => {
      sidebar.classList.remove('-translate-x-full');
      overlay.classList.remove('hidden');
    });
    overlay?.addEventListener('click', () => {
      sidebar.classList.add('-translate-x-full');
      overlay.classList.add('hidden');
    });

    // User menu toggle
    const userBtn = document.getElementById('userBtn');
    const userMenu = document.getElementById('userMenu');
    userBtn?.addEventListener('click', () => userMenu.classList.toggle('hidden'));
    document.addEventListener('click', (e) => {
      if (!userBtn?.contains(e.target) && !userMenu?.contains(e.target)) userMenu?.classList.add('hidden');
    });

    // Dark mode memory
    const themeBtn = document.getElementById('themeBtn');
    const root = document.documentElement;
    if (localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
      root.classList.add('dark');
    }
    themeBtn?.addEventListener('click', () => {
      root.classList.toggle('dark');
      localStorage.theme = root.classList.contains('dark') ? 'dark' : 'light';
    });
  </script>
</body>
</html>
