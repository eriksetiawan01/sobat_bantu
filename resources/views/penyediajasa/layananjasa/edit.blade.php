<x-layout>
    <x-slot name="page_name">Edit Layanan Jasa</x-slot>
    <x-slot name="title"><h6>Edit Layanan Jasa - {{ $penyediaJasa->nama }}</h6></x-slot>
    <x-slot name="page_content">
        <div class="flex-1 p-6">
            <form action="{{ route('penyediajasa.layananjasa.update',  $layananJasa->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="namaJasa" class="form-label">Nama Layanan</label>
                    <input type="text" class="form-control" id="namaJasa" name="namaJasa" value="{{ $layananJasa->namaJasa }}">
                </div>
                <div class="mb-3">
                    <label for="deskripsi" class="form-label">Deskripsi</label>
                    <textarea class="form-control" id="deskripsi" name="deskripsi">{{ $layananJasa->deskripsi }}</textarea>
                </div>
                <div class="mb-3">
                    <label for="harga" class="form-label">Harga</label>
                    <input type="number" class="form-control" id="harga" name="harga" value="{{ $layananJasa->harga }}">
                </div>
                <div class="mb-3">
                    <label for="kategori_id" class="form-label">Kategori</label>
                    <select class="form-control" id="kategori_id" name="kategori_id">
                        @foreach($kategoris as $kategori)
                            <option value="{{ $kategori->id }}" {{ $layananJasa->kategori_id == $kategori->id ? 'selected' : '' }}>{{ $kategori->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="gambar" class="form-label">Gambar</label>
                    <input type="file" class="form-control" id="gambar" name="gambar">
                    @if($layananJasa->gambar)
                        <img src="{{ asset('storage/' . $layananJasa->gambar) }}" alt="{{ $layananJasa->namaJasa }}" class="mt-2" width="100">
                    @endif
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </x-slot>
</x-layout>
