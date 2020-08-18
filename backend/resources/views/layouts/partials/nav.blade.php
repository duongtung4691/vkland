<!-- sidebar menu -->
<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section">
        <h3>Quản lý</h3>
        <ul class="nav side-menu">
            <li><a href="{{ url('/') }}"><i class="fa fa-home"></i> Dashboard </a></li>
            <li><a href="{{ url('/category') }}"><i class="fa fa fa-list"></i> Danh mục</a></li>
            <li><a href="{{ url('/posts') }}"><i class="fa fa-file-text"></i> Danh sách bài viết</a></li>
            <li><a><i class="fa fa-building-o"></i> Đào tạo <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="{{ url('landingpage/chung-chi-moi-gioi-bat-dong-san') }}">Chứng chỉ môi giới bất động sản</a></li>
                </ul>
            </li>
            <li><a href="{{ url('/tags') }}" title="Quản lý tag"><i class="fa fa-tags"></i> Quản lý tag</a></li>
            <li><a><i class="fa fa-users"></i> Quản lý user <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="{{ url('/users') }}">Danh sách user</a></li>
                </ul>
            </li>
            <li><a><i class="fa fa-gear"></i>Cấu hình trang chủ<span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="{{ url('/templates/bannertop') }}">Banner top</a></li>
                    <li><a href="{{ url('/templates/sectionbds') }}">Vi sao chọn bất động sản</a></li>
                    <li><a href="{{ url('/templates/sectionpartner') }}">Đối tác bất động sản</a></li>
                    <li><a href="{{ url('/templates/sectionseo') }}">Seo trang chủ</a></li>
                </ul>
            </li>
            <li><a href="{{ url('/contact') }}"><i class="fa fa-globe"></i> Quản lý thông tin website</a></li>
            <li><a><i class="fa fa-laptop"></i> Quản lý widget <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="{{ url('/menu') }}">Danh sách menu</a></li>
                </ul>
            </li>
        </ul>
    </div>
</div>
<!-- /sidebar menu -->
