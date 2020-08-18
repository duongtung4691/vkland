<?php

namespace App\Http\Controllers;

use App\Core\Business\PageBusiness;

class LandingpageController extends \App\Core\Controllers\Controller
{
    /**
     * Show the form for updateting about company
     */
    public function chungchimoigioibatdongsan()
    {
        $landingpage = PageBusiness::getPageBySlug('chung-chi-moi-gioi-bat-dong-san');
        $metaData['meta_title'] = $landingpage->meta_title;
        $metaData['meta_keyword'] = $landingpage->meta_keyword;
        $metaData['meta_description'] = $landingpage->meta_description;
        $metaData['meta_image'] = config()->get('constants.STATIC_IMAGES') . $landingpage->thumbnail_url;
        return view('landingpage.chungchimoigioibatdongsan', compact('landingpage', 'metaData'));
    }
}
