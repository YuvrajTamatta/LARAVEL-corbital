@php
$user = "yuvraj";
$names=['uv','ml','gv','rj'];
print_r($name);
@endphp

<h1>Hello {{ $name }}</h1>
{{-- <h1>City : {{ !empty($city) ? $city : "No City" }}</h1> --}}


@foreach ($city as $key => $item)
    <div><span> {{$key}} {{ $item['name'] }}</span> ||  <span>{{ $item['phone'] }}</span> ||  <span>{{ $item['city'] }}</span>|| <a href="{{ route('view', $key)}}">Show</a> </div>
@endforeach

<script>
  
 var data = {{ Js::from($name)}}
 data.forEach(element => {
console.log(element);   
    
 });
 
</script>