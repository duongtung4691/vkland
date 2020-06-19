@extends('layouts.default')
@section('content')
    <div class="page-title">
        <div class="title_left">
            <h3>Cài đặt</h3>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
        @include('components.alert')
        <div class="col-md-5 col-sm-5 col-xs-5">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Thông tin liên hệ website</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br/>
                    <form class="form-horizontal form-label-left input_mask" action="{{ url('contact/store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Tên công ty liên hệ</label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <input type="text" class="form-control" name="company_contact" value="{{ $contact['company_contact'] ?? '' }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Số điện thoại liên hệ</label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <input type="text" class="form-control" name="telephone_contact" value="{{ $contact['telephone_contact'] ?? '' }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Fax liên hệ</label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <input type="text" class="form-control" name="fax_contact" value="{{ $contact['fax_contact'] ?? '' }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Tên website</label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <input type="text" class="form-control" name="website_name" value="{{ $contact['website_name'] ?? '' }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Website liên hệ</label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <input type="text" class="form-control" name="website_contact" value="{{ $contact['website_contact'] ?? '' }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Email liên hệ</label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <input type="text" class="form-control" name="email_contact" value="{{ $contact['email_contact'] ?? '' }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Địa chỉ liên hệ</label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <input type="text" class="form-control" name="address_contact" value="{{ $contact['address_contact'] ?? '' }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Thời gian hỗ trợ</label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <input type="text" class="form-control" name="timer_support" value="{{ $contact['timer_support'] ?? '' }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Logo công ty</label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <input type="file" class="form-control" name="logo_company" value="{{ $contact['logo_company'] ?? '' }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Copyright trái</label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <textarea class="form-control editor_basic" name="copyright_left" id="copyright_left">{{ $contact['copyright_left'] ?? '' }}</textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Copyright phải</label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <textarea class="form-control editor_basic" name="copyright_right" id="copyright_right">{{ $contact['copyright_right'] ?? '' }}</textarea>
                            </div>
                        </div>
                        <input type="hidden" name="user_id" value="{{(auth()->user()) ? auth()->user()->id : 0}}">
                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                                <button type="submit" class="btn btn-success">Lưu</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-7 col-sm-7 col-xs-7">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Hình ảnh minh họa</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    @include('setting.preview')
                </div>
            </div>
        </div>
    </div>
@endsection
