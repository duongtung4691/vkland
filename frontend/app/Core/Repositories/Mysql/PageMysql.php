<?php
namespace App\Core\Repositories\Mysql;

use App\Core\Models\Page;

class PageMysql
{
    /**
     * @param $id
     * @return mixed
     */
    public static function getPageBySlug($slug)
    {
        $resultMysql = Page::where('slug', $slug)->first();
        return $resultMysql;
    }
}
