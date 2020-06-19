<?php
switch ($action) {
    case 'show':
        $attribute = 'disabled';
        break;
    default:
        $attribute = '';
        break;
}
?>
@extends('layouts.default')
@section('content')
    <div class="page-title">
        <div class="title_left">
            <a href="{{ url('/users') }}" title="Tạo mới user" class="btn btn-primary"><i class="fa fa-pencil-square-o"></i> Tạo mới user</a>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
        @include('components.alert')
        <div class="col-md-6 col-sm-6 col-xs-6">
            <div class="x_panel">
                <div class="x_title">
                    <h2>{{ ucfirst($action) }} user {{ $user->name }}</h2>
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
                    <form class="form-horizontal form-label-left input_mask" action="{{ url('users/update/' . $user->id) }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Họ và tên <span
                                        class="required">*</span></label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <input type="text" class="form-control" name="name" required="required" value="{{ $user->name }}" {{ $attribute }}>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Email <span
                                        class="required">*</span></label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <input type="text" class="form-control" name="email" required="required" value="{{ $user->email }}" {{ $attribute }}>
                            </div>
                        </div>
                        @if ($action != 'show')
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Password</label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <input type="text" class="form-control" name="password">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Nhập lại password</label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <input type="text" class="form-control" name="confirm-password">
                            </div>
                        </div>
                        @endif
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Quyền </label>
                            <div class="col-md-5 col-sm-5 col-xs-12">
                                <select class="form-control" name="roles[]" {{ $attribute }}>
                                    @foreach($roles as $role)
                                        <option value="{{ $role->id }}"<?php echo (isset($userRole[0]) && $role->id == $userRole[0] ? ' selected' : ''); ?>>{{ $role->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        @if ($action != 'show')
                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                                    <button type="submit" class="btn btn-success">Lưu</button>
                                </div>
                            </div>
                        @endif
                    </form>
                </div>
            </div>
        </div>
        @include('users.list')
    </div>
@endsection
