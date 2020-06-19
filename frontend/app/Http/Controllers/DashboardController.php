<?php
namespace App\Http\Controllers;
use App\Core\Controllers\Controller;
use App\Core\Models\Category;
use App\Core\Models\Page;
use App\Core\Models\Posts;
use App\Core\Models\Disease;
use App\Core\Models\Question;
use App\Core\Models\User;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $permissions = DB::table('permissions')->select('name')->where('group_name', 'dashboard')->get();
        foreach ($permissions as $permission) {
            $this->middleware('permission:' . $permission->name, ['only' => [explode('.', $permission->name)[1]]]);
        }
    }

    /**
     * Show the application dashboard
     * @return view
     */
    public function index()
    {
        $category_count = Category::count();
        $post_count = Posts::count();
        $user_count = User::count();
        $activities = \Activity::listLog(0, 10);
        return view('dashboard', compact(
            'category_count',
            'post_count',
            'user_count',
            'activities'
        ));
    }
}
