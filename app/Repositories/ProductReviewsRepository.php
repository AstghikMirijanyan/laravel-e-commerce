<?php

namespace App\Repositories;

use App\Models\ProductImages;
use App\Models\ProductReviews;
use App\Repositories\Interfaces\ProductReviewsRepositoryInterface;

class ProductReviewsRepository implements ProductReviewsRepositoryInterface
{
    /**
     * AuthRepository constructor.
     * @param ProductImages $model
     */
    private $model;

    public function createReviewForProduct(array $data, int $productId)
    {
        \DB::table(ProductReviews::PRODUCT_REVIEWS_TABLE)->insert(
            [
                ProductReviews::PRODUCT_ID => $productId,
                ProductReviews::USER_ID => $data['user_id'],
                ProductReviews::RATING => $data['rating'],
                ProductReviews::TEXT => $data['text'],
            ]
        );

        return $productId;
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
