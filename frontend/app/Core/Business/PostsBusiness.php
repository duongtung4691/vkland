<?php

namespace App\Core\Business;

use App\Core\Connection\ElasticsearchServer;
use App\Core\Connection\RedisServer;
use App\Core\Enums\ElasticsearchEnum;
use App\Core\Enums\RedisEnum;
use App\Core\Repositories\Redis\PostsRedis;
use Illuminate\Support\Facades\Log;
use App\Core\Repositories\Mysql\PostsMysql;

class PostsBusiness
{
    /**
     * @param $listCategories
     */
    public static function setPostBasicDetail($listCategories)
    {
        $redis = RedisServer::getConnection(RedisEnum::REDIS_POST); // DB2
        foreach ($listCategories as $categoryId) {
            $result = PostsMysql::getPostBasicDetail($categoryId);
            foreach ($result as $post) {
                PostsRedis::setPostBasicDetail($redis, $post->id, $post);
            }
        }
    }

    /**
     * @param $listCategories
     */
    public static function setPostFullDetail($listCategories)
    {
        $redis = RedisServer::getConnection(RedisEnum::REDIS_POST); // DB2
        foreach ($listCategories as $categoryId) {
            $result = PostsMysql::getPostFullDetail($categoryId);
            foreach ($result as $post) {
                PostsRedis::setPostFullDetail($redis, $post->id, $post);
            }
        }
    }

    /**
     * @param $categoryId
     * @param $postId
     */
    public static function deletePostByCategory($categoryId, $postId)
    {
        try {
            // Xóa id bài viết trong list category redis
            $redis = RedisServer::getConnection();
            $redis->zRem(RedisEnum::GET_LIST_POSTS_CATEGORY . $categoryId, $postId);
            // Xóa index bài viết trong elasticsearch
            $client = ElasticsearchServer::getConnection();
            $params = [
                'index' => ElasticsearchEnum::GET_POSTS_INDEX,
                'id' => ElasticsearchEnum::_PREFIX_POST . $postId
            ];
            $client->delete($params);
        } catch (\Exception $exception) {
            Log::warning($exception->getMessage());
        }
    }
}
