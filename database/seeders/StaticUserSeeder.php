<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class StaticUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create static user for login
        User::create([
            'name' => 'Taimoor Arshad',
            'email' => 'taimoorarshad144329@gmail.com',
            'password' => Hash::make('taimmoor1122'),
            'email_verified_at' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
