<x-layout>
    <x-slot name="page_name">Halaman Pesanan Admin</x-slot>
    <x-slot name="title"><h6>Data Pesanan</h6></x-slot>
    <x-slot name="page_content">

        <!-- Main content -->
        <div class="flex-1 p-6">
            <div style="background-color: #DBDFE6" class="py-4 rounded-lg border">
                <div class="d-flex justify-content-between align-items-center px-4 mb-3">
                    <div class="relative">
                        <input class="form-control pl-10 pr-4 py-2" placeholder="Search here..." type="text"/>
                        <i class="fas fa-search position-absolute left-3 top-3 text-muted"></i>
                    </div>
                </div>
                <div class="d-flex justify-content-between align-items-center px-4 mb-3">
                    <a href="{{ route('admin.pesanan') }}" class="btn" style="background-color: #27547D; color: white;">← Kembali</a>
                </div>                
                <!-- Wrap table in a div with 'table-responsive' class -->
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover">
                        <thead class="table-primary text-center">
                            <tr style="font-size: 0.875rem">
                                <th class="py-3">No</th>
                                <th class="py-3">User</th>
                                <th class="py-3">Layanan Jasa</th>
                                <th class="py-3">Penyedia Jasa</th>
                                <th class="py-3">Nama Lengkap</th>
                                <th class="py-3">Alamat</th>
                                <th class="py-3">No Telepon</th>
                                <th class="py-3">Waktu Pemesanan</th>
                                <th class="py-3">Jam Pemesanan</th>
                                <th class="py-3">Detail Pekerjaan</th>
                                <th class="py-3">Harga</th>
                                <th class="py-3">Status Pembayaran</th>
                                <th class="py-3">Status Pesanan</th>
                                <th class="py-3">Metode Pembayaran</th>
                                <th class="py-3">Bukti Pembayaran</th>
                                <th class="py-3">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr style="font-size: 0.875rem" class="text-center">
                                <td class="py-2">1</td>
                                <td class="py-2">{{ $pesanan->user->name ?? 'Tidak Ditemukan' }}</td>
                                <td class="py-2">{{ $pesanan->layananJasa->namaJasa ?? 'Tidak Ditemukan' }}</td>
                                <td class="py-2">{{ $pesanan->penyedia_jasa_id }}</td>
                                <td class="py-2">{{ $pesanan->nama_lengkap }}</td>
                                <td class="py-2">{{ $pesanan->alamat }}</td>
                                <td class="py-2">{{ $pesanan->no_telepon }}</td>
                                <td class="py-2">{{ $pesanan->waktu_pemesanan }}</td>
                                <td class="py-2">{{ $pesanan->jam_pemesanan }}</td>
                                <td class="py-2">{{ $pesanan->detail_pekerjaan }}</td>
                                <td class="py-2">Rp {{ number_format($pesanan->harga, 0, ',', '.') }}</td>
                                <td class="py-2">{{ $pesanan->status_pembayaran }}</td>
                                <td class="py-2">{{ $pesanan->status_pesanan }}</td>
                                <td class="py-2">{{ $pesanan->jenisPembayaran->jenis_pembayaran ?? '-' }}</td>
                                <td class="py-2 px-2">
                                    @if($pesanan->bukti_pembayaran)
                                        <a href="{{ asset('storage/' . $pesanan->bukti_pembayaran) }}" target="_blank">
                                            <i class="fa fa-image"></i> Lihat
                                        </a>
                                    @else
                                        <span class="text-gray-500">Belum ada bukti pembayaran</span>
                                    @endif
                                </td>
                                <td class="py-2">
                                    <div class="d-flex justify-content-around">
                                        <a href="#" class="text-warning" title="Lihat">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                        <a href="#" class="text-primary mx-2" title="Edit">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="d-flex justify-content-end mt-4 px-4 gap-2">
                    <button class="btn fw-semibold" style="background-color: #27547D; color:#FFFFFF;">← Previous</button>
                    <button class="btn fw-semibold" style="background-color: #27547D; color:#FFFFFF;">Next →</button>
                </div>
            </div>
        </div>
    </x-slot>
</x-layout>
