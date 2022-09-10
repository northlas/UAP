@extends('template.master')
@include('template.navbar')

@section('title', "Add Game")

@section('content')
    <div class="row my-4 d-flex justify-content-center">        
        <div class="w-75  bg-white">
            <div class="text-center my-3">
                <h3>Add Game</h3>
            </div>
            <div class="mb-3">
                <form action="/add-game" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control @error('title') is-invalid @enderror" placeholder="Title" name="title" id="title" value="{{old('title')}}">
                        <label for="title">Title</label>
                        @error('title')
                            <div class="text-danger ms-2">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <select name="category" id="category" class="form-select @error('category') is-invalid @enderror">
                            <option hidden disabled selected></option>
                            @foreach ($categories as $category)
                                <option value="{{$category->id}}" {{old('category') == $category->id ? "selected" : ""}}>{{$category->name}}</option>
                            @endforeach
                        </select>
                        <label for="category">Category</label>
                        @error('category')
                            <div class="text-danger ms-2">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <div class="input-group">
                            <span class="input-group-text">IDR</span>
                            <div class="form-floating flex-grow-1">
                                <input type="number" class="form-control rounded-0 rounded-end @error('price') is-invalid @enderror" placeholder="Price" name="price" id="price" value="{{old('price')}}">
                                <label for="price">Price</label>
                            </div>
                        </div>
                        @error('price')
                            <div class="text-danger ms-2">{{$message}}</div>
                        @enderror
                    </div>
                    
                    <div class="mb-3">
                        <label for="thumbnail" class="form-label">Thumbnail</label>
                        <div class="form-control">
                            <input type="file" class="form-control @error('thumbnail') is-invalid @enderror" name="thumbnail" id="thumbnail" accept="image/*">
                        </div>
                        @error('thumbnail')
                            <div class="text-danger ms-2">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="slides" class="form">Slides</label> 
                        <div class="form-control">
                            <input type="file" class="form-control @error('slides') is-invalid @enderror" name="slides[]" id="slides" accept="image/*" multiple>
                        </div>
                        @error('slides')
                            <div class="text-danger ms-2">{{$message}}</div>
                        @enderror
                        @error('slides.*')
                            <div class="text-danger ms-2">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <textarea class="form-control @error('desc') is-invalid @enderror" placeholder="Description" name="desc" id="desc" style="height: 200px">{{old('desc')}}</textarea>
                        <label for="desc">Description</label>
                        @error('desc')
                            <div class="text-danger ms-2">{{$message}}</div>
                        @enderror
                    </div>
                    <button class="btn btn-secondary" type="submit">ADD</button>
                </form>
            </div>
        </div>
        
    </div>

    <style>
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        input[type=number] {
            -moz-appearance: textfield;
        }
    </style>
@endsection