@foreach ($dataT as $data)
<li>
    <a href="{{$data['post_link']}}">
        > {{$data['post_title']}}
    </a>
</li>
@endforeach
