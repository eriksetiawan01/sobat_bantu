<x-layout>
    <x-slot name="page_name">Edit Layanan Jasa</x-slot>
    <x-slot name="title"><h6>Edit Layanan Jasa</h6></x-slot>
    <x-slot name="page_content">
        <div class="flex-1 p-6">
            <div class="bg-gray-400 py-4 rounded-lg border border-gray-950">
                <form action="{{ route('admin.layananjasa.update', $layanan->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="space-y-4">
                        <div class="mb-4">
                            <label for="penyedia_jasa_id" class="block text-sm font-medium text-gray-700">Penyedia Jasa</label>
                            <select name="penyedia_jasa_id" id="penyedia_jasa_id" class="w-full p-2 border border-gray-300 rounded-md">
                                @foreach($penyediaJasa as $penyedia)
                                    <option value="{{ $penyedia->id }}" {{ $penyedia->id == $layanan->penyedia_jasa_id ? 'selected' : '' }}>
                                        {{ $penyedia->nama }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="namaJasa" class="block text-sm font-medium text-gray-700">Nama Layanan</label>
                            <input type="text" name="namaJasa" id="namaJasa" value="{{ old('namaJasa', $layanan->namaJasa) }}" class="w-full p-2 border border-gray-300 rounded-md">
                        </div>

                        <div class="mb-4">
                            <label for="deskripsi" class="block text-sm font-medium text-gray-700">Deskripsi</label>
                            <textarea name="deskripsi" id="deskripsi" rows="3" class="w-full p-2 border border-gray-300 rounded-md">{{ old('deskripsi', $layanan->deskripsi) }}</textarea>
                        </div>

                        <div class="mb-4">
                            <label for="harga" class="block text-sm font-medium text-gray-700">Harga</label>
                            <input type="number" name="harga" id="harga" value="{{ old('harga', $layanan->harga) }}" class="w-full p-2 border border-gray-300 rounded-md">
                        </div>

                        <div class="mb-4">
                            <label for="kategori_id" class="block text-sm font-medium text-gray-700">Kategori</label>
                            <select name="kategori_id" id="kategori_id" class="w-full p-2 border border-gray-300 rounded-md">
                                @foreach($kategori as $kat)
                                    <option value="{{ $kat->id }}" {{ $kat->id == $layanan->kategori_id ? 'selected' : '' }}>
                                        {{ $kat->nama }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="gambar" class="block text-sm font-medium text-gray-700">Gambar (Opsional)</label>
                            <input type="file" name="gambar" id="gambar" class="w-full p-2 border border-gray-300 rounded-md">
                            @if($layanan->gambar)
                                <div class="mt-2">
                                    <img src="{{ asset('storage/' . $layanan->gambar) }}" alt="{{ $layanan->namaJasa }}" class="rounded-md w-20 h-20 object-cover">
                                </div>
                            @endif
                        </div>

                        <div class="flex justify-end">
                            <button type="submit" class="btn bg-[#27547D] text-white">Perbarui Layanan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </x-slot>
</x-layout>
