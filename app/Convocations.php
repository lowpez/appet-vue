<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Convocations extends Model
{
    protected $table = 'convocations';

    protected $fillable = [
        'user_id',
        'client_id',
        'request_id',
        'email',
        'name',
        'phone',
        'job',
        'company',
        'event_type',
        'descripcion',
        'created_at',
        'end_at'
    ];

}
