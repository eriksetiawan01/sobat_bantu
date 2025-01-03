<x-layout>
    <x-slot name="page_name">Edit Pesanan</x-slot>
    <x-slot name="title"><h6>Edit Pesanan</h6></x-slot>
    <x-slot name="page_content">
        <form action="{{ route('penyediajasa.pesanan.update', $pesanan->id) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Status Pesanan -->
            <div class="form-group mb-3">
                <label for="status_pesanan">Status Pesanan</label>
                <select name="status_pesanan" id="status_pesanan" class="form-control">
                    <option value="Belum diproses" {{ $pesanan->status_pesanan === 'Belum diproses' ? 'selected' : '' }}>Belum diproses</option>
                    <option value="Sedang diproses" {{ $pesanan->status_pesanan === 'Sedang diproses' ? 'selected' : '' }}>Sedang diproses</option>
                    <option value="Selesai" {{ $pesanan->status_pesanan === 'Selesai' ? 'selected' : '' }}>Selesai</option>
                </select>
            </div>

            <!-- Status Pembayaran -->
            <div class="form-group mb-3">
                <label for="status_pembayaran">Status Pembayaran</label>
                <select name="status_pembayaran" id="status_pembayaran" class="form-control">
                    <option value="Belum dibayar" {{ $pesanan->status_pembayaran === 'Belum dibayar' ? 'selected' : '' }}>Belum dibayar</option>
                    <option value="Sudah dibayar" {{ $pesanan->status_pembayaran === 'Sudah dibayar' ? 'selected' : '' }}>Sudah dibayar</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('penyediajasa.pesanan.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </x-slot>
</x-layout>
