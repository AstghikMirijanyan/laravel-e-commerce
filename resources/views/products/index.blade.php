@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="starter-template">
            <h1>{{ __('PRODUCTS') }}</h1>
            <form method="GET" action="/">
                <div class="filters row">
                    <div class="col-sm-4 col-md-4">
                        <label for="price_from">{{ __('Price from') }}<input type="text" name="price_from" id="price_from" size="6"
                                                               value="">
                        </label>
                        <label for="price_to">{{ __('Price to') }}<input type="text" name="price_to" id="price_to" size="6" value="">
                        </label>
                    </div>

                    <div class="col-sm-4 col-md-4">
                        <label for="name">
                            <input type="text" name="name" id="name">{{ __('Name') }}  </label>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <button type="submit" class="btn btn-primary">{{ __('Filter') }}</button>
                        <a href="/" class="btn btn-warning">{{ __('Reset') }}</a>
                    </div>
                </div>
            </form>
            <div class="row">
                @foreach($products as $product)
                    <div class="col-sm-6 col-md-4">
                        <div class="thumbnail">
                            <div class="labels">
                            </div>

                            <img src="{{$product->image}}" alt="{{$product->image}}}">
                            <div class="caption">
                                <h3>{{$product->short_description}}</h3>
                                <p>{{$product->price}} AMD</p>
                                <p>
                                <form action="{{ route('addToCart.post') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{$product->id}}">
                                    <input type="hidden" name="user_id" value="{{auth()->user()->id ?? ''}}">
                                    <input type="hidden" name="quantity" value="1">
                                    <input type="hidden" name="total_price" value="{{$product->price}}">
                                    <button type="submit" class="btn btn-primary" role="button">{{ __('Shop now') }}</button>
                                    <a href="product/{{$product->id}}"
                                       class="btn btn-default"
                                       role="button">{{ __('More') }}</a>
                                </form>
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <nav>
                {{$products->links()}}
            </nav>
        </div>
    </div>
@endsection
