<?php

namespace App\Core\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
class CommonEnum extends Enum
{
    const PATH_UPLOAD = '/var/www/html/uploads/';
    const FOLDER_UPLOAD = '/uploads/index.php?folder=';
    const IMAGE_NOT_FOUND = '/images/graphics/imagenotfound.jpg';
    const DIC_ATTACH_FILE = 'images/fileattach/';

    const IMAGE_SIZE_SMALL = 'small';
    const IMAGE_SIZE_MEDIUM = 'medium';
    const IMAGE_SIZE_BIG = 'big';
    const IMAGE_SIZE_LARGE = 'large';
    const IMAGE_SIZE_XLARGE = 'xlarge';
    const LIMIT_DATA_PAGINATE = 10;
    const LIMIT_NEWS_PAGINATE = 9;
    const LIMIT_RELATED_NEWS = 3;

    const SORT_BY_NEW = 'moi-nhat';
    const SORT_BY_HIGHLIGHT = 'noi-bat';

    const HOME_BANNER_TOP = 'banner_top';
    const HOME_BANNER_LEFT = 'banner_left';
    const HOME_SECTION_HD = 'section_hd';
    const HOME_SECTION_TTNB = 'section_ttnb';
    const HOME_SECTION_HDCG = 'section_hdcg';
    const HOME_SECTION_STB = 'section_stb';
    const HOME_SECTION_NN = 'section_nn';
    const HOME_SECTION_SEO = 'section_seo';

    const SET_LOGIN_TIMEOUT = 500;
    const SET_REGISTER_TIMEOUT = 5000;
    const SET_RESET_TIMEOUT = 2000;
    const SEARCH_OPTION_ALL = 'tat-ca';
    const SEARCH_OPTION_SANPHAM = 'san-pham';
    const SEARCH_OPTION_HOIDAPCHUYENGIA = 'hoi-dap-chuyen-gia';
    const SEARCH_OPTION_SUCKHOE = 'suc-khoe';

    const CATEGORY_ID_BAN_BDS = 1;
    const CATEGORY_ID_CHOTHUE_BDS = 8;
    const CATEGORY_ID_DAOTAO_BDS = 16;
    const CATEGORY_ID_TRUYENTHONG_BDS = 18;

    const ELASTIC_POSTS_INDEX = 'posts_index';
    const ELASTICPOSTS_TYPE = '_doc';
    const ELASTIC_PRODUCT_INDEX = 'product_index';

    const FOLDER_ERROR = 'v2.errors.';
    const COOKIE_FACEBOOK_ID = 'facebook_id';
}
