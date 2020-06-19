<?php

namespace App\Core\Repositories\Redis;

use App\Core\Connection\RedisServer;
use App\Core\Enums\RedisEnum;
use App\Core\Utilities\GenerateUtility;

class PostsRedis
{
    /**
     * @param $post
     * @param $data
     */
    public static function setKey($post, $data)
    {
        $redis = RedisServer::getConnection(RedisEnum::REDIS_POST);
        $dataP = $post->toArray();
        $data = str_replace(array('[', ']', '"'), array('', '', ''), $data);
        $dataP['tag_name'] = $data;
        $redis->set(RedisEnum::GET_POST_DETAIL . $post->id, json_encode($dataP));
    }

    /**
     * @param $redis
     * @param $postId
     * @param $dataPost
     */
    public static function setPostBasicDetail($redis, $postId, $dataPost)
    {
        $dataPost = GenerateUtility::objectToArray($dataPost);
        $redis->set(RedisEnum::GET_POST_DETAIL_BASIC . $postId, json_encode($dataPost));
    }

    /**
     * @param $redis
     * @param $postId
     * @param $dataPost
     */
    public static function setPostFullDetail($redis, $postId, $dataPost)
    {
        $dataPost = GenerateUtility::objectToArray($dataPost);
        $redis->set(RedisEnum::GET_POST_DETAIL . $postId, json_encode($dataPost));
    }
}
