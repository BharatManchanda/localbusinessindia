<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder {
    public function run(): void {
        $user = User::where("email", "admin@yopmail.com")->first();
        if (!$user) {
            User::create([
                "name" => "super admin",
                "email" => "admin@yopmail.com",
                "password" => Hash::make("password"),
                "role" => "admin",
            ]);
        }
    }
}
