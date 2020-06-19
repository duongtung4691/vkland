@extends('layouts.default')
@section('content')
    <!-- top tiles -->
    @include('components.alert')
    <div class="row tile_count">
        <div class="col-md-4 col-sm-4 col-xs-6 tile_stats_count">
            <span class="count_top"><i class="fa fa fa-list"></i> Tổng số danh mục bài viết</span>
            <div class="count">{{ $category_count }}</div>
        </div>
        <div class="col-md-4 col-sm-4 col-xs-6 tile_stats_count">
            <span class="count_top"><i class="fa fa-file-text-o"></i> Tổng số bài viết tin tức</span>
            <div class="count">{{ $post_count }}</div>
        </div>
        <div class="col-md-4 col-sm-4 col-xs-6 tile_stats_count">
            <span class="count_top"><i class="fa fa-user"></i> Tổng số editor</span>
            <div class="count">{{ $user_count }}</div>
        </div>
    </div>
    <!-- /top tiles -->
    @if ($activities->count() > 0)
    <div class="row">
        <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Hoạt động gần đây</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="dashboard-widget-content">
                        <ul class="list-unstyled timeline widget">
                            @foreach ($activities as $activity)
                            <li>
                                <div class="block">
                                    <div class="block_content">
                                        <h2 class="title">
                                            <a>{{ $activity->subject }}</a>
                                        </h2>
                                        <div class="byline">
                                            <span>
                                                <?php
                                                echo time_elapsed_string($activity->created_at);
                                                ?>
                                            </span>
                                        </div>
                                        <p class="excerpt">{{ $activity->content }}</p>
                                    </div>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
@endsection
