@extends('template.master')
@include('template.navbar')

@section('title')
    {{$game->title}}
@endsection

{{-- {{dd($game)}} --}}

@section('content')
    <div class="row d-flex justify-content-center my-3">
        <div class="row row-cols-2 p-0 w-75">
            <div class="col-lg-4">
                <div class="card h-100 rounded-0 rounded-bottom">
                    <img src="../storage/Assets/Image/{{$game->slug}}/Thumbnail/{{$game->thumbnail}}">
                    <div class="card-body">
                        <h4 class="card-title">{{$game->title}}</h4>
                        <p class="card-text">{{$game->description}}</p>
                    </div>
                    <div class="card-footer bg-white border-0">
                        @if ($game->price == 0)
                            <p>FREE</p>
                        @else
                            <p class="price">{{$game->price}}</p>
                        @endif
                        @if ($in_cart)
                            <a href="/cart" class="btn btn-outline-secondary">ADDED TO CART</a>
                        @elseif($in_trans)
                            <p class="btn btn-outline-secondary">ADDED TO TRANSACTION</p>
                        @else
                            <a href="/cart/add/{{$game->slug}}" class="btn btn-dark">ADD TO CART</a>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div id="carouselIndicator" class="carousel slide" data-bs-ride="true">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselIndicator" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        @for ($i = 1; $i < count($slides); $i++)
                            <button type="button" data-bs-target="#carouselIndicator" data-bs-slide-to="{{$i}}" aria-label="Slide {{$i}}"></button>
                        @endfor
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="../storage/Assets/Image/{{$game->slug}}/Carousel/{{$slides[0]}}" class="d-block h-100 img-fluid">
                        </div>
                        @for ($i = 1; $i < count($slides); $i++)
                            <div class="carousel-item">
                                <img src="../storage/Assets/Image/{{$game->slug}}/Carousel/{{$slides[$i]}}" class="d-block h-100 img-fluid">
                            </div>
                        @endfor
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselIndicator" data-bs-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselIndicator" data-bs-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="row d-flex justify-content-center ">
        <div class="row w-75">
            <div class="card mb-3 py-3 px-5">
                <div class="d-flex justify-content-between">
                    <div class="d-flex justify-content-center">
                        <div>
                            <p class="m-0 text-secondary">Genre</p>
                            <p class="m-0 fs-4">{{$game->category->name}}</p>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center">
                        <div>
                            <p class="m-0 text-secondary">Release Date</p>
                            <p class="m-0 fs-4">{{date_format($game->created_at, 'd M, Y')}}</p>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center">
                        <div>
                            <p class="m-0 text-secondary">All Reviews</p>
                            <p class="m-0 fs-5">{{$status->recommended_count}} Recommended
                            <br>{{$status->not_recommended_count}} Not Recommended</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if (!$games->isEmpty())
        <div class="row d-flex justify-content-center">
            <div class="w-75">
                <h4>More Like This</h4>
            </div>
            <div class="w-75 row row-cols-1 row-cols-lg-3 p-0">
                @foreach ($games->take(3) as $item)
                    <div class="col">    
                        <a href="{{$item->slug}}" class="text-decoration-none text-dark">
                            <div class="card bg-transparent border-0 h-100">
                                <img src="../storage/Assets/Image/{{$item->slug}}/Thumbnail/{{$item->thumbnail}}">
                                <div class="card-footer bg-transparent text-end border-0 p-0">
                                    @if ($item->price == 0)
                                        <p>FREE</p>
                                    @else
                                        <p class="price">{{$item->price}}</p>
                                    @endif
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    @endif
    <div class="row d-flex justify-content-center ">
        <div class="row w-75">
            <div class="card mb-3 py-3 px-5">
                <div class="card-header bg-transparent border-0 p-0"><h4>Leave a Review!</h4></div>
                <div class="card-body p-0">
                    <div class="input-group">
                        <form action="/games/{{$game->slug}}/add-review" method="POST" class="w-100">
                            @csrf
                            <div class="d-flex flex-column mb-3">
                                <div class="d-flex">
                                    <div class="form-check bg-transparent border-0 me-3">
                                        <input type="radio" id="radRecommended" name="flexRadioDefault" class="form-check-input me-2 rounded-0 rounded-3" value="Recommended">
                                        <label for="radRecommended" class="form-check-label" >Recommended</label>
                                    </div>
                                    <div class="form-check bg-transparent border-0">
                                        <input type="radio" id="radNotRecommended" name="flexRadioDefault" class="form-check-input me-2 rounded-0 rounded-3" value="Not Recommended">
                                        <label for="radNotRecommended" class="form-check-label">Not Recommended</label>
                                    </div>
                                </div>
                                @error('flexRadioDefault')
                                    <div class="text-danger ms-1">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="my-3">
                                <textarea class="form-control" name="txtReview" id="txtReview" cols="30" rows="10"></textarea>
                                @error('txtReview')
                                    <div class="text-danger ms-1">{{$message}}</div>
                                @enderror
                            </div>
                            <div>
                                <button class="btn btn-dark" type="submit">POST</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row d-flex justify-content-center mb-3">
        <div class="w-75 row row-cols-1 row-cols-lg-3 p-0">
            @foreach ($reviews as $review)
                <div class="col mb-3 d-flex align-items-stretch">
                    <div class="card w-100">
                        <div class="card-body">
                            <div class="fw-semibold">{{$review->user->name}}</div>
                            <div class="d-flex my-2">
                                <img src="../storage/Assets/Icon/{{$review->symbol}}.png" style="height: 45px">
                                <div class="d-flex align-items-center">
                                    <p class="m-0">{{$review->status}}</p>
                                </div>
                            </div>
                            <div>{{$review->review}}</div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <script src="{{URL::asset('storage/js/price.js')}}"></script>
@endsection