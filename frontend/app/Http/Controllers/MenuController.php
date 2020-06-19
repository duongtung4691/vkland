<?php

namespace App\Http\Controllers;

use App\Core\Controllers\Controller;
use App\Core\Models\Category;
use App\Core\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class MenuController extends Controller
{
    /**
     * MenuController constructor.
     */
    public function __construct()
    {
        $permissions = DB::table('permissions')->select('name')->where('group_name', 'menu')->get();
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
        $menus = Category::all();
        $menu_headers = Menu::where([
            ['position', 'menu_header']
        ])->orderBy('order', 'ASC')->get();
        $menu_footers = Menu::whereIn('position', ['menu_footer_1', 'menu_footer_2'])->orderBy('order', 'ASC')->get();
        return view('menu.index', compact('menus', 'menu_headers', 'menu_footers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'item_title' => 'required',
                'item_url' => 'required',
                'position' => 'required'
            ]);
            $item_title = $request->get('item_title');
            $menu = new Menu([
                'parent_id' => $request->get('parent_id'),
                'has_child' => $request->get('category_id') > 0 ? 1 : 0,
                'category_id' => $request->get('category_id'),
                'position' => $request->get('position'),
                'item_url' => $request->get('item_url'),
                'item_title' => $request->get('item_title'),
                'user_id' => $request->get('user_id'),
                'is_actived' => $request->get('is_actived')
            ]);
            // Not ok thì redirect với thông báo menu đã tồn tại
            if (Menu::where('item_title', '=', $item_title)->exists()) {
                return redirect('/menu')->with('error', 'Menu ' . $item_title . ' đã tồn tại');
            } else {
                // Ok thì save mới
                $menu->save();
                Menu::where('id', $menu->id)->update([
                    'order' => $menu->id
                ]);
                \Activity::addLog('Tạo mới menu', 'Tài khoản ' . auth()->user()->email . ' tạo mới menu ' . $item_title . ' vào lúc ' . date('H:i A') . ' ngày ' . date('d/m/Y'));
                return redirect('/menu')->with('message', 'Tạo mới menu ' . $item_title . ' thành công');
            }
        } catch (\Exception $exception) {
            return redirect('/menu')->with('error', 'Có lỗi xảy ra: ' . $exception->getMessage());
        }
    }

    /**
     * @param Request $request
     * @return false|string
     */
    public function order(Request $request)
    {
        $menuId = $request->get('menuId');
        $order = $request->get('order');
        Menu::where('id', $menuId
        )->update([
            'order' => $order
        ]);
        return json_encode(array('error' => 0, 'message' => 'Thao tác thành công'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $menu = Menu::find($id);
        $menus = Category::all();
        $menu_headers = Menu::where([
            ['position', 'menu_header']
        ])->get();
        $menu_footers = Menu::whereIn('position', ['menu_footer_1', 'menu_footer_2'])->get();
        return view('menu.form', compact('menu', 'menus', 'menu_headers', 'menu_footers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'item_title' => 'required',
                'item_url' => 'required',
                'position' => 'required'
            ]);
            $item_title = $request->get('item_title');
            $menu = Menu::find($id);
            if (Menu::where('id', '=', $id)->exists()) {
                $menu->parent_id = $request->get('parent_id');
                $menu->has_child = $request->get('category_id') > 0 ? 1 : 0;
                $menu->category_id = $request->get('category_id');
                $menu->position = $request->get('position');
                $menu->item_url = $request->get('item_url');
                $menu->item_title = $item_title;
                $menu->user_id = $request->get('user_id');
                $menu->is_actived = $request->get('is_actived');
                \Activity::addLog('Sửa menu', 'Tài khoản ' . auth()->user()->email . ' sửa menu ' . $item_title . ' vào lúc ' . date('H:i A') . ' ngày ' . date('d/m/Y'));
                $menu->save();
                return redirect('/menu/edit/' . $id)->with('message', 'Sửa menu ' . $item_title . ' thành công');
            } else {
                return redirect()->back()->with('error', 'Menu ' . $item_title . ' không tồn tại');
            }
        } catch (\Exception $exception) {
            return redirect('/menu/edit/' . $id)->with('error', 'Có lỗi xảy ra: ' . $exception->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $menu= Menu::find($id);
            $menu->delete();
            return redirect('/menu')->with('message', 'Xóa menu ' . $menu->item_title . ' thành công');
        } catch (\Exception $exception) {
            return redirect('/menu')->with('error', 'Có lỗi xảy ra: ' . $exception->getMessage());
        }
    }
}
