<x-layout>
    <x-slot name="page_name">Edit Layanan Jasa</x-slot>
    <x-slot name="title"><h6>Edit Layanan Jasa</h6></x-slot>
    <x-slot name="page_content">
        <div class="container">
            <h2>Edit Jenis Pembayaran</h2>
    
            <form action="{{ route('penyediajasa.jenispembayaran.update', $jenisPembayaran->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="jenis_pembayaran">Jenis Pembayaran</label>
                    <input type="text" class="form-control" id="jenis_pembayaran" name="jenis_pembayaran" value="{{ old('jenis_pembayaran', $jenisPembayaran->jenis_pembayaran) }}" required>
                </div>
                <div class="form-group">
                    <label for="nomor">Nomor</label>
                    <input type="text" class="form-control" id="nomor" name="nomor" value="{{ old('nomor', $jenisPembayaran->nomor) }}" required>
                </div>
                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            </form>
        </div>
    </x-slot>
</x-layout>

