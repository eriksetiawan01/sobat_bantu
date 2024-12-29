<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\PenyediaJasa;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'username' => 'required|string|max:255|unique:users',
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'birthday' => 'required|date',
            'gender' => 'required|in:male,female',
            'no_telepon' => 'required|string|max:15',
            'alamat' => 'required|string|max:255',
            'role' => 'required|in:admin,penyedia_jasa,pengguna',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        // Jika role adalah 'penyedia_jasa', buat entri baru di tabel penyedia_jasa
    $penyediaJasaId = null;
    if ($request->role == 'penyedia_jasa') {
        // Menambahkan penyedia jasa ke tabel penyedia_jasa
        $penyediaJasa = PenyediaJasa::create([
            'nama' => $request->name,
            'alamat' => $request->alamat,
            'noTelepon' => $request->no_telepon,
            'email' => $request->email,
        ]);
        // Simpan ID penyedia jasa untuk relasi di tabel users
        $penyediaJasaId = $penyediaJasa->id;
    }

        $user = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'birthday' => $request->birthday,
            'gender' => $request->gender,
            'no_telepon' => $request->no_telepon,
            'alamat' => $request->alamat,
            'role' => $request->role,
            'penyedia_jasa_id' => $penyediaJasaId,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('login')->with('success', 'Registrasi berhasil! Silakan login.');

        event(new Registered($user));

        Auth::login($user);

        return redirect(route('dashboard', absolute: false));
    }
}
