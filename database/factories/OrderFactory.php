<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [    
            'order-no' => 'ORD-' . strtoupper(Str::random(6)),
            'orderBy' => $this->faker->name(),
            'orderCreationDate' => $this->faker->date(),
        ];
    }
}
