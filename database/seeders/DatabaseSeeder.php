<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\VeiculoSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserCargoSeeder::class);
        $this->call(UserPhoneSeeder::class);
        $this->call(AuthTokenSeeder::class);
        $this->call(CpfSeeder::class);
        $this->call(UsuarioSeeder::class);
        $this->call(VeiculoSeeder::class);
    }
}
