<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Disco>
 */
class DiscoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'titulo' => $this->faker->unique()->sentence(3), //3 palabras aleatorias juntas
            'tipo' => $this->getTipo(),
            'año' => $this->getAnio(),
            'artista' => $this->faker->name(),
        ];
    }
    public function getTipo():string{
        //Elige aleatoriamente uno de los 3 tipos
        $tipos = ['EP', 'Single', 'Album'];
        $numRandom = rand(0, 2);
        return $tipos[$numRandom];
    }

    public function getAnio():int{
        return rand(1960, 2025);
    }
}
