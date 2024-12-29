<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'Erik Setiaone',
            'username' => 'eriksetiaone',
            'no_telepon' => '081234567890',
            'email' => 'eriksetiaone@soban.com',
            'birthday' => '1990-01-01',
            'gender' => 'male',
            'alamat' => 'Jl. Admin Soban, Kota Laravel',
            'password' => Hash::make('password123'), // Password terenkripsi
            'role' => 'admin', // Role admin
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
