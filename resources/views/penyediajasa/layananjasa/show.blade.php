<x-layout>
    <x-slot name="page_name">Detail Layanan Jasa</x-slot>
    <x-slot name="title"><h6>Data Layanan Jasa - {{ $penyediaJasa->nama }}</h6></x-slot>
    <x-slot name="page_content">
        <div class="flex-1 p-6">
            <div class="py-4 rounded-lg border">
                <div class="d-flex justify-content-between align-items-center px-4 mb-3">
                    <a href="{{ route('penyediajasa.layananjasa.index', ['penyediaId' => $penyediaJasa->id]) }}" class="btn fw-semibold" style="background-color: #27547D; color:#FFFFFF;">← Kembali</a>
                </div>

                <div class="overflow-auto">
                    <table class="table table-bordered table-striped table-hover">
                        <thead class="table-primary text-center">
                            <tr>
                                <th class="py-3">Id</th>
                                <th class="py-3">Gambar</th>
                                <th class="py-3">Nama Layanan</th>
                                <th class="py-3">Deskripsi</th>
                                <th class="py-3">Kategori</th>
                                <th class="py-3">Harga</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="text-center">
                                <td class="py-2">{{ $layananJasa->id }}</td>
                                <td class="py-2">
                                    @if($layananJasa->gambar)
                                        <img src="{{ asset('storage/' . $layananJasa->gambar) }}" alt="{{ $layananJasa->namaJasa }}" class="rounded-circle w-8 h-8 object-cover mx-auto">
                                    @else
                                        <span class="text-muted">Tidak Ada Gambar</span>
                                    @endif
                                </td>
                                <td class="py-2">{{ $layananJasa->namaJasa }}</td>
                                <td class="py-2">{{ $layananJasa->deskripsi }}</td>
                                <td class="py-2">{{ $layananJasa->kategori->nama }}</td>
                                <td class="py-2">{{ $layananJasa->harga }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </x-slot>
</x-layout>
