<x-layout>
    <x-slot name="page_name">Halaman Pesanan Penyedia Jasa</x-slot>
    <x-slot name="title"><h6>Data Pesanan Penyedia Jasa - {{ $penyediaJasa->nama }}</h6></x-slot>
    <x-slot name="page_content">

        <!-- Main content -->
        <div class="flex-1 p-6">
            <div style="background-color: #DBDFE6" class="py-4 rounded-lg border">
                <div class="d-flex justify-content-between align-items-center px-4 mb-3">
                    <a href="{{ route('penyediajasa.layananjasa.create', ['penyediaId' => $penyediaJasa->id]) }}" class="btn fw-semibold" style="background-color: #27547D; color:#FFFFFF;" onmouseover="this.style.backgroundColor='#FFFFFF'; this.style.color='#27547D';" 
                    onmouseout="this.style.backgroundColor='#27547D'; this.style.color='#FFFFFF';">+ Tambah Layanan Jasa</a>
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
                                <th class="py-3">Alamat</th>
                                <th class="py-3">No Telepon</th>
                                <th class="py-3">Waktu Pemesanan</th>
                                <th class="py-3">Jam Pemesanan</th>
                                <th class="py-3">Detail Pekerjaan</th>
                                <th class="py-3">Harga</th>
                                <th class="py-3">Status Pembayaran</th>
                                <th class="py-3">Status Pesanan</th>
                                <th class="py-3">Ulasan</th>
                                <th class="py-3">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pesanans as $pesanan)
                                <tr style="font-size: 0.875rem" class="text-center {{ $loop->odd ? 'table-light' : 'table-white' }}">
                                    <td class="py-2">{{ $loop->iteration }}</td>
                                    <td class="py-2">{{ $pesanan->user->name }}</td>
                                    <td class="py-2">{{ $pesanan->layananJasa->namaJasa }}</td>
                                    <td class="py-2">{{ $pesanan->nama_lengkap }}</td>
                                    <td class="py-2">{{ $pesanan->alamat }}</td>
                                    <td class="py-2">{{ $pesanan->no_telepon }}</td>
                                    <td class="py-2">{{ $pesanan->waktu_pemesanan }}</td>
                                    <td class="py-2">{{ $pesanan->jam_pemesanan }}</td>
                                    <td class="py-2">{{ $pesanan->detail_pekerjaan }}</td>
                                    <td class="py-2">{{ $pesanan->harga }}</td>
                                    <td class="py-2">{{ $pesanan->status_pembayaran }}</td>
                                    <td class="py-2">{{ $pesanan->status_pesanan }}</td>
                                    <td class="py-2">{{ $pesanan->ulasan }}</td>
                                    <td class="py-2">
                                        <div class="d-flex justify-content-around">
                                            <!-- Tombol Lihat -->
                                            <a href="{{ url('/dashboard/layananjasa/' . $pesanan->id) }}" class="text-warning" title="Lihat">
                                                <i class="fa fa-eye"></i>
                                            </a>
    
                                            <!-- Tombol Edit -->
                                            <a href="{{ url('/dashboard/layananjasa/' . $pesanan->id . '/edit') }}" class="text-primary mx-2" title="Edit">
                                                <i class="fa fa-edit"></i>
                                            </a>
    
                                            <!-- Tombol Hapus -->
                                            <form action="{{ url('/dashboard/layananjasa/' . $pesanan->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-danger" title="Hapus">
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

                <div class="d-flex justify-content-end mt-4 px-4 gap-2">
                    <button class="btn fw-semibold" style="background-color: #27547D; color:#FFFFFF;" onmouseover="this.style.backgroundColor='#FFFFFF'; this.style.color='#27547D';" 
                    onmouseout="this.style.backgroundColor='#27547D'; this.style.color='#FFFFFF';">
                        ← Previous
                    </button>
                    <button class="btn fw-semibold" style="background-color: #27547D; color:#FFFFFF;" onmouseover="this.style.backgroundColor='#FFFFFF'; this.style.color='#27547D';" 
                    onmouseout="this.style.backgroundColor='#27547D'; this.style.color='#FFFFFF';">
                        Next →
                    </button>
                </div>
            </div>
        </div>
    </x-slot>
</x-layout>
