<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Actividad extends Model
{
    protected $table = 'actividades';

    protected $fillable = ['actividad'];

    public function organizaciones()
    {
        return $this->belongsToMany(Organizacion::class);
    }

}
