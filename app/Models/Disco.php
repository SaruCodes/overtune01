<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Disco extends Model
{
    /** @use HasFactory<\Database\Factories\DiscoFactory> */
    use HasFactory;

    public $fillable=["titulo","tipo","anio", "artista","cover_image"];

    public function generos(){
        return $this->hasMany(Genero::class);
    }
}
