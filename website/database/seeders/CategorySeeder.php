<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder {
    /**
     * Run the database seeds.
     */
    public function run(): void {
        // Truncate the categories table to avoid duplicates
        Category::truncate();

        $categories = [
            ['name' => 'Computer Repair'],
            ['name' => 'Laptop Repair'],
            ['name' => 'Data Recovery'],
            ['name' => 'Virus Removal'],
            ['name' => 'Network Setup'],
            ['name' => 'Software Installation'],
            ['name' => 'Hardware Upgrade'],
            ['name' => 'Custom PC Build'],
            ['name' => 'IT Consulting'],
            ['name' => 'Remote Support']
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
