<?php
// file: app/config/constants.php
use App\Core\Enums\CommonEnum;
use App\Core\Enums\ImageSizeEnum;
use App\Core\Enums\RedisEnum;
use App\Core\Enums\ValidateEnum;

return [
    'FRONTEND_URL' => env('FRONTEND_URL', ''),
    'BACKEND_URL' => env('BACKEND_URL', ''),
    'FRONTEND_API' => 'https://103.216.112.45:8085',
    'STATIC_IMAGES' => env('STATIC_IMAGES', ''),
    'PATH_UPLOAD' => '/var/www/html/uploads',
    'FOLDER_UPLOAD' => '/uploads/index.php?folder=',
    'SSH2' => array(
        'HOSTNAME' => '',
        'URL' => '',
        'PORT' => 22,
        'USERNAME' => '',
        'PASSWORD' => ''
    ),
    'REDIS_HOST' => env('REDIS_HOST', ''),
    'REDIS_PASSWORD' => env('REDIS_PASSWORD', ''),
    'REDIS_PORT' => env('REDIS_PORT', 5379),
    'REDIS_DB' => env('REDIS_DB', RedisEnum::REDIS_DB),
    'REDIS_HTML' => env('REDIS_HTML', RedisEnum::REDIS_HTML),
    'ELASTICSEARCH_HOST' => env('ELASTICSEARCH_HOST', ''),
    'ELASTICSEARCH_PORT' => env('ELASTICSEARCH_PORT', '9200'),
    'ELASTICSEARCH_USER' => env('ELASTICSEARCH_USER', ''),
    'ELASTICSEARCH_PASS' => env('ELASTICSEARCH_PASS', ''),
    'LIMIT_DATA_PAGINATE' => CommonEnum::LIMIT_DATA_PAGINATE,
    'LIMIT_WORD_COUNT_EXCERPT' => 40,
    'PRODUCT_GET_ALL_CATES' => '/api/FcProduct/GetCategories',
    'PRODUCT_GET_ALL_DETAILS' => '/api/CacheProduct/GetAllProductDetails',
    'PRODUCT_GET_DETAIL' => '/api/FcProduct/GetProductDetail?productid=',
    'PRODUCT_GET_META_DATA' => '/api/FcProduct/GetProductByName',
    'PRODUCT_UPDATE_META_DATA' => '/api/FcProduct/UpdateProductMetaData',
    'PRODUCT_IMAGES' => '',
    'IMAGE_SIZE_SMALL' =>  'small',
    'IMAGE_SIZE_MEDIUM' =>  'medium',
    'IMAGE_SIZE_BIG' =>  'big',
    'API_FC_ORDER' => env('API_FC_ORDER', ''), // api get location
    'API_FC_PRODUCT' => env('API_FC_PRODUCT', ''), // api get categories
    'CURLOPT_TIMEOUT' => 10,
    // Define array DNS
    'PROTOCOL' => 'https://',
    'LIST_DNS' => [''],
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
    'CATEGORY_ID_TINTHITRUONG' => CommonEnum::CATEGORY_ID_TINTHITRUONG,
    'CATEGORY_ID_SUKIENNONG' => CommonEnum::CATEGORY_ID_SUKIENNONG,
    'CATEGORY_TYPE_SALE_HIGHLIGHT' => CommonEnum::CATEGORY_TYPE_SALE_HIGHLIGHT,
    'CATEGORY_TYPE_SALE_OTHER' => CommonEnum::CATEGORY_TYPE_SALE_OTHER,
    'CATEGORY_TYPE_SALE_OPEN' => CommonEnum::CATEGORY_TYPE_SALE_OPEN,
    'FOLDER_PUBLIC' => env('FOLDER_PUBLIC', 'public')
];
