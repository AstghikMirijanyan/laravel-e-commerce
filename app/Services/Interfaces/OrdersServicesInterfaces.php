<?php

namespace App\Services\Interfaces;

interface OrdersServicesInterfaces
{
    /**
     * @param array $data
     * @return mixed
     */
    public function createOrder(array $data);

    /**
     * @return mixed
     * @param int $orderId
     * @param string $status
     */
    public function changeOrderStatus(int $orderId, string $status);

    /**
     * @param int $userId
     * @return mixed
     */
    public function getOrders(int $userId);
}
