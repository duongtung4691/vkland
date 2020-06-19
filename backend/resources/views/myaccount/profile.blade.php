@extends('layouts.default')
@section('content')
<div class="page-title">
    <div class="title_left">
        <h3>Tài khoản của tôi</h3>
    </div>
</div>
<div class="clearfix"></div>
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Thay đổi mật khẩu</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="col-md-3 col-sm-3 col-xs-12 profile_left">
                    <div class="profile_img">
                        <div id="crop-avatar">
                            <!-- Current avatar -->
                            <img class="img-responsive avatar-view" src="{{ asset('assets/images/user.png') }}" alt="Avatar" title="Change the avatar">
                        </div>
                    </div>
                    <h3>{{ auth()->user()->name }}</h3>
                </div>
                <div class="col-md-9 col-sm-9 col-xs-12">
                    @include('components.alert')
                    <form class="form-horizontal form-label-left input_mask" action="{{ url('account/profile') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Họ và tên</label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <input type="text" class="form-control" name="name" required="required" value="{{ auth()->user()->name }}" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Email</label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <input type="text" class="form-control" name="email" required="required" value="{{ auth()->user()->email }}" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Mật khẩu cũ <span
                                    class="required">*</span></label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <input type="password" class="form-control" name="old_password" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Mật khẩu mới <span
                                    class="required">*</span></label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <input type="password" class="form-control" name="new_password" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Nhập lại mật khẩu mới <span
                                    class="required">*</span></label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <input type="password" class="form-control" name="confirm_password" required>
                            </div>
                        </div>
                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                                <button type="submit" class="btn btn-success">Lưu</button>
                                <button class="btn btn-primary" type="reset">Nhập lại</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="x_panel">
            <div class="x_content">
                <h2>Thống kê bài đã viết</h2>
                <!-- start recent activity -->
                @if(!empty((array)$myPosts))
                    <?php $myPosts->setPath('/account/profile'); ?>
                    {{ $myPosts->links() }}
                    <ul class="messages">
                        @foreach($myPosts as $post)
                        <li>
                            <div class="message_date">
                                <h3 class="date text-info">{{ date('d', $post->published_at) }}</h3>
                                <p class="month">{{ date('m/Y', $post->published_at) }}</p>
                            </div>
                            <div class="message_wrapper">
                                @foreach($categories as $category)
                                    @if($category->id == $post->category_id)
                                        <h4 class="heading">{{ $category->name }}</h4>
                                    @endif
                                @endforeach
                                <blockquote class="message">{{ $post->title }}</blockquote><br/>
                                <p class="url">
                                    <a href="{{ url("category/$post->category_id/posts/edit/$post->id") }}" target="_blank"><i class="fa fa-edit"></i> Sửa</a>
                                </p>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                    <?php $myPosts->setPath('/account/profile'); ?>
                    {{ $myPosts->links() }}
                @endif
                <!-- end recent activity -->
            </div>
        </div>
    </div>
</div>
@endsection
