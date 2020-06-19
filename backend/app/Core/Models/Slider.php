<?php

namespace App\Core\Models;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $fillable = [
        'banner_name',
        'banner_file',
        'banner_link'
    ];
}
