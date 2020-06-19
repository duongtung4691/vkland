<?php

namespace App\Core\Business;

use App\Core\Enums\RedisEnum;
use App\Core\Repositories\Mysql\QuestionMysql;
use App\Core\Repositories\Redis\QuestionRedis;
use App\Core\Connection\RedisServer;

class QuestionBusiness
{
    /**
     * @param $listCategories
     */
    public static function setListQuestionsByAllCategory($listCategories)
    {
        $redis = RedisServer::getConnection();
        foreach ($listCategories as $categoryId) {
            $result = QuestionMysql::getListQuestionsByAllCategory($categoryId);
            QuestionRedis::setListQuestionsByAllCategory($redis, $categoryId, $result);
        }
    }

    /**
     * @param $listCategories
     */
    public static function setQuestionDetail($listCategories)
    {
        $redis = RedisServer::getConnection(RedisEnum::REDIS_QUESTION);
        foreach ($listCategories as $categoryId) {
            $result = QuestionMysql::getQuestionDetail($categoryId);
            foreach ($result as $question) {
                QuestionRedis::setQuestionDetail($redis, $question->id, $question);
            }
        }
    }
}
