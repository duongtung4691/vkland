<?php

namespace App\Core\Connection;

class ElasticsearchServer
{
    public static function getConnection()
    {
        $hosts = [
            [
                'host' => config()->get('constants.ELASTICSEARCH_HOST'),
                'port' => config()->get('constants.ELASTICSEARCH_PORT'),
                'user' => config()->get('constants.ELASTICSEARCH_USER'),
                'pass' => config()->get('constants.ELASTICSEARCH_PASS')
            ]
        ];
        $client = \Elasticsearch\ClientBuilder::create()->setHosts($hosts)->build();
        return $client;
    }
}
