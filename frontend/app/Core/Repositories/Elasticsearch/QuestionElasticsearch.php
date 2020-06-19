<?php

namespace App\Core\Repositories\Elasticsearch;

use App\Core\Enums\ElasticsearchEnum;
use Illuminate\Support\Facades\Log;
use App\Core\Connection\ElasticsearchServer;

class QuestionElasticsearch
{
    /**
     * @param $id
     * @param $data
     * @return array
     */
    public static function postIndex($id, $data)
    {
        $client = ElasticsearchServer::getConnection();

        // Delete a document
        try {
            $params = [
                'index' => ElasticsearchEnum::GET_QUESTION_INDEX,
                'id' => ElasticsearchEnum::_PREFIX_QUESTION . $id
            ];
            $client->delete($params);
        } catch (\Exception $exception) {
            Log::warning($exception->getMessage());
        }

        // Index a document
        $params = [
            'index' => ElasticsearchEnum::GET_QUESTION_INDEX,
            'id' => ElasticsearchEnum::_PREFIX_QUESTION . $id,
            'body' => $data
        ];
        $response = $client->index($params);
        return $response;
    }

    /**
     * @param $id
     * @return array
     */
    public static function getIndex($id)
    {
        $response = array();
        try {
            $client = ElasticsearchServer::getConnection();
            $params = [
                'index' => ElasticsearchEnum::GET_QUESTION_INDEX,
                'id' => ElasticsearchEnum::_PREFIX_QUESTION . $id
            ];
            $response = $client->get($params);
        } catch (\Exception $exception) {
            Log::warning($exception->getMessage());
        }
        return $response;
    }
}
