@extends('template.master')
@include('template.navbar')

@section('title', "Add Game")

@section('content')
    <div class="row my-4 d-flex justify-content-center">        
        <div class="w-75  bg-white">
            <div class="text-center my-3">
                <h3>Add Category</h3>
            </div>
            <div class="mb-3">
                <form action="/add-category" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control @error('category') is-invalid @enderror" placeholder="Add Category" name="category" id="category" value="{{old('category')}}">
                        <label for="category">Add Category</label>
                        @error('category')
                            <div class="text-danger ms-2">{{$message}}</div>
                        @enderror
                    </div>
                    <button class="btn btn-secondary" type="submit">ADD</button>
                </form>
            </div>
        </div>
        
    </div>
@endsection