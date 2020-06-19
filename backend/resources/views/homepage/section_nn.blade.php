<ul class="ul ul-why">
    @foreach($dataT as $key => $data)
        @if($key == 0)
            <li class="why-heading">
                <div>
                    <h3>{{$data['post_title']}}</h3>
                    <p>{{$data['post_title']}}</p>
                </div>
            </li>
        @else
            <li>
                <div>
                    <img src="{{$data['post_image']}}" class="icon-why">
                    <p class="lead-why">{{$data['post_title']}}</p>
                </div>
            </li>
        @endif
    @endforeach
</ul>
