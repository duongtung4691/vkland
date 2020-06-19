<?php
namespace App\Core\Repositories\Mysql;

use App\Core\Repositories\Redis\CategoryRedis;
use Illuminate\Support\Facades\DB;

class CategoryMysql
{
    /**
     * @param $categoryId
     * @return array
     */
    public static function getListPostsByAllCategory($categoryId)
    {
        $sql = "SELECT `id`, `published_at` FROM `posts` WHERE `posts`.`category_id` = ? AND `posts`.`status` = ? ORDER BY id DESC";
        $result = DB::select($sql, [$categoryId, 'publish']);
        if (count($result) > 0) {
            return $result;
        }
    }
}
