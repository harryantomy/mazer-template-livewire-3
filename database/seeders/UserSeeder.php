<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory(10000)->create();

        $superAdmin = User::create([
            'name' => 'Super Admin',
            'email' => 'superadmin@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('password'),
        ]);
        $superAdmin->assignRole('Super Admin');

        $operator = User::create([
            'name' => 'Operator',
            'email' => 'operator@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('password'),
        ]);
        $operator->assignRole('Operator');

        $guru = User::create([
            'name' => 'Harry Antomy',
            'email' => 'hariantomi@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('password'),
        ]);
        $guru->assignRole('Guru');
    }
}
