<?php
// file: app/config/constants.php
use App\Core\Enums\CommonEnum;
use App\Core\Enums\ImageSizeEnum;
use App\Core\Enums\RedisEnum;
use App\Core\Enums\ValidateEnum;

return [
    'FRONTEND_URL' => env('FRONTEND_URL', ''),
    'FRONTEND_API' => 'https://103.216.112.45:8085',
    'STATIC_IMAGES' => env('STATIC_IMAGES', 'https://192.168.100.27/upload'),
    'PATH_UPLOAD' => '/var/www/html/uploads',
    'FOLDER_UPLOAD' => '/uploads/index.php?folder=',
    'SSH2' => array(
        'HOSTNAME' => '192.168.100.27',
        'URL' => 'https://test-media.code.net.vn:8080',
        'PORT' => 22,
        'USERNAME' => 'nhatnhat',
        'PASSWORD' => 'Nhatnhat@123'
    ),
    'REDIS_HOST' => env('REDIS_HOST', '192.168.100.27'),
    'REDIS_PASSWORD' => env('REDIS_PASSWORD', 'Nhatnhat@123'),
    'REDIS_PORT' => env('REDIS_PORT', 5379),
    'REDIS_DB' => env('REDIS_DB', RedisEnum::REDIS_DB),
    'REDIS_HTML' => env('REDIS_HTML', RedisEnum::REDIS_HTML),
    'ELASTICSEARCH_HOST' => env('ELASTICSEARCH_HOST', '192.168.100.42'),
    'ELASTICSEARCH_PORT' => env('ELASTICSEARCH_PORT', '9200'),
    'ELASTICSEARCH_USER' => env('ELASTICSEARCH_USER', 'elastic'),
    'ELASTICSEARCH_PASS' => env('ELASTICSEARCH_PASS', 'Nhatnhat@123'),
    'LIMIT_DATA_PAGINATE' => CommonEnum::LIMIT_DATA_PAGINATE,
    'LIMIT_WORD_COUNT_EXCERPT' => 40,
    'PRODUCT_GET_ALL_CATES' => '/api/FcProduct/GetCategories',
    'PRODUCT_GET_ALL_DETAILS' => '/api/CacheProduct/GetAllProductDetails',
    'PRODUCT_GET_DETAIL' => '/api/FcProduct/GetProductDetail?productid=',
    'PRODUCT_GET_META_DATA' => '/api/FcProduct/GetProductByName',
    'PRODUCT_UPDATE_META_DATA' => '/api/FcProduct/UpdateProductMetaData',
    'PRODUCT_IMAGES' => 'http://192.168.100.29:8080/img/',
    'IMAGE_SIZE_SMALL' =>  'small',
    'IMAGE_SIZE_MEDIUM' =>  'medium',
    'IMAGE_SIZE_BIG' =>  'big',
    'API_FC_ORDER' => env('API_FC_ORDER', 'http://192.168.100.27:5602'), // api get location
    'API_FC_PRODUCT' => env('API_FC_PRODUCT', 'http://192.168.100.27:5603'), // api get categories
    'CURLOPT_TIMEOUT' => 10,
    // Define array DNS
    'PROTOCOL' => 'https://',
    'LIST_DNS' => ['code.net:81', 'test-customer.code.net.vn:8080', 'staging-customer.code.net.vn:8080'],
    // Define role
    'GROUP_ALL' => 'super.admin|admin|manager.content|editor.content',
    'GROUP_ADMIN' => 'super.admin|admin',
    'GROUP_PUBLISH_CONTENT' => 'super.admin|admin|manager.content',
    'GROUP_CONTENT' => 'manager.content|editor.content',
    // Define validate
    'MAX_LENGTH_20' => ValidateEnum::MAX_LENGTH_20,
    'MAX_LENGTH_50' => ValidateEnum::MAX_LENGTH_50,
    'DATA_DATE_FORMAT' => 'DD-MM-YYYY HH:mm:ss',
    'DATE_MYSQL_FORMAT' => 'd-m-Y H:i:s',
    'LABEL_SIZE_THUMBNAIL' => ImageSizeEnum::LABEL_SIZE_THUMBNAIL,
    'LABEL_SIZE_TOP_BACKGROUND' => ImageSizeEnum::LABEL_SIZE_TOP_BACKGROUND,
    'LABEL_SIZE_BANNER_TOP_HOMEPAGE' => ImageSizeEnum::LABEL_SIZE_BANNER_TOP_HOMEPAGE,
    'LABEL_SIZE_BANNER_LEFT_HOMEPAGE' => ImageSizeEnum::LABEL_SIZE_BANNER_LEFT_HOMEPAGE,
    'LABEL_SIZE_THUMBNAIL_STBH' => ImageSizeEnum::LABEL_SIZE_THUMBNAIL_STBH,
    'LABEL_SIZE_THUMBNAIL_5NN' => ImageSizeEnum::LABEL_SIZE_THUMBNAIL_5NN,
    'LABEL_SIZE_BANNER_PRODUCT' => ImageSizeEnum::LABEL_SIZE_BANNER_PRODUCT,
    'FOLDER_PUBLIC' => env('FOLDER_PUBLIC', 'public')
];
