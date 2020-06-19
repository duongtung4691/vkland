@extends('layouts.default')
@section('content')
    <div class="page-title">
        <div class="title_left">
            <a href="{{ url('/menu') }}" title="Tạo mới menu" class="btn btn-primary"><i class="fa fa-pencil-square-o"></i> Tạo mới menu</a>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
        @include('components.alert')
        <div class="col-md-6 col-sm-6 col-xs-6">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Sửa menu</h2>
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
                    <form class="form-horizontal form-label-left input_mask" action="{{ url('menu/update/' . $menu->id) }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Menu cha</label>
                            <div class="col-md-5 col-sm-5 col-xs-12">
                                <select class="form-control" name="parent_id">
                                    <option value="0" selected>Không</option>
                                    @foreach($menus as $item)
                                        <option value="{{ $item->id }}"{{ $menu->parent_id == $item->id ? ' selected' : '' }}>{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Vị trí</label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <select class="form-control" name="position" required>
                                    <option value="">-- Chọn --</option>
                                    <option value="menu_header"{{ $menu->position == 'menu_header' ? ' selected' : '' }}>Menu trên header</option>
                                    <option value="menu_footer_1"{{ $menu->position == 'menu_footer_1' ? ' selected' : '' }}>Menu dưới footer cột 1</option>
                                    <option value="menu_footer_2"{{ $menu->position == 'menu_footer_2' ? ' selected' : '' }}>Menu dưới footer cột 2</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Hiển thị ngoài frontend</label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <div class="checkbox">
                                    <input type="checkbox" class="flat" name="is_actived" value="1"{{ $menu->is_actived == 1 ? ' checked' : '' }}>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Tên menu <span
                                    class="required">*</span></label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <input type="text" class="form-control" name="item_title" required="required" value="{{ $menu->item_title }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Link menu <span
                                    class="required">*</span></label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <input type="text" class="form-control" name="item_url" required="required" value="{{ $menu->item_url }}">
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
        @include('menu.list')
    </div>
@endsection
