<x-layout>
    <x-slot name="page_name">Halaman Home</x-slot>
    <x-slot name="title"><h6 class="text-info">Halaman Home</h6></x-slot>
    <x-slot name="page_content">
        <div class="flex-1 p-6">
            <div style="background-color: #DBDFE6" class="py-4 rounded-lg border">
                <div class="overflow-auto">
                    <table class="table table-bordered table-striped table-hover">
                        <thead class="table-primary text-center">
                            <tr>
                                <th class="py-3">No</th>
                                <th class="py-3">Id</th>
                                <th class="py-3">Nama</th>
                                <th class="py-3">Alamat</th>
                                <th class="py-3">No Telepon</th>
                                <th class="py-3">Email</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="py-2">1</td>
                                <td class="py-2">{{ $penyedia->id }}</td>
                                <td class="py-2">{{ $penyedia->nama }}</td>
                                <td class="py-2">{{ $penyedia->alamat }}</td>
                                <td class="py-2">{{ $penyedia->noTelepon }}</td>
                                <td class="py-2">{{ $penyedia->email }}</td>                          
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="d-flex justify-content-end mt-4 px-4 gap-2">
                    <a type="button" class="bg-blue-800 text-white py-2 px-4 rounded-md" href="{{ url('/dashboard/penyediajasa') }}">
                        Kembali
                    </a>
                </div>
            </div>
        </div>
    </x-slot>
</x-layout>