<?php
$action = 'edit';
$attribute = 'readonly';
if (empty($landingpage->content)) {
    $landingpage = new stdClass();
    $landingpage->id = '';
    $landingpage->title = '';
    $landingpage->excerpt = '';
    $landingpage->content = '';
    $landingpage->latitude = '';
    $landingpage->longitude = '';
    $landingpage->author_name = '';
}
?>
@extends('layouts.default')
@section('content')
    <link rel="stylesheet" href="https://vinhthaicommunication.com/wp-content/plugins/elementor/assets/css/frontend.min.css?ver=2.7.4">
    <link rel="stylesheet" href="https://vinhthaicommunication.com/wp-content/uploads/elementor/css/post-2821.css?ver=1593557881">
    <div class="page-title">
        <div class="title_left">
            <h3><a href="{{ url('/landingpage') }}" title="Quay về danh sách các trang thiết kế">&larr; Quay về danh sách các trang thiết kế</a></h3>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
        @include('components.alert')
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>{{ ucfirst($action) }} bài viết {{ $landingpage->title }}</h2>
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
                    <form class="form-horizontal form-label-left input_mask" action="{{ url('landingpage/update') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label class="control-label col-md-2 col-sm-2 col-xs-12">Tiêu đề <span
                                        class="required">*</span></label>
                            <div class="col-md-10 col-sm-10 col-xs-12">
                                <input type="text" class="form-control" name="title" required="required" value="Chứng chỉ môi giới bất động sản" {{ $attribute }}>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-2 col-sm-2 col-xs-12">Banner</label>
                            <div class="col-md-10 col-sm-10 col-xs-12">
                                <textarea id="excerpt" class="editor form-control" name="excerpt" rows="3">
                                    @if (empty($landingpage->excerpt))
                                        <section class="hero-banner hero-about">
                                            <div class="container">
                                                <div class="hero-ct ">
                                                    <h2>
                                                        Chứng chỉ môi giới bất động sản
                                                    </h2>
                                                </div>
                                            </div>
                                        </section>
                                    @else
                                        {{ $landingpage->excerpt }}
                                    @endif
                                </textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-2 col-sm-2 col-xs-12">Nội dung <span
                                        class="required">*</span></label>
                            <div class="col-md-10 col-sm-10 col-xs-12">
                            <textarea id="content" class="editor form-control" name="introduction">
                                @if (empty($landingpage->content))
                                    <section class="elementor-element elementor-element-3ed8635 elementor-section-boxed elementor-section-height-default elementor-section-height-default elementor-section elementor-top-section" data-id="3ed8635" data-element_type="section">
                                        <div class="elementor-container elementor-column-gap-default">
                                            <div class="elementor-row">
                                                <div class="elementor-element elementor-element-52586a2 elementor-column elementor-col-100 elementor-top-column" data-id="52586a2" data-element_type="column">
                                                    <div class="elementor-column-wrap  elementor-element-populated">
                                                        <div class="elementor-widget-wrap">
                                                            <section class="elementor-element elementor-element-35fd9e3 elementor-section-boxed elementor-section-height-default elementor-section-height-default elementor-section elementor-inner-section" data-id="35fd9e3" data-element_type="section">
                                                                <div class="elementor-container elementor-column-gap-default">
                                                                    <div class="elementor-row">
                                                                        <div class="elementor-element elementor-element-67ca380 elementor-column elementor-col-33 elementor-inner-column" data-id="67ca380" data-element_type="column">
                                                                            <div class="elementor-column-wrap  elementor-element-populated">
                                                                                <div class="elementor-widget-wrap">
                                                                                    <div class="elementor-element elementor-element-9b913b0 elementor-widget elementor-widget-image" data-id="9b913b0" data-element_type="widget" data-widget_type="image.default">
                                                                                        <div class="elementor-widget-container">
                                                                                            <div class="elementor-image">
                                                                                                <img width="640" height="428" src="https://vinhthaicommunication.com/wp-content/uploads/2019/08/LEE_8206-768x513.jpg" class="attachment-medium_large size-medium_large" alt="" srcset="https://vinhthaicommunication.com/wp-content/uploads/2019/08/LEE_8206-768x513.jpg 768w, https://vinhthaicommunication.com/wp-content/uploads/2019/08/LEE_8206-390x260.jpg 390w, https://vinhthaicommunication.com/wp-content/uploads/2019/08/LEE_8206-500x333.jpg 500w, https://vinhthaicommunication.com/wp-content/uploads/2019/08/LEE_8206-960x640.jpg 960w"
                                                                                                     sizes="(max-width: 640px) 100vw, 640px">
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="elementor-element elementor-element-4231cce elementor-column elementor-col-33 elementor-inner-column" data-id="4231cce" data-element_type="column">
                                                                            <div class="elementor-column-wrap">
                                                                                <div class="elementor-widget-wrap">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="elementor-element elementor-element-46eedd1 elementor-column elementor-col-33 elementor-inner-column" data-id="46eedd1" data-element_type="column">
                                                                            <div class="elementor-column-wrap  elementor-element-populated">
                                                                                <div class="elementor-widget-wrap">
                                                                                    <div class="elementor-element elementor-element-9230dc5 elementor-widget elementor-widget-heading" data-id="9230dc5" data-element_type="widget" data-widget_type="heading.default">
                                                                                        <div class="elementor-widget-container">
                                                                                            <h2 class="elementor-heading-title elementor-size-large">GIÁO TRÌNH CỦA KHÓA HỌC</h2>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="elementor-element elementor-element-2f21fa6 elementor-widget elementor-widget-divider" data-id="2f21fa6" data-element_type="widget" data-widget_type="divider.default">
                                                                                        <div class="elementor-widget-container">
                                                                                            <div class="elementor-divider">
                                                                                                <span class="elementor-divider-separator"></span>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="elementor-element elementor-element-f9f5ed9 elementor-widget elementor-widget-text-editor" data-id="f9f5ed9" data-element_type="widget" data-widget_type="text-editor.default">
                                                                                        <div class="elementor-widget-container">
                                                                                            <div class="elementor-text-editor elementor-clearfix">
                                                                                                <p><span style="font-size: 12pt;"><b>Khoá học Basic Marketing Tree </b>xây dựng dựa trên phương pháp “Thị Phạm” phân tích quy trình, cách thức làm Marketing từ những tập đoàn hàng đầu Việt Nam và thế giới. Cùng với đó, là 12 năm kinh nghiệm thực chiến bắt đầu từ việc startup thành công với hai thương hiệu SEONGON, Vĩnh Thái và tư vấn Marketing chiến lược cho các doanh nghiệp vừa và nhỏ tại Việt Nam. Chúng tôi đã hệ thống hoá kiến thức Marketing theo mô hình “Cây Marketing” một cách bài bản, dễ nhớ, dễ hiểu và dễ thực hiện.</span></p>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="elementor-element elementor-element-0a84ca3 elementor-widget elementor-widget-text-editor" data-id="0a84ca3" data-element_type="widget" data-widget_type="text-editor.default">
                                                                                        <div class="elementor-widget-container">
                                                                                            <div class="elementor-text-editor elementor-clearfix">
                                                                                                <p><span style="font-family: 'times new roman', times, serif;"><span style="font-size: 14pt;">“Hứa hẹn một khởi đầu vững chắc&nbsp;</span><span style="font-size: 14pt;">cho</span></span>
                                                                                                </p>
                                                                                                <p><span style="font-size: 14pt; font-family: 'times new roman', times, serif;">chặng đường Marketing thành công”</span></p>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </section>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                    <section class="elementor-element elementor-element-676f271 elementor-section-boxed elementor-section-height-default elementor-section-height-default elementor-section elementor-top-section" data-id="676f271" data-element_type="section">
                                        <div class="elementor-container elementor-column-gap-default">
                                            <div class="elementor-row">
                                                <div class="elementor-element elementor-element-be0c3c1 elementor-column elementor-col-100 elementor-top-column" data-id="be0c3c1" data-element_type="column">
                                                    <div class="elementor-column-wrap  elementor-element-populated">
                                                        <div class="elementor-widget-wrap">
                                                            <section class="elementor-element elementor-element-3a28884 elementor-section-boxed elementor-section-height-default elementor-section-height-default elementor-section elementor-inner-section" data-id="3a28884" data-element_type="section">
                                                                <div class="elementor-container elementor-column-gap-default">
                                                                    <div class="elementor-row">
                                                                        <div class="elementor-element elementor-element-2cd3a3f elementor-column elementor-col-33 elementor-inner-column" data-id="2cd3a3f" data-element_type="column">
                                                                            <div class="elementor-column-wrap  elementor-element-populated">
                                                                                <div class="elementor-widget-wrap">
                                                                                    <div class="elementor-element elementor-element-2eb218d elementor-widget elementor-widget-heading" data-id="2eb218d" data-element_type="widget" data-widget_type="heading.default">
                                                                                        <div class="elementor-widget-container">
                                                                                            <h2 class="elementor-heading-title elementor-size-default">Basic Marketing Tree sẽ giúp bạn</h2>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="elementor-element elementor-element-5f5dfd0 elementor-widget elementor-widget-divider" data-id="5f5dfd0" data-element_type="widget" data-widget_type="divider.default">
                                                                                        <div class="elementor-widget-container">
                                                                                            <div class="elementor-divider">
                                                                                                <span class="elementor-divider-separator">
                                                            </span>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="elementor-element elementor-element-6f68a14 elementor-widget elementor-widget-text-editor" data-id="6f68a14" data-element_type="widget" data-widget_type="text-editor.default">
                                                                                        <div class="elementor-widget-container">
                                                                                            <div class="elementor-text-editor elementor-clearfix">
                                                                                                <ul style="list-style-type: disc;">
                                                                                                    <li>&nbsp;Hiểu và xây dựng được hệ thống qui trình làm Marketing tổng thể. Từ đó có thể lên được kế hoạch Marketing chi tiết theo từng tháng Quí Năm</li>
                                                                                                    <li>&nbsp;Học cách sử dụng tư duy Marketing từ việc nghiên cứu thị trường phân đoạn thị trường, lựa chọn nhóm khách hàng mục tiêu từ đó phân tích insight một cách sâu sắc để tạo dựng mối quan
                                                                                                        hệ lâu dài với khách hàng mục tiêu.</li>
                                                                                                    <li>Hiểu và xây dựng nên nền tảng thương hiệu ( phần hồn của thương hiệu) và cách thức truyền thông thương hiệu</li>
                                                                                                    <li>&nbsp;Lựa chọn các kênh truyền thông tối ưu cho sản phẩm và xây dựng kế hoạch truyền thông tích hợp đa kênh và phân bổ ngân sách sao cho hiệu quả nhất.</li>
                                                                                                    <li>Đặc biệt trong khóa học, bạn sẽ được “cầm tay chỉ việc” trên chính mô hình kinh doanh do các bạn mang tới dưới sự dẫn dắt của những huấn luyện viên chuyên nghiệp có nhiều năm kinh nghiệm
                                                                                                        thực chiến.</li>
                                                                                                </ul>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="elementor-element elementor-element-5ea58d5 elementor-column elementor-col-33 elementor-inner-column" data-id="5ea58d5" data-element_type="column">
                                                                            <div class="elementor-column-wrap">
                                                                                <div class="elementor-widget-wrap">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="elementor-element elementor-element-4284ed7 elementor-column elementor-col-33 elementor-inner-column" data-id="4284ed7" data-element_type="column">
                                                                            <div class="elementor-column-wrap  elementor-element-populated">
                                                                                <div class="elementor-widget-wrap">
                                                                                    <div class="elementor-element elementor-element-53fc285 elementor-widget elementor-widget-spacer" data-id="53fc285" data-element_type="widget" data-widget_type="spacer.default">
                                                                                        <div class="elementor-widget-container">
                                                                                            <div class="elementor-spacer">
                                                                                                <div class="elementor-spacer-inner"></div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="elementor-element elementor-element-7a61b85 elementor-widget elementor-widget-spacer" data-id="7a61b85" data-element_type="widget" data-widget_type="spacer.default">
                                                                                        <div class="elementor-widget-container">
                                                                                            <div class="elementor-spacer">
                                                                                                <div class="elementor-spacer-inner"></div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="elementor-element elementor-element-41977e5 elementor-widget elementor-widget-image" data-id="41977e5" data-element_type="widget" data-widget_type="image.default">
                                                                                        <div class="elementor-widget-container">
                                                                                            <div class="elementor-image">
                                                                                                <img width="640" height="427" src="https://vinhthaicommunication.com/wp-content/uploads/2019/11/ws9-768x512.jpg" class="attachment-medium_large size-medium_large" alt="" srcset="https://vinhthaicommunication.com/wp-content/uploads/2019/11/ws9-768x512.jpg 768w, https://vinhthaicommunication.com/wp-content/uploads/2019/11/ws9-390x260.jpg 390w, https://vinhthaicommunication.com/wp-content/uploads/2019/11/ws9-500x333.jpg 500w, https://vinhthaicommunication.com/wp-content/uploads/2019/11/ws9-960x640.jpg 960w"
                                                                                                     sizes="(max-width: 640px) 100vw, 640px"> </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </section>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                    <section class="elementor-element elementor-element-118e0edc elementor-section-stretched elementor-section-full_width elementor-section-height-default elementor-section-height-default elementor-section elementor-top-section" data-id="118e0edc" data-element_type="section"
                                             data-settings="{&quot;background_background&quot;:&quot;classic&quot;,&quot;stretch_section&quot;:&quot;section-stretched&quot;}" style="width: 1903px; left: 0px;">
                                        <div class="elementor-container elementor-column-gap-default">
                                            <div class="elementor-row">
                                                <div class="elementor-element elementor-element-64cded51 elementor-column elementor-col-100 elementor-top-column" data-id="64cded51" data-element_type="column" data-settings="{&quot;background_background&quot;:&quot;gradient&quot;}">
                                                    <div class="elementor-column-wrap  elementor-element-populated">
                                                        <div class="elementor-widget-wrap">
                                                            <div class="elementor-element elementor-element-5e6abc3 elementor-widget elementor-widget-spacer" data-id="5e6abc3" data-element_type="widget" data-widget_type="spacer.default">
                                                                <div class="elementor-widget-container">
                                                                    <div class="elementor-spacer">
                                                                        <div class="elementor-spacer-inner"></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="elementor-element elementor-element-1f784ef4 elementor-widget elementor-widget-heading" data-id="1f784ef4" data-element_type="widget" data-widget_type="heading.default">
                                                                <div class="elementor-widget-container">
                                                                    <h3 class="elementor-heading-title elementor-size-xl">Đội ngũ giảng viên</h3>
                                                                </div>
                                                            </div>
                                                            <section class="elementor-element elementor-element-84bad60 elementor-hidden-desktop elementor-hidden-tablet elementor-section-boxed elementor-section-height-default elementor-section-height-default elementor-section elementor-inner-section" data-id="84bad60"
                                                                     data-element_type="section">
                                                                <div class="elementor-container elementor-column-gap-default">
                                                                    <div class="elementor-row">
                                                                        <div class="elementor-element elementor-element-0b3e3ec elementor-column elementor-col-50 elementor-inner-column" data-id="0b3e3ec" data-element_type="column" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
                                                                            <div class="elementor-column-wrap  elementor-element-populated">
                                                                                <div class="elementor-background-overlay"></div>
                                                                                <div class="elementor-widget-wrap">
                                                                                    <div class="elementor-element elementor-element-4e4e038 elementor-widget elementor-widget-heading" data-id="4e4e038" data-element_type="widget" data-widget_type="heading.default">
                                                                                        <div class="elementor-widget-container">
                                                                                            <h4 class="elementor-heading-title elementor-size-small">Trần Mạnh Hùng</h4>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="elementor-element elementor-element-71fa886 elementor-widget elementor-widget-heading" data-id="71fa886" data-element_type="widget" data-widget_type="heading.default">
                                                                                        <div class="elementor-widget-container">
                                                                                            <p class="elementor-heading-title elementor-size-default">Giảng viên chính</p>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="elementor-element elementor-element-bebcb50 elementor-shape-square elementor-widget elementor-widget-social-icons" data-id="bebcb50" data-element_type="widget" data-widget_type="social-icons.default">
                                                                                        <div class="elementor-widget-container">
                                                                                            <div class="elementor-social-icons-wrapper">
                                                                                                <a href="https://www.facebook.com/profile.php?id=100003759479026" class="elementor-icon elementor-social-icon elementor-social-icon-facebook elementor-repeater-item-1941d85" target="_blank" rel="nofollow">
                                                        <span class="elementor-screen-only">Facebook</span>
                                                                                <i class="fa fa-facebook"></i>
                                                                        </a>
                                                                                                <a href="https://twitter.com/vinhthaimkt" class="elementor-icon elementor-social-icon elementor-social-icon-twitter elementor-repeater-item-35taigz" target="_blank" rel="nofollow">
                                                        <span class="elementor-screen-only">Twitter</span>
                                                                                <i class="fa fa-twitter"></i>
                                                                        </a>
                                                                                                <a href="https://plus.google.com/u/0/117017637710532699319" class="elementor-icon elementor-social-icon elementor-social-icon-google-plus elementor-repeater-item-v4j6m1j" target="_blank" rel="nofollow">
                                                        <span class="elementor-screen-only">Google-plus</span>
                                                                                <i class="fa fa-google-plus"></i>
                                                                        </a>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="elementor-element elementor-element-4849430 elementor-widget elementor-widget-text-editor" data-id="4849430" data-element_type="widget" data-widget_type="text-editor.default">
                                                                                        <div class="elementor-widget-container">
                                                                                            <div class="elementor-text-editor elementor-clearfix">
                                                                                                <p style="text-align: right;">Founder, CEO Vĩnh Thái &amp;<br>CEO SEONGON 2012 – 2016</p>
                                                                                                <p>
                                                                                                    <script type="application/ld+json">
                                                                                                        {
                                                                                                            "@context": "http://schema.org/",
                                                                                                            "@type": "Person",
                                                                                                            "name": "TRẦN MẠNH HÙNG",
                                                                                                            "url": "https://vinhthaicommunication.com/dao-tao-marketing/",
                                                                                                            "image": "https://scontent.fhan2-2.fna.fbcdn.net/v/t31.0-8/21688490_1127301494071822_7495008284133685012_o.jpg?_nc_cat=106&oh=115ede688f433fa1f35c090293fd343f&oe=5C4C9267",
                                                                                                            "sameAs": [
                                                                                                                "https://www.facebook.com/hung0942366999",
                                                                                                                "https://plus.google.com/u/0/+Tr%E1%BA%A7nM%E1%BA%A1nhH%C3%B9ngVINTAS",
                                                                                                                "https://vinhthaicommunication.com/dao-tao-marketing/"
                                                                                                            ],
                                                                                                            "jobTitle": "CEO",
                                                                                                            "worksFor": {
                                                                                                                "@type": "Organization",
                                                                                                                "name": "Vĩnh Thái Marketing"
                                                                                                            }
                                                                                                        }
                                                                                                    </script>
                                                                                                </p>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="elementor-element elementor-element-126aaf5 elementor-column elementor-col-50 elementor-inner-column" data-id="126aaf5" data-element_type="column">
                                                                            <div class="elementor-column-wrap">
                                                                                <div class="elementor-widget-wrap">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </section>
                                                            <section class="elementor-element elementor-element-080f5fa elementor-hidden-desktop elementor-hidden-tablet elementor-section-boxed elementor-section-height-default elementor-section-height-default elementor-section elementor-inner-section" data-id="080f5fa"
                                                                     data-element_type="section">
                                                                <div class="elementor-container elementor-column-gap-default">
                                                                    <div class="elementor-row">
                                                                        <div class="elementor-element elementor-element-1625d8f elementor-column elementor-col-50 elementor-inner-column" data-id="1625d8f" data-element_type="column" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
                                                                            <div class="elementor-column-wrap  elementor-element-populated">
                                                                                <div class="elementor-background-overlay"></div>
                                                                                <div class="elementor-widget-wrap">
                                                                                    <div class="elementor-element elementor-element-e775dff elementor-widget elementor-widget-text-editor" data-id="e775dff" data-element_type="widget" data-widget_type="text-editor.default">
                                                                                        <div class="elementor-widget-container">
                                                                                            <div class="elementor-text-editor elementor-clearfix">
                                                                                                <p>Với kinh nghiệm 12 năm làm việc trong ngành marketing, ông Hùng là giảng viên quen thuộc của các chương trình đào tạo marketing inhouse cho các doanh nghiệp vừa và nhỏ tại Việt Nam<br>– Đào tạo
                                                                                                    marketing digital cho đại lý Ford Hà Thành<br>– Đào tạo marketing Cung Triển Lãm Quy Hoạch &amp; Kiến Trúc<br>– Đào tạo Google Ads cho Chevrolet Giải Phóng<br>…..</p>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="elementor-element elementor-element-0d9a97f elementor-column elementor-col-50 elementor-inner-column" data-id="0d9a97f" data-element_type="column">
                                                                            <div class="elementor-column-wrap  elementor-element-populated">
                                                                                <div class="elementor-widget-wrap">
                                                                                    <div class="elementor-element elementor-element-3e454fa elementor-widget elementor-widget-spacer" data-id="3e454fa" data-element_type="widget" data-widget_type="spacer.default">
                                                                                        <div class="elementor-widget-container">
                                                                                            <div class="elementor-spacer">
                                                                                                <div class="elementor-spacer-inner"></div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </section>
                                                            <section class="elementor-element elementor-element-c925ce9 elementor-section-boxed elementor-section-height-default elementor-section-height-default elementor-section elementor-inner-section" data-id="c925ce9" data-element_type="section">
                                                                <div class="elementor-container elementor-column-gap-default">
                                                                    <div class="elementor-row">
                                                                        <div class="elementor-element elementor-element-8a693ba elementor-hidden-phone elementor-column elementor-col-33 elementor-inner-column" data-id="8a693ba" data-element_type="column" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
                                                                            <div class="elementor-column-wrap  elementor-element-populated">
                                                                                <div class="elementor-background-overlay"></div>
                                                                                <div class="elementor-widget-wrap">
                                                                                    <div class="elementor-element elementor-element-6d80c45 elementor-widget elementor-widget-heading" data-id="6d80c45" data-element_type="widget" data-widget_type="heading.default">
                                                                                        <div class="elementor-widget-container">
                                                                                            <h4 class="elementor-heading-title elementor-size-small">Trần Mạnh Hùng</h4>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="elementor-element elementor-element-ead9841 elementor-widget elementor-widget-heading" data-id="ead9841" data-element_type="widget" data-widget_type="heading.default">
                                                                                        <div class="elementor-widget-container">
                                                                                            <p class="elementor-heading-title elementor-size-default">Giảng viên chính</p>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="elementor-element elementor-element-64839fc elementor-shape-square elementor-widget elementor-widget-social-icons" data-id="64839fc" data-element_type="widget" data-widget_type="social-icons.default">
                                                                                        <div class="elementor-widget-container">
                                                                                            <div class="elementor-social-icons-wrapper">
                                                                                                <a href="https://www.facebook.com/profile.php?id=100003759479026" class="elementor-icon elementor-social-icon elementor-social-icon-facebook elementor-repeater-item-1941d85" target="_blank" rel="nofollow">
                                                        <span class="elementor-screen-only">Facebook</span>
                                                                                <i class="fa fa-facebook"></i>
                                                                        </a>
                                                                                                <a href="https://twitter.com/vinhthaimkt" class="elementor-icon elementor-social-icon elementor-social-icon-twitter elementor-repeater-item-35taigz" target="_blank" rel="nofollow">
                                                        <span class="elementor-screen-only">Twitter</span>
                                                                                <i class="fa fa-twitter"></i>
                                                                        </a>
                                                                                                <a href="https://plus.google.com/u/0/117017637710532699319" class="elementor-icon elementor-social-icon elementor-social-icon-google-plus elementor-repeater-item-v4j6m1j" target="_blank" rel="nofollow">
                                                        <span class="elementor-screen-only">Google-plus</span>
                                                                                <i class="fa fa-google-plus"></i>
                                                                        </a>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="elementor-element elementor-element-3554017 elementor-widget elementor-widget-text-editor" data-id="3554017" data-element_type="widget" data-widget_type="text-editor.default">
                                                                                        <div class="elementor-widget-container">
                                                                                            <div class="elementor-text-editor elementor-clearfix">
                                                                                                <p style="text-align: right;">Founder, CEO Vĩnh Thái &amp;<br>&nbsp; &nbsp; &nbsp; &nbsp;CEO SEONGON 2012 – 2016</p>
                                                                                                <p>
                                                                                                    <script type="application/ld+json">
                                                                                                        {
                                                                                                            "@context": "http://schema.org/",
                                                                                                            "@type": "Person",
                                                                                                            "name": "TRẦN MẠNH HÙNG",
                                                                                                            "url": "https://vinhthaicommunication.com/dao-tao-marketing/",
                                                                                                            "image": "https://scontent.fhan2-2.fna.fbcdn.net/v/t31.0-8/21688490_1127301494071822_7495008284133685012_o.jpg?_nc_cat=106&oh=115ede688f433fa1f35c090293fd343f&oe=5C4C9267",
                                                                                                            "sameAs": [
                                                                                                                "https://www.facebook.com/hung0942366999",
                                                                                                                "https://plus.google.com/u/0/+Tr%E1%BA%A7nM%E1%BA%A1nhH%C3%B9ngVINTAS",
                                                                                                                "https://vinhthaicommunication.com/dao-tao-marketing/"
                                                                                                            ],
                                                                                                            "jobTitle": "CEO",
                                                                                                            "worksFor": {
                                                                                                                "@type": "Organization",
                                                                                                                "name": "Vĩnh Thái Marketing"
                                                                                                            }
                                                                                                        }
                                                                                                    </script>
                                                                                                </p>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="elementor-element elementor-element-4d0e623 elementor-column elementor-col-33 elementor-inner-column" data-id="4d0e623" data-element_type="column">
                                                                            <div class="elementor-column-wrap  elementor-element-populated">
                                                                                <div class="elementor-widget-wrap">
                                                                                    <div class="elementor-element elementor-element-23ef06b elementor-widget elementor-widget-spacer" data-id="23ef06b" data-element_type="widget" data-widget_type="spacer.default">
                                                                                        <div class="elementor-widget-container">
                                                                                            <div class="elementor-spacer">
                                                                                                <div class="elementor-spacer-inner"></div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="elementor-element elementor-element-fba8832 elementor-column elementor-col-33 elementor-inner-column" data-id="fba8832" data-element_type="column" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
                                                                            <div class="elementor-column-wrap  elementor-element-populated">
                                                                                <div class="elementor-widget-wrap">
                                                                                    <div class="elementor-element elementor-element-bb3bd0c elementor-widget elementor-widget-heading" data-id="bb3bd0c" data-element_type="widget" data-widget_type="heading.default">
                                                                                        <div class="elementor-widget-container">
                                                                                            <h4 class="elementor-heading-title elementor-size-small">Mai Xuân Đạt</h4>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="elementor-element elementor-element-27ed42c elementor-widget elementor-widget-heading" data-id="27ed42c" data-element_type="widget" data-widget_type="heading.default">
                                                                                        <div class="elementor-widget-container">
                                                                                            <p class="elementor-heading-title elementor-size-default">Giảng viên chính</p>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="elementor-element elementor-element-d6a0a69 elementor-shape-square elementor-widget elementor-widget-social-icons" data-id="d6a0a69" data-element_type="widget" data-widget_type="social-icons.default">
                                                                                        <div class="elementor-widget-container">
                                                                                            <div class="elementor-social-icons-wrapper">
                                                                                                <a href="https://www.facebook.com/profile.php?id=100003759479026" class="elementor-icon elementor-social-icon elementor-social-icon-facebook-f elementor-repeater-item-p56i9e2" target="_blank" rel="nofollow">
                                                        <span class="elementor-screen-only">Facebook-f</span>
                                                        <i class="fab fa-facebook-f"></i>				</a>
                                                                                                <a href="" class="elementor-icon elementor-social-icon elementor-social-icon-twitter elementor-repeater-item-35taigz" target="_blank" rel="nofollow">
                                                        <span class="elementor-screen-only">Twitter</span>
                                                        <i class="fab fa-twitter"></i>				</a>
                                                                                                <a href="https://plus.google.com/u/0/+Tr%E1%BA%A7nM%E1%BA%A1nhH%C3%B9ngVINTAS" class="elementor-icon elementor-social-icon elementor-social-icon-google-plus-g elementor-repeater-item-v4j6m1j" target="_blank" rel="nofollow">
                                                        <span class="elementor-screen-only">Google-plus-g</span>
                                                        <i class="fab fa-google-plus-g"></i>				</a>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="elementor-element elementor-element-0fadf1f elementor-widget elementor-widget-text-editor" data-id="0fadf1f" data-element_type="widget" data-widget_type="text-editor.default">
                                                                                        <div class="elementor-widget-container">
                                                                                            <div class="elementor-text-editor elementor-clearfix">
                                                                                                <p style="text-align: right;">FOUNDER &amp; CEO SEONGON<br>Giảng viên tại, Plato, Sage.</p>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </section>
                                                            <section class="elementor-element elementor-element-e355089 elementor-reverse-mobile elementor-section-boxed elementor-section-height-default elementor-section-height-default elementor-section elementor-inner-section" data-id="e355089" data-element_type="section">
                                                                <div class="elementor-container elementor-column-gap-default">
                                                                    <div class="elementor-row">
                                                                        <div class="elementor-element elementor-element-5b7ee8e elementor-hidden-phone elementor-column elementor-col-33 elementor-inner-column" data-id="5b7ee8e" data-element_type="column" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
                                                                            <div class="elementor-column-wrap  elementor-element-populated">
                                                                                <div class="elementor-background-overlay"></div>
                                                                                <div class="elementor-widget-wrap">
                                                                                    <div class="elementor-element elementor-element-828c706 elementor-widget elementor-widget-text-editor" data-id="828c706" data-element_type="widget" data-widget_type="text-editor.default">
                                                                                        <div class="elementor-widget-container">
                                                                                            <div class="elementor-text-editor elementor-clearfix">
                                                                                                <p>Với kinh nghiệm 12 năm làm việc trong ngành marketing, ông Hùng là giảng viên quen thuộc của các chương trình đào tạo marketing inhouse cho các doanh nghiệp vừa và nhỏ tại Việt Nam<br>– Đào tạo
                                                                                                    marketing digital cho đại lý Ford Hà Thành<br>– Đào tạo marketing Cung Triển Lãm Quy Hoạch &amp; Kiến Trúc<br>– Đào tạo Google Ads cho Chevrolet Giải Phóng<br>…..</p>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="elementor-element elementor-element-056abf6 elementor-column elementor-col-33 elementor-inner-column" data-id="056abf6" data-element_type="column">
                                                                            <div class="elementor-column-wrap  elementor-element-populated">
                                                                                <div class="elementor-widget-wrap">
                                                                                    <div class="elementor-element elementor-element-4fc92b9 elementor-widget elementor-widget-spacer" data-id="4fc92b9" data-element_type="widget" data-widget_type="spacer.default">
                                                                                        <div class="elementor-widget-container">
                                                                                            <div class="elementor-spacer">
                                                                                                <div class="elementor-spacer-inner"></div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="elementor-element elementor-element-2bc810c elementor-column elementor-col-33 elementor-inner-column" data-id="2bc810c" data-element_type="column" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
                                                                            <div class="elementor-column-wrap  elementor-element-populated">
                                                                                <div class="elementor-widget-wrap">
                                                                                    <div class="elementor-element elementor-element-f74087e elementor-widget elementor-widget-text-editor" data-id="f74087e" data-element_type="widget" data-widget_type="text-editor.default">
                                                                                        <div class="elementor-widget-container">
                                                                                            <div class="elementor-text-editor elementor-clearfix">
                                                                                                <p style="text-align: left;">Diễn giả, giảng viên quen thuộc của các sự kiện trong ngành Marketing, các trung tâm đào tạo Marketing tại Việt Nam, thành viên ban cố vấn VMCC.<br>– Giảng viên tại VinaLink<br>– Giảng viên tại
                                                                                                    học viện thương hiệu Plato<br>– Giảng viên tại học viện quản trị kinh doanh Sage</p>
                                                                                                <p>…..</p>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </section>
                                                            <div class="elementor-element elementor-element-1c03b57 elementor-widget elementor-widget-spacer" data-id="1c03b57" data-element_type="widget" data-widget_type="spacer.default">
                                                                <div class="elementor-widget-container">
                                                                    <div class="elementor-spacer">
                                                                        <div class="elementor-spacer-inner"></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                    <section class="elementor-element elementor-element-cbfb287 elementor-section-boxed elementor-section-height-default elementor-section-height-default elementor-section elementor-top-section" data-id="cbfb287" data-element_type="section" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
                                        <div class="elementor-background-overlay"></div>
                                        <div class="elementor-container elementor-column-gap-default">
                                            <div class="elementor-row">
                                                <div class="elementor-element elementor-element-655b0bd elementor-column elementor-col-50 elementor-top-column" data-id="655b0bd" data-element_type="column">
                                                    <div class="elementor-column-wrap  elementor-element-populated">
                                                        <div class="elementor-widget-wrap">
                                                            <div class="elementor-element elementor-element-f9ba06e elementor-hidden-phone elementor-widget elementor-widget-spacer" data-id="f9ba06e" data-element_type="widget" data-widget_type="spacer.default">
                                                                <div class="elementor-widget-container">
                                                                    <div class="elementor-spacer">
                                                                        <div class="elementor-spacer-inner"></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="elementor-element elementor-element-78ee100 elementor-widget elementor-widget-spacer" data-id="78ee100" data-element_type="widget" data-widget_type="spacer.default">
                                                                <div class="elementor-widget-container">
                                                                    <div class="elementor-spacer">
                                                                        <div class="elementor-spacer-inner"></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="elementor-element elementor-element-f9f62cc elementor-hidden-phone elementor-widget elementor-widget-spacer" data-id="f9f62cc" data-element_type="widget" data-widget_type="spacer.default">
                                                                <div class="elementor-widget-container">
                                                                    <div class="elementor-spacer">
                                                                        <div class="elementor-spacer-inner"></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="elementor-element elementor-element-51a5283 elementor-column elementor-col-50 elementor-top-column" data-id="51a5283" data-element_type="column">
                                                    <div class="elementor-column-wrap  elementor-element-populated">
                                                        <div class="elementor-widget-wrap">
                                                            <div class="elementor-element elementor-element-4edc5c6 elementor-widget elementor-widget-spacer" data-id="4edc5c6" data-element_type="widget" data-widget_type="spacer.default">
                                                                <div class="elementor-widget-container">
                                                                    <div class="elementor-spacer">
                                                                        <div class="elementor-spacer-inner"></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="elementor-element elementor-element-265febd elementor-widget elementor-widget-heading" data-id="265febd" data-element_type="widget" data-widget_type="heading.default">
                                                                <div class="elementor-widget-container">
                                                                    <h2 class="elementor-heading-title elementor-size-default">AI PHÙ HỢP VỚI KHÓA HỌC?</h2>
                                                                </div>
                                                            </div>
                                                            <div class="elementor-element elementor-element-c069ebd elementor-widget elementor-widget-text-editor" data-id="c069ebd" data-element_type="widget" data-widget_type="text-editor.default">
                                                                <div class="elementor-widget-container">
                                                                    <div class="elementor-text-editor elementor-clearfix">
                                                                        <ul style="list-style-type: disc;">
                                                                            <li>Các bạn muốn làm Marketing nhưng chưa biết bắt đầu từ đâu.</li>
                                                                            <li>Các bạn đã tìm hiểu về Marketing ngắn hạn nhưng kiến thức rời rạc, chưa được hệ thống.</li>
                                                                            <li>Những bạn đã có kinh nghiệm làm việc trong ngành Marketing, nhưng cảm thấy kiến thức chưa đủ, muốn hiểu được cái nhìn tổng quan để áp dụng ngay vào công việc hàng ngày.</li>
                                                                        </ul>
                                                                        <ul style="list-style-type: disc;">
                                                                            <li>Những bạn đã đi làm có kinh nghiệm 1-2 năm, muốn thăng tiến trong sự nghiệp.</li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="elementor-element elementor-element-d07a7c3 elementor-align-left elementor-widget elementor-widget-button" data-id="d07a7c3" data-element_type="widget" data-widget_type="button.default">
                                                                <div class="elementor-widget-container">
                                                                    <div class="elementor-button-wrapper">
                                                                        <a href="#dangky" class="elementor-button-link elementor-button elementor-size-sm" target="_blank" role="button">
                                                            <span class="elementor-button-content-wrapper">
                                                            <span class="elementor-button-text">Đăng ký ngay nhận ưu đãi 500k!</span>
                                            </span>
                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="elementor-element elementor-element-8fcd5a5 elementor-widget elementor-widget-spacer" data-id="8fcd5a5" data-element_type="widget" data-widget_type="spacer.default">
                                                                <div class="elementor-widget-container">
                                                                    <div class="elementor-spacer">
                                                                        <div class="elementor-spacer-inner"></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                    <section class="elementor-element elementor-element-33b6ea3 elementor-section-boxed elementor-section-height-default elementor-section-height-default elementor-section elementor-top-section" data-id="33b6ea3" data-element_type="section">
                                        <div class="elementor-container elementor-column-gap-default">
                                            <div class="elementor-row">
                                                <div class="elementor-element elementor-element-293f908 elementor-column elementor-col-100 elementor-top-column" data-id="293f908" data-element_type="column">
                                                    <div class="elementor-column-wrap  elementor-element-populated">
                                                        <div class="elementor-widget-wrap">
                                                            <div class="elementor-element elementor-element-c5d928b elementor-widget elementor-widget-heading" data-id="c5d928b" data-element_type="widget" data-widget_type="heading.default">
                                                                <div class="elementor-widget-container">
                                                                    <h2 class="elementor-heading-title elementor-size-default">NỘI DUNG KHÓA HỌC</h2>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                    <section class="elementor-element elementor-element-c5e8e6e elementor-section-boxed elementor-section-height-default elementor-section-height-default elementor-section elementor-top-section" data-id="c5e8e6e" data-element_type="section">
                                        <div class="elementor-container elementor-column-gap-no">
                                            <div class="elementor-row">
                                                <div class="elementor-element elementor-element-0a017f3 elementor-column elementor-col-25 elementor-top-column" data-id="0a017f3" data-element_type="column">
                                                    <div class="elementor-column-wrap  elementor-element-populated">
                                                        <div class="elementor-widget-wrap">
                                                            <section class="elementor-element elementor-element-ab67832 elementor-section-boxed elementor-section-height-default elementor-section-height-default elementor-section elementor-inner-section" data-id="ab67832" data-element_type="section">
                                                                <div class="elementor-container elementor-column-gap-default">
                                                                    <div class="elementor-row">
                                                                        <div class="elementor-element elementor-element-67348f0 elementor-column elementor-col-100 elementor-inner-column" data-id="67348f0" data-element_type="column" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
                                                                            <div class="elementor-column-wrap  elementor-element-populated">
                                                                                <div class="elementor-widget-wrap">
                                                                                    <div class="elementor-element elementor-element-505317b elementor-widget elementor-widget-heading" data-id="505317b" data-element_type="widget" data-widget_type="heading.default">
                                                                                        <div class="elementor-widget-container">
                                                                                            <h3 class="elementor-heading-title elementor-size-default">Buổi 1</h3>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </section>
                                                            <section class="elementor-element elementor-element-332361d elementor-section-boxed elementor-section-height-default elementor-section-height-default elementor-section elementor-inner-section" data-id="332361d" data-element_type="section">
                                                                <div class="elementor-container elementor-column-gap-default">
                                                                    <div class="elementor-row">
                                                                        <div class="elementor-element elementor-element-f9f0e5e elementor-column elementor-col-100 elementor-inner-column" data-id="f9f0e5e" data-element_type="column">
                                                                            <div class="elementor-column-wrap  elementor-element-populated">
                                                                                <div class="elementor-widget-wrap">
                                                                                    <div class="elementor-element elementor-element-377e1a3 elementor-widget elementor-widget-text-editor" data-id="377e1a3" data-element_type="widget" data-widget_type="text-editor.default">
                                                                                        <div class="elementor-widget-container">
                                                                                            <div class="elementor-text-editor elementor-clearfix">
                                                                                                <p>Tổng quan về marketing</p>
                                                                                                <p>Quy trình tổng thể về marketing</p>
                                                                                                <p>Marketing khác Sale như thế nào</p>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </section>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="elementor-element elementor-element-8f0c354 elementor-column elementor-col-25 elementor-top-column" data-id="8f0c354" data-element_type="column">
                                                    <div class="elementor-column-wrap  elementor-element-populated">
                                                        <div class="elementor-widget-wrap">
                                                            <section class="elementor-element elementor-element-7416d98 elementor-section-boxed elementor-section-height-default elementor-section-height-default elementor-section elementor-inner-section" data-id="7416d98" data-element_type="section">
                                                                <div class="elementor-container elementor-column-gap-default">
                                                                    <div class="elementor-row">
                                                                        <div class="elementor-element elementor-element-d6d1425 elementor-column elementor-col-100 elementor-inner-column" data-id="d6d1425" data-element_type="column" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
                                                                            <div class="elementor-column-wrap  elementor-element-populated">
                                                                                <div class="elementor-widget-wrap">
                                                                                    <div class="elementor-element elementor-element-35f96d2 elementor-widget elementor-widget-heading" data-id="35f96d2" data-element_type="widget" data-widget_type="heading.default">
                                                                                        <div class="elementor-widget-container">
                                                                                            <h3 class="elementor-heading-title elementor-size-default">Buổi 2</h3>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </section>
                                                            <section class="elementor-element elementor-element-87a93cc elementor-section-boxed elementor-section-height-default elementor-section-height-default elementor-section elementor-inner-section" data-id="87a93cc" data-element_type="section">
                                                                <div class="elementor-container elementor-column-gap-default">
                                                                    <div class="elementor-row">
                                                                        <div class="elementor-element elementor-element-183bd15 elementor-column elementor-col-100 elementor-inner-column" data-id="183bd15" data-element_type="column">
                                                                            <div class="elementor-column-wrap  elementor-element-populated">
                                                                                <div class="elementor-widget-wrap">
                                                                                    <div class="elementor-element elementor-element-3d30774 elementor-widget elementor-widget-text-editor" data-id="3d30774" data-element_type="widget" data-widget_type="text-editor.default">
                                                                                        <div class="elementor-widget-container">
                                                                                            <div class="elementor-text-editor elementor-clearfix">
                                                                                                <p>Nghiên cứu doanh nghiệp (phân tích SWOT)</p>
                                                                                                <p>Nghiên cứu và phân tích thị trường</p>
                                                                                                <p>Nghiên cứu đối thủ cạnh tranh</p>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </section>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="elementor-element elementor-element-a52f10d elementor-column elementor-col-25 elementor-top-column" data-id="a52f10d" data-element_type="column">
                                                    <div class="elementor-column-wrap  elementor-element-populated">
                                                        <div class="elementor-widget-wrap">
                                                            <section class="elementor-element elementor-element-4d11b26 elementor-section-boxed elementor-section-height-default elementor-section-height-default elementor-section elementor-inner-section" data-id="4d11b26" data-element_type="section">
                                                                <div class="elementor-container elementor-column-gap-default">
                                                                    <div class="elementor-row">
                                                                        <div class="elementor-element elementor-element-f71bdc3 elementor-column elementor-col-100 elementor-inner-column" data-id="f71bdc3" data-element_type="column" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
                                                                            <div class="elementor-column-wrap  elementor-element-populated">
                                                                                <div class="elementor-widget-wrap">
                                                                                    <div class="elementor-element elementor-element-7bffbf8 elementor-widget elementor-widget-heading" data-id="7bffbf8" data-element_type="widget" data-widget_type="heading.default">
                                                                                        <div class="elementor-widget-container">
                                                                                            <h3 class="elementor-heading-title elementor-size-default">Buổi 3</h3>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </section>
                                                            <section class="elementor-element elementor-element-8116a01 elementor-section-boxed elementor-section-height-default elementor-section-height-default elementor-section elementor-inner-section" data-id="8116a01" data-element_type="section">
                                                                <div class="elementor-container elementor-column-gap-default">
                                                                    <div class="elementor-row">
                                                                        <div class="elementor-element elementor-element-91f30cd elementor-column elementor-col-100 elementor-inner-column" data-id="91f30cd" data-element_type="column">
                                                                            <div class="elementor-column-wrap  elementor-element-populated">
                                                                                <div class="elementor-widget-wrap">
                                                                                    <div class="elementor-element elementor-element-17e1c80 elementor-widget elementor-widget-text-editor" data-id="17e1c80" data-element_type="widget" data-widget_type="text-editor.default">
                                                                                        <div class="elementor-widget-container">
                                                                                            <div class="elementor-text-editor elementor-clearfix">
                                                                                                <p>Segmentation – Phân đoạn thị trường</p>
                                                                                                <p>Targeting – Lựa chọn phân khúc</p>
                                                                                                <p>Positioning – Định vị thương hiệu</p>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </section>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="elementor-element elementor-element-b226f46 elementor-column elementor-col-25 elementor-top-column" data-id="b226f46" data-element_type="column">
                                                    <div class="elementor-column-wrap  elementor-element-populated">
                                                        <div class="elementor-widget-wrap">
                                                            <section class="elementor-element elementor-element-4bacb15 elementor-section-boxed elementor-section-height-default elementor-section-height-default elementor-section elementor-inner-section" data-id="4bacb15" data-element_type="section">
                                                                <div class="elementor-container elementor-column-gap-default">
                                                                    <div class="elementor-row">
                                                                        <div class="elementor-element elementor-element-1c20983 elementor-column elementor-col-100 elementor-inner-column" data-id="1c20983" data-element_type="column" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
                                                                            <div class="elementor-column-wrap  elementor-element-populated">
                                                                                <div class="elementor-widget-wrap">
                                                                                    <div class="elementor-element elementor-element-7d9afdc elementor-widget elementor-widget-heading" data-id="7d9afdc" data-element_type="widget" data-widget_type="heading.default">
                                                                                        <div class="elementor-widget-container">
                                                                                            <h3 class="elementor-heading-title elementor-size-default">Buổi 4</h3>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </section>
                                                            <section class="elementor-element elementor-element-278c928 elementor-section-boxed elementor-section-height-default elementor-section-height-default elementor-section elementor-inner-section" data-id="278c928" data-element_type="section">
                                                                <div class="elementor-container elementor-column-gap-default">
                                                                    <div class="elementor-row">
                                                                        <div class="elementor-element elementor-element-e42a4d7 elementor-column elementor-col-100 elementor-inner-column" data-id="e42a4d7" data-element_type="column">
                                                                            <div class="elementor-column-wrap  elementor-element-populated">
                                                                                <div class="elementor-widget-wrap">
                                                                                    <div class="elementor-element elementor-element-161e79a elementor-widget elementor-widget-text-editor" data-id="161e79a" data-element_type="widget" data-widget_type="text-editor.default">
                                                                                        <div class="elementor-widget-container">
                                                                                            <div class="elementor-text-editor elementor-clearfix">
                                                                                                <p>Marketing 4Ps, 7Ps</p>
                                                                                                <p>Quản trị sản phẩm</p>
                                                                                                <p>&nbsp;</p>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </section>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                    <section class="elementor-element elementor-element-87cbf72 elementor-section-boxed elementor-section-height-default elementor-section-height-default elementor-section elementor-top-section" data-id="87cbf72" data-element_type="section">
                                        <div class="elementor-container elementor-column-gap-no">
                                            <div class="elementor-row">
                                                <div class="elementor-element elementor-element-e9fadc8 elementor-column elementor-col-25 elementor-top-column" data-id="e9fadc8" data-element_type="column">
                                                    <div class="elementor-column-wrap  elementor-element-populated">
                                                        <div class="elementor-widget-wrap">
                                                            <section class="elementor-element elementor-element-c2eb935 elementor-section-boxed elementor-section-height-default elementor-section-height-default elementor-section elementor-inner-section" data-id="c2eb935" data-element_type="section">
                                                                <div class="elementor-container elementor-column-gap-default">
                                                                    <div class="elementor-row">
                                                                        <div class="elementor-element elementor-element-42d4d0d elementor-column elementor-col-100 elementor-inner-column" data-id="42d4d0d" data-element_type="column" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
                                                                            <div class="elementor-column-wrap  elementor-element-populated">
                                                                                <div class="elementor-widget-wrap">
                                                                                    <div class="elementor-element elementor-element-5a00bdb elementor-widget elementor-widget-heading" data-id="5a00bdb" data-element_type="widget" data-widget_type="heading.default">
                                                                                        <div class="elementor-widget-container">
                                                                                            <h3 class="elementor-heading-title elementor-size-default">Buổi 5</h3>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </section>
                                                            <section class="elementor-element elementor-element-63a784f elementor-section-boxed elementor-section-height-default elementor-section-height-default elementor-section elementor-inner-section" data-id="63a784f" data-element_type="section">
                                                                <div class="elementor-container elementor-column-gap-default">
                                                                    <div class="elementor-row">
                                                                        <div class="elementor-element elementor-element-6021acb elementor-column elementor-col-100 elementor-inner-column" data-id="6021acb" data-element_type="column">
                                                                            <div class="elementor-column-wrap  elementor-element-populated">
                                                                                <div class="elementor-widget-wrap">
                                                                                    <div class="elementor-element elementor-element-b2a4976 elementor-widget elementor-widget-text-editor" data-id="b2a4976" data-element_type="widget" data-widget_type="text-editor.default">
                                                                                        <div class="elementor-widget-container">
                                                                                            <div class="elementor-text-editor elementor-clearfix">
                                                                                                <p>Quản trị giá cả</p>
                                                                                                <p>Quản trị kênh phân phối</p>
                                                                                                <p>Quản trị xúc tiến hỗ hợp</p>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </section>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="elementor-element elementor-element-f129584 elementor-column elementor-col-25 elementor-top-column" data-id="f129584" data-element_type="column">
                                                    <div class="elementor-column-wrap  elementor-element-populated">
                                                        <div class="elementor-widget-wrap">
                                                            <section class="elementor-element elementor-element-5e73c63 elementor-section-boxed elementor-section-height-default elementor-section-height-default elementor-section elementor-inner-section" data-id="5e73c63" data-element_type="section">
                                                                <div class="elementor-container elementor-column-gap-default">
                                                                    <div class="elementor-row">
                                                                        <div class="elementor-element elementor-element-ea67e28 elementor-column elementor-col-100 elementor-inner-column" data-id="ea67e28" data-element_type="column" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
                                                                            <div class="elementor-column-wrap  elementor-element-populated">
                                                                                <div class="elementor-widget-wrap">
                                                                                    <div class="elementor-element elementor-element-2c09613 elementor-widget elementor-widget-heading" data-id="2c09613" data-element_type="widget" data-widget_type="heading.default">
                                                                                        <div class="elementor-widget-container">
                                                                                            <h3 class="elementor-heading-title elementor-size-default">Buổi 6</h3>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </section>
                                                            <section class="elementor-element elementor-element-2ea459d elementor-section-boxed elementor-section-height-default elementor-section-height-default elementor-section elementor-inner-section" data-id="2ea459d" data-element_type="section">
                                                                <div class="elementor-container elementor-column-gap-default">
                                                                    <div class="elementor-row">
                                                                        <div class="elementor-element elementor-element-a1f77b4 elementor-column elementor-col-100 elementor-inner-column" data-id="a1f77b4" data-element_type="column">
                                                                            <div class="elementor-column-wrap  elementor-element-populated">
                                                                                <div class="elementor-widget-wrap">
                                                                                    <div class="elementor-element elementor-element-bb5fb46 elementor-widget elementor-widget-text-editor" data-id="bb5fb46" data-element_type="widget" data-widget_type="text-editor.default">
                                                                                        <div class="elementor-widget-container">
                                                                                            <div class="elementor-text-editor elementor-clearfix">
                                                                                                <p>Kênh truyền thông trên Digital</p>
                                                                                                <p>Áp dụng AIDA trên Digital</p>
                                                                                                <p>&nbsp;</p>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </section>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="elementor-element elementor-element-3734325 elementor-column elementor-col-25 elementor-top-column" data-id="3734325" data-element_type="column">
                                                    <div class="elementor-column-wrap  elementor-element-populated">
                                                        <div class="elementor-widget-wrap">
                                                            <section class="elementor-element elementor-element-751d25f elementor-section-boxed elementor-section-height-default elementor-section-height-default elementor-section elementor-inner-section" data-id="751d25f" data-element_type="section">
                                                                <div class="elementor-container elementor-column-gap-default">
                                                                    <div class="elementor-row">
                                                                        <div class="elementor-element elementor-element-b764efe elementor-column elementor-col-100 elementor-inner-column" data-id="b764efe" data-element_type="column" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
                                                                            <div class="elementor-column-wrap  elementor-element-populated">
                                                                                <div class="elementor-widget-wrap">
                                                                                    <div class="elementor-element elementor-element-ce8c081 elementor-widget elementor-widget-heading" data-id="ce8c081" data-element_type="widget" data-widget_type="heading.default">
                                                                                        <div class="elementor-widget-container">
                                                                                            <h3 class="elementor-heading-title elementor-size-default">Buổi 7</h3>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </section>
                                                            <section class="elementor-element elementor-element-d8e5ed4 elementor-section-boxed elementor-section-height-default elementor-section-height-default elementor-section elementor-inner-section" data-id="d8e5ed4" data-element_type="section">
                                                                <div class="elementor-container elementor-column-gap-default">
                                                                    <div class="elementor-row">
                                                                        <div class="elementor-element elementor-element-7a2290d elementor-column elementor-col-100 elementor-inner-column" data-id="7a2290d" data-element_type="column">
                                                                            <div class="elementor-column-wrap  elementor-element-populated">
                                                                                <div class="elementor-widget-wrap">
                                                                                    <div class="elementor-element elementor-element-55494fe elementor-widget elementor-widget-text-editor" data-id="55494fe" data-element_type="widget" data-widget_type="text-editor.default">
                                                                                        <div class="elementor-widget-container">
                                                                                            <div class="elementor-text-editor elementor-clearfix">
                                                                                                <p>Form kế hoạch</p>
                                                                                                <p>Thực hành lập kế hoạch</p>
                                                                                                <p>&nbsp;</p>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </section>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="elementor-element elementor-element-b913d92 elementor-column elementor-col-25 elementor-top-column" data-id="b913d92" data-element_type="column">
                                                    <div class="elementor-column-wrap  elementor-element-populated">
                                                        <div class="elementor-widget-wrap">
                                                            <section class="elementor-element elementor-element-5c56d96 elementor-section-boxed elementor-section-height-default elementor-section-height-default elementor-section elementor-inner-section" data-id="5c56d96" data-element_type="section">
                                                                <div class="elementor-container elementor-column-gap-default">
                                                                    <div class="elementor-row">
                                                                        <div class="elementor-element elementor-element-2af3ff9 elementor-column elementor-col-100 elementor-inner-column" data-id="2af3ff9" data-element_type="column" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
                                                                            <div class="elementor-column-wrap  elementor-element-populated">
                                                                                <div class="elementor-widget-wrap">
                                                                                    <div class="elementor-element elementor-element-d76c3f4 elementor-widget elementor-widget-heading" data-id="d76c3f4" data-element_type="widget" data-widget_type="heading.default">
                                                                                        <div class="elementor-widget-container">
                                                                                            <h3 class="elementor-heading-title elementor-size-default">Buổi 8</h3>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </section>
                                                            <section class="elementor-element elementor-element-04cd1ff elementor-section-boxed elementor-section-height-default elementor-section-height-default elementor-section elementor-inner-section" data-id="04cd1ff" data-element_type="section">
                                                                <div class="elementor-container elementor-column-gap-default">
                                                                    <div class="elementor-row">
                                                                        <div class="elementor-element elementor-element-1080f18 elementor-column elementor-col-100 elementor-inner-column" data-id="1080f18" data-element_type="column">
                                                                            <div class="elementor-column-wrap  elementor-element-populated">
                                                                                <div class="elementor-widget-wrap">
                                                                                    <div class="elementor-element elementor-element-78e9b6d elementor-widget elementor-widget-text-editor" data-id="78e9b6d" data-element_type="widget" data-widget_type="text-editor.default">
                                                                                        <div class="elementor-widget-container">
                                                                                            <div class="elementor-text-editor elementor-clearfix">
                                                                                                <p>Bảo vệ kế hoạch Marketing</p>
                                                                                                <p>Case study thực tế của học viên</p>
                                                                                                <p>&nbsp;</p>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </section>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                    <section class="elementor-element elementor-element-1801d4c elementor-section-boxed elementor-section-height-default elementor-section-height-default elementor-section elementor-top-section" data-id="1801d4c" data-element_type="section">
                                        <div class="elementor-container elementor-column-gap-default">
                                            <div class="elementor-row">
                                                <div class="elementor-element elementor-element-d16570a elementor-column elementor-col-50 elementor-top-column" data-id="d16570a" data-element_type="column">
                                                    <div class="elementor-column-wrap  elementor-element-populated">
                                                        <div class="elementor-widget-wrap">
                                                            <div class="elementor-element elementor-element-34d4f43 elementor-widget elementor-widget-heading" data-id="34d4f43" data-element_type="widget" data-widget_type="heading.default">
                                                                <div class="elementor-widget-container">
                                                                    <h3 class="elementor-heading-title elementor-size-xl">lịch khai giảng</h3>
                                                                </div>
                                                            </div>
                                                            <section class="elementor-element elementor-element-dc3e6a4 elementor-section-boxed elementor-section-height-default elementor-section-height-default elementor-section elementor-inner-section" data-id="dc3e6a4" data-element_type="section">
                                                                <div class="elementor-container elementor-column-gap-default">
                                                                    <div class="elementor-row">
                                                                        <div class="elementor-element elementor-element-c0b5bc2 elementor-column elementor-col-50 elementor-inner-column" data-id="c0b5bc2" data-element_type="column">
                                                                            <div class="elementor-column-wrap  elementor-element-populated">
                                                                                <div class="elementor-widget-wrap">
                                                                                    <div class="elementor-element elementor-element-a423366 elementor-widget elementor-widget-heading" data-id="a423366" data-element_type="widget" data-widget_type="heading.default">
                                                                                        <div class="elementor-widget-container">
                                                                                            <p class="elementor-heading-title elementor-size-default">Khóa học</p>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="elementor-element elementor-element-9b4d65f elementor-widget elementor-widget-heading" data-id="9b4d65f" data-element_type="widget" data-widget_type="heading.default">
                                                                                        <div class="elementor-widget-container">
                                                                                            <p class="elementor-heading-title elementor-size-default"><a href="https://vinhthaicommunication.com/dao-tao-marketing/">Basic Marketing Tree</a></p>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="elementor-element elementor-element-d755f29 elementor-column elementor-col-50 elementor-inner-column" data-id="d755f29" data-element_type="column">
                                                                            <div class="elementor-column-wrap  elementor-element-populated">
                                                                                <div class="elementor-widget-wrap">
                                                                                    <div class="elementor-element elementor-element-3f00a40 elementor-widget elementor-widget-heading" data-id="3f00a40" data-element_type="widget" data-widget_type="heading.default">
                                                                                        <div class="elementor-widget-container">
                                                                                            <p class="elementor-heading-title elementor-size-default">Thời gian</p>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="elementor-element elementor-element-64ba124 elementor-widget elementor-widget-heading" data-id="64ba124" data-element_type="widget" data-widget_type="heading.default">
                                                                                        <div class="elementor-widget-container">
                                                                                            <p class="elementor-heading-title elementor-size-default">08/07/2020, thứ 4, 6 hàng tuần</p>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </section>
                                                            <section class="elementor-element elementor-element-eb2c07a elementor-section-boxed elementor-section-height-default elementor-section-height-default elementor-section elementor-inner-section" data-id="eb2c07a" data-element_type="section">
                                                                <div class="elementor-container elementor-column-gap-default">
                                                                    <div class="elementor-row">
                                                                        <div class="elementor-element elementor-element-109cf00 elementor-column elementor-col-50 elementor-inner-column" data-id="109cf00" data-element_type="column">
                                                                            <div class="elementor-column-wrap  elementor-element-populated">
                                                                                <div class="elementor-widget-wrap">
                                                                                    <div class="elementor-element elementor-element-f3d3d43 elementor-widget elementor-widget-heading" data-id="f3d3d43" data-element_type="widget" data-widget_type="heading.default">
                                                                                        <div class="elementor-widget-container">
                                                                                            <p class="elementor-heading-title elementor-size-default">Thời lượng</p>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="elementor-element elementor-element-c1cc000 elementor-widget elementor-widget-heading" data-id="c1cc000" data-element_type="widget" data-widget_type="heading.default">
                                                                                        <div class="elementor-widget-container">
                                                                                            <p class="elementor-heading-title elementor-size-default">8 buổi (Bắt đầu từ 18h30 - 21h30)</p>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="elementor-element elementor-element-0c699de elementor-column elementor-col-50 elementor-inner-column" data-id="0c699de" data-element_type="column">
                                                                            <div class="elementor-column-wrap  elementor-element-populated">
                                                                                <div class="elementor-widget-wrap">
                                                                                    <div class="elementor-element elementor-element-decc99d elementor-widget elementor-widget-heading" data-id="decc99d" data-element_type="widget" data-widget_type="heading.default">
                                                                                        <div class="elementor-widget-container">
                                                                                            <p class="elementor-heading-title elementor-size-default">Địa điểm</p>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="elementor-element elementor-element-42274bf elementor-widget elementor-widget-heading" data-id="42274bf" data-element_type="widget" data-widget_type="heading.default">
                                                                                        <div class="elementor-widget-container">
                                                                                            <p class="elementor-heading-title elementor-size-default">88,Tô Vĩnh Diện, Thanh Xuân, Hà Nội</p>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </section>
                                                            <section class="elementor-element elementor-element-218da67 elementor-section-boxed elementor-section-height-default elementor-section-height-default elementor-section elementor-inner-section" data-id="218da67" data-element_type="section">
                                                                <div class="elementor-container elementor-column-gap-default">
                                                                    <div class="elementor-row">
                                                                        <div class="elementor-element elementor-element-2460101 elementor-column elementor-col-50 elementor-inner-column" data-id="2460101" data-element_type="column">
                                                                            <div class="elementor-column-wrap  elementor-element-populated">
                                                                                <div class="elementor-widget-wrap">
                                                                                    <div class="elementor-element elementor-element-b3123fd elementor-widget elementor-widget-heading" data-id="b3123fd" data-element_type="widget" data-widget_type="heading.default">
                                                                                        <div class="elementor-widget-container">
                                                                                            <p class="elementor-heading-title elementor-size-default">Học phí</p>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="elementor-element elementor-element-57fdeaf elementor-widget elementor-widget-heading" data-id="57fdeaf" data-element_type="widget" data-widget_type="heading.default">
                                                                                        <div class="elementor-widget-container">
                                                                                            <p class="elementor-heading-title elementor-size-default">3.900.000 VNĐ</p>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="elementor-element elementor-element-25a0250 elementor-column elementor-col-50 elementor-inner-column" data-id="25a0250" data-element_type="column">
                                                                            <div class="elementor-column-wrap  elementor-element-populated">
                                                                                <div class="elementor-widget-wrap">
                                                                                    <div class="elementor-element elementor-element-071ab77 elementor-widget elementor-widget-heading" data-id="071ab77" data-element_type="widget" data-widget_type="heading.default">
                                                                                        <div class="elementor-widget-container">
                                                                                            <p class="elementor-heading-title elementor-size-default"><a href="#dangky" target="_blank" rel="nofollow">Đăng ký nhận ưu đãi !</a></p>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="elementor-element elementor-element-5078a9d elementor-widget elementor-widget-heading" data-id="5078a9d" data-element_type="widget" data-widget_type="heading.default">
                                                                                        <div class="elementor-widget-container">
                                                                                            <p class="elementor-heading-title elementor-size-default"><a href="#dangky" target="_blank" rel="nofollow">3.400.000 VNĐ</a></p>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </section>
                                                            <section class="elementor-element elementor-element-e0139c3 elementor-section-boxed elementor-section-height-default elementor-section-height-default elementor-section elementor-inner-section" data-id="e0139c3" data-element_type="section">
                                                                <div class="elementor-container elementor-column-gap-default">
                                                                    <div class="elementor-row">
                                                                        <div class="elementor-element elementor-element-abf35d7 elementor-column elementor-col-100 elementor-inner-column" data-id="abf35d7" data-element_type="column">
                                                                            <div class="elementor-column-wrap  elementor-element-populated">
                                                                                <div class="elementor-widget-wrap">
                                                                                    <div class="elementor-element elementor-element-7dec7ef elementor-align-left elementor-widget elementor-widget-button" data-id="7dec7ef" data-element_type="widget" data-widget_type="button.default">
                                                                                        <div class="elementor-widget-container">
                                                                                            <div class="elementor-button-wrapper">
                                                                                                <a href="#dangky" class="elementor-button-link elementor-button elementor-size-sm" target="_blank" role="button">
                                                            <span class="elementor-button-content-wrapper">
                                                            <span class="elementor-button-text">Đăng ký ngay nhận ưu đãi 500k!</span>
                                            </span>
                                                        </a>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </section>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="elementor-element elementor-element-546dfb2 elementor-column elementor-col-50 elementor-top-column" data-id="546dfb2" data-element_type="column">
                                                    <div class="elementor-column-wrap  elementor-element-populated">
                                                        <div class="elementor-widget-wrap">
                                                            <div class="elementor-element elementor-element-fa9ff11 elementor-widget elementor-widget-heading" data-id="fa9ff11" data-element_type="widget" data-widget_type="heading.default">
                                                                <div class="elementor-widget-container">
                                                                    <h3 class="elementor-heading-title elementor-size-xl">Lớp học basic marketing tree 10</h3>
                                                                </div>
                                                            </div>
                                                            <div class="elementor-element elementor-element-354ccab elementor-aspect-ratio-169 elementor-widget elementor-widget-video" data-id="354ccab" data-element_type="widget" data-settings="{&quot;aspect_ratio&quot;:&quot;169&quot;}" data-widget_type="video.default">
                                                                <div class="elementor-widget-container">
                                                                    <div class="elementor-wrapper elementor-fit-aspect-ratio elementor-open-inline">
                                                                        <iframe class="elementor-video-iframe" allowfullscreen="" src="https://www.youtube.com/embed/h8YdQLOCFSk?feature=oembed&amp;playlist=h8YdQLOCFSk&amp;wmode=opaque&amp;loop=1&amp;controls=0&amp;mute=0&amp;rel=0&amp;modestbranding=0"></iframe>                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                    <section class="elementor-element elementor-element-3ecd1c7 elementor-section-boxed elementor-section-height-default elementor-section-height-default elementor-section elementor-top-section" data-id="3ecd1c7" data-element_type="section" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
                                        <div class="elementor-background-overlay"></div>
                                        <div class="elementor-container elementor-column-gap-default">
                                            <div class="elementor-row">
                                                <div class="elementor-element elementor-element-2df1462 elementor-column elementor-col-100 elementor-top-column" data-id="2df1462" data-element_type="column">
                                                    <div class="elementor-column-wrap  elementor-element-populated">
                                                        <div class="elementor-widget-wrap">
                                                            <div class="elementor-element elementor-element-2bb0128 elementor-widget elementor-widget-spacer" data-id="2bb0128" data-element_type="widget" data-widget_type="spacer.default">
                                                                <div class="elementor-widget-container">
                                                                    <div class="elementor-spacer">
                                                                        <div class="elementor-spacer-inner"></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <section class="elementor-element elementor-element-8eea173 elementor-section-boxed elementor-section-height-default elementor-section-height-default elementor-section elementor-inner-section" data-id="8eea173" data-element_type="section">
                                                                <div class="elementor-container elementor-column-gap-default">
                                                                    <div class="elementor-row">
                                                                        <div class="elementor-element elementor-element-0a1bc88 elementor-column elementor-col-25 elementor-inner-column" data-id="0a1bc88" data-element_type="column">
                                                                            <div class="elementor-column-wrap">
                                                                                <div class="elementor-widget-wrap">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="elementor-element elementor-element-1c8d61f elementor-column elementor-col-25 elementor-inner-column" data-id="1c8d61f" data-element_type="column">
                                                                            <div class="elementor-column-wrap  elementor-element-populated">
                                                                                <div class="elementor-widget-wrap">
                                                                                    <div class="elementor-element elementor-element-747958c elementor-widget elementor-widget-heading" data-id="747958c" data-element_type="widget" data-widget_type="heading.default">
                                                                                        <div class="elementor-widget-container">
                                                                                            <h2 class="elementor-heading-title elementor-size-default">Liên hệ với chúng tôi<br> để được tư vấn về khóa học</h2>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="elementor-element elementor-element-01494e0 elementor-column elementor-col-25 elementor-inner-column" data-id="01494e0" data-element_type="column" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
                                                                            <div class="elementor-column-wrap  elementor-element-populated">
                                                                                <div class="elementor-widget-wrap">
                                                                                    <div class="elementor-element elementor-element-453ad8f elementor-align-left elementor-icon-list--layout-traditional elementor-widget elementor-widget-icon-list" data-id="453ad8f" data-element_type="widget" data-widget_type="icon-list.default">
                                                                                        <div class="elementor-widget-container">
                                                                                            <ul class="elementor-icon-list-items">
                                                                                                <li class="elementor-icon-list-item">
                                                                                                    <a href="tel:0965133751">						<span class="elementor-icon-list-icon">
                                                                <i aria-hidden="true" class="fas fa-phone-alt"></i>						</span>
                                                                            <span class="elementor-icon-list-text">0965.133.751</span>
                                                                                </a>
                                                                                                </li>
                                                                                            </ul>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="elementor-element elementor-element-4f79796 elementor-column elementor-col-25 elementor-inner-column" data-id="4f79796" data-element_type="column">
                                                                            <div class="elementor-column-wrap">
                                                                                <div class="elementor-widget-wrap">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </section>
                                                            <div class="elementor-element elementor-element-926d699 elementor-widget elementor-widget-spacer" data-id="926d699" data-element_type="widget" data-widget_type="spacer.default">
                                                                <div class="elementor-widget-container">
                                                                    <div class="elementor-spacer">
                                                                        <div class="elementor-spacer-inner"></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                    <section class="elementor-element elementor-element-502d168e elementor-hidden-phone elementor-section-boxed elementor-section-height-default elementor-section-height-default elementor-section elementor-top-section" data-id="502d168e" data-element_type="section">
                                        <div class="elementor-container elementor-column-gap-default">
                                            <div class="elementor-row">
                                                <div class="elementor-element elementor-element-7f545b48 elementor-column elementor-col-100 elementor-top-column" data-id="7f545b48" data-element_type="column">
                                                    <div class="elementor-column-wrap  elementor-element-populated">
                                                        <div class="elementor-widget-wrap">
                                                            <div class="elementor-element elementor-element-56443500 elementor-widget elementor-widget-heading" data-id="56443500" data-element_type="widget" data-widget_type="heading.default">
                                                                <div class="elementor-widget-container">
                                                                    <h2 class="elementor-heading-title elementor-size-default">THÔNG TIN THANH TOÁN</h2>
                                                                </div>
                                                            </div>
                                                            <div class="elementor-element elementor-element-166ca682 elementor-widget elementor-widget-text-editor" data-id="166ca682" data-element_type="widget" data-widget_type="text-editor.default">
                                                                <div class="elementor-widget-container">
                                                                    <div class="elementor-text-editor elementor-clearfix">
                                                                        <p style="text-align: center;"><span style="font-size: 12pt;"><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">Trần Mạnh Hùng: Số Tk: 045.1001.639.671&nbsp;&nbsp;Ngân&nbsp;hàng&nbsp;</span></span><span style="color: #298029;"><strong><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">Vietcombank</span></span>
                                                                            </strong>
                                                                            </span><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">&nbsp;Thành Công.</span></span>
                                                                            </span><br><span style="font-size: 12pt;"><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">Trần Mạnh Hùng: Số Tk: 190.2577.4038.012&nbsp;Ngân&nbsp;hàng&nbsp;</span></span><span style="color: #eb3b3b;"><strong><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">Techcombank</span></span>
                                                                            </strong>
                                                                            </span><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">&nbsp;Định Công.</span></span>
                                                                            </span>
                                                                        </p>
                                                                        <p style="text-align: center;"><span style="font-size: 12pt;">Chú ý: Nội dung chuyển tiền ghi “Tên + Số đt + BMT” để lớp học xác nhận lại với bạn khi có sms của ngân hàng báo về.</span></p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                    <section class="elementor-element elementor-element-1495d602 elementor-section-boxed elementor-section-height-default elementor-section-height-default elementor-section elementor-inner-section" data-id="1495d602" data-element_type="section">
                                        <div class="elementor-container elementor-column-gap-default">
                                            <div class="elementor-row">
                                                <div class="elementor-element elementor-element-cb6f24b elementor-column elementor-col-50 elementor-inner-column" data-id="cb6f24b" data-element_type="column">
                                                    <div class="elementor-column-wrap  elementor-element-populated">
                                                        <div class="elementor-widget-wrap">
                                                            <div class="elementor-element elementor-element-2a2d97c elementor-widget elementor-widget-heading" data-id="2a2d97c" data-element_type="widget" data-widget_type="heading.default">
                                                                <div class="elementor-widget-container">
                                                                    <h2 class="elementor-heading-title elementor-size-default">REVIEW CỦA HỌC VIÊN</h2>
                                                                </div>
                                                            </div>
                                                            <div class="elementor-element elementor-element-b07c2df elementor-align-left elementor-icon-list--layout-traditional elementor-widget elementor-widget-icon-list" data-id="b07c2df" data-element_type="widget" data-widget_type="icon-list.default">
                                                                <div class="elementor-widget-container">
                                                                    <ul class="elementor-icon-list-items">
                                                                        <li class="elementor-icon-list-item">
                                                                            <a href="https://www.facebook.com/permalink.php?story_fbid=707240186693540&amp;id=100022226942802" target="_blank" rel="nofollow">						<span class="elementor-icon-list-icon">
                                                                <i aria-hidden="true" class="fas fa-user-graduate"></i>						</span>
                                                                            <span class="elementor-icon-list-text">Nguyễn Hoàng Duy - Học viên lớp BMT 16</span>
                                                                                </a>
                                                                        </li>
                                                                        <li class="elementor-icon-list-item">
                                                                            <a href="https://www.facebook.com/v4pson/posts/3392197027457099" target="_blank" rel="nofollow">						<span class="elementor-icon-list-icon">
                                                                <i aria-hidden="true" class="fas fa-user-graduate"></i>						</span>
                                                                            <span class="elementor-icon-list-text">Trần Mạnh Sơn - Học viên lớp BMT 16</span>
                                                                                </a>
                                                                        </li>
                                                                        <li class="elementor-icon-list-item">
                                                                            <a href="https://www.facebook.com/TrungNguyen2401/posts/944754639192221" target="_blank" rel="nofollow">						<span class="elementor-icon-list-icon">
                                                                <i aria-hidden="true" class="fas fa-user-graduate"></i>						</span>
                                                                            <span class="elementor-icon-list-text">Nguyễn Đức Trung - Học viên lớp BMT 13</span>
                                                                                </a>
                                                                        </li>
                                                                        <li class="elementor-icon-list-item">
                                                                            <a href="https://www.facebook.com/linh.mini.98/posts/2960013604224147" target="_blank" rel="nofollow">						<span class="elementor-icon-list-icon">
                                                                <i aria-hidden="true" class="fas fa-user-graduate"></i>						</span>
                                                                            <span class="elementor-icon-list-text">Đàm  Thùy Linh - Nhân viên AZET Việt Nam - BMT 12</span>
                                                                                </a>
                                                                        </li>
                                                                        <li class="elementor-icon-list-item">
                                                                            <a href="https://www.facebook.com/mr.kieumanhduy/posts/2061017093989051" target="_blank" rel="nofollow">						<span class="elementor-icon-list-icon">
                                                                <i aria-hidden="true" class="fas fa-user-graduate"></i>						</span>
                                                                            <span class="elementor-icon-list-text">Kiều Mạnh Duy - Disigner - BMT 12</span>
                                                                                </a>
                                                                        </li>
                                                                        <li class="elementor-icon-list-item">
                                                                            <a href="https://www.facebook.com/vannguyen1203/posts/2278168168957478" target="_blank" rel="nofollow">						<span class="elementor-icon-list-icon">
                                                                <i aria-hidden="true" class="fas fa-user-graduate"></i>						</span>
                                                                            <span class="elementor-icon-list-text">Nguyễn Thị Vân - Học viên lớp BMT 11</span>
                                                                                </a>
                                                                        </li>
                                                                        <li class="elementor-icon-list-item">
                                                                            <a href="https://www.facebook.com/ngamonkeyelf/posts/2186549951460777" target="_blank" rel="nofollow">						<span class="elementor-icon-list-icon">
                                                                <i aria-hidden="true" class="fas fa-user-graduate"></i>						</span>
                                                                            <span class="elementor-icon-list-text">Nga Nguyến - Nhân viên google ads tại SEO NGON - BMT 11</span>
                                                                                </a>
                                                                        </li>
                                                                        <li class="elementor-icon-list-item">
                                                                            <a href="https://www.facebook.com/khanhnam8668/posts/2082967765328574" target="_blank" rel="nofollow">						<span class="elementor-icon-list-icon">
                                                                <i aria-hidden="true" class="fas fa-user-graduate"></i>						</span>
                                                                            <span class="elementor-icon-list-text">Khánh Nam - CEO Fun House - Căn hộ dịch vụ cho thuê - BMT 10</span>
                                                                                </a>
                                                                        </li>
                                                                        <li class="elementor-icon-list-item">
                                                                            <a href="https://www.facebook.com/tu.dinhvan.161/posts/2228299377429972" target="_blank" rel="nofollow">						<span class="elementor-icon-list-icon">
                                                                <i aria-hidden="true" class="fas fa-user-graduate"></i>						</span>
                                                                            <span class="elementor-icon-list-text">Đinh Văn Tú - Nhân viên kinh doanh - BMT 10</span>
                                                                                </a>
                                                                        </li>
                                                                        <li class="elementor-icon-list-item">
                                                                            <a href="https://www.facebook.com/HAuthhang/posts/10157055589569456" target="_blank" rel="nofollow">						<span class="elementor-icon-list-icon">
                                                                <i aria-hidden="true" class="fas fa-user-graduate"></i>						</span>
                                                                            <span class="elementor-icon-list-text">Trần Hằng - Founder H - Auth Shop - BMT 09</span>
                                                                                </a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="elementor-element elementor-element-e567eeb elementor-column elementor-col-50 elementor-inner-column" data-id="e567eeb" data-element_type="column">
                                                    <div class="elementor-column-wrap  elementor-element-populated">
                                                        <div class="elementor-widget-wrap">
                                                            <div class="elementor-element elementor-element-01a67a2 elementor-aspect-ratio-169 elementor-widget elementor-widget-video" data-id="01a67a2" data-element_type="widget" data-settings="{&quot;aspect_ratio&quot;:&quot;169&quot;}" data-widget_type="video.default">
                                                                <div class="elementor-widget-container">
                                                                    <div class="elementor-wrapper elementor-fit-aspect-ratio elementor-open-inline">
                                                                        <iframe class="elementor-video-iframe" allowfullscreen="" src="https://www.youtube.com/embed/Fq98SHYzex4?feature=oembed&amp;start&amp;end&amp;wmode=opaque&amp;loop=0&amp;controls=1&amp;mute=0&amp;rel=0&amp;modestbranding=0"></iframe>                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                @else
                                    {{ $landingpage->content }}
                                @endif
                            </textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-2 col-sm-2 col-xs-12">Danh mục</label>
                            <div class="col-md-3 col-sm-3 col-xs-12">
                                <select class="form-control" name="category_id" {{ $attribute }}>
                                    @if ($category->id != 0)
                                        <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-2 col-sm-2 col-xs-12">Tên người viết <span
                                        class="required">*</span></label>
                            <div class="col-md-3 col-sm-3 col-xs-12">
                                <input type="text" class="form-control" name="author_name" required="required" value="{{ $landingpage->author_name ? $landingpage->author_name : auth()->user()->name }}">
                                <input type="hidden" name="user_id" value="{{(auth()->user()) ? auth()->user()->id : 0}}">
                                <input type="hidden" name="status" value="publish">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-2 col-sm-2 col-xs-12">Ảnh đại diện (không bắt buộc)</label>
                            <div class="col-md-5 col-sm-5 col-xs-12">
                                <input type="file" class="form-control" name="thumbnail_url">
                                <div id="thumbnail_preview" class="mt-4"></div>
                            </div>
                        </div>
                        @if (!empty($landingpage->thumbnail_url))
                            <div class="form-group">
                                <label class="control-label col-md-2 col-sm-2 col-xs-12"></label>
                                <div class="col-md-5 col-sm-5 col-xs-12">
                                    <p>Ảnh đại diện hiện tại (bên dưới)</p>
                                    <p><img src="{{ Config::get('constants.STATIC_IMAGES') . $landingpage->thumbnail_url }}" width="100%"/></p>
                                </div>
                            </div>
                        @endif
                        <div class="form-group">
                            <label class="control-label col-md-2 col-sm-2 col-xs-12">Tiêu đề (SEO) <span
                                        class="required">*</span></label>
                            <div class="col-md-10 col-sm-10 col-xs-12">
                                <input type="text" class="form-control" name="meta_title" required="required" value="{{ $landingpage->meta_title ?? '' }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-2 col-sm-2 col-xs-12">Từ khóa (SEO) <span
                                        class="required">*</span></label>
                            <div class="col-md-10 col-sm-10 col-xs-12">
                                <textarea class="form-control" name="meta_keyword" rows="3" required="required">{{ $landingpage->meta_keyword ?? '' }}</textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-2 col-sm-2 col-xs-12">Mô tả (SEO) <span
                                        class="required">*</span></label>
                            <div class="col-md-10 col-sm-10 col-xs-12">
                                <textarea class="form-control" name="meta_description" rows="3" required="required">{{ $landingpage->meta_description ?? '' }}</textarea>
                            </div>
                        </div>
                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-10 col-sm-10 col-xs-12 col-md-offset-2">
                                <button type="submit" class="btn btn-success">Lưu</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <style>
        #thumbnail_preview {
            width: 100%;
            height: 0px;
            background: no-repeat;
        }
        .show-placeholder div:first-child {
            display: none
        }
    </style>
    <script>
        $('input[name="thumbnail_url"]').on('change', function () {
            console.log(this.files);
            var files = !!this.files ? this.files : [];
            if (!files.length || !window.FileReader) return; // no file selected, or no FileReader support
            if (/^image/.test(files[0].type)) { // only image file
                var reader = new FileReader(); // instance of the FileReader
                reader.readAsDataURL(files[0]); // read the local file
                reader.onloadend = function () { // set image data as background of div
                    $('#thumbnail_preview').css({'background-image': 'url("' + this.result + '")', 'height': '300px'});
                }
            }
        });
    </script>
@endsection
