<?php

namespace App\Core\Repositories\Elasticsearch;

use App\Core\Enums\ElasticsearchEnum;
use Illuminate\Support\Facades\Log;
use App\Core\Connection\ElasticsearchServer;

class PostsElasticsearch
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
                'index' => ElasticsearchEnum::GET_POSTS_INDEX,
                'id' => ElasticsearchEnum::_PREFIX_POST . $id
            ];
            $client->delete($params);
        } catch (\Exception $exception) {
            Log::warning($exception->getMessage());
        }

        // Index a document
        $params = [
            'index' => ElasticsearchEnum::GET_POSTS_INDEX,
            'id' => ElasticsearchEnum::_PREFIX_POST . $id,
            'body' => $data
        ];
        $response = $client->index($params);
        return $response;
    }

    /**
     * @param $id
     */
    public static function getIndex($id)
    {
        $response = array();
        try {
            $client = ElasticsearchServer::getConnection();
            $params = [
                'index' => ElasticsearchEnum::GET_POSTS_INDEX,
                'id' => ElasticsearchEnum::_PREFIX_POST . $id
            ];
            $response = $client->get($params);
        } catch (\Exception $exception) {
            Log::warning($exception->getMessage());
        }
        return $response;
    }

    /**
     * @param $data
     * @return mixed
     */
    public static function search($data)
    {
        $client = ElasticsearchServer::getConnection();
        $params = [
            'index' => ElasticsearchEnum::GET_POSTS_INDEX,
            'body' => [
                'query' => [
                    'bool' => [
                        'must' => [
                            'match' => ['title' => $data['title']]
                        ],
                        'should' => [
                            ['match' => ['category_id' => isset($data['category_id']) ? $data['category_id'] : '']],
                            ['match' => ['tags' => isset($data['tags']) ? $data['tags'] : '']],
                            ['match' => ['author' => isset($data['author']) ? $data['author'] : '']]
                        ]
                    ]
                ]
            ]
        ];
        $response = $client->search($params);
        return $response['hits']['hits'];
    }
}
