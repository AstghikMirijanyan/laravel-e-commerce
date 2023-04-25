<?php

namespace App\Services;

use App\Services\Interfaces\AuthServicesInterfaces;

class AuthServices implements AuthServicesInterfaces
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
     * @return bool
     */
    public function createUser(array $data): bool
    {
        return $this->modelRepository->createUser($data);
    }

    /**
     * @param array $data
     * @return bool
     */
    public function userLogin(array $data): bool
    {
        return $this->modelRepository->userLogin($data);
    }


}
