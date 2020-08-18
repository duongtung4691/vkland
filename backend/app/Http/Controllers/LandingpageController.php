<?php

namespace App\Http\Controllers;

use App\Core\Business\UploadFileBusiness;
use App\Core\Controllers\Controller;
use App\Core\Repositories\Redis\PageRedis;
use App\Core\Models\Setting;
use App\Core\Models\Page;
use App\Core\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class LandingpageController extends Controller
{

    /**
     * LandingpageController constructor.
     */
    public function __construct()
    {
        $permissions = DB::table('permissions')->select('name')->where('group_name', 'landingpage')->get();
        foreach ($permissions as $permission) {
            $this->middleware('permission:' . $permission->name, ['only' => [explode('.', $permission->name)[1]]]);
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $landingpages = Page::where('page_type', 'landing')->get();
        return view('landingpage.index', compact('landingpages'));
    }

    /**
     * Show the form for updateting giới thiệu về 5 Nhất Nhất
     */
    public function chungchimoigioibatdongsan ()
    {
        $landingpage = Page::where('slug', '=', 'chung-chi-moi-gioi-bat-dong-san')->first();
        $category = Category::where('slug', '=', 'chung-chi-moi-gioi-bat-dong-san')->first();
        $categories = Category::all();
        return view('landingpage.chungchimoigioibatdongsan', compact('category', 'categories', 'landingpage'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $title = $request->get('title');
        $slug = sanitize($title);
        $content = $request->get('introduction');
        $plain_text = strip_tags($content);
        $file = $request->thumbnail_url;
        $original_name = '';
        if ($file) {
            $original_name = $file->getClientOriginalName();
        }

        $yearDir = date('Y');
        $monthDir = date('m');
        $dayDir = date('d');

        try {
            $request->validate([
                'title' => 'required',
                'introduction' => 'required',
                'status' => 'required'
            ]);
            if (Page::where('slug', '=', $slug)->exists()) {
                // TH update theo mẫu có sẵn
                $landingpage = Page::where('slug', '=', $slug)->first();
                $landingpage->title = $title;
                $landingpage->excerpt = $request->get('excerpt');
                $landingpage->plain_text = $plain_text;
                $landingpage->content = $content;
                $landingpage->author_name = $request->get('author_name');
                $landingpage->user_id = $request->get('user_id');
                $landingpage->slug = $slug;
                $landingpage->status = $request->get('status');
                $landingpage->category_id = $request->get('category_id');
                $landingpage->page_type = 'landing'; // Thêm để test lại hoặc tránh miss thông tin
                $landingpage->meta_title = $request->get('meta_title');
                $landingpage->meta_keyword = $request->get('meta_keyword');
                $landingpage->meta_description = $request->get('meta_description');

                if ($file) {
                    UploadFileBusiness::uploadFileToFolder($file);
                    $landingpage->thumbnail_url = '/' . $yearDir . '/' . $monthDir . '/' . $dayDir . '/' . $original_name; // Chức năng edit lại ảnh đại diện cần xem lại cơ chế thay đổi
                }
                $landingpage->save();

                \Activity::addLog('Sửa landing page', 'Tài khoản ' . auth()->user()->email . ' sửa landing page ' . $landingpage->title . ' vào lúc ' . date('H:i A') . ' ngày ' . date('d/m/Y'));
                return redirect()->back()->with('message', 'Sửa landing page ' . $landingpage->title . ' thành công');
            } else {
                // TH tạo mới mẫu
                $thumbnail_url = ($file) ? '/' . $yearDir . '/' . $monthDir . '/' . $dayDir . '/' . $original_name : '';
                $landingpage = new Page([
                    'title' => $title,
                    'excerpt' => $request->get('excerpt'),
                    'plain_text' => $plain_text,
                    'content' => $content,
                    'author_name' => $request->get('author_name'),
                    'user_id' => $request->get('user_id'),
                    'slug' => $slug,
                    'status' => $request->get('status'),
                    'category_id' => $request->get('category_id'),
                    'thumbnail_url' => $thumbnail_url,
                    'page_type' => 'landing'
                ]);
                // Ok thì upload file và save mới
                if ($file) {
                    UploadFileBusiness::uploadFileToFolder($file);
                }
                $landingpage->save();

                \Activity::addLog('Tạo mới landing page', 'Tài khoản ' . auth()->user()->email . ' tạo mới landing page ' . $title . ' vào lúc ' . date('H:i A') . ' ngày ' . date('d/m/Y'));
                return redirect('/landingpage')->with('message', 'Tạo mới landing page ' . $title . ' thành công');
            }
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', 'Có lỗi xảy ra: ' . $exception->getMessage());
        }
    }
}
