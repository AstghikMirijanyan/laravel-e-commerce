<?php

namespace App\Services\Interfaces;

interface AuthServicesInterfaces
{

    /**
     * @param array $data
     * @return bool
     */
    public function createUser(array $data): bool;

    /**
     * @param array $data
     * @return bool
     *
     */
    public function userLogin(array $data): bool;

}
