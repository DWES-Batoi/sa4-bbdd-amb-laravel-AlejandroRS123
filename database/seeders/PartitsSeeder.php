<?php

namespace Database\Seeders;

use App\Models\Equip;
use App\Models\Partit;
use Illuminate\Database\Seeder;

class PartitsSeeder extends Seeder
{
    public function run(): void
    {
        $equips = Equip::all();

        // Crear 20 partidos aleatorios
        for ($i = 0; $i < 20; $i++) {
            Partit::factory()->create();
        }

        dump('PartitsSeeder - total partidos:', Partit::count());
    }
}
