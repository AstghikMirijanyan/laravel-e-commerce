<?php

namespace App\Repositories\Interfaces;

interface ProductReviewsRepositoryInterface
{
    /**
     * @param array $data
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
    public function removeReviewsFromProduct(int $id,int $productId);
}
