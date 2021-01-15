<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subcategories extends Model
{
   protected $table = 'subcategories';

   protected $fillable = ['name','short-name','category_id'];

}
