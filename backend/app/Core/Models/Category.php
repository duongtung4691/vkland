<?php
namespace App\Core\Models;
use Illuminate\Database\Eloquent\Model;
class Category extends Model
{
    //protected $connection = 'mongodb';
    protected $fillable = [
        'name',
        'slug',
        'description',
        'parent_id',
        'category_type',
        'is_actived',
        'meta_title',
        'meta_keyword',
        'meta_description'
    ];
}
