@extends('layouts.default')
@section('content')
<section id="breadcrumb">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <p class="breadcrumbs mb-0">
                    <span class="mr-2"><a href="/">Trang chủ</a></span>/<span class="ml-2 mr-2"><a href="/suc-khoe/{{ $category->slug }}">{{ $category->name }}</a></span>/<span class="ml-2"><a class="active">Chủ đề "{{ $disease->name }}"</a></span>
                </p>
            </div>
        </div>
    </div>
</section>
<section id="detail_top_background" class="hero-wrap hero-wrap-2" style="background-image: url('{{ url('images/graphics/detail_top_background.jpg') }}');"></section>
<section id="detail_content">
    <div class="container">
        @include('category.box.social_share')
        <div class="row mt-5 mb-3">
            <h2 class="mb-4">{{ $post->title }}</h2>
            <div class="author">
                Bởi <a href="javascript:void(0)"><strong>{{ $post->author_name }}, </strong></a>
            </div>
            <div class="datetime">
                {{ date('d/m/Y - H:i A', $post->published_at) }}
            </div>
            <p class="description mt-4 mb-4">
                {{ $post->excerpt }}
            </p>
            @if (!empty($relatedPost))
                <ul class="related_news">
                    <?php
                    foreach ($relatedPost as $rel) {
                        echo '<li><span>';
                        switch ($rel->post_type) {
                            case 'video':
                                echo '<img src="' . config()->get('constants.FRONTEND_URL') . '/images/icons/ic-video.svg" alt="">';
                                break;
                            default:
                                echo '>>';
                                break;
                        }
                        echo '</span><a href="'.$rel->share_url.'" class="ml-2" title="'.$rel->title.'">'.$rel->title.'</a></li>';
                    }
                    ?>
                </ul>
            @endif
            <div class="content_detail">
                <?php echo html_entity_decode($post->content); ?>
            </div>
        </div>
        @if (!empty($tagPost))
            <div class="row mt-5 pb-5 list_tags">
                <?php
                foreach ($tagPost as $t => $tag) {
                    if ($t > 4) break;
                    echo '<a class="list_tag__item">' . $tag . '</a>';
                }
                ?>
            </div>
        @endif
        @if (!empty($post->banner_image))
            <div class="row mt-5 mb-6">
                <a href="{{ $post->banner_url }}">
                    <img src="{{ url(config()->get('constants.STATIC_IMAGES') . $post->banner_image) }}" alt="" class="w-75"/>
                </a>
            </div>
        @endif
    </div>
</section>
@include('category.box.sp_lienquan')
@endsection
