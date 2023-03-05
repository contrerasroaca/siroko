<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->text(10),
            'price' => $this->faker->numberBetween(1, 100000),
            'stock' => $this->faker->numberBetween(0, 200)
        ];
    }
}
