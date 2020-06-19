<?php

namespace App\Http\Controllers;
use App\Core\Controllers\Controller;
use App\Core\Models\Tags;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TagsController extends Controller
{
    public $limit;

    /**
     * TagsController constructor.
     */
    public function __construct()
    {
        $this->limit = config()->get('constants.LIMIT_DATA_PAGINATE');
        $permissions = DB::table('permissions')->select('name')->where('group_name', 'tags')->get();
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
            $number_record = $request->get('nr') != ''?$request->get('nr'):$this->limit;
            $ajax_nr = $request->get('ajax_nr') != ''?$request->get('ajax_nr'):'0';

            $tags = $this->get_tags($request, '', $number_record);
            $html_done = view('tags.list')->with(['tags' => $tags, 'number_record' => $number_record]);
            if ($number_record == 'all')
                $html_done = $html_done->with('i', 0);
            else
                $html_done = $html_done->with('i', ($request->get('page', 1) - 1) * $number_record);
            $html_done = $html_done->render();

            if($ajax_nr == '0'){
                return  view('tags.index', compact('tags', 'html_done'));
            }else{
                return response()->json([
                    'data' => $html_done
                ]);
            }

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
            // get name
            $name = $request->get('name');
            if($name != '' && $name != '[]'){
                $arr_name = explode('"]', $name);
                $arr_name = explode('["', $arr_name[0]);
                $arr_name = strpos($arr_name[1], '","') == true?explode('","', $arr_name[1]):array($arr_name[1]);

                // check and add new
                $str_dup_name = '';
                $str_ok_name = '';
                if(count($arr_name) > 0) {
                    foreach ($arr_name as $val) {
                        $slug = sanitize($val);
                        $tag = new Tags([
                            'name' => $val,
                            'slug' => $slug,
                            'description' => $request->get('description'),
                            'meta_title' => $request->get('meta_title'),
                            'meta_keyword' => $request->get('meta_keyword'),
                            'meta_description' => $request->get('meta_description')
                        ]);
                        if (Tags::where('slug', '=', $slug)->exists()) {
                            $str_dup_name .= $str_dup_name == '' ? "'" . $val . "'" : ',' . "'" . $val . "'";
                        } else {
                            $tag->save();
                            $str_ok_name .= $str_ok_name == '' ? "'" . $val . "'" : ', ' . "'" . $val . "'";
                        }
                    }
                    // view message
                    $done_redirect = redirect('/tags');
                    if ($str_ok_name != '') {
                        $done_redirect = $done_redirect->with('message', 'Tags đã được thêm mới: ' . $str_ok_name);
                    }
                    if ($str_dup_name != '') {
                        $done_redirect = $done_redirect->with('error', 'Tags đã tồn tại: ' . $str_dup_name);
                    }
                    return $done_redirect;
                }
            }else{
                return  redirect('/tags')->with('error', 'Làm ơn nhập tags');
            }
        } catch (\Exception $exception) {
            return redirect('/tags')->with('error', 'Có lỗi xảy ra: ' . $exception->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\tags  $tags
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        try {
            $action = 'show';
            $tag = Tags::find($id);
            $p = trim($request->get('p'));
            $arr_val = array(
                "name"=>$p
            );

            $number_record = $request->get('nr') != ''?$request->get('nr'):$this->limit;
            $ajax_nr = $request->get('ajax_nr') != ''?$request->get('ajax_nr'):'0';

            $tags = $this->get_tags($request, $arr_val, $number_record);
            $html_done = view('tags.list')->with(['tags' => $tags, 'number_record' => $number_record])
                ->with('i', ($request->get('page', 1) - 1) * $number_record)
                ->render();

            if($ajax_nr == '0'){
                return view('tags.form', compact('action', 'tag', 'tags', 'arr_val', 'html_done', 'number_record'));
            }else{
                return response()->json([
                    'data' => $html_done
                ]);
            }
        } catch (\Exception $exception) {
            return redirect('/tags')->with('error', 'Có lỗi hiển thị tags: ' . $exception->getMessage());
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\tags  $tags
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        try {
            $action = 'edit';
            $tag = Tags::find($id);

            $p = trim($request->get('p'));
            $arr_val = array(
                "name"=>$p
            );

            $number_record = $request->get('nr') != ''?$request->get('nr'):$this->limit;
            $ajax_nr = $request->get('ajax_nr') != ''?$request->get('ajax_nr'):'0';

            $tags = $this->get_tags($request, $arr_val, $number_record);
            $html_done = view('tags.list')->with(['tags' => $tags, 'number_record' => $number_record])
                ->with('i', ($request->get('page', 1) - 1) * $number_record)
                ->render();

            if($ajax_nr == '0'){
                return view('tags.form', compact('action', 'tag', 'tags', 'arr_val', 'html_done', 'number_record'));
            }else{
                return response()->json([
                    'data' => $html_done
                ]);
            }
        } catch (\Exception $exception) {
            return redirect('/tags')->with('error', 'Có lỗi hiển thị tags: ' . $exception->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\tags  $tags
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $action = 'edit';
            $request->validate([
                'name' => 'required'
            ]);
            $name = $request->get('name');
            $slug = sanitize($name);
            $tag = Tags::find($id);
            $tag->name = $name;
            $tag->slug = $slug;
            $tag->description = $request->get('description');
            $tag->meta_title = $request->get('meta_title');
            $tag->meta_keyword = $request->get('meta_keyword');
            $tag->meta_description = $request->get('meta_description');
            $tag->updated_at = date('Y-m-d H:i:s'); // Update tag thì phải cập nhật lại thời gian updated_at
            $tag->save();

            $h_p = trim($request->get('h_p'));
            $arr_val = array(
                "name"=>$h_p
            );

            $number_record = $request->get('nr') != ''?$request->get('nr'):$this->limit;

            $tags = $this->get_tags($request, $arr_val, $number_record);
            $html_done = view('tags.list')->with(['tags' => $tags, 'number_record' => $number_record])
                ->with('i', ($request->get('page', 1) - 1) * $number_record)
                ->render();

            return view('tags.form', compact('action', 'tag', 'tags', 'arr_val', 'html_done', 'number_record'));
        } catch (\Exception $exception) {
            return redirect('/tags/edit/' . $id)->with('error', 'Có lỗi xảy ra: ' . $exception->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\tags  $tags
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        try {
            $action = "delete";
            $tag = Tags::find($id);
            $tag->delete();

            $p = trim($request->get('p'));

            $number_record = $request->get('nr') != ''?$request->get('nr'):$this->limit;

            if(isset($p) && $p != ""){
                return redirect('/tags/search?p='.$p.'&nr='.$number_record)->with('message', 'Tags đã được xóa: '.$tag->name);
            }else {
                return redirect('/tags?nr='.$number_record)->with('message', 'Tags đã được xóa: '.$tag->name);
            }
        } catch (\Exception $exception) {
            return redirect('/tags')->with('error', 'Có lỗi xảy ra: ' . $exception->getMessage());
        }
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function begin_search(Request $request){
        $p = trim($request->get('p'));
        $arr_val = array(
            "name"=>$p
        );

        $ajax_nr = $request->get('ajax_nr') != ''?$request->get('ajax_nr'):'0';
        $number_record = $request->get('nr') != ''?$request->get('nr'):$this->limit;

        $tags = $this->get_tags($request, $arr_val, $number_record);
        $html_done = view('tags.list')->with(['tags' => $tags, 'number_record' => $number_record, 'arr_val' => $arr_val])
            ->with('i', ($request->get('page', 1) - 1) * $number_record)
            ->render();

        if($ajax_nr == '0') {
            return view('tags.search', compact('tags', 'arr_val', 'html_done', 'number_record'));
        }else{
            return response()->json([
                'data' => $html_done
            ]);
        }
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function ajax_search(Request $request)
    {
        $txtkey = trim($request->get('txt_search_tag'));
        $arr_val = array(
            "name"=>$txtkey
        );
        $txtkey = str_replace(" ","-",$arr_val["name"]);

        $number_record = $request->get('nr') != ''?$request->get('nr'):$this->limit;
        $tags = $this->get_tags($request, $arr_val, $number_record);
        $html_done = view('tags.list')->with(['tags' => $tags, 'number_record' => $number_record, 'arr_val' => $arr_val])
            ->with('i', ($request->get('page', 1) - 1) * $number_record)
            ->render();
        return view('tags.search', compact('tags', 'arr_val', 'html_done', 'number_record'));
    }

    /**
     * @param $arr_val
     * @return mixed'
     *
     */
    public function get_tags($request, $arr_val, $number_record){
        $tags = "";
        if(isset($arr_val["name"]) && $arr_val["name"] != "") {
            $arr_val["name"] = str_replace("-"," ",$arr_val["name"]);
            $tags = Tags::orderBy('id', 'DESC')->where('name', 'LIKE', '%' . $arr_val["name"] . '%')->paginate($request->get('per_page', $number_record));
        }else{
            if($number_record == 'all'){
                // $tags = Tags::all();
                $tags = Tags::orderBy('id', 'DESC')->paginate($request->get('per_page', 1000));
            }else {
                $tags = Tags::orderBy('id', 'DESC')->paginate($request->get('per_page', $number_record));
            }
        }
        return $tags;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function add_tags(Request $request){
        $tags = \DB::table('tags')->pluck('name');
        return response()->json([
            'data' => $tags
        ]);
    }
}
