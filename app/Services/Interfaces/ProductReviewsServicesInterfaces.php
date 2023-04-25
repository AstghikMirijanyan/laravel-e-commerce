<?php

namespace App\Services\Interfaces;

interface ProductReviewsServicesInterfaces
{
    /**
     * @param array $data
     * @param int $productId
     * @return mixed
     */
    public function createReviewForProduct(array $data, int $productId);

    /**
     * @param int $productId
     * @return mixed
     */
    public function getReviewsByProductId(int $productId);

    /**
     * @param int $productId
     * @param int $id
     * @return bool
     */
    public function removeReviewsFromProduct(int $id, $productId);
}
