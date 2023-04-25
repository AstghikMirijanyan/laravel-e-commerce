<?php

namespace App\Repositories\Interfaces;

interface AuthRepositoryInterface
{

    /**
     * @param array $data
     * @return bool
     */
    public function createUser(array $data): bool;

    /**
     * @param array $data
     * @return bool
     */
    public function userLogin(array $data): bool;

}
