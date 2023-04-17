<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pedidos>
 */
class PedidosFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [

            'fecha_creacion' => $this->faker->date('Y-m-d', 'now'),
            'referencia' => $this->faker->word(2),
            'n_albaran' => $this->faker->word(5),
            'observaciones' => $this->faker->word(10),
            'material_comercial' => $this->faker->word(1),
            'transporte' => $this->faker->word(1),
            'fecha_recogida' => $this->faker->date('Y-m-d', 'now'),
            'confirmacion_recogida' => $this->faker->word(2)

        ];
    }
}
