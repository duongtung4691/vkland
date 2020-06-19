<?php

namespace App\Core\Enums;

use BenSampo\Enum\Enum;

/**
 * Class Redis
 * @package App\Core\Enums
 */
class ElasticsearchEnum extends Enum
{
    /* Question (câu hỏi) */
    const GET_QUESTION_INDEX = 'questions_index';
    const _PREFIX_QUESTION = 'question_';

    /* Answer (câu trả lời) */
    const GET_ANSWER_INDEX = 'answers_index';
    const _PREFIX_ANSWER = 'answer_';

    /* Posts (bài viết) */
    const GET_POSTS_INDEX = 'posts_index';
    const POSTS_TYPE = '_doc';
    const _PREFIX_POST = 'post_';

    /* Posts (bài crawler) */
    const GET_POSTS_CRAWLER_INDEX = 'posts_crawler_index';
    const _PREFIX_POST_CRAWLER = 'post_crawler_';

    /* Pharmacy (hiệu thuốc) */
    const GET_PHARMACY_INDEX = 'pharmacies_index';
    const _PREFIX_PHARMACY = 'pharmacy_';

    /* Tag */
    const GET_TAG_INDEX = 'tags_index';
    const _PREFIX_TAG = 'tag_';
}
