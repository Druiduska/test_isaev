<?php

namespace Database\Factories\Product;

use App\Models\Product\Category;
use App\Models\Product\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product\Product>
 */
class ProductFactory extends Factory
{

    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->word(),
            'price' => $this->faker->randomFloat(2, 0, 9999999999),
            'categories_id' => Category::query()->inRandomOrder()->value('id'),
            'in_stock' => $this->faker->boolean(),
            'rating' => $this->faker->randomFloat(20, 0, 5),
            'created_at' => $created_at = $this->faker->dateTimeBetween('-1 years', 'now'),
            'updated_at' => $this->faker->dateTimeBetween($created_at, 'now'),
        ];
    }
}
