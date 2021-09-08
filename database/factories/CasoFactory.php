<?php

namespace Database\Factories;

use App\Models\Caso;
use App\Models\Cliente;
use App\Models\Abogado;
use Illuminate\Database\Eloquent\Factories\Factory;

class CasoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Caso::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
                            'num_expediente'=>$this->faker->ean8(), 
                            'fecha_inicio' =>$this->faker->date($format = 'Y-m-d', $max = 'now'),
                            'fecha_fin' =>$this->faker->date($format = 'Y-m-d', $max = 'now'),
                            'estado' =>$this->faker->randomElement(['Archivado','En trámite','Cerrado']), 
                            'activo' =>$this->faker->boolean($chanceOfGettingTrue = 50),
                            'abogado' => Cliente::factory(),
                            'cliente' => Abogado::factory()
        ];
    }
}
