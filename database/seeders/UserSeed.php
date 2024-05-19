<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => "Super Admin",
            'email' => "superadmin@gmail.com",
            'role' => 1,
            'password' => bcrypt("123456")
        ]);
    }
}
