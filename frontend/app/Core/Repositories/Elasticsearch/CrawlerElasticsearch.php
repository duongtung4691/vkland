<?php

namespace App\Core\Repositories\Elasticsearch;

use App\Core\Enums\ElasticsearchEnum;
use Illuminate\Support\Facades\Log;
use App\Core\Connection\ElasticsearchServer;

class CrawlerElasticsearch
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
                'index' => ElasticsearchEnum::GET_POSTS_CRAWLER_INDEX,
                'id' => ElasticsearchEnum::_PREFIX_POST_CRAWLER . $id
            ];
            $client->delete($params);
        } catch (\Exception $exception) {
            Log::warning($exception->getMessage());
        }

        // Index a document
        $params = [
            'index' => ElasticsearchEnum::GET_POSTS_CRAWLER_INDEX,
            'id' => ElasticsearchEnum::_PREFIX_POST_CRAWLER . $id,
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
        $client = ElasticsearchServer::getConnection();
        $params = [
            'index' => ElasticsearchEnum::GET_POSTS_CRAWLER_INDEX,
            'id' => ElasticsearchEnum::_PREFIX_POST_CRAWLER . $id
        ];
        $response = $client->get($params);
        echo '<pre/>';
        print_r($response);
    }

    /**
     * @param $data
     * @return mixed
     */
    public static function search($data)
    {
        $client = ElasticsearchServer::getConnection();
        $params = [
            'index' => ElasticsearchEnum::GET_POSTS_CRAWLER_INDEX,
            'body' => [
                'query' => [
                    'bool' => [
                        'must' => [
                            'match' => ['title' => $data['title']]
                        ],
                        'should' => [
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
