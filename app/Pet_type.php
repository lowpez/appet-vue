<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pet_type extends Model
{
    protected $table = 'pet_type';

    protected $fillable =['name'];

    public static function getEspecie($id)
    {
        $pet_type = Pet_type::where('id','=',$id)->first()->name;

        return $pet_type;
    }
}
