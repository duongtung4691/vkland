<?php

namespace App\Core\Repositories\Redis;

use App\Core\Connection\RedisServer;
use App\Core\Enums\RedisEnum;
use App\Core\Utilities\GenerateUtility;

class QuestionRedis
{
    /**
     * @param $questionId
     * @param $data
     */
    public static function setKey($questionId, $data)
    {
        $redis = RedisServer::getConnection();
        $redis->set(RedisEnum::GET_QUESTION_DETAIL . $questionId, json_encode($data));
    }

    /**
     * @param $redis
     * @param $categoryId
     * @param $result
     */
    public static function setListQuestionsByAllCategory($redis, $categoryId, $result)
    {
        $redis->del(RedisEnum::GET_LIST_QUESTIONS_CATEGORY . $categoryId);
        foreach ($result as $row) {
            $redis->zAdd(RedisEnum::GET_LIST_QUESTIONS_CATEGORY . $categoryId, strtotime($row->published_at), $row->id);
        }
    }

    /**
     * @param $redis
     * @param $questionId
     * @param $dataQuestion
     */
    public static function setQuestionDetail($redis, $questionId, $dataQuestion)
    {
        $dataQuestion = GenerateUtility::objectToArray($dataQuestion);
        $redis->set(RedisEnum::GET_QUESTION_DETAIL . $questionId, json_encode($dataQuestion));
    }
}
