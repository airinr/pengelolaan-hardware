<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>UNIKOM Hardware Lab — Pengelolaan Barang & Asisten</title>
  <meta name="description" content="Landing page pengelolaan barang hardware Laboratorium UNIKOM dan manajemen asisten: inventori, peminjaman, perawatan, dan jadwal asistensi." />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      theme: {
        extend: {
          fontFamily: { sans: ['Inter', 'ui-sans-serif', 'system-ui'] },
          colors: {
            brand: {
              50:'#eff6ff',100:'#dbeafe',200:'#bfdbfe',300:'#93c5fd',400:'#60a5fa',
              500:'#3b82f6',600:'#2563eb',700:'#1d4ed8',800:'#1e40af',900:'#1e3a8a'
            }
          },
          boxShadow: {
            soft: '0 12px 30px -12px rgb(0 0 0 / 0.2)'
          }
        }
      }
    }
  </script>
  <style>
    :root { color-scheme: light dark; }
    html { scroll-behavior: smooth; }
    .glass { background: linear-gradient(180deg, rgba(255,255,255,.8), rgba(255,255,255,.6)); backdrop-filter: blur(10px); }
    @media (prefers-color-scheme: dark) { .glass { background: linear-gradient(180deg, rgba(15,23,42,.55), rgba(15,23,42,.45)); } }
  </style>
</head>
<body class="bg-white text-slate-800 dark:bg-slate-950 dark:text-slate-100">
  <!-- Header -->
  <header class="sticky top-0 z-50 glass border-b border-slate-200/60 dark:border-slate-800/60">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
      <div class="flex h-16 items-center justify-between">
        <a href="#home" class="inline-flex items-center gap-3">
          <img src="{{ asset('assets/images/logo_unikom.png') }}" alt="UNIKOM" class="h-9 w-9 object-contain"/>
          <div class="leading-tight">
            <div class="text-base font-extrabold tracking-tight">Hardware Lab UNIKOM</div>
            <div class="text-[11px] uppercase tracking-wider text-brand-700">Inventory & Assistant Management</div>
          </div>
        </a>
        <nav class="hidden md:flex items-center gap-8 text-sm">
          <a href="#jadwal" class="hover:text-brand-700">Jadwal Asisten</a>
          <a href="#perangkat" class="hover:text-brand-700">Perangkat Hardware</a>
          <a href="#kontak" class="hover:text-brand-700">Kontak</a>
        </nav>
        <div class="hidden md:flex items-center gap-3">
          <a href="login" class="px-4 py-2 text-sm font-medium rounded-lg border border-slate-200 dark:border-slate-700 hover:bg-slate-50 dark:hover:bg-slate-800">Login</a>
          <a href="register" class="px-4 py-2 text-sm font-semibold rounded-lg bg-brand-600 text-white hover:bg-brand-700 shadow-soft">Daftar</a>
        </div>
        <button id="menuBtn" class="md:hidden inline-flex h-10 w-10 items-center justify-center rounded-lg border border-slate-200 dark:border-slate-700">
          <span class="sr-only">Buka menu</span>
          <svg viewBox="0 0 24 24" class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 6h16M4 12h16M4 18h16"/></svg>
        </button>
      </div>
    </div>
    <div id="mobileMenu" class="md:hidden hidden border-t border-slate-200/60 dark:border-slate-800/60">
      <div class="mx-auto max-w-7xl px-4 py-3 flex flex-col gap-2 text-sm">
        <a href="#jadwal" class="py-2">Jadwal Asisten</a>
        <a href="#kontak" class="py-2">Kontak</a>
        <a href="/login" class="py-2">Login</a>
        <a href="/register" class="py-2 font-semibold text-brand-700">Daftar</a>
      </div>
    </div>
  </header>

  <!-- Hero -->
  <section id="home" class="relative overflow-hidden bg-gradient-to-b from-brand-50 to-white dark:from-slate-900 dark:to-slate-950 flex items-center">
  <div class="absolute -top-28 -left-28 h-80 w-80 rounded-full bg-brand-300/30 blur-3xl"></div>
  <div class="absolute -bottom-32 -right-28 h-80 w-80 rounded-full bg-blue-200/40 blur-3xl"></div>

  <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 pt-16 pb-24 w-full">
    <!-- ganti grid -> flex + justify-between -->
    <div class="flex flex-col lg:flex-row items-center justify-between gap-10">
      <!-- Kiri -->
      <div class="w-full lg:max-w-2xl">
        <span class="inline-flex items-center gap-2 rounded-full border border-brand-200 bg-white/70 px-3 py-1 text-xs font-medium text-brand-700 dark:bg-slate-900/40">
          UNIKOM • Laboratorium Hardware
        </span>
        <h1 class="mt-4 text-4xl sm:text-5xl font-extrabold leading-tight tracking-tight">
          Website Pengelola <span class="text-brand-700">Perangkat Hardware</span> & Asisten Lab. Hardware UNIKOM
        </h1>
        <p class="mt-4 text-base sm:text-lg text-slate-600 dark:text-slate-300">
          Jadwal asistensi, pelaporan perangkat, cepat, dan transparan
        </p>

        <div class="mt-6 flex flex-col sm:flex-row gap-3">
          <a href="#jadwal" class="inline-flex items-center justify-center rounded-xl bg-brand-600 px-6 py-3 text-white font-semibold shadow-soft hover:bg-brand-700">
            Lihat Jadwal Asisten
          </a>
          <a href="#perangkat" class="inline-flex items-center justify-center rounded-xl px-6 py-3 font-semibold border border-slate-200 dark:border-slate-700 hover:bg-slate-50 dark:hover:bg-slate-800">
            Lihat Perangkat
          </a>
        </div>

        <div class="mt-8 grid grid-cols-3 gap-6 text-center">
          <div>
            <div class="text-3xl font-extrabold">2</div>
            <div class="mt-1 text-xs text-slate-500">Lab Hardware</div>
          </div>
          <div>
            <div class="text-3xl font-extrabold">10+</div>
            <div class="mt-1 text-xs text-slate-500">Perangkat</div>
          </div>
          <div>
            <div class="text-3xl font-extrabold">7</div>
            <div class="mt-1 text-xs text-slate-500">Asisten Aktif</div>
          </div>
        </div>
      </div>

      <!-- Kanan -->
      <div class="w-full lg:w-auto flex-shrink-0">
        <div class="rounded-2xl border border-slate-200/60 dark:border-slate-700/60 bg-white/80 dark:bg-slate-900/50 p-3 shadow-soft">
          <div class="rounded-xl bg-gradient-to-br from-white to-slate-50 dark:from-slate-900 dark:to-slate-800 p-6">
            <div class="flex items-center justify-between">
              <div class="h-3 w-3 rounded-full bg-sky-400"></div>
              <div class="h-3 w-3 rounded-full bg-amber-400"></div>
              <div class="h-3 w-3 rounded-full bg-emerald-400"></div>
            </div>
            <div class="mt-4 flex items-center justify-center">
              <img src="{{ asset('assets/images/logo_komputer.png') }}" alt="UNIKOM" class="h-80 w-80 max-w-full object-contain" />
            </div>
          </div>
        </div>
      </div>
    </div><!-- /flex -->
  </div>
</section>


  <!-- Jadwal Asisten -->
  <section id="jadwal" class="py-20 bg-slate-50 dark:bg-slate-900/40">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
      <div class="flex items-end flex-wrap gap-4 justify-between">
        <div>
          <h2 class="text-3xl sm:text-4xl font-extrabold">Jadwal Asisten Laboratorium</h2>
          <p class="mt-2 text-slate-600 dark:text-slate-300">Filter berdasarkan hari, lab, atau dosen pembimbing.</p>
        </div>
        <div class="flex gap-3 w-full sm:w-auto">
          <select id="filterHari" class="w-full sm:w-40 rounded-lg border border-slate-300 dark:border-slate-600 bg-white/80 dark:bg-slate-900/60 px-3 py-2 text-sm">
            <option value="">Semua Hari</option>
            <option>Senin</option>
            <option>Selasa</option>
            <option>Rabu</option>
            <option>Kamis</option>
            <option>Jumat</option>
          </select>
          <input id="filterCari" type="text" placeholder="Cari asisten/dosen/lab" class="w-full sm:w-64 rounded-lg border border-slate-300 dark:border-slate-600 bg-white/80 dark:bg-slate-900/60 px-3 py-2 text-sm"/>
        </div>
      </div>

      <div class="mt-6 overflow-hidden rounded-2xl border border-slate-200 dark:border-slate-700 bg-white/80 dark:bg-slate-900/40">
        <div class="overflow-x-auto">
          <table class="min-w-full text-sm">
            <thead class="bg-brand-600 text-white">
              <tr>
                <th class="px-4 py-3 text-left font-semibold">Hari</th>
                <th class="px-4 py-3 text-left font-semibold">Waktu</th>
                <th class="px-4 py-3 text-left font-semibold">Asisten</th>
                <th class="px-4 py-3 text-left font-semibold">Dosen</th>
                <th class="px-4 py-3 text-left font-semibold">Kelas</th>
                <th class="px-4 py-3 text-left font-semibold">Ruang Lab</th>
              </tr>
            </thead>
            <tbody id="tbodyJadwal" class="divide-y divide-slate-200 dark:divide-slate-800">
              <!-- Sample rows; ganti dengan data dinamis bila diintegrasi -->
              <tr data-hari="Senin" class="hover:bg-brand-50/60 dark:hover:bg-slate-800/60">
                <td class="px-4 py-3">Senin</td>
                <td class="px-4 py-3">08:00–10:00</td>
                <td class="px-4 py-3">Airin Ristiana</td>
                <td class="px-4 py-3">Ir. A. Setiawan, M.T.</td>
                <td class="px-4 py-3">MN-1</td>
                <td class="px-4 py-3">LAB-609</td>
              </tr>
              <tr data-hari="Selasa" class="hover:bg-brand-50/60 dark:hover:bg-slate-800/60">
                <td class="px-4 py-3">Selasa</td>
                <td class="px-4 py-3">10:00–12:00</td>
                <td class="px-4 py-3">Bintang Mahesa</td>
                <td class="px-4 py-3">Dr. D. Nugraha</td>
                <td class="px-4 py-3">MN-1</td>
                <td class="px-4 py-3">LAB-609</td>
              </tr>
              <tr data-hari="Rabu" class="hover:bg-brand-50/60 dark:hover:bg-slate-800/60">
                <td class="px-4 py-3">Rabu</td>
                <td class="px-4 py-3">09:00–11:00</td>
                <td class="px-4 py-3">Citra Anindya</td>
                <td class="px-4 py-3">Dr. Eng. S. Ramadhan</td>
                <td class="px-4 py-3">MN-1</td>
                <td class="px-4 py-3">LAB-609</td>
              </tr>
              <tr data-hari="Kamis" class="hover:bg-brand-50/60 dark:hover:bg-slate-800/60">
                <td class="px-4 py-3">Kamis</td>
                <td class="px-4 py-3">13:00–15:00</td>
                <td class="px-4 py-3">Damar Pradipta</td>
                <td class="px-4 py-3">Ir. R. Wirawan, M.T.</td>
                <td class="px-4 py-3">MN-1</td>
                <td class="px-4 py-3">LAB-609</td>
              </tr>
              <tr data-hari="Jumat" class="hover:bg-brand-50/60 dark:hover:bg-slate-800/60">
                <td class="px-4 py-3">Jumat</td>
                <td class="px-4 py-3">08:00–10:00</td>
                <td class="px-4 py-3">Eka Prameswari</td>
                <td class="px-4 py-3">Dr. I. Naufal</td>
                <td class="px-4 py-3">MN-1</td>
                <td class="px-4 py-3">LAB-609</td>
              </tr>
            </tbody>
          </table>
        </div>
        <div class="px-4 py-3 border-t border-slate-200 dark:border-slate-800 flex items-center justify-between text-sm">
          <div id="countRow" class="text-slate-600 dark:text-slate-300">Menampilkan 5 jadwal</div>
          <a href="#" class="inline-flex items-center gap-2 text-brand-700 hover:underline">Unduh Jadwal (CSV)
            <svg viewBox="0 0 24 24" class="h-4 w-4" fill="currentColor"><path d="M5 20h14v-2H5M12 2v12l4-4 1.4 1.4L12 17l-5.4-5.6L8 10l4 4V2z"/></svg>
          </a>
        </div>
      </div>

    </div>
  </section>

  <!-- Fitur -->
  <section id="perangkat" class="py-20">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
      <div class="mx-auto max-w-2xl text-center">
        <h2 class="text-3xl sm:text-4xl font-extrabold">Perangkat Labolatorium Hardware</h2>
      </div>
      <div class="mt-12 grid sm:grid-cols-2 lg:grid-cols-5 gap-6">
        <article class="rounded-2xl border border-slate-200 dark:border-slate-700 p-6 bg-white/80 dark:bg-slate-900/40">
        <div class="h-40 w-40 rounded-lg bg-brand-600 text-white flex items-center justify-center">
            <img src="{{ asset('assets/images/motherboard.png') }}" alt="Mobo">
          </div>
          <h3 class="mt-4 font-semibold text-lg">Motherboard</h3>
          <p class="mt-1 text-sm text-slate-600 dark:text-slate-300">Jumlah: 20</p>
        </article>
        <article class="rounded-2xl border border-slate-200 dark:border-slate-700 p-6 bg-white/80 dark:bg-slate-900/40">
        <div class="h-40 w-40 rounded-lg bg-brand-600 text-white flex items-center justify-center">
            <img src="{{ asset('assets/images/pin_group.png') }}" alt="Mobo">
          </div>
          <h3 class="mt-4 font-semibold text-lg">Pin Group</h3>
          <p class="mt-1 text-sm text-slate-600 dark:text-slate-300">Jumlah: 20</p>
        </article>
      </div>
    </div>
  </section>

  <!-- Kontak/CTA -->
  <section id="kontak" class="py-20 bg-slate-50 dark:bg-slate-900/40">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
      <div class="grid lg:grid-cols-2 gap-10 items-center">
        <div>
          <h2 class="text-3xl sm:text-4xl font-extrabold">Hubungi Kami</h2>
          <p class="mt-3 text-slate-600 dark:text-slate-300">Dukungan SSO, role dosen/asisten/mahasiswa, dan audit log. Hubungi kami untuk demo.</p>
        </div>
        <form class="rounded-2xl border border-slate-200 dark:border-slate-700 p-6 bg-white/80 dark:bg-slate-900/40">
          <div class="grid sm:grid-cols-2 gap-4">
            <div>
              <label class="text-xs text-slate-500">Nama</label>
              <input type="text" class="mt-1 w-full rounded-lg border border-slate-300 dark:border-slate-600 bg-white/80 dark:bg-slate-900/60 px-3 py-2 text-sm" placeholder="Nama lengkap"/>
            </div>
            <div>
              <label class="text-xs text-slate-500">Email UNIKOM</label>
              <input type="email" class="mt-1 w-full rounded-lg border border-slate-300 dark:border-slate-600 bg-white/80 dark:bg-slate-900/60 px-3 py-2 text-sm" placeholder="nama@unikom.ac.id"/>
            </div>
            <div class="sm:col-span-2">
              <label class="text-xs text-slate-500">Pesan</label>
              <textarea rows="4" class="mt-1 w-full rounded-lg border border-slate-300 dark:border-slate-600 bg-white/80 dark:bg-slate-900/60 px-3 py-2 text-sm" placeholder="Ceritakan kebutuhan atau keluhan lab"></textarea>
            </div>
          </div>
          <button type="button" class="mt-4 w-full rounded-xl bg-brand-600 px-6 py-3 text-white font-semibold shadow-soft hover:bg-brand-700">Kirim</button>
        </form>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer class="py-12">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
      <div class="flex flex-col-reverse sm:flex-row items-center justify-between gap-4">
        <p class="text-sm text-slate-500">© <span id="y"></span> UNIKOM — Laboratorium Hardware. Semua hak dilindungi.</p>
        <nav class="flex items-center gap-6 text-sm">
          <a href="#" class="hover:text-brand-700">Kebijakan Privasi</a>
          <a href="#" class="hover:text-brand-700">Syarat Layanan</a>
          <a href="#" class="hover:text-brand-700">Bantuan</a>
        </nav>
      </div>
    </div>
  </footer>

  <script>
    // Mobile menu toggle
    const btn = document.getElementById('menuBtn');
    const menu = document.getElementById('mobileMenu');
    btn?.addEventListener('click', () => menu.classList.toggle('hidden'));

    // Year
    document.getElementById('y').textContent = new Date().getFullYear();

    // Filter Jadwal
    const filterHari = document.getElementById('filterHari');
    const filterCari = document.getElementById('filterCari');
    const tbody = document.getElementById('tbodyJadwal');
    const rows = Array.from(tbody.querySelectorAll('tr'));
    const countRow = document.getElementById('countRow');

    function applyFilter(){
      const hari = filterHari.value.trim().toLowerCase();
      const q = filterCari.value.trim().toLowerCase();
      let shown = 0;
      rows.forEach(r => {
        const mHari = r.getAttribute('data-hari')?.toLowerCase() || '';
        const text = r.innerText.toLowerCase();
        const okHari = !hari || mHari === hari;
        const okText = !q || text.includes(q);
        const show = okHari && okText;
        r.style.display = show ? '' : 'none';
        if(show) shown++;
      })
      countRow.textContent = `Menampilkan ${shown} jadwal`;
    }
    filterHari.addEventListener('change', applyFilter);
    filterCari.addEventListener('input', applyFilter);
    applyFilter();
  </script>
</body>
</html>