<?php

namespace App\Http\Controllers;

use App\Core\Business\CategoryBusiness;
use App\Core\Business\PostsBusiness;
use App\Core\Business\TagsBusiness;
use App\Core\Enums\CommonEnum;

class DetailController extends \App\Core\Controllers\Controller
{
    /**
     * Display a listing of the detail.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($slugFolder, $slugDetail)
    {
        $slugDetail = explode('-', $slugDetail);
        $post_id = end($slugDetail);

        $postsBusiness = new PostsBusiness();
        $post = $postsBusiness->getPostsById($post_id);

        if ($post) {
            $metaData['meta_title'] = $post->meta_title;
            $metaData['meta_keyword'] = $post->meta_keyword;
            $metaData['meta_description'] = $post->meta_description;
            $metaData['meta_image'] = config()->get('constants.STATIC_IMAGES') . $post->thumbnail_url;

            $categoryBusiness = new CategoryBusiness();
            $category = $categoryBusiness->getCategoryById($post->category_id);

            $tagsBusiness = new TagsBusiness();
            $tagPost = $tagsBusiness->getListTagBayPostId($post_id);

            return view('detail.text', compact('category', 'post', 'tagPost', 'metaData'));
        } else {
            return  view(CommonEnum::FOLDER_ERROR . '404');
        }
    }
}
