<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'nicholas',
            'email' => 'nchristopher01@gmail.com',
            'email_verified_at' => now(),
            'phone_number' => '085155448416',
            'password' => bcrypt('12345678'),
            'role_id' => 1,
            'is_login' => '0',
            'is_active' => '1',
            'remember_token' => Str::random(10),
        ]);

        // User::factory(10)->create();
    }
}
