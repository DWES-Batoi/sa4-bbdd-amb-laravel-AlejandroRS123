<?php

namespace Database\Seeders;

use App\Models\Equip;
use App\Models\Jugador;
use Illuminate\Database\Seeder;

class JugadorsSeeder extends Seeder
{
    public function run(): void
    {
        // Crear 5 jugadores por cada equipo existente
        Equip::all()->each(function($equip) {
            Jugador::factory()->count(5)->create([
                'equip_id' => $equip->id,
            ]);
        });

        dump('JugadorsSeeder - total jugadores:', Jugador::count());
    }
}
