<!--
* Create by: tiemtt
* Created by: 01/11/2019
* Updated by:
* Note:
-->
<?php ?>
@extends('layouts.default')
@section('content')
    <div id="posts_tags_search">
        <div class="page-title">
            <div class="title_left">
                <a href="{{ url('/tags') }}" title="Tạo mới tag" class="btn btn-primary"><i class="fa fa-pencil-square-o"></i> Tạo mới tags</a>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            @include('components.alert')
            <div class="col-md-6 col-sm-6 col-xs-6">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Tìm kiếm tag</h2>
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
                        <form class="form-horizontal form-label-left input_mask" method="post" action="{{ url("tags/search") }}"  accept-charset="UTF-8">
                            @csrf
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Tên tag</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input type="search" class="form-control w-75 mr-0 input-search" name="txt_search_tag" id="txt_search_tag" placeholder="Tìm kiếm tag" value="{{str_replace("-"," ",$arr_val["name"])}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12"></label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <button type="submit" class="btn btn-success">Tìm kiếm</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div id="lst_tags">
                <?php echo isset($html_done)?$html_done:'';?>
            </div>
        </div>
    </div>
@endsection
