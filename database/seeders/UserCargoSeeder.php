<?php

namespace Database\Seeders;

use App\Models\UserCargo;
use Illuminate\Database\Seeder;

class UserCargoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UserCargo::factory()->count(10)->create();
    }
}
