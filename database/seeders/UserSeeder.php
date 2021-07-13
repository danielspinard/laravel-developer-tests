<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * @const string
     */
    private const ADMIN_NAME = 'Daniel Spinardi';
    
    /**
     * @const string
     */
    private const ADMIN_EMAIL = 'admin@admin.com';

    /**
     * @const string
     */
    private const ADMIN_PASSWORD = 'password';

    /**
     * @return void
     */
    public function run(): void
    {
        \App\Models\User::create([
            'name' => UserSeeder::ADMIN_NAME,
            'email' => UserSeeder::ADMIN_EMAIL,
            'password' => Hash::make(UserSeeder::ADMIN_PASSWORD),
            'remember_token' => Str::random(10),
            'email_verified_at' => now()
        ]);
    }
}
