<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Daftar — UNIKOM Hardware Lab</title>
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
          boxShadow: { soft:'0 20px 60px -15px rgb(0 0 0 / 0.25)' }
        }
      }
    }
  </script>
  <style>html,body{height:100%}</style>
</head>
<body class="min-h-screen font-sans text-slate-800">

  <!-- BG gradasi -->
  <div class="fixed inset-0 -z-10">
    <div class="absolute inset-0 bg-gradient-to-br from-brand-200 via-brand-400 to-brand-700"></div>
    <div class="absolute -top-24 -left-24 h-72 w-72 rounded-full bg-white/25 blur-3xl"></div>
    <div class="absolute -bottom-24 -right-24 h-80 w-80 rounded-full bg-brand-900/20 blur-3xl"></div>
  </div>

  <!-- Tengah -->
  <main class="min-h-screen grid place-items-center p-4">
    <section class="w-full max-w-md rounded-2xl border border-white/30 bg-white/70 backdrop-blur-md shadow-soft">
      <div class="px-6 py-7">
        <div class="flex items-center justify-center gap-3 mb-5">
          <img src="{{ asset('assets/images/logo_unikom.png') }}" alt="UNIKOM" class="h-12 w-12 object-contain drop-shadow">
          <h1 class="text-xl font-extrabold text-brand-900">Hardware Lab UNIKOM</h1>
        </div>

        <h2 class="text-2xl font-extrabold text-slate-900">Buat Akun</h2>
        <p class="mt-1 text-sm text-slate-600">Selamat Datang! Silahkan daftar</p>

        <!-- Tampilkan error validasi server -->
        @if ($errors->any())
          <div class="mt-4 rounded-lg border border-rose-200 bg-rose-50 px-4 py-2 text-sm text-rose-700">
            <ul class="list-disc pl-5 space-y-1">
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        @endif

        <form method="POST" action="{{ route('register') }}" class="mt-6 space-y-4" onsubmit="return validateForm(event)">
          @csrf

          <div>
            <label for="name" class="text-xs text-slate-700">Nama Lengkap</label>
            <input id="name" name="name" type="text" required autocomplete="name"
                   value="{{ old('name') }}"
                   class="mt-1 w-full rounded-xl border border-slate-300 bg-white px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-brand-500"
                   placeholder="Nama Anda">
            <p id="nameErr" class="mt-1 text-xs text-rose-600 hidden">Nama minimal 3 karakter.</p>
          </div>

          <div>
            <label for="email" class="text-xs text-slate-700">Email</label>
            <input id="email" name="email" type="email" required autocomplete="email"
                   value="{{ old('email') }}"
                   class="mt-1 w-full rounded-xl border border-slate-300 bg-white px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-brand-500"
                   placeholder="nama@unikom.ac.id">
            <p id="emailErr" class="mt-1 text-xs text-rose-600 hidden">Masukkan email yang valid.</p>
          </div>
          
          <div>
            <label for="role" class="text-xs text-slate-700">Peran</label>
            <select id="role" name="role"
                    class="mt-1 w-full rounded-xl border border-slate-300 bg-white px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-brand-500">
              <option value="mahasiswa" {{ old('role')==='mahasiswa'?'selected':'' }}>Mahasiswa</option>
              <option value="asisten" {{ old('role')==='asisten'?'selected':'' }}>Asisten Lab</option>

            </select>
          </div>
         

          <div>
            <label for="password" class="text-xs text-slate-700">Kata Sandi</label>
            <div class="mt-1 relative">
              <input id="password" name="password" type="password" required autocomplete="new-password"
                     class="w-full rounded-xl border border-slate-300 bg-white px-3 py-2 pr-10 text-sm focus:outline-none focus:ring-2 focus:ring-brand-500"
                     placeholder="Minimal 6 karakter">
              <button type="button" id="togglePwd" class="absolute inset-y-0 right-2 my-auto inline-flex h-8 w-8 items-center justify-center rounded-md hover:bg-slate-100" aria-label="Tampilkan kata sandi">
                <svg id="eyeIcon" viewBox="0 0 24 24" class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2">
                  <path d="M2 12s4-7 10-7 10 7 10 7-4 7-10 7-10-7-10-7Z"/><circle cx="12" cy="12" r="3"/>
                </svg>
              </button>
            </div>
            <div class="mt-2 h-1.5 w-full rounded bg-slate-200 overflow-hidden">
              <div id="meter" class="h-full w-1/5 bg-rose-500 transition-[width]"></div>
            </div>
            <p id="pwdHint" class="mt-1 text-xs text-slate-600">Gunakan kombinasi huruf besar, kecil, angka.</p>
            <p id="pwdErr" class="mt-1 text-xs text-rose-600 hidden">Kata sandi terlalu pendek.</p>
          </div>

          <div>
            <label for="password_confirmation" class="text-xs text-slate-700">Konfirmasi Kata Sandi</label>
            <input id="password_confirmation" name="password_confirmation" type="password" required autocomplete="new-password"
                   class="mt-1 w-full rounded-xl border border-slate-300 bg-white px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-brand-500"
                   placeholder="Ulangi kata sandi">
            <p id="confirmErr" class="mt-1 text-xs text-rose-600 hidden">Konfirmasi tidak sama.</p>
          </div>

          <button type="submit" class="w-full rounded-xl bg-brand-700 text-white font-semibold px-4 py-2.5 hover:bg-brand-800 focus:outline-none focus:ring-2 focus:ring-white/60">
            Buat Akun
          </button>
        </form>

        <div class="mt-4 text-center text-sm text-slate-700">
          Sudah punya akun?
          <a href="{{ route('login') }}" class="text-white bg-brand-700/80 px-2 py-0.5 rounded-md hover:bg-brand-800/90">Masuk</a>
        </div>
      </div>
    </section>

    <p class="text-center text-xs text-white/80">
      © <span id="y"></span> UNIKOM — Laboratorium Hardware
    </p>
  </main>

  <script>
    // Tahun footer
    document.getElementById('y').textContent = new Date().getFullYear();

    // Toggle password
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

    // Password strength meter sederhana
    const meter = document.getElementById('meter');
    const pwdHint = document.getElementById('pwdHint');
    pwd?.addEventListener('input', () => {
      const v = pwd.value;
      let score = 0;
      if (v.length >= 6) score++;
      if (/[A-Z]/.test(v)) score++;
      if (/[a-z]/.test(v)) score++;
      if (/\d/.test(v)) score++;
      if (/[^A-Za-z0-9]/.test(v)) score++;
      const widths = ['20%','40%','60%','80%','100%'];
      const colors = ['bg-rose-500','bg-orange-500','bg-yellow-500','bg-green-500','bg-emerald-600'];
      meter.className = `h-full transition-[width] ${colors[Math.max(0,score-1)]}`;
      meter.style.width = widths[Math.max(0,score-1)];
      pwdHint.textContent = score < 3 ? 'Gunakan kombinasi huruf besar, kecil, angka.' : 'Kata sandi sudah cukup kuat.';
    });

    // Validasi ringan klien
    function validateForm(e){
      const name = document.getElementById('name');
      const email = document.getElementById('email');
      const confirm = document.getElementById('password_confirmation');
      const nameErr = document.getElementById('nameErr');
      const emailErr = document.getElementById('emailErr');
      const pwdErr = document.getElementById('pwdErr');
      const confirmErr = document.getElementById('confirmErr');
      const tos = document.getElementById('tos');
      const tosErr = document.getElementById('tosErr');

      let ok = true;
      if(name.value.trim().length < 3){ nameErr.classList.remove('hidden'); ok = false; } else { nameErr.classList.add('hidden'); }
      if(!email.checkValidity()){ emailErr.classList.remove('hidden'); ok = false; } else { emailErr.classList.add('hidden'); }
      if(pwd.value.length < 6){ pwdErr.classList.remove('hidden'); ok = false; } else { pwdErr.classList.add('hidden'); }
      if(confirm.value !== pwd.value){ confirmErr.classList.remove('hidden'); ok = false; } else { confirmErr.classList.add('hidden'); }
      if(!tos.checked){ tosErr.classList.remove('hidden'); ok = false; } else { tosErr.classList.add('hidden'); }

      if(!ok) e.preventDefault();
      return ok;
    }
  </script>
</body>
</html>
