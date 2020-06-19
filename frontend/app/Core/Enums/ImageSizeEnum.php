<?php

namespace App\Core\Enums;

use BenSampo\Enum\Enum;

/**
 * Class ImageSizeEnum
 * @package App\Core\Enums
 */
class ImageSizeEnum extends Enum
{
    /* Size image posts */
    const LABEL_SIZE_THUMBNAIL = 'kích thước 400 x 250px';
    const LABEL_SIZE_TOP_BACKGROUND = 'kích thước khoảng 1440 x 400px';
    const LABEL_SIZE_BANNER_TOP_HOMEPAGE = '(kích thước 880 x 600px)';
    const LABEL_SIZE_BANNER_LEFT_HOMEPAGE = '(kích thước 180 × 190px)';
    const LABEL_SIZE_THUMBNAIL_STBH = '(kích thước 350 x 200px)';
    const LABEL_SIZE_THUMBNAIL_5NN = '(kích thước khoảng 50 x 50px)';
    const LABEL_SIZE_BANNER_PRODUCT = '(kích thước khoảng 1440 x 295px)';
}
