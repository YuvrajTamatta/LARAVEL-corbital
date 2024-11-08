<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('favicon') }}">
</head>
<body>
    <h1>Header</h1>
@section('sidebar')
    <ul>
        <li>home</li>
        <li>About</li>
    </ul>
    
@show
<h2>footer</h2>
@stack('script')
</body>
</html>