<?php

namespace App\Core\Repositories\Redis;

use App\Core\Connection\RedisServer;
use App\Core\Enums\RedisEnum;

class AnswerRedis
{
    /**
     * @param $key
     * @param $data
     */
    public static function setKey($answerId, $data)
    {
        $redis = RedisServer::getConnection();
        $redis->set(RedisEnum::GET_ANSWER_DETAIL . $answerId, json_encode($data));
    }
}
