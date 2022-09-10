@extends('template.master')

@section('title', "Register")

@section('content')
    <div class="row d-flex justify-content-center align-items-center" style="height: 100vh">        
        <div class="w-25">
            <div class="d-flex justify-content-center my-3 w-100">
                <img src="../storage/Assets/Icon/laravel_icon.png" width="100px">
            </div>
            <div class="p-3 bg-white rounded">
                <form action="/register" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="name">Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{old('name')}}">
                        @error('name')
                            <div class="text-danger ms-2">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="category">Email</label>
                        <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" id="email" value="{{old('email')}}">
                        @error('email')
                            <div class="text-danger ms-2">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="password">Password</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password">
                        @error('password')
                            <div class="text-danger ms-2">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="password_confirmation">Confirm Password</label>
                        <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" id="password_confirmation">
                        @error('password_confirmation')
                            <div class="text-danger ms-2">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="d-flex justify-content-end align-items-center">
                        <a href="/login" class="text-dark me-3">Already registered?</a>
                        <button class="btn btn-secondary" type="submit">REGISTER</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection