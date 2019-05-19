<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Regle extends Model
{
    protected $fillable =
    [
        'source_id',
        'niveau',
        'montant',
        'unite',
        'cible',
        'ordre',
        'flag_chiffre_independant_des_benefs',
        'cible_si_independant',
        'exception',
        'flag_optionel',
        'min',
        'max',
        'flag_cible_multiple',
        'flag_delegation',
        'flag_illisible'
    ];

    public function scopeFindId($query, $regle_id)
    {
        return $query->where('id', $regle_id);
    }

    public function scopeFindSourceId($query, $source_id)
    {
        return $query->where('source_id', $source_id);
    }
}
