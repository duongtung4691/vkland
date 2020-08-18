<?php
namespace App\Core\Repositories\Mysql;

use App\Core\Models\Posts;

class PostsMysql
{
    /**
     * @param $id
     * @return mixed
     */
    public static function getPostsById($id)
    {
        $resultMysql = Posts::select('title', 'address', 'subdistrict', 'district', 'province', 'price', 'excerpt', 'content', 'share_url', 'meta_title', 'meta_keyword', 'meta_description', 'thumbnail_url', 'category_id')->where('id', $id)->first();
        return $resultMysql;
    }
}
