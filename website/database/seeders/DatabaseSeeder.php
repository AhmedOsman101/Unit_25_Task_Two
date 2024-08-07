<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(): void {
        // Call individual seeders
        $this->call([
            CategorySeeder::class,
            AdminSeeder::class,
            ServiceSeeder::class
        ]);
    }
}
