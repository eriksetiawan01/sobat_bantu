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

  <!-- Hero Section -->
  <section class="bg-[#27547D] py-2">
      <h2 class="text-4xl text-center font-bold mb-3 text-white">Detail Layanan Jasa</h2>
  </section>

<div class="container mx-auto my-8">
    <div class="max-w-4xl mx-auto bg-white shadow-2xl rounded-lg overflow-hidden">
        <!-- Gambar di bagian atas card -->
        <div class="flex justify-center">
            <img src="{{ asset('asset/img/'.$layanan->gambar) }}" class="max-w-sm w-full h-auto object-cover" alt="Gambar">
        </div>
        <hr class="border-t-2 border-gray-200">
        <div class="flex justify-between p-6">
            <!-- Informasi layanan -->
            <div>
                <h5 class="text-[#27547D] text-3xl font-semibold">{{ $layanan->namaJasa }}</h5>
                <p class="text-sm text-gray-600"><span class="font-semibold">Kategori:</span> {{ $layanan->kategori->nama }}</p>
                <p class="text-sm text-gray-600"><span class="font-semibold">Nama Penyedia Jasa:</span> {{ $layanan->penyediaJasa->nama }}</p>
            </div>
            <!-- Rating dan pengguna -->
            <div class="flex flex-col items-center">
                <div class="flex">
                    @for ($i = 0; $i < 5; $i++)
                        <svg class="text-yellow-400" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 16" width="24" height="24">
                            <path d="M8 12.472L3.878 14.864l.792-4.637L1.61 6.963l4.678-.679L8 2l1.712 4.284 4.678.679-3.06 3.264.792 4.637L8 12.472z"/>
                        </svg>
                    @endfor
                </div>
                <p class="mt-2 text-sm text-gray-500">5k Pengguna</p>
            </div>
        </div>
        <hr class="border-t-2 border-gray-200">
        <div class="p-6">
            <div class="mb-5">
                <p class="text-[#27547D] text-lg font-semibold">Deskripsi:</p>
                <p class="text-gray-700 text-base">{{ $layanan->deskripsi }}</p>
            </div>
            <div class="flex justify-end">
                <button
                    type="button"
                    class="bg-[#27547D] text-white px-6 py-3 rounded-lg text-lg font-semibold hover:bg-[#1c3c5b]">
                    Pesan Sekarang
                </button>
            </div>
        </div>
    </div>
</div>

{{-- Footer --}}
@include('layouts.footer')

    <script src="{{ asset('asset/js/script.js') }}"></script>
</body>
</html>
