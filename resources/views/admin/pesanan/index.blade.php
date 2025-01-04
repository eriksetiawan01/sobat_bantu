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

                <!-- Wrap table in a div with 'table-responsive' class -->
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover">
                        <thead class="table-primary text-center">
                            <tr style="font-size: 0.875rem">
                                <th class="py-3">No</th>
                                <th class="py-3">User</th>
                                <th class="py-3">Layanan Jasa</th>
                                <th class="py-3">Nama Lengkap</th>
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
                            @foreach ($pesanans as $pesanan)
                                <tr style="font-size: 0.875rem" class="text-center {{ $loop->odd ? 'table-light' : 'table-white' }}">
                                    <td class="py-2">{{ $loop->iteration }}</td>
                                    <td class="py-2">{{ $pesanan->user->name }}</td>
                                    <td class="py-2" style="white-space: nowrap;">{{ $pesanan->layananJasa->namaJasa }}</td>
                                    <td class="py-2">{{ $pesanan->nama_lengkap }}</td>
                                    <td class="py-2">{{ $pesanan->waktu_pemesanan }}</td>
                                    <td class="py-2">{{ $pesanan->jam_pemesanan }}</td>
                                    <td class="py-2">{{ Str::limit($pesanan->detail_pekerjaan, 10) }}</td>
                                    <td class="py-2" style="white-space: nowrap;">Rp {{ number_format($pesanan->harga, 0, ',', '.') }}</td>
                                    <td class="py-2" style="white-space: nowrap;">{{ $pesanan->status_pembayaran }}</td>
                                    <td class="py-2" style="white-space: nowrap;">{{ $pesanan->status_pesanan }}</td>
                                    <td class="py-2">{{ $pesanan->jenisPembayaran->jenis_pembayaran ?? '-' }}</td>
                                    <td class="py-2 px-2">
                                        @if($pesanan->bukti_pembayaran)
                                            <a href="{{ asset('storage/' . $pesanan->bukti_pembayaran) }}" target="_blank">
                                                <i class="fa fa-image"></i> Lihat
                                            </a>
                                        @else
                                            <span class="text-gray-500" style="white-space: nowrap;">Belum ada bukti pembayaran</span>
                                        @endif
                                    </td>
                                    <td class="py-2">
                                        <div class="d-flex justify-content-around">
                                            <a href="{{ route('admin.pesanan.show', $pesanan->id) }}" class="text-warning" title="Lihat">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
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
