<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ciclo>
 */
class CicloFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre' => 'Técnico Superior en ' . fake()->sentence(),
            'codCiclo' => 'Cic' . fake()->randomNumber(2, false),
            'codFamilia' => 'Fa' . fake()->randomNumber(2, false),
            'grado' => fake()->randomElement(['BÁSICA', 'G.M.', 'G.S.', 'C.E. G.M.', 'C.E. G.S.']),
        ];
    }
}
