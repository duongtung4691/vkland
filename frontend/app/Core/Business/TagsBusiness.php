<?php

namespace App\Core\Business;

use App\Core\Models\Tags;
use Illuminate\Support\Facades\DB;

class TagsBusiness extends Tags
{

    /**
     * @param $postId
     * @return array
     */
    public function getListTagBayPostId($postId) {
        $result = DB::table('tags')
            ->select('tags.name', 'tags.slug', 'tags.id')
            ->join('post_has_tags', 'tags.id', '=', 'post_has_tags.tag_id')
            ->where('post_has_tags.post_id', '=', $postId)
            ->limit(4)
            ->get();

        return $result;
    }

    public function getTagBySlug($slug) {
        $result = DB::table('tags')
            ->where('slug', '=', $slug)
            ->first();

        return $result;
    }
}
