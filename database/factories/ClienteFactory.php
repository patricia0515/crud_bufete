<?php

namespace Database\Factories;

use App\Models\Cliente;
use Illuminate\Database\Eloquent\Factories\Factory;

class ClienteFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Cliente::class;

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
                            'nombres' =>$this->faker->name(),
                            'apellidos' =>$this->faker->lastName(), 
                            'celular' =>$this->faker->e164PhoneNumber(),
                            'direccion' =>$this->faker->address(),
                            'activo' =>$this->faker->boolean($chanceOfGettingTrue = 50),
        ];
    }
}
