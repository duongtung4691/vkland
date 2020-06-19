@foreach($dataT as $data)
<div class="col-md-4"></div>
<div class="col-md-5 suggest-question">
    <div class="inner-question">
        <h3>{{$data['post_title']}}</h3>
        <p>{{ shorten_string($data['post_excerpt'], 40) }}</p>
    </div>
</div>
<div class="col-md-3 suggest-button">
    <a class="btn btn-transparent" href="{{$data['post_link']}}">Đặt câu hỏi</a>
</div>
@endforeach
