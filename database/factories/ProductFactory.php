<?php

namespace Database\Factories;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $currentYear = Carbon::now()->year;
        return [
            'name' => $this->faker->word,
            'price' => $this->faker->randomFloat(2, 10, 100), // Random price between 10 and 100
            'stock_quantity' => $this->faker->numberBetween(1, 100), // Random stock quantity
            'date' => $this->faker->dateTimeBetween("{$currentYear}-01-01", "{$currentYear}-12-31")->format('Y-m-d'), // Random date in the current year 
        ];
    }
}
