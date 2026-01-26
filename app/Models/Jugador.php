<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * MODEL JUGADOR
 */
class Jugador extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'equip_id',
        'data_naixement',
        'dorsal',
        'foto'
    ];

    protected $casts = [
        'data_naixement' => 'date',
    ];


    /**
     * Un jugador pertany a un equip
     */
    public function equip()
    {
        return $this->belongsTo(Equip::class);
    }
}
