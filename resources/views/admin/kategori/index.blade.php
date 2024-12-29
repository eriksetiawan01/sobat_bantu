<x-layout>
    <x-slot name="page_name">Halaman Kategori Jasa</x-slot>
    <x-slot name="title"><h6>Data Kategori Jasa</h6></x-slot>
    <x-slot name="page_content">
        

        <!-- Main content -->
        <div class="flex-1 p-6">
            <div style="background-color: #DBDFE6" class="py-4 rounded-lg border">
                <div class="d-flex justify-content-between align-items-center px-4 mb-3">
                    <a href="{{ url('/dashboard/kategori/create') }}" class="btn fw-semibold" style="background-color: #27547D; color:#FFFFFF;" onmouseover="this.style.backgroundColor='#FFFFFF'; this.style.color='#27547D';" 
                    onmouseout="this.style.backgroundColor='#27547D'; this.style.color='#FFFFFF';">+ Tambah Kategori Jasa</a>
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
                                <th class="py-3">Id</th>
                                <th class="py-3">Nama</th>
                                <th class="py-3">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kategoris as $kategori)
                                <tr class="text-center {{ $loop->odd ? 'table-light' : 'table-white' }}">
                                    <td class="py-2">{{ $loop->iteration }}</td>
                                    <td class="py-2">{{ $kategori->id }}</td>
                                    <td class="py-2">{{ $kategori->nama }}</td>
                                    <td class="py-2">
                                        <!-- Tombol Lihat -->
                                        <a href="{{ url('/dashboard/kategori/' . $kategori->id) }}" class="text-warning" title="Lihat">
                                            <i class="fa fa-eye"></i>
                                        </a>

                                        <!-- Tombol Edit -->
                                        <a href="{{ url('/dashboard/kategori/' . $kategori->id . '/edit') }}" class="text-primary mx-2" title="Edit">
                                            <i class="fa fa-edit"></i>
                                        </a>

                                        <!-- Tombol Hapus -->
                                        <form action="{{ url('/dashboard/kategori/' . $kategori->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-danger" title="Hapus">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form>
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
