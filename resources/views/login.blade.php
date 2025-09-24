<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Masuk — UNIKOM Hardware Lab</title>
  <meta name="description" content="Halaman login untuk sistem pengelolaan perangkat hardware & asisten laboratorium UNIKOM." />
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
            soft: '0 16px 40px -12px rgb(0 0 0 / 0.25)'
          }
        }
      }
    }
  </script>
  <style>
    :root { color-scheme: light dark; }
    html { height: 100%; }
    body { min-height: 100%; }
  </style>
</head>
<body class="bg-gradient-to-br from-brand-50 to-white text-slate-800">
  <main class="min-h-screen grid lg:grid-cols-2">
    <!-- Left: Brand -->
    <section class="hidden lg:flex flex-col justify-between p-10 bg-white/70 border-r border-slate-200/70">
      <a href="/" class="inline-flex items-center gap-3">
        <img src="{{ asset('assets/images/logo_unikom.png') }}" alt="UNIKOM" class="h-12 w-12 object-contain"/>
        <div>
          <div class="text-xl font-extrabold tracking-tight">Hardware Lab UNIKOM</div>
          <div class="text-[12px] uppercase tracking-wider text-brand-700">Inventory & Assistant</div>
        </div>
      </a>
      <div class="mt-12">
        <h1 class="text-3xl font-extrabold leading-tight">Selamat datang kembali 👋</h1>
        <p class="mt-3 text-slate-600 max-w-md">Masuk untuk mengelola perangkat, jadwal asisten, peminjaman alat, dan laporan laboratorium.</p>
        <ul class="mt-6 space-y-3 text-sm">
          <li class="flex items-start gap-2"><svg class="mt-0.5 h-5 w-5 text-brand-600" viewBox="0 0 24 24" fill="currentColor"><path d="M9 16.17 4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z"/></svg> SSO UNIKOM (opsional)</li>
          <li class="flex items-start gap-2"><svg class="mt-0.5 h-5 w-5 text-brand-600" viewBox="0 0 24 24" fill="currentColor"><path d="M9 16.17 4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z"/></svg> Role & izin (dosen/asisten/mahasiswa)</li>
          <li class="flex items-start gap-2"><svg class="mt-0.5 h-5 w-5 text-brand-600" viewBox="0 0 24 24" fill="currentColor"><path d="M9 16.17 4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z"/></svg> Audit log & keamanan</li>
        </ul>
      </div>
      <p class="text-xs text-slate-500">© <span id="y"></span> UNIKOM — Laboratorium Hardware</p>
    </section>

    <!-- Right: Login Card -->
    <section class="flex items-center justify-center p-6 sm:p-10">
      <div class="w-full max-w-md">
        <div class="mb-6 lg:hidden flex items-center justify-center gap-3">
          <img src="{{ asset('assets/images/logo_unikom.png') }}" alt="UNIKOM" class="h-12 w-12 object-contain"/>
          <div class="text-lg font-extrabold">Hardware Lab UNIKOM</div>
        </div>

        <!-- Flash message placeholder -->
        <div id="flash" class="hidden mb-4 rounded-lg border border-emerald-200 bg-emerald-50 px-4 py-2 text-sm text-emerald-700"></div>

        <div class="rounded-2xl border border-slate-200 bg-white/80 shadow-soft p-6">
          <h2 class="text-2xl font-extrabold">Masuk</h2>
          <p class="mt-1 text-sm text-slate-600">Gunakan akun UNIKOM atau email terdaftar.</p>

          <form method="POST" action="{{ route('login') }}" class="mt-6 space-y-4" onsubmit="return validateForm(event)">
            @csrf
            <div>
              <label for="email" class="text-xs text-slate-600">Email</label>
              <input id="email" name="email" type="email" required autocomplete="email"
                     class="mt-1 w-full rounded-xl border border-slate-300 bg-white/90 px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-brand-500" placeholder="nama@unikom.ac.id"/>
              <p id="emailErr" class="mt-1 text-xs text-rose-600 hidden">Masukkan email yang valid.</p>
            </div>
            <div>
              <div class="flex items-center justify-between">
                <label for="password" class="text-xs text-slate-600">Kata Sandi</label>
                <a href="{{ route('password.request') }}" class="text-xs text-brand-700 hover:underline">Lupa kata sandi?</a>
              </div>
              <div class="mt-1 relative">
                <input id="password" name="password" type="password" required autocomplete="current-password"
                       class="w-full rounded-xl border border-slate-300 bg-white/90 px-3 py-2 pr-10 text-sm focus:outline-none focus:ring-2 focus:ring-brand-500" placeholder="••••••••"/>
                <button type="button" id="togglePwd" class="absolute inset-y-0 right-2 my-auto inline-flex h-8 w-8 items-center justify-center rounded-md hover:bg-slate-100" aria-label="Tampilkan kata sandi">
                  <svg id="eyeIcon" viewBox="0 0 24 24" class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2"><path d="M2 12s4-7 10-7 10 7 10 7-4 7-10 7-10-7-10-7Z"/><circle cx="12" cy="12" r="3"/></svg>
                </button>
              </div>
              <p id="pwdErr" class="mt-1 text-xs text-rose-600 hidden">Kata sandi minimal 6 karakter.</p>
            </div>
            <div class="flex items-center justify-between">
              <label class="inline-flex items-center gap-2 text-sm">
                <input type="checkbox" name="remember" class="h-4 w-4 rounded border-slate-300 text-brand-600 focus:ring-brand-500"> Ingat saya
              </label>
              <a href="/" class="text-xs text-slate-500 hover:text-brand-700">Kembali ke beranda</a>
            </div>
            <button type="submit" class="w-full rounded-xl bg-brand-600 text-white font-semibold px-4 py-2.5 hover:bg-brand-700">Masuk</button>
          </form>

          <div class="mt-4 text-center text-sm text-slate-600">
            Belum punya akun? <a href="{{ route('register') }}" class="text-brand-700 hover:underline">Daftar</a>
          </div>

          <!-- (Opsional) tombol SSO -->
          <div class="mt-6">
            <button class="w-full rounded-xl border border-slate-300 px-4 py-2.5 text-sm hover:bg-slate-50">Masuk dengan SSO UNIKOM</button>
          </div>
        </div>

        <p class="mt-6 text-center text-xs text-slate-500">Dengan masuk, Anda menyetujui <a href="#" class="hover:underline">Syarat Layanan</a> & <a href="#" class="hover:underline">Kebijakan Privasi</a>.</p>
      </div>
    </section>
  </main>

  <script>
    // footer year (for the left column)
    const y = document.getElementById('y');
    if (y) y.textContent = new Date().getFullYear();

    // show/hide password
    const pwd = document.getElementById('password');
    const toggle = document.getElementById('togglePwd');
    const eye = document.getElementById('eyeIcon');
    toggle?.addEventListener('click', () => {
      const isText = pwd.type === 'text';
      pwd.type = isText ? 'password' : 'text';
      eye.innerHTML = isText
        ? '<path d="M2 12s4-7 10-7 10 7 10 7-4 7-10 7-10-7-10-7Z"/><circle cx="12" cy="12" r="3"/>'
        : '<path d="M17.94 17.94A10.94 10.94 0 0 1 12 19c-6 0-10-7-10-7a18.4 18.4 0 0 1 5.06-5.94M9.9 4.24A10.94 10.94 0 0 1 12 5c6 0 10 7 10 7a18.4 18.4 0 0 1-3.22 4.02M1 1l22 22"/>'
    })

    // simple client-side validation
    function validateForm(e){
      const email = document.getElementById('email');
      const emailErr = document.getElementById('emailErr');
      const pwdErr = document.getElementById('pwdErr');
      let ok = true;
      if(!email.checkValidity()) { emailErr.classList.remove('hidden'); ok = false; } else { emailErr.classList.add('hidden'); }
      if(pwd.value.length < 6) { pwdErr.classList.remove('hidden'); ok = false; } else { pwdErr.classList.add('hidden'); }
      if(!ok) e.preventDefault();
      return ok;
    }

    // (demo) show success message if redirected with ?success
    const params = new URLSearchParams(window.location.search);
    if(params.get('success')){
      const flash = document.getElementById('flash');
      if(flash){
        flash.textContent = 'Berhasil keluar. Silakan masuk kembali.';
        flash.classList.remove('hidden');
      }
    }
  </script>
</body>
</html>
