@extends('template.master')
@include('template.navbar')

@section('title', "Dashboard")

@section('content')
    @include('template.browse')
    <div class="row d-flex flex-column align-items-center">
        <div class="w-75 row row-cols-1 row-cols-lg-5 p-0">
            @foreach ($games as $game)
                <div class="col mb-3">    
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
    @if (!$games->isEmpty())
        <div class="row justify-content-center mb-3">
            <div class="d-flex justify-content-between w-75">
                <div class="">
                    Showing {{$games->firstItem()}} to {{$games->lastItem()}} of {{$games->total()}} results
                </div>
                <div class="">
                    {{ $games->appends($_GET)->links() }}
                </div>
            </div>
        </div>
    @endif

    <script src="{{URL::asset('storage/js/price.js')}}"></script>
@endsection