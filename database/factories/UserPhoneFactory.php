<?php

namespace Database\Factories;

use App\Models\Userphone;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserPhoneFactory extends Factory
    {

        /**
         * Define the model's default state.
         *
         * @return array
         */

         protected $model = Userphone::class;
         

        public function definition()
        {
            return [
                'email' => $this->faker->email(),
                'telefone' =>  $this->geradorTelefone(),
            ];
        }    
        
        public function geradorTelefone()
{
    $ddd = random_int(11, 99);  // Gera o código de área (DDD)
    $prefixo = random_int(1000, 9999);  // Prefixo do número
    $sufixo = random_int(1000, 9999);  // Sufixo do número

    // Retorna no formato (XX) XXXX-XXXX
    return "($ddd) $prefixo-$sufixo";
}
}
