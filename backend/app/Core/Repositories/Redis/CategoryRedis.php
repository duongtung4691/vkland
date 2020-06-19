<?php

namespace App\Core\Repositories\Redis;

use App\Core\Connection\RedisServer;
use App\Core\Enums\RedisEnum;
use Illuminate\Support\Facades\DB;

class CategoryRedis
{
    /**
     * @param $categoryId
     * @param $postId
     */
    public static function setListPostsByCategoryId($categoryId, $postId)
    {
        $redis = RedisServer::getConnection();
        $redis->lPush(RedisEnum::GET_LIST_POSTS_CATEGORY . $categoryId, $postId);
    }

    /**
     * @param $categoryId
     */
    public static function setListPostsByCategory($categoryId)
    {
        $redis = RedisServer::getConnection();
        $sql = "SELECT `id`, `published_at` FROM `posts` WHERE `posts`.`category_id` = ? AND `posts`.`status` = ? ORDER BY id DESC";
        $result = DB::select($sql, [$categoryId, 'publish']);
        if (count($result) > 0) {
            $redis->del(RedisEnum::GET_LIST_POSTS_CATEGORY . $categoryId);
            foreach ($result as $row) {
                $redis->zAdd(RedisEnum::GET_LIST_POSTS_CATEGORY . $categoryId, strtotime($row->published_at), $row->id);
            }
        }
    }

    /**
     * @param $redis
     * @param $categoryId
     * @param $result
     */
    public static function setListPostsByAllCategory($redis, $categoryId, $result)
    {
        $redis->del(RedisEnum::GET_LIST_POSTS_CATEGORY . $categoryId);
        foreach ($result as $row) {
            $redis->zAdd(RedisEnum::GET_LIST_POSTS_CATEGORY . $categoryId, strtotime($row->published_at), $row->id);
        }
    }

    /**
     * @param $categoryId
     */
    public static function setListPostsHighlightByCategory($categoryId)
    {
        $redis = RedisServer::getConnection();
        $sql = "SELECT `posts`.`id` as `post_id`, `highlights`.`order` as `order_highlight`
                FROM `posts` 
                INNER JOIN `highlights` on `highlights`.`post_id` = `posts`.`id`
                WHERE `posts`.`category_id` = ? AND `posts`.`status` = ?
                ORDER BY `highlights`.`order` ASC";
        $result = DB::select($sql, [$categoryId, 'publish']);
        if (count($result) > 0) {
            $redis->del(RedisEnum::GET_LIST_POSTS_CATEGORY_HIGHLIGHT . $categoryId);
            foreach ($result as $row) {
                $redis->zAdd(RedisEnum::GET_LIST_POSTS_CATEGORY_HIGHLIGHT . $categoryId, (int)$row->order_highlight, $row->post_id);
            }
        }
    }

    /**
     * @param $name
     * @return int
     */
    public static function checkKey($name)
    {
        $redis = RedisServer::getConnection();
        return $redis->exists($name);
    }
}
