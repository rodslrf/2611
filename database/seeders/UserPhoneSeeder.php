<?php

namespace Database\Seeders;

use App\Models\Userphone;
use Illuminate\Database\Seeder;

class UserPhoneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UserPhone::factory()->count(10)->create();
    }
}
