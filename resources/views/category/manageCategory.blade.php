@extends('template.master')
@include('template.navbar')

@section('title', "Manage Category")

@section('content')
    <div class="row my-3">
        <div class="d-flex justify-content-center">
            <a href="/add-category" class="btn btn-dark">ADD CATEGORY</a>
        </div>
    </div>
    <div class="row d-flex flex-column align-items-center">
        <div class="w-75">
            @foreach ($categories as $category)
                <div class="card shadow-sm mb-3">
                    <div class="row g-0 my-2">
                        <div class="col-lg-10 d-flex align-items-center">
                            <div class="card-body">
                                <p class="card-text fs-5">{{$category->name}}</p>
                            </div>
                        </div>
                        <div class="col-lg-2 d-flex align-items-center justify-content-end">
                            <div class="card-footer bg-white border-0">
                                <div class="d-flex">
                                    <a href="/update-category/{{$category->slug}}" class="btn btn-dark me-2">UPDATE</a>
                                    <a href="/delete-category/{{$category->slug}}" class="btn btn-danger">DELETE</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="row justify-content-center mb-3">
        <div class="d-flex justify-content-between w-75">
            <div>
                Showing {{$categories->firstItem()}} to {{$categories->lastItem()}} of {{$categories->total()}} results
            </div>
            <div>
                {{ $categories->links() }}
            </div>
        </div>
    </div>

    <script src="{{URL::asset('storage/js/price.js')}}"></script>
@endsection