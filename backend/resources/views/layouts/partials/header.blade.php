<div class="navbar nav_title" style="border: 0;">
    <a href="{{ url('/') }}" class="site_title"><i class="fa fa-empire"></i> <span>BĐSCMS&#183;Dash</span></a>
</div>
<div class="clearfix"></div>
<!-- menu profile quick info -->
<div class="profile clearfix">
    <div class="profile_pic">
        <img src="{{ asset(config()->get('constants.FOLDER_PUBLIC').'/assets/images/user.png') }}" alt="..." class="img-circle profile_img">
    </div>
    <div class="profile_info">
        <span>Chào mừng,</span>
        <h2>{{ auth()->user()->name }}</h2>
    </div>
</div>
<!-- /menu profile quick info -->
<br />
