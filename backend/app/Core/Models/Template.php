<?php
namespace App\Core\Models;
use Illuminate\Database\Eloquent\Model;
class Template extends Model
{
    protected $fillable = [
        'name',
        'key',
        'content',
        'file'
    ];
}
