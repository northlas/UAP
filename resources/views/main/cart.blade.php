@extends('template.master')
@include('template.navbar')

@section('title', "Manage Game")

@section('content')
    <div class="row d-flex justify-content-center mt-4">
        <div class="w-75">
            <h4>Your Cart</h4>
        </div>
    </div>
    <div class="row d-flex flex-column align-items-center">
        <div class="w-75">
            <div class="card shadow-sm mb-3">
                @if ($carts->isEmpty())
                    <div class="card-body text-center">
                        Your cart is empty, let's add some game!
                    </div>
                @else
                    <div class="card-body p-0 pt-3 px-3 pb-2">
                        @foreach ($carts as $cart)
                            <div class="card border-0 mb-2">
                                <div class="row g-0">
                                    <div class="col-lg-2">
                                        <img src="./storage/Assets/Image/{{$cart->game->slug}}/Thumbnail/{{$cart->game->thumbnail}}" class="img-fluid rounded">
                                    </div>
                                    <div class="col-lg-8 d-flex align-items-center">
                                        <div class="card-body">
                                            <h5 class="card-title">{{$cart->game->title}}</h5>
                                            <p class="card-text text-muted" style="font-size: 14px">{{$cart->game->category->name}}</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 d-flex align-items-center justify-content-end">
                                        <div class="card-footer bg-white border-0">
                                            <div class="text-end mb-2">
                                                @if ($cart->game->price == 0)
                                                    <p class="m-0">FREE</p>
                                                @else
                                                    <p class="price m-0">{{$cart->game->price}}</p>
                                                @endif
                                            </div>
                                            <div class="d-flex">
                                                <a href="/cart/remove/{{$cart->game_id}}" class="btn btn-danger">REMOVE</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="card-footer d-flex justify-content-between align-items-center bg-white">
                        <div>
                            <h5 class="m-0">Total</h5>
                            <p class="m-0 text-muted">{{$carts->count()}} game(s)</p>
                        </div>
                        <div>
                            <p class="price m-0">{{$total}}</p>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
    @if (!$carts->isEmpty())
        <div class="row d-flex justify-content-center">
            <div class="w-75 d-flex justify-content-end">
                <a href="/cart/checkout" class="btn btn-dark">CHECKOUT</a>
            </div>
        </div>
    @endif

    <script src="{{URL::asset('storage/js/price.js')}}"></script>
@endsection