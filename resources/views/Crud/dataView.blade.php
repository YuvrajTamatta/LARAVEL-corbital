@extends('project.layout.master')
@section('content')

<div class="container"  class="d-flex flex-wrap">
    <h3>Records From Database</h3>
<div class="d-flex justify-content-end my-2">  <a href="{{ route('userform')}}"> <button class="btn btn-primary"> <i class="fa-solid fa-user-plus"></i> Add User</button></a>

    <div class="btn btn-danger btm-sm mx-3"><a href="{{ route('logout') }}" class="nav-link">Log-Out</a></div>

    </div>
    @if(session('status')==='Delete Successfull')
        
        <div class="alert alert-danger my-2" >{{session('status')}}</div>             
    @endif

    @if(session('status'))
     <div class="alert alert-success my-2" >{{session('status')}}</div>   
    @endif

   <h2>Welcome {{ Auth::user()->name ?? ""}}</h2>
<div class="h-50" >
<table class="table table-stiped border shadow rounded" >
    <thead class="table-dark">
        <th>Id</th>
        <th>Name</th>
        <th>Email</th> 
        <th>Age</th>
        <th>Checked-On</th>
        <th>Actions</th>
    </thead>
    <tbody>
        @foreach ($data as $key => $item)
            
        <tr>
            <td>{{ $item['id']}}</td>
            <td>{{ $item['name']}}</td>
            <td>{{ $item['email']}}</td>
            <td>{{ $item['email_verified_at']}}</td>            
            <td>
                <a href="{{ route('edit',['id'=>$item['id']]) }}"><button class="btn btn-warning btn-sm my-sm-2">Edit</button></a>
                <a href="{{ route('delete',['id'=>$item['id']]) }}"><button class="btn btn-danger btn-sm">Delete</button></a></td>
        </tr>
        @endforeach

    </tbody>
</table> 
</div> 
</div>
    
@endsection  
