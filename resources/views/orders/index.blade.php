@extends('layouts.app')

@section('content')
    <div id="app">
        <div class="py-4">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <h1>{{ __('Orders') }}</h1>
                        <table class="table">
                            <tbody>
                            <tr>
                                <th>
                                    #
                                </th>
                                <th>
                                    {{ __('Products') }}
                                </th>
                                <th>
                                    {{ __('Quantity') }}
                                </th>
                                <th>
                                    {{ __('Price') }}
                                </th>
                                <th>
                                    {{ __('Total Price') }}
                                </th>

                                <th>
                                    {{ __('Status') }}
                                </th>
                                <th>
                                    {{ __('Created date') }}
                                </th>
                                <th>
                                    {{ __('Updated date') }}
                                </th>
                            </tr>
                            @foreach($orders as $order)
                                <tr>
                                    <td>{{$order->id}}</td>
                                    @foreach($order->orderProducts as $product)
                                        <td>{{$product->product->name}}</td>
                                        <td>{{$product->quantity}}</td>
                                        <td>{{$product->product->price}}AMD</td>
                                        <td>{{$product->quantity * $product->product->price}}AMD</td>
                                        <td>{{$order->status}}</td>
                                        <td>{{$order->created_at}}</td>
                                        <td>{{$order->updated_at}}</td>
                                    @endforeach
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
