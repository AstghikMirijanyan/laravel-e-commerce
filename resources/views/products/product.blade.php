@extends('layouts.app')
@section('content')
        <div class="starter-template">
            @foreach($product as $product)
                <h1>{{$product->name}}</h1>
                <h2>{{$product->description}}</h2>
                <p>Price: <b>{{$product->price}} AMD</b></p>
                <img src="{{$product->image}}">
                <div class="row" style="display: flex; margin: 0 auto">

                    @foreach($product->images as $image)
                        <img width="100" style="margin-left: 20px" src="{{$image->image}}">
                    @endforeach

                </div>
                <p>{{$product->description}}</p>

                <form action="{{ route('addToCart.post') }}" method="POST">
                    @csrf
                    <input type="hidden" name="product_id">
                    <button type="submit" class="btn btn-success" role="button">{{ __('ADD TO CART') }}</button>
                </form>
                <div class="product-ratings">
                    <h3>{{ __('Product Ratings') }}</h3>
                    <div class="rating-stars">
                        <span class="star-rating" style="width: {percentage}%"></span>
                    </div>
                    <div class="rating-details">
                        <?php  $avg = 0;?>
                        @if(!empty($product->reviews))
                        @foreach($product->reviews as $review)
                            <?php $avg += $review->rating ?>
                        @endforeach
                        <span class="total-ratings">{{ $avg > 0 ?( $avg / count($product->reviews)) : '' }} all {{count($product->reviews)}} ratings</span>
                            @foreach($product->reviews as $review)
                                <p> {{$review->text}}</p>
                            @endforeach

                        @endif
                    </div>

                    <div class="user-rating">
                        <h4>Rate this product:</h4>
                        <form action="{{ route('reviews.post') }}" method="POST">
                            @csrf
                            <input type="hidden" name="product_id" value="{{$product->id}}">
                            <input type="hidden" name="user_id" value="{{auth()->user()->id ?? ''}}">
                            <div class="form-group">
                                <label for="rating">{{ __('Enter your rating:') }} </label>
                                <input type="number" name="rating"  id="rating" class="form-control">
                                @if ($errors->has('rating'))
                                    <span class="text-danger">{{ $errors->first('rating') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="text">{{ __('Leave a review:') }}</label>
                                <textarea name="text" id="text" class="form-control"></textarea>
                                @if ($errors->has('text'))
                                    <span class="text-danger">{{ $errors->first('text') }}</span>
                                @endif
                            </div>
                            <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
                        </form>
                    </div>
                </div>
            @endforeach

        </div>

    </div>

@endsection
