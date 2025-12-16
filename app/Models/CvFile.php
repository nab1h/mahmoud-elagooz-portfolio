<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CvFile extends Model
{
    protected $fillable = [
        'file_name',
        'display_name',
    ];
}
