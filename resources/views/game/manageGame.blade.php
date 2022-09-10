@extends('template.master')
@include('template.navbar')

@section('title', "Manage Game")

@section('content')
    <div class="row my-3">
        <div class="d-flex justify-content-center">
            <a href="/add-game" class="btn btn-dark">ADD NEW GAME</a>
        </div>
    </div>
    <div class="row d-flex flex-column align-items-center">
        <div class="w-75">
            @foreach ($games as $game)
                <div class="card shadow-sm mb-3">
                    <div class="row g-0">
                        <div class="col-lg-2">
                            <img src="./storage/Assets/Image/{{$game->slug}}/Thumbnail/{{$game->thumbnail}}" class="img-fluid rounded-start">
                        </div>
                        <div class="col-lg-8 d-flex align-items-center">
                            <div class="card-body">
                                <h5 class="card-title">{{$game->title}}</h5>
                                <p class="card-text text-muted" style="font-size: 14px">{{$game->category->name}}</p>
                            </div>
                        </div>
                        <div class="col-lg-2 d-flex align-items-center justify-content-end">
                            <div class="card-footer bg-white border-0">
                                <div class="text-end mb-2">
                                    @if ($game->price == 0)
                                        <p class="m-0">FREE</p>
                                    @else
                                        <p class="price m-0">{{$game->price}}</p>
                                    @endif
                                </div>
                                <div class="d-flex">
                                    <a href="/update-game/{{$game->slug }}" class="btn btn-dark me-2">UPDATE</a>
                                    <a href="/delete-game/{{$game->slug}}" class="btn btn-danger">DELETE</a>
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
            <div class="">
                Showing {{$games->firstItem()}} to {{$games->lastItem()}} of {{$games->total()}} results
            </div>
            <div class="">
                {{ $games->links() }}
            </div>
        </div>
    </div>

    <script src="{{URL::asset('storage/js/price.js')}}"></script>
@endsection