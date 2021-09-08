<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Abogado;
use App\Models\Cliente;
use App\Models\Caso;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        $this->call([
        
            CasoSeeder::class,
        ]);
        
       /* Abogado::factory()->create();
       Cliente::factory()->create(); */
       /* Caso::factory(50)->create(); */
    }
}

