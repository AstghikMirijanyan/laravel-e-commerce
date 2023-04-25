@extends('layouts.app')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
@section('content')
    <div class="container">
        <div class="starter-template">
            <h1>{{ __('Cart') }}</h1>
            <p>{{ __('Checkout') }}</p>
            <div class="panel">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>{{ __('Name') }}</th>
                        <th>{{ __('Quantity') }}</th>
                        <th>{{ __('Price') }}</th>
                        <th>{{ __('Subtotal Price') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $total = 0; ?>
                    @foreach($cartData as $items)
                        <tr>
                            <td>
                                <a href="product/{{$items->product->id}}">
                                    <img height="56px" src="{{$items->product->image}}">
                                    {{$items->product->name}}
                                </a>
                            </td>
                            <td><span class="badge">{{$items->quantity}}</span>
                                <div class="btn-group form-inline">

                                    <button type="submit" class="btn btn-danger"
                                            href=""><span data-product-quantity="{{$items->quantity}}"
                                                          data-pr-id="{{$items->product->id}}"
                                                          class="glyphicon glyphicon-minus" aria-hidden="true"></span>
                                    </button>

                                    <button type="submit" class="btn btn-success"
                                            href=""><span data-product-quantity="{{$items->quantity}}"
                                                          data-pr-id="{{$items->product->id}}"
                                                          class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                                    </button>
                                </div>
                            </td>
                            <td>{{$items->product->price. __('AMD') }}</td>
                                <?php $subtotal = $items->product->price * $items->quantity;
                                $total += $subtotal;
                                ?>
                            <td>{{$subtotal. __('AMD') }}</td>
                            <td>
                                <form action="{{route('removeProductFromCart.post')}}" method="POST">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{$items->product->id}}">

                                    <button type="submit" class="btn btn-danger"
                                            href="">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                             fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                            <path
                                                d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z"/>
                                            <path
                                                d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z"/>
                                        </svg>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach

                    <tr>
                        <td colspan="3">{{ __('Total Price') }}</td>
                        <td>{{$total. __('AMD') }}</td>
                    </tr>
                    </tbody>
                </table>
                <br>
                <div class="btn-group pull-right" role="group">
                    <a type="button" class="btn btn-success"
                       href="">{{ __('Place an order') }}</a>
                </div>
            </div>
        </div>
    </div>
@endsection
<script>
    $(document).ready(function () {

        $('.glyphicon-minus').click(function () {

            let product_id = $(this).data('pr-id');
            let inputValue = $(this).data('product-quantity');
            let newValue = (inputValue - 1);
            sendAjaxRequest(product_id, newValue);
        });

        $('.glyphicon-plus').click(function () {
            let product_id = $(this).data('pr-id');
            let inputValue = $(this).data('product-quantity');
            let newValue = (+inputValue + 1);
            sendAjaxRequest(product_id, newValue);
        });

        function sendAjaxRequest(product_id, newValue) {
            $.ajax({
                url: "/changeProductQuantityInCart",
                type: "POST",
                data: {
                    product_id: product_id,
                    quantity: newValue,
                    _token: "{{ csrf_token() }}"
                },
                success: function (response) {
                    location.reload();
                },
                error: function (error) {
                    console.log(error);
                }
            });
        }
    });
</script>
