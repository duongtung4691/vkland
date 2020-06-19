<?php

namespace App\Core\Repositories\Redis;

use App\Core\Connection\RedisServer;
use App\Core\Enums\RedisEnum;

class CommonRedis
{
    /**
     * @param $name
     * @param int $db
     * @return int
     */
    public static function checkKey($name, $db = RedisEnum::REDIS_DB)
    {
        $redis = RedisServer::getConnection($db);
        return $redis->exists($name);
    }

    /**
     * @param $key
     * @param $value
     * @return false|int|string
     */
    public static function searchItem($key, $value)
    {
        $redis = RedisServer::getConnection();
        // Finding the position of an element in a simple array
        return array_search($value, $redis->zRevRange($key, 0, -1));
    }
}
