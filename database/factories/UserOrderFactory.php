<?php

namespace Database\Factories;

use App\Models\UserOrder;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserOrderFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = UserOrder::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'order_id' => $this->faker->numberBetween(1,50),
            'user_id' => $this->faker->numberBetween(1,10),
            'time' => $this->faker->time(),
        ];
    }
}
