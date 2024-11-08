<h1>Hello Yuvraj This is laravel Project</h1>

{{5 +4}}

<br><br>

{{ "hello yuvraj" }}

{!! "<h1>Yuvraj</h1>" !!}

{{-- {!! "<script>alert('hello')</script>"!!} --}}

@php
    $names = ['ravi', 'gaurav', 'milan', 'sanju'];
@endphp

<ul>
    @foreach ($names as $item)
        @if ($loop->even)
        <li style="color:red"> {{ $item }}</li>
        @else
        <li> {{ $item }}</li>
        @endif
    @endforeach
</ul>

<a href="{{route('blog')}}">Blog Page</a>
