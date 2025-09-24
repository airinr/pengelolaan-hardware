<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Masuk — UNIKOM Hardware Lab</title>
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;800&display=swap" rel="stylesheet">
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
          boxShadow: { soft:'0 20px 60px -15px rgb(0 0 0 / 0.25)' },
          backdropBlur: { xs: '2px' }
        }
      }
    }
  </script>
  <style>html,body{height:100%}</style>
</head>
<body class="min-h-screen font-sans text-slate-800">

  <!-- BG gradasi penuh layar -->
  <div class="fixed inset-0 -z-10">
    <div class="absolute inset-0 bg-gradient-to-br from-brand-200 via-brand-400 to-brand-700"></div>
    <!-- accent blobs -->
    <div class="absolute -top-24 -left-24 h-72 w-72 rounded-full bg-white/20 blur-3xl"></div>
    <div class="absolute -bottom-24 -right-24 h-80 w-80 rounded-full bg-brand-900/20 blur-3xl"></div>
  </div>

  <!-- Wrapper pusat: grid tempatkan konten di tengah -->
  <main class="min-h-screen grid place-items-center p-4">
    <!-- Kartu login -->
    <section class="w-full max-w-md rounded-2xl border border-white/30 bg-white/70 backdrop-blur-md shadow-soft">
      <div class="px-6 py-7">
        <div class="flex items-center justify-center gap-3 mb-5">
          <img src="{{ asset('assets/images/logo_unikom.png') }}" alt="UNIKOM" class="h-12 w-12 object-contain drop-shadow">
          <h1 class="text-xl font-extrabold text-brand-900">Hardware Lab UNIKOM</h1>
        </div>

        <!-- Flash message (opsional) -->
        @if (session('status'))
          <div class="mb-4 rounded-lg border border-emerald-200 bg-emerald-50 px-4 py-2 text-sm text-emerald-700">
            {{ session('status') }}
          </div>
        @endif

        <h2 class="text-2xl font-extrabold text-slate-900">Masuk</h2>
        <p class="mt-1 text-sm text-slate-600">Selamat Datang Kembali</p>

        <form method="POST" action="{{ route('login') }}" class="mt-6 space-y-4" onsubmit="return validateForm(event)">
          @csrf
          <div>
            <label for="email" class="text-xs text-slate-700">Email</label>
            <input id="email" name="email" type="email" required autocomplete="email"
                   class="mt-1 w-full rounded-xl border border-slate-300 bg-white px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-brand-500"
                   placeholder="nama@unikom.ac.id">
            <p id="emailErr" class="mt-1 text-xs text-rose-600 hidden">Masukkan email yang valid.</p>
          </div>

          <div>
            <div class="flex items-center justify-between">
              <label for="password" class="text-xs text-slate-700">Kata Sandi</label>
              <a href="{{ route('password.request') }}" class="text-xs text-brand-900/90 hover:underline">Lupa kata sandi?</a>
            </div>
            <div class="mt-1 relative">
              <input id="password" name="password" type="password" required autocomplete="current-password"
                     class="w-full rounded-xl border border-slate-300 bg-white px-3 py-2 pr-10 text-sm focus:outline-none focus:ring-2 focus:ring-brand-500"
                     placeholder="••••••••">
              <button type="button" id="togglePwd" class="absolute inset-y-0 right-2 my-auto inline-flex h-8 w-8 items-center justify-center rounded-md hover:bg-slate-100" aria-label="Tampilkan kata sandi">
                <svg id="eyeIcon" viewBox="0 0 24 24" class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2">
                  <path d="M2 12s4-7 10-7 10 7 10 7-4 7-10 7-10-7-10-7Z"/><circle cx="12" cy="12" r="3"/>
                </svg>
              </button>
            </div>
            <p id="pwdErr" class="mt-1 text-xs text-rose-600 hidden">Kata sandi minimal 6 karakter.</p>
          </div>

          <div class="flex items-center justify-between">
            <label class="inline-flex items-center gap-2 text-sm">
              <input type="checkbox" name="remember" class="h-4 w-4 rounded border-slate-300 text-brand-700 focus:ring-brand-500"> Ingat saya
            </label>
            <a href="/" class="text-xs text-slate-500 hover:text-white/90">Kembali</a>
          </div>

          <button type="submit" class="w-full rounded-xl bg-brand-700 text-white font-semibold px-4 py-2.5 hover:bg-brand-800 focus:outline-none focus:ring-2 focus:ring-white/60">
            Masuk
          </button>
        </form>

        <div class="mt-4 text-center text-sm text-slate-700">
          Belum punya akun? <a href="{{ route('register') }}" class="text-white bg-brand-700/80 px-2 py-0.5 rounded-md hover:bg-brand-800/90">Daftar</a>
        </div>

    </section>

    <!-- Footer kecil -->
    <p class="absolute bottom-3 inset-x-0 text-center text-xs text-white/80">
      © <span id="y"></span> UNIKOM — Laboratorium Hardware
    </p>
  </main>

  <script>
    // tahun footer
    document.getElementById('y').textContent = new Date().getFullYear();

    // toggle password
    const pwd = document.getElementById('password');
    const toggle = document.getElementById('togglePwd');
    const eye = document.getElementById('eyeIcon');
    toggle?.addEventListener('click', () => {
      const isText = pwd.type === 'text';
      pwd.type = isText ? 'password' : 'text';
      eye.innerHTML = isText
        ? '<path d="M2 12s4-7 10-7 10 7 10 7-4 7-10 7-10-7-10-7Z"/><circle cx="12" cy="12" r="3"/>'
        : '<path d="M17.94 17.94A10.94 10.94 0 0 1 12 19c-6 0-10-7-10-7a18.4 18.4 0 0 1 5.06-5.94M9.9 4.24A10.94 10.94 0 0 1 12 5c6 0 10 7 10 7a18.4 18.4 0 0 1-3.22 4.02M1 1l22 22"/>';
    });

    // validasi ringan
    function validateForm(e){
      const email = document.getElementById('email');
      const emailErr = document.getElementById('emailErr');
      const pwdErr = document.getElementById('pwdErr');
      let ok = true;
      if(!email.checkValidity()){ emailErr.classList.remove('hidden'); ok = false; } else { emailErr.classList.add('hidden'); }
      if(pwd.value.length < 6){ pwdErr.classList.remove('hidden'); ok = false; } else { pwdErr.classList.add('hidden'); }
      if(!ok) e.preventDefault();
      return ok;
    }
  </script>
</body>
</html>
