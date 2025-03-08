<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Disco extends Model
{
    /** @use HasFactory<\Database\Factories\DiscoFactory> */
    use HasFactory;

    public $fillable=["titulo","tipo","anio", "artista","cover_image"];

    public function genero()
    {
        return $this->hasMany(Genero::class);
    }

    public function getGénerosFormattedAttribute()
    {
        if ($this->genero && $this->genero->isNotEmpty()) {
            return $this->genero->map(function ($genero) {
                return [
                    'genero' => $genero->genero,
                    'subgenero' => $genero->subgenero ?? 'No tiene subgénero',
                ];
            });
        }

        return [];
    }

}
