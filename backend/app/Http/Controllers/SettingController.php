<?php

namespace App\Http\Controllers;

use App\Core\Controllers\Controller;
use App\Core\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SettingController extends Controller
{
    /**
     * SettingController constructor.
     */
    public function __construct()
    {
        $permissions = DB::table('permissions')->select('name')->where('group_name', 'setting')->get();
        foreach ($permissions as $permission) {
            $this->middleware('permission:' . $permission->name, ['only' => [explode('.', $permission->name)[1]]]);
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function contact()
    {
        $setting = Setting::where('key', '=', 'footer_info')->first();
        if (!empty((array)$setting))
            $contact = json_decode($setting->value, true);
        else
            $contact = array('telephone_contact' => '', 'email_contact' => '', 'address_contact' => '', 'timer_support' => '', 'copyright_left' => '', 'copyright_right' => '');
        $allow_update_html_landingpage = Setting::select('value')->where('key', 'allow_update_html_landingpage')->orderBy('id', 'ASC')->first();
        return view('setting.index', compact('contact', 'allow_update_html_landingpage'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeContact(Request $request)
    {
        try {
            $key = 'footer_info';
            $setting = Setting::where('key', '=', $key);
            $contact = json_decode($setting->first()->value);
            $logo_header_company = $request->logo_header_company;
            $logo_company = $request->logo_company;
            $value = array(
                'company_contact' => $request->get('company_contact'),
                'telephone_contact' => $request->get('telephone_contact'),
                'fax_contact' => $request->get('fax_contact'),
                'website_name' => $request->get('website_name'),
                'website_contact' => $request->get('website_contact'),
                'email_contact' => $request->get('email_contact'),
                'address_contact' => $request->get('address_contact'),
                'timer_support' => $request->get('timer_support'),
                'logo_header_company' => ($logo_header_company) ? '/assets/images/logo/' . $logo_header_company->getClientOriginalName() : ($contact->logo_header_company ? $contact->logo_header_company : null),
                'logo_company' => ($logo_company) ? '/assets/images/logo/' . $logo_company->getClientOriginalName() : ($contact->logo_company ? $contact->logo_company : null),
                'copyright_left' => $request->get('copyright_left'),
                'copyright_right' => $request->get('copyright_right')
            );
            if ($logo_header_company) {
                // Upload file to local server
                $logo_header_company->move('assets/images/logo', $logo_header_company->getClientOriginalName());
            }
            if ($logo_company) {
                // Upload file to local server
                $logo_company->move('assets/images/logo', $logo_company->getClientOriginalName());
            }
            // TH setting có tồn tại ==> Update setting
            if ($setting->exists()) {
                $setting->update([
                    'key' => $key,
                    'value' => json_encode($value),
                    'user_id' => $request->get('user_id')
                ]);
                return redirect('/contact')->with('message', 'Sửa thông tin liên hệ thành công');
            } else { // TH setting không tồn tại ==> Tạo mới setting
                $setting = new Setting([
                    'key' => $key,
                    'value' => json_encode($value),
                    'user_id' => $request->get('user_id')
                ]);
                $setting->save();
                return redirect('/contact')->with('message', 'Tạo mới thông tin liên hệ thành công');
            }
        } catch (\Exception $exception) {
            return redirect('/contact')->with('error', 'Có lỗi xảy ra: ' . $exception->getMessage());
        }
    }
}
