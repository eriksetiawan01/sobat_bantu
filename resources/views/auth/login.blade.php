<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Soban</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="{{ asset('asset/css/styles.css') }}">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>
<body>
{{-- Header --}}
@include('layouts.header')
{{-- End Header --}}

<section class="bg-[#27547D] py-2">
    <h2 class="text-4xl text-center font-bold mb-3 text-white">Login ke Akun Soban</h2>
</section>

@if(session('alert'))
    <div class="alert alert-warning">
        {{ session('alert') }}
    </div>
@endif

{{-- main --}}
<main class="flex flex-col items-center justify-center min-h-screen bg-gray-100">
    <div class="bg-white p-8 rounded rounded-lg border border-2 shadow-md w-full max-w-md -mt-20">
        <h3 class="text-center text-xl font-bold mb-4">
            Selamat datang <br> di Website Soban
        </h3>
        <p class="mb-4 text-center">
            Masukan Email &amp; Password Kamu
        </p>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="mb-4">
                <label class="block mb-2 text-gray-700" for="email">
                    <i class="fas fa-user"></i>
                    Email
                </label>
                <x-text-input id="email" class="w-full px-3 py-2 border rounded" type="text" name="email" :value="old('email')" placeholder="Masukan  Email" required autofocus autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>
            <div class="mb-4 relative">
                <label class="block mb-2 text-gray-700" for="password">
                    <i class="fas fa-lock"></i>
                    Password
                </label>
                <x-text-input id="password" class="w-full px-3 py-2 border rounded pr-10" type="password" name="password" placeholder="Masukan Password" required autocomplete="current-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                <!-- Icon Mata untuk menampilkan password -->
                <i class="fas fa-eye absolute top-1/2 right-3 transform -translate-y-1/2 cursor-pointer mt-4" id="togglePassword"></i>
            </div>          
            <div class="flex items-center justify-between mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif
                <button class="w-auto bg-[#27547D] text-white px-5 py-2 rounded mt-4">
                    {{ __('Log in') }}
                </button>
            </div>
        </form>
        
    </div>
</main>
  
<!-- Footer -->
@include('layouts.footer')
  
<script src="{{ asset('asset/js/script.js') }}"></script>
<script>
    // JavaScript untuk toggle visibility password
    const togglePassword = document.getElementById('togglePassword');
    const passwordField = document.getElementById('password');
    
    togglePassword.addEventListener('click', function (e) {
        // Toggle tipe input antara password dan text
        const type = passwordField.type === 'password' ? 'text' : 'password';
        passwordField.type = type;
        
        // Toggle ikon mata
        this.classList.toggle('fa-eye-slash');
    });
</script>
</body>
</html>