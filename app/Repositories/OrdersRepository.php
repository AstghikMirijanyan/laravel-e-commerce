<?php

namespace App\Repositories;

use App\Models\OrderProducts;
use App\Models\Orders;
use App\Models\Product;
use App\Models\ProductImages;
use App\Models\ProductReviews;
use App\Repositories\Interfaces\CreateOrderRepositoryInterface;
use App\Repositories\Interfaces\ProductsRepositoryInterface;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class OrdersRepository implements CreateOrderRepositoryInterface
{
    /**
     * AuthRepository constructor.
     * @param Orders $model
     */
    private $model;

    /**
     * @param array $data
     * @return mixed
     */
    public function createOrder(array $data)
    {
        \DB::table(Orders::ORDERS_TABLE)->insert(
            [
                Orders::STATUS => 'draft',
            ]
        );

        $orderId = \DB::getPdo()->lastInsertId();

        for ($i = 1; $i < count($data['products']); $i++) {
            $data[] = [
                OrderProducts::PRODUCT_ID => $data['products'][$i],
                OrderProducts::PRICE => $data['products'][$i]['price'],
                OrderProducts::TOTAL_PRICE => $data['products'][$i]['total_price'],
                OrderProducts::QUANTITY => $data['products'][$i]['quantity'],
            ];
        }
        \DB::table(OrderProducts::ORDERS_PRODUCTS_TABLE)->insert($data);

        return $orderId;
    }

    /**
     * @param int $orderId
     * @param string $status
     * @return true
     */
    public function changeOrderStatus(int $orderId, string $status)
    {
        $order = Orders::find($orderId);
        $order->status = $status;
        $order->save();

        return true;
    }

    /**
     * @param int $userId
     * @return Builder[]|Collection|mixed
     */
    public function getOrders(int $userId)
    {
        return  Orders::with('orderProducts', 'products')->where('user_id', $userId);
    }
}
