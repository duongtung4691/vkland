<?php
namespace App\Core\Models;
use Illuminate\Database\Eloquent\Model;
class Templates extends Model
{
    protected $table = 'templates';
    protected $fillable = [
        'name',
        'key',
        'content',
        'data_template'
    ];
}
