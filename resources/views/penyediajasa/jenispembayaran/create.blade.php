<x-layout>
    <x-slot name="page_name">Tambah Jenis Pembayaran</x-slot>
    <x-slot name="title"><h6>Tambah Jenis Pembayaran</h6></x-slot>
    <x-slot name="page_content">
        <div class="flex-1 p-6">
            <form method="POST" action="{{ route('penyediajasa.jenispembayaran.store') }}">
                @csrf
                <div class="mb-3">
                    <label for="jenis_pembayaran" class="form-label">Jenis Pembayaran</label>
                    <input type="text" class="form-control" id="jenis_pembayaran" name="jenis_pembayaran" required>
                </div>
                <div class="mb-3">
                    <label for="nomor" class="form-label">Nomor</label>
                    <input type="text" class="form-control" id="nomor" name="nomor" required>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </x-slot>
</x-layout>
