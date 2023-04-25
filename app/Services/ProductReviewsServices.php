<?php

namespace App\Services;

use App\Models\Product;
use App\Models\ProductReviews;
use App\Services\Interfaces\ProductReviewsServicesInterfaces;

class ProductReviewsServices implements ProductReviewsServicesInterfaces
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
     * @param int $productId
     * @return int
     */
    public function createReviewForProduct(array $data, int $productId)
    {
      return $this->modelRepository->createReviewForProduct($data, $productId);
    }

    public function getReviewsByProductId(int $productId)
    {
        return ProductReviews::where('product_id', $productId)->get();
    }

    public function removeReviewsFromProduct(int $id, $productId)
    {
        return ProductReviews::where(['product_id', $productId, 'id' => $id])->delete();
    }
}
