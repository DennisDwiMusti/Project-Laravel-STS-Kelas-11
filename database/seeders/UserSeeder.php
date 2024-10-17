<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
Use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //akun admin
        User::create([
            'name' => 'admin',
            'email' => 'adminapotek@gmail.com',
            'role' => 'admin',
            'password' => Hash::make('admin123'),
        ]);
        //akun kasir
        User::create([
            'name' => 'kasir',
            'email' => 'kasirapotek@gmail.com',
            'role' => 'kasir',
            'password' => Hash::make('kasir123'),
        ]);
    }
}
