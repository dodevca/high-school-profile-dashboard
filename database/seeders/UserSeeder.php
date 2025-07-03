<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::truncate();

        User::create([
            'name'              => 'Administrator',
            'email'             => 'admin@example.com',
            'email_verified_at' => now(),
            'password'          => Hash::make('Admin123'),
            'remember_token'    => Str::random(10),
        ]);

        User::create([
            'name'              => 'Enggar Okta, S.Pd',
            'email'             => 'enggar@example.com',
            'email_verified_at' => now(),
            'password'          => Hash::make('password'),
            'remember_token'    => Str::random(10),
        ]);
    }
}
