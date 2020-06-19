<?php

namespace App\Http\Controllers;

use App\Core\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class MyAccountController extends Controller
{
    /**
     * MyAccountController constructor.
     */
    public function __construct()
    {
        $permissions = DB::table('permissions')->select('name')->where('group_name', 'myaccount')->get();
        foreach ($permissions as $permission) {
            $this->middleware('permission:' . $permission->name, ['only' => [explode('.', $permission->name)[1]]]);
        }
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     * @throws \Illuminate\Validation\ValidationException
     */
    public function profile(Request $request)
    {
        if ($request->isMethod('post')) {
            $input = $request->all();
            if (!(Hash::check($input['old_password'], Auth::user()->password))) {
                // Old password not match
                return redirect()->back()->with('message', 'Mật khẩu cũ không đúng');
            }
            if (strcmp($input['old_password'], $input['new_password']) == 0) {
                // Old password and new password are same
                return redirect()->back()->with('message', 'Mật khẩu mới không được để trùng với mật khẩu cũ');
            }
            $this->validate($request, [
                'old_password' => 'required',
                'new_password' => 'required|min:6|same:confirm_password'
            ]);
            if (!empty($input['new_password'])) {
                // Change password
                $user = Auth::user();
                $user->password = bcrypt($input['new_password']);
                $user->save();
                return redirect()->back()->with('message', 'Thay đổi mật khẩu thành công');
            } else { // Prevent hack empty
                return redirect()->back()->with('message', 'Thay đổi mật khẩu thất bại');
            }
        } else {
            $categories = DB::table('categories')->select('id', 'name')->get();
            $myPosts = DB::table('posts')->select('id', 'title', 'category_id', 'published_at')->where('user_id', Auth::user()->id)->orderBy('published_at', 'DESC')->paginate(config()->get('constants.LIMIT_DATA_PAGINATE'));
            return view('myaccount.profile', compact('categories', 'myPosts'));
        }
    }
}
