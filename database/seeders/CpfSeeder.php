<?php

namespace Database\Seeders;

use App\Models\Cpf;
use Illuminate\Database\Seeder;

class CpfSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Cpf::factory()->count(10)->create();
    }
}
