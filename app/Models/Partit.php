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
        'gols',
        'gols_local',
        'gols_visitant'
    ];

    protected $casts = [
        'data' => 'date',
        'gols_local' => 'integer',
        'gols_visitant' => 'integer',
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

    /**
     * Mutator: Mantenir compatibilitat al desar
     * Si es guarda 'gols' com "2-1", actualitza automàticament gols_local i gols_visitant
     */
    public function setGolsAttribute($value)
    {
        $this->attributes['gols'] = $value;
        
        if ($value && strpos($value, '-') !== false) {
            $gols = explode('-', $value);
            $this->attributes['gols_local'] = isset($gols[0]) ? (int) trim($gols[0]) : 0;
            $this->attributes['gols_visitant'] = isset($gols[1]) ? (int) trim($gols[1]) : 0;
        }
    }

    /**
     * Accessor: Mantenir compatibilitat al llegir
     * Si 'gols' està buit, genera el format "2-1" a partir de gols_local i gols_visitant
     */
    public function getGolsAttribute($value)
    {
        if ($value) {
            return $value;
        }
        
        // Si el camp gols està buit, generar a partir dels camps separats
        if ($this->gols_local !== null && $this->gols_visitant !== null) {
            return $this->gols_local . '-' . $this->gols_visitant;
        }
        
        return null;
    }
}