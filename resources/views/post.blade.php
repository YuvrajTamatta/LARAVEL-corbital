{{-- @php
    $names=[];
@endphp

@include('pages.header',['name'=>'$names'])

<h1>This is form Post Route</h1>

@include('pages.footer')
 --}}


 @extends('layouts.master')
 @section('sidebar')
  
    <p>This is dynamic content</p>
    @parent
    {{message}}
 @endsection

 @push('script')
<script>
    var message = "how are you?"
</script>

 @endpush