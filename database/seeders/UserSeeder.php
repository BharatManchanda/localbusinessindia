<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder {
    public function run(): void {
        $user = User::where("email", "admin@localbusinessindia.com")->first();
        if (!$user) {
            User::create([
                "name" => "Super Admin",
                "email" => "admin@localbusinessindia.com",
                "password" => Hash::make("LetMeIn@49"),
                "role" => "admin",
            ]);
        }
    }
}
