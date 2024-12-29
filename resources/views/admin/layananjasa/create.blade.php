<x-layout>
    <x-slot name="page_name">Halaman produk / Create </x-slot>
    <x-slot name="title"><h6>Tambah Daftar Produk</h6></x-slot>
    <x-slot name="page_content">
    <!-- Form untuk menambah layanan jasa -->
    <form action="{{ route('admin.layananjasa.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <!-- Penyedia Jasa -->
        <div class="form-group">
            <label for="penyedia_jasa_id">Penyedia Jasa</label>
            <select name="penyedia_jasa_id" id="penyedia_jasa_id" class="form-control" required>
                <option value="">Pilih Penyedia Jasa</option>
                @foreach ($penyediaJasa as $penyedia)
                <option value="{{ $penyedia->id }}">{{ $penyedia->nama }}</option>
                @endforeach
            </select>
        </div>

        <!-- Nama Jasa -->
        <div class="form-group">
            <label for="namaJasa">Nama Jasa</label>
            <input type="text" name="namaJasa" id="namaJasa" class="form-control" required value="{{ old('namaJasa') }}">
        </div>

        <!-- Deskripsi -->
        <div class="form-group">
            <label for="deskripsi">Deskripsi</label>
            <textarea name="deskripsi" id="deskripsi" class="form-control" required>{{ old('deskripsi') }}</textarea>
        </div>

        <!-- Harga -->
        <div class="form-group">
            <label for="harga">Harga</label>
            <input type="number" name="harga" id="harga" class="form-control" required value="{{ old('harga') }}">
        </div>

        <!-- Kategori -->
        <div class="form-group">
            <label for="kategori_id">Kategori</label>
            <select name="kategori_id" id="kategori_id" class="form-control" required>
                <option value="">Pilih Kategori</option>
                @foreach ($kategori as $kategoriItem)
                <option value="{{ $kategoriItem->id }}">{{ $kategoriItem->nama }}</option>
                @endforeach
            </select>
        </div>

        <!-- Gambar -->
        <div class="form-group">
            <label for="gambar">Gambar</label>
            <input type="file" name="gambar" id="gambar" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Tambah Layanan</button>
    </form>
    </x-slot>
</x-layout>