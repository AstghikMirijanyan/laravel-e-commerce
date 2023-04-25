<?php

namespace App\Repositories;

use App\Models\Product;
use App\Models\ProductImages;
use App\Models\ProductReviews;
use App\Repositories\Interfaces\ProductsRepositoryInterface;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class ProductsRepository implements ProductsRepositoryInterface
{
    /**
     * AuthRepository constructor.
     * @param Product $model
     */
    private $model;

    /**
     * @param array $data
     * @param string $images
     * @return mixed
     */
    public function insertProductData(array|int $data,array $images)
    {
        \DB::table(Product::PRODUCTS_TABLE)->insert(
            [
                Product::NAME => $data['name'],
                Product::PRICE => $data['price'],
                Product::SALE_PRICE => $data['sale_price'],
                Product::IMAGE => $data['image'],
                Product::SHORT_DESCRIPTION => $data['short_description'] ?? '',
                Product::DESCRIPTION => $data['description'] ?? '',
            ]
        );

        $productId = \DB::getPdo()->lastInsertId();

        for ($i = 1; $i < count($images); $i++) {
            $data[] = [
                ProductImages::IMAGE => $images[$i],
                ProductImages::PRODUCT_ID => $productId,
            ];
        }
        \DB::table(ProductImages::PRODUCT_IMAGES_TABLE)->insert($data);

        return $productId;
    }

    /**
     * @param int $id
     * @param array $images
     * @return mixed
     */
    public function insertProductsImages(int $id, array $images)
    {
        for ($i = 1; $i < count($images); $i++) {
            $data[] = [
                ProductImages::IMAGE => $images[$i],
                ProductImages::PRODUCT_ID => $id,
            ];
        }

        return \DB::table(ProductImages::PRODUCT_IMAGES_TABLE)->insert($data);
    }

    /**
     * @return Builder[]|Collection|mixed
     */
    public function getProductsData()
    {
       return Product::with('reviews', 'images');
    }

    public function getImagesByProductId(int $productId)
    {
        return ProductImages::where('product_id', $productId)->get();
    }

    /**
     * @param int $productId
     * @return mixed
     */
    public function getReviewsByProductId(int $productId)
    {
        return ProductReviews::where('product_id', $productId)->get();
    }

    /**
     * @param array $data
     * @param array $images
     * @return mixed
     */
    public function insertOrUpdateProduct(array $data, array $images)
    {
        \DB::table(Product::PRODUCTS_TABLE)->insert(
            [
                Product::NAME => $data['name'],
                Product::PRICE => $data['price'],
                Product::SALE_PRICE => $data['sale_price'],
                Product::IMAGE => $data['image'],
                Product::SHORT_DESCRIPTION => $data['short_description'] ?? '',
                Product::DESCRIPTION => $data['description'] ?? '',
            ]
        );

        $productId = \DB::getPdo()->lastInsertId();

        for ($i = 1; $i < count($images); $i++) {
            $data[] = [
                ProductImages::IMAGE => $images[$i],
                ProductImages::PRODUCT_ID => $productId,
            ];
        }
        \DB::table(ProductImages::PRODUCT_IMAGES_TABLE)->insert($data);

        return $productId;
    }

    /**
     * @param int $id
     * @return bool
     */
    public function removeProduct(int $id): bool
    {
        return \DB::table(Product::PRODUCTS_TABLE)->where('id', $id)->delete();
    }

    /**
     * @param int $id
     * @return Builder|Builder[]|Collection|Model|mixed|null
     */
    public function getProduct(int $id)
    {
        return Product::with('reviews', 'images')->where('id', $id)->get();
    }
}
