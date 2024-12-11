<?php

namespace Database\Factories;

use App\Models\UserCargo;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserCargoFactory extends Factory
{
    protected $model = UserCargo::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'cargo' => $this->faker->randomElement([0 , 1]),
            'user_cargo_id' => UserCargo::firstOrCreate([], ['cargo' => $this->faker->randomElement([0 , 1])])->id,
        ];
    }
}
