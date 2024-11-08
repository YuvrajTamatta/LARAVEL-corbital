<h3>Record</h3>
@foreach ($name as $key => $item)
<div>{{ $key }} : {{$item['name']}}  {{$item['city']}}{{$item['phone']}} <a href="{{route('single',$key)}}">Show</a></div>
@endforeach