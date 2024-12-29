<x-layout>
    <x-slot name="page_name">Halaman Edit Kategori Jasa</x-slot>
    <x-slot name="title"><h6>Edit Kategori Jasa</h6></x-slot>
    <x-slot name="page_content">
        <!-- Form untuk mengedit kategori -->
        <div class="flex-1 p-6">
            <div style="background-color: #DBDFE6" class="py-4 rounded-lg border">
                <form action="{{ route('admin.kategori.update', $kategori->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" id="nama" name="nama" class="form-control" value="{{ old('nama', $kategori->nama) }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi</label>
                        <textarea id="deskripsi" name="deskripsi" class="form-control" required>{{ old('deskripsi', $kategori->deskripsi) }}</textarea>
                    </div>

                    <div class="d-flex justify-content-end mt-4 px-4 gap-2">
                        <button type="submit" class="btn fw-semibold" style="background-color: #27547D; color:#FFFFFF;" onmouseover="this.style.backgroundColor='#FFFFFF'; this.style.color='#27547D';"
                        onmouseout="this.style.backgroundColor='#27547D'; this.style.color='#FFFFFF';">
                            Update Kategori
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </x-slot>
</x-layout>
