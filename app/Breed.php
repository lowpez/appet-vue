<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Breed extends Model
{
    protected $table='breeds';
    protected $fillable = ['name','pet_type'];

    public static function getBreed($id)
    {
        $breed=Breed::where('id','=',$id)->first()->name;

        return $breed;
    }
}
