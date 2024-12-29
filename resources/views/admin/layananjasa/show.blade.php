<x-layout>
    <x-slot name="page_name">Detail Layanan Jasa</x-slot>
    <x-slot name="title"><h6>Detail Layanan Jasa</h6></x-slot>
    <x-slot name="page_content">
        <div class="bg-white rounded-lg shadow p-6 flex">
            <div class="w-1/3 flex justify-center items-center">
                @if($layananJasa->gambar)
                <img src="{{ asset('storage/' . $layananJasa->gambar) }}" alt="{{ $layananJasa->namaJasa }}" class="rounded-lg w-full max-w-lg">
            @else
                <span class="text-muted">Tidak Ada Gambar</span>
            @endif
            </div>
            <div class="w-2/3 pl-6">
             <div class="flex justify-between items-center">
              <h2 class="text-xl font-bold">
                {{ $layananJasa->namaJasa }}
              </h2>
             </div>
             <p class="text-gray-600">
                {{ $layananJasa->kategori->nama }}
             </p>
             <p class="mt-4 text-gray-600">
              Deskripsi :
              <br/>
              {{ $layananJasa->deskripsi }}
             </p>
             <p class="mt-4 text-gray-600">
              Layanan oleh : {{ $layananJasa->penyediajasa->nama }}
             </p>
             <div class="flex justify-end items-center mt-6">
              <a type="button" class="bg-blue-800 text-white py-2 px-4 rounded-md" href="{{ url('/dashboard/layananjasa') }}">
                Kembali
              </a>
             </div>
            </div>
        </div>
    </x-slot>
</x-layout>
