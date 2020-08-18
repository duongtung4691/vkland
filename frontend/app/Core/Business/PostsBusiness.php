<?php

namespace App\Core\Business;

use App\Core\Models\Posts;
use App\Core\Enums\CommonEnum;
use App\Core\Repositories\Mysql\PostsMysql;
use App\Core\Utilities\HtmlFormatUtility;
use Illuminate\Support\Facades\DB;
use Exception;
use Illuminate\Support\Facades\Log;
use App\Core\Connection\RedisServer;
use App\Core\Enums\RedisEnum;

class PostsBusiness extends Posts
{
    /**
     * @param $id
     * @return mixed
     */
    public function getPostsById($id)
    {
        try {
            $resultCache = $resultDB = PostsMysql::getPostsById($id);
        } catch (\Exception $exception) {
            $resultCache = $resultDB = PostsMysql::getPostsById($id);
            Log::error($exception->getMessage());
        }
        return $resultCache;
    }

    /**
     * @param $categoryId
     * @param $diseaseId
     * @param int $perPage
     * @param string $sortedBy
     * @param string $orderType
     * @return mixed
     */
    public function getListPostByCategoryIdAndDiseaseId($categoryId, $diseaseId, $params = array())
    {
        $perPage = isset($params['per_page']) ? $params['per_page'] : CommonEnum::LIMIT_DATA_PAGINATE;
        $offset = isset($params['offset']) ? $params['offset'] : 0;
        $sortBy = isset($params['sort_by']) ? $params['sort_by'] : 'moi-nhat';
        $orderBy = isset($params['order_by']) ? $params['order_by'] : 'is_highlight';
        $orderType = isset($params['order_type']) ? $params['order_type'] : 'DESC';

        switch ($sortBy) {
            case CommonEnum::SORT_BY_NEW:
                $resultHighlight = array();
                break;
            case CommonEnum::SORT_BY_HIGHLIGHT:
            default:
                $sqlHighlight = "SELECT `posts`.`id`, `posts`.`title`, `posts`.`excerpt`, `posts`.`slug`, `posts`.`share_url`, `posts`.`thumbnail_url`, `posts`.`published_at`, `posts`.`is_highlight`, GROUP_CONCAT(`tags`.`name`) as tag_name
                    FROM `posts`
                    INNER JOIN `highlights` on `highlights`.`post_id` = `posts`.`id`
                    INNER JOIN `post_has_tags` on `post_has_tags`.`post_id` = `posts`.`id`
                    INNER JOIN `tags` on `post_has_tags`.`tag_id` = `tags`.`id`
                    WHERE `posts`.`category_id` = ? AND `posts`.`disease_id` = ?
                    GROUP BY `posts`.`id`
                    ORDER BY $orderBy $orderType
                    LIMIT ? OFFSET ?
                    ";
                $resultHighlight = DB::select($sqlHighlight, [$categoryId, $diseaseId, $perPage, $offset]);
                $orderBy = '`posts`.`id`';
                $orderType = 'DESC';
                break;
        }
        $sqlListPosts = "SELECT `posts`.`id`, `posts`.`title`, `posts`.`excerpt`, `posts`.`slug`, `posts`.`share_url`, `posts`.`thumbnail_url`, `posts`.`published_at`, `posts`.`is_highlight`, GROUP_CONCAT(`tags`.`name`) as tag_name
                FROM `posts`
                INNER JOIN `post_has_tags` on `post_has_tags`.`post_id` = `posts`.`id`
                INNER JOIN `tags` on `post_has_tags`.`tag_id` = `tags`.`id`
                WHERE `posts`.`category_id` = ? AND `posts`.`disease_id` = ?
                GROUP BY `posts`.`id`
                ORDER BY $orderBy $orderType
                LIMIT ? OFFSET ?
                ";
        $resultListPosts = DB::select($sqlListPosts, [$categoryId, $diseaseId, $perPage, $offset]);

        // Merge two arrays of object
        // Both arrays will be merged including duplicates
        $result = array_merge($resultHighlight, $resultListPosts);
        // Duplicate objects will be removed
        $result = array_map('unserialize', array_unique(array_map('serialize', $result)));
        return $result;
    }

    /**
     * @param $tagId
     * @return int
     * Note: added by tiemtt
     */
    public function getTotalPostByCategoryIdAndDiseaseId($categoryId, $diseaseId)
    {
        $sql = "SELECT COUNT(*) AS total_row
                FROM `posts`
                WHERE `category_id` = ? AND `disease_id` = ?";

        $result = DB::select($sql, [$categoryId, $diseaseId]);
        return (int)$result[0]->total_row;
    }

    /**
     * @param $tagId
     * @return int
     */
    public function getTotalPostByTagId($tagId)
    {
        $sql = "SELECT  COUNT(*) as total_row
                FROM `posts`
                INNER JOIN `post_has_tags` on `post_has_tags`.`post_id` = `posts`.`id`
                WHERE `post_has_tags`.`tag_id` = ?";
        $result = DB::select($sql, [$tagId]);

        return (int)$result[0]->total_row;
    }

    /**
     * @param $tagId
     * @param int $perPage
     * @param int $offset
     * @return array
     */
    public function getListPostByTagId($tagId, $perPage = CommonEnum::LIMIT_DATA_PAGINATE, $offset = 0)
    {
        $sql = "SELECT `categories` . `name` as `category_name`, `categories` . `share_url` as `category_share_url`, `posts`.`id` as `post_id`, `posts`.`title`, `posts`.`excerpt`, `posts`.`slug`, `posts`.`share_url`, `posts`.`thumbnail_url`, `posts`.`published_at`, tp.tag_name
                FROM `posts`
                INNER JOIN `post_has_tags` on `post_has_tags`.`post_id` = `posts`.`id`
                INNER JOIN `categories` ON `categories`.`id` = `posts`.`category_id`
                INNER JOIN (
                    SELECT h.post_id, GROUP_CONCAT(t.`name`) as tag_name
                    FROM tags t
                    INNER JOIN post_has_tags h ON t.id = h.tag_id
                    GROUP BY h.post_id) as tp ON tp.post_id = posts.id
                WHERE `post_has_tags`.`tag_id` = ?
                ORDER BY post_id DESC
                LIMIT ? OFFSET ?";
        $result = DB::select($sql, [$tagId, $perPage, $offset]);
        return $result;
    }

    /**
     * @param $tagId
     * @param int $perPage
     * @param int $offset
     * @return array
     */
    public function getListQuestionByTagId($tagId, $perPage = CommonEnum::LIMIT_DATA_PAGINATE, $offset = 0)
    {
        $sql = "SELECT `questions` . `id`, `questions` . `question`, `questions` . `tags`
            FROM `questions`
            INNER JOIN `question_has_tags` ON `question_has_tags` . `question_id` = `questions`.`id`
            INNER JOIN `tags` ON `tags`.`id` = `question_has_tags`.`tag_id`
            WHERE `tags`.`id` = ?
            LIMIT ? OFFSET ?";
        $result = DB::select($sql, [$tagId, $perPage, $offset]);
        return $result;
    }

    /**
     * @param $categoryId
     * @param array $params
     * @return array(per_page, offset, order_by, order_type)
     */
    public function getPostsByCatgory($categoryId, $params = array(), &$totalPost = 0)
    {
        $result = [];
        $perPage = isset($params['per_page']) ? $params['per_page'] : CommonEnum::LIMIT_NEWS_PAGINATE;
        $offset = isset($params['offset']) ? $params['offset'] : 0;
        $sortBy = isset($params['order_by']) ? $params['order_by'] : CommonEnum::SORT_BY_HIGHLIGHT;
        $orderType = isset($params['order_type']) ? $params['order_type'] : 'DESC';
        $redis = RedisServer::getConnection();
        $keyList = '';
        if($sortBy == CommonEnum::SORT_BY_HIGHLIGHT) {
            $keyList = RedisEnum::GET_LIST_POSTS_CATEGORY_HIGHLIGHT . $categoryId;
            $orderBy = "`highlights`.`order` ASC";
        } else {
            $keyList = RedisEnum::GET_LIST_POSTS_CATEGORY . $categoryId;
            $orderBy = "`posts`.`id` " . $orderType;
        }

        $totalPost = $redis->zCard($keyList);
        $end = (($offset + $perPage) >= $totalPost) ? $totalPost : $offset + $perPage;
        // 0 - 9 end, 10 - 19 end, 20 - 29 end -> 10 items
        if($sortBy == CommonEnum::SORT_BY_HIGHLIGHT) {
            $idsPostHighlight = $redis->zRange($keyList, $offset, $end - 1);
            $idsPost = $redis->zRevRange(RedisEnum::GET_LIST_POSTS_CATEGORY . $categoryId, $offset, $end - 1);
            $idsPost = array_unique(array_merge($idsPostHighlight, $idsPost));
        } else {
            $idsPost = $redis->zRevRange($keyList, $offset, $end - 1);
        }

        $result = $this->getPostsByIds($idsPost);
        if(count((array)$result) == 0) {
            $sql = "SELECT `posts`.`id`, `posts`.`title`, `posts`.`excerpt`, `posts`.`slug`, `posts`.`share_url`, `posts`.`thumbnail_url`, `posts`.`published_at`, `posts`.`is_highlight`, GROUP_CONCAT(`tags`.`name`) as tag_name
                    FROM `posts`
                    LEFT JOIN `post_has_tags` on `post_has_tags`.`post_id` = `posts`.`id`
                    LEFT JOIN `tags` on `post_has_tags`.`tag_id` = `tags`.`id`
                    WHERE `posts`.`category_id` = ? AND `posts`.`status` = ?
                    GROUP BY `posts`.`id`
                    ORDER BY `posts`.`id` DESC
                    LIMIT ? OFFSET ?
                    ";
            $sqlHighlight = "SELECT `posts`.`id`, `posts`.`title`, `posts`.`excerpt`, `posts`.`slug`, `posts`.`share_url`, `posts`.`thumbnail_url`, `posts`.`published_at`, `posts`.`is_highlight`, `highlights`.`order`, GROUP_CONCAT(`tags`.`name`) as tag_name
                    FROM `posts`
                    INNER JOIN `highlights` on `highlights`.`post_id` = `posts`.`id`
                    INNER JOIN `post_has_tags` on `post_has_tags`.`post_id` = `posts`.`id`
                    INNER JOIN `tags` on `post_has_tags`.`tag_id` = `tags`.`id`
                    WHERE `posts`.`category_id` = ? AND `posts`.`status` = ?
                    GROUP BY `posts`.`id`
                    ORDER BY $orderBy
                    LIMIT ? OFFSET ?
                    ";
            $data = DB::select($sql, [$categoryId, 'publish', $perPage, $offset]);
            $dataHighlight = DB::select($sqlHighlight, [$categoryId, 'publish', $perPage, $offset]);

            if($sortBy == CommonEnum::SORT_BY_HIGHLIGHT) {
                $dataMerge = array_merge($dataHighlight, $data);
            } else {
                $dataMerge = $data;
            }
            $uniques = array();
            foreach ($dataMerge as $d) {
                $uniques[$d->id]= $d;
            }

            if(count($uniques) > 0) {
                foreach ($uniques as $post) {
                    if(!empty($post->tag_name)) {
                        $dataTags = [];
                        $dataT = explode(',', $post->tag_name);
                        foreach ($dataT as $i => $t) {
                            if ($i == 4) break;
                            $dataTags[] = array('name' => $t, 'url' => url('/tag/' . HtmlFormatUtility::get_slug_alias($t)));
                        }

                        $post->tag_name = $dataTags;
                    }

                    $result[] = $post;
                }
            }

            $totalPost = $this->getTotalPostsByCatgory($categoryId);
        }

        return $result;
    }

    /**
     * @param $ids
     * @return array
     */
    public function getPostsByIds($ids) {
        $result = [];
        if(count($ids) > 0) {
            $keyIds = [];
            foreach ($ids as $id) {
                $keyIds[] = RedisEnum::GET_POST_DETAIL . $id;
            }

            $redis = RedisServer::getConnection();
            if(count($keyIds) > 0) {
                foreach ($keyIds as $keyId) {
                    $chk = $redis->exists($keyId);
                    if ($chk == 0) {
                        $post = DB::table('posts')->where('id', str_replace(RedisEnum::GET_POST_DETAIL, '', $keyId))->first();
                    } else {
                        $post = $redis->get($keyId);
                        $post = json_decode($post);
                    }
                    if (!empty($post->tag_name)) {
                        $dataTags = [];
                        $dataT = explode(',', $post->tag_name);
                        foreach ($dataT as $i => $t) {
                            if ($i == 4) break;
                            $t = str_replace(array('[', ']', '"'), array('', '', ''), $t);
                            $dataTags[] = array('name' => $t, 'url' => url('/tag/' . HtmlFormatUtility::get_slug_alias($t)));
                        }

                        $post->tag_name = $dataTags;
                    }

                    $result[] = $post;
                }
            }
        }

        return $result;
    }

    /**
     * @param $categoryId
     * @return int
     * Note: added by tiemtt
     */
    public function getTotalPostsByCatgory($categoryId)
    {
        $sql = "SELECT COUNT(*) AS total_row
                FROM `posts`
                WHERE `category_id` = ?";

        $result = DB::select($sql, [$categoryId]);
        return (int)$result[0]->total_row;
    }

    /**
     * @param $categoryId
     * @param $diseaseId
     * @param $postId
     * @param $limit
     * @return array
     */
    public function getRelatedPost($categoryId, $diseaseId, $postId, $limit)
    {
        $sql = "SELECT `posts`.`id`, `posts`.`title`, `posts`.`excerpt`, `posts`.`slug`, `posts`.`share_url`, `posts`.`thumbnail_url`, `posts`.`published_at`, `posts`.`post_type`, `posts`.`is_highlight`, GROUP_CONCAT(`tags`.`name`) as tag_name
                FROM `posts`
                INNER JOIN `post_has_tags` on `post_has_tags`.`post_id` = `posts`.`id`
                INNER JOIN `tags` on `post_has_tags`.`tag_id` = `tags`.`id`
                WHERE `posts`.`category_id` = ? AND `posts`.`disease_id` = ? AND `posts`.`id` != ?
                GROUP BY `posts`.`id`
                ORDER BY `posts`.`id` DESC
                LIMIT ? OFFSET ?
                ";
        $result = DB::select($sql, [$categoryId, $diseaseId, $postId, $limit, 0]);
        return $result;
    }
}
