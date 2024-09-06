<?php

namespace Database\Factories;

use App\Models\Sales;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Sales>
 */
class SalesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'product_name' => $this->faker->word(),
            'quantity' => $this->faker->numberBetween(5, 100),
            'unity_price' => $this->faker->numberBetween(10000, 20000),
            'total_price' => 120000,
            'customer_name' => $this->faker->name(),
            'email' => $this->faker->email(),
            'address' => $this->faker->streetAddress(),
            'city' => $this->faker->streetName(),
            'country' => $this->faker->country(),
            'zip' => $this->faker->address(),
            'phone' => $this->faker->phoneNumber(),
        ];
    }
}
