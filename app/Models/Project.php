<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
   protected $fillable = [
        'name',
        'photo_1',
        'photo_2',
        'photo_3',
        'brand_name',
        'photo_brand',
        'description',
    ];
}
