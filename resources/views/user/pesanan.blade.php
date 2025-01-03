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

@if(session('success'))
    <div id="success-alert" class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mt-4" role="alert">
        <span class="block sm:inline">{{ session('success') }}</span>
        <span class="absolute top-0 bottom-0 right-0 px-4 py-3 cursor-pointer">
            <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" onclick="closeAlert('success-alert')"><title>Close</title><path d="M14.348 5.652a1 1 0 010 1.415l-3.993 3.993 3.993 3.993a1 1 0 11-1.415 1.415l-3.993-3.993-3.993 3.993a1 1 0 01-1.415-1.415l3.993-3.993-3.993-3.993a1 1 0 011.415-1.415l3.993 3.993 3.993-3.993a1 1 0 011.415 0z"/></svg>
        </span>
    </div>
@endif

<!-- Main content -->
<div class="flex-1 max-w-full mx-auto px-4 sm:px-6 lg:px-8 mt-10">
  <div class="bg-white shadow-xl rounded-lg overflow-hidden px-4 sm:px-6 pb-6">
    <div class="py-4 border-b border-gray-200">
      <h5 class="text-center text-xl md:text-2xl font-semibold text-[#27547D]">Pesanan Saya</h5>
    </div>

    <!-- Tabel Responsif -->
    <div class="overflow-x-auto">
      <div class="flex justify-start mb-4">
        <a href="{{ route('user.layanan') }}" class="bg-[#27547D] text-white font-semibold py-2 px-6 rounded-lg hover:bg-[#1d3c57]">
          Buat Pesanan Baru
        </a>
      </div>
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
            <th class="py-3 px-2 sm:px-4 border">Metode Pembayaran</th>
            <th class="py-3 px-2 sm:px-4 border">Bukti Pembayaran</th>
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
            <td class="py-2 px-2 sm:px-4 border">{{ $pesanan->jenisPembayaran->jenis_pembayaran ?? '-' }}</td>
            <td class="py-2 px-2 sm:px-4 border">
              @if($pesanan->bukti_pembayaran)
                <a href="{{ asset('storage/' . $pesanan->bukti_pembayaran) }}" class="text-blue-500 font-bold text-xs sm:text-sm" title="Lihat Bukti Pembayaran" target="_blank">
                  <i class="fa fa-image"></i> Lihat
                </a>
              @else
                <span class="text-gray-500">Belum ada bukti pembayaran</span>
              @endif
            </td>
            <td class="py-2 px-2 sm:px-4 text-center border">
              <div class="flex justify-center space-x-2">
                <a href="{{ route('user.pesanan.show', $pesanan->id) }}" class="text-yellow-500 font-bold text-xs sm:text-sm" title="Lihat">
                  <i class="fa fa-eye"></i>
                </a>
                <form action="{{ route('user.pesanan.destroy', $pesanan->id) }}" method="POST" class="inline delete-form">
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

<script>
  document.querySelectorAll('.delete-form').forEach(form => {
      form.addEventListener('submit', function(e) {
          const confirmation = confirm('Apakah kamu yakin ingin menghapus data ini?');
          if (!confirmation) {
              e.preventDefault(); // Batalkan penghapusan jika tidak setuju
          }
      });
  });

  function closeAlert(id) {
    const alertBox = document.getElementById(id);
    if (alertBox) {
        alertBox.style.display = 'none';
    }
}

</script>

<script src="{{ asset('asset/js/script.js') }}"></script>
</body>
</html>
