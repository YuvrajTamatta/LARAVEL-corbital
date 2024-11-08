<h1>Header Page</h1>



@forelse ($names as $key=>$value)
<p>{{$key}} = {{$value}}</p>

@empty
    <p>No value found</p>
@endforelse