<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Organizacion extends Model
{

    protected $table = 'organizaciones';

   protected $fillable = [
                    'user_id',
                    'initiative_name',
                    'initiative_rut',
                    'activities',
                    'initiative_address',
                    'dogs_quota',
                    'cats_quota',
                    'initiative_biography',
                    'is_representantive',
                    'file_upload_name'
      ];

   public function actividades()
   {
       return $this->belongsToMany(Actividad::class);
   }

}
