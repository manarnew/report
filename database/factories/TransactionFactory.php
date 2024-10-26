<?php

namespace Database\Factories;
use App\Models\Transaction;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transaction>
 */
class TransactionFactory extends Factory
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
            'product_id' => Product::factory(), // Create a product for each transaction
            'type' => $this->faker->randomElement(['open_stock', 'purchase', 'sell', 'sell_return', 'purchase_return', 'adjustment']),
            'quantity' => $this->faker->numberBetween(1, 10), // Random quantity between 1 and 10
            'amount' => $this->faker->randomFloat(2, 5, 50), // Random amount between 5 and 50
            'transaction_date' => $this->faker->dateTimeBetween("{$currentYear}-01-01", "{$currentYear}-12-31")->format('Y-m-d'), // Random date in the current year 
        ];
    }
}
