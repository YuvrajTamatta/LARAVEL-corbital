@extends('project.layout.master')
@section('content')


<div class="container">
    <div class="row justify-content-center my-5 align-items-center">
        <div class="col-md-4 col-sm-12 col-lg-6 col-md-10">
            <div class="card shadow-sm">
                <div class="card-body p-4">
                    <h2 class="text-center mb-4">Login</h2>
                    <form action="{{ route('logindata')}}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="email" class="form-label">Email </label>
                            <input type="email" name="email" class="form-control" id="email">
                            @error('email')
                                <div class="text-danger my-2">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" id="password">
                            @error('password')
                            <div class="text-danger my-2">{{$message}}</div>
                        @enderror
                        </div>
                      
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">Sign In</button>
                        </div>
                        <div class="text-center mt-3">
                            <a href="#" class="text-decoration-none">Forgot password</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>




@endsection  
