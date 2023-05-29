<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'nama' => 'Admin Perpus',
            'email' => 'admin@gmail.com',
            'nim' => 2008,
            'password' => bcrypt('12345678'),
        ]);

        $admin->assignRole('admin');

        $koordinator = User::create([
            'nama' => 'Koordinator Perpus',
            'email' => 'koordinator@gmail.com',
            'nim' => 2009,
            'password' => bcrypt('12345678'),
        ]);

        $koordinator->assignRole('koordinator');

        $user = User::create([
            'nama' => 'User',
            'email' => 'user@gmail.com',
            'nim' => 2010,
            'password' => bcrypt('12345678'),
        ]);

        $user->assignRole('user');
    }
}
