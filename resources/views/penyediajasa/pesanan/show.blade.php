<x-layout>
    <x-slot name="page_name">Detail Pesanan Penyedia Jasa</x-slot>
    <x-slot name="title"><h6>Detail Pesanan - {{ $pesanan->user->name }}</h6></x-slot>
    <x-slot name="page_content">
        <div class="flex-1 p-6">
            <div style="background-color: #DBDFE6" class="py-4 rounded-lg border">
                <div class="d-flex justify-content-between align-items-center px-4 mb-3">
                    <a href="{{ route('penyediajasa.pesanan.index') }}" class="btn fw-semibold" style="background-color: #27547D; color:#FFFFFF;">
                        ← Kembali ke Daftar Pesanan
                    </a>
                </div>

                <!-- Detail Pesanan -->
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover">
                        <thead class="table-primary text-center">
                            <tr>
                                <th>No</th>
                                <th>User</th>
                                <th>Layanan Jasa</th>
                                <th>Nama Lengkap</th>
                                <th>Alamat</th>
                                <th>No Telepon</th>
                                <th>Waktu Pemesanan</th>
                                <th>Jam Pemesanan</th>
                                <th>Detail Pekerjaan</th>
                                <th>Harga</th>
                                <th>Status Pembayaran</th>
                                <th>Status Pesanan</th>
                                <th>Metode Pembayaran</th>
                                <th>Bukti Pembayaran</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="text-center">
                                <td>{{ 1 }}</td>
                                <td>{{ $pesanan->user->name }}</td>
                                <td>{{ $pesanan->layananJasa->namaJasa }}</td>
                                <td>{{ $pesanan->nama_lengkap }}</td>
                                <td>{{ $pesanan->alamat }}</td>
                                <td>{{ $pesanan->no_telepon }}</td>
                                <td>{{ $pesanan->waktu_pemesanan }}</td>
                                <td>{{ $pesanan->jam_pemesanan }}</td>
                                <td>{{ $pesanan->detail_pekerjaan }}</td>
                                <td>{{ $pesanan->harga }}</td>
                                <td>{{ $pesanan->status_pembayaran }}</td>
                                <td>{{ $pesanan->status_pesanan }}</td>
                                <td>{{ $pesanan->jenisPembayaran->jenis_pembayaran ?? '-' }}</td>
                                <td class="py-2 px-2 sm:px-4 border">
                                    @if($pesanan->bukti_pembayaran)
                                      <a href="{{ asset('storage/' . $pesanan->bukti_pembayaran) }}" class="text-blue-500 font-bold text-xs sm:text-sm" title="Lihat Bukti Pembayaran" target="_blank">
                                        <i class="fa fa-image"></i> Lihat
                                      </a>
                                    @else
                                      <span class="text-gray-500">Belum ada bukti pembayaran</span>
                                    @endif
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </x-slot>
</x-layout>
