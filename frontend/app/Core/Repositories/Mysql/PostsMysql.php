<?php
namespace App\Core\Repositories\Mysql;

use App\Core\Models\Posts;
use Illuminate\Support\Facades\DB;

class PostsMysql
{
    /**
     * @param $categoryId
     * @return array
     */
    public static function getPostBasicDetail($categoryId)
    {
        $sql = "SELECT `posts`.`id`, `posts`.`title`, `posts`.`excerpt`, `posts`.`share_url`, `posts`.`thumbnail_url`, `posts`.`published_at`, GROUP_CONCAT(`tags`.`name`) as tag_name
                FROM `posts`
                LEFT JOIN `post_has_tags` on `post_has_tags`.`post_id` = `posts`.`id`
                LEFT JOIN `tags` on `post_has_tags`.`tag_id` = `tags`.`id`
                WHERE `posts`.`category_id` = ? AND `posts`.`status` = ?
                GROUP BY `posts`.`id`
                ORDER BY `posts`.`id` DESC
                ";
        $result = DB::select($sql, [$categoryId, 'publish']);
        if (count($result) > 0) {
            return $result;
        }
    }

    /**
     * @param $categoryId
     * @return mixed
     */
    public static function getPostFullDetail($categoryId)
    {
        $result = Posts::where([['category_id', '=', $categoryId], ['status', '=', 'publish']])->get();
        if (count($result) > 0) {
            return $result;
        }
    }

    /**
     * @param string $query
     * @return mixed
     */
    public function search(string $query = '')
    {
        return Posts::query()->where('title', 'like', "%{$query}%")->orWhere('content', 'like', "%{$query}%")->get();
    }
}
