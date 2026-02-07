<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Jugador;
use App\Models\Equip;
use Illuminate\Foundation\Testing\RefreshDatabase;

class JugadorCrudFeatureTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function test_es_pot_crear_un_jugador()
    {
        $user = User::factory()->create();
        $this->actingAs($user); // ← logueamos al usuario

        $equip = Equip::factory()->create();

        $resp = $this->post(route('jugadors.store'), [
            'nom' => 'Lionel Messi',
            'equip_id' => $equip->id,
            'data_naixement' => '1987-06-24',
            'dorsal' => 10,
        ]);

        $resp->assertSessionHasNoErrors();
        $resp->assertRedirect(route('jugadors.index'));

        $this->assertDatabaseHas('jugadors', [
            'nom' => 'Lionel Messi',
            'equip_id' => $equip->id,
            'dorsal' => 10,
        ]);
    }

    /** @test */
    public function test_es_pot_actualitzar_un_jugador()
    {
        $user = User::factory()->create();
        $this->actingAs($user); // ← logueamos al usuario

        $jugador = Jugador::factory()->create();

        $resp = $this->put(route('jugadors.update', $jugador), [
            'nom' => 'Cristiano Ronaldo',
            'equip_id' => $jugador->equip_id,
            'data_naixement' => $jugador->data_naixement->format('Y-m-d'),
            'dorsal' => 7,
        ]);

        $resp->assertSessionHasNoErrors();
        $resp->assertRedirect(route('jugadors.index'));

        $this->assertDatabaseHas('jugadors', [
            'id' => $jugador->id,
            'nom' => 'Cristiano Ronaldo',
        ]);
    }

    /** @test */
    public function test_es_pot_esborrar_un_jugador()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $jugador = Jugador::factory()->create();

        $resp = $this->delete(route('jugadors.destroy', $jugador));

        $resp->assertSessionHasNoErrors();
        $resp->assertRedirect(route('jugadors.index'));

        $this->assertDatabaseMissing('jugadors', [
            'id' => $jugador->id,
        ]);
    }
}
