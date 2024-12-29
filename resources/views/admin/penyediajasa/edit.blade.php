<x-layout>
    <x-slot name="page_name">Edit Penyedia Jasa</x-slot>
    <x-slot name="title"><h6>Edit Penyedia Jasa</h6></x-slot>
    <x-slot name="page_content">
        <!-- Main content -->
        <form action="{{ route('admin.penyediajasa.update', $penyedia->id) }}" method="POST">
            @csrf
            @method('PUT')
            
            <!-- Nama -->
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama', $penyedia->nama) }}" required>
                @error('nama')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Alamat -->
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <input type="text" name="alamat" class="form-control @error('alamat') is-invalid @enderror" value="{{ old('alamat', $penyedia->alamat) }}" required>
                @error('alamat')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- No Telepon -->
            <div class="mb-3">
                <label for="noTelepon" class="form-label">No Telepon</label>
                <input type="text" name="noTelepon" class="form-control @error('noTelepon') is-invalid @enderror" value="{{ old('noTelepon', $penyedia->noTelepon) }}" required>
                @error('noTelepon')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Email -->
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', $penyedia->email) }}" required>
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Update Penyedia Jasa</button>
        </form>
    </x-slot>
</x-layout>
