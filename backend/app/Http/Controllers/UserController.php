<?php

namespace App\Http\Controllers;

use App\Core\Controllers\Controller;
use Illuminate\Http\Request;
use App\Core\Models\User;
use Spatie\Permission\Models\Role;
use DB;
use Hash;

class UserController extends Controller
{
    /**
     * UserController constructor.
     */
    public function __construct()
    {
        $this->limit = config()->get('constants.LIMIT_DATA_PAGINATE');
        $permissions = \Illuminate\Support\Facades\DB::table('permissions')->select('name')->where('group_name', 'user')->get();
        foreach ($permissions as $permission) {
            $this->middleware('permission:' . $permission->name, ['only' => [explode('.', $permission->name)[1]]]);
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $limit = config()->get('constants.LIMIT_DATA_PAGINATE');
        $users = User::paginate($limit);
        $roles = Role::all();
        return view('users.index', compact('users', 'roles'))
            ->with('i', ($request->get('page', 1) - 1) * $limit);
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
            $this->validate($request, [
                'name' => 'required',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|same:confirm-password',
                'roles' => 'required'
            ]);
            $input = $request->all();
            $input['password'] = bcrypt($input['password']);
            $user = User::create($input);
            $user->assignRole($request->input('roles'));
            return redirect()->back()->with('message', 'Tạo mới user ' . $input['name'] . ' thành công');
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', 'Có lỗi xảy ra: ' . $exception->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $action = 'show';
        $user = User::find($id);
        $users = User::all();
        $roles = Role::all();
        $userRole = $user->roles->pluck('id');
        return view('users.form', compact('action', 'user', 'users', 'roles', 'userRole'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $action = 'edit';
        $user = User::find($id);
        $users = User::all();
        $roles = Role::all();
        $userRole = $user->roles->pluck('id');
        return view('users.form', compact('action', 'user', 'users', 'roles', 'userRole'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $this->validate($request, [
                'name' => 'required',
                'email' => 'required|email|unique:users,email,'.$id,
                'roles' => 'required'
            ]);
            $input = $request->all();
            if (!empty($input['password'])) {
                $input['password'] = bcrypt($input['password']);
            } else {
                $input = array_except($input, array('password'));
            }
            $user = User::find($id);
            $user->update($input);
            DB::table('model_has_roles')->where('model_id', $id)->delete();
            $user->assignRole($request->get('roles'));
            return redirect()->back()->with('message', 'Sửa user ' . $request->get('name') . ' thành công');
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', 'Có lỗi xảy ra: ' . $exception->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $user = User::find($id);
            $user->delete();
            return redirect('/users')->with('message', 'Xóa user ' . $user->name . ' thành công');
        } catch (\Exception $exception) {
            return redirect('/users')->with('error', 'Có lỗi xảy ra: ' . $exception->getMessage());
        }
    }
}
