<?php

namespace App\Services;

use App\Services\Interfaces\CartServicesInterfaces;

class CartServices implements CartServicesInterfaces
{
    /**
     * @var $modelRepository
     */
    protected $modelRepository;

    public function __construct($modelRepository)
    {
        $this->modelRepository = $modelRepository;
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function addProductToCart(array $data)
    {
        return $this->modelRepository->addProductToCart($data);
    }

    /**
     * @param int $productId
     * @return mixed
     */
    public function removeProductFromCart(int $productId)
    {
        return $this->modelRepository->removeProductFromCart($productId);
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function changeProductQuantity(array $data)
    {
        return $this->modelRepository->changeProductQuantity($data);
    }

    /**
     * @param int $userId
     * @return mixed
     */
    public function removeAllCartData(int $userId)
    {
        return $this->modelRepository->removeAllCartData($userId);
    }

    /**
     * @param int $userId
     * @return mixed
     */
    public function getCart(int $userId)
    {
        return $this->modelRepository->getCart($userId);
    }
}
