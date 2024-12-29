<x-layout>
    <x-slot name="page_name">Halaman produk / Create </x-slot>
    <x-slot name="title"><h6>Tambah Daftar Produk</h6></x-slot>
    <x-slot name="page_content">
    <!-- Form untuk menambah layanan jasa -->
    <form action="{{ route('admin.kategori.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <!-- Nama Jasa -->
        <div class="form-group">
            <label for="nama">Nama Kategori</label>
            <input type="text" name="nama" id="nama" class="form-control" required value="{{ old('nama') }}">
        </div>

        <!-- Deskripsi -->
        <div class="form-group">
            <label for="deskripsi">Deskripsi</label>
            <textarea name="deskripsi" id="deskripsi" class="form-control" required>{{ old('deskripsi') }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Tambah Kategori</button>
    </form>
    </x-slot>
</x-layout>