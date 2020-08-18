<?php
namespace App\Core\Models;
use Illuminate\Database\Eloquent\Model;
class Posts extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'excerpt',
        'plain_text',
        'content',
        'author_name',
        'user_id',
        'status',
        'published_at',
        'post_type',
        'category_type',
        'price',
        'address',
        'province',
        'district',
        'subdistrict',
        'banner_image',
        'banner_url',
        'category_id',
        'disease_id',
        'is_deleted',
        'deleted_at',
        'thumbnail_url',
        'top_background_url',
        'is_highlight',
        'time_expired_deal',
        'meta_title',
        'meta_keyword',
        'meta_description'
    ];
}
