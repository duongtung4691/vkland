<?php

namespace App\Core\Connection;

use App\Core\Enums\RedisEnum;
use Redis;
use Illuminate\Support\Facades\Log;

class RedisServer
{
    /**
     * @return Redis
     */
    public static function getConnection($db = RedisEnum::REDIS_DB)
    {
        $redis = new Redis();
        $redis->connect(config()->get('constants.REDIS_HOST'), config()->get('constants.REDIS_PORT'), 1);
        $redis->auth(config()->get('constants.REDIS_PASSWORD'));
        $redis->select($db);
        return $redis;
    }

    /**
     * @param $key
     * @return mixed|string
     */
    public static function getKey($key)
    {
        try {
            $redis = RedisServer::getConnection();
            $result_item = $redis->get($key);
            return json_decode($result_item, true);
        } catch (\Exception  $e) {
            Log::error('Không lấy được dữ liệu từ Redis: ' . $e->getMessage()); // Log lỗi vào file
            return 'Không lấy được dữ liệu từ Redis: ' . $e->getMessage(); // return lỗi
        }
    }

    /**
     * @param $key
     * @param $data
     */
    public static function setKey($key, $data)
    {
        $redis = RedisServer::getConnection();
        $redis->set($key, $data);
    }

    /**
     * @param $keys = array(key1, key2, key3, ...)
     * @return array|string
     */
    public static function mget($keys)
    {
        try {
            $redis = RedisServer::getConnection();
            $result_item = $redis->mget($keys);
            if (!empty($result_item)) {
                foreach ($result_item as $k => $v) {
                    $result_item[$k] = json_decode($v, true);
                }
            }
            return $result_item;
        } catch (\Exception  $e) {
            Log::error('Không lấy được dữ liệu từ Redis: ' . $e->getMessage());
            return 'Không lấy được dữ liệu từ Redis: ' . $e->getMessage();
        }
    }

    /**
     * Code demo (maybe delete)
     * @param $key
     * @param $data
     * @param int $limit
     */
    public static function setListKey($key, $data, $limit = -1)
    {
        $redis = RedisServer::getConnection();
        // delete the key
        $redis->del($key);
        // store data in redis list
        foreach ($data as $item) {
            $redis->lpush($key, $item);
        }
        // get the stored data and print id
        $arrList = $redis->lrange($key, 0, $limit);
    }
}
