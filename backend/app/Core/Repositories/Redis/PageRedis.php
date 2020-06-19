<?php

namespace App\Core\Repositories\Redis;

use App\Core\Connection\RedisServer;
use App\Core\Enums\RedisEnum;

class PageRedis
{
    /**
     * @param $key
     * @param $data
     */
    public static function setKey($pageSlug, $data)
    {
        $redis = RedisServer::getConnection();
        $redis->set(RedisEnum::GET_PAGE_DETAIL . $pageSlug, json_encode($data));
    }
}
