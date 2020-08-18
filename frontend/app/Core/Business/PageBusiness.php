<?php

namespace App\Core\Business;

use App\Core\Repositories\Mysql\PageMysql;
use App\Core\Models\Page;
use Illuminate\Support\Facades\Log;

class PageBusiness extends Page
{
    /**
     * @param $id
     * @return mixed
     */
    public static function getPageBySlug($slug)
    {
        $resultDB = array();
        try {
            $resultDB = PageMysql::getPageBySlug($slug);
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
        }
        return $resultDB;
    }
}
