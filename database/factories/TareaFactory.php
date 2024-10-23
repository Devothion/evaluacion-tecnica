<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tarea>
 */
class TareaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'dni' => $this->faker->numerify('########'), // Genera un DNI de 8 dígitos
            'titulo' => $this->faker->sentence(),
            'descripcion' => $this->faker->paragraph(),
            'fecha_vencimiento' => $this->faker->dateTimeBetween('now', '+1 year')->format('Y-m-d'), // Fecha futura
            'estado' => $this->faker->randomElement(['pendiente', 'en_progreso', 'completada']),
        ];
    }
}
