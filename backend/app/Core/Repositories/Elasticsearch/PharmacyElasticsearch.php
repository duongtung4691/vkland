<?php

namespace App\Core\Repositories\Elasticsearch;

use App\Core\Enums\ElasticsearchEnum;
use Illuminate\Support\Facades\Log;
use App\Core\Connection\ElasticsearchServer;

class PharmacyElasticsearch
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
                'index' => ElasticsearchEnum::GET_PHARMACY_INDEX,
                'id' => ElasticsearchEnum::_PREFIX_PHARMACY . $id
            ];
            $client->delete($params);
        } catch (\Exception $exception) {
            Log::warning($exception->getMessage());
        }

        // Index a document
        $params = [
            'index' => ElasticsearchEnum::GET_PHARMACY_INDEX,
            'id' => ElasticsearchEnum::_PREFIX_PHARMACY . $id,
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
                'index' => ElasticsearchEnum::GET_PHARMACY_INDEX,
                'id' => ElasticsearchEnum::_PREFIX_PHARMACY . $id
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
            'index' => ElasticsearchEnum::GET_PHARMACY_INDEX,
            'body' => [
                'query' => [
                    'bool' => [
                        'must' => [
                            'match' => ['address' => $data['address']]
                        ],
                        'should' => [
                            ['match' => ['province_id' => isset($data['province_id']) ? $data['province_id'] : null]]
                        ]
                    ]
                ]
            ]
        ];
        $response = $client->search($params);
        return $response['hits']['hits'];
    }

    /**
     * @param $id
     * @param $data
     */
    public static function updateIndex($id, $data)
    {
        $client = ElasticsearchServer::getConnection();
        $params = [
            'index' => ElasticsearchEnum::GET_PHARMACY_INDEX,
            'id' => ElasticsearchEnum::_PREFIX_PHARMACY . $id,
            'body' => [
                'doc' => $data
            ]
        ];
        $response = $client->update($params);
        echo '<pre/>';
        print_r($response);
    }

    /**
     * @param $id
     */
    public static function deleteIndex($id)
    {
        $client = ElasticsearchServer::getConnection();
        $params = [
            'index' => ElasticsearchEnum::GET_PHARMACY_INDEX,
            'id' => ElasticsearchEnum::_PREFIX_PHARMACY . $id
        ];
        $response = $client->delete($params);
        echo '<pre/>';
        print_r($response);
    }
}
