<?php

namespace App\Repositories\Interfaces;

interface AddProductToCartRepositoryInterface
{

    /**
     * @param array $data
     * @param array $images
     * @return mixed
     */
    public function addProductToCart(array $data);

    /**
     * @param int $productId
     * @return mixed
     */
    public function removeProductFromCart(int $productId);

    /**
     * @param array $data
     * @return mixed
     */
    public function changeProductQuantity(array $data);

    /**
     * @return mixed
     * @param int $userId
     */
    public function removeAllCartData(int $userId);

    /**
     * @param int $userId
     * @return mixed
     */
    public function getCart(int $userId);
}
