<?php

namespace Database\Factories;

use App\Models\Alumno;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factories\Factory;

class AlumnoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = Alumno::class;
     
    public function definition()
    {
        return [
            'nombre' => $this->faker->name(),
            'apellidos'=> $this->faker->lastName(),
            'grupo'=> $this->faker->randomElement(["DW31", "DW32"]),
            'nota media'=> $this->faker->randomDigit(),
            'fecha nacimiento' => $this->faker->date(),
        ];
    }
}
