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
      <h2 class="text-4xl text-center font-bold mb-3 text-white">Form Pemesanan</h2>
  </section>
  
  <section class="max-w-4xl mx-auto my-10 p-6 bg-white rounded shadow-2xl">
    <form method="POST" action="{{ route('form_pemesanan.store') }}" class="grid grid-cols-1 md:grid-cols-2 gap-6">
        @csrf
        <input type="hidden" name="layanan_jasa_id" value="{{ $layanan->id }}">
        <input type="hidden" name="penyedia_jasa_id" value="{{ $layanan->penyedia_jasa_id }}">
        <div>
            <label class="block text-sm font-medium text-gray-700" for="nama">
                Nama Lengkap *
            </label>
            <input class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2" id="nama" name="nama_lengkap" placeholder="Masukkan nama lengkap" type="text"/>
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700" for="tanggal">
                Waktu Pemesanan *
            </label>
            <div class="flex space-x-2">
                <input class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2" id="tanggal" name="waktu_pemesanan" placeholder="dd/mm/yyyy" type="date"/>
                <input class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2" id="tanggal" name="jam_pemesanan" placeholder="00:00" type="time"/>
            </div>
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700" for="alamat">
                Alamat *
            </label>
            <input class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2" id="alamat" name="alamat" placeholder="Masukkan alamat" type="text"/>
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700" for="detail">
                Detail Pekerjaan *
            </label>
            <textarea class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2" id="detail" name="detail_pekerjaan" placeholder="Masukkan detail pekerjaan"></textarea>
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700" for="telepon">
                Nomor Telepon *
            </label>
            <input class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2" id="   telepon" name="no_telepon" placeholder="Masukkan nomor telepon" type="text"/>
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700" for="harga">
                Harga *
            </label>
            <input class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2" id="harga" name="harga" placeholder="Rp . . . . . . . . . . . . . . ." type="number"/>
        </div>
        <div class="md:col-span-2 flex justify-end">
            <button class="bg-blue-900 text-white px-6 py-2 rounded" type="submit">
                Kirim
            </button>
        </div>
    </form>
</section>


  
  <!-- Footer -->
  @include('layouts.footer')
  
  <script src="{{ asset('asset/js/script.js') }}"></script>
</body>
</html>
