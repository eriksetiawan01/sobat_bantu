<x-layout>
    <x-slot name="page_name">Edit Pengguna</x-slot>
    <x-slot name="title"><h6>Edit Pengguna</h6></x-slot>
    <x-slot name="page_content">
        <!-- Main content -->
        <form action="{{ route('admin.pengguna.update', $pengguna->id) }}" method="POST">
            @csrf
            @method('PUT')
            
            <!-- Nama -->
            <div class="mb-3">
                <label for="name" class="form-label">Nama</label>
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $pengguna->name) }}" required>
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Username -->
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" value="{{ old('username', $pengguna->username) }}" required>
                @error('username')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Telepon -->
            <div class="mb-3">
                <label for="no_telepon" class="form-label">Telepon</label>
                <input type="text" name="no_telepon" class="form-control @error('no_telepon') is-invalid @enderror" value="{{ old('no_telepon', $pengguna->no_telepon) }}" required>
                @error('no_telepon')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Email -->
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', $pengguna->email) }}" required>
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Tanggal Lahir -->
            <div class="mb-3">
                <label for="birthday" class="form-label">Tanggal Lahir</label>
                <input type="date" name="birthday" class="form-control @error('birthday') is-invalid @enderror" value="{{ old('birthday', $pengguna->birthday) }}" required>
                @error('birthday')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Gender -->
            <div class="mb-3">
                <label for="gender" class="form-label">Gender</label><br>
                <div>
                    <input type="radio" id="male" name="gender" value="male" {{ old('gender', $pengguna->gender) == 'male' ? 'checked' : '' }}>
                    <label for="male">Laki-laki</label>
                </div>
                <div>
                    <input type="radio" id="female" name="gender" value="female" {{ old('gender', $pengguna->gender) == 'female' ? 'checked' : '' }}>
                    <label for="female">Perempuan</label>
                </div>
                @error('gender')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Alamat -->
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <input type="text" name="alamat" class="form-control @error('alamat') is-invalid @enderror" value="{{ old('alamat', $pengguna->alamat) }}" required>
                @error('alamat')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Update Pengguna</button>
        </form>
    </x-slot>
</x-layout>
