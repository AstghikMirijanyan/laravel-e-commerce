<?php

namespace App\Repositories\Interfaces;

interface ProductsRepositoryInterface
{

    /**
     * @param array $data
     * @param array $images
     * @return mixed
     */
    public function insertProductData(array $data, array $images);

    /**
     * @return mixed
     */
    public function getProductsData();

    /**
     * @param int $productId
     * @return mixed
     */
    public function getImagesByProductId(int $productId);

    /**
     * @param int $productId
     * @return mixed
     */
    public function getReviewsByProductId(int $productId);

    /**
     * @param array $data
     * @param array $images
     * @return mixed
     */
    public function insertOrUpdateProduct(array $data,array $images);

    /**
     * @param int $id
     * @param array $images
     * @return mixed
     */
    public function insertProductsImages(int $id, array $images);

    /**
     * @param int $id
     * @return bool
     */
    public function removeProduct(int $id): bool;

    /**
     *
     * @param int $id
     * @return mixed
     */
    public function getProduct(int $id);
}
