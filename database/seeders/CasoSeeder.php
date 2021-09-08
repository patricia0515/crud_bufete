<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Caso;

class CasoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Caso::factory()
            ->count(65)
            ->hasClientes(1)
            ->hasAbogados(1)
            ->create();
    }
}
