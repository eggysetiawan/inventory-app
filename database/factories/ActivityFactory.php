<?php

namespace Database\Factories;

use App\Models\Activity;
use Illuminate\Database\Eloquent\Factories\Factory;

class ActivityFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Activity::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $arrayStatus = ['in', 'out'];
        $randomStatus = array_rand($arrayStatus);
        return [
            'user_id' => rand(1, 6),
            'product_id' => rand(1, 10),
            'quantity' => rand(1, 10),
            'status' => $arrayStatus[$randomStatus],
            'created_at' => $this->faker->dateTimeThisYear(),
            'created_at' => $this->faker->dateTimeThisYear(),
        ];
    }
}
