<?php

namespace App\Services;

use App\Models\Product;
use App\Services\Interfaces\ProductsServicesInterfaces;

class ProductsServices implements ProductsServicesInterfaces
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
     * @param array $images
     * @return mixed
     */
    public function insertProductData(array $data, array $images)
    {
        return $this->modelRepository->insertProductData($data, $images);
    }

    /**
     * @return array|mixed
     */
    public function getProductsData()
    {
        $pageSize = 10;
        $data = [];
        $productsQuery = $this->modelRepository->getProductsData();

        if ($productsQuery !== null) {
            $data = $productsQuery->orderBy(Product::CREATED_AT, 'desc')->paginate($pageSize);
        }

        return $data;
    }

    /**
     * @param int $productId
     * @return mixed
     */
    public function getImagesByProductId(int $productId)
    {
        return $this->modelRepository->getImagesByProductId($productId);
    }

    /**
     * @param int $productId
     * @return mixed
     */
    public function getReviewsByProductId(int $productId)
    {
        return $this->modelRepository->getReviewsByProductId($productId);
    }

    /**
     * @param array $data
     * @param array $images
     * @return mixed
     */
    public function insertOrUpdateProduct(array $data, array $images)
    {
        return $this->modelRepository->insertOrUpdateProduct($data, $images);
    }

    /**
     * @param int $id
     * @param array $images
     * @return mixed
     */
    public function insertProductsImages(int $id, array $images)
    {
        return $this->modelRepository->insertProductsImages($id, $images);
    }

    /**
     * @param int $id
     * @return bool
     */
    public function removeProduct(int $id): bool
    {
        return $this->modelRepository->removeProduct($id);
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function getProduct(int $id)
    {
        return $this->modelRepository->getProduct($id);
    }
}
