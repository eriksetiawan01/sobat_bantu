<x-layout>
    <x-slot name="page_name">Tambah Pengguna</x-slot>
    <x-slot name="title"><h6>Tambah Pengguna Baru</h6></x-slot>
    <x-slot name="page_content">
        <!-- Main content -->
        <form action="{{ route('admin.pengguna.store') }}" method="POST">
            @csrf

            <!-- Nama -->
            <div class="mb-3">
                <label for="name" class="form-label">Nama</label>
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required>
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Username -->
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" value="{{ old('username') }}" required>
                @error('username')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Telepon -->
            <div class="mb-3">
                <label for="no_telepon" class="form-label">Telepon</label>
                <input type="text" name="no_telepon" class="form-control @error('no_telepon') is-invalid @enderror" value="{{ old('no_telepon') }}" required>
                @error('no_telepon')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Email -->
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required>
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Tanggal Lahir -->
            <div class="mb-3">
                <label for="birthday" class="form-label">Tanggal Lahir</label>
                <input type="date" name="birthday" class="form-control @error('birthday') is-invalid @enderror" value="{{ old('birthday') }}" required>
                @error('birthday')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Gender -->
            <div class="mb-3">
                <label class="form-label">Gender</label>
                <div>
                    <input type="radio" name="gender" value="male" @checked(old('gender') === 'male') required> Male
                    <input type="radio" name="gender" value="female" @checked(old('gender') === 'female') required> Female
                </div>
                @error('gender')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Alamat -->
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <textarea name="alamat" class="form-control @error('alamat') is-invalid @enderror" required>{{ old('alamat') }}</textarea>
                @error('alamat')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Password -->
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" required>
                @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Konfirmasi Password -->
            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                <input type="password" name="password_confirmation" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary">Tambah Pengguna</button>
        </form>
    </x-slot>
</x-layout>
