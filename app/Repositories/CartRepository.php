<?php

namespace App\Repositories;

use App\Models\Cart;
use App\Repositories\Interfaces\AddProductToCartRepositoryInterface;
use Carbon\Carbon;

class CartRepository implements AddProductToCartRepositoryInterface
{
    /**
     * AuthRepository constructor.
     * @param Cart $model
     */
    private $model;

    /**
     * @param array $data
     * @return mixed
     */
    public function addProductToCart(array $data)
    {
        $currentDateTime = Carbon::now();

        $existingCartItem = \DB::table(Cart::CART_TABLE)
            ->where(Cart::PRODUCT_ID, $data['product_id'])
            ->where(Cart::USER_ID, $data['user_id'])
            ->first();

        if ($existingCartItem) {
            $newQuantity = $existingCartItem->{Cart::QUANTITY} + $data['quantity'];
            $newTotalPrice = $existingCartItem->{Cart::TOTAL_PRICE} + $data['total_price'];
            return \DB::table(Cart::CART_TABLE)
                ->where(Cart::PRODUCT_ID, $data['product_id'])
                ->where(Cart::USER_ID, $data['user_id'])
                ->update([
                    Cart::QUANTITY => $newQuantity,
                    Cart::TOTAL_PRICE => $newTotalPrice,
                    Cart::UPDATED_AT => $currentDateTime,
                ]);
        }

        return \DB::table(Cart::CART_TABLE)->insert([
            Cart::PRODUCT_ID => $data['product_id'],
            Cart::USER_ID => $data['user_id'],
            Cart::QUANTITY => $data['quantity'],
            Cart::TOTAL_PRICE => $data['total_price'],
            Cart::CREATED_AT => $currentDateTime,
            Cart::UPDATED_AT => $currentDateTime,
        ]);
    }

    /**
     * @param int $productId
     * @return mixed
     */
    public function removeProductFromCart(int $productId)
    {
        return \DB::table(Cart::CART_TABLE)->where(Cart::PRODUCT_ID, $productId)->delete();
    }

    /**
     * @param array $data
     * @return mixed
     * @throws \Exception
     */
    public function changeProductQuantity(array $data)
    {
        $productId = $data['product_id'];
        $quantity = $data['quantity'];
        $cartItem = Cart::where(Cart::PRODUCT_ID, $productId)->first();
        $cartItem->quantity = $quantity;
        $cartItem->save();

        return $cartItem;
    }

    /**
     * @param $userId
     * @return mixed
     */
    public function removeAllCartData($userId)
    {
        return Cart::where(Cart::USER_ID, $userId)->delete();
    }

    /**
     * @param int $userId
     * @return mixed
     */
    public function getCart(int $userId)
    {
       return Cart::with('product')->where(Cart::USER_ID, $userId)->get();
    }
}
