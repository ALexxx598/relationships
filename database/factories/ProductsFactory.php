<?php

namespace Database\Factories;

use App\Models\Products;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Products::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'product_id' => $this->faker->unique()->numberBetween(1,60),
            'name' => $this->faker->word(),
            'price' => $this->faker->numberBetween(100,50000),
            'color' => $this->faker->colorName(),
            'factory_identity' => $this->faker->creditCardNumber(),
        ];
    }
}
