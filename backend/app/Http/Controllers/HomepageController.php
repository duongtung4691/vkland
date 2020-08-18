<?php

namespace App\Http\Controllers;

use App\Core\Business\UploadFileBusiness;
use App\Core\Controllers\Controller;
use Illuminate\Http\Request;
use App\Core\Models\Slider;
use App\Core\Models\Template;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Ixudra\Curl\Facades\Curl;
use App\Core\Connection\RedisServer;

class HomepageController extends Controller
{
    public $limit;

    /**
     * TemplateController constructor.
     */
    public function __construct()
    {
        $this->limit = config()->get('constants.LIMIT_DATA_PAGINATE');
        $permissions = DB::table('permissions')->select('name')->where('group_name', 'template')->get();
        foreach ($permissions as $permission) {
            $this->middleware('permission:' . $permission->name, ['only' => [explode('.', $permission->name)[1]]]);
        }
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function getBannerTop(Request $request) {
        $sliders = Slider::orderBy('id', 'DESC')->paginate($this->limit);
        if ($request->getMethod() == 'POST') {
            $banner_file = $request->banner_file;
            $slide = new Slider([
                'banner_name' => $request->get('banner_name'),
                'banner_file' => ($banner_file) ? UploadFileBusiness::uploadFileToFolder($banner_file) : null,
                'banner_link' => $request->get('banner_link')
            ]);
            $slide->save();
        }
        return view('homepage.bannertop', compact('sliders'));
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function postBannerTop(Request $request) {
        $banner_file = $request->banner_file;
        $slide = new Slider([
            'banner_name' => $request->get('banner_name'),
            'banner_file' => ($banner_file) ? UploadFileBusiness::uploadFileToFolder($banner_file) : null,
            'banner_link' => $request->get('banner_link')
        ]);
        $slide->save();
        return redirect('templates/bannertop')->with('message', 'Tạo banner thành công');
    }

    /**
     * @param $id
     * @return mixed
     */
    public function deleteBannerTop($id) {
        try {
            $slider = Slider::find($id);
            $slider->delete();
            return redirect('templates/bannertop')->with('message', 'Xóa banner ' . $slider->banner_name . ' thành công');
        } catch (\Exception $exception) {
            return redirect('templates/bannertop')->with('error', 'Có lỗi xảy ra: ' . $exception->getMessage());
        }
    }

    public function banner_top_categories(Request $request) {
        $key = 'banner_top_categories';
        $posts = Posts::select('id', 'title')->get();
        $template = Template::where('key', $key)->first();
        if(!$template) {
            $template = new Template();
            $template->key = $key;
        }

        $dataTemplate = $this->getDataTemplate($request, $template);
        return view('template.bannertopcategories', compact('template', 'posts', 'dataTemplate'));
    }

    public function bannerLeft(Request $request) {
        $key = 'banner_left';
        $dataP = $this->getAllPorduct();

        $template = Template::where('key', $key)->first();
        if(!$template) {
            $template = new Template();
            $template->key = $key;
        }

        $dataTemplate = $this->getDataTemplate($request, $template);
        return view('template.bannerleft', compact('template', 'dataP', 'dataTemplate'));
    }

    public function banner_left_categories(Request $request) {
        $key = 'banner_left_categories';
        $dataP = $this->getAllPorduct();

        $template = Template::where('key', $key)->first();
        if(!$template) {
            $template = new Template();
            $template->key = $key;
        }

        $dataTemplate = $this->getDataTemplate($request, $template);
        return view('template.bannerleftcategories', compact('template', 'dataP', 'dataTemplate'));
    }

    public function sectionhd(Request $request) {
        $key = 'section_hd';
        $template = Template::where('key', $key)->first();
        if(!$template) {
            $template = new Template();
            $template->key = $key;
        }

        $dataTemplate = $this->getDataTemplate($request, $template);
        return view('template.sectionhd', compact('template','dataTemplate'));
    }

    public function sectionttnb(Request $request) {
        $key = 'section_ttnb';
        $posts = Posts::select('id', 'title')->get();
        $template = Template::where('key', $key)->first();
        if(!$template) {
            $template = new Template();
            $template->key = $key;
        }

        $dataTemplate = $this->getDataTemplate($request, $template);
        return view('template.sectionttnb', compact('template', 'posts', 'dataTemplate'));
    }

    public function sectionhdcg(Request $request) {
        $key = 'section_hdcg';
        $posts = Posts::select('id', 'title')->get();
        $template = Template::where('key', $key)->first();
        if(!$template) {
            $template = new Template();
            $template->key = $key;
        }

        $dataTemplate = $this->getDataTemplate($request, $template);
        return view('template.sectionhdcg', compact('template', 'posts', 'dataTemplate'));
    }

    public function sectionstb(Request $request) {
        $key = 'section_stb';
        $posts = Posts::select('id', 'title')->get();
        $template = Template::where('key', $key)->first();
        if(!$template) {
            $template = new Template();
            $template->key = $key;
        }

        $dataTemplate = $this->getDataTemplate($request, $template);
        return view('template.sectionstb', compact('template', 'posts', 'dataTemplate'));
    }

    /**
     * @param Request $request
     * @return mixed
     * @throws \Throwable
     */
    public function sectionbds(Request $request) {
        $key = 'section_bds';
        $template = Template::where('key', $key)->first();
        if(!$template) {
            $template = new Template();
            $template->key = $key;
        }

        $dataTemplate = $this->getDataTemplate($request, $template);
        return view('homepage.section_bds', compact('template', 'dataTemplate'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Throwable
     */
    public function sectionpartner(Request $request) {
        $key = 'section_partner';
        $template = Template::where('key', $key)->first();
        if(!$template) {
            $template = new Template();
            $template->key = $key;
        }

        $dataTemplate = $this->getDataTemplate($request, $template);
        return view('homepage.section_partner', compact('template', 'dataTemplate'));
    }

    public function sectionseo(Request $request) {
        $key = 'section_seo';
        $template = Template::where('key', $key)->first();
        if(!$template) {
            $template = new Template();
            $template->key = $key;
        }

        $dataTemplate = $this->getDataTemplate($request, $template);
        return view('homepage.sectionseo', compact('template','dataTemplate'));
    }

    /**** Start Post *****/
    public function getAllPost(Request $request)
    {
        $posts = Posts::select('id', 'title')->get();
        return response()->json($posts);
    }

    public function getDataPost(Request $request)
    {
        $postId = $request->get('id');
        $data = Posts::where('id', $postId)->first();
        return response()->json($data);
    }

    /**** Start Product *****/
    public function getProduct(Request $request) {
        $pId = $request->get('id');
        $urlP = config()->get('constants.API_FC_PRODUCT') . config()->get('constants.PRODUCT_GET_DETAIL') . $pId;
        $dataP = Curl::to($urlP)->get();
        $dataP = json_decode($dataP,  true);
        $result = [];
        if(isset($dataP['data']) && count($dataP['data']) > 0) {
            $image = '';
            if(isset($dataP['data']['ThumbnailUrl']) && $dataP['data']['ThumbnailUrl'] != '') {
                $arr_img = explode('.', $dataP['data']['ThumbnailUrl']);
                $coutA = count($arr_img);
                if($coutA > 0) {
                    $arr_img[$coutA - 2] = $arr_img[$coutA - 2] . '_' . config()->get('constants.IMAGE_SIZE_BIG');
                    $image = implode('.', $arr_img);
                    $image = config()->get('constants.PRODUCT_IMAGES') . $image;
                }

            }

            $result['id'] = isset($dataP['data']['Id']) ? $dataP['data']['Id'] : 0;
            $result['name'] = isset($dataP['data']['Id']) ? $dataP['data']['Name'] : 0;
            $result['description'] = isset($dataP['data']['ShortDescription1']) ? $dataP['data']['ShortDescription1'] : '';
            $result['image'] = $image;
            $result['price'] = isset($dataP['data']['ProductSkus'][0]['SalePrice']) ? $dataP['data']['ProductSkus'][0]['SalePrice'] : 0;
            $result['saleprice'] = isset($dataP['data']['ProductSkus'][0]['SalePrice']) ? $dataP['data']['ProductSkus'][0]['SalePrice'] : 0;
            //$result['share_url'] = isset($dataP['data']['Name']) ? 'san-pham/' .  \App\Core\Utilities\HtmlFormatUtility::get_slug_alias($dataP['data']['Name']) : '';
            $result['share_url'] = isset($dataP['data']['Name']) ? 'san-pham/' .  $dataP['data']['SeoId'] : '';
        }

        return response()->json($result);
    }

    public function getProducts(Request $request) {
        $dataP = $this->getAllPorduct();
        return response()->json($dataP);
    }

    private function getAllPorduct() {
        $urlP = config()->get('constants.API_FC_PRODUCT') . config()->get('constants.PRODUCT_GET_ALL_DETAILS');
        $dataP = Curl::to($urlP)->get();
        $dataP = json_decode($dataP,  true);
        $result = [];
        if(count($dataP)) {
            foreach ($dataP as $row) {
                $result[] = array('id' => $row['Id'], 'name' => $row['Name']);
            }
        }

        return $result;
    }

    /**
     * @param $request
     * @param $postData
     * @param $template
     * @return array
     * @throws \Throwable
     */
    private function getDataTemplate($request, $template) {
        if($request->isMethod('post')) {
            $postData = $request->post();
            $dataTemplate = [];
            $dataTemplate_selected = [];
            if(count($postData['post_title'])) {
                $files = $request->file('post_image_file');
                foreach ($postData['post_title'] as $k => $v) {
                    if(isset($postData['post_title'][$k]) &&  $postData['post_title'][$k] != '') {
                        $pathFile = '';
                        if(isset($files[$k])) {
                            $pathFile = $this->upload($files[$k]);
                        }

                        if($pathFile != '') {
                            $data['post_image'] = $pathFile;
                        } else {
                            $data['post_image'] = isset($postData['post_image'][$k]) ? $postData['post_image'][$k] : '';
                        }

                        if(isset($postData['post_id'][$k])) {
                            $data['post_id'] = $postData['post_id'][$k];
                        }

                        if(isset($postData['post_price'][$k])) {
                            $data['post_price'] = $postData['post_price'][$k];
                        }

                        if(isset($postData['post_saleprice'][$k])) {
                            $data['post_saleprice'] = $postData['post_saleprice'][$k];
                        }

                        $data['post_title'] = isset($postData['post_title'][$k]) ? $postData['post_title'][$k] : '';
                        $data['post_excerpt'] = isset($postData['post_excerpt'][$k]) ? $postData['post_excerpt'][$k] : '';
                        $data['post_link'] = isset($postData['post_link'][$k]) ? $postData['post_link'][$k] : '';
                        $data['post_display'] = isset($postData['post_display'][$k]) ? $postData['post_display'][$k] : '';
                        if(isset($data['post_display']) && $data['post_display'] == '1'){
                            $dataTemplate_selected[] = $data;
                        }
                        $dataTemplate[] = $data;
                    }
                }
            }

            $dataTemplate_selected = isset($dataTemplate_selected) && count($dataTemplate_selected) > 0 ? $dataTemplate_selected : $dataTemplate;

            $template->name = $postData['name'];
            $template->data_template = json_encode($dataTemplate, JSON_UNESCAPED_UNICODE);
            $template->content = view('homepage.' . $template->key)->with('dataT', $dataTemplate_selected)->render();
            $template->save();
        } else {
            $dataTemplate = json_decode($template->data_template, true);
            if(!$dataTemplate) {
                $dataTemplate[0]['post_id'] = 0;
                $dataTemplate[0]['post_title'] = '';
                $dataTemplate[0]['post_image'] = '';
                $dataTemplate[0]['post_excerpt'] = '';
                $dataTemplate[0]['post_price'] = 0;
                $dataTemplate[0]['post_saleprice'] = 0;
                $dataTemplate[0]['post_link'] = '';
                $dataTemplate[0]['post_display'] = 0;
            }
        }

        return $dataTemplate;
    }

    private function upload($file) {
//        $yearDir = date('Y');
//        $monthDir = date('m');
//        $dayDir = date('d');
//        $original_name = $file->getClientOriginalName();
//        Storage::disk('sftp')->put('/' . $yearDir . '/' . $monthDir . '/' . $dayDir . '/' . $original_name, fopen($file, 'r+'));
//        UploadFileBusiness::setFolderPublic($yearDir, $monthDir, $dayDir);
//        $pathFile = config()->get('constants.STATIC_IMAGES') . '/' . $yearDir . '/' . $monthDir . '/' . $dayDir . '/' . $original_name;
        return UploadFileBusiness::uploadFileToFolder($file);
    }
}
