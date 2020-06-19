<?php
namespace App\Core\Services;

use App\Core\Enums\ApiEnum;
use Ixudra\Curl\Facades\Curl;

class LocationService
{
    /**
     * Get các thông tin lấy từ api bên product trả về
     */

    /**
     * @return bool|mixed|string
     */
    public static function get_list_provinces()
    {
        try {
            $url = config()->get('constants.API_FC_ORDER') . ApiEnum::MYACCOUNT_GET_PROVINCES;
            $dataP = Curl::to($url)->get();
            $dataP = json_decode($dataP, true);
            return $dataP;
        } catch (\Exception  $e) {
            return $e->getMessage();
        }
    }

    /**
     * @param $id
     * @return bool|mixed|string
     */
    public static function get_list_district($id)
    {
        try {
            $url = config()->get('constants.API_FC_ORDER') . ApiEnum::MYACCOUNT_GET_DISTRICTS . $id;
            $dataP = Curl::to($url)->get();
            $dataP = json_decode($dataP, true);
            return $dataP;
        } catch (\Exception  $e) {
            return $e->getMessage();
        }
    }

    /**
     * @param $id
     * @return bool|mixed|string
     */
    public static function get_list_sub_district($id)
    {
        try {
            $url = config()->get('constants.API_FC_ORDER') . ApiEnum::MYACCOUNT_GET_SUB_DISTRICTS . $id;
            $dataP = Curl::to($url)->get();
            $dataP = json_decode($dataP, true);
            return $dataP;
        } catch (\Exception  $e) {
            return $e->getMessage();
        }
    }
}
