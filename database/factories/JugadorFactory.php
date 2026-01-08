<?php

namespace Database\Factories;

use App\Models\Jugador;
use App\Models\Equip;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<\App\Models\Jugador>
 */
class JugadorFactory extends Factory
{
    protected $model = Jugador::class;

    public function definition(): array
    {
        return [
            'nom'          => $this->faker->name(),
            'equip_id'     => Equip::factory(), // crea un equip si no se pasa
            'data_naixement' => $this->faker->date('Y-m-d', '2005-01-01'), // ejemplo
            'dorsal'       => $this->faker->numberBetween(1, 99),
            'foto'         => $this->faker->imageUrl(200, 200, 'people'), // imagen dummy
        ];
    }
}
