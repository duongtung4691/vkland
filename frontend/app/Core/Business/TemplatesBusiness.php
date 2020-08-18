<?php

namespace App\Core\Business;

use App\Core\Models\Templates;
use Illuminate\Support\Facades\DB;
use App\Core\Enums\CommonEnum;

class TemplatesBusiness extends Templates
{
    public static function getAllContent($key)
    {
        $result = DB::table('templates')->where('key', $key)->get();
        return $result;
    }
}
