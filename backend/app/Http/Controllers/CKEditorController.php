<?php

namespace App\Http\Controllers;

use App\Core\Business\UploadFileBusiness;
use App\Core\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class CKEditorController extends Controller
{
    /**
     * CKEditorController constructor.
     */
    public function __construct()
    {
        $permissions = DB::table('permissions')->select('name')->whereIn('group_name', ['ckeditor'])->get();
        foreach ($permissions as $permission) {
            $this->middleware('permission:' . $permission->name, ['only' => [explode('.', $permission->name)[1]]]);
        }
    }

    public function upload(Request $request)
    {
        if ($request->hasFile('upload')) {

            //Upload File
            $yearDir = date('Y');
            $monthDir = date('m');
            $dayDir = date('d');

            $file = $request->upload;
            $original_name = '';
            if ($file) {
                $original_name = $file->getClientOriginalName();
            }

            $CKEditorFuncNum = $request->input('CKEditorFuncNum');

            $url = config()->get('constants.STATIC_IMAGES') . '/' . $yearDir . '/' . $monthDir . '/' . $dayDir . '/' . $original_name;
            //$msg = 'Image successfully uploaded: ' . $destinationPath . $original_name;
            UploadFileBusiness::uploadFileToFolder($file);
            $msg = 'Upload ảnh lên server thành công';
            $re = "<script>window.parent.CKEDITOR.tools.callFunction(81, '$url', '$msg')</script>";

            // Render HTML output
            @header('Content-type: text/html; charset=utf-8');
            echo $re;
        }
    }
}
