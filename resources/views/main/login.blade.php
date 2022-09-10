@extends('template.master')

@section('title', "Login")

@section('content')
    @if (session('errors'))
        @if (session('errors')->first('message'))
            <div class="row d-flex justify-content-center mt-5">
                <div class="alert alert-success alert-dismissible fade show w-50" role="alert">
                    <p class="m-0">{{session('errors')->first('message')}}</p>
                    <button type="button" class="btn-close p-0 p-3" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
            </div>
        @endif
    @endif
    <div class="row d-flex justify-content-center align-items-center" style="height: 100vh">        
        <div class="w-25">
            <div class="d-flex justify-content-center my-3 w-100">
                <img src="../storage/Assets/Icon/laravel_icon.png" width="100px">
            </div>
            <div class="p-3 bg-white rounded">
                <form action="/login" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="category">Email</label>
                        <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" id="email" value="{{old('email')}}">
                        @error('email')
                            <div class="text-danger ms-2">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="password">Password</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" value="{{old('password')}}">
                        @error('password')
                            <div class="text-danger ms-2">{{$message}}</div>
                        @enderror
                        @if (session('errors'))
                            @if (session('errors')->first('login'))
                                <div class="text-danger ms-2">{{session('errors')->first('login')}}</div>
                            @endif
                        @endif
                    </div>
                    <div class="mb-3">
                        <input type="checkbox" name="remember_me" id="remember_me">
                        <label for="remember_me">Remember me</label>
                    </div>
                    <div class="d-flex justify-content-center mb-3">
                        <a href="/register" class="text-dark">Don't have an account? Register now!</a>
                    </div>
                    <div class="d-flex justify-content-center">
                        <button class="btn btn-secondary" type="submit">LOGIN</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection