@extends('layouts.default')
@section('content')
    <div class="row">
        @include('components.alert')
        <div class="col-md-6 col-sm-6 col-xs-6">
            <div class="x_panel">
                <div class="x_title">
                    <h2>{{ ucfirst($action) }} danh mục {{ $category->name }}</h2>
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
                    <form class="form-horizontal form-label-left input_mask" action="{{ url('category/adddiease/' . $category->id) }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Tên danh mục <span
                                        class="required">*</span></label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <input type="text" class="form-control" name="name" required="required" value="{{ $category->name }}" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Mô tả</label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <textarea class="form-control" name="description" data-parsley-trigger="keyup" data-parsley-validation-threshold="10" rows="5" readonly>{{ $category->description }}</textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Chủ đề (nhóm bệnh)</label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <div class="row">
                                    @foreach($diseases as $disease)
                                        <div class="col-md-3 col-sm-3 col-xs-12">
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" name="diseases[]" value="{{ $disease->id }}"<?php echo in_array($disease->id, $categoryDiseases) ? ' checked' : ''; ?>>
                                                    {{ $disease->name }}
                                                </label>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
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
    </div>
@endsection
