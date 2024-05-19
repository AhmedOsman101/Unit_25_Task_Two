<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder {
    /**
     * Run the database seeds.
     */
    public function run(): void {
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
