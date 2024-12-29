<x-layout>
    <x-slot name="page_name">Tambah Layanan Jasa</x-slot>
    <x-slot name="title"><h6>Tambah Layanan Jasa</h6></x-slot>
    <x-slot name="page_content">

        <div class="flex-1 p-6">
            <div style="background-color: #DBDFE6" class="py-4 rounded-lg border">
                <form action="{{ url('/penyediajasa/' . $penyediaJasa->id . '/layananjasa') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label for="namaJasa" class="form-label">Nama Layanan Jasa</label>
                        <input type="text" class="form-control" id="namaJasa" name="namaJasa" required>
                    </div>

                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi</label>
                        <textarea class="form-control" id="deskripsi" name="deskripsi" rows="4" required></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="harga" class="form-label">Harga</label>
                        <input type="number" class="form-control" id="harga" name="harga" required>
                    </div>

                    <div class="mb-3">
                        <label for="kategori_id" class="form-label">Kategori</label>
                        <select class="form-control" id="kategori_id" name="kategori_id" required>
                            <option value="">Pilih Kategori</option>
                            @foreach ($kategoris as $kategori)
                                <option value="{{ $kategori->id }}">{{ $kategori->nama }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="gambar" class="form-label">Gambar</label>
                        <input type="file" class="form-control" id="gambar" name="gambar">
                    </div>

                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{ route('penyediajasa.layananjasa.index', $penyediaJasa->id) }}" class="btn btn-secondary">Batal</a>
                </form>
            </div>
        </div>

    </x-slot>
</x-layout>
