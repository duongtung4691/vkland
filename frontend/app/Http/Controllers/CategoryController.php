<?php

namespace App\Http\Controllers;

use App\Core\Controllers\Controller;
use Illuminate\Http\Request;
use App\Core\Models\Category;
use App\Core\Connection\RedisServer;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public $limit;

    /**
     * CategoryController constructor.
     */
    public function __construct()
    {
        $this->limit = config()->get('constants.LIMIT_DATA_PAGINATE');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($slugFolder = '')
    {
        $categories = Category::all();
        return view('category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required',
                'parent_id' => 'required'
            ]);
            $name = $request->get('name');
            // Tạo slug và check trùng slug (name)
            $slug = sanitize($name);
            $category = new Category([
                'name' => $name,
                'slug' => $slug,
                'description' => $request->get('description'),
                'parent_id' => $request->get('parent_id'),
                'is_actived' => $request->get('is_actived'),
                'meta_title' => $request->get('meta_title'),
                'meta_keyword' => $request->get('meta_keyword'),
                'meta_description' => $request->get('meta_description')
            ]);
            // Not ok thì redirect với thông báo category đã tồn tại
            if (Category::where('slug', '=', $slug)->exists()) {
                return redirect('/category')->with('error', 'Danh mục ' . $name . ' đã tồn tại');
            } else {
                // Ok thì save mới
                $category->save();
                if ($request->get('parent_id') > 0) { // Có danh mục cha, mới dừng lại ở menu cấp 2
                    $slug_parent = DB::table('categories')->select('slug')->where('id', $category->parent_id)->first();
                    $share_url = '/' . $slug_parent->slug . '/' . $slug;
                } else { // Không có danh mục cha
                    $share_url = '/' . $slug;
                }
                DB::table('categories')->where('id', $category->id)->update([
                    'share_url' => $share_url
                ]);
                return redirect('/category')->with('message', 'Tạo mới danh mục ' . $name . ' thành công');
            }
        } catch (\Exception $exception) {
            return redirect('/category')->with('error', 'Có lỗi xảy ra: ' . $exception->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $action = 'show';
        $category = Category::find($id);
        $categoryParent = Category::find($category->parent_id);
        $categories = Category::all();
        return view('category.form', compact('action', 'category', 'categoryParent', 'categories'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $action = 'edit';
        $category = Category::find($id);
        $categoryParent = Category::find($category->parent_id);
        $categories = Category::all();
        return view('category.form', compact('action', 'category', 'categoryParent', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'name' => 'required',
                'parent_id' => 'required'
            ]);
            $name = $request->get('name');
            $slug = sanitize($name);
            $category = Category::find($id);
            $category->name = $name;
            $category->slug = $slug;
            $category->description = $request->get('description');
            $parent_id = $request->get('parent_id');
            $category->parent_id = $parent_id;
            if ($request->get('parent_id') > 0) { // Có danh mục cha, mới dừng lại ở menu cấp 2
                $slug_parent = DB::table('categories')->select('slug')->where('id', $parent_id)->first();
                $share_url = '/' . $slug_parent->slug . '/' . $slug;
            } else { // Không có danh mục cha
                $share_url = '/' . $slug;
            }
            $category->share_url = $share_url;
            $category->is_actived = $request->get('is_actived');
            $category->meta_title = $request->get('meta_title');
            $category->meta_keyword = $request->get('meta_keyword');
            $category->meta_description = $request->get('meta_description');
            $category->save();
            return redirect('/category/edit/' . $id)->with('message', 'Sửa danh mục ' . $name . ' thành công');
        } catch (\Exception $exception) {
            return redirect('/category/edit/' . $id)->with('error', 'Có lỗi xảy ra: ' . $exception->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $category = Category::find($id);
            $category->delete();
            return redirect('/category')->with('message', 'Xóa danh mục ' . $category->name . ' thành công');
        } catch (\Exception $exception) {
            return redirect('/category')->with('error', 'Có lỗi xảy ra: ' . $exception->getMessage());
        }
    }

    /**
     * @param Request $request
     * @param $slug
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function disease(Request $request, $slug)
    {
        $action = 'Add chủ đề vào';
        $category = Category::where('slug', $slug)->first();

        $categoryDiseases = \DB::table('category_has_diseases')
            ->join('categories', 'category_has_diseases.category_id', '=', 'categories.id')
            ->join('diseases', 'category_has_diseases.disease_id', '=', 'diseases.id')
            ->where('category_id', $category->id)
            ->pluck('diseases.id')
            ->all();

        $diseases = Disease::where('is_actived', 1)->get();
        return view('category.disease', compact('action', 'category', 'categoryDiseases',  'diseases'))
            ->with('i', ($request->get('page', 1) - 1) * $this->limit);
    }

    /**
     * @param $category_id
     */
    public function addDisease(Request $request, $category_id)
    {
        try {
            $category = Category::where('id', $category_id)->first();
            \DB::table('category_has_diseases')->where([
                ['category_id', '=', $category_id]
            ])->delete();
            foreach ($request->get('diseases') as $disease_id) {
                \DB::table('category_has_diseases')->insert([
                    'category_id' => $category_id,
                    'disease_id' => $disease_id,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                ]);
            }
            RedisServer::setListKey('category_' . $category_id . '_has_disease', $request->get('diseases'));
            return redirect()->back()->with('message', 'Add chủ đề vào danh mục ' . $category->name . ' thành công');
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', 'Có lỗi xảy ra: ' . $exception->getMessage());
        }
    }
}
