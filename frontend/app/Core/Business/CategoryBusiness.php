<?php

namespace App\Core\Business;

use App\Core\Models\Category;

class CategoryBusiness extends Category
{
    /**
     * @param $slug
     * @return mixed
     */
    public static function getCategoryBySlug($slug) {
        return Category::where('slug', $slug)->first();
    }

    /**
     * @param $id
     * @return mixed
     */
    public static function getCategoryById($id) {
        return Category::where('id', $id)->first();
    }

    /**
     * @param $id
     * @return mixed
     */
    public static function getChildCategoryById($id) {
        return Category::where('parent_id', $id)->get();
    }
}
