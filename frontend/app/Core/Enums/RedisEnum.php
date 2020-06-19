<?php

namespace App\Core\Enums;

use BenSampo\Enum\Enum;

/**
 * Class Redis
 * @package App\Core\Enums
 */
class RedisEnum extends Enum
{
    const REDIS_DB = 1;
    const REDIS_POST = 2;
    const REDIS_HTML = 4;
    const REDIS_QUESTION = 5;

    /* Question (câu hỏi) */
    const GET_QUESTION_DETAIL = 'question_detail_';
    const GET_LIST_QUESTIONS_CATEGORY = 'list_questions_category_';

    /* Answer (câu trả lời) */
    const GET_ANSWER_DETAIL = 'answer_detail_';

    /* Posts (bài viết) */
    const GET_POST_DETAIL = 'post_detail_';
    const GET_POST_DETAIL_BASIC = 'post_detail_basic_';
    const GET_LIST_POSTS_CATEGORY = 'list_posts_category_';
    const GET_LIST_POSTS_CATEGORY_HIGHLIGHT = 'list_posts_category_highlight_';

    const GET_LIST_CAREERS = 'list_careers';
    const GET_CAREER_DETAIL = 'career_detail_';

    /* Page (trang tĩnh) */
    const GET_PAGE_DETAIL = 'page_detail_';

    /* Cache html header & footer */
    const GET_HTML_HEADER = 'html_header_v2';
    const GET_HTML_FOOTER = 'html_footer_v2';
}
