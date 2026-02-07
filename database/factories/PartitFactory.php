<?php

namespace Database\Factories;

use App\Models\Partit;
use App\Models\Equip;
use App\Models\Estadi;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<\App\Models\Partit>
 */
class PartitFactory extends Factory
{
    protected $model = Partit::class;

    public function definition(): array
    {
        // Obtener dos equipos distintos
        $equipLocal = Equip::inRandomOrder()->first() ?? Equip::factory()->create();
        $equipVisitant = Equip::where('id', '!=', $equipLocal->id)->inRandomOrder()->first() ?? Equip::factory()->create();

        return [
            'local_id'    => $equipLocal->id,
            'visitant_id' => $equipVisitant->id,
            'estadi_id'   => Estadi::inRandomOrder()->first()->id ?? Estadi::factory()->create()->id,
            'data'        => $this->faker->dateTimeThisYear()->format('Y-m-d'),
            'jornada'     => $this->faker->numberBetween(1, 38),
            'gols'        => $this->faker->numberBetween(0, 5) . '-' . $this->faker->numberBetween(0, 5),
        ];
    }
}
