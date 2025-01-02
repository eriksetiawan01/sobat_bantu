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
<body class="flex flex-col min-h-screen bg-gray-100 text-gray-800">

{{-- Header --}}
@include('layouts.header')

<!-- Hero Section -->
<section class="bg-[#27547D] py-4">
  <h2 class="text-2xl md:text-4xl text-center font-bold mb-3 text-white">Pesanan</h2>
</section>

<!-- Main content -->
<div class="flex-1 max-w-full mx-auto px-4 sm:px-6 lg:px-8 mt-10">
  <div class="bg-white shadow-xl rounded-lg overflow-hidden px-4 sm:px-6 pb-6">
    <div class="py-4 border-b border-gray-200">
      <h5 class="text-center text-xl md:text-2xl font-semibold text-[#27547D]">Pesanan Saya</h5>
    </div>

    <!-- Tabel Responsif -->
    <div class="overflow-x-auto">
      <table class="min-w-full bg-white border border-gray-200">
        <thead class="bg-[#75D3FF]">
          <tr class="text-center text-xs sm:text-sm md:text-base font-medium text-dark">
            <th class="py-3 px-2 sm:px-4 border">No</th>
            <th class="py-3 px-2 sm:px-4 border">Layanan Jasa</th>
            <th class="py-3 px-2 sm:px-4 border">Nama Lengkap</th>
            <th class="py-3 px-2 sm:px-4 border">Alamat</th>
            <th class="py-3 px-2 sm:px-4 border">No Telepon</th>
            <th class="py-3 px-2 sm:px-4 border">Waktu Pemesanan</th>
            <th class="py-3 px-2 sm:px-4 border">Jam Pemesanan</th>
            <th class="py-3 px-2 sm:px-4 border">Detail Pekerjaan</th>
            <th class="py-3 px-2 sm:px-4 border">Harga</th>
            <th class="py-3 px-2 sm:px-4 border">Status Pembayaran</th>
            <th class="py-3 px-2 sm:px-4 border">Status Pesanan</th>
            <th class="py-3 px-2 sm:px-4 border">Aksi</th>
          </tr>
        </thead>
        <tbody>
          @foreach($pesanans as $pesanan)
          <tr class="border-b hover:bg-gray-50 text-xs sm:text-sm md:text-base text-gray-700">
            <td class="py-2 px-2 sm:px-4 border">{{ $loop->iteration }}</td>
            <td class="py-2 px-2 sm:px-4 border">{{ $pesanan->layananJasa->namaJasa ?? '-' }}</td>
            <td class="py-2 px-2 sm:px-4 border">{{ $pesanan->nama_lengkap }}</td>
            <td class="py-2 px-2 sm:px-4 border">{{ $pesanan->alamat }}</td>
            <td class="py-2 px-2 sm:px-4 border">{{ $pesanan->no_telepon }}</td>
            <td class="py-2 px-2 sm:px-4 border">{{ $pesanan->waktu_pemesanan }}</td>
            <td class="py-2 px-2 sm:px-4 border">{{ $pesanan->jam_pemesanan }}</td>
            <td class="py-2 px-2 sm:px-4 border">{{ $pesanan->detail_pekerjaan }}</td>
            <td class="py-2 px-2 sm:px-4 border">Rp {{ number_format($pesanan->harga, 2, ',', '.') }}</td>
            <td class="py-2 px-2 sm:px-4 border">{{ $pesanan->status_pembayaran }}</td>
            <td class="py-2 px-2 sm:px-4 border">{{ $pesanan->status_pesanan }}</td>
            <td class="py-2 px-2 sm:px-4 text-center border">
              <div class="flex justify-center space-x-2">
                <a href="{{ route('user.pesanan.show', $pesanan->id) }}" class="text-yellow-500 font-bold text-xs sm:text-sm" title="Lihat">
                  <i class="fa fa-eye"></i>
                </a>
                <a href="{{ url('/dashboard/layananjasa/' . $pesanan->id . '/edit') }}" class="text-blue-500 font-bold text-xs sm:text-sm" title="Edit">
                  <i class="fa fa-edit"></i>
                </a>
                <form action="{{ url('/dashboard/layananjasa/' . $pesanan->id) }}" method="POST" class="inline">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="text-red-500 font-bold text-xs sm:text-sm" title="Hapus">
                    <i class="fa fa-trash"></i>
                  </button>
                </form>
              </div>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>

<!-- Footer -->
@include('layouts.footer')

<script src="{{ asset('asset/js/script.js') }}"></script>
</body>
</html>
