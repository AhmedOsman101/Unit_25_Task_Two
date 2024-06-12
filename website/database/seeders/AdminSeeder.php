<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder {
    /**
     * Run the database seeds.
     */
    public function run(): void {
        // Truncate the admins table to avoid duplicates
        Admin::truncate();

        // Array of admin data
        $admins = [

            [
                "name" => "superadmin",
                "email" => "root@mail.com",
                "password" => Hash::make("root1234"), // Hashing the password
                "is_super_admin" => true,
            ],
            [
                "name" => "root",
                "email" => "root1@mail.com",
                "password" => Hash::make("root1234"), // Hashing the password
                "is_super_admin" => false,
            ],
            [
                "name" => "admin",
                "email" => "root2@mail.com",
                "password" => Hash::make("root1234"), // Hashing the password
                "is_super_admin" => false,
            ],
        ];

        // Create admin records
        foreach ($admins as $admin) {
            Admin::create($admin);
        }
    }
}
