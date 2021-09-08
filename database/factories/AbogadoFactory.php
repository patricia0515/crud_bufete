<?php

namespace Database\Factories;

use App\Models\Abogado;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class AbogadoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Abogado::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
                            'tipo_documento'=>$this->faker->randomElement(['C.C','C.E']), 
                            'num_documento' =>$this->faker->ean8(),
                            'num_tarjetaProfesional' =>$this->faker->ean8(), 
                            'nombres' =>$this->faker->name(),
                            'apellidos' =>$this->faker->lastName(), 
                            'celular' =>$this->faker->e164PhoneNumber(),
                            'direccion' =>$this->faker->address(),
                            'activo' =>$this->faker->boolean($chanceOfGettingTrue = 50),
                            
        ];
    }
}