<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductsFactory extends Factory
{

    public function definition(): array
    {
        return [
            'name' => $this->faker->text(5),
            'price' => $this->faker->randomFloat(2, 1000, 3000),
            'stock' => $this->faker->numberBetween(10, 100),

        ];
    }
}
