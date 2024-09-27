<?php

namespace Database\Factories;

use App\Models\ropa;
use Illuminate\Database\Eloquent\Factories\Factory;

class RopaFactory extends Factory
{
    protected $model = ropa::class;

    public function definition()
    {
        return [
            'nombre' => $this->faker->word,
            'marca' => $this->faker->word,
            'talla' => $this->faker->word,
            'color' => $this->faker->colorName,
            'precio' => $this->faker->randomFloat(2, 10, 100),
            'existencia' => $this->faker->numberBetween(1, 100),
            'estado' => $this->faker->numberBetween(0, 1),
        ];
    }
}