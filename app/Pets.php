<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pets extends Model
{
   protected $table = 'pets';
    use SoftDeletes;
   protected $fillable = [
       'user_id',
       'tag_id',
       'name',
       'description',
       'sexo',
       'fecha_nac',
       'condicion_medica',
       'rnm',
       'pet_type_ptrac',
       'pet_type',
       'breeds',
       'country',
       'state',
       'state',
       'city',
       'avatar',
       'full',
       'is_lost',
       'is_dangerous',
       'is_active',
   ];

   public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function views()
    {
        //return $this->belongsTo(View::class,'pet_id');
        return $this->hasMany(View::class,'pet_id');
    }
}
