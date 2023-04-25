<?php

namespace App\Services;

use App\Models\Orders;
use App\Models\Product;
use App\Services\Interfaces\OrdersServicesInterfaces;

class OrdersServices implements OrdersServicesInterfaces
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
    public function createOrder(array $data)
    {
        return $this->modelRepository->createOrder($data);
    }

    /**
     * @param int $orderId
     * @param string $status
     * @return mixed
     */
    public function changeOrderStatus(int $orderId, string $status)
    {
        return $this->modelRepository->changeOrderStatus($orderId, $status);
    }

    /**
     * @param int $userId
     * @return array|mixed
     */
    public function getOrders(int $userId)
    {
        $pageSize = 10;
        $data = [];
        $ordersQuery = $this->modelRepository->getOrders($userId);

        if ($ordersQuery !== null) {
            $data = $ordersQuery->orderBy(Orders::CREATED_AT, 'asc')->paginate($pageSize);
        }

        return $data;
    }
}
