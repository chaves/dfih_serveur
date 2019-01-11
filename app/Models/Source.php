<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Source extends Model
{
    protected $with = ['regles'];

    protected $fillable =
    [
        'texte',
        'valide'
    ];

    public function regles()
    {
        return $this->hasMany('App\Models\Regle')->orderBy('ordre');
    }

    public function scopeFindId($query, $source_id)
    {
        return $query->where('id', $source_id);
    }
}
