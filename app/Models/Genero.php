<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Genero extends Model
{

    public function disco(){
        return $this->belongsTo(Disco::class);
    }
    //
}
