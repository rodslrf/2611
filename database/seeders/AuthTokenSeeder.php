<?php

namespace Database\Seeders;

use App\Models\AuthToken;
use Illuminate\Database\Seeder;

class AuthTokenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AuthToken::factory()->count(10)->create();
    }
}
