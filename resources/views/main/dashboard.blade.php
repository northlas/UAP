@extends('template.master')
@include('template.navbar')

@section('title', "Dashboard")

@section('content')
    @include('template.browse')
    <div class="row d-flex flex-column align-items-center">
        <div class="w-75">
            <h4>Featured Games</h4>
        </div>
        <div class="w-75 row row-cols-1 row-cols-lg-5 p-0">
            @foreach ($featured_games->take(5) as $game)
                <div class="col">    
                     <a href="games/{{$game->slug}}" class="text-decoration-none text-dark">
                        <div class="card shadow-sm h-100">
                            <img src="./storage/Assets/Image/{{$game->slug}}/Thumbnail/{{$game->thumbnail}}" class="card-img-top">
                            <div class="card-body">
                                <h6 class="card-title">{{$game->title}}</h6>
                                <p class="card-text" style="font-size: 12px">{{$game->description}}</p>
                            </div>
                            <div class="card-footer text-end bg-white border-0">
                                @if ($game->price == 0)
                                    <p>FREE</p>
                                @else
                                    <p class="price">{{$game->price}}</p>
                                @endif
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
    <div class="row d-flex flex-column align-items-center mt-3">
        <div class="w-75">
            <h4>Hot Games</h4>
        </div>
        <div class="w-75">
            @foreach ($hot_games->take(8) as $game)
                <a href="games/{{$game->slug}}" class="text-decoration-none text-dark">
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
                                    @if ($game->price == 0)
                                        <p class="m-0">FREE</p>
                                    @else
                                        <p class="price m-0">{{$game->price}}</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>

   <script src="{{URL::asset('storage/js/price.js')}}"></script>
@endsection