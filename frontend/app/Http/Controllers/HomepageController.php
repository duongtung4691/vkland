<?php

namespace App\Http\Controllers;

use App\Core\Business\TemplatesBusiness;
use App\Core\Enums\CommonEnum;

class HomepageController extends \App\Core\Controllers\Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dataSeo = TemplatesBusiness::getAllContent(CommonEnum::HOME_SECTION_SEO);
        $dataSeo = json_decode($dataSeo[0]->data_template, true)[0];
        $metaData['meta_title'] = isset($dataSeo['post_title']) ? $dataSeo['post_title'] : config()->get('constants.SITE_NAME');
        $metaData['meta_description'] = isset($dataSeo['post_excerpt']) ? $dataSeo['post_excerpt'] : '';
        $metaData['meta_image'] = isset($dataSeo['post_image']) ? $dataSeo['post_image'] : '';
        return view('homepage.index', compact('metaData'));
    }
}
