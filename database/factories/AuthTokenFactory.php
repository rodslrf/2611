<?php

namespace Database\Factories;

use App\Models\AuthToken;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class AuthTokenFactory extends Factory
{
    protected $model = AuthToken::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $authToken = AuthToken::inRandomOrder()->first();

        return [
           'password' => Str::random(50),
           'remember_token' => Str::random(10),
        ];
    }
}
