<?php

namespace App\Http\Controllers;

use App\Core\Business\ProductBusiness;
use App\Core\Business\TemplatesBusiness;
use App\Core\Enums\CommonEnum;
//use App\Core\Connection\RedisServer;

class HomepageController extends \App\Core\Controllers\Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('homepage.index');
    }
}
