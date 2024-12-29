<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class PenggunaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $penggunas = User::where('role', 'pengguna')->get();
        return view('admin.pengguna.index', compact('penggunas'));
    }

    public function create()
    {
        return view('admin.pengguna.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username',
            'no_telepon' => 'required|string|max:15',
            'email' => 'required|email|max:255|unique:users,email',
            'birthday' => 'required|date',
            'gender' => 'required|in:male,female',
            'alamat' => 'required|string|max:255',
            'password' => 'required|string|min:8|confirmed',
    ]);

        // Tambahkan pengguna baru
        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'no_telepon' => $request->no_telepon,
            'email' => $request->email,
            'birthday' => $request->birthday,
            'gender' => $request->gender,
            'alamat' => $request->alamat,
            'password' => bcrypt($request->password),
    ]);

    // Redirect dengan pesan sukses
    return redirect()->route('admin.pengguna.index')->with('success', 'Pengguna baru berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
       // Cari pengguna berdasarkan ID
       $pengguna = User::findOrFail($id);
       return view('admin.pengguna.show', compact('pengguna'));
    }

    public function edit(string $id)
    {
        // Cari pengguna berdasarkan ID
        $pengguna = User::findOrFail($id);
        return view('admin.pengguna.edit', compact('pengguna'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username,' . $id,
            'no_telepon' => 'required|string|max:15',
            'email' => 'required|email|max:255|unique:users,email,' . $id,
            'birthday' => 'required|date',
            'gender' => 'required|in:male,female',
            'alamat' => 'required|string|max:255',
        ]);

        // Cari pengguna berdasarkan ID
        $pengguna = User::findOrFail($id);
        $pengguna->update([
            'name' => $request->name,
            'username' => $request->username,
            'no_telepon' => $request->no_telepon,
            'email' => $request->email,
            'birthday' => $request->birthday,
            'gender' => $request->gender,
            'alamat' => $request->alamat,
        ]);

        // Redirect dengan pesan sukses
        return redirect()->route('admin.pengguna.index')->with('success', 'Pengguna berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Temukan dan hapus penyedia jasa
        $pengguna = User::findOrFail($id);
        $pengguna->delete();

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('admin.pengguna.index')->with('success', 'Pengguna berhasil dihapus.');
    }
}
