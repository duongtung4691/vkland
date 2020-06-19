<?php
namespace App\Helpers;
use Request;
use App\Core\Models\Activity as ActivityModel;

class Activity
{
    /**
     * Add log activity
     *
     * function name addLog(short name)
     * @return mysql data
     */

    public static function addLog($subject, $content)
    {
        // Khởi tạo log ban đầu là rỗng
        $log = array();
        $log['subject'] = $subject;
        $log['content'] = $content;
        $log['url'] = Request::fullUrl();
        $log['method'] = Request::method();
        $log['ip'] = Request::ip();
        $log['agent'] = Request::header('user-agent');
        $log['user_id'] = auth()->check() ? auth()->user()->id : 1;
        ActivityModel::create($log);
    }

    /**
     * List log activities
     *
     * function name listLog(short name)
     * @param $offset, $limit
     * @return view data
     */

    public static function listLog($offset, $limit)
    {
        return ActivityModel::offset($offset)->limit($limit)->orderBy('id', 'desc')->get();
    }
}