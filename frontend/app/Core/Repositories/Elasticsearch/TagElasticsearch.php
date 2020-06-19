<?php

namespace App\Core\Repositories\Elasticsearch;

use App\Core\Enums\ElasticsearchEnum;
use Illuminate\Support\Facades\Log;
use App\Core\Connection\ElasticsearchServer;

class TagElasticsearch
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
                'index' => ElasticsearchEnum::GET_TAG_INDEX,
                'id' => ElasticsearchEnum::_PREFIX_TAG . $id
            ];
            $client->delete($params);
        } catch (\Exception $exception) {
            Log::warning($exception->getMessage());
        }

        // Index a document
        $params = [
            'index' => ElasticsearchEnum::GET_TAG_INDEX,
            'id' => ElasticsearchEnum::_PREFIX_TAG . $id,
            'body' => $data
        ];
        $response = $client->index($params);
        return $response;
    }

    /**
     * @param $id
     */
    public static function deleteIndex($id)
    {
        $client = ElasticsearchServer::getConnection();
        $params = [
            'index' => ElasticsearchEnum::GET_TAG_INDEX,
            'id' => ElasticsearchEnum::_PREFIX_TAG . $id
        ];
        $response = $client->delete($params);
        return $response;
    }
}
