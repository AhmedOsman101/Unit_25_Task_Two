<?php

namespace Database\Factories;

use App\Models\Service;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Service>
 */
class ServiceFactory extends Factory {
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Service::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array {
        return [
            'name' => $this->faker->words(2, true),
            'description' => $this->faker->bs(),
            'price' => $this->faker->randomFloat(2, 50, 1000), // prices between $50 and $500 with 2 decimal point.
            'category_id' => Category::inRandomOrder()->first()->id,
        ];
    }
}
