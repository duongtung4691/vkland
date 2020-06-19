<?php

namespace App\Core\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
class ApiEnum extends Enum
{
    const MYACCOUNT_GET_PROVINCES = '/api/FCOrder/GetProvinces';
    const MYACCOUNT_GET_DISTRICTS = '/api/FCOrder/GetDistrictsByProvinceId?provinceId=';
    const MYACCOUNT_GET_SUB_DISTRICTS = '/api/FCOrder/GetSubDistrictsByDistrictId?districtId=';

    /* api product  */
    const PRODUCT_GET_ALL_CATES = '/api/FcProduct/GetCategories';
    const PRODUCT_GET_CATEGORY_DETAIL = '/api/FcProduct/GetCategoryDetail?categoryId=';
    const CUSTOMER_CREATE_NEW_ORDER = '/api/FCOrder/CreateNewOrder';

    /* api bên báo kinh tế môi trường cung cấp */
    const DATA_NEWS_KINHTEMOITRUONG = 'https://kinhtemoitruong.vn/apiservice@/mastercms_api_shared&p=d41d8cd98f00b204e9800998ecf8427e&page=';
}
