@extends('project.layout.master')
@section('content')

<div class="container">
<h3 class="my-3"> Contact Us</h3>

@php
    $name=[
        1 => ['name' => 'ravi', 'phone' => '123456', 'city' => 'rajot'],
        2 => ['name' => 'milan', 'phone' => '46987', 'city' => 'surat'],
        3 => ['name' => 'uvraj', 'phone' => '4659754', 'city' => 'jamnager'],
        4 => ['name' => 'raj', 'phone' => '3654789', 'city' => 'dubai'],
        5 => ['name' => 'gaurav', 'phone' => '36547', 'city' => 'goa'],
    ]
@endphp

<table class="table table-striped border">
    <thead>
        <th>Id</th>
        <th>Name</th>
        <th>City</th>
        <th>Phone</th>
    </thead>
    <tbody>
        @foreach ($name as $key=> $item)


        <tr>
            <td> {{$key}} </td>
            <td>{{$item['name']}}</td>
            <td>{{$item['city']}}</td>
            <td>{{$item['phone']}}</td>
        </tr>
        @endforeach
        <tr> 
            <td> {{ $id }} </td>
            <td>{{ $naam }}</td>
            <td>{{ $city }}</td>
            <td>{{ $phone }}</td>

        </tr>

    </tbody>
</table>
</div>
 
@endsection

