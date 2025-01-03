<x-layout>
    <x-slot name="page_name">Halaman Jenis Pembayaran</x-slot>
    <x-slot name="title"><h6>Data Jenis Pembayaran - {{ $penyediaJasa->nama }}</h6></x-slot>
    <x-slot name="page_content">

        <!-- Main content -->
        <div class="flex-1 p-6">
            <div style="background-color: #DBDFE6" class="py-4 rounded-lg border">
                <div class="d-flex justify-content-between align-items-center px-4 mb-3">
                    <a href="{{ route('penyediajasa.jenispembayaran.create') }}" class="btn fw-semibold" style="background-color: #27547D; color:#FFFFFF;" onmouseover="this.style.backgroundColor='#FFFFFF'; this.style.color='#27547D';" 
                    onmouseout="this.style.backgroundColor='#27547D'; this.style.color='#FFFFFF';">+ Tambah Jenis Pembayaran</a>
                    <div class="relative">
                        <input class="form-control pl-10 pr-4 py-2" placeholder="Search here..." type="text"/>
                        <i class="fas fa-search position-absolute left-3 top-3 text-muted"></i>
                    </div>
                </div>
                <div class="overflow-auto">
                    <table class="table table-bordered table-striped table-hover">
                        <thead class="table-primary text-center">
                            <tr>
                                <th class="py-3">No</th>
                                <th class="py-3">Jenis Pembayaran</th>
                                <th class="py-3">Nomor</th>
                                <th class="py-3">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($jenispembayarans as $jenisPembayaran)
                                <tr class="text-center {{ $loop->odd ? 'table-light' : 'table-white' }}">
                                    <td class="py-2">{{ $loop->iteration }}</td>
                                    <td class="py-2">{{ $jenisPembayaran->jenis_pembayaran }}</td>
                                    <td class="py-2">{{ $jenisPembayaran->nomor }}</td>
                                    <td class="py-2">
                                        <!-- Tombol Edit dan Hapus -->
                                        <a href="{{ route('penyediajasa.jenispembayaran.edit', $jenisPembayaran->id) }}" class="text-warning" title="Edit">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <form action="{{ route('penyediajasa.jenispembayaran.destroy', $jenisPembayaran->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger" style=" color: red; border: none; background: transparent;">
                                                <i class="fa fa-trash"></i> 
                                            </button>
                                        </form>                                        
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </x-slot>
</x-layout>
