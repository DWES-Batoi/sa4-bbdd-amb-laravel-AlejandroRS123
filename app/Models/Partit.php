<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * MODEL PARTIT
 */
class Partit extends Model
{
    use HasFactory;

    protected $fillable = [
        'local_id',
        'visitant_id',
        'estadi_id',
        'data',
        'jornada',
        'gols'
    ];

    /**
     * Partit → equip local
     */
    public function local()
    {
        return $this->belongsTo(Equip::class, 'local_id');
    }

    /**
     * Partit → equip visitant
     */
    public function visitant()
    {
        return $this->belongsTo(Equip::class, 'visitant_id');
    }

    /**
     * Partit → estadi
     */
    public function estadi()
    {
        return $this->belongsTo(Estadi::class);
    }
}
