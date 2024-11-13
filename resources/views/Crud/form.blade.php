@extends('project.layout.master')
@section('content')


<div class="container">


   <div class="shadow  border m-4 rounded">
    <h4 class="text-center fs-2  bg-secondary text-light p-2">Add User Form</h4>

    <form action="{{ route('adduser')}}" method="POST" class="form p-3">
        @csrf

        <input type="hidden" name="id" id="id" value={{ $data['id'] ?? "" }}>

        <label for="name" class="form-label">Name:</label>
        <input type="text" name="name" id="name" class="form-control mb-2 @error('name') is-invalid @enderror" value={{ $data['name'] ?? ""}}>
        @error('name')
        <div class="text-danger my-2">{{$message}}</div>  
        @enderror 

        <label for="email" class="form-label">Email:</label>
        <input type="text" name="email" id="email" class="form-control mb-2 @error('email') is-invalid @enderror" value={{ $data['email'] ?? ""}}>
        @error('email')
        <div class="text-danger my-2">{{$message}}</div>  
        @enderror

        <label for="email_verified_at" class="form-label">Email verified at:</label>
        <input type="date" name="email_verified_at" id="email_verified_at" class="form-control mb-2 @error('email_verified_at') is-invalid @enderror" value={{ $data['email_verified_at'] ?? ""}}>
        @error('email_verified_at')
        <div class="text-danger my-2">{{$message}}</div>  
        @enderror

        <label for="password" class="form-label">Password:</label>
        <input type="password" name="password" id="password" class="form-control mb-2 @error('password') is-invalid @enderror" value={{ $data['password'] ?? ""}}>
        @error('password')
        <div class="text-danger my-2">{{$message}}</div>  
        @enderror

      <div class="d-flex justify-content-center my-3">
         <button type="submit" class="btn btn-info">Add User</button>
      </div>
    </form>
   </div>
</div>
    
@endsection  
