<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class View extends Model
{
    protected $table = 'views';

    protected $fillable =[
        'pet_id',
        'user_id',
        'latitud',
        'longitud',
        'mail_id',
        'comments',
        'status',
        'created_at',
        'updated_at'
    ];

    public function pet()
    {
        return $this->belongsTo(Pets::class);
    }
    public static function getCountNotificacionindex($id)
    {
        $notificacion_count = View::where('user_id','=',$id)->count();
        return $notificacion_count;
    }
    public static function getCountNotificacion($id)
    {
        $notificacion_count = View::where('user_id','=',$id)->where('status','=',0)->count();
        return $notificacion_count;
    }

    public static function getCountNotificacionPetView($id)
    {
        $pet_view_count = View::where('pet_id','=',$id)->count();

        return $pet_view_count;
    }

}
